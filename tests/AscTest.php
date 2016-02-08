<?php

namespace Rmtram\VersionSort\Tests;

use Rmtram\VersionSort\VersionSort;

/**
 * Class AscTest
 * @package Rmtram\VersionSort\Tests
 */
class AscTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers VersionSort::asc
     */
    public function testMajorVersion()
    {
        $versions = ['2.0.0', '1.0.0', '40.0.0', '3.0.0'];
        $vs = new VersionSort($versions);
        $expected = $vs->asc();
        $actual = ['1.0.0', '2.0.0', '3.0.0', '40.0.0'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers VersionSort::asc
     */
    public function testSubVersion()
    {
        $versions = ['1.1.0', '1.0.0', '1.299.0', '1.2.0'];
        $vs = new VersionSort($versions);
        $expected = $vs->asc();
        $actual = ['1.0.0', '1.1.0', '1.2.0', '1.299.0'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers VersionSort::asc
     */
    public function testMinorVersion()
    {
        $versions = ['1.0.100', '1.0.1', '1.0.20', '1.0.9'];
        $vs = new VersionSort($versions);
        $expected = $vs->asc();
        $actual = ['1.0.1', '1.0.9', '1.0.20', '1.0.100'];
        $this->assertEquals($expected, $actual);
    }

    /**
     * @covers VersionSort::asc
     */
    public function testAllVersion()
    {
        $versions = [
            '1203.1.RC.100', '1203.1.RC.21', '1.0.20',
            '1.0.239', '1.1.alpha.1', '1.1.alpha.4',
            '3.0.2', '3.8.1'
        ];
        $vs = new VersionSort($versions);
        $expected = $vs->asc();
        $actual = [
            '1.0.20', '1.0.239', '1.1.alpha.1',
            '1.1.alpha.4', '3.0.2', '3.8.1',
            '1203.1.RC.21', '1203.1.RC.100'
        ];
        $this->assertEquals($expected, $actual);
    }

}