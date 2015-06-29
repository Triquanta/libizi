<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\UuidTraitTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\Request\UuidTrait;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\UuidTrait
 */
class UuidTraitTest extends \PHPUnit_Framework_TestCase {

    /**
    * The UUID.
    *
    * @var string
    */
    protected $uuid;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\UuidTrait
     */
    protected $sut;

    public function setUp() {

        $this->uuid = 'foo-bar-baz-' . mt_rand();

        $this->sut = new UuidTraitTestTraitImplementation();
    }

    /**
     * @covers ::setUuid
     */
    public function testSetUuid() {

        $this->sut->uuid = $this->uuid;
        $this->assertSame($this->uuid, $this->sut->getUuid());
    }

    /**
     * @covers ::setUuid
     */
    public function testSetInvalidUuid() {

        $this->sut->uuid = $this->uuid;
        $this->assertSame($this->uuid, $this->sut->getUuid());
    }

    /**
     * @covers ::validateRequiredUuid
     * @expectedException \RuntimeException
     */
    public function testValidateUuid() {

        $this->sut->uuid = NULL;
        $this->sut->getUuid();
        $this->sut->validateRequiredUuid();
    }

}

class UuidTraitTestTraitImplementation
{

    use UuidTrait;

    /**
     * Constructs a new instance.
     */
    public function __construct()
    {
    }
}