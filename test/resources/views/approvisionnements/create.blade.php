@extends('layouts.base_no_dashbord')

@section('content')

<div class="min-h-screen bg-gray-100 p-6">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('approvisionnements.index') }}">
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
            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Nouvel Approvisionnement</h1>
                <p class="text-sm text-gray-500">Ajouter du stock</p>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('approvisionnements.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Produit -->
            <div>
                <label for="produit_input" class="block text-sm font-semibold text-gray-700 mb-2">
                    Produit
                </label>
                <input list="produits_list"
                       id="produit_input"
                       placeholder="Sélectionnez un produit"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                <input type="hidden" name="produit_id" id="produit_id">
                <datalist id="produits_list">
                    @foreach($produits as $produit)
                        <option value="{{ $produit->libelle }}" data-id="{{ $produit->produit_id }}">
                    @endforeach
                </datalist>
                @error('produit_id')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Quantité -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Quantité à approvisionner
                </label>
                <input type="number" name="qte_appro" value="{{ old('qte_appro') }}"
                       placeholder="Ex: 100"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('qte_appro')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Date -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Date d'approvisionnement
                </label>
                <input type="date" name="date_appro" value="{{ old('date_appro', date('Y-m-d')) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('date_appro')
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

<script>
    const produitInput = document.getElementById('produit_input');
    const produitIdInput = document.getElementById('produit_id');
    const options = document.querySelectorAll('#produits_list option');

    produitInput.addEventListener('input', function () {
        produitIdInput.value = '';
        options.forEach(option => {
            if (option.value === this.value) {
                produitIdInput.value = option.dataset.id;
            }
        });
    });
</script>

@endsection