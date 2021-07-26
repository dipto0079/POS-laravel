<?php

namespace App\Http\Controllers;

use App\RestaurantGiftCard;
use App\Classes\ServiceWorker;
use App\RestaurantCustomer;
use App\RestaurantGiftCardSell;
use App\RestaurantSale;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DataTables;

class RestaurantGiftCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
        $this->serviceWorker = new ServiceWorker();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $giftCards = RestaurantGiftCard::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                            ->where('del_status', 'Live')
                                            ->orderBy('updated_at', 'desc')
                                            ->get();

            return Datatables::of($giftCards)->addIndexColumn()
                                        ->addColumn('customer', function($giftCard){
                                            if ($giftCard->sellInfo) {
                                                # code...
                                                return $giftCard->sellInfo->customer->name;
                                            }
                                        })
                                        
                                        ->addColumn('balance', function($giftCard){
                                            $usedBalance = 0;
                                            foreach ($giftCard->paymentInfo as $key => $giftCardPaymentInfo) {
                                                $usedBalance = $usedBalance + $giftCardPaymentInfo->paid_amount;
                                            }

                                            $giftCardBalance = $giftCard->value - $usedBalance;

                                            return $giftCardBalance;
                                        })
                                        ->addColumn('action', function($giftCard){

                                            $btn = '<div class="btn-group">
                                                    <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-offset="-185,-75">
                                                        <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                            class="caret"></span>
                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item edit-link show-giftCard" role="button" data-print_type="1"
                                                        data-id="'.$giftCard->id.'">View Details</a> |
                                                        <a class="dropdown-item edit-link" role="button"
                                                        href="'.url()->current().'/'.$giftCard->id.'/edit">Edit</a> |
                                                        <a class="dropdown-item edit-link delete-giftCard"
                                                        role="button" data-id="'.$giftCard->id.'">Delete</a>
                                                    </div>
                                                </div>';

                                                return $btn;
                                        })
                                        ->rawColumns(['action'])
                                        ->make(true);
        }



        return view('pages.restaurant.giftCard.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $card_no = $this->serviceWorker->random_strings(12);
        $card_no = mt_rand(100000000000, 999999999999);

        // return $card_no;
        $giftCard = RestaurantGiftCard::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                        ->where('card_no', $card_no)
                                        ->exists();
        if ($giftCard) {
            $this->create();
        } else {

            return view('pages.restaurant.giftCard.create', compact('card_no'));
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            // 'card_no' => 'required|unique:tbl_restaurant_gift_cards,card_no|digits:12',
            'card_no' => 'required|unique:tbl_restaurant_gift_cards,card_no',
            'value' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'expiry_date'  => 'required|date',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('gift-card.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $giftCard = new RestaurantGiftCard;
            $giftCard->card_no = $request->card_no;
            $giftCard->value = $request->value;
            $giftCard->expiry_date = $request->expiry_date;
            $giftCard->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $giftCard->user_id = Auth::guard('restaurantUser')->id();
            $giftCard->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('gift-card.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_data=DB::table('tbl_restaurant_gift_cards')
            ->where('id',$id)
            ->first();
        return view('pages.restaurant.giftCard.edit',compact('all_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function giftupdate(Request $request)
    {

        $id = $request->id;

        $data = array(

            'card_no' => $request->card_no,
            'value' => $request->g_value,
            'expiry_date' =>$request-> expiry_date,
        );
        DB::table('tbl_restaurant_gift_cards')
            ->where('id', $id)
            ->update($data);
        return redirect('restaurant/gift-card');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurant')->id() === RestaurantGiftCard::find($id)->created_by) {
            $giftCard = RestaurantGiftCard::find($id);
            if ($giftCard) {
                $giftCard = RestaurantGiftCard::find($id);
                $giftCard->del_status = "Deleted";
                $giftCard->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('gift-card.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('gift-card.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('gift-card.index');
        }
    }


    //gift card sell to a customer
    public function giftCardSell(){

        $customers = RestaurantCustomer::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                        ->where('del_status', 'Live')
                                        ->orderBy('updated_at', 'desc')
                                        ->get();

        $giftCards = RestaurantGiftCard::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                            ->where('del_status', 'Live')
                                            ->orderBy('updated_at', 'desc')
                                            ->get();

        return view('pages.restaurant.giftCard.sell', compact('customers', 'giftCards'));
    }

    //gift card selled to a customer
    public function giftCardSellStore(Request $request){

        $rules = array(
            'gift_card_id' => 'required',
            'gift_card_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'customer_id'  => 'required',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('gift-card.sell')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $giftCardSell = new RestaurantGiftCardSell;
            $giftCardSell->gift_card_id = $request->gift_card_id;
            $giftCardSell->gift_card_price = $request->gift_card_price;
            $giftCardSell->customer_id = $request->customer_id;
            $giftCardSell->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $giftCardSell->user_id = Auth::guard('restaurantUser')->id();
            // return $giftCardSell;
            $giftCardSell->save();

            toastr()->success('Gift card sold.');
            // redirect
            return redirect()->route('gift-card.sell');
        }
    }


    //gift card check by ajax
    public function giftCardCheckByAjax(Request $request){

        // return response()->json(['success' => $request->all()]);

        $card_no = $request->card_no;
        $sale_id = $request->sale_id;
        $paid_amount = $request->paid_amount;
        $payment_method_type = $request->payment_method_type;
        $usedBalance = 0;

        $giftCard = RestaurantGiftCard::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                        ->where('card_no',$card_no)
                                        ->where('del_status', 'Live')
                                        ->first();

        // return $giftCard->expiry_date;
        $currentDate   = Carbon::now()->toDateString();
        // return response()->json([$currentDate, $giftCard->expiry_date]);
        $sale = RestaurantSale::select('customer_id')->where('id', $sale_id)->first();

        if ($giftCard && $giftCard->sellInfo) {
            # code...
            foreach ($giftCard->paymentInfo as $key => $giftCardPaymentInfo) {
                $usedBalance = $usedBalance + $giftCardPaymentInfo->paid_amount;
            }

            $giftCardBalance = $giftCard->value - $usedBalance;


            if ($giftCard->sellInfo->customer->id != $sale->customer_id) {
                return response()->json(['error' => 'The Gift card is not belong to this customer']);
            }else if ($giftCardBalance < $paid_amount) {

                return response()->json(['error' => "Amount exceeds card balance! Gift Card balance:".$giftCardBalance]);
            }else if ($giftCard->expiry_date < $currentDate) {

                return response()->json(['error' => "Date Expired at:".$giftCard->expiry_date]);
            }
            else{

                return response()->json(['success' => ['giftCard' => $giftCard, 'balance' => $giftCardBalance]]);
            }
        } else {
            return response()->json(['error' => "Gift Card Not found"]);
        }



    }

}
