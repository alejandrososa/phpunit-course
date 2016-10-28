<?php
/**
 * Creado con PhpStorm.
 * Copyright (c) ITNow 2016.
 * Autor: Franklyn Alejandro Sosa Pérez <fsosa@externos.itnow.com>
 * Fecha: 28/10/2016
 * Hora: 14:49
 */

namespace Objetos\Tests\objetos;


use Objetos\Articulo;

class ArticuloTest extends \PHPUnit_Framework_TestCase
{

    public function testExisteClaseArticulo(){
        $this->assertTrue(class_exists('Objetos\Articulo'));
    }

    public function testClaseArticuloExtiendeDeClaseAbstractaAnuncio(){
        $this->assertInstanceOf('Objetos\abstractas\AbstractaAnuncio', new Articulo());
    }
}
