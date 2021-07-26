<?php

namespace App\Http\Controllers;

use App\Classes\Sms;
use App\Customer;
use App\CustomerReservation;
use App\Mail\MessageByMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\RestaurantFloor;
use DB;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\VarDumper\Cloner\Data;

class RestaurantReservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation(Request $request)
    {

        // return url()->current();
        if ($request->ajax()) {

            if (!empty($request->from_date)) {
                $reservation = CustomerReservation::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->whereBetween('booking_date', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                # code...
                $reservation = CustomerReservation::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->get();
            }
            return DataTables::of($reservation)
                ->addIndexColumn()
                ->addIndexColumn('customer_id', function ($reservation) {
                    return $reservation->customer->id;
                })
                ->addColumn('name', function ($reservation) {
                    return $reservation->customer->name;
                })
                ->addColumn('email', function ($reservation) {
                    return $reservation->customer->email;
                })
                ->addColumn('phone', function ($reservation) {
                    return $reservation->customer->phone;
                })
                ->addColumn('booking_date', function ($reservation) {
                    return $reservation->booking_date;
                })
                ->addColumn('number_of_people', function ($reservation) {
                    return $reservation->number_of_people;
                })
                ->addColumn('table_id', function ($reservation) {
                    $tables = explode(',', $reservation->table_id);
                    $tables_name = '';
                    foreach ($tables as $key => $table_id) {
                        if (!$tables_name == '') {
                            $tables_name = $tables_name . ', ' . getRestaurantTableNameById($table_id);
                        } else {
                            $tables_name .= getRestaurantTableNameById($table_id);
                        }
                    }

                    return $tables_name;
                    //return $reservation->table_id;

                })
                ->make(true);
        }



        return view('pages.restaurant.reservation.index');

        // return view('pages.restaurant.sale.customer.index', compact('customers'));
    }



    /**
     * send tet/mail to multiple customer
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendTextMail(Request $request)
    {


        //return $request->all();
        $customers_id   = $request->customers_id;
        $message        = $request->message;
        $text_email     = $request->text_email;
        //return $text_email;//json_encode($request->text_email);
        $customers = $customers_id;
        $errors = [];

        foreach ($customers_id as $key => $customer_id) {
            $customer = Customer::select('phone', 'email', 'name')->where('id', $customer_id)->where('del_status', 'Live')->first();
            if ($customer) {
                $customer['message'] = $message;

                foreach ($text_email as $key => $messageBy) {
                    if ($messageBy == 'email') {
                        # code...
                        Mail::to($customer->email)->send(new MessageByMail($customer));
                    }
                    if ($messageBy == 'sms') {
                        $sms = new Sms;
                        $client = $sms->twilioClient();
                        try {
                            // Use the client to do fun stuff like send text messages!
                            $client->messages->create($customer->phone, array('from' => Sms::PHONE_NUMBER, 'body' => $message));
                        } catch (Exception $e) {
                            $errors[] = $e->getMessage();
                        }
                    }
                }
            }
        }

        return ['success' => 'message succefully send', 'errors' => $errors, 'customers' => $customers, 'message' => $message];
    }


    public function add_reservation()
    {
        $floors = RestaurantFloor::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.reservation.add_reservation', compact('floors'));
    }
    public function search_floor( Request  $request)
    {
        $resturent_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $id = $request->floor;
        $reservation_table = DB::table('tbl_restaurant_floor_tables')
            ->join('tbl_restaurant_floors', 'tbl_restaurant_floor_tables.floor_id', '=', 'tbl_restaurant_floors.id')
            ->select('tbl_restaurant_floor_tables.*', 'tbl_restaurant_floors.name as floor_name')
            ->where('tbl_restaurant_floor_tables.floor_id', $id)
            ->where('tbl_restaurant_floor_tables.del_status', 'Live')
            ->where('tbl_restaurant_floor_tables.restaurant_id', $resturent_id)
            ->get();


    $dd=array();
    $test= 0 ;
    $c_d= date('Y-m-d');
    $c_t= date('H:i:s').'.000000';
    $table_resurved = DB::table('tbl_table_resurved')
                    ->whereDate('date_end', '>=', $c_d)
//                    ->where('del_status','=','Live')
                    ->get();

    foreach ($table_resurved as $d){
        if($d->date_end == $c_d){
            if($d->ebd_time > $c_t){
                $dd[$test] = (Object)[ 'table_id' => $d->table_id , 'name' => $d->name ];
            }
        }else{
            $dd[$test] =  (Object)[ 'table_id' => $d->table_id,'name' => $d->name ];
        }
        $test++;

    }


  //dd($table_resurved_Deleted);
       return view('pages.restaurant.reservation.add_reservation', compact('reservation_table','dd'));
    }

    public function reserved_table($id)
    {
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $reservation_data = DB::table('tbl_restaurant_floor_tables')
            ->join('tbl_restaurant_floors', 'tbl_restaurant_floor_tables.floor_id', '=', 'tbl_restaurant_floors.id')
            ->select('tbl_restaurant_floor_tables.*', 'tbl_restaurant_floors.name as floor_name')
            ->where('tbl_restaurant_floor_tables.id', $id)
            ->first();
        $customers = DB::table('tbl_restaurant_customers')
            ->where('restaurant_id',$res_id)
            ->get();


        return view('pages.restaurant.reservation.reserved_table', compact('reservation_data','customers'));
    }
    public function alltable($id){
        $all=DB::table('tbl_table_resurved')
            ->where('table_id', $id)
            ->get();


       return view('pages.restaurant.reservation.all_reserved_table',compact('all'));
    }
    public function table_resurved(Request $request)
    {

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $flore = $request->flore;
        $table_id = $request->table_id;
        $table_name = $request->table_name;
        $name = $request->name;
        $members_limit = $request->member_limet;
        $members = $request->members;
        $f_date = $request->f_Date;
        $f_time = $request->f_time;
        $floor_name = $request->floor_name;
        $f_name = $request->flore;
        $l_date = $request->l_date;
        $l_time = $request->l_time;
        $status = $request->status;

        $c_d= date('Y-m-d');
        $c_t= date('H:i:s').'.000000';

        $data = array(
            'table_id' => $table_id,
            'name' => $flore,
            'table_name' => $table_name,
            'name' => $name,
            'guest_count' => $members,
            'date_start' => $f_date,
            'start_time' => $f_time,
            'start_time' => $f_time,
            'flore' => $f_name,
            'restaurant_id' => $res_id,
            'date_end' => $l_date,
            'ebd_time' => $l_time,
            'status' => $status,


        );
        toastr()->success('Reservation Successfully Add');
        DB::table('tbl_table_resurved')->insert($data);

        $te= DB::table('tbl_table_resurved')
              ->where('table_id',$table_id)
                ->get();
            if (!$te){

                toastr()->success('Reservation Successfully Add');

                DB::table('tbl_table_resurved')->insert($data);

            }elseif ($c_d){

                return redirect('restaurant/Add-Reservation');

            }


        if($members_limit>=$members)
        {
            $data = array(
                'table_id' => $table_id,
                'name' => $flore,
                'table_name' => $table_name,
                'name' => $name,
                'guest_count' => $members,
                'date_start' => $f_date,
                'start_time' => $f_time,
                'start_time' => $f_time,
                'flore' => $f_name,
                'restaurant_id' => $res_id,
                'date_end' => $l_date,
                'ebd_time' => $l_time,

            );


            return redirect('restaurant/Add-Reservation');
        }
        else
        {
            echo 'member limet is high';

        }
    }



    public function OnlineReservation(){
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $all= DB::table('tbl_customer_reservations')
            ->where('restaurant_id',$res_id)
            ->get();

        $dd=array();
        $test= 0 ;
        $c_d= date('Y-m-d');
        $c_t= date('H:i:s').'.000000';
        $table_resurved = DB::table('tbl_customer_reservations')
            ->whereDate('end_booking_date', '>=', $c_d)
//
            ->get();

        foreach ($table_resurved as $d){
            if($d->end_booking_date == $c_d){
                if($d->end_booking_time > $c_t){
                    $dd[$test] = (Object)[ 'table_id' => $d->table_id  ];
                }
            }else{
                $dd[$test] =  (Object)[ 'table_id' => $d->table_id ];
            }
            $test++;

        }

        return view('pages.restaurant.reservation.OnlineReservation', compact('all'));

    }

}
