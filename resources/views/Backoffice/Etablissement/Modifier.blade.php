@extends('Layouts.App')
 @section('content')


<form id="FormEdit" action="{{ route('etablissement.update', $etablissement->id) }}" method="post" enctype="multipart/form-data" class="my-8 bg-white p-8 rounded-xl shadow-xl w-full max-w-4xl">
    @csrf
    @method('PUT')
    <div class="flex items-center mb-6">
        <img src="{{ $etablissement->logo ?? 'https://via.placeholder.com/50' }}" alt="Logo" class="mr-4 w-12 h-12 object-cover">
        <h2 class="text-2xl font-bold text-gray-800">Modifier les Informations de l'Établissement</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="InputsIdDiv">
        <div>
            <label for="nometablissement" class="block text-sm font-medium text-gray-700">Nom de l'Établissement</label>
            <input id="nometablissement" name="nometablissement" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('nometablissement', $etablissement->nometablissement) }}">
            @error('nometablissement')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="villeetablissement" class="block text-sm font-medium text-gray-700">Ville</label>
            <input id="villeetablissement" name="villeetablissement" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('villeetablissement', $etablissement->villeetablissement) }}">
            @error('villeetablissement')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="descirptionetablissement" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="descirptionetablissement" name="descirptionetablissement" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('descirptionetablissement', $etablissement->descirptionetablissement) }}</textarea>
            @error('descirptionetablissement')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="adresseetablissement" class="block text-sm font-medium text-gray-700">Adresse</label>
            <input id="adresseetablissement" name="adresseetablissement" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('adresseetablissement', $etablissement->adresseetablissement) }}">
            @error('adresseetablissement')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="universite_id" class="block text-sm font-medium text-gray-700">Université</label>
            <select id="universite_id" name="universite_id" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
{{--                @foreach($universites as $universite)--}}
{{--                    <option value="{{ $universite->id }}" {{ old('universite_id', $etablissement->universite_id) == $universite->id ? 'selected' : '' }}>--}}
{{--                        {{ $universite->nom_universite ?? $universite->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
            </select>
            @error('universite_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- New Fields Before resau -->
        <div>
            <label for="email_contact" class="block text-sm font-medium text-gray-700">Email de Contact</label>
            <input id="email_contact" type="email" name="email_contact" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('email_contact', $etablissement->email_contact ?? 'contact@exemple.com') }}">
            @error('email_contact')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="annee_fondation" class="block text-sm font-medium text-gray-700">Année de Fondation</label>
            <input id="annee_fondation" type="number" name="annee_fondation" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('annee_fondation', $etablissement->annee_fondation ?? 1900) }}">
            @error('annee_fondation')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="directeur" class="block text-sm font-medium text-gray-700">Directeur</label>
            <input id="directeur" name="directeur" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('directeur', $etablissement->directeur ?? 'Nom du Directeur') }}">
            @error('directeur')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- End New Fields -->
        <div>
            <label for="resau" class="block text-sm font-medium text-gray-700">Réseau</label>
            <input id="resau" name="resau" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('resau', $etablissement->resau) }}">
            @error('resau')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="nombreetudiant" class="block text-sm font-medium text-gray-700">Nombre d'Étudiants</label>
            <input id="nombreetudiant" type="number" name="nombreetudiant" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('nombreetudiant', $etablissement->nombreetudiant ?? 5000) }}">
            @error('nombreetudiant')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="region_id" class="block text-sm font-medium text-gray-700">Région</label>
            <select id="region_id" name="region_id" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @foreach($regions as $region)
                    <option value="{{ $region->id }}" {{ old('region_id', $etablissement->region_id) == $region->id ? 'selected' : '' }}>
                        {{ $region->nom_region ?? $region->name }}
                    </option>
                @endforeach
            </select>
            @error('region_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="typeecole_id" class="block text-sm font-medium text-gray-700">Type d'École</label>
            <select id="typeecole_id" name="typeecole_id" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
{{--                @foreach($types as $type)--}}
{{--                    <option value="{{ $type->id }}" {{ old('typeecole_id', $etablissement->typeecole_id) == $type->id ? 'selected' : '' }}>--}}
{{--                        {{ $type->nom_type ?? $type->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
            </select>
            @error('typeecole_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
            <input id="telephone" name="telephone" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('telephone', $etablissement->telephone ?? '+33123456789') }}">
            @error('telephone')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="fax" class="block text-sm font-medium text-gray-700">Fax</label>
            <input id="fax" name="fax" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('fax', $etablissement->fax ?? '+33123456788') }}">
            @error('fax')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="site_web" class="block text-sm font-medium text-gray-700">Site Web</label>
            <input id="site_web" type="url" name="site_web" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('site_web', $etablissement->site_web ?? 'https://www.exemple.com') }}">
            @error('site_web')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="site_inscription" class="block text-sm font-medium text-gray-700">Site d'Inscription</label>
            <input id="site_inscription" type="url" name="site_inscription" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('site_inscription', $etablissement->site_inscription ?? 'https://inscription.exemple.com') }}">
            @error('site_inscription')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="facebook" class="block text-sm font-medium text-gray-700">Facebook</label>
            <input id="facebook" type="url" name="facebook" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('facebook', $etablissement->facebook ?? 'https://facebook.com/exemple') }}">
            @error('facebook')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="instagram" class="block text-sm font-medium text-gray-700">Instagram</label>
            <input id="instagram" type="url" name="instagram" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('instagram', $etablissement->instagram ?? 'https://instagram.com/exemple') }}">
            @error('instagram')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn</label>
            <input id="linkedin" type="url" name="linkedin" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('linkedin', $etablissement->linkedin ?? 'https://linkedin.com/company/exemple') }}">
            @error('linkedin')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
            <input id="logo" type="file" accept="image/*" name="logo" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <img src="{{ $etablissement->logo ?? 'https://via.placeholder.com/100' }}" alt="Current Logo" class="mt-2 w-24 h-24 object-cover">
            @error('logo')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input id="image" type="file" accept="image/*" name="image" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <img src="{{ $etablissement->image ?? 'https://via.placeholder.com/100' }}" alt="Current Image" class="mt-2 w-24 h-24 object-cover">
            @error('image')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="abreviation" class="block text-sm font-medium text-gray-700">Abréviation</label>
            <input id="abreviation" name="abreviation" class="mt-1 block w-full border border-gray-300 rounded-md p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('abreviation', $etablissement->abreviation ?? 'EX') }}">
            @error('abreviation')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mt-6 flex justify-end space-x-4">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Annuler</button>
        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Enregistrer les Modifications</button>
    </div>
</form>
 @endsection
