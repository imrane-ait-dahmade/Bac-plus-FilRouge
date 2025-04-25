
@extends('Layouts.App')

@section('content')

    <form action="{{route('filiere.store')}}" method="POST" class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow-md space-y-6 my-6" enctype="multipart/form-data">
        @csrf
        @method('Post')
        <h2 class="text-2xl font-semibold text-gray-800">Créer une Filière</h2>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label for="nomfiliere" class="block text-sm font-medium text-gray-700">Nom de la filière</label>
                <input
                    type="text"
                    id="nomfiliere"
                    name="nomfiliere"
                    placeholder="Ex: Informatique"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
            </div>

            <div>
                <label for="Niveau" class="block text-sm font-medium text-gray-700">Niveau</label>
                <input
                    type="text"
                    id="Niveau"
                    name="Niveau"
                    placeholder="Ex: Licence, Master"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    placeholder="Décris brièvement la filière"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                ></textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="ConditionsAdmission" class="block text-sm font-medium text-gray-700">Conditions d'admission</label>
                <textarea
                    id="ConditionsAdmission"
                    name="ConditionsAdmission"
                    rows="3"
                    placeholder="Ex: Bac +2 requis"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                ></textarea>
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
                Ajouter la Filière
            </button>
        </div>
    </form>



    {{--    <script src="{{asset('js/Event.js')}}"></script>--}}
{{--    <script>--}}

{{--        const Form = new Event();--}}

{{--               let Inputs = [--}}
{{--                   'nomfiliere',--}}
{{--                   'Niveau',--}}
{{--                   'description',--}}
{{--                   'ConditionsAdmission'--}}
{{--               ];--}}
{{--        Form.ComponentDivInputs("Form",Inputs,"mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500");--}}


{{--    </script>--}}

@endsection
