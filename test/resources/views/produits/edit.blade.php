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
            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Modifier le Produit</h1>
                <p class="text-sm text-gray-500">Mettre à jour les informations</p>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('produits.update', $produits->produit_id)}}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Libelle -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Nom du produit
                </label>
                <input type="text" 
                       name="libelle" 
                       value="{{ $produits->libelle }}" 
                       placeholder="Nom du produit"
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
                       value="{{ $produits->prix }}" 
                       placeholder="Prix"
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
                       value="{{ $produits->quantiteStock }}" 
                       placeholder="Quantité"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('quantiteStock')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <button type="submit"
                    class="flex-1 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition">
                    Mettre à jour
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