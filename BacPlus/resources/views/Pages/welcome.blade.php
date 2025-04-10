@extends('Layouts.App')
@section('content')
    <section class="w-[93%] flex flex-row justify-self-center p-4">
        <div class="w-[50%] flex flex-col ">
        <div class=" flex justify-center items-center flex-col gap-4">
            <p class="text-6xl" style="font-family: 'Mirza' ,Serif ;">
                Votre futur commence ici :<br> découvrez les meilleures écoles pour vous.
            </p>
            <div class="w-[70%] py-6  ">
                <button class=" w-full flex justify-center p-4 text-3xl my-4  ">
                <span>Decouvert les Ecoles</span>
                </button>
                <button class=" w-full flex justify-center p-4 text-3xl  ">
                <span>Dernieres Nouvelle</span>
                </button>
            </div>
        </div>
        </div>
        <div class="h-fit ">
            <img src="{{asset('../images/HomeFront.svg')}}" alt="hello">
        </div>
    </section>
    <section class="">

    </section>

@endsection

