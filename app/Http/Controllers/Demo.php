<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Demo extends Controller
{
    public function Index()
    {
        return 'In Demo <a href="'.route('calc').'">Calc</a>';
    }
}
