<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CMS HANKELI - Gestion Pharmaceutique</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .animated-bg {
            background: linear-gradient(-45deg, #f9fafb, #ffffff, #f3f4f6, #ffffff);
            background-size: 400% 400%;
            animation: gradient-shift 15s ease infinite;
        }
        
        .sidebar-shadow {
            box-shadow: 4px 0 20px rgba(34, 197, 94, 0.1);
        }
        
        .content-area {
            background: linear-gradient(to bottom right, #f9fafb, #f3f4f6);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1f2937;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #22c55e, #10b981);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #16a34a, #059669);
        }
        
        /* Main content scrollbar */
        main::-webkit-scrollbar-track {
            background: #e5e7eb;
        }
        
        main::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #22c55e, #10b981);
            border-radius: 10px;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    <!-- Navbar -->
    <header class="sticky top-0 z-50">
        @include('layouts.navbar')
    </header>

    <!-- Main Layout -->
    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-80 shrink-0 sidebar-shadow h-full overflow-y-auto">
            @include('layouts.dashbord')
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 content-area p-3 h-screen overflow-y-auto">
            
            <!-- Content Area -->
            <div class="bg-white rounded-2xl  p-6 min-h-[calc(100vh-180px)] border-white">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-800 via-gray-800 to-gray-800 text-black border-t border-green-500/20 mt-auto">
        @include('layouts.footer')
    </footer>
</body>
</html>