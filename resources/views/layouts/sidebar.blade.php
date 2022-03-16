<div class="w-60 custom-height shadow-lg bg-white">
    <ul class="relative">
        <li class="relative">
            <a href="{{route('settings.index')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out {{request()->routeIs('settings.index') ? 'text-gray-900 bg-gray-100' : ''}}">
                Dashboard
            </a>
        </li>
        <li class="relative">
            <a href="{{route('languages.index')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out {{request()->routeIs('languages.index') ? 'text-gray-900 bg-gray-100' : ''}}">
                Languages
            </a>
        </li>
        <li class="relative">
            <a href="{{route('courses.index')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out {{request()->routeIs('courses.index') ? 'text-gray-900 bg-gray-100' : ''}}"">
                Courses
            </a>
        </li>
        <li class="relative">
            <a href="{{route('exercises.index')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out {{request()->routeIs('exercises.index') ? 'text-gray-900 bg-gray-100' : ''}}"">
                Exercises
            </a>
        </li>
        <li class="relative">
            <a href="{{route('users.index')}}" class="flex items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap hover:text-gray-900 hover:bg-gray-100 transition duration-300 ease-in-out {{request()->routeIs('users.index') ? 'text-gray-900 bg-gray-100' : ''}}"">
                Users
            </a>
        </li>
    </ul>
</div>
