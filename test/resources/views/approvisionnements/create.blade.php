@extends('layouts.base_no_dashbord')

@section('content')

<div class="p-6">
    <a href="{{ route('approvisionnements.index') }}">
        <button class="btn btn-neutral">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
            retour
        </button>
    </a>
</div>

<div class="max-w-xl mx-auto mt-10 bg-white shadow-md rounded-xl p-8 justify-center">
    <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">
        Formulaire d'approvisionnement
    </h1>

    <form action="{{ route('approvisionnements.store') }}" method="POST">
        @csrf

        {{-- PRODUIT --}}
        <div>
    <label for="produit_input" class="block text-sm font-semibold">
        Produit
    </label>

    <input list="produits_list"
           id="produit_input"
           placeholder="nom du produit"
           class="w-full border px-2 py-1 rounded mt-1">

    <input type="hidden" name="produit_id" id="produit_id">

    <datalist id="produits_list">
        @foreach($produits as $produit)
            <option
                value="{{ $produit->libelle }}"
                data-id="{{ $produit->produit_id }}">
            </option>
        @endforeach
    </datalist>

    @error('produit_id')
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>


        {{-- QUANTITÉ --}}
        <div class="mt-4">
            <input type="number" name="qte_appro" value="{{ old('qte_appro') }}"
                   placeholder="Quantité approvisionnée"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                          focus:outline-none focus:ring focus:ring-blue-200">

            @error('qte_appro')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- DATE --}}
        <div class="mt-4">
            <input type="date" name="date_appro" value="{{ old('date_appro') }}"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm
                          focus:outline-none focus:ring focus:ring-blue-200">

            @error('date_appro')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- BOUTONS --}}
        <div class="flex justify-between pt-6">
            <button type="submit"
                class="btn btn-neutral px-6 py-2 rounded-lg hover:bg-gray-900 transition">
                Enregistrer
            </button>

            <button type="reset"
                class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition">
                Annuler
            </button>
        </div>
    </form>
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
