<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ], [
                'username.required' => 'Trường tên đăng nhập là bắt buộc.',
                'password.required' => 'Trường mật khẩu là bắt buộc.',
            ]);
            if ($validator->fails()) {
                return redirect()->route('login')->with('error', 'Vui lòng nhập đầy đủ các trường.')->withInput($request->only('username'));
            }

            $login = $this->userService->login($validator->validated());

            if (!empty($login)) {
                $userInfo = $login;
                session()->put('user', $userInfo);
                return redirect()->route('login')->with('success', 'Đăng nhập thành công.');
            }

            return redirect()->route('login')->with('error', 'Tên tài khoản hoặc mật khẩu không đúng.')->withInput($request->only('username'));
        } catch (\Exception $e) {
            Log::error('Error when Login: ' . $e->getMessage());
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Đăng nhập Google thất bại.');
        }

        $existingUser = $this->userService->findByEmail($user->email);

        if ($existingUser) {
            $userInfo = $existingUser;
            session()->put('user', $userInfo);
            $this->userService->updateLastLogin($userInfo['user_id']);
            return redirect()->route('login')->with('success', 'Đăng nhập Google thành công.');
        } else {
            $userInfo = $this->userService->createUserLoginGoogle($user);
            if ($userInfo) {
                session()->put('user', $userInfo);
                return redirect()->route('login')->with('success', 'Đăng nhập Google thành công.');
            }
            return redirect()->route('login')->with('error', 'Đăng nhập Google thất bại.');
        }
    }

    public function logout(Request $request)
    {
        session()->remove('user');
        return redirect()->route('login');
    }
}

