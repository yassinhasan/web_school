<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\FatoorahPay;
use App\Http\Services\PayWith;
use App\Models\Setting;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{

    public function index()
    {


        $collection = Setting::all();
        $settings = $collection->flatMap(function($collection){
            return [$collection->key => $collection->value];
        });

        return view('home.home')->with('settings',$settings);
    }

    public function pay()
    {
        $postFields = [
            //Fill required data
            'InvoiceValue'       => 150,
            'CustomerName'       => 'hasan meady',
            'NotificationOption' => 'LNK', //'SMS', 'EML', or 'ALL'
                //Fill optional data
                'DisplayCurrencyIso' => 'SAR',
                //'MobileCountryCode'  => $phone[0],
                //'CustomerMobile'     => $phone[1],
                'CustomerEmail'      => 'figo781@gmail.com',
                'CallBackUrl'        => 'http://localhost:8000/callback',
                'ErrorUrl'           => 'http://localhost:8000/error', //or 'https://example.com/error.php'
                'Language'           => 'en', //or 'ar'
                //'CustomerReference'  => 'orderId',
                //'CustomerCivilId'    => 'CivilId',
                //'UserDefinedField'   => 'This could be string, number, or array',
                //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
                //'CustomerAddress'    => $customerAddress,
                //'InvoiceItems'       => $invoiceItems,
                //'Suppliers'          => $suppliers,
        ];
        $fatorah =   new PayWith(new FatoorahPay($postFields));
        $pay = $fatorah->pay();
       // dd($pay);
        if($pay['Data']['InvoiceId'] != null)
        {
            return Redirect::to($pay['Data']['InvoiceURL']);
        }
    }

    public function callback()
    {
        echo "done";
    }
    public function error()
    {
        echo "error";
    }
}
