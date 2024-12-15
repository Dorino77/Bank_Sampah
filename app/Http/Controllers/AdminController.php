<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\User;
use App\Models\Sampah;
use App\Models\Laporan;
use App\Models\HasilKarya;
use Illuminate\Http\Request;
use App\Models\TransaksiSampah;
use App\Models\TransaksiPembelian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestPenjualanSampah;

class AdminController extends Controller
{
    public function dashboard()
{
    $karyaCount = HasilKarya::all()->count(); // Hitung jumlah Karya
    $buyCount = TransaksiSampah::all()->count(); // Hitung semua transaksi
    $custCount = User::all()->count(); // Hitung jumlah customer
    $loggedInUser = Auth::user(); // Ambil data user yang login

    // Hitung jumlah poin total
    $totalPoin = Poin::sum('jumlahPoin'); // Ganti 'jumlah_poin' dengan nama kolom yang sesuai pada tabel poin

    return view('admin.index', [
        'karyaCount' => $karyaCount,
        'buyCount' => $buyCount,
        'custCount' => $custCount,
        'loggedInUser' => $loggedInUser, // Kirim data user ke view
        'totalPoin' => $totalPoin, // Kirim total poin ke view
    ]);
}


    public function ambilSampah()
    {
        $requestSampah = RequestPenjualanSampah::all();
        return view('admin.pengambilan_sampah', compact('requestSampah'));
    }
    public function dataSampah()
    {
        return view('admin.data_sampah');
    }
    public function beliSampah()
    {
        $transaksi_sampah = DB::table('transaksi_sampah')
        ->join('sampah', 'transaksi_sampah.sampah_id', '=', 'sampah.id')
        ->join('users', 'transaksi_sampah.user_id', '=', 'users.id')
        ->select(
            'transaksi_sampah.id as transaksi_id',
            'users.name as user_name', // Ambil nama user dari tabel users
            'users.alamat as user_alamat', // Ambil nama user dari tabel users
            'users.telepon as user_telepon', // Ambil nama user dari tabel users
            'sampah.jenis_sampah as jenis_sampah',
            'transaksi_sampah.berat',
            'transaksi_sampah.harga_total',
            'transaksi_sampah.created_at'
        )
        ->get();
        
        return view('admin.beli_sampah', compact('transaksi_sampah'));
    }

    public function transaksiSampah()
    {
        return view('admin.transaksi_sampah');
    }
    public function dataKarya()
    {
        $karyaList = HasilKarya::all();
        return view('admin.data_karya', compact('karyaList'));
    }

    public function formTambahKarya ()
    {
        return view('admin.form_tambah_karya');
    }
 // CRUD untuk Hasil Karya
        public function tambahHasilKarya(Request $request)
        {
            $validatedata = $request->validate([
                'namaKarya' => 'required|string|max:255',
                'hargaKarya' => 'required|numeric',
                'deskripsi' => 'required|string',
                'stok' => 'required|integer',
                'gambar' => 'required|image|mimes:jpeg,png,jpg',
            ]);
        
           // Simpan file gambar di folder public/images/hasil_karya
            $path = $request->file('gambar')->storeAs('images/hasil_karya', $request->file('gambar')->getClientOriginalName(), 'public');
            $validatedata['gambar'] = 'images/hasil_karya/' . $request->file('gambar')->getClientOriginalName();
        
            // Simpan data ke database
            HasilKarya::create($validatedata);
        
            // Redirect dengan pesan sukses
            return redirect()->route('admin.data_karya')->with('message', 'Berhasil Mendaftar.');
        }

        public function editKarya($id)
        {
            $karya = HasilKarya::findOrFail($id);
            return view('admin.edit_karya', compact('karya'));
        }

        public function updateKarya(Request $request, $id)
        {
            $request->validate([
                'namaKarya' => 'required|string|max:255',
                'hargaKarya' => 'required|numeric',
                'deskripsi' => 'required|string',
                'stok' => 'required|integer|min:0',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $karya = HasilKarya::findOrFail($id);

            // Update the fields
            $karya->namaKarya = $request->namaKarya;
            $karya->hargaKarya = $request->hargaKarya;
            $karya->deskripsi = $request->deskripsi;
            $karya->stok = $request->stok;

            // Handle file upload if a new image is provided
            if ($request->hasFile('gambar')) {
                $filePath = $request->file('gambar')->store('karya_images', 'public');
                $karya->gambar = $filePath;
            }

            $karya->save();

            return redirect()->route('admin.data_karya')->with('success', 'Hasil Karya berhasil diperbarui!');
        }
        public function deleteKarya($id)
        {
            $karya = HasilKarya::findOrFail($id);
            $karya->delete();
            return redirect()->route('admin.data_karya')->with('message', 'Hasil karya berhasil dihapus.');
        }





        public function transaksiWithKarya(Request $request)
        {
            $query = DB::table('transaksi_pembelian')
                ->join('hasil_karya', 'transaksi_pembelian.hasilkarya_id', '=', 'hasil_karya.id')
                ->join('users', 'transaksi_pembelian.user_id', '=', 'users.id')
                ->select(
                    'transaksi_pembelian.id as transaksi_id',
                    'users.name as user_name',
                    'hasil_karya.namaKarya',
                    'transaksi_pembelian.total_harga',
                    'transaksi_pembelian.tanggal'
                );
        
            // Filter berdasarkan tanggal
            if ($request->has('tanggal') && $request->tanggal) {
                $query->whereDate('transaksi_pembelian.tanggal', '=', $request->tanggal);
            }
        
            $transaksi = $query->get();
            return view('admin.transaksi_karya', compact('transaksi'));
        }



//====================================================//


public function getJenisSampah()
{
    $jenisSampah = Sampah::select('id', 'jenis_sampah')->get();
    return response()->json($jenisSampah);
}

/**
 * Mendapatkan harga per kilogram berdasarkan jenis sampah yang dipilih
 * Digunakan untuk menghitung harga total berdasarkan berat
 */
public function getHargaPerKg($jenisBarang)
{
    // Mencari harga berdasarkan id jenis barang
    $sampah = Sampah::find($jenisBarang);
    
    if ($sampah) {
        return response()->json(['harga_per_kg' => $sampah->harga_per_kg]);
    }
    
    return response()->json(['error' => 'Jenis sampah tidak ditemukan'], 404);
}

/**
 * Proses transaksi sampah
 * Memverifikasi telepon pengguna dan menghitung harga total berdasarkan barang yang dimasukkan
 */
public function transaksiSampahStore(Request $request)
{
    $request->validate([
        'telepon' => 'required',
        'jenis_barang' => 'required|array',
        'jenis_barang.*' => 'required|exists:sampah,id',
        'berat' => 'required|array',
        'berat.*' => 'required|numeric|min:0.1',
        'harga_total' => 'required|array',
        'harga_total.*' => 'required|numeric|min:0',
    ]);

    $telepon = $request->input('telepon');
    $user = User::where('telepon', $telepon)->first();

    if (!$user) {
        return redirect()->back()->withErrors(['telepon' => 'Nomor telepon tidak terdaftar.']);
    }

    $totalHarga = 0;
    $totalPoin = 0;

    foreach ($request->jenis_barang as $key => $jenisBarang) {
        $sampah = Sampah::find($jenisBarang);
        if (!$sampah) {
            continue;
        }

        $berat = $request->berat[$key];
        $hargaTotal = $berat * $sampah->harga_per_kg;
        $poin = floor($hargaTotal / 1000); // Hitung poin berdasarkan harga total

        $totalHarga += $hargaTotal;
        $totalPoin += $poin;

        TransaksiSampah::create([
            'user_id' => $user->id,
            'sampah_id' => $sampah->id,
            'berat' => $berat,
            'harga_total' => $hargaTotal,
        ]);

        // Menyimpan poin yang didapat pengguna
        Poin::create([
            'idSampah' => $sampah->id,
            'idUser' => $user->id,
            'jumlahPoin' => $poin,
        ]);
    }

    return redirect()->route('admin.beli_sampah')->with(
        'success',
        'Transaksi berhasil dilakukan. Total harga: Rp ' . number_format($totalHarga, 0, ',', '.') . '. Total Poin: ' . $totalPoin
    );
}



    public function cekTelepon($telepon)
{
    // Cari pengguna dengan nomor telepon yang dimasukkan
    $user = User::where('telepon', $telepon)->first();

    if ($user) {
        return response()->json(['exists' => true]); // Jika telepon ada
    } else {
        return response()->json(['exists' => false]); // Jika telepon tidak ada
    }
}



    public function laporan()
    {
        // Total harga pembelian sampah
        $totalHargaSampah = TransaksiSampah::sum('harga_total');

        // Total harga pembelian hasil karya
        $totalHargaKarya = TransaksiPembelian::sum('total_harga');

        // Hitung hasil pengurangan
    $hasilPengurangan = $totalHargaKarya - $totalHargaSampah;

    // Simpan hasil pengurangan ke tabel laporan
    $laporan = new Laporan(); // Pastikan model Laporan sudah dibuat
    $laporan->total_sampah = $totalHargaSampah;
    $laporan->total_karya = $totalHargaKarya;
    $laporan->totalUang = $hasilPengurangan;
    $laporan->tanggal = now(); // Jika ingin menyimpan tanggal saat ini
    $laporan->save();

    // Kirimkan data ke view
    return view('admin.laporan', [
        'totalHargaSampah' => $totalHargaSampah,
        'totalHargaKarya' => $totalHargaKarya,
        'hasilPengurangan' => $hasilPengurangan
    ]);
    }

    public function data_sampah()
    {
        // Ambil data sampah dari tabel sampah
        $sampah = Sampah::all();

        // Join sampah dan transaksi_sampah untuk mendapatkan total berat
        $result = Sampah::join('transaksi_sampah', 'sampah.id', '=', 'transaksi_sampah.sampah_id')
                        ->select('sampah.id', 'sampah.jenis_sampah', DB::raw('SUM(transaksi_sampah.berat) as total_berat'))
                        ->groupBy('sampah.id', 'sampah.jenis_sampah')
                        ->get();

        // Kirim data sampah dan hasil total berat ke view
        return view('admin.data_sampah', compact('sampah', 'result'));
    }


    public function edit_sampah($id)
    {
        // Ambil data sampah berdasarkan ID
        $sampah = Sampah::find($id);
        
        
        // Jika data sampah tidak ditemukan, redirect atau tampilkan error
        if (!$sampah) {
            return redirect()->route('admin.data_sampah')->with('error', 'Data Sampah Tidak Ditemukan');
        }

        // Kirim data sampah ke view edit
        return view('admin.edit_sampah', compact('sampah'));
    }

    public function update_sampah(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'harga_per_kg' => 'required|numeric|min:0',
        ]);

        // Ambil data sampah berdasarkan ID
        $sampah = Sampah::find($id);

        // Jika data sampah tidak ditemukan, redirect atau tampilkan error
        if (!$sampah) {
            return redirect()->route('admin.data_sampah')->with('error', 'Data Sampah Tidak Ditemukan');
        }

        // Update data sampah
        $sampah->update([
            'jenis_sampah' => $request->jenis_sampah,
            'harga_per_kg' => $request->harga_per_kg,
        ]);

        // Redirect ke halaman data sampah dengan pesan sukses
        return redirect()->route('admin.data_sampah')->with('success', 'Data Sampah Berhasil Diperbarui');
    }

    public function delete_sampah($id)
    {
        // Ambil data sampah berdasarkan ID
        $sampah = Sampah::find($id);

        // Jika data sampah tidak ditemukan, redirect atau tampilkan error
        if (!$sampah) {
            return redirect()->route('admin.data_sampah')->with('error', 'Data Sampah Tidak Ditemukan');
        }

        // Hapus data sampah
        $sampah->delete();

        // Redirect ke halaman data sampah dengan pesan sukses
        return redirect()->route('admin.data_sampah')->with('success', 'Data Sampah Berhasil Dihapus');
    }




    }

