<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request)
    {

        // Validator::make - валидируем
        // $request->all() - данные из формы
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:4|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:6', 'same:re_password'],
            'policy' => 'accepted'
        ]);

        if ($validator->fails()) {
            // back() - редирект на страницу формы
            // $validator->errors()) - показываем ошибки
            // withInput($request->all()) - возвращает заполненные поля
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        // Hash пароля
        $request['password'] = Hash::make($request['password']);

        $user = User::create($request->all());

        Auth::login($user);

        return redirect()->route('home');

    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => ['required', 'min:6'],
        ]);

        if ($validator->fails()) {
            // back() - редирект на страницу формы
            // $validator->errors()) - показываем ошибки
            // withInput($request->all()) - возвращает заполненные поля
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        if (!Auth::attempt($validator->validated())) {
            return back()->withErrors(['invalid' => 'Invalid credentials'])->withInput($request->all());
        }

        if (Auth::user()->role === 'banned') {
            Auth::logout();

            return back()->withErrors(['invalid' => 'You are has been blocked'])->withInput($request->all());
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        // ->route('home') - название в route
        return redirect()->route('home');
    }
}
