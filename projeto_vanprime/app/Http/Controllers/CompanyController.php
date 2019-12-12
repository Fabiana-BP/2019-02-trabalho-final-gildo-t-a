<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Category;
use App\Vehicle;
use App\Way;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::check()){
        if(Auth::User()->user_role == "company"){
          $nav=2;
          $company=Company::find(Auth::User()->company);
          $vehicles=Vehicle::orderBy('board')->where('company_id','=',Auth::User()->company)->get();
          return view('admin.index',['company'=>$company,'nav'=>$nav,'vehicles'=>$vehicles]);
        }else{
          return abort(403,'Operação não permitida!');
        }
      }else{
        return redirect('/login');
      }


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
          'image_company' => 'mimes:jpeg,bmp,png',
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
        if(empty($username)){//usuário já registrado
          if(Auth::check()){
            if(Auth::user()->user_role == "company"){
              $username=Auth::User()->username;
            }else{
              return abort(403,'Operação não permitida!');
            }
          }else{
            return redirect("/home");
          }

        }

        //salvar foto em storage/app/public/profiles/
        if($request->hasFile('image_company') && $request->file('image_company')->isValid()){
          // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->image_company->extension();

            // Define finalmente o nome
            $nameFile = "company{$name}.{$extension}";
            $c->image_company=$nameFile;
            $upload = $request->image_company->storeAs('companies',$nameFile);
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

          return redirect('login');
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
    public function show($company)
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "company"){
          $company=Company::find($company);
          $nav=1;
          return view('admin.index_profile',['company'=>$company,'nav'=>$nav]);
        }else{
          return abort(403,'Operação não permitida!');
        }

      }else{
        return redirect()->route('login');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($company)
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "company"){
          $company=Company::find($company);
          $nav=2;
          return view('admin.index_profile',['company'=>$company,'nav'=>$nav]);
        }else{
            return abort(403,'Operação não permitida!');
        }

      }else{
          return redirect()->route('login');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company)
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "company"){
          $company=Company::find($company);
          $validatedData = $request->validate(
            [
              'name'=>'required|min:3|max:255',
              'email'=>'required|min:6|max:255',
              'street' =>'required|max:255',
              'neighborhood' =>'required|max:255',
              'number' =>'required|max:10',
              'city'=>'required|min:3|max:255',
              'phone'=>'required|min:10|max:255',
              'content'=>'max:255',
              'image_company' => 'mimes:jpeg,bmp,png',
            ]);
            $company->name=$request->name;
            $company->cnpj=$request->cnpj;
            $company->email=$request->email;
            $company->street=$request->street;
            $company->neighborhood=$request->neighborhood;
            $company->phone=$request->phone;
            $company->number=$request->number;
            $company->city=$request->city;
            $company->content=$request->content;
            $company->web_page=$request->web_page;

            //salvar foto em storage/app/public/profiles/
            if($request->hasFile('image_company') && $request->file('image_company')->isValid()){
              // Define um aleatório para o arquivo baseado no timestamps atual
                $name = uniqid(date('HisYmd'));

                // Recupera a extensão do arquivo
                $extension = $request->image_company->extension();

                // Define finalmente o nome
                $nameFile = "company{$name}.{$extension}";
                $company->image_company=$nameFile;
                $upload = $request->image_company->storeAs('companies',$nameFile);
                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if ( !$upload )
                    return redirect()
                                ->back()
                                ->with('error', 'Falha ao fazer upload')
                                ->withInput();
                              }
            try{
              $save=$company->save();
            }catch(Exception $e){
              session()->flash('mensagem1','Ocorreu um erro, verifique os dados inseridos ou tente mais tarde!');
              redirect()->back();
            }
            if($save){
              $nav=1;
              session()->flash('mensagem','Cadastro atualizado com Sucesso!');
              return view('admin.index_profile',['company'=>$company,'nav'=>$nav]);
            }else{
              session()->flash('mensagem1','Desculpe, ocorreu um erro. Por favor, tente mais tarde!');
              redirect()->back();
            }

        }else{
          return abort(403,'Operação não permitida!');
        }

      }else{
          return redirect()->route('login');
      }
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
