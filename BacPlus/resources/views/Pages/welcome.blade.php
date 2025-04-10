@extends('Layouts.App')
@section('content')
    <section class="w-[93%] flex flex-row justify-self-center p-4">
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
                <x-button >Decouvert les Ecoles</x-button>
                <x-button >Dernieres Nouvelle</x-button>

            </div>
        </div>
        </div>
        <div class="h-fit ">
            <img src="{{asset('../images/HomeFront.svg')}}" alt="hello">
        </div>
    </section>
    <section class="w-full h-content bg-white flex flex-row p-12  ">
        <div class="w-[60%] h-fit justify-center justify-self-center items-center">
      <span class="text-3xl text-center font-serif" style="font-family: 'Shanti', Serif;">
  <p class="mb-4">143 établissements publics d’enseignement supérieur t’attendent au Maroc...</p>

  <p class="mb-4">Ce sont 143 opportunités de grandir, d’apprendre, de créer... et de te révéler.</p>

  <p class="mb-4">Que tu rêves d’ingénierie, d’art, de médecine, d’économie ou de sciences humaines — il y a une place pour toi.</p>


  <p class="text-5xl font-bold text-[#8ebe74]">✨ Trouve ce qui t’anime. Suis ta passion. Bâtis ton futur.</p>
</span>

        </div>
            <div class="flex flex-col items-center  w-[40%] ">
                <!-- Main circle with cutout -->
                <div class=" w-64 h-64  rounded-full bg-[#8ebe74] flex items-center justify-center">
                    <div class="text-white text-3xl font-bold z-10">
                        12 university
                    </div>
                </div>
                <div class=" relative left-8  top-[-12%] w-64 h-64 rounded-full bg-white flex items-center justify-center opacity-50 " ">
                    <div class="  text-[#8ebe74] text-3xl font-bold z-10">
                        143 etablisement
                    </div>
                </div>

        </div>
    </section>

@endsection

