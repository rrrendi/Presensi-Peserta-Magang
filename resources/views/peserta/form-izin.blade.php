@extends('layouts.app')

@section('title', 'Ajukan Izin')

@section('content')
<div class="max-w-3xl mx-auto">
    <!-- Header -->
    <div class="mb-6 sm:mb-8">
        <h2 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-yellow-600 via-orange-600 to-yellow-600 bg-clip-text text-transparent">
            📝 Ajukan Izin
        </h2>
        <p class="text-gray-600 text-sm sm:text-base mt-1">Isi form di bawah untuk mengajukan permohonan izin</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-5 sm:p-6 md:p-8">
        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 sm:py-4 rounded-lg mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div class="flex-1">
                        <p class="font-bold mb-2 text-sm sm:text-base">Terdapat kesalahan:</p>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('peserta.izin.simpan') }}" method="POST" enctype="multipart/form-data" class="space-y-5 sm:space-y-6">
            @csrf

            <!-- Jenis Izin -->
            <div>
                <label class="flex items-center gap-2 text-sm sm:text-base text-gray-700 font-bold mb-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Jenis Izin <span class="text-red-500">*</span>
                </label>
                <select 
                    name="jenis_izin" 
                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition text-sm sm:text-base {{ $errors->has('jenis_izin') ? 'border-red-500' : '' }}"
                    required
                >
                    <option value="">-- Pilih Jenis Izin --</option>
                    <option value="sakit" {{ old('jenis_izin') == 'sakit' ? 'selected' : '' }}>🏥 Sakit</option>
                    <option value="kuliah" {{ old('jenis_izin') == 'kuliah' ? 'selected' : '' }}>🎓 Kuliah</option>
                    <option value="lainnya" {{ old('jenis_izin') == 'lainnya' ? 'selected' : '' }}>📝 Lainnya</option>
                </select>
                @error('jenis_izin')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tempat -->
            <div>
                <label class="flex items-center gap-2 text-sm sm:text-base text-gray-700 font-bold mb-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Tempat <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="tempat" 
                    value="{{ old('tempat') }}"
                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition text-sm sm:text-base {{ $errors->has('tempat') ? 'border-red-500' : '' }}"
                    placeholder="Contoh: Rumah Sakit Harapan Kita, Universitas Indonesia, dll"
                    required
                >
                @error('tempat')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label class="flex items-center gap-2 text-sm sm:text-base text-gray-700 font-bold mb-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Keterangan <span class="text-red-500">*</span>
                </label>
                <textarea 
                    name="keterangan" 
                    rows="4"
                    class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition text-sm sm:text-base resize-none {{ $errors->has('keterangan') ? 'border-red-500' : '' }}"
                    placeholder="Jelaskan alasan izin Anda secara detail..."
                    required
>{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs sm:text-sm text-gray-500 mt-2">Minimal 10 karakter, maksimal 500 karakter</p>
            </div>

            <!-- Foto Bukti -->
            <div>
                <label class="flex items-center gap-2 text-sm sm:text-base text-gray-700 font-bold mb-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Foto Bukti <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input 
                        type="file" 
                        name="foto_bukti" 
                        accept="image/jpeg,image/jpg,image/png"
                        class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition text-sm sm:text-base file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 {{ $errors->has('foto_bukti') ? 'border-red-500' : '' }}"
                        id="foto_bukti"
                        onchange="previewImage(event)"
                        required
                    >
                </div>
                @error('foto_bukti')
                    <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                @enderror
                <div class="mt-2 bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4">
                    <div class="flex items-start gap-2 sm:gap-3">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="text-xs sm:text-sm text-blue-800 space-y-1">
                            <p class="font-semibold">Ketentuan file:</p>
                            <ul class="list-disc list-inside space-y-0.5">
                                <li>Format: JPG, JPEG, atau PNG</li>
                                <li>Ukuran maksimal: 2MB</li>
                                <li>Foto harus jelas dan dapat dibaca</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Preview Image -->
                <div id="imagePreview" class="hidden mt-4">
                    <p class="text-sm font-semibold text-gray-700 mb-2">Preview:</p>
                    <img id="preview" src="" alt="Preview" class="w-full max-w-md rounded-lg shadow-md border border-gray-200">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                <button 
                    type="submit" 
                    class="btn-interactive flex-1 bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-yellow-600 hover:to-orange-700 text-white py-3 sm:py-3.5 rounded-lg font-bold shadow-lg transition-all text-sm sm:text-base flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Ajukan Izin
                </button>
                <a 
                    href="{{ route('peserta.dashboard') }}" 
                    class="btn-interactive flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 py-3 sm:py-3.5 rounded-lg font-bold transition-all text-center text-sm sm:text-base flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    
    if (file) {
        // Check file size (2MB = 2 * 1024 * 1024 bytes)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar! Maksimal 2MB.');
            event.target.value = '';
            previewContainer.classList.add('hidden');
            return;
        }
        
        // Check file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!allowedTypes.includes(file.type)) {
            alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.');
            event.target.value = '';
            previewContainer.classList.add('hidden');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
    }
}
</script>

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