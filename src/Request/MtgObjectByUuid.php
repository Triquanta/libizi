<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\MtgObjectByUuid.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\DataType\MtgObjectBase;

/**
 * Requests an MTGObject by UUID.
 */
class MtgObjectByUuid extends RequestBase implements FormInterface, ModifiableInterface, MultilingualInterface, UuidInterface
{

    use FormTrait;
    use ModifiableTrait;
    use MultilingualTrait;
    use UuidTrait;

    /**
     * @return \Triquanta\IziTravel\DataType\MtgObjectInterface
     */
    public function execute()
    {
        $json = $this->requestHandler->request('/mtgobjects/' . $this->uuid, [
          'languages' => $this->languageCodes,
          'includes' => $this->includes,
          'form' => $this->form,
        ]);
        $data = json_decode($json);

        return MtgObjectBase::createFromData(reset($data), $this->form);
    }

}
