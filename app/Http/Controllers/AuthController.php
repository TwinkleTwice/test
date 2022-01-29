<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckFormRequest;
use App\Models\Check;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
        ]);

        if (auth()->attempt($data)) {
            return redirect(route('check_form'));
        }

        return redirect(route('login'))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    public function checkForm()
    {
        return view('auth.check_form');
    }


    public function update(CheckFormRequest $request)
    {
        $id = Auth::id();

        $user = User::query()->findOrFail($id);

        $random = Str::random(8);

        $data = $request->validated();

        if ($request->has("image")) {
            $image = str_replace("public/checks", "", $request->file("image")->store('public/checks'));
            $data["image"] = $image;
        };

        $check = Check::create([
            'image' => $data["image"],
            'user_id' => auth()->id(),
            'code' => $random,
        ]);

        return redirect(route('check_form'));
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:users"],
            "password" => ["required", "confirmed"],
        ]);

        $user = User::query()->create([
           "name" => $data["name"],
           "email" => $data["email"],
           "password" => bcrypt($data["password"]),
        ]);

        if ($user) {
            auth()->login($user);
        }

        return redirect(route('check_form'));
    }
}

