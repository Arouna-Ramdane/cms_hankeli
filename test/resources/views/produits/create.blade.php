@extends('layouts.base_no_dashbord')

@section('content')

<div class="min-h-screen bg-gray-100 p-6">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{route('produits.index')}}">
            <button class="flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Retour
            </button>
        </a>
    </div>

    <!-- Form Card -->
    <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <!-- Header -->
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Nouveau Produit</h1>
                <p class="text-sm text-gray-500">Enregistrer un produit pharmaceutique</p>
            </div>
        </div>

        <!-- Form -->
        <form action="{{route('produits.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Libelle -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nom du produit
                </label>
                <input type="text" 
                       name="libelle" 
                       value="{{ old('libelle') }}"  
                       placeholder="Ex: Paracétamol 500mg"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('libelle')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Prix -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Prix (FCFA)
                </label>
                <input type="text" 
                       name="prix" 
                       value="{{ old('prix') }}"  
                       placeholder="Ex: 500"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('prix')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Quantité -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Quantité en stock
                </label>
                <input type="number"  
                       name="quantiteStock" 
                       value="{{ old('quantiteStock') }}" 
                       placeholder="Ex: 100"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('quantiteStock')
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