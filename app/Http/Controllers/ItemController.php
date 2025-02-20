<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // menampilkan semua data atau item
    public function index()
    {
        $items = Item::all(); // mengambil semua data
        return view('items.index', compact('items')); // mengembalikan nilai ke tampilan
    }

    // menampilkan form untuk menambahkan data baru
    public function create()
    {
        return view('items.create');
    }

    // menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Item::create($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // menampilkan pesan sukses
    }

    // menampilkan pesan
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    // menampilkan form edit data
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // memperbarui data pada database
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $item->update($request->only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    // menghapus data dari database
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
