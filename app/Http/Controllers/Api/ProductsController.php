<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Products::orderBy('id', 'ASC')->get();
        return response()->json([
            'Status' => 'Suksesssss mengambil data produk eheww',
            'Data'   => $produk,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // hrus di validasi triger kalo semisalkan kosong dia bakalan error
        $request->validate([
            'name'        => 'required|string',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|integer',
            'criteria'    => 'required',
        ]);

        Products::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'criteria'    => $request->criteria,
        ]);

        $produk = Products::with('category')->find($request->id);
        return response()->json([
            'Status' => 'Sukses Menambahkan status data produk',
            'data'   => $produk,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
