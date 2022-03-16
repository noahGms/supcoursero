@extends('layouts.base')

@section('content')
    <div class="h-screen bg-gradient-to-tl from-indigo-400 to-blue-900 w-full py-16 px-4">
        <form action="{{route('login.login')}}" method="post" class="h-full flex flex-col items-center justify-center">
            @csrf
            <h1 class="text-white text-3xl font-bold uppercase">Supcoursero</h1>

            <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-10 mt-16">
                <p class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800">Login to your account</p>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-400 mt-6 border text-white px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <div class="mt-6">
                    <label id="email" class="text-sm font-medium leading-none text-gray-800">
                        Email
                    </label>
                    <input required type="email" id="email" name="email" value="{{old('email')}}" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"/>
                </div>
                <div class="mt-6">
                    <label id="password" class="text-sm font-medium leading-none text-gray-800">
                        Password
                    </label>
                    <input required type="password" id="password" name="password" class="bg-gray-200 border rounded text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"/>
                </div>
                <div class="mt-6">
                    <div class="inline-flex items-center mt-3">
                        <input type="checkbox" id="remember_me" name="remember_me" class="rounded h-5 w-5 text-indigo-600" value="true">
                        <label for="remember_me" class="ml-2 text-gray-700">
                            Remember me
                        </label>
                    </div>
                </div>

                <p class="focus:outline-none text-sm mt-8 font-medium leading-none text-gray-500">Dont have account?
                    <a href="{{route('register.index')}}" class="hover:text-gray-500 focus:text-gray-500 focus:outline-none focus:underline hover:underline text-sm font-medium leading-none  text-gray-800 cursor-pointer"> Register here</a>
                </p>
                <div class="mt-8">
                    <button role="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">Login</button>
                </div>
            </div>
        </form>
    </div>
@endsection
