<div class="container card">
      <div class="text-xl-center">
        <h2>Avaliar empresa</h2>
      </div>
      <form  action="/areacliente/avaliarempresa" method="post" enctype="multipart/form-data">

      @csrf
      <div class="form-group">
        <label  for="company_id">Empresa: {{$company->name}}</label>
        <input type="hidden" class="form-control" value="{{$company->id}}" id="company_id" name="company_id">
      </div>

        <div class="form-group">
          <label id="label1" for="content">Comentário:</label>
          <textarea class="form-control" id="content" name="content"></textarea>
        </div>


        @if(isset($errors) && count($errors)>0)
        <div class="form-group">
          <div id="alerta1" class="alert alert-danger" style="display: block">
            <span>Por favor, insira um comentário válido!</span>
          </div>
        </div>
        @endif

        <button type="submit" class="btn btn-success submits">Avaliar</button>

      </form>
</div>
