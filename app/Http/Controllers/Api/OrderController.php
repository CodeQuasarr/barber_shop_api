<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Orders\OrderCollection;
use App\Models\Haircuts\HairCut;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return OrderCollection
     */
    public function index(): OrderCollection
    {
        $orders = Order::query()->paginate(5);
        return new OrderCollection($orders);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        $cartContent = $request->get('cartContent');
        $ids = array_keys($cartContent);
        $products = HairCut::query()->whereIn('id', $ids)->get();

        if ($products->isEmpty()) {
            throw new \Exception('No products found');
        }

        $amount = 0;

        foreach ($products as $product) {
            $amount += $product->price * $cartContent[$product->getKey()];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $amount,
        ]);

        $order->haircuts()->attach($ids);

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

    /**
     * Download the invoice for the order.
     * @param Request $request
     * @param $orderId
     * @return Response
     */
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
