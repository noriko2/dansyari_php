<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = ['服', '靴', 'バッグ', '本・雑誌', '食器', '化粧品'];

        return view('home.index', compact('items'));
    }
}
