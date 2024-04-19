<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\UserAdminRequest;


class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(UserAdminRequest $request){
        $tell = $request->input('tell1') . $request->input('tell2') . $request->input('tell3');

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail' ]);
        
        return view('confirm', compact('contact'));
    }

    public function store(UserAdminRequest $request){
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail' ]);

        Contact::create($contact);
        return redirect('thanks');
    }


}
