@extends('layouts.settings')

@section('content')
    <div class="container px-5 py-5 mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl mb-0">Courses settings</h1>
            <a href="{{route('courses.create')}}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 px-2 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-3">
                Add new course
            </a>
        </div>

        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
            <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Language</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($courses->isEmpty())
                <tr>
                    <td colspan="4" class="py-3 text-center">
                        <div class="bg-indigo-700 border text-white px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">No courses found.</strong>
                        </div>
                    </td>
                </tr>
            @endif
            @foreach($courses as $course)
                <tr>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-500">{{ $course->id }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">{{ $course->name }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">{{ $course->language->name }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-500">
                        <a href="{{ route('courses.edit', $course->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form class="inline-flex ml-2" action="{{route('courses.destroy', $course->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirm('Are you sure ?') ? form.submit() : null" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
