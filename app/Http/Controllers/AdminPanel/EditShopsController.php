<?php

namespace App\Http\Controllers\AdminPanel;

use DB;
use App\Shop;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdminGroup;

class EditShopsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(CheckAdminGroup::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $shop = Shop::where([
            'id' => $id,
            'state' => TRUE
        ])->first();
        if($shop){
            $components = [
                'shop' => $shop
            ];
            return view('adminpanel.editshop', $components);
        }else {
            return abort(404);
        }
    }

    public function shop_verification_data(array $data)
    {
        $message = [
            'title.required' => __('controller_adminpanel.edit_shops_title'),
            'seller.required' => __('controller_adminpanel.edit_shops_seller'),
            'category.required' => __('controller_adminpanel.edit_shops_category'),
            'rating.required' => __('controller_adminpanel.edit_shops_rating'),
            'price.required' => __('controller_adminpanel.edit_shops_price'),
            'selling_price.required' => __('controller_adminpanel.edit_shops_selling_price'),
            'quantity_in_stock.required' => __('controller_adminpanel.edit_shops_quantity_in_stock'),
            'quantity_sold.required' => __('controller_adminpanel.edit_shops_quantity_sold'),
            'minimum_balance.required' => __('controller_adminpanel.edit_shops_minimum_balance'),
            'minimum_bet.required' => __('controller_adminpanel.edit_shops_minimum_bet'),
            'percent.required' => __('controller_adminpanel.edit_shops_percent'),
            'period_percent.required' => __('controller_adminpanel.new_shop_period_percent'),
            'referral_percentage.required' => __('controller_adminpanel.edit_shops_referral_percentage'),
            'period_referral_percentage.required' => __('controller_adminpanel.new_shop_period_referral_percentage'),
            'quantity_per_day.required' => __('controller_adminpanel.edit_shops_quantity_per_day'),
            'quantity_per_week.required' => __('controller_adminpanel.edit_shops_quantity_per_week'),
            'quantity_per_month.required' => __('controller_adminpanel.edit_shops_quantity_per_month'),
            'profit_per_day.required' => __('controller_adminpanel.edit_shops_profit_per_day'),
            'profit_per_week.required' => __('controller_adminpanel.edit_shops_profit_per_week'),
            'profit_per_month.required' => __('controller_adminpanel.edit_shops_profit_per_month'),
        ];
        $validator = Validator::make($data, [
            'title' => 'required|max:250',
            'seller' => 'required|max:250',
            'category' => 'required|max:250',
            'rating' => 'required|between:0.00,5.00',
            'price' => 'required|between:0.00,9999999.00',
            'selling_price' => 'required|between:0.00,9999999.00',
            'quantity_in_stock' => 'required|between:0,9999999',
            'quantity_sold' => 'required|between:0,9999999',
            'minimum_balance' => 'required|between:0.00,9999999.00',
            'minimum_bet' => 'required|between:0.00,9999999.00',
            'percent' => 'required|between:0.00,100.00',
            'period_percent' => 'required|max:250',
            'referral_percentage' => 'required|between:0.00,100.00',
            'period_referral_percentage' => 'required|max:250',
            'quantity_per_day' => 'required|between:0,9999999',
            'quantity_per_week' => 'required|between:0,9999999',
            'quantity_per_month' => 'required|between:0,9999999',
            'profit_per_day' => 'required|between:0.00,9999999.00',
            'profit_per_week' => 'required|between:0.00,9999999.00',
            'profit_per_month' => 'required|between:0.00,9999999.00',
        ], $message);

        return $validator;
    }

    public function editShop(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->shop_verification_data($request_data);
        if($validator->fails()){
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }else {
            $new_shop = Shop::where(['id' => $request_data['id']])
                ->update([
                    'title' => $request_data['title'],
                    'seller' => $request_data['seller'],
                    'category' => $request_data['category'],
                    'rating' => $request_data['rating'],
                    'price' => $request_data['price'],
                    'selling_price' => $request_data['selling_price'],
                    'quantity_in_stock' => $request_data['quantity_in_stock'],
                    'quantity_sold' => $request_data['quantity_sold'],
                    'minimum_balance' => $request_data['minimum_balance'],
                    'minimum_bet' => $request_data['minimum_bet'],
                    'percent' => $request_data['percent'],
                    'period_percent' => $request_data['period_percent'],
                    'referral_percentage' => $request_data['referral_percentage'],
                    'period_referral_percentage' => $request_data['period_referral_percentage'],
                    'quantity_per_day' => $request_data['quantity_per_day'],
                    'quantity_per_week' => $request_data['quantity_per_week'],
                    'quantity_per_month' => $request_data['quantity_per_month'],
                    'profit_per_day' => $request_data['profit_per_day'],
                    'profit_per_week' => $request_data['profit_per_week'],
                    'profit_per_month' => $request_data['profit_per_month'],
                ]);
            return response()->json(array('success' => __('controller_adminpanel.edit_shops_success')), 200);
        }
    }
}
