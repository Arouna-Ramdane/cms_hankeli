@extends('layouts.base_no_dashbord')

@section('content')

<div class="min-h-screen bg-gray-100 p-6">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{route('users.index')}}">
            <button class="flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Retour
            </button>
        </a>
    </div>

    <!-- Form Card -->
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <!-- Header -->
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Nouvel Utilisateur</h1>
                <p class="text-sm text-gray-500">Créer un compte utilisateur</p>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Grid 2 columns -->
            <div class="grid md:grid-cols-2 gap-5">
                <!-- Nom -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nom</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Ex: Dupont"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                    @error('first_name')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Prénom -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Prénom</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Jean"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                    @error('name')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Grid 2 columns -->
            <div class="grid md:grid-cols-2 gap-5">
                <!-- Username -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nom d'utilisateur</label>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Ex: jdupont"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                    @error('username')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Contact -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contact</label>
                    <input type="tel" name="contact" value="{{ old('contact') }}" placeholder="Ex: 90 00 00 00"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                    @error('contact')
                        <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Ex: jean.dupont@exemple.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('email')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Adresse -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Adresse</label>
                <input type="text" name="adresse" value="{{ old('adresse') }}" placeholder="Ex: 123 Rue de la Pharmacie"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('adresse')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Photo de profil -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Photo de profil</label>
                <input type="file" name="profile" accept="image/*"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                @error('profile')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('password')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <button type="submit"
                    class="flex-1 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                    Enregistrer
                </button>
                <button type="reset"
                    class="flex-1 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>

@endsection