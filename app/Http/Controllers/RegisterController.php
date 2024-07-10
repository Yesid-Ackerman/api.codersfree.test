<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class RegisterController extends Controller
{
    public function store(Request $request){
    
        $request->validate([
            'name' => 'required|string|max:225',
            'password' => 'required|string|min:3',
            ]);
            $user = User::create($request->all());
            return response($user, 200);
    }
}
