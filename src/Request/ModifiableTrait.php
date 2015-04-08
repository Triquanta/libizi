<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\ModifiableTrait.
 */

namespace Triquanta\IziTravel\Request;

/**
 * Implements \Triquanta\IziTravel\Request\ModifiableInterface.
 */
Trait ModifiableTrait
{

    /**
     * The included sections.
     *
     * @var string[]
     */
    protected $includes = [];

  /**
   * @param array $sections
   *
   * @return \Triquanta\IziTravel\Request\ModifiableInterface
   *
   * @throws \InvalidArgumentException
   *   When unsupported sections are used.
   */
    public function setIncludes(array $sections)
    {
        if (in_array('none', $sections)) {
            throw new \InvalidArgumentException('Only specific sections can be including. Including "none" is not supported.');
        }
        $this->includes = $sections;

        return $this;
    }

    /**
     * @param array $sections
     *
     * @throws \InvalidArgumentException
     *   Is always thrown.
     */
    public function setExcludes(array $sections)
    {
        throw new \InvalidArgumentException('Excludes are not yet supported, because the service "Bart" depends on the services "coffee" and "API documentation" and these dependencies have not been satisfied yet.');
    }

}
