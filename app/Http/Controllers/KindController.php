<?php

namespace App\Http\Controllers;

use App\Models\Kind;
use Illuminate\Http\Request;

class KindController extends Controller
{
    public function index()
    {

        $kind = Kind::find(1);

        $phone = $kind->phone;



        return view("kinds.index");
    }
}
