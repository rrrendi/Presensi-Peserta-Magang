@extends('layouts.app')

@section('title', 'Dashboard Peserta Magang')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-6 sm:mb-8">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-cyan-600 via-blue-600 to-purple-600 bg-clip-text text-transparent">
            👋 Dashboard Peserta
        </h2>
        <p class="text-gray-600 mt-2 text-sm sm:text-base">Selamat datang, {{ auth()->user()->nama }}!</p>
    </div>

    <!-- Status Hari Ini Card -->
    <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 md:p-8 mb-6">
        <div class="flex items-center justify-between mb-4 sm:mb-6">
            <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                📅 Status Hari Ini
            </h3>
            <span class="px-3 sm:px-4 py-1.5 sm:py-2 bg-gradient-to-r from-blue-100 to-purple-100 text-blue-800 rounded-full text-xs sm:text-sm font-medium">
                {{ now()->format('d F Y') }}
            </span>
        </div>
        
        @if($presensiHariIni)
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <!-- Presensi Masuk -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 sm:p-6 rounded-xl border-l-4 border-green-500">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 sm:p-3 bg-green-500 rounded-lg">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <p class="text-sm sm:text-base text-gray-700 font-medium">Presensi Masuk</p>
                    </div>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-green-700">
                        {{ \Carbon\Carbon::parse($presensiHariIni->waktu_masuk)->format('H:i') }}
                    </p>
                    <p class="text-xs sm:text-sm text-green-600 mt-1">✓ Sudah tercatat</p>
                </div>
                
                <!-- Presensi Keluar -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 sm:p-6 rounded-xl border-l-4 border-blue-500">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 sm:p-3 bg-blue-500 rounded-lg">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <p class="text-sm sm:text-base text-gray-700 font-medium">Presensi Keluar</p>
                    </div>
                    <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-700">
                        {{ $presensiHariIni->waktu_keluar ? \Carbon\Carbon::parse($presensiHariIni->waktu_keluar)->format('H:i') : 'Belum' }}
                    </p>
                    <p class="text-xs sm:text-sm {{ $presensiHariIni->waktu_keluar ? 'text-blue-600' : 'text-gray-500' }} mt-1">
                        {{ $presensiHariIni->waktu_keluar ? '✓ Sudah tercatat' : '⏳ Belum presensi keluar' }}
                    </p>
                </div>
            </div>
        @elseif($izinHariIni)
            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-4 sm:p-6 rounded-xl border-l-4 border-yellow-500">
                <div class="flex items-start gap-3 sm:gap-4">
                    <div class="p-2 sm:p-3 bg-yellow-500 rounded-lg flex-shrink-0">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-base sm:text-lg text-gray-700 mb-2">
                            Status: <span class="font-bold text-yellow-700">IZIN</span>
                        </p>
                        <div class="space-y-1 text-xs sm:text-sm">
                            <p class="text-gray-700"><span class="font-semibold">Jenis:</span> {{ ucfirst($izinHariIni->jenis_izin) }}</p>
                            <p class="text-gray-700"><span class="font-semibold">Keterangan:</span> {{ $izinHariIni->keterangan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-6 sm:py-8">
                <div class="inline-block p-4 sm:p-5 bg-gray-100 rounded-full mb-3 sm:mb-4">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-gray-500 text-sm sm:text-base mb-2">Belum ada presensi atau izin hari ini</p>
                <p class="text-xs sm:text-sm text-gray-400">Silakan lakukan presensi masuk atau ajukan izin</p>
            </div>
        @endif
    </div>

    <!-- Tombol Aksi -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-6">
        @if(!$presensiHariIni && !$izinHariIni)
            <form action="{{ route('peserta.presensi.masuk') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="btn-interactive w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-3 sm:py-4 rounded-xl font-bold shadow-lg text-sm sm:text-base flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Presensi Masuk
                </button>
            </form>
        @endif

        @if($presensiHariIni && !$presensiHariIni->waktu_keluar)
            <form action="{{ route('peserta.presensi.keluar') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="btn-interactive w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-3 sm:py-4 rounded-xl font-bold shadow-lg text-sm sm:text-base flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Presensi Keluar
                </button>
            </form>
        @endif

        @if(!$presensiHariIni && !$izinHariIni)
            <a href="{{ route('peserta.izin.form') }}" class="btn-interactive w-full bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 text-white py-3 sm:py-4 rounded-xl font-bold shadow-lg text-sm sm:text-base flex items-center justify-center gap-2">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Ajukan Izin
            </a>
        @endif
    </div>

    <!-- Riwayat Presensi -->
    <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6">
        <div class="flex items-center gap-2 sm:gap-3 mb-4 sm:mb-6">
            <svg class="w-6 h-6 sm:w-7 sm:h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-lg sm:text-xl font-bold text-gray-800">Riwayat Presensi (7 Hari Terakhir)</h3>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-blue-50 to-purple-50">
                    <tr>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Tanggal</th>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Masuk</th>
                        <th class="px-3 sm:px-4 py-3 text-left text-xs sm:text-sm font-bold text-gray-700">Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayatPresensi as $presensi)
                        <tr class="border-b border-gray-100 hover:bg-blue-50 transition-colors">
                            <td class="px-3 sm:px-4 py-3 sm:py-4">
                                <div class="flex items-center gap-2 text-sm sm:text-base text-gray-700">
                                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $presensi->tanggal->format('d/m/Y') }}
                                </div>
                            </td>
                            <td class="px-3 sm:px-4 py-3 sm:py-4">
                                <span class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 bg-green-100 text-green-800 rounded-lg text-xs sm:text-sm font-medium">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($presensi->waktu_masuk)->format('H:i') }}
                                </span>
                            </td>
                            <td class="px-3 sm:px-4 py-3 sm:py-4">
                                @if($presensi->waktu_keluar)
                                    <span class="inline-flex items-center gap-1 px-2 sm:px-3 py-1 bg-blue-100 text-blue-800 rounded-lg text-xs sm:text-sm font-medium">
                                        <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($presensi->waktu_keluar)->format('H:i') }}
                                    </span>
                                @else
                                    <span class="text-gray-400 text-xs sm:text-sm">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-3 sm:px-4 py-6 sm:py-8 text-center">
                                <div class="flex flex-col items-center text-gray-500">
                                    <svg class="w-10 h-10 sm:w-12 sm:h-12 mb-2 sm:mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <p class="text-sm sm:text-base">Belum ada riwayat presensi</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .btn-interactive {
        transition: all 0.3s ease;
    }
    
    .btn-interactive:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
    
    .btn-interactive:active {
        transform: translateY(0);
    }
</style>
@endsection