<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function __construct(){
      $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::User()->user_role == "company"){
        $user=User::find(Auth::User()->id);
        $company=Company::find(Auth::User()->company);
        $nav=3;
        return view('admin.index_profile',['nav'=>$nav,'company'=>$company,'user'=>$user]);
      }else{
        return abort(403,'Operação não permitida!');
      }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user=User::find($id);
      $categories=Category::orderBy('title')->get();
      if(Auth::User()->user_role == "client"){
        $nav=2;
        return view('client.index',['nav'=>$nav,'categories'=>$categories,'user'=>$user]);
      }else{
        $company=Company::find(Auth::User()->company);
        $nav=4;
        return view('admin.index_profile',['nav'=>$nav,'company'=>$company,'user'=>$user]);
      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $categories=Category::orderBy('title')->get();
      $validatedData = $request->validate(
        [
          'name'=>'required|min:3|max:255',
          'email'=>'required|min:6|max:255',
          'password'=>'min:8|max:255',
          'cpf' =>'required|min:14|max:14',
          'phone'=>'required|min:11|max:14',
          'image_user'=> 'mimes:jpeg,bmp,png',
        ]);


      if(!preg_match("/\s*/",$request->username)){ //há espaço em branco
          return redirect()->back()->withInput();
      }
      $u=User::find($id);
      $u->name=$request->name;
      $u->cpf=$request->cpf;
      $u->phone=$request->phone;
      $u->email=$request->email;

      if(!empty($request->image_user)){
          //dd($request);
      //salvar foto em storage/app/public/profiles/
        if($request->hasFile('image_user') && $request->file('image_user')->isValid()){
        // Define um aleatório para o arquivo baseado no timestamps atual
          $name = uniqid(date('HisYmd'));

          // Recupera a extensão do arquivo
          try{
            $extension = $request->image_user->extension();

          }catch(Exception $e){
            return redirect()
                        ->back()
                        ->with('error', 'Arquivo não suportado')
                        ->withInput();
          }

          // Define finalmente o nome
          $nameFile = "{$name}.{$extension}";
          $u->image_user=$nameFile;
          $upload = $request->image_user->storeAs('profiles',$nameFile);
          // Verifica se NÃO deu certo o upload (Redireciona de volta)
          if ( !$upload )
              return redirect()
                          ->back()
                          ->with('error', 'Falha ao fazer upload')
                          ->withInput();
                        }

      }
      try{
        $save=$u->save();
      }catch(Exception $e){
        session()->flash('mensagem1','Não foi possível atualizar o cadastro, por favor revise os dados ou tente mais tarde!');
        return redirect()->back();
      }


        if($save){
          if(Auth::User()->user_role == "client"){
            $nav=1;
            session()->flash('mensagem','Cadastro Atualizado com Sucesso!');
            return view('client.index',['nav'=>$nav,'categories'=>$categories]);
          }else{//company
            $nav=3;
            $company=Company::find(Auth::User()->company);
            return view('admin.index_profile',['nav'=>$nav,'company'=>$company,'user'=>$u]);
          }
        }else{
          session()->flash('mensagem1','Não foi possível atualizar o cadastro, por favor tente mais tarde!');
          return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
