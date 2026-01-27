@extends('layouts.base_no_dashbord')

@section('content')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    @keyframes pulse-glow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }
    @keyframes slide-in {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes cross-pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }
    .float-pill { animation: float 6s ease-in-out infinite; }
    .pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }
    .slide-in { animation: slide-in 0.6s ease-out forwards; }
    .cross-pulse { animation: cross-pulse 2s ease-in-out infinite; }
    .glass-morphism {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .input-glow:focus {
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
    }
</style>

<div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100 flex items-center justify-center p-4">
    
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Glowing Orbs -->
        <div class="absolute top-20 left-10 w-64 h-64 bg-green-500/10 rounded-full blur-3xl pulse-glow"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pulse-glow" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-green-500/5 rounded-full blur-3xl pulse-glow" style="animation-delay: 3s;"></div>
        
        <!-- Floating Medical Icons -->
        <!-- Pills -->
        <svg class="absolute top-32 right-1/4 w-16 h-16 text-green-500/20 float-pill" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4.22 11.29l6.36-6.37a4.5 4.5 0 016.38 6.38l-6.37 6.36a4.5 4.5 0 11-6.37-6.37zm1.42 1.42a2.5 2.5 0 003.53 3.53l6.37-6.36a2.5 2.5 0 00-3.54-3.54l-6.36 6.37z"/>
        </svg>
        <!-- Syringe -->
        <svg class="absolute bottom-40 left-1/4 w-14 h-14 text-emerald-500/15 float-pill" style="animation-delay: 2s;" fill="currentColor" viewBox="0 0 24 24">
            <path d="M21.71 2.29a1 1 0 00-1.42 0L18 4.59l-2.29-2.3a1 1 0 00-1.42 1.42L16.59 6l-4.3 4.29-1.88-1.88a1 1 0 00-1.42 0l-6 6a1 1 0 000 1.42l3.17 3.17-3.87 3.88a1 1 0 101.42 1.41l3.88-3.87 3.17 3.17a1 1 0 001.42 0l6-6a1 1 0 000-1.42L14.9 13.3 19.19 9l2.3 2.29a1 1 0 001.42-1.42L20.59 7.71l2.3-2.3a1 1 0 00-.18-1.12z"/>
        </svg>
        <!-- Stethoscope -->
        <svg class="absolute top-1/2 right-16 w-16 h-16 text-green-600/20 float-pill" style="animation-delay: 4s;" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19 8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zm0 4c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zM17 16c0 1.66-1.34 3-3 3s-3-1.34-3-3c0-1.04.53-1.95 1.34-2.49.27 2.15 2.07 3.82 4.27 3.82.34 0 .67-.04.99-.12-.38.46-.6 1.03-.6 1.65V20H7v-1.14c0-.62-.22-1.19-.6-1.65.32.08.65.12.99.12 2.2 0 4-1.67 4.27-3.82.81.54 1.34 1.45 1.34 2.49z"/>
        </svg>
        <!-- Medical Cross decorations -->
        <div class="absolute top-40 left-1/3 text-green-500/10 cross-pulse">
            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
            </svg>
        </div>
        <div class="absolute bottom-32 right-1/3 text-emerald-500/10 cross-pulse" style="animation-delay: 1s;">
            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
            </svg>
        </div>
    </div>

    <!-- Main Card -->
    <div class="relative w-full max-w-md slide-in">
        <!-- Logo/Header Section with Medical Cross -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 shadow-2xl shadow-green-500/50 mb-4 relative">
                <!-- Medical Cross Icon -->
                <svg class="w-14 h-14 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
                </svg>
                <!-- Pill decoration on badge -->
                <div class="absolute -top-1 -right-1 bg-white rounded-full p-1 shadow-lg">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4.22 11.29l6.36-6.37a4.5 4.5 0 016.38 6.38l-6.37 6.36a4.5 4.5 0 11-6.37-6.37zm1.42 1.42a2.5 2.5 0 003.53 3.53l6.37-6.36a2.5 2.5 0 00-3.54-3.54l-6.36 6.37z"/>
                    </svg>
                </div>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-green-600 via-emerald-600 to-green-700 bg-clip-text text-transparent mb-2">
                CMS HANKELI
            </h1>
            <p class="text-gray-600 text-sm font-medium flex items-center justify-center gap-2">
                <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z"/>
                </svg>
                Système de Gestion Pharmaceutique
            </p>
        </div>

        <!-- Login Form Card -->
        <div class="glass-morphism rounded-2xl shadow-2xl p-8 relative overflow-hidden">
            <!-- Decorative Medical Cross Corners -->
            <div class="absolute -top-4 -right-4 text-green-500/5">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
                </svg>
            </div>
            <div class="absolute -bottom-4 -left-4 text-emerald-500/5">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
                </svg>
            </div>
            
            <div class="relative z-10">
                <h2 class="text-2xl font-bold text-center mb-1 bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                    Connexion Pharmacie
                </h2>
                <p class="text-center text-gray-500 text-sm mb-6 flex items-center justify-center gap-1">
                    <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    Accès réservé aux professionnels de santé
                </p>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Username Field -->
                    <div class="relative">
                        <label for="username" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Nom d'utilisateur
                        </label>
                        <div class="relative">
                            <input 
                                type="text" 
                                name="username" 
                                id="username" 
                                placeholder="Entrez votre identifiant" 
                                class="w-full px-4 py-3 pl-12 rounded-lg bg-white text-gray-900 placeholder-gray-400 border border-gray-300 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-500/20 input-glow transition-all duration-300"
                                required
                            />
                            <div class="absolute left-4 top-1/2 -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        </div>
                        @error('username')
                            <p class="text-red-600 text-xs mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Mot de passe
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                placeholder="••••••••" 
                                class="w-full px-4 py-3 pl-12 rounded-lg bg-white text-gray-900 placeholder-gray-400 border border-gray-300 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-500/20 input-glow transition-all duration-300"
                                required
                            />
                            <div class="absolute left-4 top-1/2 -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                        </div>
                        @error('password')
                            <p class="text-red-600 text-xs mt-2 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full py-3.5 rounded-lg font-semibold text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 shadow-lg shadow-green-500/30 hover:shadow-xl hover:shadow-green-500/40 flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Se connecter à la pharmacie
                    </button>
                </form>

                <!-- Footer Info -->
                <div class="mt-6 text-center">
                    <p class="text-xs text-gray-500 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.22 11.29l6.36-6.37a4.5 4.5 0 016.38 6.38l-6.37 6.36a4.5 4.5 0 11-6.37-6.37zm1.42 1.42a2.5 2.5 0 003.53 3.53l6.37-6.36a2.5 2.5 0 00-3.54-3.54l-6.36 6.37z"/>
                        </svg>
                        Plateforme certifiée pour la gestion pharmaceutique
                    </p>
                </div>
            </div>
        </div>

        <!-- Security Badge with Medical Icon -->
        <div class="mt-6 flex items-center justify-center gap-3 text-gray-600 text-xs bg-white/60 backdrop-blur-sm rounded-full px-4 py-2 shadow-sm">
            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="font-medium">Connexion sécurisée SSL</span>
            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
            </svg>
        </div>
    </div>
</div>
@endsection