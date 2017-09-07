<?php
namespace LaravelProject\Http\Controllers;

use Illuminate\Support\Facades\DB;
use LaravelProject\Produto;
use Request;

class ProdutoController extends Controller
{

    public function cadastrar(){

        $params = Request::all();
        $produto = new Produto($params);        
        $produto->save();

        return  redirect('/produtos')->withInput(Request::only('nome'));
    }

    public function deletar($id){
        $produto = Produto::find($id);
		$produto->delete();
		return redirect()->action('ProdutoController@listar');
    }


    public function listar()
    {
        $produtos = Produto::paginate(5);
            //With auxilia o laravel à deixar a variavel acessivel pela view
            return view('produto/listagem')->with('produtos', $produtos);
        
    }

    public function detalhes($id)
    {
    $produto = Produto::find($id)->get();
//        $produto = DB::select('select * from produtos where id = ?', [$id]);
        if (empty($produto)) {
            return "produto não existe";
        }
        return view('produto/detalhes')->with('produto', $produto[0]);
    }

}
?>