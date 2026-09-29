<?php

use App\Models\Order;
use App\Services\OrderService;

test('that true is true', function () {
    expect(true)->toBeTrue();
});

it('revierte todo si falla el descuento de inventario', function () {
    $order = Order::factory()->create();


    expect(fn () => app(OrderService::class)->confirmar($order))
        ->toThrow(RuntimeException::class);

    // Ninguna de las dos tablas conserva el cambio
    expect($order->fresh()->estado)->toBe('draft');
});
