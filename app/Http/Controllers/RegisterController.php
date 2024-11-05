<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function register(Request $request)
{
    // Validation
    $Validatedata = $request->validate([
        'nama' => 'required|max:255',
        'password' => 'required|min:8|confirmed', // Automatically checks for confirmation
        'alamat' => 'required|max:255',
        'telepon' => 'required|max:15',
        'email' => 'required|email|unique:customers,email',
    ]);

    // Hash the password
    $Validatedata['password'] = Hash::make($Validatedata['password']);

    // Create the Customer
    Customer::create($Validatedata);

    // Redirect with success message
    return view('home')->with('message', 'Berhasil Mendaftar.');

}
}