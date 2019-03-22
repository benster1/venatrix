<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\ContactUs;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function contact(Request $request)
    {
        if ($request->isMethod('post')) {
       
        try{
           $contact=new ContactUs();
			$contact->firstname=$request->input('firstname');
			$contact->lastname=$request->input('lastname');
			$contact->email=$request->input('email');
            $contact->phone=$request->input('phone');
            $contact->need=$request->input('subject');
			$contact->messsage=$request->input('message');
			$contact->save();
						


			//echo "alert('Contact created')";

			 return view('welcome');
        }catch(Exception $ex)
        {
        	// echo "alert('Error Contact  !!!')";
			 return view('welcome');
        }
        
    }
    			 return view('welcome');
    			}




}



