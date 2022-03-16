@extends('layouts.settings')

@section('content')
    <div class="container px-5 py-5 mx-auto">
        <div class="flex items-center mb-4">
            <a class="mr-2" href="{{route('exercises.index')}}">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h1 class="text-xl mb-0">Update exercise</h1>
        </div>

        <form action="{{route('exercises.update', $exercise->id)}}" method="post" class="h-full">
            @csrf
            @method('PUT')

            <div class="mt-6">
                <label id="name" class="text-sm font-medium leading-none text-gray-800">
                    Name
                </label>
                <input required type="text" id="name" name="name" value="{{old('name') ?? $exercise->name}}" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2 @error('name') border-red-500 @enderror"/>
                @if($errors->has('name'))
                    <p class="text-error">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="mt-6">
                <label id="course_id" class="text-sm font-medium leading-none text-gray-800">
                    Course
                </label>
                <select id="course_id" name="course_id" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2 @error('course_id') border-red-500 @enderror">
                    @foreach($courses as $course)
                        @if($course->id == old('course_id') || $course->id == $exercise->course_id)
                            <option value="{{$course->id}}" selected>{{$course->name}}</option>
                        @else
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('course_id'))
                    <p class="text-error">{{ $errors->first('course_id') }}</p>
                @endif
            </div>

            <div class="mt-8">
                <button role="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
