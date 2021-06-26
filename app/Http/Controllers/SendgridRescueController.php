<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RescueSendgrid;

class SendgridRescueController extends Controller
{
    public function index()
    {
        Mail::to('sendgridtesting@gmail.com')->send(new RescueSendgrid);
        return "Sent!";
    }
}
