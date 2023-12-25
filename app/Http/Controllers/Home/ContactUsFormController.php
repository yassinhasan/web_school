<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\Contact as MailContact;
use Illuminate\Http\Request;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class ContactUsFormController extends Controller {

    // Store Contact Form data
    public function ContactUsForm(Request $request) {
    
        try {
        // Form validation

        $validated=  Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
         ]);
         if ($validated->stopOnFirstFailure()->fails()) {
            return response()->json([
                'error' => $validated->errors()->first()
            ]);   
        }
        //  Store data in database
        Contact::create($request->all());
        //  Send mail to admin
        Mail::to("figo781@gmail.com")->send(new MailContact($request->all()));

        return response()->json([
            'success' => 'email sent succssfully'
        ]);    
    }
    catch(Exception $e)
    {
        return  response()->json([
            'error' => $e->getMessage()

        ]);
    }
    }
}