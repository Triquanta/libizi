<?php

/**
 * @file
 * Contains \Triquanta\IziTravel\DataType\Content.
 */

namespace Triquanta\IziTravel\DataType;

/**
 * Provides a content data type.
 */
class Content implements ContentInterface
{

    use FactoryTrait;

    /**
     * The language.
     *
     * @var string
     *   An ISO 639-1 alpha-2 language code.
     */
    protected $languageCode;

    /**
     * The title.
     *
     * @var string
     */
    protected $title;

    /**
     * The summary.
     *
     * @var string
     */
    protected $summary;

    /**
     * The description
     *
     * @var string
     */
    protected $description;

    /**
     * The playback.
     *
     * @var \Triquanta\IziTravel\DataType\PlaybackInterface|null
     */
    protected $playback;

    /**
     * The images.
     *
     * @var \Triquanta\IziTravel\DataType\ImageInterface[]
     */
    protected $images = [];

    /**
     * The audio media.
     *
     * @var \Triquanta\IziTravel\DataType\AudioInterface[]
     */
    protected $audio = [];

    /**
     * The videos.
     *
     * @var \Triquanta\IziTravel\DataType\VideoInterface[]
     */
    protected $videos = [];

    /**
     * The child objects.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    protected $children = [];

    /**
     * The collections.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    protected $collections = [];

    /**
     * The references.
     *
     * @var \Triquanta\IziTravel\DataType\CompactMtgObjectInterface[]
     */
    protected $references = [];

    /**
     * The quiz.
     *
     * @var \Triquanta\IziTravel\DataType\QuizInterface|null
     */
    protected $quiz;

    public static function createFromData(\stdClass $data, $form)
    {
        $content = new static();
        $content->languageCode = $data->language;
        $content->title = $data->title;
        $content->summary = $data->summary;
        $content->description = $data->desc;
        if (isset($data->images)) {
            foreach ($data->images as $imageData) {
                $content->images[] = Image::createFromData($imageData, $form);
            }
        }
        if (isset($data->audio)) {
            foreach ($data->audio as $audioData) {
                $content->audio[] = Audio::createFromData($audioData, $form);
            }
        }
        if (isset($data->video)) {
            foreach ($data->video as $videoData) {
                $content->videos[] = Video::createFromData($videoData, $form);
            }
        }
        if (isset($data->children)) {
            foreach ($data->children as $childData) {
                $content->children[] = MtgObjectBase::createFromData($childData,
                  MultipleFormInterface::FORM_COMPACT);
            }
        }
        if (isset($data->collections)) {
            foreach ($data->collections as $collectionData) {
                $content->collections[] = MtgObjectBase::createFromData($collectionData,
                  MultipleFormInterface::FORM_COMPACT);
            }
        }
        if (isset($data->references)) {
            foreach ($data->references as $referenceData) {
                $content->references[] = MtgObjectBase::createFromData($referenceData,
                  MultipleFormInterface::FORM_COMPACT);
            }
        }
        if (isset($data->playback)) {
            $content->playback = Playback::createFromData($data->playback, $form);
        }
        if (isset($data->quiz)) {
            $content->quiz = Quiz::createFromData($data->quiz, $form);
        }

        return $content;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPlayback()
    {
        return $this->playback;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getAudio()
    {
        return $this->audio;
    }

    public function getVideos()
    {
        return $this->videos;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getCollections()
    {
        return $this->collections;
    }

    public function getReferences()
    {
        return $this->references;
    }

    public function getQuiz()
    {
        return $this->quiz;
    }

}
