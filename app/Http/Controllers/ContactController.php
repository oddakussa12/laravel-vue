<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContacts(){
        $contacts = Contact::all();
        return $contacts;
    }
    public function saveContact(Request $request){
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contact_no = $request->contact_no;
        $contact->designation = $request->designation;
        if($contact->save()){
            return response()->json(['status' => true, 'message' => 'contact added successfully']);
        }else{
            return response()->json(['status' => false, 'message' => 'Error, Please try again']);
        }

    }
}
