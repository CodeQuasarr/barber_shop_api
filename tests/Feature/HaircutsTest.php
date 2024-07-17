<?php

use App\Models\Haircuts\HairCut;

test('example', function () {
    $response = $this->get('/api/haircuts');

    $response->assertStatus(200);
});

test('Can list Haircuts', function () {

    HairCut::create([
        'hair_cut_category_id' => 1, // 'Haircut 1',
        'name' => 'Haircut 1',
        'price' => 10.20,
        'image' => 'image1',
    ]);
    $response = $this->getJson(route('haircuts.index'));

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'price',
                    'image',
                ]
            ],
        ]);

    $response->assertJsonFragment([
        'name' => 'Haircut 1',
        'price' => 10.20,
        'image' => 'image1',
    ]);

    expect($response['data'])->toHaveCount(1);
});

//test('Can create new Haircut', function () {
//    $response = $this->postJson(route('haircuts.store'), [
//        'hair_cut_category_id' => 2,
//        'name' => 'Haircut 3',
//        'price' => 10.20,
//        'image' => 'image1',
//    ]);
//
//    $response
//        ->assertStatus(200)
//        ->assertJsonFragment([
//            'hair_cut_category_id' => 2,
//            'name' => 'Haircut 3',
//            'price' => 10.20,
//            'image' => 'image1',
//        ]);
//
//    expect(HairCut::all())->toHaveCount(1);
//});
