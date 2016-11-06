<?php
/**
 * Creado con PhpStorm.
 * phpUnit
 * Desarrollador: Alejandro Sosa <alesjohnson@hotmail.com>
 * Fecha: 6/11/2016
 * Hora: 13:02
 */

namespace Class2\Tests;


use Class1\Car;
use Class2\CarSeat;

class modelsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CarSeat
     */
    public $carSeat;


    public function setUp()
    {
        $this->carSeat = new CarSeat();

        parent::setUp();
    }

    public function carReflectionProvider(){
        return [
            [new \ReflectionClass('Class1\Car')]
        ];
    }

    public function carProvider(){
        return [
            [new Car()]
        ];
    }
    
    public function carModelsProvider(){
        $ibiza = new CarSeat();
        $ibiza->brand = 'Ibiza';
        $ibiza->model = '5 puertas STYLE';
        $ibiza->color = 'Green';
        $ibiza->numberOfTires = 4;

        $leon = new CarSeat();
        $leon->brand = 'León';
        $leon->model = 'SC';
        $leon->color = 'Red';
        $leon->numberOfTires = 4;

        $alhambra = new CarSeat();
        $alhambra->brand = 'Alhambra';
        $alhambra->model = '5 puertas STYLE';
        $alhambra->color = 'White';
        $alhambra->numberOfTires = 4;

        return [
            [$ibiza],
            [$leon],
            [$alhambra]
        ];
    }

    public function classExists($class_name)
    {
        return $this->assertTrue(class_exists($class_name));
    }

    // tests
    /**
     * @param $class \ReflectionClass
     * @dataProvider carReflectionProvider
     */
    public function testClassCarHasAttributes($class)
    {
        $atributos = $atributosEsperados = [];
        foreach ($class->getProperties() as $property) {
            $atributos[] = $property->getName();
        }

        $atributosEsperados = [
            'brand',
            'model',
            'color',
            'numberOfTires'
        ];

        $this->assertEquals($atributosEsperados, $atributos, 'Attributes not found');
    }

    /**
     * @param $class Car
     * @dataProvider carProvider
     */
    public function testClassHasAttributeBrand($class)
    {
        $this->assertClassHasAttribute('brand', get_class($class));
    }

    /**
     * @param $class Car
     * @dataProvider carProvider
     */
    public function testClassHasAttributeModel($class)
    {
        $this->assertClassHasAttribute('model', get_class($class));
    }

    /**
     * @param $class Car
     * @dataProvider carProvider
     */
    public function testClassHasAttributeColor($class)
    {
        $this->assertClassHasAttribute('color', get_class($class));
    }

    /**
     * @param $class Car
     * @dataProvider carProvider
     */
    public function testClassHasAttributeNumberOfTires($class)
    {
        $this->assertClassHasAttribute('numberOfTires', get_class($class));
    }

    public function testExistsClassCarSeatIbiza()
    {
        $this->classExists('Class2\CarSeat');
    }

    /**
     * @param $models CarSeat[]
     * @dataProvider carModelsProvider
     */
    public function testModelsHaveValuesInTheirProperties($models){
        $this->assertNotEmpty($models->brand, 'brand is empty');
        $this->assertNotEmpty($models->model, 'model is empty');
        $this->assertNotEmpty($models->color, 'color is empty');
        $this->assertNotEmpty($models->numberOfTires, 'numberOfTires is empty');
    }
}
