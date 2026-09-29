<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{

public function crear(array $data)
    {
        $order = Order::create($data);
        return $order;
    }

    public function confirmar(Order $order)
    {
        //if


        //if


        //if

        //reglas de negocio para que funcione la aplicación

        throw new \RuntimeException('Error al descontar inventario');

        $order->status = 'confirmed';
        $order->save();
    }

    public function cancelar(Order $order)
    {
        //if

        $order->status = 'cancelled';
        $order->save();
    }
}
