<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(){
        if (!Auth::user()) {
            return redirect()->route('home');
        } else {
            $pesanan = Order::get();
            $item = Item::get();
            $pesananPending = Order::where('status', '=', 'Pending')->get();
            return view('pesanan.index', compact('pesanan', 'pesananPending', 'item'));
        }
    }
    public function accept($id){
        $pesanan = Order::findOrFail($id);
        $pesanan->update([
            'status' => 'Accepted'
        ]);
        return redirect()->route('indexPesanan')->with('status', 'Pesanan berhasil diterima');
    }
    public function order(Request $request, $id){
        // $idBarang = Str::substr(str_replace(url('/'), '', url()->previous()), 8);
        $request->validate([
            'jumlah_pesanan' => 'required|integer',
            'alamat' => 'required|string|min:10|max:100',
            'kode_pos' => 'required|integer|digits:5',
        ]);

        $item = Item::findOrFail($id);
        $totalHarga = $request->jumlah_pesanan * $item->item_price;

        if ($request->jumlah_pesanan > $item->item_stock) {
            return redirect()->route('showBarang', $id)->with('errorStatus', 'Stok yang tersisa hanya ' . $item->item_stock);
        }

        Order::create([
            'id_barang' => $id,
            'id_user' => Auth::user()->id,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
            'total_harga' => $totalHarga,
            'nomor_invoice' => rand(),
            'status' => 'Pending'
        ]);

        $sisaStok = $item->item_stock - $request->jumlah_pesanan;
        $item->update([
            'item_stock' => $sisaStok
        ]);
        return redirect()->route('indexPesanan')->with('status', 'Pesanan berhasil dibuat, mohon tunggu konfirmasi');
    }
}
