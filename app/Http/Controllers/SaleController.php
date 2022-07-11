<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function productIndex() {
        return view('product.index');
    }
}
