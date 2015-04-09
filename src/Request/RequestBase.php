<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\Request\RequestBase.
 */

namespace Triquanta\IziTravel\Request;

use Triquanta\IziTravel\Client\RequestHandlerInterface;

/**
 * Defines a request.
 */
abstract class RequestBase implements RequestInterface
{

    /**
     * The request handler.
     *
     * @var |Triquanta\IziTravel\Request\RequestHandlerInterface
     */
    protected $requestHandler;

    /**
     * Creates a new instance.
     *
     * @param |Triquanta\IziTravel\Client\RequestHandlerInterface $requestHandler
     */
    public function __construct(RequestHandlerInterface $requestHandler)
    {
        $this->requestHandler = $requestHandler;
    }

    public static function create(RequestHandlerInterface $requestHandler)
    {
        return new static($requestHandler);
    }

    /**
     * Validates arguments before the request takes place.
     *
     * @throws \InvalidArgumentException
     *   Exception thrown when arguments are missing or have an invalid value.
     */
    protected function validateArguments() {}

}
