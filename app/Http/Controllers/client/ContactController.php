<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\customer_emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
     
        return view('client.contact.index');
    }
    public function contact_(Request $request)
    {   
        try {
               
        $mail=new ContactMail($request->subject,$request->content);
        Mail:: to($request->from)->queue($mail);
            return back()->with('success','Gửi liên hệ thành công, chúng tôi sẽ sớm phảm hồi email của bạn'); 
        } catch (\Throwable $th) {
            return back()->with('fail','Đã có lỗi vui lòng thực hiện lại'); 
        }
     
    }
}
