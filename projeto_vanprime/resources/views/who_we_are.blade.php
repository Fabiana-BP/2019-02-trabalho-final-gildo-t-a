@extends('base_view')
@section('navigation_part')
  @include('navigation')
@endsection
@section('content_part')

<div class="len1">
    <div class="row">
      <div class="container col-8">

        <div class="form-group container">
          <h1 style="color:#800000"><strong>História da Vanprime Transportes</strong></h1>
          <h2>A empresa surgiu com a junção de ideias de dois alunos do curso de Sistemas de Informação da Universidade Federal de Ouro Preto:
            Fabiana Barreto Pereira e Gildo Tiago Azevedo. </h2>
          <h2>O website foi fruto do trabalho prático da disciplina de Sistemas WEB, lecionada por Fernando Bernardes de Oliveira, no segundo semestre de 2019.</h2>
        </div>

        <div class="form-group container">
          <h1 style="color:#800000"><strong>Serviços oferecidos</strong></h1>
          <h2>Atendemos a dois públicos-alvo: empresas interessadas em vender passagens de seus veículos,
             e pessoas interessadas em comprar passagens dessas empresas.
             Nós, a <strong>Vanprime Transportes</strong>, somos a intermediária, oferecendo áreas específicas no nosso site
             para ambos, no intuito de facilitar e aumentar o número de vendas de passagens, gerando mais valor para o negócio. </h2>
        </div>
        <div class="form-group container">
          <h1 style="color:#800000"><strong>Tipo de Transportes que trabalhamos</strong></h1>
          <h2> Trabalhamos com o transporte rodoviário (ônibus e vans).</h2>
        </div>

    </div>
  <div class="col-md-4 diferent_container1">
    @include('search')
  </div>

  </div>
</div>

<hr>
@endsection
