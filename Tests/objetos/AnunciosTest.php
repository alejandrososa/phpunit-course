<?php

/**
 * Creado con PhpStorm.
 * Copyright (c) ITNow 2016.
 * Autor: Franklyn Alejandro Sosa Pérez <fsosa@externos.itnow.com>
 * Fecha: 28/10/2016
 * Hora: 13:00
 */
namespace Objetos\Tests\objetos;

use Objetos\Articulo;

class AnunciosTest extends \PHPUnit_Framework_TestCase
{
    const CLASE_INTERFACE = 'I';
    const CLASE_NORMAL = 'N';

    /**
     * @var \ReflectionClass
     */
    public $clase_articulo;

    public function setUp(){
        $this->clase_articulo = new Articulo();
    }

    public function interfaceAnuncioProvider(){
        return [
            [new \ReflectionClass('Objetos\interfaces\IAnuncios')]
        ];
    }

    public function abstractaAnuncioProvider(){
        return [
            [new \ReflectionClass('Objetos\abstractas\AbstractaAnuncio')]
        ];
    }

    public function existeClase($namespace, $tipo = self::CLASE_NORMAL){
        if(empty($namespace)){
            return $this->assertTrue(false);
        }

        $nombre = end(explode("\\", $namespace));

        if($tipo == self::CLASE_NORMAL){
            $this->assertTrue(class_exists($namespace), 'No existe clase '. $nombre);
        }elseif ($tipo == self::CLASE_INTERFACE){
            $this->assertTrue(interface_exists($namespace), 'No existe interface '. $nombre);
        }
    }


    public function testExisteInterfaceIAnuncios(){
        $this->existeClase('Objetos\interfaces\IAnuncios', self::CLASE_INTERFACE);
    }

    /**
     * @depends testExisteInterfaceIAnuncios
     * @param $clase_reflexion \ReflectionClass
     * @dataProvider interfaceAnuncioProvider
     */
    public function testInterfaceIAnunciosTieneConstantesDeTipos($clase_reflexion){
        $constantes = $clase_reflexion->getConstants();

        $tipos = ['TIPO_ARTICULO' => 'A', 'TIPO_OFERTA' => 'O', 'TIPO_DESCUENTO' => 'D'];

        $this->assertEquals($tipos, $constantes, 'Constantes no existen');
    }

    /**
     * @depends testExisteInterfaceIAnuncios
     * @param $clase_reflexion \ReflectionClass
     * @dataProvider interfaceAnuncioProvider
     */
    public function testInterfaceIAnunciosTieneMetodoGetTipo($clase_reflexion){
        $metodo = $clase_reflexion->getMethod('getTipo')->getName();

        $this->assertEquals('getTipo', $metodo, 'Metodo no existe');
    }

    /**
     * @depends testExisteInterfaceIAnuncios
     */
    public function testExisteClaseAbstractaAnuncio(){
        $this->existeClase('Objetos\abstractas\AbstractaAnuncio');
    }

    /**
     * @depends testExisteInterfaceIAnuncios
     * @param $clase_reflexion \ReflectionClass
     * @dataProvider abstractaAnuncioProvider
     */
    public function testClaseAbstractaAnuncioEsInstanciaDeIAnuncios($clase_reflexion){

        $interfaces = $clase_reflexion->getInterfaceNames();
        $this->assertContains('Objetos\interfaces\IAnuncios', $interfaces);
    }
}
