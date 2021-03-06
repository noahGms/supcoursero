@extends('layouts.settings')

@section('content')
<div class="container px-5 py-5 mx-auto">
    <div class="flex items-center mb-4">
        <h1 class="text-xl mb-0">Settings dashboard</h1>
    </div>

    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <div
            class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-gray-100"
        >
            <div class="p-4 flex items-center">
            <div
                class="p-3 rounded-full text-orange-500 bg-orange-100 mr-4"
            >
                <i class="fa-solid fa-users w-5 h-5 text-center"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                Total users
                </p>
                <p class="text-lg font-semibold text-gray-700">
                {{ $total_users }}
                </p>
            </div>
            </div>
        </div>
        <div
            class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-gray-100"
        >
            <div class="p-4 flex items-center">
            <div
                class="p-3 rounded-full text-green-500 bg-green-100 mr-4"
            >
            <i class="fa-solid fa-language w-5 h-5 text-center"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                Total languages
                </p>
                <p class="text-lg font-semibold text-gray-700">
                {{ $total_languages }}
                </p>
            </div>
            </div>
        </div>
        <div
            class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-gray-100"
        >
            <div class="p-4 flex items-center">
            <div
                class="p-3 rounded-full text-blue-500 bg-blue-100 mr-4"
            >
                <i class="fa-solid fa-graduation-cap w-5 h-5 text-center"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                Total courses
                </p>
                <p class="text-lg font-semibold text-gray-700">
                {{ $total_courses }}
                </p>
            </div>
            </div>
        </div>
        <div
            class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-gray-100"
        >
            <div class="p-4 flex items-center">
            <div
                class="p-3 rounded-full text-teal-500 bg-teal-100 mr-4"
            >
                <i class="fa-solid fa-flask w-5 h-5 text-center"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                Total excercises
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $total_exercises }}
                </p>
            </div>
            </div>
        </div>

        <div
            class="min-w-0 rounded-lg shadow-xs overflow-hidden bg-gray-100"
        >
            <div class="p-4 flex items-center">
            <div
                class="p-3 rounded-full text-teal-500 bg-teal-100 mr-4"
            >
                <i class="fa-solid fa-file w-5 h-5 text-center"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                Total excercise files
                </p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $total_exercise_files }}
                </p>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
