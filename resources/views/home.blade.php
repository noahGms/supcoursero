@extends('layouts.base')

@section('content')
    <div class="container px-5 py-5 mx-auto">
        <h1 class="text-3xl text-center mb-10">Upload your exercise file</h1>

        <div class="flex justify-center w-full">
            <form action="{{route('exercise-files.store')}}" enctype="multipart/form-data" method="post" class="h-full w-full md:w-1/2 lg:w-1/2">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-400 mb-6 border text-white px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">An error are occurred</strong>
                    </div>
                @endif

                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <label for="language_id" class="text-sm font-medium leading-none text-gray-800">
                            Language
                        </label>
                        <select onchange="handleLanguageSelection()" id="language_id" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2">
                            <option value="">Select a language</option>
                            @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="course_id" class="text-sm font-medium leading-none text-gray-800">
                            Course
                        </label>
                        <select disabled onchange="handleCourseSelection()" id="course_id" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2">
                            <option value="">Please select a language</option>
                        </select>
                    </div>

                    <div>
                        <label for="exercise_id" class="text-sm font-medium leading-none text-gray-800">
                            Exercise
                        </label>
                        <select disabled id="exercise_id" name="exercise_id" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2">
                            <option value="">Please select an exercise</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="file" class="text-sm font-medium leading-none text-gray-800">
                        File
                    </label>
                    <input type="file" id="file" name="file" class="bg-gray-200 border rounded  text-xs font-medium leading-none text-gray-800 py-3 w-full pl-3 mt-2 @error('file') border-red-500 @enderror"/>
                    @if($errors->has('file'))
                        <p class="text-error">{{ $errors->first('file') }}</p>
                    @endif
                </div>

                <div class="mt-8">
                    <button role="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 text-sm font-semibold leading-none text-white focus:outline-none bg-indigo-700 border rounded hover:bg-indigo-600 py-4 w-full">
                        Upload
                    </button>
                </div>
            </form>
        </div>

        <h1 class="text-xl text-center mb-10 mt-10">My uploads</h1>

        <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
            <tr>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Exercise</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Status</th>
                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($exerciseFiles->isEmpty())
                <tr>
                    <td colspan="4" class="py-3 text-center">
                        <div class="bg-indigo-400 border text-white px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">No uploads found.</strong>
                        </div>
                    </td>
                </tr>
            @endif
            @foreach($exerciseFiles as $file)
                <tr>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">{{ $file->name }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">{{ $file->exercise->name }}</td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">
                        <span class="px-1 py-1 rounded" style="background-color: {{$file->status->color}};">
                            {{ $file->status->color }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm leading-5 text-gray-900">
                        <a href="{{route('exercise-files.download', $file->id)}}">
                            <i class="fa-solid fa-download"></i>
                        </a>
                        <form class="inline-flex ml-2" action="{{route('exercise-files.destroy', $file->id)}}" method="post">
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

    <script>
        async function handleLanguageSelection() {
            let language_id = document.getElementById('language_id').value

            const {data} = await window.axios.post('/api/courses-by-language/', {
                language_id
            })

            if (data.length) {
                document.getElementById('course_id').disabled = false
                document.getElementById('course_id').innerHTML = '<option value="">Select a course</option>'
                data.forEach(course => {
                    document.getElementById('course_id').innerHTML += `<option value="${course.id}">${course.name}</option>`
                })
            } else {
                document.getElementById('course_id').disabled = true
                document.getElementById('course_id').innerHTML = '<option value="">No courses available</option>'
            }
        }

        async function handleCourseSelection() {
            const course_id = document.getElementById('course_id').value

            const {data} = await window.axios.post('/api/exercises-by-course/', {
                course_id
            })

            if (data.length) {
                document.getElementById('exercise_id').disabled = false
                document.getElementById('exercise_id').innerHTML = '<option value="">Select an exercise</option>'
                data.forEach(exercise => {
                    document.getElementById('exercise_id').innerHTML += `<option value="${exercise.id}">${exercise.name}</option>`
                })
            } else {
                document.getElementById('exercise_id').disabled = true
                document.getElementById('exercise_id').innerHTML = '<option value="">No exercises available</option>'
            }
        }
    </script>
@endsection
