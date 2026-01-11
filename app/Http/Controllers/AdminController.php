<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Izin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard admin
    public function dashboard()
    {
        $totalPeserta = User::where('role', 'peserta_magang')->count();
        $presensiHariIni = Presensi::whereDate('tanggal', now())->count();
        $izinHariIni = Izin::whereDate('tanggal', now())->count();

        return view('admin.dashboard', compact('totalPeserta', 'presensiHariIni', 'izinHariIni'));
    }

    // Lihat semua data presensi
    public function dataPresensi(Request $request)
    {
        $query = Presensi::with('pengguna')->orderBy('tanggal', 'desc');

        // Filter berdasarkan tanggal jika ada
        if ($request->has('tanggal') && $request->tanggal) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter berdasarkan peserta jika ada
        if ($request->has('pengguna_id') && $request->pengguna_id) {
            $query->where('pengguna_id', $request->pengguna_id);
        }

        $presensi = $query->paginate(20);
        $pesertaList = User::where('role', 'peserta_magang')->get();

        return view('admin.data-presensi', compact('presensi', 'pesertaList'));
    }

    // Lihat semua data izin
    public function dataIzin(Request $request)
    {
        $query = Izin::with('pengguna')->orderBy('tanggal', 'desc');

        // Filter berdasarkan tanggal jika ada
        if ($request->has('tanggal') && $request->tanggal) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        // Filter berdasarkan peserta jika ada
        if ($request->has('pengguna_id') && $request->pengguna_id) {
            $query->where('pengguna_id', $request->pengguna_id);
        }

        // Filter berdasarkan jenis izin jika ada
        if ($request->has('jenis_izin') && $request->jenis_izin) {
            $query->where('jenis_izin', $request->jenis_izin);
        }

        $izin = $query->paginate(20);
        $pesertaList = User::where('role', 'peserta_magang')->get();

        return view('admin.data-izin', compact('izin', 'pesertaList'));
    }

    // Detail izin (untuk melihat foto dan keterangan lengkap)
    public function detailIzin($id)
    {
        $izin = Izin::with('pengguna')->findOrFail($id);
        return view('admin.detail-izin', compact('izin'));
    }
}