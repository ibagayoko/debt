@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
        <h1 class="text-white text-3xl pt-8">Welcome back</h1>
        <h2 class="text-blue-300">Enter Your cred</h2>
        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            <div class="relative"> 
                <label for="email" class="uppercase p-2 text-blue-500 font-bold text-xs absolute">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="relative pt-3">
                <label for="password" class="uppercase p-2 text-blue-500 font-bold text-xs absolute">{{ __('Password') }}</label>

                    <input id="password" type="password" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

                    <div class="pt-2">
                        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="text-white " for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
            <div class="pt-8">
                    <button type="submit" class="w-full bg-gray-400 py-2 px-3  text-left text-blue-800 uppercase rounded text-gray-100 font-bold">
                            {{ __('Login') }}
                    </button>
            </div>

            <div class="flex justify-between pt-8 text-white text-sm font-bold">
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        <a class="" href="{{ route('register') }}">
                                {{ __('Register') }}
                        </a>
            </div>
        </form>
    </div>
</div>
@endsection
