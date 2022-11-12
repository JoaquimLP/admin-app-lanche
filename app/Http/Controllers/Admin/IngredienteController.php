<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IngredienteController extends Controller
{
    public function index()
    {
        return view("admin.ingrediente.index");
    }
}
