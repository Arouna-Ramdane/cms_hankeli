<div class="navbar bg-gray-700 text-white shadow-sm">
  <div class="flex-1">
    <a class="text-2xl text-bold">ETS AROUNA</a>
  </div>
  <label class="swap swap-rotate">
  <input type="checkbox" class="theme-controller" value="synthwave" />
</label>
    
    @auth()
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
         <img src="{{ asset('storage/' . (Auth::user()->profile ?? 'imagePersonne/defaultuser.avif')) }}"
     alt="img"
     class="max-h-full max-w-full object-contain transition duration-300 ease-in-out">

        </div>
      </div>
    </div>
    @endauth
  </div>
</div>
