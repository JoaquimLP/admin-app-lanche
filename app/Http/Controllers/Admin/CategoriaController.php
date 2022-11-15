<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
        return view("admin.categoria.index");
    }
}
