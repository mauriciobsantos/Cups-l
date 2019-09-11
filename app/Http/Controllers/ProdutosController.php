<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class ProdutosController extends Controller
{
    public function index(){
        
        //Carregar os Produtos da Base de dados
        $produtos = Produto::paginate(2);
        
        //Retonar a view com os produtos levantados)
            return view('produtos.index', compact('produtos'));
    }

    public function show($id){
        // Carregar o produto na base de dados
        $produto = Produto::find($id);

        //Retonar a view com os produtos levantados)
            return view('produtos.show', compact('produto'));
    }

    public function edit($id){
        //Carregando o produto que ser a editado
        $produto = Produto::find($id);

        // Carregando a categoria 
        $categorias = Categoria::all();

        
        //Retonar a view com os produtos levantados)
            return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update($id){
        // Validar o request
        request()->validate(
            [
                'nome' => 'required',
                'categoria' => 'required',
                'preco' => 'required|gt:0|lt:999.00',
                'quantidade' => 'required|gt:0|lt:999.00'
            ]
        );

        //Carregando o produto que ser a editado
            $produto = Produto::find($id);

        //Alterrando os valores do produtos
            $produto->nome = request('nome');
            $produto->preco = request('preco');
            $produto->quantidade = request('quantidade');
            $produto->id_categoria = request('categoria');

        // Salvando o produto editado

            $produto->save();

            //Redirecionando para a lista de produtos

                return redirect('/produtos');

       

        //Retonar a view com os produtos levantados)
                return view('produtos.update', compact('produto', 'categorias'));
    }

    public function destroy($id){
        //Carregando o produto que vai ser deletado
            $produto = Produto::find($id);

        //Deletando  o Produto
            $produto->delete();

        //REdirecionando para a lista de produtos

                return redirect('/produtos');
    }

    public function create(){
       
        $categoria = Categoria::all();

      

        return view('produtos.create', compact('categoria'));



    }

    public function store(){
        $produto = new Produto();

            $produto->nome = request('nome');
            $produto->preco = request('preco');
            $produto->quantidade = request('quantidade');
            $produto->id_categoria = request('categoria');
        
        $produto->save();

        return redirect('/produtos');
    }
}
