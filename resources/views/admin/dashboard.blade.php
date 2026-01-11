@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-6 sm:mb-8">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-cyan-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">
            Dashboard Admin
        </h2>
        <p class="text-gray-600 mt-2 text-sm sm:text-base">Kelola data presensi dan izin peserta magang</p>
    </div>

    <!-- Statistik Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
        <!-- Total Peserta -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl shadow-lg p-5 sm:p-6 transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-base sm:text-lg font-medium mb-1 opacity-90">Total Peserta Magang</h3>
            <p class="text-3xl sm:text-4xl md:text-5xl font-bold">{{ $totalPeserta }}</p>
            <div class="mt-3 pt-3 border-t border-white/20">
                <p class="text-xs sm:text-sm text-blue-100">Peserta terdaftar aktif</p>
            </div>
        </div>

        <!-- Presensi Hari Ini -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl shadow-lg p-5 sm:p-6 transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-base sm:text-lg font-medium mb-1 opacity-90">Presensi Hari Ini</h3>
            <p class="text-3xl sm:text-4xl md:text-5xl font-bold">{{ $presensiHariIni }}</p>
            <div class="mt-3 pt-3 border-t border-white/20">
                <p class="text-xs sm:text-sm text-green-100">Peserta sudah presensi</p>
            </div>
        </div>

        <!-- Izin Hari Ini -->
        <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 text-white rounded-xl shadow-lg p-5 sm:p-6 transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-base sm:text-lg font-medium mb-1 opacity-90">Izin Hari Ini</h3>
            <p class="text-3xl sm:text-4xl md:text-5xl font-bold">{{ $izinHariIni }}</p>
            <div class="mt-3 pt-3 border-t border-white/20">
                <p class="text-xs sm:text-sm text-yellow-100">Permohonan izin aktif</p>
            </div>
        </div>
    </div>

    <!-- Menu Navigasi - CLEARLY CLICKABLE BUTTONS -->
    <div class="mb-6 sm:mb-8">
        <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            Menu Utama
        </h3>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
            <!-- Button Data Presensi -->
            <a href="{{ route('admin.presensi') }}" class="btn-interactive group block bg-gradient-to-br from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white rounded-xl shadow-lg p-6 sm:p-8 transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 sm:p-4 bg-white/20 rounded-lg group-hover:bg-white/30 transition-all backdrop-blur-sm">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <svg class="w-7 h-7 sm:w-8 sm:h-8 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">📋 Data Presensi</h3>
                <p class="text-cyan-100 text-sm sm:text-base leading-relaxed mb-4">
                    Lihat semua data presensi masuk dan keluar peserta magang dengan detail lengkap
                </p>
                <div class="mt-4 pt-4 border-t border-white/20 flex items-center justify-between">
                    <span class="text-xs sm:text-sm font-medium">Klik untuk melihat data</span>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-100"></div>
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-200"></div>
                    </div>
                </div>
            </a>

            <!-- Button Data Izin -->
            <a href="{{ route('admin.izin') }}" class="btn-interactive group block bg-gradient-to-br from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white rounded-xl shadow-lg p-6 sm:p-8 transform hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 sm:p-4 bg-white/20 rounded-lg group-hover:bg-white/30 transition-all backdrop-blur-sm">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <svg class="w-7 h-7 sm:w-8 sm:h-8 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </div>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold mb-2 sm:mb-3">📄 Data Izin</h3>
                <p class="text-purple-100 text-sm sm:text-base leading-relaxed mb-4">
                    Lihat semua data izin beserta foto bukti dan keterangan lengkap dari peserta
                </p>
                <div class="mt-4 pt-4 border-t border-white/20 flex items-center justify-between">
                    <span class="text-xs sm:text-sm font-medium">Klik untuk melihat data</span>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-100"></div>
                        <div class="w-2 h-2 bg-white rounded-full animate-pulse delay-200"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Info Box -->
    <div class="bg-gradient-to-r from-blue-50 to-purple-50 border-l-4 border-blue-500 rounded-lg p-4 sm:p-6 shadow-md">
        <div class="flex items-start gap-3 sm:gap-4">
            <div class="p-2 bg-blue-100 rounded-lg flex-shrink-0">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <h4 class="font-bold text-gray-800 text-sm sm:text-base mb-1">Informasi</h4>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Klik pada card <span class="font-semibold text-blue-600">"Data Presensi"</span> atau 
                    <span class="font-semibold text-purple-600">"Data Izin"</span> di atas untuk melihat data lengkap. 
                    Data akan terupdate secara real-time setiap ada perubahan.
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-interactive {
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .btn-interactive::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .btn-interactive:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .delay-100 {
        animation-delay: 0.1s;
    }
    
    .delay-200 {
        animation-delay: 0.2s;
    }
</style>
@endsection