<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getDataPerdis()
    {
        return view('formPerdis.getDataPerdis');
    }
}
