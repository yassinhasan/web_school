<?php
namespace  App\Http\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
interface PaymentMethod
{
    public function generatePayment();
}
