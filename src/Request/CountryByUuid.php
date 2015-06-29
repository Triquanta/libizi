<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\CountryByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\CountryBase;

/**
 * Requests a country by UUID.
 */
class CountryByUuid extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\CountryInterface
     */
    public function execute()
    {
        $this->validateRequiredUuid();
        $this->validateRequiredLanguageCodes();

        $json = $this->requestHandler->request('/countries/' . $this->uuid, [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
        ]);

        return CountryBase::createFromJson($json, $this->form);
    }

}
