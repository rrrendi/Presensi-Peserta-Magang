<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Presensi Magang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        .floating-shape {
            animation: float 6s ease-in-out infinite;
        }
        
        .gradient-cosmic {
            background: linear-gradient(135deg, #0c1e3d 0%, #1a3a5c 25%, #2d1b4e 50%, #4a1a4a 75%, #2d1b4e 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        
        .glass-effect input,
        .glass-effect select,
        .glass-effect textarea {
            background: rgba(81, 88, 94, 0.5);
        }
        
        .glass-effect input::placeholder {
            color: rgba(142, 152, 172, 0.8);
        }

        /* Ensure pull-to-refresh works */
        body {
            overscroll-behavior-y: auto;
        }

        /* Prevent content from blocking pull-to-refresh */
        .page-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="gradient-cosmic relative overflow-x-hidden">
    <!-- Decorative cosmic shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-32 h-32 bg-cyan-400 opacity-20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-32 right-20 w-40 h-40 bg-purple-500 opacity-20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-blue-400 opacity-10 rounded-full blur-2xl"></div>
        
        <!-- Floating geometric shape similar to the image -->
        <div class="floating-shape absolute top-1/4 right-1/4 opacity-30">
            <svg width="150" height="150" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#60a5fa;stop-opacity:1" />
                        <stop offset="50%" style="stop-color:#818cf8;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#a78bfa;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <path d="M100 20 L180 100 L100 180 L100 100 Z" fill="url(#grad1)"/>
            </svg>
        </div>
    </div>

    <!-- Page Container -->
    <div class="page-container px-4 py-8 sm:py-12 relative z-10">
        <!-- Login Card -->
        <div class="glass-effect p-6 sm:p-8 md:p-10 rounded-2xl shadow-2xl w-full max-w-[90%] sm:max-w-md">
            <!-- Logo/Icon area -->
            <div class="text-center mb-6 sm:mb-8">
                <div class="inline-block p-1 sm:p-1 bg-gradient-to-br from-cyan-400 via-blue-500 to-purple-600 rounded-2xl mb-4">
                    <img
                        src="/images/logo.png"
                        alt="Icon Absensi"
                        class="w-14 h-14 sm:w-12 sm:h-12 object-contain rounded-xl">
                </div>
                <h1 class="text-xl sm:text-2xl md:text-3xl font-bold bg-gradient-to-r from-cyan-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">
                    PT Rastek Inovasi Digital
                </h1>
                <p class="text-white mt-2 text-sm sm:text-base">Sistem Presensi Magang</p>
            </div>

            @if($errors->any())
                <div class="bg-red-500/90 backdrop-blur-sm border-l-4 border-red-700 text-white px-4 py-3 rounded-lg mb-4 text-sm sm:text-base shadow-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4 sm:space-y-5">
                @csrf
                <div>
                    <label class="block text-white font-medium mb-2 text-sm sm:text-base drop-shadow-lg">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            class="w-full pl-10 pr-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm sm:text-base"
                            placeholder="Masukkan email"
                            required
                        >
                    </div>
                </div>

                <div>
                    <label class="block text-white font-medium mb-2 text-sm sm:text-base drop-shadow-lg">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            name="password" 
                            class="w-full pl-10 pr-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm sm:text-base"
                            placeholder="Masukkan password"
                            required
                        >
                    </div>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 text-white py-3 sm:py-3.5 rounded-lg hover:shadow-lg hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 font-medium text-sm sm:text-base"
                >
                    Login
                </button>
            </form>

            <div class="mt-6 sm:mt-8 p-4 sm:p-5 bg-white/80 backdrop-blur-sm rounded-lg border border-white/30 shadow-lg">
                <p class="font-semibold text-gray-800 mb-2 sm:mb-3 text-xs sm:text-sm">🔐 Demo Akun:</p>
                <div class="space-y-1.5 sm:space-y-2 text-xs sm:text-sm text-gray-700">
                    <div class="flex items-center">
                        <span class="font-medium text-blue-700 w-16 sm:w-20">Admin:</span>
                        <span class="text-gray-800">admin@rastek.com / admin123</span>
                    </div>
                    <div class="border-t border-gray-300 pt-1.5 sm:pt-2">
                        <span class="font-medium text-purple-700">Peserta:</span>
                    </div>
                    <div class="pl-2 sm:pl-4 space-y-1 text-gray-700">
                        <p>• budi@intern.com / password</p>
                        <p>• siti@intern.com / password</p>
                        <p>• ahmad@intern.com / password</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer text -->
    <div class="fixed bottom-0 left-0 right-0 text-center text-white text-xs sm:text-sm opacity-70 pb-4 pointer-events-none">
        <p>&copy; 2026 PT Rastek Inovasi Digital</p>
    </div>

    <script>
        // Ensure page can be refreshed on mobile
        document.addEventListener('DOMContentLoaded', function() {
            // Force enable pull-to-refresh on mobile
            document.body.style.overscrollBehaviorY = 'auto';
            
            // Optional: Add visual feedback for pull-to-refresh
            let startY = 0;
            let isPulling = false;
            
            document.addEventListener('touchstart', function(e) {
                if (window.scrollY === 0) {
                    startY = e.touches[0].pageY;
                    isPulling = true;
                }
            });
            
            document.addEventListener('touchmove', function(e) {
                if (isPulling && window.scrollY === 0) {
                    const currentY = e.touches[0].pageY;
                    const distance = currentY - startY;
                    
                    // If pulling down more than 80px, show hint
                    if (distance > 80) {
                        console.log('Pull to refresh triggered');
                    }
                }
            });
            
            document.addEventListener('touchend', function() {
                isPulling = false;
            });
        });
    </script>
</body>
</html>