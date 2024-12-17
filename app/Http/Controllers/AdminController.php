<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Models\User;
use App\Models\Sampah;
use App\Models\Laporan;
use App\Models\Tabungan;
use App\Models\HasilKarya;
use Illuminate\Http\Request;
use App\Models\PencairanPoin;
use App\Models\TransaksiSampah;
use App\Models\TransaksiPembelian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryTransaksiSampah;
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

    public function riwayatTransaksiSampah(Request $request)
{
    // Query untuk mengambil data dari tabel history_transaksi
    $transaksi_sampah = DB::table('history_transaksi')
        ->join('sampah', 'history_transaksi.sampah_id', '=', 'sampah.id')
        ->join('users', 'history_transaksi.user_id', '=', 'users.id')
        ->select(
            'history_transaksi.id as transaksi_id',
            'users.name as user_name', // Ambil nama user dari tabel users
            'users.alamat as user_alamat', // Ambil alamat user
            'users.telepon as user_telepon', // Ambil telepon user
            'sampah.jenis_sampah as jenis_sampah',
            'history_transaksi.berat',
            'history_transaksi.harga_total',
            'history_transaksi.created_at'
        );

    // Filter berdasarkan tanggal jika ada input
    if ($request->has('tanggal') && !empty($request->tanggal)) {
        $request->validate([
            'tanggal' => 'date', // Validasi input tanggal
        ]);
        $transaksi_sampah->whereDate('history_transaksi.created_at', $request->tanggal);
    }

    // Eksekusi query dan ambil hasilnya
    $transaksi_sampah = $transaksi_sampah->get();

    // Return ke view dengan data transaksi_sampah
    return view('admin.riwayat_sampah', compact('transaksi_sampah'));
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


public function getHargaPerKg($jenisBarang)
{
    // Mencari harga berdasarkan id jenis barang
    $sampah = Sampah::find($jenisBarang);
    
    if ($sampah) {
        return response()->json(['harga_per_kg' => $sampah->harga_per_kg]);
    }
    
    return response()->json(['error' => 'Jenis sampah tidak ditemukan'], 404);
}

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

    // Iterate through the jenis_barang
    foreach ($request->jenis_barang as $key => $jenisBarang) {
        $sampah = Sampah::find($jenisBarang);
        if (!$sampah) {
            continue; // Skip if the Sampah is invalid
        }

        $berat = $request->berat[$key];
        $hargaTotal = $berat * $sampah->harga_per_kg;
        $poin = floor($hargaTotal / 1000);

        $totalHarga += $hargaTotal;
        $totalPoin += $poin;

        // Save the trash transaction
        $transaksiSampah = TransaksiSampah::create([
            'user_id' => $user->id,
            'sampah_id' => $sampah->id,
            'berat' => $berat,
            'harga_total' => $hargaTotal,
        ]);

        // Save the points
        Poin::create([
            'idTransaksiSampah' => $transaksiSampah->id,
            'idUser' => $user->id,
            'jumlahPoin' => $poin,
        ]);

         // Simpan data transaksi ke tabel riwayat_transaksi
         DB::table('history_transaksi')->insert([
            'user_id' => $user->id,
            'sampah_id' => $sampah->id,
            'berat' => $berat,
            'harga_total' => $hargaTotal,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Update the user's total points
        // $this->updateUserTotalPoin($user->id);
    }

    $transaksi_sampah = DB::table('transaksi_sampah')
        ->join('sampah', 'transaksi_sampah.sampah_id', '=', 'sampah.id')
        ->join('users', 'transaksi_sampah.user_id', '=', 'users.id')
        ->select(
            'transaksi_sampah.id as transaksi_id',
            'users.name as user_name',
            'users.alamat as user_alamat',
            'users.telepon as user_telepon',
            'sampah.jenis_sampah as jenis_sampah',
            'transaksi_sampah.berat',
            'transaksi_sampah.harga_total',
            'transaksi_sampah.created_at'
        )
        ->get();

    return view('admin.beli_sampah', compact('transaksi_sampah', 'totalHarga', 'totalPoin'));
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
    // Hitung total histori harga pembelian sampah
    $totalHistorySampah = HistoryTransaksiSampah::sum('harga_total');
    // Hitung total harga pembelian sampah
    $totalHargaSampah = TransaksiSampah::sum('harga_total');

    // Hitung total harga pembelian hasil karya
    $totalHargaKarya = TransaksiPembelian::sum('total_harga');

    // Hitung hasil pengurangan
    $hasilPengurangan = $totalHargaKarya - $totalHargaSampah;

    // Periksa apakah laporan dengan tanggal saat ini sudah ada
    $laporan = Laporan::whereDate('tanggal', now()->toDateString())->first();

    if ($laporan) {
        // Jika laporan sudah ada, cek apakah ada perubahan
        if ($laporan->total_sampah != $totalHargaSampah || $laporan->total_karya != $totalHargaKarya) {
            // Jika ada perubahan, buat laporan baru
            $laporanBaru = new Laporan();
            $laporanBaru->total_sampah = $totalHargaSampah;
            $laporanBaru->total_karya = $totalHargaKarya;
            $laporanBaru->tanggal = now(); // Menyimpan tanggal saat ini
            $laporanBaru->save();
        }
    } else {
        // Jika laporan belum ada, buat laporan baru
        $laporan = new Laporan(); 
        $laporan->total_sampah = $totalHargaSampah;
        $laporan->total_karya = $totalHargaKarya;
        $laporan->tanggal = now(); // Menyimpan tanggal saat ini
        $laporan->save();
    }

    // Ambil saldo terakhir dari tabel tabungan
    $tabungan = Tabungan::latest()->first();

    if ($tabungan) {
        // Perbarui saldo dengan hasilPengurangan jika ada perubahan
        $tabungan->totalUang = $hasilPengurangan;
        $tabungan->save();
    } else {
        // Jika belum ada data tabungan, buat data tabungan baru
        Tabungan::create([
            'totalUang' => $hasilPengurangan,
        ]);
    }

    // Kirimkan data ke view
    return view('admin.laporan', [
        'totalHistorySampah' => $totalHistorySampah,
        'totalHargaSampah' => $totalHargaSampah,
        'totalHargaKarya' => $totalHargaKarya,
        'hasilPengurangan' => $hasilPengurangan,
        'saldo' => $tabungan ? $tabungan->totalUang : 0, // Kirimkan saldo ke view
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

    public function tambah_sampah(Request $request)
    {
        // Validasi data input
        $request->validate([
            'jenis_sampah' => 'required|string|max:255',
            'harga_per_kg' => 'required|numeric|min:0'
        ]);

        // Tambahkan data ke tabel sampah
        $sampah = new Sampah();
        $sampah->jenis_sampah = $request->jenis_sampah;
        $sampah->harga_per_kg = $request->harga_per_kg;
        $sampah->save();

        // Redirect ke halaman data sampah dengan pesan sukses
        return redirect()->route('admin.data_sampah')->with('success', 'Data sampah berhasil ditambahkan.');
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



    public function indexPencairanPoin()
    {
        // Join tabel 'poin' dengan 'users' untuk mengambil 'name'
        $users = Poin::join('users', 'poin.idUser', '=', 'users.id')
                     ->select('poin.idUser', 'users.name', DB::raw('SUM(poin.jumlahPoin) as totalPoin'))
                     ->groupBy('poin.idUser', 'users.name')
                     ->get();

        return view('admin.pencairan-poin', compact('users'));
    }

public function pencairanPoin(Request $request)
{
    $request->validate([
        'idUser' => 'required|exists:poin,idUser',
        'jumlahPoin' => 'required|integer|min:1',
    ]);

    // Logika pengurangan poin
    $userPoin = Poin::where('idUser', $request->idUser)->get();
    $poinToReduce = $request->jumlahPoin;
    $totalPoin = $userPoin->sum('jumlahPoin'); // Total poin user saat ini
    if ($poinToReduce > $totalPoin) {
        return redirect()->back()->with('error', 'Jumlah poin melebihi total poin yang dimiliki.');
    }
    $hargaToReduce = $poinToReduce * 1000; // Hitung harga total yang akan dikurangi

    foreach ($userPoin as $poin) {
        if ($poinToReduce <= 0) break;

        if ($poin->jumlahPoin > $poinToReduce) {
            $poin->jumlahPoin -= $poinToReduce;
            $poin->save();
            $poinToReduce = 0;
        } else {
            $poinToReduce -= $poin->jumlahPoin;
            $poin->delete();
        }
    }

    // Logika pengurangan harga_total di tabel transaksi_sampah
    $transaksiSampah = TransaksiSampah::where('user_id', $request->idUser)->orderBy('created_at', 'asc')->get();

    foreach ($transaksiSampah as $transaksi) {
        if ($hargaToReduce <= 0) break;

        if ($transaksi->harga_total > $hargaToReduce) {
            $transaksi->harga_total -= $hargaToReduce;
            $transaksi->save();
            break;
        } else {
            $hargaToReduce -= $transaksi->harga_total;
            $transaksi->delete();
        }
    }

    PencairanPoin::create([
        'user_id' => $request->idUser,
        'total_poin' => $totalPoin,
        'jumlah_poin_dicairkan' => $request->jumlahPoin,
    ]);

    return redirect()->back()->with('success', 'Poin Berhasil Dicairkan!');
}







    }

