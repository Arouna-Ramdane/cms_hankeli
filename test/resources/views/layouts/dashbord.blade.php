<style>
    @keyframes slide-in {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes pulse-subtle {
        0%, 100% { opacity: 0.8; }
        50% { opacity: 1; }
    }
    .menu-item {
        animation: slide-in 0.3s ease-out forwards;
        transition: all 0.3s ease;
    }
    .menu-item:hover {
        transform: translateX(8px);
        background: linear-gradient(to right, rgba(34, 197, 94, 0.2), transparent);
    }
    .menu-item svg {
        transition: all 0.3s ease;
    }
    .menu-item:hover svg {
        transform: scale(1.2);
        filter: drop-shadow(0 0 8px rgba(34, 197, 94, 0.6));
    }
    .sidebar-header {
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0.05), transparent);
    }
</style>

<div class="drawer lg:drawer-open">
  <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
  <div class="drawer-content flex flex-col items-center justify-center">
  </div>

  <div class="drawer-side h-screen shadow-2xl">
    <ul class="menu bg-gradient-to-b from-gray-800 via-gray-900 to-black text-white w-80 p-0 h-full">
      
      <!-- Header Section -->
      

      <div class="px-4 space-y-2">
        @can('add-commande')
        <li class="menu-item" style="animation-delay: 0.05s;">
          <a href="{{ route('commandes.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-green-400" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"/>
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
              </svg>
            </div>
            <span class="font-medium">Enregistrer une vente</span>
          </a>
        </li>
        @endcan

        @can('view-commande')
        <li class="menu-item" style="animation-delay: 0.1s;">
          <a href="{{ route('commandes.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-emerald-400" viewBox="0 0 16 16">
                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z"/>
              </svg>
            </div>
            <span class="font-medium">Commandes du jour</span>
          </a>
        </li>
        @endcan

        @can('view-produit')
        <li class="menu-item" style="animation-delay: 0.15s;">
          <a href="{{ route('produits.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-green-400" viewBox="0 0 16 16">
                <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3zM7.5 1H3.75L1.5 4h6zm1 0v3h6l-2.25-3zM15 5H1v10h14z"/>
              </svg>
            </div>
            <span class="font-medium">Inventaire produits</span>
          </a>
        </li>
        @endcan

        @can('view-approvisionnement')
        <li class="menu-item" style="animation-delay: 0.2s;">
          <a href="{{ route('approvisionnements.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-emerald-400" viewBox="0 0 16 16">
                <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3zM7.5 1H3.75L1.5 4h6zm1 0v3h6l-2.25-3zM15 5H1v10h14z"/>
              </svg>
            </div>
            <span class="font-medium">Approvisionnements</span>
          </a>
        </li>
        @endcan

        @can('view-user')
        <li class="menu-item" style="animation-delay: 0.25s;">
          <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-green-400" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
              </svg>
            </div>
            <span class="font-medium">Utilisateurs</span>
          </a>
        </li>
        @endcan

        @can('view-client')
        <li class="menu-item" style="animation-delay: 0.3s;">
          <a href="{{ route('clients.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-emerald-400" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
              </svg>
            </div>
            <span class="font-medium">Clients</span>
          </a>
        </li>
        @endcan

        @can('view-user')
        <li class="menu-item" style="animation-delay: 0.35s;">
          <a href="{{ route('allCommande') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-green-400" viewBox="0 0 16 16">
                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z"/>
              </svg>
            </div>
            <span class="font-medium">Toutes les commandes</span>
          </a>
        </li>
        @endcan

        @can('view-user')
        <li class="menu-item" style="animation-delay: 0.4s;">
          <a href="{{ route('commandes.statistiques') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-green-500/10 group">
            <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="text-emerald-400" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5"/>
              </svg>
            </div>
            <span class="font-medium">Statistiques ventes</span>
          </a>
        </li>
        @endcan
      </div>

      <!-- Spacer -->
      <li class="flex-grow"></li>

      <!-- Logout Button -->
      <li class="p-4 border-t border-gray-700/50">
        <form action="logout" method="post">
          @csrf
          <button class="w-full flex items-center gap-3 px-4 py-3 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all duration-300 group">
            <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center group-hover:bg-red-500/30">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
              </svg>
            </div>
            <span class="font-semibold">Déconnexion</span>
          </button>
        </form>
      </li>
    </ul>
  </div>
</div>