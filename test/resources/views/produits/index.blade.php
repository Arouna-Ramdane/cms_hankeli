
@extends("layouts.base")
@section("content")
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between mb-5 items-center">
        <h1 class="text-2xl font-semibold">La liste des produits</h1>
        @can('view-user')
        <a href="{{ route('produits.create') }}">
            <button class="btn btn-neutral">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                AJOUTER PRODUITS
            </button>
        </a>
        @endcan
    </div>

        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 max-h-[500px] overflow-y-auto">
        <table class="table">
                <thead class="text-white bg-gray-900 sticky top-0 z-10">

                <tr>
                    <th class="text-center">Libelle</th>
                    <th class="text-center">Prix uinutaire (FCFA)</th>
                    <th class="text-center">Quantité en stock</th>
                    @can('view-user')
                    <th class="text-center">Actions</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse($produits as $produit)
                    <tr class="hover:bg-gray-50 border-b border-gray-200">
                        <td class=" border-b border-gray-500 text-center">{{ $produit->libelle }}</td>
                        <td class=" border-b border-gray-500 text-center">{{ number_format($produit->prix, 0, ',', ' ') }}</td>
                        <td class=" border-b border-gray-500 text-center">{{ $produit->quantiteStock }}</td>
                        @can('view-user')
                        <td class=" border-b border-gray-500 text-center">
                            
                            <div class="flex gap-2">
                                
                                <a href="{{ route('produits.edit', $produit->produit_id) }}" class="text-gray-900 hover:text-yellow-800" title="Modifier">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                

                                
                            </div>
                        </td>
                        @endcan
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center text-gray-500">Aucun produit trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

@endsection