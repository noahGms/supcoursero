@extends('layouts.base')

@section('content')
    <div class="h-full bg-gradient-to-tl from-blue-400 to-indigo-900 w-full py-16 px-4">
        <form action="{{route('register.register')}}" method="post" class="h-full flex flex-col items-center justify-center">
            @csrf
            <div class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
                @include('layouts.logo')
                <h2 class="font-normal uppercase text-3xl leading-6 text-white ml-2">Supcoursero</h2>
            </div>

            <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-10 mt-16">
                <p class="focus:outline-none text-2xl font-extrabold leading-6 text-gray-800">Create an account</p>

                <div class="mt-6">
                    <label id="email" class="text-sm font-medium leading-none text-gray-800">
                        Email
                    </label>
                    <input required type="email" id="email" name="email" value="{{old('email')}}" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2 @error('email') border-red-500 @enderror"/>
                    @if($errors->has('email'))
                        <p class="text-error">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="mt-6">
                    <label id="name" class="text-sm font-medium leading-none text-gray-800">
                        Name
                    </label>
                    <input required type="text" id="name" name="name" value="{{old('name')}}" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2 @error('name') border-red-500 @enderror"/>
                    @if($errors->has('name'))
                        <p class="text-error">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="mt-6">
                    <label id="password" class="text-sm font-medium leading-none text-gray-800">
                        Password
                    </label>
                    <input required type="password" id="password" name="password" class="bg-gray-200 border rounded text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2 @error('password') border-red-500 @enderror"/>
                    @if($errors->has('password'))
                        <p class="text-error">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="mt-6">
                    <label id="password_confirmation" class="text-sm font-medium leading-none text-gray-800">
                        Password confirmation
                    </label>
                    <input required type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2"/>
                </div>

                <p class="focus:outline-none text-sm mt-8 font-medium leading-none text-gray-500">You have already an account?
                    <a href="{{route('login.index')}}" class="hover:text-gray-500 focus:text-gray-500 focus:outline-none focus:underline hover:underline text-sm font-medium leading-none  text-gray-800 cursor-pointer"> Login here</a>
                </p>
                <div class="mt-8">
                    <button role="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">Create my account</button>
                </div>
            </div>
        </form>
    </div>
@endsection
