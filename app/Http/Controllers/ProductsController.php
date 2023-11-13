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
    try {
        $data = DB::table('products')->insertGetId($request->except(['image', '_token', '_method']));
        if ($request->hasFile("image")) {
            $imagePath = 'fotoproduk/';
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move($imagePath, $imageName);
            DB::table('products')->where('id', $data)->update(['image' => $imageName]);
        }
        return redirect()->route('products')->with('success', 'Data Berhasil Ditambahkan');
    } catch (\Exception $e) {

        return redirect()->route('products')->with('error', 'Ada kesalahan input ke database');
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
            // Find the product by ID
            $data = Products::find($id);

            // Update other fields
            $data->update($request->except(['image', '_token', '_method']));

            // Check if a new image is uploaded
            if ($request->hasFile("image")) {
                $imagePath = 'fotoproduk/';
                $imageName = $request->file('image')->getClientOriginalName();

                // Move the uploaded image to the 'fotoproduk' directory
                $request->file('image')->move($imagePath, $imageName);

                // Update the 'image' column in the 'products' table
                $data->update(['image' => $imageName]);
            }

            return redirect()->route('products')->with('success', 'Data Berhasil Di Edit');
        } catch (\Exception $e) {
            // Log the exception if needed
            // Log::error($e->getMessage());
            return redirect()->route('products')->with('error', 'Ada kesalahan input ke database');
        }
    }

    public function deleteproduk($id)
    {
        $data = Products::find($id);
        $data->delete();
        return redirect()->route('products')->with('success', 'data berhasil dihapus');
    }


    public function cari(Request $request){
        if($request->has("search")){
            $data = Products::where('product_name','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
            $data = Products::paginate(5);
        }



        return view ("pencarian",compact("data"));
    }
}
