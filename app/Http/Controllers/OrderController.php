<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
        }

        $total = collect($cart)->sum(fn($item) => $item['harga'] * $item['quantity']);

        return view('orders.checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong.');
        }

        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
        ]);

        $total = collect($cart)->sum(fn($item) => $item['harga'] * $item['quantity']);

        $order = Order::create([
            'nama_pemesan' => $request->nama_pemesan,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $id => $item) {
            $order->items()->create([
                'bunga_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['harga'],
            ]);
        }

        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('bunga.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function checkout(Request $request)
    {
        $selectedIds = $request->input('selected', []); // array id yang dipilih

        if (empty($selectedIds)) {
            return redirect()->route('cart.index')->with('error', 'Pilih produk yang ingin di-checkout.');
        }

        $cart = session()->get('cart', []);
        $checkoutItems = [];

        foreach ($selectedIds as $id) {
            if (isset($cart[$id])) {
                $checkoutItems[$id] = $cart[$id];
            }
        }

        if (empty($checkoutItems)) {
            return redirect()->route('cart.index')->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        session()->put('checkout_items', $checkoutItems);

        return view('user.pemesanan', compact('checkoutItems','cart'));
    }
    public function placeOrder(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['harga'] * $item['quantity']);

        // Simpan order
        $order = Order::create([
            'nama_pemesan' => $request->nama_pemesan,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp ?? '-',
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $id => $item) {
            $order->items()->create([
                'bunga_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['harga'],
            ]);
        }

        // Hapus hanya bunga yang sudah di-checkout
        $cart = session()->get('cart', []);
        if (isset($cart[$request->bunga_id])) {
            unset($cart[$request->bunga_id]);
        }
        session()->put('cart', $cart);


        return redirect()->route('cart.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
