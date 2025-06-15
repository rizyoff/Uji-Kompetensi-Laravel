<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    public function welcome()
    {
        return view('welcome');
    }


    public function view_products()
    {
        $products = Product::with('category')->get();

        $title = 'Products';
        return view('pages.products', ['title' => $title, 'products' => $products]);
    }


    public function add_products()
    {
        $category = Category::all();

        $title = 'Add Products';
        return view('pages.add', ['title' => $title, 'category' => $category]);
    }

    // menambahkan data baru ke dalam DB
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|nullable|string|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        //fungsi untuk create dari validasi
        Product::create($validatedData);

        return redirect('/products')->with('success', 'Produk Berhasil Ditambahkan');
    }

    //menghapus data dengan seleksi id
    public function delete($id)
    {
        $delete_data = Product::where('id', $id);

        $delete_data->delete();

        return redirect('/products')->with('success', 'Produk Berhasil Dihapus');
    }

    public function view_update($id)
    {
        $title = "Update Product";
        $view_data = Product::Where('id', $id)->get();
        $view_category = Category::all();


        return view('pages.update', ['products' => $view_data, 'category' => $view_category, 'title' => $title]);
    }

    // update data
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|nullable|string|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id'
        ]);

        Product::where('id', $id)->update($validatedData);

        return redirect('/products')->with('success', 'data berhasil di update');
    }
}
