<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS HANKELI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
    
    <style>
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        @keyframes float-subtle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        .animated-bg {
            background: linear-gradient(-45deg, #f9fafb, #ffffff, #f3f4f6, #e5e7eb);
            background-size: 400% 400%;
            animation: gradient-shift 15s ease infinite;
        }
        
        .medical-pattern {
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(34, 197, 94, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(16, 185, 129, 0.03) 0%, transparent 50%);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f3f4f6;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #22c55e, #10b981);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #16a34a, #059669);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <!-- Navbar -->
    <header class="sticky top-0 z-50 shadow-lg">
        @include('layouts.navbar')
    </header>
    
    <!-- Main Content Area -->
    <main class="flex-1 animated-bg medical-pattern h-screen overflow-y-auto">
        <div class="min-h-full">
            @yield('content')
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-800 via-gray-900 to-black text-white border-t border-green-500/20 mt-auto shadow-2xl">
        @include('layouts.footer')
    </footer>
</body>
</html>