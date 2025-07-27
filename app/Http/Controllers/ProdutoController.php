<?php

namespace App\Http\Controllers;


use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('adminPages.produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('adminPages.produtos.create');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|string|max:255|unique:produtos,nome',
            'descricao' => 'nullable|string|unique:produtos,descricao',
            'preco' => 'required|numeric|min:0.01',
            'quantidade' => 'required|integer|min:1',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipo' => 'required|in:alimento,bebida',
        ]);

        $dados = $request->all();

        // Se houver uma imagem, processa o upload
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $imagem;
        }

        // Criação do produto
        Produto::create($dados);

        // Redireciona com mensagem de sucesso
        return redirect()->route('produtos.index')->with('success', 'Produto adicionado com sucesso!');
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('adminPages.produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:produtos,nome,' . $id,
            'descricao' => 'nullable|string|unique:produtos,descricao,' . $id,
            'preco' => 'required|numeric|min:0.01',
            'quantidade' => 'required|integer|min:1',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tipo' => 'required|in:alimento,bebida',
        ]);

        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado!');
    }

    public function destroy($id)
    {
        Produto::destroy($id);
        return redirect()->route('produtos.index')->with('success', 'Produto deletado!');
    }
}
