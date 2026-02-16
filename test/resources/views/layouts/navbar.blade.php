<style>
    @keyframes pulse-brand {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }
    @keyframes slide-down {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .navbar-brand {
        animation: slide-down 0.5s ease-out;
    }
    .avatar-ring {
        transition: all 0.3s ease;
    }
    .avatar-ring:hover {
        transform: scale(1.1);
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.6);
    }
    .medical-badge {
        animation: pulse-brand 3s ease-in-out infinite;
    }
</style>

<div class="navbar bg-gradient-to-r from-gray-800 via-gray-900 to-black text-white shadow-2xl border-b border-green-500/20">
  <div class="flex-1">
    <div class="navbar-brand flex items-center gap-3 px-4">
      <!-- Medical Cross Badge -->
      <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/50 medical-badge">
        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
          <path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6V3z"/>
        </svg>
      </div>
      
      <!-- Brand Text -->
      <div>
        <h1 class="text-2xl font-bold bg-gradient-to-r from-green-400 via-emerald-400 to-green-500 bg-clip-text text-transparent">
          CMS HANKELI
        </h1>
        <p class="text-xs text-gray-400 flex items-center gap-1">
          <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4.22 11.29l6.36-6.37a4.5 4.5 0 016.38 6.38l-6.37 6.36a4.5 4.5 0 11-6.37-6.37zm1.42 1.42a2.5 2.5 0 003.53 3.53l6.37-6.36a2.5 2.5 0 00-3.54-3.54l-6.36 6.37z"/>
          </svg>
          Pharmacie
        </p>
      </div>
    </div>
  </div>

 
    
  @auth()
  <div class="dropdown dropdown-end">
    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar avatar-ring relative group">
      <!-- Online Status Badge -->
      <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-gray-900 z-10"></div>
      
      <div class="w-12 h-12 rounded-full ring-2 ring-green-500/50 group-hover:ring-green-400 transition-all">
        <img 
          src="{{ asset('storage/' . (Auth::user()->profile ?? 'imagePersonne/defaultuser.avif')) }}"
          alt="Profile"
          class="w-full h-full rounded-full object-cover"
        />
      </div>
    </div>
    
   
  </div>
  @endauth
</div>