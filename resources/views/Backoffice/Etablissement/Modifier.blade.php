@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-6">Modifier l'Établissement</h2>

                <form action="{{ route('etablissements.update', $etablissement->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-2">
                            <div class="space-y-6">
                                <div>
                                    <label for="nomEtablissement">Nom de l'Établissement</label>
                                    <input type="text" name="nometablissement" id="nomEtablissement" value="{{ old('nometablissement') ?? $etablissement->nometablissement }}" class="input">
                                </div>

                                <div>
                                    <label for="domaine">Domaine</label>
                                    <input type="text" name="domaine" id="domaine" value="{{ old('domaine') ?? $etablissement->domaine }}" class="input">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="villeEtablissement">Ville</label>
                                        <input type="text" name="villeEtablissement" id="villeEtablissement" value="{{ old('villeEtablissement') ?? $etablissement->villeEtablissement }}" class="input">
                                    </div>
                                    <div>
                                        <label for="region_id">Région</label>
                                        <select name="region_id" id="region_id" class="input">
                                            @foreach($regions as $region)
                                                <option value="{{ $region->id }}" {{ (old('region_id') ?? $etablissement->region_id) == $region->id ? 'selected' : '' }}>
                                                    {{ $region->nom_region }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div>
                                    <label for="adresseEtablissement">Adresse</label>
                                    <input type="text" name="adresseEtablissement" id="adresseEtablissement" value="{{ old('adresseEtablissement') ?? $etablissement->adresseEtablissement }}" class="input">
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="telephone">Téléphone</label>
                                        <input type="tel" name="telephone" id="telephone" value="{{ old('telephone') ?? $etablissement->telephone }}" class="input">
                                    </div>
                                    <div>
                                        <label for="fax">Fax</label>
                                        <input type="tel" name="fax" id="fax" value="{{ old('fax') ?? $etablissement->fax }}" class="input">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="siteWeb">Site Web</label>
                                        <input type="url" name="siteWeb" id="siteWeb" value="{{ old('siteWeb') ?? $etablissement->siteWeb }}" class="input">
                                    </div>
                                    <div>
                                        <label for="siteInscription">Site d'Inscription</label>
                                        <input type="url" name="siteInscription" id="siteInscription" value="{{ old('siteInscription') ?? $etablissement->siteInscription }}" class="input">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="Universite">Université</label>
                                        <select name="Unversite" id="Universite" class="input">
                                            @foreach($universites as $universite)
                                                <option value="{{ $universite->name }}" {{ (old('Unversite') ?? $etablissement->Unversite) == $universite->name ? 'selected' : '' }}>
                                                    {{ $universite->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="resau">Réseau</label>
                                        <input type="text" name="resau" id="resau" value="{{ old('resau') ?? $etablissement->resau }}" class="input">
                                    </div>
                                </div>

                                <div>
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') ?? $etablissement->email }}" class="input">
                                </div>

                                <div>
                                    <label for="nombreEtudiant">Nombre d'Étudiants</label>
                                    <input type="number" name="nombreEtudiant" id="nombreEtudiant" value="{{ old('nombreEtudiant') ?? $etablissement->nombreEtudiant }}" class="input">
                                </div>

                                <div>
                                    <label>Type d'École</label>
                                    <div class="flex gap-4">
                                        <label><input type="radio" name="TypeEcole" value="Public" {{ (old('TypeEcole') ?? $etablissement->TypeEcole) == 'Public' ? 'checked' : '' }}> Public</label>
                                        <label><input type="radio" name="TypeEcole" value="Private" {{ (old('TypeEcole') ?? $etablissement->TypeEcole) == 'Private' ? 'checked' : '' }}> Privé</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center space-y-6">
                            <!-- Photo preview -->
                            <div>
                                <label>Photo de l'établissement</label>
                                <div class="preview-img">
                                    <img src="{{ asset('storage/photos/' . $etablissement->photo) }}" class="object-cover w-32 h-32 rounded-full">
                                </div>
                                <input type="file" name="photo" class="mt-2">
                            </div>

                            <!-- Logo preview -->
                            <div>
                                <label>Logo de l'établissement</label>
                                <div class="preview-img">
                                    <img src="{{ asset('storage/logos/' . $etablissement->logo) }}" class="object-contain w-32 h-32">
                                </div>
                                <input type="file" name="logo" class="mt-2">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="facebook">Facebook</label>
                        <input type="url" name="facebook" id="facebook" value="{{ old('facebook') ?? $etablissement->facebook }}" class="input">

                        <label for="instagram">Instagram</label>
                        <input type="url" name="instagram" id="instagram" value="{{ old('instagram') ?? $etablissement->instagram }}" class="input">

                        <label for="linkedin">LinkedIn</label>
                        <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin') ?? $etablissement->linkedin }}" class="input">
                    </div>

                    <div class="mt-6">
                        <label for="descirptionetablissement">Description</label>
                        <textarea name="descirptionetablissement" id="descirptionetablissement" rows="4" class="input">{{ old('descirptionetablissement') ?? $etablissement->descirptionetablissement }}</textarea>
                    </div>

                    <div class="mt-8 text-center">
                        <button type="submit" class="btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
