<nav class="w-[93%]  flex justify-between justify-self-center items-center px-6 py-4 bg-transparent shadow-sm">

    <div class="flex items-center">
        <img src="{{asset('images/logbacPlus.svg')}}" alt="Logo de l'application" class="h-14 w-auto">

    </div>


    <form method="GET" action="" class="flex w-full max-w-xl items-center bg-white rounded-full shadow-md px-4 py-2 ml-4" role="search" aria-label="Formulaire de recherche">
        <input
            type="text"
            name="query"
            placeholder="Rechercher..."
            class="flex-grow px-4 py-2 text-sm border-none focus:outline-none focus:ring-0"
            value="{{ request('query') }}"
        >
        <div type="submit" class="p-2 rounded-full hover:bg-gray-100 transition">
            <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #63E6BE;"></i>
        </div>
    </form>
</nav>
