<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\UuidTraitTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\Request\UuidTrait;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\UuidTrait
 */
class UuidTraitTest extends \PHPUnit_Framework_TestCase {

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    /**
     * An invalid UUID.
     *
     * @var string
     */
    protected $invalidUuid;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\UuidTrait
     */
    protected $sut;

    public function setUp() {

        $this->uuid = 'foo-bar-baz-' . mt_rand();
        $this->invalidUuid = '';

        $this->sut = new UuidTraitTestTraitImplementation();
    }

    /**
     * @covers ::setUuid
     */
    public function testSetUuid() {

        $this->sut->setUuid($this->uuid);

        $reflection = new \ReflectionProperty($this->sut, 'uuid');
        $reflection->setAccessible(true);
        $sut_uuid = $reflection->getValue($this->sut);

        $this->assertSame($this->uuid, $sut_uuid);
    }

    /**
     * @covers ::setUuid
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidUuid() {

        $this->sut->setUuid($this->invalidUuid);

    }

    /**
     * @covers ::validateRequiredUuid
     *
     * @depends testSetUuid
     */
    public function testValidateUuid() {

        $this->sut->setUuid($this->uuid);

        $reflection_method = new \ReflectionMethod($this->sut, 'validateRequiredUuid');
        $reflection_method->setAccessible(true);
        $reflection_method->invoke($this->sut);

        // No assertion. Only testing if no exception occurs.

    }

    /**
     * @covers ::validateRequiredUuid
     *
     * @depends testSetUuid
     *
     * @expectedException \RuntimeException
     */
    public function testValidateInvalidUuid() {

        $reflection = new \ReflectionClass($this->sut);
        $reflection_property = $reflection->getProperty('uuid');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->sut, $this->invalidUuid);

        $reflection_method = $reflection->getMethod('validateRequiredUuid');
        $reflection_method->setAccessible(true);
        $reflection_method->invoke($this->sut);

    }

}

class UuidTraitTestTraitImplementation
{

    use UuidTrait;

}