<?php

namespace App\Http\Controllers;

use App\Query;
use App\Category;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "client"){
          $categories=Category::orderBy('title')->get();
          $queries=Query::orderBy('created_at')->where('user_id','=',Auth::User()->id)->get();
          //$queries;
         $nav=5;
          return view('client.index',['nav'=>$nav,'categories'=>$categories,'queries'=>$queries]);

        }else{
          $queries=Query::orderBy('updated_at')->where('company_id','=',Auth::User()->company)->get();
          $company=Company::find(Auth::User()->company);
          $nav=1;
          return view('admin.index_report',['nav'=>$nav,'company'=>$company,'queries'=>$queries]);
        }

      }else{
        return redirect()->route('login');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "client"){
          $company=Company::find($company_id);
          //echo $company;
         $nav=4;
          return view('client.index',['nav'=>$nav,'company'=>$company]);

        }else{
          return abort(403,'Operação não permitida!');
        }
      }else{
        return redirect()->route('login');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "client"){
          $validatedData = $request->validate(
            [
              'company_id'=>'required|integer|exists:companies,id',
              'content'=>'required|max:255',
            ]);
            $query=Query::orderBy('id')->whereRaw('user_id = ? and company_id = ?',[$request->company_id,Auth::User()->id])->get();
            if(!empty($query)){//já avaliou a empresa
              session()->flash('mensagem1','Você já avaliou essa empresa antes. Se desejar atualizar o comentário, acesse: Minhas Avaliações!');
              return redirect()->back();
            }
            //dd($request);
            $q=new Query;
            $q->company_id=$request->company_id;
            $q->content=$request->content;
            $q->user_id=Auth::User()->id;

            $save=$q->save();
            if($save){
              session()->flash('mensagem','Avaliação inserida com Sucesso!');
              return redirect("/areacliente/perfil");
            }else{
              session()->flash('mensagem1','Desculpe, ocorreu um erro. Tente mais tarde!');
              return redirect()->back();
            }
          }else{
            return abort(403,'Operação não permitida!');
          }
        }else{
          return redirect()->route('login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "client"){
          $query=Query::find($id);
          $nav=6;
          $categories=Category::orderBy('title')->get();
          return view('client.index',['nav'=>$nav,'categories'=>$categories,'query'=>$query]);
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
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $query)
    {
      if(Auth::check()){
        if(Auth::user()->user_role == "client"){
          $categories=Category::orderBy('title')->get();
          $query=Query::find($query);
          //validação
          $validatedData = $request->validate(
            [
              'company_id'=>'required|integer|exists:companies,id',
              'content'=>'required|max:255',
            ]);
            //atualizar
            $query->user_id=Auth::User()->id;
            $query->company_id=$request->company_id;
            $query->content=$request->content;
            $save=$query->save();
            if($save){
              $nav=5;
              $queries=Query::orderBy('updated_at')->get();
              return view('client.index',['nav'=>$nav,'categories'=>$categories,'queries'=>$queries]);
            }else{
              return redirect()->back();
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
     * @param  \App\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        //
    }
}
