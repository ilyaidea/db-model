<?php
namespace Lib\Mvc\Model\Pages;


trait TModelPagesProperties
{
    private $id;
    private $parent_id;
    private $language_iso;
    private $title;
    private $title_menu;
    private $slug;          //varchar(255),allow null,default null
    private $keywords;
    private $description;
    private $content;
    private $position;
    private $created_at;
    private $modified_in;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * @param mixed $parent_id
     */
    public function setParentId( $parent_id )
    {
        $this->parent_id = $parent_id;
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


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle( $title )
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition( $position )
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt( $created_at )
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getModifiedIn()
    {
        return $this->modified_in;
    }

    /**
     * @param mixed $modified_in
     */
    public function setModifiedIn( $modified_in )
    {
        $this->modified_in = $modified_in;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug( $slug )
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getTitleMenu()
    {
        return $this->title_menu;
    }

    /**
     * @param mixed $title_menu
     */
    public function setTitleMenu( $title_menu )
    {
        $this->title_menu = $title_menu;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords( $keywords )
    {
        $this->keywords = $keywords;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription( $description )
    {
        $this->description = $description;
    }

}