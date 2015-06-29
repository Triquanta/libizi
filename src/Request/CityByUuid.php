<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\CityByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CityBase;

/**
 * Requests a city by UUID.
 */
class CityByUuid extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\CityInterface
     */
    public function execute()
    {
        $this->validateRequiredUuid();
        $this->validateRequiredLanguageCodes();

        $json = $this->requestHandler->request('/cities/' . $this->uuid, [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
        ]);

        return CityBase::createFromJson($json, $this->form);
    }

}
