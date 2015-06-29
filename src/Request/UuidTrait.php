<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\UuidTrait.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Implements \Triquanta\IziTravel\Request\UuidInterface.
 */
Trait UuidTrait
{

    /**
     * The UUID.
     *
     * @var string
     */
    protected $uuid;

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    protected function validateUuid()
    {
        if (empty($this->uuid))
        {
          throw new \InvalidArgumentException('Missing uuid');
        }
    }

}
