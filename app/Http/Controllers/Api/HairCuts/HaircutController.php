<?php

namespace App\Http\Controllers\Api\HairCuts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Haircuts\HaircutCollection;
use App\Http\Resources\Haircuts\OrderResource;
use App\Models\Haircuts\HairCut;
use Illuminate\Http\Request;

class HaircutController extends Controller
{
    /**
     * @description Display a listing of the resource.
     * @return HaircutCollection
     */
    public function index(): HaircutCollection
    {
        return new HaircutCollection(Haircut::all());
    }

    /**
     * @description Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('create', HairCut::class)) {
            abort(403);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(HairCut $haircut)
    {
        $data = [
            'id' => $haircut->getKey(),
            'name' => $haircut->getName(),
            'price' => $haircut->price,
            'description' => fake()->paragraph(5),
            'stripe_product_id' => $haircut->stripe_product_id,
            'details' => fake()->paragraph(3),
            'images' => [
                [
                    'src' => $haircut->imageSrc,
                    'alt' => $haircut->imageAlt,
                ],
                [
                    'src' => $haircut->imageSrc,
                    'alt' => $haircut->imageAlt,
                ],
            ],
            'highlights' => [
                'Facilité d\'Entretien',
                'Couleur Rose Vibrante',
                'Cheveux de Haute Qualité',
                'Confort Optimal',
            ],
            'sizes' => [
                ['name' => 'XXS', 'inStock' => false],
                ['name' => 'XS', 'inStock' => true],
                ['name' => 'S', 'inStock' => true],
                ['name' => 'M', 'inStock' => true],
            ]
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HairCut $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HairCut $id)
    {
        //
    }
}
