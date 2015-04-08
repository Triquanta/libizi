<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\FullMtgObjectBaseTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\FullMtgObjectBase
 */
class FullMtgObjectBaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\FullMtgObjectBase
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = $this->getMockForAbstractClass('\Triquanta\IziTravel\DataType\FullMtgObjectBase');
        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson(TestHelper::getJsonResponse('tour_full_include_all'), MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     */
    public function testCreateFromJson()
    {
        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson(TestHelper::getJsonResponse('tour_full_include_all'), MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     * @covers \Triquanta\IziTravel\DataType\MtgObjectBase::createBaseFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        /** @var \Triquanta\IziTravel\DataType\FullMtgObjectBase $class */
        $class = get_class($this->sut);
        $this->sut = $class::createFromJson($json, MultipleFormInterface::FORM_FULL);
    }

    /**
     * @covers ::getLanguageCode
     */
    public function testGetLanguageCode()
    {
      $this->assertSame('en', $this->sut->getLanguageCode());
    }

    /**
     * @covers ::getTitle
     */
    public function testGetTitle()
    {
      $this->assertSame("Bergen in Edvard Grieg's footsteps", $this->sut->getTitle());
    }

    /**
     * @covers ::getParentUuid
     */
    public function testGetParentUuid()
    {
        $this->assertSame('3afcd4ab-837f-4055-a8ed-ce43910f9446', $this->sut->getParentUuid());
    }

    /**
     * @covers ::getMap
     */
    public function testGetMap()
    {
        $this->assertInstanceOf('\Triquanta\IziTravel\DataType\MapInterface', $this->sut->getMap());
    }

    /**
     * @covers ::getContent
     */
    public function testGetContent()
    {
        $this->assertInternalType('array', $this->sut->getContent());
        foreach ($this->sut->getContent() as $content) {
            $this->assertInstanceOf('\Triquanta\IziTravel\DataType\ContentInterface', $content);

        }
    }

}
