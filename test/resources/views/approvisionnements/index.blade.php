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
        <!-- Filter Form -->
        <form method="GET" action="{{ route('approvisionnements.index') }}" class="flex items-center gap-3">
            <label class="font-semibold text-gray-700">Filtrer par date :</label>
            <input type="date" name="date" value="{{ request('date', date('Y-m-d')) }}"
                   class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-green-500 outline-none">
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                Valider
            </button>
        </form>

        <!-- Action Buttons -->
        <div class="flex gap-3">
            <a href="{{route('approvisionnements.index')}}">
                <button class="flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                    </svg>
                    Actualiser
                </button>
            </a>

            <a href="{{route('approvisionnements.create')}}">
                <button class="flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Nouveau
                </button>
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto max-h-[600px] overflow-y-auto">
            <table class="w-full">
                <thead class="bg-gray-900 text-white sticky top-0">
                    <tr>
                        <th class="px-4 py-3 text-left">Date</th>
                        <th class="px-4 py-3 text-left">Produit</th>
                        <th class="px-4 py-3 text-left">Quantité</th>
                        <th class="px-4 py-3 text-left">Stock avant</th>
                        <th class="px-4 py-3 text-left">Stock après</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($approvisionnements as $appro)
                        <tr class="table-row border-t">
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($appro->date_appro)->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 font-medium">{{ $appro->produit->libelle ?? 'Produit supprimé' }}</td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                                    +{{ number_format($appro->qte_appro, 0, ',', ' ') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if($appro->stock_avant !== null)
                                    {{ number_format($appro->stock_avant, 0, ',', ' ') }}
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-semibold text-green-600">
                                @if($appro->stock_apres !== null)
                                    {{ number_format($appro->stock_apres, 0, ',', ' ') }}
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                            </td>
                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                Aucun approvisionnement trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if(method_exists($approvisionnements, 'links'))
        <div class="mt-4">
            {{ $approvisionnements->links() }}
        </div>
    @endif
</div>
@endsection