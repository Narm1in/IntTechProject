<?php

namespace App\Http\Controllers;

use App\Http\Requests\sedMessage;
use App\Mail\ContactMail;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function sendMail(Request $request){
        $validatedData = $request->validate([
            'message' => 'required|max:255|min:3',
            'email' => 'required|email',
        ]);

        //$validatedData = $request->validated();

        $mail = new message;
        $mail->name = $request->fullname;
        $mail->email = $request->email;
        $mail->phone = $request->phone;
        $mail->message = $request->message;
        $mail->save();
        Mail::to('blog@example.com')->send(new ContactMail($mail));
        return redirect()->route('contact')->with('success','Your message sent successfully');
    }
}
