@extends('Layouts.App')
@section('content')
    <section class="w-[93%] h-screen flex flex-row justify-self-center items-center p-4">
        <div class="w-[50%] flex flex-col ">
            <div class=" flex justify-center items-center flex-col gap-4">
                <p class="text-6xl" style="font-family: 'Mirza' ,Serif ;">
                    Votre futur commence ici :<br> découvrez les meilleures écoles pour vous.
                </p>
                <div class="w-[70%] py-6  ">
                    {{--                <button class=" w-full flex justify-center p-4 text-3xl my-4  ">--}}
                    {{--                <span>Decouvert les Ecoles</span>--}}
                    {{--                </button>--}}
                    {{--                <button class=" w-full flex justify-center p-4 text-3xl  ">--}}
                    {{--                <span>Dernieres Nouvelle</span>--}}
                    {{--                </button>--}}
                    <x-button>Decouvert les Ecoles</x-button>
                    <x-button>Dernieres Nouvelle</x-button>

                </div>
            </div>
        </div>
        <div class="h-fit ">
            <img src="{{asset('../images/HomeFront.svg')}}" alt="hello">
        </div>
    </section>
    <section class="w-full h-screen bg-white flex flex-row  items-center p-12   ">
        <div class="w-[60%] h-fit justify-center justify-self-center items-center ">
      <span class="text-3xl text-center font-serif" style="font-family: 'Shanti', Serif;">
  <p class="mb-4">143 établissements publics d’enseignement supérieur t’attendent au Maroc...</p>

  <p class="mb-4">Ce sont 143 opportunités de grandir, d’apprendre, de créer... et de te révéler.</p>

  <p class="mb-4">Que tu rêves d’ingénierie, d’art, de médecine, d’économie ou de sciences humaines — il y a une place pour toi.</p>

  <p class="text-5xl font-bold text-[#8ebe74]">✨ Trouve ce qui t’anime. Suis ta passion. Bâtis ton futur.</p>
</span>
            <div class="w-[80%] mt-12 justify-self-center">
            <x-button>
                sign up
            </x-button>
            </div>
        </div>
        <div class="flex flex-col items-center  w-[40%] ">
            <!-- Main circle with cutout -->
            <div class=" w-64 h-64  rounded-full bg-[#8ebe74] flex items-center justify-center">
                <div class="text-white text-3xl font-bold z-10">
                    12 university
                </div>
            </div>
            <div
                class=" relative left-8  top-[-12%] w-64 h-64 rounded-full bg-white flex items-center justify-center opacity-75 ">
                <div class="  text-[#8ebe74] text-3xl font-bold z-10">
                    143 etablisement
                </div>
            </div>

        </div>
    </section>
    <section class="w-full h-screen">
        <div class="flex flex-col justify-center items-center w-full gap-4 py-6">
            <span class="text-4xl text-[#8ebe74] font-semibold">
            Universites marocaines
            </span>
            <div class="grid grid-cols-5 grid-rows-2 justify-self-center gap-6 w-[70%] ">
                <div class="flex justify-center items-center"><img src="{{asset('Images/Ens.jpg')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/Ensam.png')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/Ensgmrackech.png')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/EST.png')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/OFPPT-logo.jpg')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/universiteCadiAyyad.png')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/UniversiteHassan2.png')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/UniversiteMohamed5.png')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/UniversiteMoulaySmail.png')}}" alt=""></div>
                <div class="flex justify-center items-center"><img src="{{asset('Images/UniversiteMohammedPremier.png')}}" alt=""></div>

            </div>

        </div>

    </section>

@endsection

