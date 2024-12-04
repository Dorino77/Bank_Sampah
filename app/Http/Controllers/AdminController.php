<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\HasilKarya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\RequestPenjualanSampah;

class AdminController extends Controller
{
    public function dashboard()
{
    $karyaCount = HasilKarya::all()->count(); // Hitung jumlah Karya
    $custCount = User::all()->count(); // Hitung jumlah customer
    $loggedInUser = Auth::user(); // Ambil data user yang login
    return view('admin.index', [
        'karyaCount' => $karyaCount,
        'custCount' => $custCount,
        'loggedInUser' => $loggedInUser // Kirim data user ke view

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
        
        return view('admin.beli_sampah');
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





        public function transaksiWithKarya()
{
    $transaksi = DB::table('transaksi_pembelian')
        ->join('hasil_karya', 'transaksi_pembelian.hasilkarya_id', '=', 'hasil_karya.id')
        ->join('users', 'transaksi_pembelian.user_id', '=', 'users.id')
        ->select(
            'transaksi_pembelian.id as transaksi_id',
            'users.name as user_name', // Ambil nama user dari tabel users
            'hasil_karya.namaKarya',
            'transaksi_pembelian.total_harga',
            'transaksi_pembelian.tanggal'
        )
        ->get();
    return view('admin.transaksi_karya', compact('transaksi'));
}







}
