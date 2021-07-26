<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['XSS']], function () {
    //for sms test purpose
    Route::get('/sms', 'SmsController@sendSms')->name('sms');

    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/browse-restaurant', 'IndexController@browseRestaurant')->name('browseRestaurant');
    Route::get('/featured-restaurant-by-ajax', 'IndexController@featuredRestaurantByAjax')->name('featuredRestaurantByAjax');
    Route::get('/restaurant-by-ajax', 'IndexController@restaurantByAjax')->name('restaurantByAjax');
    Route::get('/show-restaurant/{slug}', 'IndexController@restaurant')->name('restaurant.single');
    Route::get('/show-floor-with-tables-ajax', 'IndexController@getFloorWithTable');


    Route::get('/get-food-meny-by-ajax', 'IndexController@getFoodMenuByAjax')->name('getFoodMenuByAjax');


    Route::get('/cuisine', 'IndexController@restaurantByCuisine')->name('restaurantByCuisine');
    Route::get('/cuisine-restaurant-by-ajax', 'IndexController@cuisineRestaurantByAjax')->name('cuisineRestaurantByAjax');

    //Delivery option
    Route::post('/set-delivery-option-by-ajax', 'IndexController@deliveryOption')->name('deliveryOption');


    //cart
    Route::post('/add-to-cart-by-ajax', 'OnlineCartController@addToCartByAjax')->name('addToCartByAjax');
    Route::post('/edit-to-cart-by-ajax', 'OnlineCartController@editToCartByAjax')->name('editToCartByAjax');
    Route::post('/delete-from-cart-by-ajax', 'OnlineCartController@deleteFromCartByAjax')->name('deleteFromCartByAjax');





    Route::group(['prefix' => 'SuperAdmin'], function () {
        Route::get('/payment','SuperAdminPaymentController@payment')->name('superAdmin.payment');
        Route::get('/addpayment','SuperAdminPaymentController@addPayment')->name('superAdmin.addPayment');

        Route::get('/report','SuperAdminPaymentController@report')->name('superAdmin.report');

        //ROLE Controller//
        Route::get('/role','SuperAdminRoleController@role')->name('superAdmin.role');
        Route::get('/add_role','SuperAdminRoleController@addrole')->name('superAdmin.add_role');
        Route::post('/role_insert','SuperAdminRoleController@roleinsert')->name('superAdmin.role_insert');
        Route::get('/Edit-Role/{id}','SuperAdminRoleController@edit_role')->name('Edit-Role');
        Route::get('/Delete-Role/{id}','SuperAdminRoleController@delete_role')->name('Delete-Role');
        Route::post('/update-role', 'SuperAdminRoleController@updaterole')->name('update-role');


        //-----Active Restaurant -------------
        Route::get('/active-restaurant','SuperAdminRoleController@activerestaurant')->name('superAdmin.active-restaurant');
        Route::get('/status-update/{id}','SuperAdminRoleController@updatestatus')->name('superAdmin.status-update');

        //------------Add New Restaurant--------
        Route::get('/add-new-restaurant','SuperAdminRoleController@showForm')->name('superAdmin.add-new-restaurant');
        Route::post('/add-rs','SuperAdminRoleController@addnewRestaurant')->name('add-rs');





        // --------Restaurant List ------------------
        Route::get('/supr-restaurant-list','SuperAdminRoleController@restaurantlist')->name('supr-restaurant-list');
        Route::get('/Restaurant-role/{id}','SuperAdminRoleController@restaurantRole')->name('superAdmin.Restaurant-role');
        Route::get('/Payment-res/{id}','SuperAdminRoleController@paymentRes')->name('SuperAdmin/Payment-res');
        Route::post('/res-Payment-add','SuperAdminRoleController@addpaymentRes')->name('res-Payment-add');






        //------------Payment Getway to Restaurant------------------------
        Route::get('/Payment-Restaurant','SuperAdminRoleController@PaymentGetwaytoRestaurant')->name('Payment-Restaurant');
        Route::post('/add-Payment-Restaurant','SuperAdminRoleController@addPaymentGateway')->name('add-Payment-Restaurant');
        Route::post('/active-Payment-Restaurant','SuperAdminRoleController@activePaymentRestaurant')->name('active-Payment-Restaurant');
       // Route::post('/active-Restaurant-acp','SuperAdminRoleController@activeRestaurantAcp')->name('active-Restaurant-acp');


        //--------------Email Settings--------------------
        Route::get('/Email-Settings','SuperAdminRoleController@EmailSettings')->name('Email-Settings');


        //-------------------SMS-Settings

        Route::get('/SMS-Settings','SuperAdminRoleController@smsSettings')->name('SMS-Settings');



        //-----Restaurant Report-------------
    Route::get('/report-restaurant','SuperAdminRoleController@restaurantreport')->name('superAdmin.restaurant-report');


       // Route::post('/add-permissions', 'SuperAdminRoleController@addpermissions')->name('add-permissions');




//------------------STAFF-------------------//
        Route::get('/Staff','SuperAdminRoleController@staff')->name('superAdmin.Staff');
        Route::post('/add-staff','SuperAdminRoleController@addstaff')->name('superAdmin.add-staff');





        Route::get('/SALogin', 'SuperAdminAuthController@showLoginForm')->name('superAdmin.showLoginForm');
        Route::post('/SALogin', 'SuperAdminAuthController@doLogin')->name('superAdmin.doLogin');

        Route::get('/logout', 'SuperAdminAuthController@logout')->name('superAdmin.logout');

        Route::get('/dashboard', 'SuperAdminDashboardController@dashboard')->name('superAdmin.dashboard');

        //all ---------------------
        Route::get('/other_list', 'SuperAdminDashboardController@otherlist')->name('superAdmin.other_list');
        Route::get('/All-Service', 'SuperAdminDashboardController@allService')->name('superAdmin.All-Service');
        Route::get('/Sale', 'SuperAdminDashboardController@sale')->name('superAdmin.Sale');
        Route::get('/Inventory', 'SuperAdminDashboardController@inventory')->name('superAdmin.Inventory');
        Route::get('/Inventory_Adjustment', 'SuperAdminDashboardController@inventoryadjustment')->name('superAdmin.Inventory_Adjustment');
        Route::get('/waste', 'SuperAdminDashboardController@waste')->name('superAdmin.waste');







        Route::group(['prefix' => 'settings'], function () {

            Route::get('', 'SuperAdminSettingsController@index')->name('superAdmin.settings');

            Route::resource('countries', 'CountriesController');
            Route::get('countries/{id}/delete', 'CountriesController@delete')->name('countries.delete');
            Route::post('countries-csv', 'CountriesController@csvadd')->name('countries.csv');


            Route::resource('states', 'StatesController');
            Route::get('states/{id}/delete', 'StatesController@delete')->name('states.delete');

            Route::resource('cities', 'CitiesController');
            Route::get('cities/{id}/delete', 'CitiesController@delete')->name('cities.delete');

            Route::resource('cuisines', 'CuisinesController');
            Route::get('cuisines/{id}/delete', 'CuisinesController@delete')->name('cuisines.delete');

            Route::get('privacy-policy', 'PrivacyPoliciesController@show')->name('privacyPolicies.show');
            Route::put('privacy-policy/{id}', 'PrivacyPoliciesController@update')->name('privacyPolicies.update');

            Route::resource('social-media', 'SocialMediaController');
            Route::get('social-media/{id}/delete', 'SocialMediaController@delete')->name('social-media.delete');

            Route::resource('third-party-vendors', 'ThirdPartyVendorsController');
            Route::get('third-party-vendors/{id}/delete', 'ThirdPartyVendorsController@delete')->name('third-party-vendors.delete');

            Route::resource('charges', 'ChargesController');
            Route::get('charges/{id}/delete', 'ChargesController@delete')->name('charges.delete');



        });

        Route::get('/restaurant-list', 'SuperAdminRestaurantsController@restaurantList')->name('superAdmin.restaurantList');
        Route::get('/restaurant-list/{id}', 'SuperAdminRestaurantsController@viewDetail')->name('superAdmin.restaurantList.viewDetail');
        Route::get('/restaurant-list/{id}/approve', 'SuperAdminRestaurantsController@approve')->name('superAdmin.restaurantList.approve');
        Route::get('/restaurant-list/{id}/disapprove', 'SuperAdminRestaurantsController@disapprove')->name('superAdmin.restaurantList.disapprove');

        Route::get('/restaurant-list/{id}/featured', 'SuperAdminRestaurantsController@featured')->name('superAdmin.restaurantList.featured');
        Route::get('/restaurant-list/{id}/non-featured', 'SuperAdminRestaurantsController@nonFeatured')->name('superAdmin.restaurantList.nonFeatured');

        Route::get('/restaurant-list/{id}/delete', 'SuperAdminRestaurantsController@delete')->name('superAdmin.restaurantList.delete');

        Route::post('/add-restaurant-charge-by-ajax', 'SuperAdminRestaurantsController@addRestaurantChargeByAjax')->name('superAdmin.addRestaurantChargeByAjax');

        Route::post('/edit-restaurant-charge-by-ajax', 'SuperAdminRestaurantsController@editRestaurantChargeByAjax')->name('superAdmin.editRestaurantChargeByAjax');


    });

    Route::group(['prefix' => 'restaurant'], function () {
        Route::get('/sign-up', 'RestaurantAuthController@showSignUpForm')->name('restaurant.showSignUpForm');
        Route::post('/sign-up', 'RestaurantAuthController@doSignUp')->name('restaurant.doSignUp');
        Route::get('/verify/{token}', 'RestaurantVerifyController@restaurantVerifyEmail')->name('restaurant.verifyEmail');
        Route::get('/login', 'RestaurantAuthController@showLoginForm')->name('restaurant.showLoginForm');
        Route::post('/login', 'RestaurantAuthController@doLogin')->name('restaurant.doLogin');
        Route::get('/logout', 'RestaurantAuthController@logout')->name('restaurant.logout');
        Route::get('/home', 'RestaurantHomeController@home')->name('restaurant.home');




        //----Staff Restaurant--------
        Route::get('/staff-restaurant', 'RestaurantHomeController@staff')->name('restaurant.staff');
        Route::post('/add-staff','RestaurantHomeController@addstaff')->name('restaurant.add-staff');
        Route::get('/all-staff-restaurant', 'RestaurantHomeController@allstaff')->name('all-staff-restaurant');
        Route::get('/Delete-Staff/{id}', 'RestaurantHomeController@deletestaff')->name('Delete-Staff');
        Route::get('/Edit-staff/{id}','RestaurantHomeController@editstaff')->name('Edit-staff');
        Route::post('/update-staff/','RestaurantHomeController@updatesatff')->name('update-staff');

        //RestaurantHome ROLE Controller//
        Route::get('/role','RestaurantHomeController@rsRole')->name('role');
        Route::get('/add_roles','RestaurantHomeController@rsAddrole')->name('add_roles');
        Route::post('/role_insert','RestaurantHomeController@rsRoleinsert')->name('role_insert');
        Route::get('/Edit-Role/{id}','RestaurantHomeController@rsEditrole')->name('Edit-Role');
        Route::get('/Delete-Role/{id}','RestaurantHomeController@rsDeletRrole')->name('Delete-Role');
        Route::post('/update-role', 'SuperAdminRoleController@rsUpdaterole')->name('update-role');


        Route::post('/add-permissions', 'RestaurantHomeController@permissions')->name('add-permissions');
        Route::get('/show-json/{id}', 'RestaurantHomeController@showjson')->name('show-json');

        //_____ Profile Update _______

        Route::get('/profile-update', 'RestaurantHomeController@profileshow')->name('profile-update');
        Route::post('/update-profile', 'RestaurantHomeController@updateprofile')->name('update-profile');

      //---------- Payment Active-------------
        Route::get('/Payment-Active', 'RestaurantHomeController@PaymentActive')->name('Payment-Active');



        //_____________Company Update________________
        Route::get('/Company-update', 'RestaurantHomeController@companyshow')->name('Company-update');
        Route::post('/Update-Company', 'RestaurantHomeController@updatecompany')->name('Update-Company');




        Route::group(['prefix' => 'settings'], function () {
            Route::get('', 'RestaurantSettingsController@showSettings')->name('restaurant.showSettings');
            Route::post('', 'RestaurantSettingsController@updateSettings')->name('restaurant.updateSettings');
            Route::post('add-third-party-vendors', 'RestaurantSettingsController@addThirdPartyVendor')->name('restaurant.addThirdPartyVendor');
            Route::post('change-third-party-vendor-availability-by-ajax', 'RestaurantSettingsController@changeThirdPartyVendorAvailabilityByAjax')->name('restaurant.changeThirdPartyVendorAvailabilityByAjax');

            Route::post('add-cuisines', 'RestaurantSettingsController@addCuisine')->name('restaurant.addCuisine');

        });

        Route::group(['prefix' => 'purchase'], function () {
            Route::resource('suppliers', 'RestaurantSuppliersController');
            Route::get('/suppliers/{id}/delete', 'RestaurantSuppliersController@delete')->name('suppliers.delete');
            Route::post('/suppliers/send-text-mail', 'RestaurantSuppliersController@sendTextMail');


            Route::get('/supplier_details/{id}','RestaurantSuppliersController@detailsAll')->name('supplier_details');

            Route::get('/supplier_delete/{id}','RestaurantSuppliersController@supplierdelete')->name('supplier_delete');

            Route::get('/supplier_food/{id}','RestaurantSuppliersController@supplier_food')->name('supplier_food');

            //---------Add Email Template
            Route::get('/add_template','RestaurantSuppliersController@EmailTemplate')->name('add_template');
            Route::post('/add_mail_template','RestaurantSuppliersController@AddEmailTemplate')->name('add_mail_template');
            Route::get('/Delete-email/{id}', 'RestaurantSuppliersController@deletemail')->name('Delete-email');
            Route::get('/Edit-Email/{id}','RestaurantSuppliersController@editemail')->name('Edit-Email');
            Route::post('/update-Email','RestaurantSuppliersController@updatemail')->name('update-Email');

            //--------------Payment Gateway-----------
            Route::get('/payment-gateway','RestaurantSuppliersController@paymentgateway')->name('payment-gateway');
            Route::post('/add-payment-gateway','RestaurantSuppliersController@addpaymentgateway')->name('add-payment-gateway');
            Route::post('/active-payment-gateway','RestaurantSuppliersController@activepaymentgateway')->name('active-payment-gateway');


            Route::resource('ingredient-categories', 'RestaurantIngredientCategoriesController');
            //Route::get('/purchase/ingredients{id}/delete', 'RestaurantIngredientCategoriesController@delete')->name('ingredient-categories.delete');
            Route::get('/ingredients-delete/{id}', 'RestaurantIngredientCategoriesController@delete')->name('ingredients-delete.delete');

            Route::resource('ingredient-units', 'RestaurantIngredientUnitsController');
            Route::get('/ingredient-units/{id}/delete', 'RestaurantIngredientUnitsController@delete')->name('ingredient-units.delete');

            Route::get('/ingredients/upload', 'RestaurantIngredientsController@upload')->name('ingredients.upload');
            Route::post('/ingredients/upload', 'RestaurantIngredientsController@import')->name('ingredients.import');
            Route::get('/ingredients/download-sample-file', 'RestaurantIngredientsController@downloadSampleFile')->name('ingredients.downloadSampleFile');
            Route::resource('ingredients', 'RestaurantIngredientsController');
            Route::get('/ingredients/{id}/delete', 'RestaurantIngredientsController@delete')->name('ingredients.delete');

            Route::resource('purchases', 'RestaurantPurchasesController');
            Route::get('/purchases/{id}/delete', 'RestaurantPurchasesController@delete')->name('purchases.delete');
            Route::post('/purchases/supplier/create', 'RestaurantPurchasesController@createSupplier');
            Route::get('/purchases_details/{id}','RestaurantPurchasesController@detailsAll')->name('purchases_details');
            Route::get('/purchases_single/{id}', 'RestaurantPurchasesController@deletepurchases')->name('purchases_single.delete');
            Route::get('/purchases_modify/{id}','RestaurantPurchasesController@purchasesmodifys')->name('purchases_modify');
            Route::post('/modify_update','RestaurantPurchasesController@updatemodifys')->name('update.modify_update');






        });

        Route::group(['prefix' => 'sale'], function () {

            Route::resource('customer-groups', 'RestaurantCustomerGroupController');
            Route::get('/customer-groups/{id}/delete', 'RestaurantCustomerGroupController@delete')->name('customer-groups.delete');

            Route::resource('customers', 'RestaurantCustomersController');
            Route::get('/customers/{id}/delete', 'RestaurantCustomersController@delete')->name('customers.delete');

            Route::post('/add_customer_by_ajax', 'RestaurantCustomersController@addCustomerByAjax');
            Route::get('/get_all_customers_for_this_user', 'RestaurantCustomersController@getAllCustomerByAjax');
            Route::post('/get_customer_ajax', 'RestaurantCustomersController@getCustomerByAjax');

            Route::post('/customers/send-text-mail', 'RestaurantCustomersController@sendTextMail');

            Route::resource('food-menu-shifts', 'RestaurantFoodMenuShiftsController');
            Route::get('/food-menu-shifts/{id}/delete', 'RestaurantFoodMenuShiftsController@delete')->name('food-menu-shifts.delete');

            Route::resource('food-menu-categories', 'RestaurantFoodMenuCategoriesController');
            Route::get('/food-menu-categories/{id}/delete', 'RestaurantFoodMenuCategoriesController@delete')->name('food-menu-categories.delete');

            Route::get('/subcategory','RestaurantFoodMenuCategoriesController@subcategorys')->name('food-menu-categories.subcategory');
            Route::get('/subcreate','RestaurantFoodMenuCategoriesController@subcreate')->name('food-menu-categories.subcreate');
            Route::get('/Add-Category/{id}','RestaurantFoodMenuCategoriesController@add_category')->name('Add-Category');
            Route::get('/Delete-Sub-Category/{id}','RestaurantFoodMenuCategoriesController@delete_sub_catagory')->name('Delete-Sub-Category');
            Route::get('/Delete-Category/{id}','RestaurantFoodMenuCategoriesController@delete_catagory')->name('Delete-Category');
            Route::get('/Edit-Category/{id}','RestaurantFoodMenuCategoriesController@edit_catagory')->name('Edit-Category');
            Route::post('/subcatagory_insert','RestaurantFoodMenuCategoriesController@subcatagory_insert')->name('subcatagory_insert');
            Route::post('/Catagory_Edit','RestaurantFoodMenuCategoriesController@subcatagory_edit')->name('Catagory_Edit');

            Route::get('/supplier_due','RestaurantFoodMenuCategoriesController@supplier_dues')->name('supplier_due');
            Route::get('/add_supplier_due','RestaurantFoodMenuCategoriesController@add_supplier_due')->name('add_supplier_due');
            Route::get('/Due_Payments_details/{id}','RestaurantFoodMenuCategoriesController@DuePaymentsdetails')->name('Due_Payments_details');
            Route::get('/Delete-payment/{id}','RestaurantFoodMenuCategoriesController@Deletepayment')->name('Delete-payment');





            Route::post('/food-menu-SubCatagory.insert', 'RestaurantFoodMenuCategoriesController@save_subcatagory')->name('food-menu-SubCatagory.insert');

            //------- ajax find total supplier due
            Route::get('/total_supplier_due/{id}','RestaurantFoodMenuCategoriesController@total_supplier_due')->name('total_supplier_due.ajax');
            Route::post('/add_fin_pay','RestaurantFoodMenuCategoriesController@addfinalpayment')->name('add_fin_pay.insert');
            Route::get('/fin_pay/{id}','RestaurantFoodMenuCategoriesController@finpay')->name('fin_pay');
            Route::post('/update_due','RestaurantFoodMenuCategoriesController@supdueupdate')->name('update_due');



            //Payment Method Controller
            Route::get('/payment-method','RestaurantFoodMenuCategoriesController@paymentmethod')->name('payment-method');
            Route::get('/add-method','RestaurantFoodMenuCategoriesController@addmethod')->name('add-method');
            Route::post('/pay-method','RestaurantFoodMenuCategoriesController@paymethod')->name('pay-method');
            Route::get('/Delete-Methord/{id}', 'RestaurantFoodMenuCategoriesController@deletemethod')->name('Delete-Methord');
            Route::get('/Edit-Methord/{id}','RestaurantFoodMenuCategoriesController@editMethord')->name('Edit-Methord');
            Route::post('/update-Methord', 'RestaurantFoodMenuCategoriesController@updateMethod')->name('update-Methord');


            Route::resource('food-menu-modifiers', 'RestaurantFoodMenuModifiersController');
            Route::get('/food-menu-modifiers/{id}/delete', 'RestaurantFoodMenuModifiersController@delete')->name('food-menu-modifiers.delete');

            Route::resource('kitchen-panels', 'RestaurantKitchenPanelsController');
            Route::get('/kitchen-panels/{id}/delete', 'RestaurantKitchenPanelsController@delete')->name('kitchen-panels.delete');

            Route::resource('food-menu', 'RestaurantFoodMenuController');
            Route::get('/food-menu/{id}/assign-modifier', 'RestaurantFoodMenuController@assignModifier')->name('food-menu.assign-modifier');
            Route::put('/food-menu/{id}/assign-modifier', 'RestaurantFoodMenuController@updateAssignModifier')->name('food-menu.update-assign-modifier');
            Route::get('/food-menu/{id}/delete', 'RestaurantFoodMenuController@delete')->name('food-menu.delete');

            Route::resource('floors', 'RestaurantFloorController');
            Route::get('/floors/{id}/delete', 'RestaurantFloorController@delete')->name('floors.delete');
            Route::get('/floors/edit/{id}', 'RestaurantFloorController@edit')->name('floors.edit');
            Route::get('/floors/update/{id}', 'RestaurantFloorController@update')->name('floors.update');
            Route::post('/update/floors/{id}', 'RestaurantFloorController@updatefloor')->name('update.floors');


            //------------Wastes Report---------------
            Route::get('/Waste-Report', 'RestaurantFloorController@WasteReport')->name('Waste-Report');
            Route::get('/Details-WasteReport/{id}', 'RestaurantFloorController@DetailsWasteReport')->name('Details-WasteReport');


            //------Expense-Report
            Route::get('/Expense-Report', 'RestaurantFloorController@ExpenseReport')->name('Expense-Report');
            Route::get('/Details-Expense-Report/{id}', 'RestaurantFloorController@DetailsExpenseReport')->name('Details-Expense-Report');


            //------------Purchase-Report----------------------

            Route::get('/Purchase-Report','RestaurantFloorController@purchaseReport')->name('Purchase-Report');

            //-----------Record Payment----------------

            Route::get('/Record-Payment','RestaurantFloorController@recordPayment')->name('Record-Payment');







           // Route::get('/Waste-Report', 'RestaurantFloorController@DetailsfoodsaleReport')->name('Details-foodsaleReport');





            Route::resource('floor-tables', 'RestaurantFloorTableController', ['except' => 'create']);
            Route::get('/floor-tables/{floorId}/create', 'RestaurantFloorTableController@create')->name('floor-tables.create');
            Route::get('/floor-tables/{id}/delete', 'RestaurantFloorTableController@delete')->name('floor-tables.delete');




            // Route::put('floor-tables/table-position', [
            //     'as' => 'table.position',
            //     'uses' => 'RestaurantFloorTableController@tablePosition'
            // ]);

            Route::resource('sales', 'RestaurantSaleController');
            // Route::post('/sales/filter', 'RestaurantSaleController@filter')->name('sales.filter');

            Route::get('/sales/{id}/delete', 'RestaurantSaleController@delete')->name('sales.delete');
            Route::post('/add_sale_by_ajax', 'RestaurantSaleController@addSaleByAjax');

            Route::post('/update_order_status_ajax', 'RestaurantSaleController@updateOrderStatusByAjax');

            Route::get('/get_new_orders_ajax', 'RestaurantSaleController@getNewOrdersByAjax');
            Route::post('/get_all_information_of_a_sale_ajax', 'RestaurantSaleController@getInformationOfSaleByAjax');

            Route::post('/cancel_particular_order_ajax', 'RestaurantSaleController@deleteSingleOrderByAjax');

            Route::get('/get_new_hold_number_ajax', 'RestaurantSaleController@getNewHoldNumberByAjax');
            Route::post('/add_hold_by_ajax', 'RestaurantSaleController@addHoldByAjax');
            Route::get('/get_all_holds_ajax', 'RestaurantSaleController@getAllHoldsByAjax');
            Route::post('/get_single_hold_info_by_ajax', 'RestaurantSaleController@getSingleHoldInfoByAjax');
            Route::post('/delete_all_information_of_hold_by_ajax', 'RestaurantSaleController@deleteSingleHoldInfoByAjax');
            Route::post('/delete_all_holds_with_information_by_ajax', 'RestaurantSaleController@deleteAllHoldByAjax');

            //online order
            Route::get('/get_all_online_order_ajax', 'RestaurantSaleController@getAllOnlineOrdersByAjax');
            Route::post('/get_single_online_order_info_by_ajax', 'RestaurantSaleController@getSingleOnlineOrderInfoByAjax');
            Route::post('/add_online_order_to_sale_by_ajax', 'RestaurantSaleController@addOnlineOrderToSaleByAjax');

            //Route::post('/delete_all_information_of_online_order_by_ajax', 'RestaurantSaleController@deleteSingleOnlineOrderInfoByAjax');
            //Route::post('/delete_all_online_orders_with_information_by_ajax', 'RestaurantSaleController@deleteAllOnlineOrderByAjax');
            Route::get('/test', 'RestaurantSaleController@test');


            Route::get('/print_bill/{id}', 'RestaurantSaleController@printBill');
            Route::get('/print_invoice/{id}', 'RestaurantSaleController@printInvoice');


            Route::resource('pos', 'RestaurantPosController');
            Route::get('/food-menus-change-for-shift-ajax', 'RestaurantPosController@changeFoodMenus');
            Route::get('/get_floor_with_tables_ajax', 'RestaurantPosController@getFloorWithTable');
            Route::get('/get_all_tables_with_new_status_ajax', 'RestaurantPosController@getAllTablesWithNewStatus');

            Route::post('/get_new_notifications_ajax', 'RestaurantPosController@getNewNotificationByAjax');

            Route::post('/remove_notication_ajax', 'RestaurantPosController@removeNotificationByAjax');
            Route::post('/remove_multiple_notification_ajax', 'RestaurantPosController@removeMultipleNotificationByAjax');
            Route::get('/show_catagory_ajax/{id}', 'RestaurantPosController@show_catagory_ajax');

            Route::get('/show_ajax/{id}', 'RestaurantPosController@showajax');
            //Route::get('/show_food_menu_ajax/{id}', 'RestaurantPosController@show_food_menu_ajax');


          //  Route::get('/pay_pos', 'RestaurantPosController@pay');



            //-------------Register Report
            Route::get('/Register-Report', 'RestaurantSaleController@RegisterReport')->name('Register-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');
            // //-------------Food Sale Report
            Route::get('/Food-Sale-Report', 'RestaurantSaleController@FoodSaleReport')->name('Food-Sale-Report');
            Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');

            //-------------- Daily Sale Report
            Route::get('/Daily-Sale-Report', 'RestaurantSaleController@dailySaleReport')->name('Daily-Sale-Report');
            Route::get('/Daily-Sale-Report-Details/{id}', 'RestaurantSaleController@DailySaleReportDetails')->name('Daily-Sale-Report-Details');

            //-------------- Daily Summary Report
            Route::get('/Daily-Summary-Report', 'RestaurantSaleController@dailySummaryReport')->name('Daily-Summary-Report');
            //Route::get('/Daily-Sale-Report-Details/{id}', 'RestaurantSaleController@DailySaleReportDetails')->name('Daily-Sale-Report-Details');


            //-------------Detailes Sale Report
            Route::get('/Detailed-Sale-Report', 'RestaurantSaleController@DetailedSaleReport')->name('Detailed-Sale-Report');
            Route::get('/Modified-details-foodsaleReport/{id}', 'RestaurantSaleController@ModifieddetailsfoodsaleReport')->name('Modified-details-foodsaleReport');

            //-------------Consumption Report
            Route::get('/Consumption-Report', 'RestaurantSaleController@consumptionReport')->name('Consumption-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');

            //-------------Inventory Report
            Route::get('/Inventory-Report', 'RestaurantSaleController@inventoryReport')->name('Inventory-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');


            //-------------Low Inventory Report
            Route::get('/Low-Inventory-Report', 'RestaurantSaleController@lowinventoryreport')->name('Low-Inventory-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');


            //-------------Profit Loss Report
            Route::get('/Profit-Loss-Report', 'RestaurantSaleController@profitlossreport')->name('Profit-Loss-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');


            //-------------Kitchen Performance Report
            Route::get('/Kitchen-Performance-Report', 'RestaurantSaleController@kitchenperformancereport')->name('Kitchen-Performance-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');

            //-------------Attendance Report
            Route::get('/Attendance-Report', 'RestaurantSaleController@attendancereport')->name('Attendance-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');

            //-------------Supplier Ledger
            Route::get('/Supplier-Ledger', 'RestaurantSaleController@supplierledger')->name('Supplier-Ledger');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');


            //-------------Supplier Due Report
            Route::get('/Supplier-Due-Report', 'RestaurantSaleController@SupplierDueReport')->name('Supplier-Due-Report');
            Route::get('/Details-SupplierDueReport/{id}', 'RestaurantSaleController@DetailsSupplierDueReport')->name('Details-SupplierDueReport');


            //-------------Customer Due
            Route::get('/Customer-Due-Report', 'RestaurantSaleController@customerduereport')->name('Customer-Due-Report');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');

            //-------------Customer Due
            Route::get('/Customer-Ledger', 'RestaurantSaleController@customerledger')->name('Customer-Ledger');
            // Route::get('/Details-foodsaleReport/{id}', 'RestaurantSaleController@DetailsfoodsaleReport')->name('Details-foodsaleReport');

        });

        Route::group(['prefix' => 'kitchen'], function () {
            Route::get('/all-panels', 'RestaurantKitchenPanelsController@allPanels')->name('panels.all');
            Route::get('/panels/{id}', 'RestaurantKitchenPanelsController@singlePanel')->name('panels.singlePanel');

            Route::post('/get_new_orders_ajax', 'RestaurantKitchenPanelsController@getNewOrdersAjax');
            Route::post('/update_cooking_status_ajax', 'RestaurantKitchenPanelsController@updateCookingStatusAjax');
            Route::post('/update_cooking_status_delivery_take_away_ajax', 'RestaurantKitchenPanelsController@updateCookingStatusDeliveryTakeAwayAjax');
            Route::post('/get_new_notifications_ajax', 'RestaurantKitchenPanelsController@getNewNotificationByAjax');
            Route::post('/remove_notication_ajax', 'RestaurantKitchenPanelsController@removeNotificationByAjax');
            Route::post('/remove_multiple_notification_ajax', 'RestaurantKitchenPanelsController@removeMultipleNotificationByAjax');

            Route::get('/inventory_adjustments', 'RestaurantKitchenPanelsController@inventoryadjustments')->name('inventory_adjustments');
            Route::get('/add_inventoryadjustment', 'RestaurantKitchenPanelsController@add_inventoryadjustments')->name('add_inventoryadjustment');
            Route::get('/show_food_menue/{id}', 'RestaurantKitchenPanelsController@show_food_menue')->name('show_food_menue');
            Route::get('/ingredients_src', 'RestaurantKitchenPanelsController@test')->name('ingredients_src');

        });

        Route::group(['prefix' => 'waiter'], function () {
            Route::resource('waiter-panel', 'RestaurantWaiterPanelsController');

        });

        Route::group(['prefix' => 'expense'], function () {
            Route::resource('expense-items', 'RestaurantExpenseItemsController');
            Route::get('/expense-items/{id}/delete', 'RestaurantExpenseItemsController@delete')->name('expense-items.delete');

            Route::resource('expenses', 'RestaurantExpensesController');
            Route::get('/expenses/{id}/delete', 'RestaurantExpensesController@delete')->name('expenses.delete');
            Route::get('/filter', 'RestaurantExpensesController@filter')->name('expenses.filter');

            //// All Expense Category////
            Route::get('/add_expenses_category', 'RestaurantExpensesController@addExpensesCategorys')->name('expenses.add_expenses_category');
            Route::post('/expenses_add_category', 'RestaurantExpensesController@expensesAddCategorys')->name('expenses.expenses_add_category');
            Route::get('/Delete-Expence/{id}','RestaurantExpensesController@delete_expensesCategorys')->name('Delete-Expence');
            Route::get('/Edit-Expence/{id}','RestaurantExpensesController@edit_expensesCategorys')->name('Edit-Expence');



        });

        Route::group(['prefix' => 'waste'], function () {
            Route::resource('wastes', 'RestaurantWastesController');
            Route::get('/wastes/{id}/delete', 'RestaurantWastesController@delete')->name('wastes.delete');
            Route::get('/food_menus_ingredients_by_ajax', 'RestaurantWastesController@getFoodMenusIngredientsByAjax');
        });

        Route::group(['prefix' => ''], function () {
            Route::resource('attendances', 'RestaurantAttendancesController');
            Route::get('/attendances/{id}/delete', 'RestaurantAttendancesController@delete')->name('attendances.delete');
            Route::get('/filter', 'RestaurantAttendancesController@filter')->name('attendances.filter');
            Route::get('/Staff-Attendance', 'RestaurantAttendancesController@staffAttendance')->name('Staff-Attendance');
            Route::post('/add-Attendance', 'RestaurantAttendancesController@addAttendance')->name('add-Attendance');
            Route::get('/Staff-Attendance-all', 'RestaurantAttendancesController@staffAttendanceall')->name('Staff-Attendance-all');

        });

        //Stock
        Route::group(['prefix' => 'stock'], function () {
            Route::resource('stock', 'RestaurantStockController');
            Route::get('/stock-alertlist', 'RestaurantStockController@getStockAlertList')->name('stock-alertlist');
        });


        //Stock Adjustment
        Route::resource('stock-adjustment', 'RestaurantStockAdjustmentsController');
        Route::get('/stock-adjustment/{id}/delete', 'RestaurantStockAdjustmentsController@delete')->name('stock-adjustment.delete');

        //Stock Adjustment
        Route::resource('gift-card', 'RestaurantGiftCardController');
        Route::get('/gift-card/{id}/delete', 'RestaurantGiftCardController@delete')->name('gift-card.delete');

        Route::post('/gift-update', 'RestaurantGiftCardController@giftupdate')->name('gift-update');

        Route::get('/gift-card-sell', 'RestaurantGiftCardController@giftCardSell')->name('gift-card.sell');
        Route::post('/gift-card-sell', 'RestaurantGiftCardController@giftCardSellStore')->name('gift-card.sell-store');
        Route::get('/gift-card-check-by-ajax', 'RestaurantGiftCardController@giftCardCheckByAjax')->name('gift-card.giftCardCheckByAjax');

        Route::get('/reservation', 'RestaurantReservationController@reservation')->name('restaurant.reservation');
        Route::post('/search-floor', 'RestaurantReservationController@search_floor')->name('search-floor');
        Route::post('/reservation/send-text-mail', 'RestaurantReservationController@sendTextMail');
        Route::get('/Add-Reservation', 'RestaurantReservationController@add_reservation')->name('Add-Reservation');
        Route::get('/all-table/{id}', 'RestaurantReservationController@alltable')->name('all-table');
        Route::get('/Online-Reservation', 'RestaurantReservationController@OnlineReservation')->name('Online-Reservation');


        Route::get('/Reserved-Table/{id}', 'RestaurantReservationController@reserved_table')->name('Reserved-Table');
        Route::post('/Table-Resurved', 'RestaurantReservationController@table_resurved')->name('Table-Resurved');

    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/sign-up', 'CustomerAuthController@showSignUpForm')->name('customer.showSignUpForm');
        Route::post('/sign-up', 'CustomerAuthController@doSignUp')->name('customer.doSignUp');

        Route::get('/verify/{token}', 'CustomerAuthController@customerVerifyEmail')->name('customer.verifyEmail');

        Route::get('/login', 'CustomerAuthController@showSignUpForm')->name('customer.showLoginForm');
        Route::post('/login', 'CustomerAuthController@doLogin')->name('customer.doLogin');

        Route::post('/login-by-ajax', 'CustomerAuthController@doLoginByAjax')->name('customer.doLoginByAjax');

        Route::get('/logout', 'CustomerAuthController@logout')->name('customer.logout');
        Route::get('/reset', 'CustomerAuthController@reset')->name('reset');
        Route::post('/reset-pass', 'CustomerAuthController@resetpass')->name('reset-pass');
        Route::get('/Confirm-Password/{code}', 'CustomerAuthController@ConfirmPassword')->name('Confirm-Password');
        Route::post('/Password-Confirm', 'CustomerAuthController@PasswordConfirm')->name('Password-Confirm');


        Route::get('/profile', 'CustomerController@profile')->name('customer.profile');
        Route::post('/profile-picture', 'CustomerController@profilePicture')->name('customer.profilePicture');
        Route::post('/update-profile', 'CustomerController@updateProfile')->name('customer.updateProfile');


        Route::get('/get-address-details-by-ajax', 'CustomerAddressController@detailOfAddress')->name('customer.detailOfAddress');
        Route::post('/store-address', 'CustomerAddressController@storeAddress')->name('customer.storeAddress');
        Route::post('/update-address', 'CustomerAddressController@updateAddress')->name('customer.updateAddress');

        Route::post('/delete-address-by-ajax', 'CustomerAddressController@deleteAddress')->name('customer.deleteAddress');

        Route::post('/checkout', 'CustomerOnlineOrderController@checkout')->name('customer.checkout');
        Route::post('/placed-online-order', 'CustomerOnlineOrderController@placedOnlineOrder')->name('customer.placedOnlineOrder');
        Route::get('/order-success/{id}', 'CustomerOnlineOrderController@orderSuccess')->name('customer.orderSuccess');

        Route::post('/table-reservation', 'CustomerReservationController@tableReservation')->name('table.reservation');



    });

});

// Route::get('aaa',function(){
//     $a = [ 'hello'=>'a', 'c', 'b', 'd' ];
//     return Illuminate\Support\Arr::has($a,"hello")?"true":"false";
// });
