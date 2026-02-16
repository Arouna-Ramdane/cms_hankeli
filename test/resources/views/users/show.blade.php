@extends("layouts.base_no_dashbord")

@section("content")

<div class="min-h-screen bg-gray-100 flex justify-center items-center p-4">
    <div class="w-full max-w-md bg-white shadow-xl rounded-2xl overflow-hidden">
        <!-- Image Section -->
        <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-8 flex justify-center items-center">
            <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-2xl">
                <img src="{{ asset('storage/' . ($personne->profile ?? 'imagePersonne/defaultuser.avif')) }}"
                     alt="{{ $personne->first_name . ' ' . $personne->name }}"
                     class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Info Section -->
        <div class="p-6">
            <!-- Name -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $personne->first_name }} {{ $personne->name }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">{{ $personne->username }}</p>
            </div>

            <!-- Details -->
            <div class="space-y-3 mb-6">
                <!-- Email -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-500">Email</p>
                        <p class="text-sm font-medium text-gray-800 truncate">{{ $personne->email }}</p>
                    </div>
                </div>

                <!-- Contact -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-gray-500">Contact</p>
                        <p class="text-sm font-medium text-gray-800">{{ $personne->contact }}</p>
                    </div>
                </div>

                <!-- Adresse -->
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs text-gray-500">Adresse</p>
                        <p class="text-sm font-medium text-gray-800">{{ $personne->adresse }}</p>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <a href="{{ route('users.index') }}" class="block">
                <button class="w-full py-3 bg-gray-800 hover:bg-gray-700 text-white font-semibold rounded-lg transition">
                    Retour à la liste
                </button>
            </a>
        </div>
    </div>
</div>

@endsection