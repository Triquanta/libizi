<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\PublisherContactInformation.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Defines a publisher contact information data type.
 */
class PublisherContactInformation implements PublisherContactInformationInterface
{

    use FactoryTrait;

    /**
     * The website URL.
     *
     * @var string|null
     */
    protected $websiteUrl;

    /**
     * The email address.
     *
     * @var string|null
     */
    protected $emailAddress;

    /**
     * The URL to the Twitter account.
     *
     * @var string|null
     */
    protected $twitterUrl;

    /**
     * The URL to the Facebook page.
     *
     * @var string|null
     */
    protected $facebookUrl;

    public static function createFromData(\stdClass $data, $form)
    {
        $contactInformation = new static();
        if (isset($data->website)) {
            $contactInformation->websiteUrl = $data->website;
        }
        if (isset($data->email)) {
            $contactInformation->emailAddress = $data->email;
        }
        if (isset($data->facebook)) {
            $contactInformation->facebookUrl = $data->facebook;
        }
        if (isset($data->twitter)) {
            $contactInformation->twitterUrl = $data->twitter;
        }

        return $contactInformation;
    }

    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

}
