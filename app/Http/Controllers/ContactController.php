<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\PhoneNumber;

class ContactController extends Controller
{
    public function add_contact_view(){
        return view('add');
    }
    public function checkEmail(Request $request){
        
    }
    public function add_contact( Request $request ){

        $contact = new Contact;
        $contact->first_name = $request->firstNameVal;
        $contact->last_name = $request->lastNameVal;
        $contact->email = $request->emailVal;
        $contact->middle_name = $request->middleNameVal;
        $contact->prefix = $request->prefixVal;
        $contact->Suffix = $request->suffixVal;
        $contact->title = $request->titleVal;
        $contact->save();
        $contact_list = Contact::orderBy('id', 'desc')->first();
        for ($i=0; $i < count($request->phoneNumber) ; $i++) { 
            $phone_number = new PhoneNumber;
            $phone_number->contact_id = $contact_list->id;
            $phone_number->number = $request->phoneNumber[$i];
            $phone_number->type = $request->phoneType[$i];
            if($request->setDefault[$i] == 'true'){
                $phone_number->is_default = "Y";
            }
            else{
                $phone_number->is_default = "N";
            }
            $phone_number->save();
        }
        return response()->json(['status'=>200]);
        
    }
    public function check_email( Request $request ){
        $email = Contact::where('email', $request->email)->first();
        if($email == null){
            return response()->json(['status'=>200]);
        }
        else{
            return response()->json(['status'=>201]);
        }
    }

    public function check_phone( Request $request ){
        $phone = PhoneNumber::where('number', $request->phone)->first();
        if($phone == null){
            return response()->json(['status'=>200]);
        }
        else{
            return response()->json(['status'=>201]);
        }
    }

    public function delete_contact($id){
        $contact = Contact::find($id);
        $phone = PhoneNumber::where('contact_id',$id)->get();
        foreach ($phone as $value) {
            $value->delete();
        }
        // $phone->delete();
        $contact->delete();
        return redirect('/');
    }


    public function edit_contact( $id ){
        $contact = Contact::find($id);
        $phone = PhoneNumber::where('contact_id',$id)->get();
        return view('edit', ["contact"=>$contact, "phone"=>$phone]);
    }

    public function update_contact( Request $request ){
        $contact = Contact::find($request->id);
        $contact->first_name = $request->firstNameVal;
        $contact->last_name = $request->lastNameVal;
        $contact->email = $request->emailVal;
        $contact->middle_name = $request->middleNameVal;
        $contact->prefix = $request->prefixVal;
        $contact->Suffix = $request->suffixVal;
        $contact->title = $request->titleVal;
        $contact->save();
        $contact_list = Contact::orderBy('id', 'desc')->first();
        $phone_number = PhoneNumber::where('contact_id',$request->id)->get();
        foreach ($phone_number as $value) {
            $value->delete();
        }
        for ($i=0; $i < count($request->phoneNumber) ; $i++) { 
            $phone_number = new PhoneNumber;
            $phone_number->contact_id = $contact_list->id;
            $phone_number->number = $request->phoneNumber[$i];
            $phone_number->type = $request->phoneType[$i];
            if($request->setDefault[$i] == 'true'){
                $phone_number->is_default = "Y";
            }
            else{
                $phone_number->is_default = "N";
            }
            $phone_number->save();
        }
        return response()->json(['status'=>200]);
    }
}
