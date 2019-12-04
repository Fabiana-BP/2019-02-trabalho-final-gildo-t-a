<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Category;
use App\Way;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
    * Show images companies
    * @return \Illuminate\Http\Response
    */
    public function show_companies_images(){
      $sources=Way::orderBy('departure_city')->distinct()->get();
      $categories=Category::orderBy('title')->get();
      $companies=Company::orderBy('name')->get();
      return view('image_companies',compact('companies','categories','sources'));
    }


    /**
     * Show the form for c$categories=Category::orderBy('title')->get();reating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //recuperacao de dados
      $categories=Category::orderBy('title')->get();

      //Passar dados para a view
      return view('register.register_company',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

      //valida Dados
      $categories=Category::orderBy('title')->get();

      $validatedData = $request->validate(
        [
          'name'=>'required|min:3|max:255',
          'email'=>'required|min:6|max:255|unique:companies',
          'street' =>'required|max:255',
          'neighborhood' =>'required|max:255',
          'number' =>'required|max:10',
          'city'=>'required|min:3|max:255',
          'phone'=>'required|min:10|max:255',
          'content'=>'max:255',
        ]);




        $c=new Company;
        $c->name=$request->name;
        $c->cnpj=$request->cnpj;
        $c->email=$request->email;
        $c->street=$request->street;
        $c->neighborhood=$request->neighborhood;
        $c->phone=$request->phone;
        $c->number=$request->number;
        $c->city=$request->city;
        $c->content=$request->content;
        $c->web_page=$request->web_page;
        $email=$request->email;
        $username=$request->us;
        echo $username;

        //salvar foto em storage/app/public/profiles/
        if($request->hasFile('image_company') && $request->file('image_company')->isValid()){
          // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image_user->extension();

            // Define finalmente o nome
            $nameFile = "company{$name}.{$extension}";
            $c->image_company=$nameFile;
            $upload = $request->image_company->store('profiles',$nameFile);
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
        }

        if($c->save()){
          //salvar id da empresa no Usuário
          $u = User::where('username', '=', $username)->first();
          $company = Company::where('email', '=', $email)->first();

          $u->company=$company->id;
          $u->save();

          return view('login')->with('categories',$categories);
        }else{
          redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
