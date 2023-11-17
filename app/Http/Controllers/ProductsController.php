<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function products()
    {

        $data = Products::with('product_categories')->paginate(5);

        return view("dataproduk", compact("data"));
    }

    public function tambahproduk()
    {
        return view("tambahproduk");
    }

    public function insertproduk(Request $request)
    {
        // dd($request->all());


        $data = Products::create($request->all());
        if ($request->hasFile("image")) {
            $request->file("image")->move("fotoproduk/", $request->file("image")->getClientOriginalName());
            $data->image = $request->file("image")->getClientOriginalName();
            $data->save();

        return redirect()->route('products')->with('success', 'Data Berhasil Ditambahkan');
    }
}

    public function tampilproduk($id)
    {

        $data = Products::find($id);
        // dd($data);

        return view('tampilproduk', compact('data'));
    }

    public function updateproduk(Request $request, $id)
    {
        try {
            // Mengambil Id Table product
            $data = Products::find($id);

            // Update field lain
            $data->update($request->except(['image', '_token', '_method']));

            // Check jika ada uplad gambar baru
            if ($request->hasFile("image")) {
                $imagePath = 'fotoproduk/';
                $imageName = $request->file('image')->getClientOriginalName();
                // Pindahkan gambar yang sudah diupload ke direktori 'fotoproduk'
                $request->file('image')->move($imagePath, $imageName);
                // Perbarui kolom 'gambar' di tabel 'produk'
                $data->update(['image' => $imageName]);
            }
            return redirect()->route('products')->with('success', 'Data Berhasil Di Edit');
        } catch (\Exception $e) {
            // Catat pengecualian jika diperlukan
            //Log::kesalahan($e->getMessage());
            return redirect()->route('products')->with('error', 'Ada kesalahan input ke database');
        }
    }

    public function deleteproduk($id)
    {
        $data = Products::find($id);
        $data->delete();
        return redirect()->route('products')->with('success', 'data berhasil dihapus');
    }


    public function cari(Request $request)
    {
        if ($request->has("search")) {
            $data = Products::where('product_name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Products::paginate(5);
        }



        return view("pencarian", compact("data"));
    }
}
