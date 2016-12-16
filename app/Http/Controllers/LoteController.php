<?php namespace lot_control\Http\Controllers;

//Controlador de lotes

use Illuminate\Support\Facades\DB;
use Request;

class LoteController extends Controller {

  public function listar() {
    return view('listaLotes')->with('lotes',$lotes);
  }

  public function detalhe() {

    $id = Request::route('id');
    $lote = DB::select("SELECT * FROM lote WHERE id = ?", [$id]);
    
    return view('loteDetalhe')->with(['lote'=> $lote[0]]);
  }

  public function editar() {
    $code = Request::input('code');
    $qty_lot = Request::input('qty_lot');
    $expire = Request::input('expire');
    $id = Request::input('id');

    $update = DB::update("UPDATE lote SET code = ?, qty_lot = ?, expire = ? WHERE id = ?",[$code,$qty_lot,$expire,$id]);

    return redirect()->action('LoteController@detalhe')->withInput()->with(['update'=>$update, 'id'=>$id]);
  }

  public function novo() {
    $produto = Request::input('produto');
    return view('novoLote')->with('produto', $produto);
  }

  public function inserir() {
    $code = Request::input('code');
    $qty_lot = Request::input('qty_lot');
    $expire = Request::input('expire');
    $produto = Request::input('produto');

    $insert = DB::insert("INSERT INTO lote(code, qty_lot, expire, produto_id) VALUES (?,?,?,?)",[$code,$qty_lot,$expire,$produto]);

    return redirect()->action('ProdutoController@detalhe')->withInput()->with(['insert'=>$insert, 'id'=>$produto]);
  }

  public function remover() {
    $id = Request::route('id');
    $produto = Request::input('produto');
    $delete = DB::delete("DELETE FROM lote WHERE id = ?", [$id]);
    return redirect()->action('ProdutoController@detalhe')->withInput()->with(['delete'=> $delete, 'id'=>$produto]);
  }

}