<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Haircuts\HairCut;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{

    public function index(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $ids = $request->get('items');
        $items = [];

        try {
            $products = HairCut::query()->whereIn('id', [1,2,3])->get();
            $total = 0;
            foreach ($products as $product) {
                $total += $product->price;
            }

            $paymentIntent = PaymentIntent::create([
                'amount' => $total * 100,
                'currency' => 'eur',
                'payment_method_types' => ['card']
            ]);

            return response()->json(['client_secret' => $paymentIntent->client_secret]);


        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    /**
     * Handle the incoming request.
     */
//    public function index(Request $request)
//    {
//        Stripe::setApiKey(env('STRIPE_SECRET'));
//        $ids = $request->get('items');
//        $items = [];
//
//        try {
//            $products = HairCut::query()->whereIn('id', [1,2,3])->get();
//            foreach ($products as $product) {
//                $items[] = [
//                    'price_data' => [
//                        'currency' => 'usd',
//                        'product_data' => [
//                            'name' => $product->name,
//                            'images' => [$product->imageSrc],
//                        ],
//                        'unit_amount' => $product->price,
//                    ],
//                    'quantity' => 1,
//                ];
//            }
//
//            $session = Session::create([
//                'payment_method_types' => ['card'],
//                'line_items' => $items,
//                'mode' => 'payment',
//                'success_url' => env('APP_URL') . '/success',
//                'cancel_url' => env('APP_URL') . '/cancel',
//            ]);
//
//            return response()->json(['id' => $session->id]);
//
////            $session = Session::create([
////                'payment_method_types' => ['card'],
////                'line_items' => [[
////                    'price_data' => [
////                        'currency' => 'usd',
////                        'product_data' => [
////                            'name' => 'T-shirt',
////                        ],
////                        'unit_amount' => 2000,
////                    ],
////                    'quantity' => 1,
////                ]],
////                'mode' => 'payment',
////                'success_url' => url('/success'),
////                'cancel_url' => url('/cancel'),
////            ]);
//
//        } catch (\Exception $e) {
//            return response()->json(['error' => $e->getMessage()]);
//        }
//    }
}
