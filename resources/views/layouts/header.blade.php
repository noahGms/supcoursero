<header class="text-gray-600 body-font shadow-lg">
    <div class="container-lg mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img class="cursor-pointer" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/header-1-svg1.svg" alt="circle" />
            <h2 class="font-normal text-2xl leading-6 text-gray-800 ml-2">Supcoursero</h2>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900">Link</a>
        </nav>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                Logout
                <i class="ml-2 fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </form>
    </div>
</header>
