<?php

namespace App\Http\Controllers\AdminPanel;

use App\Shop;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdminGroup;

class AddShopsController extends Controller
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
    public function index()
    {
        return view('adminpanel.addshops');
    }

    public function shop_verification_data(array $data)
    {
        $message = [
            'title.required' => __('controller_adminpanel.new_shop_title'),
            'seller.required' => __('controller_adminpanel.new_shop_seller'),
            'category.required' => __('controller_adminpanel.new_shop_category'),
            'rating.required' => __('controller_adminpanel.new_shop_rating'),
            'price.required' => __('controller_adminpanel.new_shop_price'),
            'selling_price.required' => __('controller_adminpanel.new_shop_selling_price'),
            'quantity_in_stock.required' => __('controller_adminpanel.new_shop_quantity_in_stock'),
            'quantity_sold.required' => __('controller_adminpanel.new_shop_quantity_sold'),
            'minimum_balance.required' => __('controller_adminpanel.new_shop_minimum_balance'),
            'minimum_bet.required' => __('controller_adminpanel.new_shop_minimum_bet'),
            'percent.required' => __('controller_adminpanel.new_shop_percent'),
            'period_percent.required' => __('controller_adminpanel.new_shop_period_percent'),
            'period_referral_percentage.required' => __('controller_adminpanel.new_shop_period_referral_percentage'),
            'referral_percentage.required' => __('controller_adminpanel.new_shop_referral_percentage'),
            'quantity_per_day.required' => __('controller_adminpanel.new_shop_quantity_per_day'),
            'quantity_per_week.required' => __('controller_adminpanel.new_shop_quantity_per_week'),
            'quantity_per_month.required' => __('controller_adminpanel.new_shop_quantity_per_month'),
            'profit_per_day.required' => __('controller_adminpanel.new_shop_profit_per_day'),
            'profit_per_week.required' => __('controller_adminpanel.new_shop_profit_per_week'),
            'profit_per_month.required' => __('controller_adminpanel.new_shop_profit_per_month'),
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
            'period_percent' => 'required|between:0,9999999',
            'referral_percentage' => 'required|between:0.00,100.00',
            'period_referral_percentage' => 'required|between:0,9999999',
            'quantity_per_day' => 'required|between:0,9999999',
            'quantity_per_week' => 'required|between:0,9999999',
            'quantity_per_month' => 'required|between:0,9999999',
            'profit_per_day' => 'required|between:0.00,9999999.00',
            'profit_per_week' => 'required|between:0.00,9999999.00',
            'profit_per_month' => 'required|between:0.00,9999999.00',
        ], $message);

        return $validator;
    }

    public function addShop(Request $request)
    {
        $request_data = $request->All();
        $validator = $this->shop_verification_data($request_data);
        if($validator->fails()){
            return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }else {
            $new_shop = Shop::create([
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
            if ($new_shop) {
                return response()->json(array('success' => __('controller_adminpanel.add_shop_success')), 200);
            }else {
                return response()->json(array('error' => [__('controller_adminpanel.standard_error')]), 400);
            }
        }
    }
}
