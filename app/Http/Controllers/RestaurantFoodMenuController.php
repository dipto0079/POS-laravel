<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\RestaurantFoodMenu;
use App\RestaurantFoodMenuCategory;
use App\RestaurantFoodMenuIngredient;
use App\RestaurantFoodMenuModifier;
use App\RestaurantFoodMenuModifierIngredient;
use App\RestaurantFoodMenuShift;
use App\RestaurantIngredient;
use App\RestaurantIngredientCategory;
use App\RestaurantKitchenPanel;
use App\RestaurantModifierForFoodMenu;
use App\RestaurantSettingsTax;
use App\RestaurantSettingsTaxField;
use App\RestaurantShiftForFoodMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use stdClass;
use function GuzzleHttp\Psr7\try_fopen;

class RestaurantFoodMenuController extends Controller
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
    public function index()
    {
        $menu = RestaurantFoodMenu::with('categoryInfo', 'creatorInfo')
        ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
        ->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        //echo $menu;

        return view('pages.restaurant.sale.foodMenu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = RestaurantFoodMenu::orderBy('updated_at', 'desc')->first();
        //return $code;
        if ($code) {
            // Being sure the string is actually a number
            if (is_numeric($code->code)) {
                $code = $code->code + 1;
            }
            $code = "0" . (string)$code;
        } else {
            $code = "01";
        }
        // $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $categories = RestaurantFoodMenuCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();
        $shifts = RestaurantFoodMenuShift::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $panels = RestaurantKitchenPanel::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $taxId = RestaurantSettingsTax::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->orderBy('updated_at', 'desc')->first()->id;
        $subcategory = DB::table('table_sub_category')->where('restaurant_id','=', Auth::guard('restaurantUser')->user()->restaurant_id)->get();
        if (isset($taxId)) {
            $vats = RestaurantSettingsTaxField::where('tax_id', $taxId)->orderBy('updated_at', 'desc')->get();
        } else {
            $vats = [];
        }

       //dd($subcategory->id);
       
        // return $categories;
        return view('pages.restaurant.sale.foodMenu.create', compact('code', 'categories', 'ingredients', 'shifts', 'panels', 'vats','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $rules = array(
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'required|numeric',
            'dine_in_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'take_away_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'delivery_order_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'shift_id' => 'required',
            'panel_id' => 'required|numeric',
            'veg_item' => 'required',
            //this field was removed from the system
            // 'beverage_item' => 'required',
            //'subcategory_id' => 'required|numeric',
            'tax_field_percentage.*' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        );




        $request->photo ? $rules['photo'] = 'image|mimes:jpeg,png,jpg' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('food-menu.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store

            // if (is_countable($request->input('tax_field_percentage'))) {
            //     $taxInfo = [];
            //     for ($i = 0; $i < count($request->input('tax_field_percentage')); $i++) {
            //         $object = new stdClass();
            //         $object->tax_field_id = $request->tax_field_id[$i];
            //         $object->tax_field_name = $request->tax_field_name[$i];
            //         $object->tax_field_percentage = $request->tax_field_percentage[$i];
            //         $taxInfo[] = $object;
            //     }
            // }

            $taxInfo = [];
            if ($request->vat_tax ) {
                $t = RestaurantSettingsTaxField::find($request->vat_tax);
                $object = new stdClass();
                $object->tax_field_id = $t->id;
                $object->tax_field_name = $t->name;
                $object->tax_field_percentage = $t->rate;
                $taxInfo[] = $object;
            }


            // return $taxInfo;

            //logo
            $logoNameToStore = null;
            if ($request->hasFile('photo')) {
                $path = base_path('media/restaurant/photos');

                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $image = $request->file('photo');
                $filename = $image->getClientOriginalName();
                $logoNameToStore = time() . "_" . $filename;
                $image->move(base_path('\media\restaurant\photos'), $logoNameToStore);
            }

            $menu = new RestaurantFoodMenu();
            $menu->name = $request->name;
            $menu->code = $request->code;
            $menu->cat_id = $request->category_id;
            $menu->dine_in_price = $request->dine_in_price;
            $menu->take_away_price = $request->take_away_price;
            $menu->delivery_order_price = $request->delivery_order_price;
            //has many to many relation
            // $menu->shift_id = $request->shift_id;
            $menu->panel_id = $request->panel_id;
            $menu->description = $request->description;
            $menu->veg_item = $request->veg_item;
            // this field was removed from the system
            // $menu->beverage = $request->beverage_item;
            $menu->tax_info = !empty($taxInfo) ? json_encode($taxInfo, true) : null;
            $menu->photo = $logoNameToStore;
            $menu->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $menu->user_id = Auth::guard('restaurantUser')->id();
           $menu->save();

            if (is_countable($request->input('ingredient_id'))) {
                for ($i = 0; $i < count($request->input('ingredient_id')); $i++) {
                    $menuIngredient = new RestaurantFoodMenuIngredient();
                    $menuIngredient->ing_id = $request->ingredient_id[$i];
                    $menuIngredient->consumption = $request->consumption[$i];
                    $menuIngredient->food_menu_id = $menu->id;
                   $menuIngredient->save();
                }
            }

            if (is_countable($request->input('shift_id'))) {
                for ($i = 0; $i < count($request->input('shift_id')); $i++) {
                    $menu_shift = new RestaurantShiftForFoodMenu();
                    $menu_shift->shift_id = $request->shift_id[$i];
                    $menu_shift->fd_menu_id = $menu->id;
                    $menu_shift->save();
                }
            }

            $cat_id = $request->subcategory_id;

            // $new_cat_id = $menu->cat_id;
            // $new_sub_cat_id = $cat_id;

            $data=array();
            $data['sub_catagory_id']=$menu->cat_id;
            $data['catagory_id']=$cat_id;
            $data['restaurant_id']=$menu->restaurant_id;
            $data['creat_this']=$menu->user_id;
            
            // $data['catagory_id']=$menu->cat_id;
            // $data['sub_catagory_id']=$cat_id;

            DB::table('tbl_under_sub_catagory')->insert($data);
            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('food-menu.create');
            return redirect()->route('food-menu.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenu::find($id)->user_id) {
            $food_menu_details = RestaurantFoodMenu::with('categoryInfo')->find($id);
            $food_menu_ingredients = RestaurantFoodMenuIngredient::where('food_menu_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            //  return $food_menu_ingredients;

            return view('pages.restaurant.sale.foodMenu.show', compact('food_menu_details', 'food_menu_ingredients'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenu::find($id)->user_id) {
            $food_menu_details = RestaurantFoodMenu::with('categoryInfo')->find($id);
            $food_menu_ingredients = RestaurantFoodMenuIngredient::where('food_menu_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

            // $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $categories = RestaurantFoodMenuCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

            $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();
            $shifts = RestaurantFoodMenuShift::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

            $panels = RestaurantKitchenPanel::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $taxId = RestaurantSettingsTax::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->orderBy('updated_at', 'desc')->first()->id;
            if (isset($taxId)) {
                $vats = RestaurantSettingsTaxField::where('tax_id', $taxId)->orderBy('updated_at', 'desc')->get();
            } else {
                $vats = [];
            }

            return view('pages.restaurant.sale.foodMenu.edit', compact('food_menu_details', 'food_menu_ingredients', 'ingredients', 'categories', 'shifts', 'panels', 'vats'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu.index');
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
    //    return $request->all();
        $rules = array(
            'name' => 'required',
            'code' => 'required',
            'category_id' => 'required|numeric',
            'dine_in_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'take_away_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'delivery_order_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'shift_id' => 'required',
            'panel_id' => 'required|numeric',
            'veg_item' => 'required',
            //this field was remove from the system
            // 'beverage_item' => 'required',
            'tax_field_percentage.*' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        );

        $request->photo ? $rules['photo'] = 'image|mimes:jpeg,png,jpg' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store

            // if (is_countable($request->input('tax_field_percentage'))) {
            //     $taxInfo = [];
            //     for ($i = 0; $i < count($request->input('tax_field_percentage')); $i++) {
            //         $object = new stdClass();
            //         $object->tax_field_id = $request->tax_field_id[$i];
            //         $object->tax_field_name = $request->tax_field_name[$i];
            //         $object->tax_field_percentage = $request->tax_field_percentage[$i];
            //         $taxInfo[] = $object;
            //     }
            // }

            $taxInfo = [];
            if ($request->vat_tax ) {
                $t = RestaurantSettingsTaxField::find($request->vat_tax);
                $object = new stdClass();
                $object->tax_field_id = $t->id;
                $object->tax_field_name = $t->name;
                $object->tax_field_percentage = $t->rate;
                $taxInfo[] = $object;
            }

            //logo
            $logoNameToStore = RestaurantFoodMenu::find($id)->photo;
            if ($request->hasFile('photo')) {
                $path = base_path('media/restaurant/photos');

                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $image = $request->file('photo');
                $filename = $image->getClientOriginalName();
                $logoNameToStore = time() . "_" . $filename;
                $image->move(base_path('\media\restaurant\photos'), $logoNameToStore);
            }

            $menu = RestaurantFoodMenu::find($id);
            $menu->name = $request->name;
            $menu->code = $request->code;
            $menu->cat_id = $request->category_id;
            $menu->dine_in_price = $request->dine_in_price;
            $menu->take_away_price = $request->take_away_price;
            $menu->delivery_order_price = $request->delivery_order_price;
            //this field has many to many relation
            // $menu->shift_id = $request->shift_id;
            $menu->panel_id = $request->panel_id;
            $menu->description = $request->description;
            $menu->veg_item = $request->veg_item;
            //this fields was remove from the system
            // $menu->beverage = $request->beverage_item;
            $menu->tax_info = !empty($taxInfo) ? json_encode($taxInfo, true) : null;
            $menu->photo = $logoNameToStore;
            $menu->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $menu->user_id = Auth::guard('restaurantUser')->id();
            $menu->save();

            if (is_countable($request->input('ingredient_id'))) {
                if (RestaurantFoodMenuIngredient::where('food_menu_id', $id)->get()) {
                    RestaurantFoodMenuIngredient::where('food_menu_id', $id)->update(['del_status' => 'Deleted']);
                }
                for ($i = 0; $i < count($request->input('ingredient_id')); $i++) {
                    $menuIngredient = new RestaurantFoodMenuIngredient();
                    $menuIngredient->ing_id = $request->ingredient_id[$i];
                    $menuIngredient->consumption = $request->consumption[$i];
                    $menuIngredient->food_menu_id = $menu->id;
                    $menuIngredient->save();
                }
            }

            if (is_countable($request->input('shift_id'))) {
                if (RestaurantShiftForFoodMenu::where('fd_menu_id', $id)->get()) {
                    RestaurantShiftForFoodMenu::where('fd_menu_id', $id)->delete();
                }
                for ($i = 0; $i < count($request->input('shift_id')); $i++) {
                    $menu_shift = new RestaurantShiftForFoodMenu();
                    $menu_shift->shift_id = $request->shift_id[$i];
                    $menu_shift->fd_menu_id = $menu->id;
                    $menu_shift->save();
                }
            }

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('food-menu.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenu::find($id)->user_id) {
            $menu = RestaurantFoodMenu::find($id);
            if ($menu) {
                $menu = RestaurantFoodMenu::find($id);
                $menu->del_status = "Deleted";
                $menu->save();

                RestaurantFoodMenuIngredient::where('food_menu_id', $id)->update(['del_status' => 'Deleted']);

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('food-menu.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('food-menu.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function assignModifier($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenu::find($id)->user_id) {
            $food_menu_details = RestaurantFoodMenu::with('categoryInfo')->find($id);
            $food_menu_modifiers_list = DB::table('tbl_restaurant_modifier_for_food_menus')->where('fd_menu_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->pluck('mdf_id')->toArray();
            $food_menu_modifiers = RestaurantModifierForFoodMenu::where('fd_menu_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
//            return gettype($food_menu_modifiers);
            $modifiers = RestaurantFoodMenuModifier::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
//            return $food_menu_ingredients;

            return view('pages.restaurant.sale.foodMenu.assignModifier', compact('food_menu_details', 'food_menu_modifiers_list', 'food_menu_modifiers', 'modifiers'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu.index');
        }
    }

    public function updateAssignModifier(Request $request, $id)
    {
//        return \request()->all();
        if (is_countable($request->input('modifier_id'))) {
            if (RestaurantModifierForFoodMenu::where('fd_menu_id', $id)->get()) {
                //RestaurantModifierForFoodMenu::where('fd_menu_id', $id)->update(['del_status' => 'Deleted']);
                RestaurantModifierForFoodMenu::where('fd_menu_id', $id)->delete();
            }
            for ($i = 0; $i < count($request->input('modifier_id')); $i++) {
                $modifier = new RestaurantModifierForFoodMenu();
                $modifier->mdf_id = $request->modifier_id[$i];
                $modifier->fd_menu_id = $id;
                $modifier->save();
            }
        } else {
            if (RestaurantModifierForFoodMenu::where('fd_menu_id', $id)->get()) {
                //RestaurantModifierForFoodMenu::where('fd_menu_id', $id)->update(['del_status' => 'Deleted']);
                RestaurantModifierForFoodMenu::where('fd_menu_id', $id)->delete();
            }
        }

        toastr()->success('Updated successfully.');
        // redirect
        return redirect()->route('food-menu.index');
    }
}
