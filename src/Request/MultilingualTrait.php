<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\MultilingualTrait.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Implements \Triquanta\IziTravel\Request\MultilingualInterface.
 */
Trait MultilingualTrait
{

    /**
     * The language codes.
     *
     * @var string[]
     *   An array of ISO 639-1 alpha-2 language codes.
     */
    protected $languageCodes = [];

    public function setLanguageCodes(array $languageCodes)
    {
        if (empty($languageCodes)) {
            throw new \InvalidArgumentException('No language code(s) provided. Expected array of language code strings.');
        }

        $this->languageCodes = $languageCodes;

        return $this;
    }

    public function validateRequiredLanguageCodes()
    {
        if (empty($this->languageCodes)) {
            throw new \RuntimeException('No language code(s) provided. Expected array of language code strings.');
        }
    }

}
