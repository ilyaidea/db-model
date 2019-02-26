<?php

namespace Lib\Mvc\Model\Translate;


trait TModelTranslateProperties
{
    private $id;
    private $language;
    private $phrase;
    private $translation;

    public function getId()
    {
        return $this->id;
    }
    public function getLanguage()
    {
        return $this->language;
    }
    public function setLanguage( $language )
    {
        $this->language = $language;
    }
    public function getPhrase()
    {
        return $this->phrase;
    }
    public function setPhrase( $phrase )
    {
        $this->phrase = \Phalcon\Text::underscore($phrase);
    }
    public function getTranslation()
    {
        return $this->translation;
    }
    public function setTranslation( $translation )
    {
        $this->translation = $translation;
    }
}