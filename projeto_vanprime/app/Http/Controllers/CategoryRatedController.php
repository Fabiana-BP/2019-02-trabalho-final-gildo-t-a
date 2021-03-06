<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Query;
use App\User;
use App\Vehicle;
use App\Way;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryRatedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //recuperacao de dados
      $categories=Category::orderBy('title')->get();
      $sources=Way::orderBy('departure_city')->select('departure_city')->distinct()->get();
      $destinations=Way::orderBy('stop_city')->select('stop_city')->distinct()->get();
      $companies=Company::orderBy('name')->get();
      /*$bus_content = DB::table('companies')
            ->join('queries','companies.id','=','queries.company_id')
            ->join('users','queries.user_id','=','users.id')
            ->select('companies.name as cname','companies.image_company as cimage','companies.web_page as cweb',
            'companies.content as ccontent','companies.phone as cphone',
            'users.username as uname','users.image_user as uimage','queries.content as ucontent','queries.updated_at as udate')
            ->get();*/

      //Passar dados para a view
      return view('category_rated',compact('companies','categories','sources','destinations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
