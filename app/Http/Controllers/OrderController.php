<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function display() {
        $orders = Order::with('items.product')->orderBy('created_at', 'desc')->get();
        
        return Inertia::render('Orders', ['orders' => $orders]);
    }

    public function result(){
        return response()->json(Order::with('items.product')->orderBy('created_at', 'desc')->limit(100)->get());
    }

    public function update(Order $order){
        $order->update([
            'status' => request('status')  // make sure 'status' is fillable
        ]);
        return Inertia::location(route('display.order'));
    }

    
    public function success(){
        return Inertia::render('Success');
    }


    public function store(Request $request){
        
        $validated = $request->validate([
            'table_number' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'table_number' => $validated['table_number'],
            'status' => 'pending',
        ]);

        foreach ($validated['items'] as $item) {
            $order->items()->create($item);
        }
        
        return redirect()->route('order.success');
    }

}
