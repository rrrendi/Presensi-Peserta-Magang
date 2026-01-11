<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PesertaMagangController extends Controller
{
    // Dashboard peserta magang
    public function dashboard()
    {
        $userId = Auth::id();
        $today = now()->format('Y-m-d');

        // Cek presensi hari ini
        $presensiHariIni = Presensi::where('pengguna_id', $userId)
            ->where('tanggal', $today)
            ->first();

        // Cek izin hari ini
        $izinHariIni = Izin::where('pengguna_id', $userId)
            ->where('tanggal', $today)
            ->first();

        // Riwayat presensi 7 hari terakhir
        $riwayatPresensi = Presensi::where('pengguna_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->take(7)
            ->get();

        return view('peserta.dashboard', compact('presensiHariIni', 'izinHariIni', 'riwayatPresensi'));
    }

    // Presensi masuk
    public function presensiMasuk()
    {
        $userId = Auth::id();
        $today = now()->format('Y-m-d');

        // Cek apakah sudah presensi hari ini
        $sudahPresensi = Presensi::where('pengguna_id', $userId)
            ->where('tanggal', $today)
            ->exists();

        // Cek apakah sudah izin hari ini
        $sudahIzin = Izin::where('pengguna_id', $userId)
            ->where('tanggal', $today)
            ->exists();

        if ($sudahPresensi || $sudahIzin) {
            return redirect()->route('peserta.dashboard')
                ->with('error', 'Anda sudah melakukan presensi atau izin hari ini.');
        }

        Presensi::create([
            'pengguna_id' => $userId,
            'tanggal' => $today,
            'waktu_masuk' => now()->format('H:i:s'),
        ]);

        return redirect()->route('peserta.dashboard')
            ->with('success', 'Presensi masuk berhasil dicatat.');
    }

    // Presensi keluar
    public function presensiKeluar()
    {
        $userId = Auth::id();
        $today = now()->format('Y-m-d');

        $presensi = Presensi::where('pengguna_id', $userId)
            ->where('tanggal', $today)
            ->first();

        if (!$presensi) {
            return redirect()->route('peserta.dashboard')
                ->with('error', 'Anda belum melakukan presensi masuk hari ini.');
        }

        if ($presensi->waktu_keluar) {
            return redirect()->route('peserta.dashboard')
                ->with('error', 'Anda sudah melakukan presensi keluar hari ini.');
        }

        $presensi->update([
            'waktu_keluar' => now()->format('H:i:s'),
        ]);

        return redirect()->route('peserta.dashboard')
            ->with('success', 'Presensi keluar berhasil dicatat.');
    }

    // Form ajukan izin
    public function formIzin()
    {
        return view('peserta.form-izin');
    }

    // Simpan izin
    public function simpanIzin(Request $request)
    {
        $userId = Auth::id();
        $today = now()->format('Y-m-d');

        // Cek apakah sudah presensi atau izin hari ini
        $sudahPresensi = Presensi::where('pengguna_id', $userId)
            ->where('tanggal', $today)
            ->exists();

        $sudahIzin = Izin::where('pengguna_id', $userId)
            ->where('tanggal', $today)
            ->exists();

        if ($sudahPresensi || $sudahIzin) {
            return redirect()->route('peserta.dashboard')
                ->with('error', 'Anda sudah melakukan presensi atau izin hari ini.');
        }

        $validated = $request->validate([
            'jenis_izin' => 'required|in:sakit,kuliah,lainnya',
            'keterangan' => 'required|string|max:1000',
            'tempat' => 'required|string|max:255',
            'foto_bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto
        $fotoPath = $request->file('foto_bukti')->store('izin', 'public');

        Izin::create([
            'pengguna_id' => $userId,
            'tanggal' => $today,
            'jenis_izin' => $validated['jenis_izin'],
            'keterangan' => $validated['keterangan'],
            'waktu' => now()->format('H:i:s'),
            'tempat' => $validated['tempat'],
            'foto_bukti' => $fotoPath,
        ]);

        return redirect()->route('peserta.dashboard')
            ->with('success', 'Izin berhasil diajukan.');
    }
}
