<?php

namespace Lib\Mvc\Model\Translate;


trait TModelTranslateProperties
{
    private $id;
    private $language_iso;
    private $phrase;
    private $translation;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLanguageIso()
    {
        return $this->language_iso;
    }

    /**
     * @param mixed $language_iso
     */
    public function setLanguageIso($language_iso)
    {
        $this->language_iso = $language_iso;
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