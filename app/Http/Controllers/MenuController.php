<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class MenuController extends Controller
{
    public function index() {
        $produtos = Produto::all();
        return view('userPages.menu', compact('produtos'));
    }
}
