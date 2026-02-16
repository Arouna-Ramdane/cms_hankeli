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
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes cross-pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }
    @keyframes slide-right {
        from { opacity: 0; transform: translateX(-30px); }
        to { opacity: 1; transform: translateX(0); }
    }
    .float-pill { animation: float 6s ease-in-out infinite; }
    .pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }
    .fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
    .cross-pulse { animation: cross-pulse 2s ease-in-out infinite; }
    .slide-right { animation: slide-right 0.6s ease-out forwards; }
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>

<div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100">
    
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-64 h-64 bg-green-500/10 rounded-full blur-3xl pulse-glow"></div>
        <div class="absolute bottom-20 right-10 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pulse-glow" style="animation-delay: 1.5s;"></div>
        
        <!-- Floating Medical Icons -->
        <svg class="absolute top-32 right-1/4 w-16 h-16 text-green-500/20 float-pill" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4.22 11.29l6.36-6.37a4.5 4.5 0 016.38 6.38l-6.37 6.36a4.5 4.5 0 11-6.37-6.37zm1.42 1.42a2.5 2.5 0 003.53 3.53l6.37-6.36a2.5 2.5 0 00-3.54-3.54l-6.36 6.37z"/>
        </svg>
        <svg class="absolute bottom-40 left-1/4 w-14 h-14 text-emerald-500/15 float-pill" style="animation-delay: 2s;" fill="currentColor" viewBox="0 0 24 24">
            <path d="M21.71 2.29a1 1 0 00-1.42 0L18 4.59l-2.29-2.3a1 1 0 00-1.42 1.42L16.59 6l-4.3 4.29-1.88-1.88a1 1 0 00-1.42 0l-6 6a1 1 0 000 1.42l3.17 3.17-3.87 3.88a1 1 0 101.42 1.41l3.88-3.87 3.17 3.17a1 1 0 001.42 0l6-6a1 1 0 000-1.42L14.9 13.3 19.19 9l2.3 2.29a1 1 0 001.42-1.42L20.59 7.71l2.3-2.3a1 1 0 00-.18-1.12z"/>
        </svg>
        
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

    <!-- Main Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 py-12">
        
        <!-- Header Section -->
        <div class="text-center mb-16 fade-in-up">
            <div class="inline-flex items-center justify-center w-28 h-28 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 shadow-2xl shadow-green-500/50 mb-6 relative">
                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
                </svg>
                <div class="absolute -top-2 -right-2 bg-white rounded-full p-1.5 shadow-lg">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4.22 11.29l6.36-6.37a4.5 4.5 0 016.38 6.38l-6.37 6.36a4.5 4.5 0 11-6.37-6.37zm1.42 1.42a2.5 2.5 0 003.53 3.53l6.37-6.36a2.5 2.5 0 00-3.54-3.54l-6.36 6.37z"/>
                    </svg>
                </div>
            </div>
            
            <h1 class="text-6xl font-bold bg-gradient-to-r from-green-600 via-emerald-600 to-green-700 bg-clip-text text-transparent mb-4">
                CMS HANKELI
            </h1>
            <p class="text-2xl text-gray-700 font-semibold mb-3">Système de Gestion Pharmaceutique</p>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Solution complète et moderne pour la gestion professionnelle de votre pharmacie
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <!-- Feature 1 -->
            <div class="glass-card rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 fade-in-up" style="animation-delay: 0.1s;">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Gestion des Stocks</h3>
                <p class="text-gray-600">Suivi en temps réel de vos médicaments et produits pharmaceutiques avec alertes automatiques</p>
            </div>

            <!-- Feature 2 -->
            <div class="glass-card rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 fade-in-up" style="animation-delay: 0.2s;">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Gestion Clients</h3>
                <p class="text-gray-600">Fichier client complet avec historique des ordonnances et programmes de fidélité</p>
            </div>

            <!-- Feature 3 -->
            <div class="glass-card rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 fade-in-up" style="animation-delay: 0.3s;">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Rapports & Analyses</h3>
                <p class="text-gray-600">Tableaux de bord détaillés et rapports financiers pour optimiser votre activité</p>
            </div>
        </div>

        <!-- Additional Features -->
        <div class="grid md:grid-cols-2 gap-6 mb-16">
            <div class="glass-card rounded-xl p-6 shadow-lg slide-right" style="animation-delay: 0.4s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Sécurisé et Conforme</h4>
                        <p class="text-gray-600 text-sm">Respect des normes pharmaceutiques et protection des données patients</p>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-xl p-6 shadow-lg slide-right" style="animation-delay: 0.5s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Interface Intuitive</h4>
                        <p class="text-gray-600 text-sm">Prise en main rapide pour votre équipe, formation minimale requise</p>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-xl p-6 shadow-lg slide-right" style="animation-delay: 0.6s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Performance Optimale</h4>
                        <p class="text-gray-600 text-sm">Rapidité et fluidité pour gérer efficacement votre pharmacie</p>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-xl p-6 shadow-lg slide-right" style="animation-delay: 0.7s;">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">Support Technique</h4>
                        <p class="text-gray-600 text-sm">Assistance disponible pour accompagner votre utilisation quotidienne</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="glass-card rounded-2xl p-12 shadow-2xl text-center fade-in-up" style="animation-delay: 0.8s;">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Prêt à optimiser votre pharmacie ?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Accédez à votre espace professionnel et découvrez tous les outils pour gérer efficacement votre établissement pharmaceutique
            </p>
            <a 
                href="{{ route('login') }}" 
                class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-lg shadow-green-500/30 hover:shadow-xl hover:shadow-green-500/40 transform hover:scale-105 transition-all duration-300"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Accéder à mon espace
            </a>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center">
            <div class="flex items-center justify-center gap-4 text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Plateforme sécurisée</span>
                </div>
                <span>•</span>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
                    </svg>
                    <span>Certifié pour usage pharmaceutique</span>
                </div>
            </div>
            <p class="mt-4 text-xs text-gray-400">© 2024 CMS HANKELI - Tous droits réservés</p>
        </div>
    </div>
</div>
@endsection