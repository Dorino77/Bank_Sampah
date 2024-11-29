<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;



use App\Models\HasilKarya;
use Illuminate\Http\Request;
use App\Models\TransaksiPembelian;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestPenjualanSampah;

class CustomerController extends Controller
{
    /**
     * Tampilkan dashboard untuk pengguna yang login.
     */
    public function dashboard()
    {
        $loggedInUser = Auth::user(); // Ambil data pengguna yang login
        return view('user.index', ['loggedInUser' => $loggedInUser]);
    }

    /**
     * Tampilkan halaman jual sampah.
     */
    public function jualSampah()
    {
        $loggedInUser = Auth::user(); // Ambil data pengguna yang login
        return view('user.jual_sampah', [
            'loggedInUser' => $loggedInUser
        ]);
    }

    public function requestSampah(Request $request)
    {
        $validatedata = $request->validate([
            'nama' => 'required|string|max:255', // Adjust varchar to string
            'alamat' => 'required|string', // Adjust text to string
            'nomor_hp' => 'required|string|max:255', // Adjust varchar to string
            'deskripsi_sampah' => 'required|string', // Adjust text to string
            'jam_pengambilan' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:12:00', // Validate time format and range
        ]);
        
        RequestPenjualanSampah::create($validatedata);

        return redirect()->route('customer.jual_sampah')->with('success', 'Permintaan penjualan sampah berhasil dikirim.');
    }

    

    /**
     * Tampilkan halaman hasil karya.
     */
    public function hasilKarya()
    {
        $loggedInUser = Auth::user(); // Ambil data pengguna yang login
        $karyaList = HasilKarya::all(); // Ambil semua data hasil karya
        return view('user.hasil_karya', [
            'karyaList' => $karyaList,
            'loggedInUser' => $loggedInUser
        ]);
    }









    public function simpanTransaksi(Request $request)
    {
        // Ambil data keranjang yang dikirimkan dalam request sebagai JSON
        $keranjang = json_decode($request->keranjang, true);

        // Validasi apakah data keranjang valid (harus berupa array)
        if (!$keranjang || !is_array($keranjang)) {
            return redirect()->back()->withErrors('Keranjang tidak valid.');
        }

        // Loop untuk menyimpan setiap item dalam keranjang ke dalam database transaksi
        foreach ($keranjang as $item) {
            // Simpan data transaksi pembelian ke dalam tabel TransaksiPembelian
            TransaksiPembelian::create([
                'user_id' => Auth::id(), // ID user yang sedang login
                'hasilkarya_id' => $item['id'], // ID hasil karya (produk)
                'total_harga' => $item['price'] * $item['quantity'], // Total harga per item
                'tanggal' => now(), // Tanggal transaksi
            ]);

            // Update stok hasil karya setelah transaksi
            $karya = HasilKarya::find($item['id']);
            if ($karya && $karya->stok >= $item['quantity']) {
                // Kurangi stok karya sesuai dengan jumlah yang dibeli
                $karya->decrement('stok', $item['quantity']);
            } else {
                // Jika stok tidak mencukupi
                return redirect()->back()->withErrors("Stok untuk {$item['name']} tidak mencukupi.");
            }
        }

       // Set feedback sukses
    session()->flash('feedback', 'Pembelian berhasil! Terima kasih telah berbelanja.');

    // Redirect ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('customer.hasil_karya');
    }











    /**
     * Kurangi stok barang setelah pembelian.
     */
    public function kurangiStok(Request $request)
    {
        $keranjang = $request->input('keranjang');
    
        foreach ($keranjang as $item) {
            $karya = HasilKarya::find($item['id']);
            if ($karya && $karya->stok >= $item['quantity']) {
                $karya->stok -= $item['quantity'];
                $karya->save();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Stok untuk {$item['name']} tidak mencukupi.",
                ]);
            }
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Pembelian berhasil dan stok diperbarui.',
        ]);
    }
    

    /**
     * Logout pengguna.
     */
    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect('/'); // Redirect ke halaman utama
    }
}
