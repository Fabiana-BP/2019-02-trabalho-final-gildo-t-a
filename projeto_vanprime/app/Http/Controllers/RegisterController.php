<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class RegisterController extends Controller{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    //recuperacao de dados
    $categories=Category::orderBy('title')->get();

    //Passar dados para a view
    return view('register.register_request',compact('categories'));

  }
}
