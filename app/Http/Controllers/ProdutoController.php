<?php namespace lot_control\Http\Controllers;

//Controlador de produtos

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

  public function listar() {
    return view('listaProdutos')->with('produtos',$produtos);
  }

  public function detalhe() {

    $id = Request::route('id');
    $produto = DB::select("SELECT * FROM produto WHERE id = ?", [$id]);
    $lotes = DB::select("SELECT * FROM lote WHERE produto_id = ?", [$id]);
    
    return view('produtoDetalhe')->with(['produto'=> $produto[0], 'lotes'=>$lotes]);
  }

  public function editar() {
    $name = Request::input('name');
    $desc = Request::input('description');
    $barcode = Request::input('barcode');
    $id = Request::input('id');

    $update = DB::update("UPDATE produto SET name = ?, description = ?, barcode = ? WHERE id = ?",[$name,$desc,$barcode,$id]);

    return redirect()->action('ProdutoController@listar')->withInput()->with('update',$update);
  }

  public function novo() {
    return view('novoProduto');
  }

  public function inserir() {
    $name = Request::input('name');
    $desc = Request::input('description');
    $barcode = Request::input('barcode');

    $insert = DB::insert("INSERT INTO produto(name, description, barcode) VALUES (?,?,?)",[$name,$desc,$barcode]);

    return redirect()->action('ProdutoController@listar')->withInput()->with('insert',$insert);
  }

  public function remover() {
    $id = Request::route('id');
    $delete = DB::delete("DELETE FROM produto WHERE id = ?", [$id]);
    return redirect()->action('ProdutoController@listar')->withInput()->with('delete', $delete);
  }

}