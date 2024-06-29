<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    private $pagePath = "frontend.pages.";

    public function index()
    {
        $data['productsData']=Product::all();
        return view($this->pagePath.'home.home',$data);
    }

    public function productDetails($slug)
    {
        $data['product']=Product::where('slug',$slug)->first();
        return view($this->pagePath.'product.product-details',$data);
    }

    public function payment()
    {
//
//        $khalti_key = env("KHALTI_SECRET_KEY");
//        dd($khalti_key);
//
//
//
//        die();
        $curl = curl_init();
        $env = config('app.env');

        $redirect_url = route('payment-success');
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
    "return_url": "' . $redirect_url . '",
    "website_url": "https://example.com/",
    "amount": "1000",
    "purchase_order_id": "Order01",
        "purchase_order_name": "test",

    "customer_info": {
        "name": "Test Bahadur",
        "email": "test@khalti.com",
        "phone": "9800000001"
    }
    }

    ',
            CURLOPT_HTTPHEADER => array(
                'Authorization: key 27f2e85cb2c64e7a8d6073309094c3a9',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

    }

    public function paymentSuccess(Request $request)
    {
        $data = $request->all();
        dd($data);

    }


}
