<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\PhoneNumber;
class HomeController extends Controller
{
    public function view(Request $request){
        $contact = Contact::orderBy('id', 'desc')->get();
        $phone = PhoneNumber::where('is_default', 'Y')->get();
        if( !empty($request->search) ){
            $contact = Contact::where('first_name','LIKE',"%$request->search%" )->orwhere('last_name','LIKE', "%$request->search%")->orwhere('email','LIKE', "%$request->search%")->orwhere('middle_name','LIKE', "%$request->search%")->orwhere('title','LIKE',"%$request->search%")->get();
            return view('index', ['contact'=>$contact, 'num'=>$phone]);
        }
        else{
            return view('index', ['contact'=>$contact, 'num'=>$phone]);
        }
    }
}
