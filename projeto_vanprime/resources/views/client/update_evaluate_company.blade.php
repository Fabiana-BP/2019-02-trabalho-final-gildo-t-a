<div class="container card">
      <div class="text-xl-center">
        <h2>Avaliar empresa</h2>
      </div>
      <?php
      
      $method="/areacliente/atualizaravaliacao/$query->id";
      ?>
      <form  action= "{{$method}}" method="POST" enctype="multipart/form-data">

      @csrf
      @method('PATCH')
      <div class="form-group">
        <label  for="company_id">Empresa: {{$query->company->name}}</label>
        <input type="hidden" class="form-control" value="{{$query->company->id}}" id="company_id" name="company_id">
      </div>

        <div class="form-group">
          <label id="label1" for="content">Comentário:</label>
          <textarea class="form-control" id="content" name="content">{{$query->content}}</textarea>
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
