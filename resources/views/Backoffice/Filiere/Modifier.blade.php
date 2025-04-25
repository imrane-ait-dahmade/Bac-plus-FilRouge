@extends('Layouts.App')

@section ('content')

    <Form id="Form" action="{{route('filiere.update',$filiere->id)}}" method="Post" class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 space-y-6">
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Ajouter / Modifier une Filière</h2>

        <div>
            <label for="nomfiliere" class="block text-sm font-medium text-gray-700 mb-1">Nom de la Filière</label>
            <input id="nomfiliere" name="nomfiliere" value="{{$filiere->nomfiliere}}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
        </div>

        <div>
            <label for="Niveau" class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
            <input id="Niveau" name="Niveau" value="{{$filiere->Niveau}}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="description" name="description" value="{{$filiere->description}}" placeholder="{{$filiere->description}}" rows="3"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">{{$filiere->description}}</textarea>
        </div>

        <div>
            <label for="ConditionsAdmission" class="block text-sm font-medium text-gray-700 mb-1">Conditions d'Admission</label>
            <textarea id="ConditionsAdmission" name="ConditionsAdmission" placeholder="{{$filiere->ConditionsAdmission}}" rows="3"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">{{$filiere->ConditionsAdmission}}</textarea>
        </div>

        <div class="text-right pt-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Enregistrer
            </button>
        </div>
    </Form>

@endsection
