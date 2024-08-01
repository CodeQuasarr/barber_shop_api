<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderCollection;
use App\Models\Haircuts\HairCut;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): OrderCollection
    {
        $orders = Order::query()->paginate(5);
        return new OrderCollection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'haircutIds' => 'required|array',
//            'haircutIds.*' => 'exists:hair_cuts,id',
//        ]);


        $haircutIds = $request->input('haircutIds');
        $haircuts = HairCut::query()->whereIn('id', $haircutIds)->get();
        $totalPrice = $haircuts->sum('price');

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $totalPrice,
        ]);

        $order->haircuts()->attach($haircutIds);

        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $orderId)
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

    public function download(Request $request, $orderId): Response
    {
        $order = Order::findOrFail($orderId);

//        if (auth()->user()->cannot('view', $order)) {
//            abort(403);
//        }

        $pdf = Pdf::loadView('invoice', ['order' => $order]);

        return $pdf->download('invoice_' . $order->id . '.pdf');
    }
}
