<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RescueSendgrid;
use Auth;
class SendgridRescueController extends Controller
{
    public function index()
    {
        if ( Auth::check && Auth::user()->email == "jeremyblc@gmail.com" ) {
            Mail::to('sendgridtesting@gmail.com')->send(new RescueSendgrid);
            return "Sent!";
        }
        return "Yeah, whatever.";
    }
}
