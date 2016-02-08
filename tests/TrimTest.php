<?php

namespace Rmtram\VersionSort\Tests;

use Rmtram\VersionSort\VersionSort;

/**
 * Class TrimTest
 * @package Rmtram\VersionSort\Tests
 */
class TrimTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers VersionSort::trim
     * @covers VersionSort::get
     */
    public function testPrefixAlphabetOfOneCharacter()
    {
        $versions = array('v1.0.1');
        $vs = new VersionSort($versions);
        $expected = $vs->trim()->get();
        $actual = array('1.0.1');
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers VersionSort::trim
     * @covers VersionSort::get
     */
    public function testPrefixAlphabetOfFiveCharacter()
    {
        $versions = array('abcdef1.0.1');
        $vs = new VersionSort($versions);
        $expected = $vs->trim()->get();
        $actual = array('1.0.1');
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers VersionSort::trim
     * @covers VersionSort::get
     */
    public function testPrefixSymbols()
    {
        $versions = array('@-#*&^$~=`|[]:;"\'.,/\\1.0.1');
        $vs = new VersionSort($versions);
        $expected = $vs->trim()->get();
        $actual = array('1.0.1');
        $this->assertEquals($expected, $actual);
    }

}