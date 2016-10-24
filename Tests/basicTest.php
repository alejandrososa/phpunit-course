<?php

namespace Class1\Tests;

use Class1\Person;
use Class1\Repairment;
use Class1\Car;

Class class1Test extends \PHPUnit_Framework_TestCase
{
    /**
     * First of all we are going to test that we as person can exist 
     */
    public function testPersonClassExists()
    {
        if(class_exists('Class1\Person')){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );
    }

    public function testRepairmentClassExists()
    {
        if(class_exists('Class1\Repairment')){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );
    }

    public function testCarClassExists()
    {
        if(class_exists('Class1\Car')){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );
    }

    /**
     * @depends testRepairmentClassExists
     */
    public function testMethodPullOutTyreExistsOnRepairment()
    {
        $repair = new Repairment();
        if(method_exists($repair, 'PullOutTyre')){
            return $this->assertTrue( true );
        }
        $this->assertTrue( false );
    }

    /**
     * @depends testMethodPullOutTyreExistsOnRepairment
     */
    public function testPullOutTyreTakesCarOnly()
    {
        $reflection = new \ReflectionClass('Class1\Repairment');
        $reflection_method = $reflection->getMethod('PullOutTyre');
        $reflection_param = $reflection_method->getParameters()[0]->getClass()->getName();

        $this->assertEquals('Class1\Car',$reflection_param);
    }
}