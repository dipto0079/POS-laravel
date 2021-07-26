<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\RestaurantIngredient;
use App\RestaurantPurchase;
use App\RestaurantPurchaseIngredient;
use App\RestaurantSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;

// use function GuzzleHttp\Promise\all;


class RestaurantPurchasesController extends Controller
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
    public function index(Request $request)
    {
        $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;
        if($request->ajax()){
            $date = $request->date;
            $ingredient_id = $request->ingredient_id;
            $supplier_id = $request->supplier_id;
            $purchases= '';
            if ($date != '') {
                $purchases = RestaurantPurchase::with('supplierInfo', 'creatorInfo', 'purchaseIngredients')
                                                ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                ->where('date', $date)
                                                ->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

            }else if($supplier_id != '') {
                $purchases = RestaurantPurchase::with('supplierInfo', 'creatorInfo', 'purchaseIngredients')
                                                ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                ->where('supplier_id', $supplier_id)
                                                ->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            }elseif ($ingredient_id != '') {

                $purchases = RestaurantPurchase::with('supplierInfo', 'creatorInfo', 'purchaseIngredients')
                                                ->select('tbl_restaurant_purchases.*')
                                                ->where('tbl_restaurant_purchases.restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                ->leftJoin('tbl_restaurant_purchase_ingredients','tbl_restaurant_purchase_ingredients.purchase_id','=','tbl_restaurant_purchases.id')
                                                ->where('tbl_restaurant_purchase_ingredients.ingredient_id', $ingredient_id)
                                                ->where('tbl_restaurant_purchases.del_status', 'Live')->orderBy('tbl_restaurant_purchases.updated_at', 'asc')->get();

            }

            foreach ($purchases as $key => $purchase) {

                foreach ($purchase->purchaseIngredients as $key => $purchaseIngredient) {
                    $purchase->purchaseIngredients[$key]->name = $purchaseIngredient->ingredientInfo->name;
                }
            }

            return response()->json(['purchases' => $purchases]);
        }


        $suppliers = RestaurantSupplier::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();

        $purchases = RestaurantPurchase::with('supplierInfo', 'creatorInfo', 'purchaseIngredients')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.purchase.purchase.index', compact('purchases', 'suppliers', 'ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastId = RestaurantPurchase::select('reference_no')->orderBy('created_at', 'desc')->first();
        $nextId = "000001";

        if ($lastId) {
            $lastId = $lastId->reference_no;
            $idNum = (int)$lastId;
            $nextId = $idNum + 1;
            $nextId = (string)$nextId;

            switch (strlen($nextId)) {
                case 1:
                    $nextId = "00000" . $nextId;
                    break;
                case 2:
                    $nextId = "0000" . $nextId;
                    break;
                case 3:
                    $nextId = "000" . $nextId;
                    break;
                case 4:
                    $nextId = "00" . $nextId;
                    break;
                case 5:
                    $nextId = "0" . $nextId;
                    break;
                default:
                    $nextId = $nextId;
            }
        }
        $lastIda = RestaurantPurchase::select('invoice_no')->orderBy('created_at', 'desc')->first();
        $nextIda = "100001";

        if ($lastIda) {
            $lastIda = $lastIda->invoice_no;
            $idNuma = (int)$lastIda;
            $nextIda = $idNuma + 1;
            $nextIda = (string)$nextIda;

            switch (strlen($nextIda)) {
                case 1:
                    $nextIda = "10000" . $nextIda;
                    break;
                case 2:
                    $nextIda = "1000" . $nextIda;
                    break;
                case 3:
                    $nextIda = "100" . $nextIda;
                    break;
                case 4:
                    $nextIda = "10" . $nextIda;
                    break;
                case 5:
                    $nextIda = "1" . $nextIda;
                    break;
                default:
                    $nextIda = $nextIda;
            }
        }

        $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;

        $suppliers = RestaurantSupplier::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();

        //use for show current stock
        foreach ($ingredients as $key => $ingredient) {
            # code...
            $sql = "SELECT (select SUM(quantity_amount) from tbl_restaurant_purchase_ingredients where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_purchase,
            (select SUM(consumption) from tbl_restaurant_sales_consumptions_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_consumption,
            (select SUM(consumption) from tbl_restaurant_sales_cons_of_mod_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND  del_status='Live') total_modifiers_consumption,
            (select SUM(waste_amount) from tbl_restaurant_waste_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND tbl_restaurant_waste_ingredients.del_status='Live') total_waste,
            (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Plus') total_consumption_plus,
            (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Minus') total_consumption_minus,
            (select name from tbl_restaurant_ingredient_categories where id=i.category_id AND del_status='Live') category_name,
            (select name from tbl_restaurant_ingredient_units where id=i.unit_id AND del_status='Live') unit_name
            FROM tbl_restaurant_ingredients i WHERE i.del_status='Live' AND i.id='$ingredient->id' AND i.restaurant_id= '$restaurantId' ORDER BY i.name ASC";

            $stock = DB::select($sql);
            foreach ($stock as $value) {
                $totalStock = $value->total_purchase - $value->total_consumption - $value->total_modifiers_consumption - $value->total_waste + $value->total_consumption_plus - $value->total_consumption_minus;
                $ingredients[$key]->current_stock = $totalStock;
            }
        }

        return view('pages.restaurant.purchase.purchase.create', compact('nextIda','nextId', 'suppliers', 'ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $rules = array(
            'reference_no' => 'required',
            'supplier_id' => 'required|numeric',
            'ingredient_id' => 'required',
            'invoice_no' => 'required',
            'purchase_type' => 'required',
            'paid' => 'required'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('purchases.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $purchase = new RestaurantPurchase();
            $purchase->reference_no = $request->reference_no;
            $purchase->invoice_no = $request->invoice_no;
            $purchase->supplier_id = $request->supplier_id;
            $purchase->date = $request->date;
            $purchase->purchase_type = $request->purchase_type;
            $purchase->subtotal = $request->subtotal;
            $purchase->grand_total = $request->grand_total;
            $purchase->paid = $request->paid;
            $purchase->due = $request->due;
            $purchase->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $purchase->user_id = Auth::guard('restaurantUser')->id();
            $purchase->save();

            for ($i = 0; $i < count($request->input('ingredient_id')); $i++) {
                $purchaseIngredients = new RestaurantPurchaseIngredient();
                $purchaseIngredients->ingredient_id = $request->ingredient_id[$i];
                $purchaseIngredients->invoice_no = $request->invoice_no[$i];
                $purchaseIngredients->unit_price = $request->unit_price[$i];
                $purchaseIngredients->quantity_amount = $request->quantity_amount[$i];
                $purchaseIngredients->total = $request->total[$i];
                $purchaseIngredients->purchase_id = $purchase->id;
                $purchaseIngredients->save();


                // if ($purchaseIngredients->save()) {
                //     $ingredients = RestaurantIngredient::find($purchaseIngredients->ingredient_id);
                //     $ingredients->current_stock = $ingredients->current_stock + $purchaseIngredients->quantity_amount;
                //     $ingredients->save();
                // }

            }

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('purchases.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantPurchase::find($id)->user_id) {

            $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;
            $purchase = RestaurantPurchase::find($id);
            $purchase_ingredients = RestaurantPurchaseIngredient::with('ingredientInfo')->where('purchase_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            // return $purchase_ingredients;
            //use for show current stock
            foreach ($purchase_ingredients as $key => $purchase_ingredient) {
                # code...
                $sql = "SELECT (select SUM(quantity_amount) from tbl_restaurant_purchase_ingredients where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_purchase,
                (select SUM(consumption) from tbl_restaurant_sales_consumptions_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_consumption,
                (select SUM(consumption) from tbl_restaurant_sales_cons_of_mod_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND  del_status='Live') total_modifiers_consumption,
                (select SUM(waste_amount) from tbl_restaurant_waste_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND tbl_restaurant_waste_ingredients.del_status='Live') total_waste,
                (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Plus') total_consumption_plus,
                (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Minus') total_consumption_minus,
                (select name from tbl_restaurant_ingredient_categories where id=i.category_id AND del_status='Live') category_name,
                (select name from tbl_restaurant_ingredient_units where id=i.unit_id AND del_status='Live') unit_name
                FROM tbl_restaurant_ingredients i WHERE i.del_status='Live' AND i.id='$purchase_ingredient->ingredient_id' AND i.restaurant_id= '$restaurantId' ORDER BY i.name ASC";

                $stock = DB::select($sql);
                foreach ($stock as $value) {
                    $totalStock = $value->total_purchase - $value->total_consumption - $value->total_modifiers_consumption - $value->total_waste + $value->total_consumption_plus - $value->total_consumption_minus;
                    $purchase_ingredients[$key]->ingredientInfo->current_stock = $totalStock;
                }
            }

            // return $purchase_ingredients;
            $suppliers = RestaurantSupplier::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();


            //use for show current stock
            foreach ($ingredients as $key => $ingredient) {
                # code...
                $sql = "SELECT (select SUM(quantity_amount) from tbl_restaurant_purchase_ingredients where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_purchase,
                (select SUM(consumption) from tbl_restaurant_sales_consumptions_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_consumption,
                (select SUM(consumption) from tbl_restaurant_sales_cons_of_mod_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND  del_status='Live') total_modifiers_consumption,
                (select SUM(waste_amount) from tbl_restaurant_waste_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND tbl_restaurant_waste_ingredients.del_status='Live') total_waste,
                (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Plus') total_consumption_plus,
                (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Minus') total_consumption_minus,
                (select name from tbl_restaurant_ingredient_categories where id=i.category_id AND del_status='Live') category_name,
                (select name from tbl_restaurant_ingredient_units where id=i.unit_id AND del_status='Live') unit_name
                FROM tbl_restaurant_ingredients i WHERE i.del_status='Live' AND i.id='$ingredient->id' AND i.restaurant_id= '$restaurantId' ORDER BY i.name ASC";

                $stock = DB::select($sql);
                foreach ($stock as $value) {
                    $totalStock = $value->total_purchase - $value->total_consumption - $value->total_modifiers_consumption - $value->total_waste + $value->total_consumption_plus - $value->total_consumption_minus;
                    $ingredients[$key]->current_stock = $totalStock;
                }
            }

            return view('pages.restaurant.purchase.purchase.edit', compact('purchase', 'purchase_ingredients', 'suppliers', 'ingredients'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('purchases.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        if (Auth::guard('restaurantUser')->id() == RestaurantPurchase::find($id)->user_id) {
            $rules = array(
                'supplier_id' => 'required|numeric',
                'ingredient_id' => 'required',
                'invoice_no' => 'required',
                'purchase_type' => 'required',
                'paid' => 'required'
            );

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $purchase = RestaurantPurchase::find($id);
                $purchase->supplier_id = $request->supplier_id;
                $purchase->date = $request->date;
                $purchase->purchase_type = $request->purchase_type;
                $purchase->subtotal = $request->subtotal;
                $purchase->grand_total = $request->grand_total;
                $purchase->paid = $request->paid;
                $purchase->due = $request->due;
                $purchase->invoice_no = $request->invoice_no;
                $purchase->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $purchase->user_id = Auth::guard('restaurantUser')->id();
                $purchase->save();

                RestaurantPurchaseIngredient::where('purchase_id', $id)->delete();

                for ($i = 0; $i < count($request->input('ingredient_id')); $i++) {
                    if (RestaurantPurchaseIngredient::where('ingredient_id', '=', $request->input('ingredient_id'))->where('purchase_id', '=', $id)->exists()) {

                        $purchaseIngredients = RestaurantPurchaseIngredient::where('ingredient_id', '=', $request->input('ingredient_id'))->where('purchase_id', '=', $id)->first();
                        $purchaseIngredients->unit_price = $request->unit_price[$i];

                        $previous_amount = $purchaseIngredients->quantity_amount;
                        $purchaseIngredients->quantity_amount = $request->quantity_amount[$i];
                        $purchaseIngredients->total = $request->total[$i];
                        $purchaseIngredients->save();

                        // if ($purchaseIngredients->save()) {
                        //     $ingredients = RestaurantIngredient::find($purchaseIngredients->ingredient_id);
                        //     $ingredients->current_stock = $ingredients->current_stock - $previous_amount;
                        //     $ingredients->current_stock += $purchaseIngredients->quantity_amount;
                        //     $ingredients->save();
                        // }

                    } else {
                        $purchaseIngredients = new RestaurantPurchaseIngredient();
                        $purchaseIngredients->ingredient_id = $request->ingredient_id[$i];
                        $purchaseIngredients->unit_price = $request->unit_price[$i];
                        $purchaseIngredients->quantity_amount = $request->quantity_amount[$i];
                        $purchaseIngredients->total = $request->total[$i];
                        $purchaseIngredients->invoice_no = $request->invoice_no[$i];
                        $purchaseIngredients->purchase_id = $purchase->id;
                        $purchaseIngredients->save();

                        // if ($purchaseIngredients->id) {
                        //     $ingredients = RestaurantIngredient::find($purchaseIngredients->ingredient_id);
                        //     $ingredients->current_stock += $purchaseIngredients->quantity_amount;
                        //     $ingredients->save();
                        // }
                    }
                }

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('purchases.index');
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('purchases.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $purchase = RestaurantPurchase::find($id);
        if ($purchase) {
            $purchase = RestaurantPurchase::find($id);
            $purchase->del_status = "Deleted";
            $purchase->save();

            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('purchases.index');
        } else {
            toastr()->error('Unable to delete.');
            // redirect
            return redirect()->route('purchases.index');
        }
    }


    public function createSupplier(Request $request)
    {
//        return $request->all();

        $rules = array(
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required'
        );

        $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
        $request->address ? $rules['address'] = 'required' : '';
        $request->description ? $rules['description'] = 'required' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the sign up
        if ($validator->fails()) {
            return response()->json([
                'success' => false, 'errors' => $validator->getMessageBag()->toArray()
            ]);
        } else {
            // store
            $supplier = new RestaurantSupplier();
            $supplier->name = $request->name;
            $supplier->contact_person = $request->contact_person;
            $supplier->phone = $request->phone;
            $supplier->email = $request->email;
            $supplier->address = $request->address;
            $supplier->description = $request->description;
            $supplier->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $supplier->user_id = Auth::guard('restaurantUser')->id();
            $supplier->save();

            // return response
            return response()->json([
                'success' => true, 'msg' => 'Added successfully.'
            ]);
        }
    }

    Public function detailsAll($id){

        $res_id = Auth::guard('restaurant')->id();
        $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;
        $supplier = RestaurantSupplier::where('id',$id)->get();
        $purchases=RestaurantPurchase::where('supplier_id', $id)
           ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
           ->get();
       $purchase_ingredients = RestaurantPurchaseIngredient::with('ingredientInfo')->where('purchase_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
       $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();

        $res_purchese = DB::table('tbl_restaurant_purchases')
            ->join('tbl_restaurant_suppliers','tbl_restaurant_purchases.supplier_id','=','tbl_restaurant_suppliers.id')
            ->where('tbl_restaurant_purchases.id','=',$id)
            ->where('tbl_restaurant_purchases.restaurant_id','=',$restaurantId)
            ->select('tbl_restaurant_purchases.*','tbl_restaurant_suppliers.name as supplier_name')
            ->get();

        $res_purchese = $res_purchese[0];

        $all_res_purchese = DB::table('tbl_restaurant_purchase_ingredients')
            ->join('tbl_restaurant_ingredients','tbl_restaurant_purchase_ingredients.ingredient_id','=','tbl_restaurant_ingredients.id')
            ->where('tbl_restaurant_purchase_ingredients.purchase_id','=',$id)
            ->select('tbl_restaurant_purchase_ingredients.*','tbl_restaurant_ingredients.name as food_name')
            ->get();

    return view('pages.restaurant.purchase.purchase.purchase_details', compact('supplier','purchases','purchase_ingredients','ingredients','all_res_purchese','res_purchese'));
    }


    public function deletepurchases($id){
        $purchase = RestaurantPurchaseIngredient::find($id);
        if ($purchase) {
            $purchase->del_status = "Deleted";
            $purchase->save();
            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('purchases.index');
        } else {
            toastr()->error('Unable to delete.');
            // redirect
            return redirect()->route('purchases.index');
        }
    }
    public function purchasesmodifys($id){
        $purchase = RestaurantPurchaseIngredient::find($id);
        return view('pages.restaurant.purchase.purchase.purchase_modify',compact('purchase'));
    }
    public function updatemodifys(Request $request){

        //------------- input ------------------
        $ids =  $request->purches_id;
        $quentity =  $request->quantity_amount;
        $total_amount = $request->total;
        //----------------------------------------

        // ------------ ingredience update --------------------------
        $purchase = RestaurantPurchaseIngredient::find($ids);
        $purchase->quantity_amount=$quentity;
        $purchase->total=$total_amount;
        $purchase->save();

        // ------------ find purchus id by ingrdience id---------------

        $pur= RestaurantPurchaseIngredient::where('id', $ids)->first();

        $purhas_id =  $pur->purchase_id;

        //----------- sum total ingredinse in purches id

        $total_quantity = DB::table('tbl_restaurant_purchase_ingredients')
        ->where('purchase_id',$purhas_id)->sum('quantity_amount');

        $total_amount_um = DB::table('tbl_restaurant_purchase_ingredients')
            ->where('purchase_id',$purhas_id)->sum('total');

        // ---------- purches table update by purches id----------- sub
        $pu_up = RestaurantPurchase::find($purhas_id);
        $pu_up->subtotal=$total_amount_um;
        $pu_up->grand_total=$total_amount_um;
        $pu_up->save();
        return redirect('restaurant/purchase/purchases_details/'.$purhas_id);
    }
    
}
