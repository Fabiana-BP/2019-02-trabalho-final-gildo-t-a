<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailLogin;
use Illuminate\Support\Facades\Auth;

class appController extends Controller
{
    public function enviarEmail(){
      Mail::to(Auth::User()->email)->send(new mailLogin());
    }
}
