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
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Liste des Employés</h1>
                <p class="text-sm text-gray-500">Gestion des utilisateurs</p>
            </div>
        </div>

        @can('add-user')
        <a href="{{route('users.create')}}">
            <button class="flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Ajouter un utilisateur
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
                        <th class="px-4 py-3 text-left">Nom</th>
                        <th class="px-4 py-3 text-left">Prénom</th>
                        <th class="px-4 py-3 text-left">Contact</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Username</th>
                        <th class="px-4 py-3 text-left">Adresse</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="table-row border-t">
                            <td class="px-4 py-3 font-medium">{{ $user->first_name }}</td>
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->contact }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">{{ $user->username }}</td>
                            <td class="px-4 py-3">{{ $user->adresse }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <!-- Voir -->
                                    <a href="{{route('users.show',$user->user_id)}}"
                                       class="p-2 bg-blue-100 hover:bg-blue-200 rounded" title="Voir">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </a>

                                    <!-- Modifier -->
                                    <a href="{{route('users.edit',$user->user_id)}}"
                                       class="p-2 bg-yellow-100 hover:bg-yellow-200 rounded" title="Modifier">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-yellow-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>

                                    <!-- Supprimer (sauf user_id=1) -->
                                    @if ($user->user_id != "1")
                                    <form action="{{route('users.destroy',$user->user_id)}}" method="POST" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?');"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-100 hover:bg-red-200 rounded" title="Supprimer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-red-600">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                Aucun utilisateur trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection