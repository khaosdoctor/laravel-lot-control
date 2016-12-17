<?php namespace lot_control\Http\Controllers;

//Controlador de produtos

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

  public function listar() {
    $where = '';
    if(Request::input('search')) {
      $where = "WHERE name LIKE '%".Request::input('search')."%' OR barcode LIKE '%".Request::input('search')."%'";
    }
    
    $produtos = DB::select("SELECT * FROM produto ".$where);

    return view('listaProdutos')->with(['produtos'=>$produtos, 'page_title'=>'Lista de produtos']);
  }

  public function detalhe() {

    $id = Request::route('id');
    $produto = DB::select("SELECT * FROM produto WHERE id = ?", [$id]);
    $lotes = DB::select("SELECT * FROM lote WHERE produto_id = ?", [$id]);
    
    return view('produtoDetalhe')->with(['produto'=> $produto[0], 'lotes'=>$lotes, 'page_title'=>'Detalhe de produto', 'display_return'=>true]);
  }

  public function editar() {
    $name = Request::input('name');
    $desc = Request::input('description');
    $barcode = Request::input('barcode');
    $id = Request::input('id');

    $update = DB::update("UPDATE produto SET name = ?, description = ?, barcode = ? WHERE id = ?",[$name,$desc,$barcode,$id]);

    return redirect()->action('ProdutoController@detalhe')->withInput()->with(['update'=>$update, 'display_return'=>true]);
  }

  public function novo() {
    return view('novoProduto')->with(['page_title'=>'Novo Produto', 'display_return'=>true]);
  }

  public function inserir() {
    $name = Request::input('name');
    $desc = Request::input('description');
    $barcode = Request::input('barcode');

    $insert = DB::insert("INSERT INTO produto(name, description, barcode) VALUES (?,?,?)",[$name,$desc,$barcode]);
    //pegar novo id
    return redirect('/produto/'.$id)->withInput()->with('insert',$insert);
  }

  public function remover() {
    $id = Request::route('id');
    $delete = DB::delete("DELETE FROM produto WHERE id = ?", [$id]);
    return redirect()->action('ProdutoController@listar')->withDel($delete);
  }

}