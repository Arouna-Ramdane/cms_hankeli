@extends('layouts.base_no_dashbord')

@section('content')

<style>
    @keyframes slide-in-right {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .card-animate {
        animation: slide-in-right 0.5s ease-out;
    }

    .fade-in {
        animation: fade-in 0.3s ease-out;
    }

    .cart-item {
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        transform: translateX(-4px);
        background: rgba(34, 197, 94, 0.05);
    }

    .product-row:hover {
        background: linear-gradient(to right, rgba(34, 197, 94, 0.05), transparent);
    }

    #panier::-webkit-scrollbar {
        width: 6px;
    }

    #panier::-webkit-scrollbar-track {
        background: #f3f4f6;
        border-radius: 10px;
    }

    #panier::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #22c55e, #10b981);
        border-radius: 10px;
    }
</style>

<div class="min-h-screen w-full bg-gradient-to-br from-gray-50 via-white to-gray-100 p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('commandes.index') }}"
           class="flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg shadow-md transition">
            ← Retour
        </a>
    </div>

    <form action="{{ route('commandes.store') }}" method="POST" id="form" class="w-full">
        @csrf

        <!-- Errors -->
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 shadow fade-in">
                <strong>Erreurs détectées :</strong>
                <ul class="list-disc ml-6 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- ================= PRODUITS ================= -->
            <div class="lg:col-span-8 bg-white rounded-2xl shadow-xl border overflow-hidden">

                <div class="bg-gradient-to-r from-gray-800 to-gray-900 p-5">
                    <h2 class="text-white text-lg font-bold">
                        Produits Disponibles
                    </h2>
                </div>

                <!-- Search -->
                <div class="p-5 border-b">
                    <input type="text" id="searchProduit"
                        placeholder="Rechercher un produit (nom, prix, stock)..."
                        class="w-full border px-4 py-3 rounded-lg focus:ring-2 focus:ring-green-500 outline-none">
                </div>

                <!-- Table -->
                <div class="overflow-y-auto max-h-[600px]">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-900 text-white sticky top-0">
                            <tr>
                                <th class="px-4 py-3 text-left">Produit</th>
                                <th class="px-4 py-3 text-left">Prix</th>
                                <th class="px-4 py-3 text-left">Stock</th>
                                <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr class="border-t product-row transition">
                                <td class="px-4 py-3 font-medium">
                                    {{ $produit->libelle }}
                                </td>

                                <td class="px-4 py-3">
                                    <span class="font-semibold text-green-600">
                                        {{ $produit->prix }}
                                    </span> FCFA
                                </td>

                                <td class="px-4 py-3">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                        {{ $produit->quantiteStock > 10 ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                        {{ $produit->quantiteStock }} unités
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <button type="button"
                                        onclick="ajouterPanier('{{ $produit->libelle }}','{{ $produit->prix }}','{{ $produit->quantiteStock }}','{{ $produit->produit_id }}')"
                                        class="px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white rounded-lg text-sm shadow-md transition">
                                        + Ajouter
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ================= PANIER ================= -->
            <div class="lg:col-span-4 bg-white rounded-2xl shadow-xl border p-6 sticky top-6 card-animate">

                <!-- Client -->
                <div class="mb-6 bg-green-50 border border-green-200 p-4 rounded-lg">
                    <label class="block font-semibold mb-2 text-gray-700">
                        Client
                    </label>

                    <input list="clients_list"
                        name="client_name"
                        id="client_input"
                        placeholder="Sélectionnez un client"
                        class="w-full border px-4 py-2 rounded-lg focus:ring-2 focus:ring-green-500">

                    <input type="hidden" name="client_id" id="client_id">

                    <datalist id="clients_list">
                        @foreach($clients as $client)
                            <option value="{{ $client->first_name }} {{ $client->name }} ({{ $client->contact }})"
                                    data-id="{{ $client->client_id }}">
                        @endforeach
                    </datalist>

                    <div class="text-xs mt-2">
                        Client introuvable ?
                        <a href="{{ route('clients.create') }}" class="text-green-600 font-semibold underline">
                            Ajouter-le
                        </a>
                    </div>
                </div>

                <!-- Panier -->
                <h3 class="font-bold mb-3 text-gray-800">Panier</h3>

                <div id="panier"
                     class="space-y-2 max-h-80 overflow-y-auto pr-2 mb-4">
                </div>

                <input type="hidden" name="value_total" id="input_total">

                <!-- Total -->
                <div class="border-t pt-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="font-semibold text-lg">Total :</span>
                        <div class="text-2xl font-bold text-green-600">
                            <span id="prix_total">0</span> FCFA
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-lg shadow-lg transition">
                        ✔ Enregistrer la vente
                    </button>
                </div>

            </div>

        </div>
    </form>
</div>

@endsection

@push('scripts')
    @vite('resources/js/commandes/vente.js')
@endpush
