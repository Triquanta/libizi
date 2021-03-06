<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Tests\Request\MtgObjectByUuidTest.
 */

namespace Triquanta\IziTravel\Tests\Request;

use Triquanta\IziTravel\DataType\MultipleFormInterface;
use Triquanta\IziTravel\Request\MtgObjectByUuid;
use Triquanta\IziTravel\Tests\TestHelper;

/**
 * @coversDefaultClass \Triquanta\IziTravel\Request\MtgObjectByUuid
 */
class MtgObjectByUuidTest extends RequestBaseTestBase
{

    /**
     * The class under test.
     *
     * @var \Triquanta\IziTravel\Request\MtgObjectByUuid
     */
    protected $sut;

    public function setUp()
    {
        parent::setUp();

        $this->sut = MtgObjectByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::create
     * @covers ::__construct
     */
    public function test__Construct()
    {
        $this->sut = MtgObjectByUuid::create($this->requestHandler);
    }

    /**
     * @covers ::execute
     * @covers \Triquanta\IziTravel\Request\FormTrait::setForm
     * @covers \Triquanta\IziTravel\Request\ModifiableTrait::setIncludes
     * @covers \Triquanta\IziTravel\Request\MultiLingualTrait::setLanguageCodes
     * @covers \Triquanta\IziTravel\Request\UuidTrait::setUuid
     */
    public function testExecute()
    {
        $languageCodesOptions = ['en', 'nl', 'uk'];
        $languageCodes = [$languageCodesOptions[array_rand($languageCodesOptions)]];
        $formOptions = [
          MultipleFormInterface::FORM_COMPACT,
          MultipleFormInterface::FORM_FULL
        ];
        $form = $formOptions[array_rand($formOptions)];
        $includesOptions = ['city', 'country'];
        $includes = [$includesOptions[array_rand($includesOptions)]];
        $uuidOptions = [
          'bcf57367-77f6-4e39-9da6-1b481826501f',
          '3f879f37-21b0-479d-bd74-aa26f72fa328'
        ];
        $uuid = $uuidOptions[array_rand($uuidOptions)];

        $expectedParameters = [
          'languages' => $languageCodes,
          'includes' => $includes,
          'form' => $form,
        ];

        $this->requestHandler->expects($this->once())
          ->method('get')
          ->with($this->isType('string'),
            new \PHPUnit_Framework_Constraint_IsEqual($expectedParameters))
          ->willReturn(json_encode([json_decode(TestHelper::getJsonResponse('tour_full_include_all'))]));

        $this->sut->setLanguageCodes($languageCodes)
          ->setUuid($uuid)
          ->setForm($form)
          ->setIncludes($includes)
          ->execute();
    }

    /**
     * @covers ::execute
     *
     * @dataProvider providerTestExecute
     *
     * @depends      testExecute
     */
    public function testExecuteRealRequest($form, $instanceof)
    {
        $this->sut = MtgObjectByUuid::create($this->productionRequestHandler);

        $uuid = 'bcf57367-77f6-4e39-9da6-1b481826501f';
        $languageCodes = ['en'];

        $mtgObject = $this->sut->setUuid($uuid)
          ->setLanguageCodes($languageCodes)
          ->setForm($form)
          ->execute();

        $this->assertInstanceOf($instanceof, $mtgObject);
    }

    /**
     * Provides data to self::testExecute
     */
    public function providerTestExecute()
    {
        return [
          [
            MultipleFormInterface::FORM_FULL,
            '\Triquanta\IziTravel\DataType\FullMtgObjectInterface'
          ],
          [
            MultipleFormInterface::FORM_COMPACT,
            '\Triquanta\IziTravel\DataType\CompactMtgObjectInterface'
          ],
        ];
    }

}
