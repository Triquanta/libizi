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
        if (empty($uuid)) {
            throw new \InvalidArgumentException('UUID is required.');
        }

        $this->uuid = $uuid;

        return $this;
    }

    protected function validateRequiredUuid()
    {
        if (empty($this->uuid)) {
            throw new \RuntimeException('UUID is required.');
        }
    }

}

// 4 test methods
// validatie-test @depends op setUuid
