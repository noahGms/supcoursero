@extends('layouts.settings')

@section('content')
    <div class="container px-5 py-5 mx-auto">
        <div class="flex items-center mb-4">
            <h1 class="text-xl mb-0">Users settings</h1>
        </div>

        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
            <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Email</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($users->isEmpty())
                <tr>
                    <td colspan="3" class="py-3 text-center">
                        <div class="bg-indigo-700 border text-white px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">No users found.</strong>
                        </div>
                    </td>
                </tr>
            @endif
            @foreach($users as $user)
                <tr>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-500">{{ $user->id }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">{{ $user->name }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">{{ $user->email }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-500 flex items-center">
                        @if($user->is_god)
                            <span class="text-black">No actions is authorized</span>
                        @else
                        <form method="POST" action="{{route('users.toggle-admin', $user->id)}}" class="inline-flex">
                            @csrf
                            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                <input onchange="form.submit()" type="checkbox" {{$user->is_admin ? 'checked' : ''}} name="is_admin" id="is_admin" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                <label for="is_admin" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                            </div>
                            <label for="is_admin" class="text-gray-700 self-center">Toggle admin</label>
                        </form>
                        <form class="inline-flex ml-2" action="{{route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirm('Are you sur ?') ? form.submit() : null" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
