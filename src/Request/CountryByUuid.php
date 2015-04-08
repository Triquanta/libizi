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
      if (!isset($this->uuid))
      {
        throw new \Exception('Requesting a country by UUID requires a UUID.');
      }

      $json = $this->requestHandler->request('/countries/' . $this->uuid, [
        'languages' => $this->languageCodes,
        'includes' => $this->includes,
        'form' => $this->form,
      ]);
      $data = json_decode($json);
      return CountryBase::createFromData($data, $this->form);
    }

}
