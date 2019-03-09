<?php

namespace Lib\Mvc\Model\PageCategoryMap;


trait TModelPageCategoryMapProperties
{
    private $id;
    private $page_id;
    private $page_category_id;

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
    public function getPageId()
    {
        return $this->page_id;
    }

    /**
     * @param mixed $page_id
     */
    public function setPageId($page_id)
    {
        $this->page_id = $page_id;
    }

    /**
     * @return mixed
     */
    public function getPageCategoryId()
    {
        return $this->page_category_id;
    }

    /**
     * @param mixed $page_category_id
     */
    public function setPageCategoryId($page_category_id)
    {
        $this->page_category_id = $page_category_id;
    }



}