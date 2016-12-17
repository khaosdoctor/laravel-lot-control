<div class="header-base container-fluid">
<div class="row">
  @if(isset($display_return))
  <div class="col-sm-1 back">
    <a href="{{action('ProdutoController@listar')}}"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
  </div>
  @endif

  <div class="col-sm-1{{isset($display_return) ? 1 : 2}}">
    <h1>{{$page_title}}</h1>
  </div>
</div>
</div>