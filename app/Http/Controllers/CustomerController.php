<?php

namespace App\Http\Controllers;

use App\Models\Poin;



use App\Models\Sampah;
use App\Models\HasilKarya;
use App\Models\PencairanPoin;
use Illuminate\Http\Request;
use App\Models\TransaksiPembelian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestPenjualanSampah;

class CustomerController extends Controller
{
    /**
     * Tampilkan dashboard untuk pengguna yang login.
     */
    public function dashboard()
{
    $loggedInUser = Auth::user();

    $totalPoin = PencairanPoin::where('idUser', $loggedInUser->id)->sum('jumlah_poin');

    $sampah = Sampah::all();

    return view('user.index', [
        'loggedInUser' => $loggedInUser,
        'totalPoin' => $totalPoin, // Pass the total points to the view
        'sampah' => $sampah
    ]);
}


    /**
     * Tampilkan halaman jual sampah.
     */
    public function jualSampah()
    {
        $loggedInUser = Auth::user(); // Ambil data pengguna yang login
        $totalPoin = PencairanPoin::where('idUser', $loggedInUser->id)->sum('jumlah_poin');
        return view('user.jual_sampah', [
            'loggedInUser' => $loggedInUser,
            'totalPoin' => $totalPoin
        ]);
    }

    public function requestSampah(Request $request)
{
    // Validate incoming request data
    $validatedata = $request->validate([
        'alamat' => 'required|string|max:255', // Adjusting 'alamat' validation
        'deskripsi_sampah' => 'required|string|max:255', // Adjusting 'deskripsi_sampah' validation
        'jam_pengambilan' => 'required|date_format:H:i|after_or_equal:09:00|before_or_equal:12:00', // Validate time format and range
    ]);

    // Get logged-in user
    $loggedInUser = Auth::user();

    // Add 'nama' and 'nomor_hp' to the validated data from the logged-in user
    $validatedata['nama'] = $loggedInUser->name;
    $validatedata['nomor_hp'] = $loggedInUser->telepon;

    // Save the data to the database using the RequestPenjualanSampah model
    RequestPenjualanSampah::create($validatedata);

    // Redirect back with a success message
    return redirect()->route('customer.jual_sampah')->with('success', 'Permintaan penjualan sampah berhasil dikirim.');
}


    

    /**
     * Tampilkan halaman hasil karya.
     */
    public function hasilKarya()
    {
        $loggedInUser = Auth::user(); // Ambil data pengguna yang login
        $totalPoin = PencairanPoin::where('idUser', $loggedInUser->id)->sum('jumlah_poin');
        $karyaList = HasilKarya::all(); // Ambil semua data hasil karya
        return view('user.hasil_karya', [
            'karyaList' => $karyaList,
            'loggedInUser' => $loggedInUser,
            'totalPoin' => $totalPoin
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
