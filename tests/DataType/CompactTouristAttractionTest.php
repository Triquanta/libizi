<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\DataType\CompactTouristAttractionTest.
 */

namespace Triquanta\IziTravel\Tests\DataType;

use Triquanta\IziTravel\DataType\CompactTouristAttraction;
use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\DataType\TouristAttractionInterface;

/**
 * @coversDefaultClass \Triquanta\IziTravel\DataType\CompactTouristAttraction
 */
class CompactTouristAttractionTest extends \PHPUnit_Framework_TestCase
{

    protected $json = <<<'JSON'
{
  "uuid":       "f165ef31-91d5-4dae-b4ac-11a2cb93fa83",
  "hash":       "65dd8712d7b793b1a327fbef9e51a60d2a54ccdc",
  "type":       "tourist_attraction",
  "title":      "Foo to the bar",
  "summary":    "A story about foo to the bar.",
  "hidden":     true,
  "status":     "published",
  "language": "en",
  "languages":  ["en"],
  "content_provider": {
    "name": "Sample CP",
    "uuid": "15ad4ee2-ff55-4a86-950d-8dee4c79fc35"
  },
  "trigger_zones": [
    {
      "type":             "circle",
      "circle_latitude":  52.4341477399124,
      "circle_longitude": 4.81567904827443,
      "circle_radius":    818.92609425069
    }
  ],
  "location": {
    "altitude":  0.0,
    "latitude":  59.9308144003772,
    "longitude": 30.3516736220902
  },
  "images": [
    {
        "uuid" : "b5c30e91-66c0-4382-aa55-56c0b13e2263",
        "type" : "story",
        "order" : 1,
        "hash" : "b638e89534de7a84304942ce7887bdb4",
        "size" : 231663
      },
      {
        "uuid" : "b5c30e91-66c0-4382-aa55-56c0b13e2263",
        "type" : "story",
        "order" : 1,
        "hash" : "b638e89534de7a84304942ce7887bdb4",
        "size" : 231663
      }
  ]
}
JSON;

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\DataType\CompactTouristAttraction|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = CompactTouristAttraction::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     */
    public function testCreateFromJson()
    {
        CompactTouristAttraction::createFromJson($this->json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\InvalidJsonFactoryException
     */
    public function testCreateFromJsonWithInvalidJson()
    {
        $json = 'foo';

        CompactTouristAttraction::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

    /**
     * @covers ::createFromJson
     * @covers ::createFromData
     *
     * @expectedException \Triquanta\IziTravel\DataType\MissingUuidFactoryException
     */
    public function testCreateFromJsonWithoutUuid()
    {
        $json = <<<'JSON'
{}
JSON;

        CompactTouristAttraction::createFromJson($json, MultipleFormInterface::FORM_COMPACT);
    }

}
