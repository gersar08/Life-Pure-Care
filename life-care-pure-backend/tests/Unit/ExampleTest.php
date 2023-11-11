<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PreciosEspecialesController;

class ControllersTest extends TestCase
{
    public function test_precio_index()
    {
        $controller = new UserController();
        $response = $controller->index();

        $this->assertIsArray($response);
    }

}
