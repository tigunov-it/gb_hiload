<?php

namespace App\Http\Controllers;

class RecursiaController extends Controller
{
    public function index()
    {
        echo 1;
        $this->index();
    }
}
