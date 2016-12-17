@extends('layout')

@section('conteudo')
<div class="wrapper">

  <div class="row table-commands">
    <div class="col-sm-3">
      
      <form class="form-inline" method="GET">
        <div class="form-group">
          <input type="text" placeholder="Busca" class="form-control" name="search">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>

    </div> 

    <div class="col-sm-2">
      <a href="{{action('ProdutoController@novo')}}">
        <button class="btn btn-success">Novo Produto</button>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <th>Ações</th>
          <th>Nome</th>
          <th>Código</th>
          <th>Descrição</th>
        </thead>
        <tbody>
          @forelse($produtos as $p)
          <tr class="actions">
            <td class="commands">
              <a href="/produto/{{$p->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
              <a href="/produto/delete/{{$p->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </td>
            <td>{{$p->name}}</td>
            <td>{{$p->barcode}}</td>
            <td>{{$p->description}}</td>
          </tr>
          @empty
          <tr>
            <td class='empty' colspan='4'>Nenhum produto para exibir</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>



  @if(Session::has('del'))
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-danger" role="alert">Produto deletado com sucesso</div>
    </div>
  </div>
  @endif

</div>

@stop