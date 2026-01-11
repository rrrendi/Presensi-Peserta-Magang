@extends('layouts.app')

@section('title', 'Detail Izin')

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-6">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-purple-600 via-pink-600 to-purple-600 bg-clip-text text-transparent">
                📄 Detail Izin
            </h2>
            <p class="text-gray-600 text-sm sm:text-base mt-1">Informasi lengkap permohonan izin</p>
        </div>
        <a href="{{ route('admin.izin') }}" class="btn-interactive group flex items-center gap-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg transition-all shadow-lg text-sm sm:text-base w-full sm:w-auto justify-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 md:p-8">
        <!-- Info Peserta -->
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 sm:p-6 mb-6 border border-purple-100">
            <div class="flex items-start gap-3 sm:gap-4">
                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="text-white font-bold text-lg sm:text-2xl">{{ substr($izin->pengguna->nama, 0, 1) }}</span>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-1">{{ $izin->pengguna->nama }}</h3>
                    <p class="text-sm sm:text-base text-gray-600 break-all">{{ $izin->pengguna->email }}</p>
                </div>
            </div>
        </div>

        <!-- Detail Izin -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-6">
            <div class="bg-gray-50 p-4 sm:p-5 rounded-xl">
                <label class="flex items-center gap-2 text-xs sm:text-sm text-gray-600 mb-2 font-medium">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Tanggal
                </label>
                <p class="text-base sm:text-lg font-bold text-gray-800">{{ $izin->tanggal->format('d F Y') }}</p>
            </div>
            
            <div class="bg-gray-50 p-4 sm:p-5 rounded-xl">
                <label class="flex items-center gap-2 text-xs sm:text-sm text-gray-600 mb-2 font-medium">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Waktu Pengajuan
                </label>
                <p class="text-base sm:text-lg font-bold text-gray-800">{{ \Carbon\Carbon::parse($izin->waktu)->format('H:i') }} WIB</p>
            </div>
            
            <div class="bg-gray-50 p-4 sm:p-5 rounded-xl">
                <label class="flex items-center gap-2 text-xs sm:text-sm text-gray-600 mb-2 font-medium">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Jenis Izin
                </label>
                <span class="inline-flex items-center gap-1 px-3 sm:px-4 py-1.5 sm:py-2 bg-yellow-100 text-yellow-800 rounded-lg text-sm sm:text-base font-bold">
                    @if($izin->jenis_izin == 'sakit')
                        🏥 Sakit
                    @elseif($izin->jenis_izin == 'kuliah')
                        🎓 Kuliah
                    @else
                        📝 Lainnya
                    @endif
                </span>
            </div>
            
            <div class="bg-gray-50 p-4 sm:p-5 rounded-xl">
                <label class="flex items-center gap-2 text-xs sm:text-sm text-gray-600 mb-2 font-medium">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Tempat
                </label>
                <p class="text-base sm:text-lg font-bold text-gray-800">{{ $izin->tempat }}</p>
            </div>
        </div>

        <!-- Keterangan -->
        <div class="mb-6">
            <label class="flex items-center gap-2 text-sm sm:text-base text-gray-700 mb-3 font-bold">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Keterangan
            </label>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 sm:p-5 rounded-xl border-l-4 border-purple-500">
                <p class="text-gray-800 text-sm sm:text-base leading-relaxed">{{ $izin->keterangan }}</p>
            </div>
        </div>

        <!-- Foto Bukti -->
        <div>
            <label class="flex items-center gap-2 text-sm sm:text-base text-gray-700 mb-3 font-bold">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Foto Bukti
            </label>
            <div class="bg-gray-50 p-3 sm:p-4 rounded-xl border border-gray-200">
                <div class="relative group">
                    <img 
                        src="{{ asset('storage/' . $izin->foto_bukti) }}" 
                        alt="Foto Bukti Izin"
                        class="w-full h-auto rounded-lg shadow-lg transition-transform duration-300 group-hover:scale-[1.02]"
                    >
                    <!-- Overlay untuk zoom -->
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 rounded-lg flex items-center justify-center">
                        <a href="{{ asset('storage/' . $izin->foto_bukti) }}" target="_blank" class="opacity-0 group-hover:opacity-100 transition-opacity bg-white text-gray-800 px-4 py-2 rounded-lg font-medium text-sm flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                            </svg>
                            Lihat Full Size
                        </a>
                    </div>
                </div>
                <p class="text-xs sm:text-sm text-gray-500 mt-3 text-center">Klik gambar untuk melihat ukuran penuh</p>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-interactive {
        transition: all 0.3s ease;
    }
    
    .btn-interactive:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .btn-interactive:active {
        transform: translateY(0);
    }
</style>
@endsection