<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\CompactMtgObjectInterface.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a compact MTG object data type.
 */
interface CompactMtgObjectInterface extends MtgObjectInterface
{

    /**
     * Gets the summary.
     *
     * @return string
     */
    public function getSummary();

    /**
     * Gets the images.
     *
     * @return \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    public function getImages();

}
