@extends('layouts.app')

@section('title', 'Data Izin')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-6">
        <div>
            <h2 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-purple-600 via-pink-600 to-purple-600 bg-clip-text text-transparent">
                📄 Data Izin
            </h2>
            <p class="text-gray-600 text-sm sm:text-base mt-1">Kelola permohonan izin peserta magang</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-interactive group flex items-center gap-2 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg transition-all shadow-lg text-sm sm:text-base w-full sm:w-auto justify-center">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Filter Card -->
    <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 mb-6">
        <div class="flex items-center gap-2 mb-4">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
            </svg>
            <h3 class="font-bold text-gray-800 text-base sm:text-lg">Filter Data</h3>
        </div>
        
        <form method="GET" action="{{ route('admin.izin') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
            <div>
                <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5">
                    <svg class="inline w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Tanggal
                </label>
                <input 
                    type="date" 
                    name="tanggal" 
                    value="{{ request('tanggal') }}"
                    class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-sm sm:text-base"
                >
            </div>
            
            <div>
                <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5">
                    <svg class="inline w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Peserta
                </label>
                <select 
                    name="pengguna_id"
                    class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-sm sm:text-base"
                >
                    <option value="">Semua Peserta</option>
                    @foreach($pesertaList as $peserta)
                        <option value="{{ $peserta->id }}" {{ request('pengguna_id') == $peserta->id ? 'selected' : '' }}>
                            {{ $peserta->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-1.5">
                    <svg class="inline w-4 h-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Jenis Izin
                </label>
                <select 
                    name="jenis_izin"
                    class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition text-sm sm:text-base"
                >
                    <option value="">Semua Jenis</option>
                    <option value="sakit" {{ request('jenis_izin') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    <option value="kuliah" {{ request('jenis_izin') == 'kuliah' ? 'selected' : '' }}>Kuliah</option>
                    <option value="lainnya" {{ request('jenis_izin') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            
            <div class="flex items-end gap-2">
                <button type="submit" class="btn-interactive flex-1 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg font-medium transition-all shadow-lg text-sm sm:text-base">
                    <svg class="inline w-4 h-4 sm:w-5 sm:h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Filter
                </button>
                <a href="{{ route('admin.izin') }}" class="btn-interactive flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 sm:px-6 py-2 sm:py-2.5 rounded-lg font-medium transition-all text-center text-sm sm:text-base">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Tabel Izin -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-purple-50 to-pink-50">
                    <tr>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-bold text-gray-700">No</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-bold text-gray-700">Nama Peserta</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-bold text-gray-700">Tanggal</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-bold text-gray-700">Jenis Izin</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-bold text-gray-700 hidden sm:table-cell">Tempat</th>
                        <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-bold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($izin as $index => $item)
                        <tr class="border-b border-gray-100 hover:bg-purple-50 transition-colors">
                            <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm sm:text-base">{{ $izin->firstItem() + $index }}</td>
                            <td class="px-4 sm:px-6 py-3 sm:py-4">
                                <div class="flex items-center gap-2 sm:gap-3">
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-white font-bold text-xs sm:text-sm">{{ substr($item->pengguna->nama, 0, 1) }}</span>
                                    </div>
                                    <span class="font-medium text-gray-800 text-sm sm:text-base">{{ $item->pengguna->nama }}</span>
                                </div>
                            </td>
                            <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm sm:text-base text-gray-700">
                                {{ $item->tanggal->format('d/m/Y') }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 sm:py-4">
                                <span class="inline-flex items-center px-2 sm:px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs sm:text-sm font-medium">
                                    @if($item->jenis_izin == 'sakit')
                                        🏥
                                    @elseif($item->jenis_izin == 'kuliah')
                                        🎓
                                    @else
                                        📝
                                    @endif
                                    <span class="ml-1">{{ ucfirst($item->jenis_izin) }}</span>
                                </span>
                            </td>
                            <td class="px-4 sm:px-6 py-3 sm:py-4 text-sm sm:text-base text-gray-700 hidden sm:table-cell">
                                {{ $item->tempat }}
                            </td>
                            <td class="px-4 sm:px-6 py-3 sm:py-4">
                                <a href="{{ route('admin.izin.detail', $item->id) }}" class="inline-flex items-center gap-1 sm:gap-2 text-purple-600 hover:text-purple-800 font-medium transition-colors text-xs sm:text-sm">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    <span class="hidden sm:inline">Lihat Detail</span>
                                    <span class="sm:hidden">Detail</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 sm:px-6 py-8 sm:py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-500">
                                    <svg class="w-12 h-12 sm:w-16 sm:h-16 mb-3 sm:mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-base sm:text-lg font-medium">Tidak ada data izin</p>
                                    <p class="text-xs sm:text-sm text-gray-400 mt-1">Data izin akan muncul di sini</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 sm:px-6 py-4 bg-gray-50 border-t border-gray-100">
            {{ $izin->links() }}
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