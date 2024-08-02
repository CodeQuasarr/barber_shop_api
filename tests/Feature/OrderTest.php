<?php

use App\Models\User;

test('Cannot access orders without authentication', function () {
    $response = $this->getJson(route('orders.index'));

    $response->assertStatus(401);
});

test('Can access orders with authentication', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson(route('orders.index'));

    $response->assertStatus(200);
});

test('Can create an order with authentication', function () {
    $user = User::factory()->create();

    $data = [
        'user_id' => $user->id,
        'total_price' => 100.00,
    ];

    $response = $this->actingAs($user)->postJson(route('orders.store'), $data);

    $response
        ->assertStatus(201)
        ->assertJsonFragment($data);
});

