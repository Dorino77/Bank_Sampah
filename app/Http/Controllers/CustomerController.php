<?php

namespace App\Http\Controllers;

use App\Models\HasilKarya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $loggedInUser = Auth::user(); // Ambil data user yang login
        return view('user.index', ['loggedInUser' => $loggedInUser]);

    }

    public function jualSampah()
    {
        $loggedInUser = Auth::user(); // Ambil data user yang login
        return view('user.jual_sampah',
    [
        'loggedInUser' => $loggedInUser
    ]);
    }

    public function hasilKarya()
    {
        $loggedInUser = Auth::user(); // Ambil data user yang login
        $karyaList = HasilKarya::all();
        return view('user.hasil_karya',[
            'karyaList' => $karyaList,
            'loggedInUser' => $loggedInUser]);

    }

    public function aktivitas()
    {
        return view('user.aktivitas');
    }

    public function poin()
    {
        return view('user.poin');
    }

    public function logout()
    {
        // Logika logout, contoh: Auth::logout();
        return redirect('/');
    }

   
}
