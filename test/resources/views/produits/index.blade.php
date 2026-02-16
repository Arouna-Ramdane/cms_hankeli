@extends("layouts.base")
@section("content")

<style>
    .table-row:hover {
        background: rgba(34, 197, 94, 0.05);
    }
</style>

<div class="p-6">
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Liste des Produits</h1>
                <p class="text-sm text-gray-500">Inventaire pharmaceutique</p>
            </div>
        </div>

        @can('view-user')
        <a href="{{ route('produits.create') }}">
            <button class="flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Ajouter un produit
            </button>
        </a>
        @endcan
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto max-h-[600px] overflow-y-auto">
            <table class="w-full">
                <thead class="bg-gray-900 text-white sticky top-0">
                    <tr>
                        <th class="px-4 py-3 text-left">Libellé</th>
                        <th class="px-4 py-3 text-left">Prix unitaire (FCFA)</th>
                        <th class="px-4 py-3 text-left">Quantité en stock</th>
                        @can('view-user')
                        <th class="px-4 py-3 text-center">Actions</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($produits as $produit)
                        <tr class="table-row border-t">
                            <td class="px-4 py-3 font-medium">{{ $produit->libelle }}</td>
                            <td class="px-4 py-3 font-semibold text-green-600">
                                {{ number_format($produit->prix, 0, ',', ' ') }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                    {{ $produit->quantiteStock > 10 ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                                    {{ $produit->quantiteStock }}
                                </span>
                            </td>
                            @can('view-user')
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('produits.edit', $produit->produit_id) }}" 
                                       class="p-2 bg-yellow-100 hover:bg-yellow-200 rounded" 
                                       title="Modifier">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-yellow-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8 text-center text-gray-500">
                                Aucun produit trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection