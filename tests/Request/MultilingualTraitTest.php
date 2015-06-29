<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\MultilingualTraitTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\Request\MultilingualTrait;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\MultilingualTrait
 */
class MultilingualTraitTest extends \PHPUnit_Framework_TestCase {

    /**
     * The language codes.
     *
     * @var string[]
     *   An array of ISO 639-1 alpha-2 language codes.
     */
    protected $languageCodes = [];

    /**
     * An invalid language codes.
     *
     * @var string
     */
    protected $invalidLanguageCodes;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\MultilingualTrait
     */
    protected $sut;

    public function setUp() {

        $this->languageCodes = ['en', 'nl'];
        $this->invalidLanguageCodes = [];

        $this->sut = new MultilingualTraitTestTraitImplementation();
    }

    /**
     * @covers ::setLanguageCodes
     */
    public function testSetLanguageCodes() {

        $this->sut->setLanguageCodes($this->languageCodes);

        $reflection = new \ReflectionProperty($this->sut, 'languageCodes');
        $reflection->setAccessible(true);
        $sut_language_codes = $reflection->getValue($this->sut);

        $this->assertSame($this->languageCodes, $sut_language_codes);
    }

    /**
     * @covers ::setLanguageCodes
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetInvalidLanguageCodes() {

        $this->sut->setLanguageCodes($this->invalidLanguageCodes);
    }

    /**
     * @covers ::validateRequiredLanguageCodes
     *
     * @depends testSetLanguageCodes
     *
     * @expectedException \RuntimeException
     */
    public function testValidateInvalidLanguageCodes() {

        $reflection = new \ReflectionClass($this->sut);
        $reflection_property = $reflection->getProperty('languageCodes');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->sut, $this->invalidLanguageCodes);

        $reflection_method = $reflection->getMethod('validateRequiredLanguageCodes');
        $reflection_method->setAccessible(true);
        $reflection_method->invoke($this->sut);
    }

}

class MultilingualTraitTestTraitImplementation
{

    use MultilingualTrait;

}