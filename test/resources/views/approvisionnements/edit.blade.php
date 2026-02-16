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
            <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Modifier l'Approvisionnement</h1>
                <p class="text-sm text-gray-500">Mettre à jour les informations</p>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ route('approvisionnements.update', $approvisionnement->appro_id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Produit -->
            <div>
                <label for="produit_input" class="block text-sm font-semibold text-gray-700 mb-2">
                    Produit
                </label>
                <input list="produits_list"
                       id="produit_input"
                       value="{{ $approvisionnement->produit->libelle ?? '' }}"
                       placeholder="Sélectionnez un produit"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                <input type="hidden" name="produit_id" id="produit_id" value="{{ $approvisionnement->produit_id }}">
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
                    Quantité approvisionnée
                </label>
                <input type="number" name="qte_appro" value="{{ old('qte_appro', $approvisionnement->qte_appro) }}"
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
                <input type="date" name="date_appro" value="{{ old('date_appro', $approvisionnement->date_appro) }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent outline-none">
                @error('date_appro')
                    <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Info Stock (Read-only) -->
            @if($approvisionnement->stock_avant !== null && $approvisionnement->stock_apres !== null)
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-sm font-semibold text-blue-800 mb-2">Informations de stock</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-600">Stock avant :</span>
                        <span class="font-semibold text-gray-800">{{ number_format($approvisionnement->stock_avant, 0, ',', ' ') }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600">Stock après :</span>
                        <span class="font-semibold text-green-600">{{ number_format($approvisionnement->stock_apres, 0, ',', ' ') }}</span>
                    </div>
                </div>
            </div>
            @endif

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