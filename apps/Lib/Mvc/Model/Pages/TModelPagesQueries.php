<?php
namespace Lib\Mvc\Model\Pages;



use Lib\Mvc\Model\Language\ModelLanguage;

trait TModelPagesQueries
{
    /**
     * Get page by slug and local language
     * @param string $slug
     * @return null|self
     */
    public static function getPageResult($slug = '')
    {
        $params = [];

        $params['conditions'] = 'slug=:slug: AND language=:lang:';
        $params['bind']['slug'] = $slug;
        $params['bind']['lang'] = ModelLanguage::getCurrentLanguage();

        $page = self::findFirst($params);

        if($page)
        {
            return $page;
        }

        return null;
    }

    public function getWidgetsSortByPlaceAndPosition()
    {
        return $this->getWidgets([
            'order' => 'position, place'
        ]);
    }

    public function getWidgetsByPlace($place)
    {
        return $this->getWidgets([
            'conditions' => 'place=:place:',
            'order' => 'position, place',
            'bind' => [
                $place
            ]
        ]);
    }
}