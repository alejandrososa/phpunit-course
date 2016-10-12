<?php

namespace Class1\Tests;

use Class1\Person;

Class class1Test extends \PHPUnit_FrameWork_TestCase
{

    /**
     * First of all we are going to test that we as person can exist 
     */
    public function testPersonExists()
    {
        $person = new Person();
        if ( $person instanceof Person ){
            return $this->assertTrue( true );
          
        }
        $this->assertTrue( false );
    }

} 
