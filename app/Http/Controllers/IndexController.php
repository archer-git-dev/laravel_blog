<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function  index() {

        $users = [
            ['id' => 1, 'username' => 'Archer'],
            ['id' => 2, 'username' => 'Bob'],
            ['id' => 3, 'username' => 'Guf'],
        ];

        return view('index', compact('users'));
    }
}
