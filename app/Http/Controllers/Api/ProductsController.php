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
            'description' => 'string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|integer',
            'criteria'    => 'required',
        ]);

        Products::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'criteria'    => $request->criteria,
        ]);

        $produk = Products::with('category')->latest()->first();
        return response()->json([
            'Status' => 'Sukses Menambahkan status data produk',
            'data'   => $produk,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        $produk = Products::where('name', $name)->first();
        if(!$produk){
            return response()->json([
                'Status' => 'Gagal Mencari Produk',
                'Pesan'  => 'Produk tidak ditemukan'
            ]);
        }

        return response()->json([
            'Status' => 'Sukses Mencari Produk',
            'Data'   => $produk,
        ], 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // UNTUK UPDATE PRODUK
        $produk = Products::find($id);
        if(!$produk){
            return response()->json([
                'Status' => ' Gagal Mengupdate Produk',
                'Pesan' => 'Produk tidak ditemukan'
            ]);
        }

        $produk->update([
            $produk->name =  $request->name,
            $produk->price = $request->price,
            $produk->stock = $request->stock,   
        ]);

        $produk = Products::with('category')->find($produk->id);

        return response()->json([
            'Status' => 'Sukses Mengupdate Produk',
            'Data'   => $produk,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Products::find($id);
        if(!$produk){
            return response()->json([
                'Status' => 'Gagal Menghapus Produk',
                'Pesan'  => 'Produk tidak ditemukan'
            ]);
        }

        $produk->delete();

        return response()->json([
            'Status' => 'Sukses Menghapus Produk',
            'Pesan'  => 'Produk berhasil dihapus',
        ], 200);
    }
}
