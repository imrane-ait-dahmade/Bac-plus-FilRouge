@extends('Layouts.App')
@section('content')
    <!-- Hero Section -->
    <section class="w-full min-h-screen flex flex-col lg:flex-row items-center justify-center px-4 py-8 md:py-0">
        <div class="w-full lg:w-1/2 flex flex-col mb-8 lg:mb-0">
            <div class="flex justify-center items-center flex-col gap-4 px-4">
                <p class="text-3xl md:text-4xl lg:text-6xl text-center lg:text-left" style="font-family: 'Mirza', Serif;">
                  <span class="font-bold">Votre futur commence ici :</span><br> découvrez les meilleures écoles pour vous.
                </p>
                <div class="w-full md:w-[70%] py-6 space-y-4">
                    <x-button class="w-full text-lg md:text-xl"><a href="{{route('Auth.showRegisterForm')}}">Découvrez les Écoles</a> </x-button>
                    <x-button class="w-full text-lg md:text-xl">Dernières Nouvelles</x-button>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 flex justify-center">
            <img src="{{asset('../images/HomeFront.svg')}}" alt="Illustration d'accueil" class="w-full max-w-lg h-auto">
        </div>
    </section>

    <!-- Info Section -->
    <section class="w-full min-h-screen bg-white flex flex-col lg:flex-row items-center p-4 md:p-8 lg:p-12">
        <div class="w-full lg:w-[60%] mb-12 lg:mb-0">
            <div class="text-xl md:text-2xl lg:text-3xl text-center font-serif" style="font-family: 'Shanti', Serif;">
                <p class="mb-4">143 établissements publics d'enseignement supérieur t'attendent au Maroc...</p>
                <p class="mb-4">Ce sont 143 opportunités de grandir, d'apprendre, de créer... et de te révéler.</p>
                <p class="mb-4">Que tu rêves d'ingénierie, d'art, de médecine, d'économie ou de sciences humaines — il y a une place pour toi.</p>
                <p class="text-2xl md:text-3xl lg:text-5xl font-bold text-[#8ebe74]">✨ Trouve ce qui t'anime. Suis ta passion. Bâtis ton futur.</p>
            </div>
            <div class="w-full md:w-[80%] mt-12 mx-auto">
                <x-button class="w-full text-lg md:text-xl">
                    S'inscrire
                </x-button>
            </div>
        </div>
        <div class="flex flex-col items-center w-full lg:w-[40%] mt-8 lg:mt-0">
            <!-- Main circle with cutout -->
            <div class="w-48 h-48 md:w-64 md:h-64 rounded-full bg-[#8ebe74] flex items-center justify-center">
                <div class="text-white text-2xl md:text-3xl font-bold z-10">
                    12 universités
                </div>
            </div>
            <div class="relative left-4 md:left-8 top-[-12%] w-48 h-48 md:w-64 md:h-64 rounded-full bg-white flex items-center justify-center opacity-75">
                <div class="text-[#8ebe74] text-2xl md:text-3xl font-bold z-10">
                    143 établissements
                </div>
            </div>
        </div>
    </section>

    <!-- Universities Section -->
    <section class="w-full py-16 px-4">
        <div class="flex flex-col justify-center items-center w-full gap-4 py-6">
            <span class="text-3xl md:text-4xl text-[#8ebe74] font-semibold text-center mb-8">
                Universités marocaines
            </span>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 w-full md:w-[90%] lg:w-[70%] mx-auto">
                <div class="flex justify-center items-center p-2">
                    <img src="{{asset('Images/universiteCadiAyyad.png')}}" alt="Université Cadi Ayyad" class="max-h-24 md:max-h-32 w-auto">
                </div>
                <div class="flex justify-center items-center p-2">
                    <img src="{{asset('Images/UniversiteHassan2.png')}}" alt="Université Hassan II" class="max-h-24 md:max-h-32 w-auto">
                </div>
                <div class="flex justify-center items-center p-2">
                    <img src="{{asset('Images/UniversiteMohamed5.png')}}" alt="Université Mohamed V" class="max-h-24 md:max-h-32 w-auto">
                </div>
                <div class="flex justify-center items-center p-2">
                    <img src="{{asset('Images/UniversiteMoulaySmail.png')}}" alt="Université Moulay Smail" class="max-h-24 md:max-h-32 w-auto">
                </div>
                <div class="flex justify-center items-center p-2 col-span-2 md:col-span-1">
                    <img src="{{asset('Images/UniversiteMohammedPremier.png')}}" alt="Université Mohammed Premier" class="max-h-24 md:max-h-32 w-auto">
                </div>
            </div>
        </div>
    </section>
@endsection
