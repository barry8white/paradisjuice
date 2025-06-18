<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class AddProductController extends Controller
{
   public function index(){
    return Inertia::render('AddProduct');
   }

   public function products() {
        $product = Product::all();
        $categories = Product::select('category')->distinct()->pluck('category') ;
        $cat = [];
        foreach ($categories as $category) {
            $prod = Product::where('category', $category)->get();
            $productRow = [
                'name' => $category,
                'items' => $prod
            ];
            $cat[] = $productRow;
        }
        return Inertia::render('Products', ['prods' => $cat]);
        
   }

   public function list($tabnum) {
        $tabnum = (int)$tabnum;
        $product = Product::all();
        $categories = Product::select('category')->distinct()->pluck('category') ;
        $cat = [];
        foreach ($categories as $category) {
            $prod = Product::where('category', $category)->get();
            $productRow = [
                'name' => $category,
                'items' => $prod
            ];
            $cat[] = $productRow;
        }
        return Inertia::render('Produit', ['prods' => $cat, 'numberTab' => $tabnum]);
        
   }

   public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'produit' => 'required|string|max:255',
            'price' => 'required|integer',
            'image' => 'required|file|max:4096', // 4MB max
        ]);

        
        if ($request->hasFile('image')) {
            $validated['file_path'] = $request->file('image')->store('images', 'public');
        }

        Product::create($validated);

        return redirect()->route('addProductPage.show')->with('success', 'Item created successfully!');
    }


    public function destroy($id){
        $prodelete = Product::findOrFail($id);
        $prodelete->delete();

            return Inertia::render('Orders');
    }

}
