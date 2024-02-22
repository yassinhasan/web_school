<?php
namespace  App\Http\Services;

use App\Http\Services\PaymentMethod;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;

class  PayWith{

    public $headers;
    public $client;
    public $paymentMethod;
    public function __construct(PaymentMethod $PaymentMethod)
    {
        $this->paymentMethod = $PaymentMethod;
        $this->client = new Client();
        $this->headers = [
            'Authorization' => 'Bearer '.$this->paymentMethod->access_token,
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
        ];

    }

    public  function pay()
    {

       return  $this->paymentMethod->generatePayment();
    }
}
