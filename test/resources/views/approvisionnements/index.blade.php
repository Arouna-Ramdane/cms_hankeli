@extends("layouts.base")
@section("content")
<div class="p-12">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between mb-5">
        <form method="GET" action="{{ route('approvisionnements.index') }}" class="flex items-center gap-4">
            filter par date :
            <input type="date" name="date" value="{{ request('date', date('Y-m-d')) }}"
            class="border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
            <button type="submit" class="btn btn-neutral">Valider</button>
        </form>

        <div class="flex gap-2">
            <a href="{{route('approvisionnements.index')}}">
                <button class="btn btn-neutral">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                    </svg>
                    ACTUALISER
                </button>
            </a>

            <a href="{{route('approvisionnements.create')}}">
                <button class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                    </svg>
                    NOUVEAU
                </button>
            </a>
        </div>
    </div>

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 max-h-[500px] overflow-y-auto">
        <table class="table">
            <thead class="text-white bg-gray-900 sticky top-0 z-10">
                <tr>
                    <th>Date</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Stock avant</th>
                    <th>Stock après</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($approvisionnements as $appro)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($appro->date_appro)->format('d/m/Y') }}</td>
                        <td>{{ $appro->produit->libelle ?? 'Produit supprimé' }}</td>
                        <td>
                            <span class="badge badge-success">
                                +{{ number_format($appro->qte_appro, 0, ',', ' ') }}
                            </span>
                        </td>
                        <td>
                            @if($appro->stock_avant !== null)
                                {{ number_format($appro->stock_avant, 0, ',', ' ') }}
                            @else
                                <span class="text-gray-400">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($appro->stock_apres !== null)
                                {{ number_format($appro->stock_apres, 0, ',', ' ') }}
                            @else
                                <span class="text-gray-400">N/A</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex gap-2">
                                {{-- Modifier --}}
                                <div>
                                    <a href="{{route('approvisionnements.edit', $appro->appro_id)}}" 
                                       title="Modifier">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                    </a>
                                </div>

                                
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-8">
                            Aucun approvisionnement trouvé
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination si nécessaire --}}
    @if(method_exists($approvisionnements, 'links'))
        <div class="mt-4">
            {{ $approvisionnements->links() }}
        </div>
    @endif
</div>
@endsection