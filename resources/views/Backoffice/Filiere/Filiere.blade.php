@extends('Layouts.App')

@section('content')
    <div class="my-4 mx-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Détails de la Filière</h1>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Nom de la Filière :</h2>
                <p class="text-gray-600">{{ $filiere->nomfiliere }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Description :</h2>
                <p class="text-gray-600">{{ $filiere->description }}</p>
            </div>

            <div class="mb-4">
                <h2 class="text-xl font-semibold text-gray-700">Niveau :</h2>
                <p class="text-gray-600">{{ $filiere->Niveau }}</p>
            </div>

            <a href="{{ route('filieres') }}" class="inline-block mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                ← Retour à la liste
            </a>
            <a href="{{ route('filiere.edit' ,$filiere->id) }}" class="inline-block mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Edit
            </a>
            <form  action="{{ route('filiere.delete',$filiere->id) }}" method="Post" class="inline-block mt-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                @csrf
                @method('DELETE')
                <button> Suprimer</button>

            </form>
        </div>
    </div>
@endsection

{{--
{{--            <button id="BtnForm">--}}
{{--    hello click--}}
{{--            </button>--}}

{{--            <div  id="Form">--}}

{{--            </div>--}}

{{--    <script src="{{asset('js/Event.js')}}"></script>--}}
{{--    <script>--}}


{{--       document.addEventListener('DOMContentLoaded',function (){--}}
{{--           const Myevent = new Event();--}}

{{--           Myevent.poppap("Form","BtnForm","click");--}}
{{--       });--}}
{{--       const Form = new Event();--}}

{{--       let Inputs = [--}}
{{--           'nomfiliere',--}}
{{--           'Niveau',--}}
{{--           'description',--}}
{{--           'ConditionsAdmission'--}}
{{--       ];--}}

{{--       Form.ComponentDivInputs("Form",Inputs,"mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500");--}}



{{--    </script>--}}

