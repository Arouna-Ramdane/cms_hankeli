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

    <!-- Header Section -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Commandes du Jour</h1>

        <div class="flex gap-3">
            <a href="{{route('commandes.create')}}">
                <button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Nouvelle Vente
                </button>
            </a>

            @can('view-commande')
            <a href="{{route('allCommande')}}">
                <button class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">
                    Toutes les Commandes
                </button>
            </a>
            @endcan

            <a href="{{route('ImprimeJournalier')}}">
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Imprimer
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
                        <th class="px-4 py-3 text-left">Prix Total</th>
                        <th class="px-4 py-3 text-left">Vendeur</th>
                        <th class="px-4 py-3 text-left">Client</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($commandes as $commande)
                        <tr class="table-row border-t">
                            <td class="px-4 py-3">{{ $commande->dateCommande }}</td>
                            <td class="px-4 py-3 font-semibold text-green-600">
                                {{ number_format($commande->prix_total, 0, ',', ' ') }} FCFA
                            </td>
                            <td class="px-4 py-3">{{ $commande->user_first_name }} {{ $commande->user_name }}</td>
                            <td class="px-4 py-3">{{ $commande->first_name }} {{ $commande->name }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    @can('view-lignecommande')
                                    <a href="{{ route('commandes.show', $commande->commande_id) }}" 
                                       class="p-2 bg-blue-100 hover:bg-blue-200 rounded" title="Voir">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>
                                    @endcan

                                    <a href="{{ route('recu.download', $commande->commande_id) }}"
                                       class="p-2 bg-red-100 hover:bg-red-200 rounded" title="PDF">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="text-red-600" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                                Aucune commande trouvée
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="bg-green-50 border-t border-green-200 px-4 py-3">
            <div class="flex justify-end items-center gap-2">
                <span class="font-semibold text-gray-700">Total général :</span>
                <span class="text-xl font-bold text-green-600">{{number_format($tatal_commandes, 0, ',', ' ')}} FCFA</span>
            </div>
        </div>
    </div>
</div>

@endsection