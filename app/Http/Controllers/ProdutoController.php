<?php

namespace App\Http\Controllers;


use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index() {
        $produtos = Produto::all();
        return view('adminPages.produtos.index', compact('produtos'));
    }

    public function create() {
        return view('adminPages.produtos.create');
    }

    public function store(Request $request)
{
    // Validação dos campos
    $request->validate([
        'nome' => 'required|string|max:255|unique:produtos,nome', // Verifica se o nome é único na tabela 'produtos'
        'descricao' => 'nullable|string|unique:produtos,descricao',
        'preco' => 'required|numeric|min:0.01',
        'quantidade' => 'required|integer|min:1',
    ]);

    // Criação do produto
    Produto::create($request->all());

    // Redireciona com mensagem de sucesso
    return redirect()->route('produtos.index')->with('success', 'Produto adicionado com sucesso!');
}

    public function edit($id) {
        $produto = Produto::findOrFail($id);
        return view('adminPages.produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id) {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    public function destroy($id) {
        Produto::destroy($id);
        return redirect()->route('produtos.index')->with('success', 'Produto deletado!');
    }
}
