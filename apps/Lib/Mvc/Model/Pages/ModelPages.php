<?php
namespace Lib\Mvc\Model\Pages;

use Lib\Mvc\Model\BaseModel;

class ModelPages extends BaseModel
{
    use TModelPagesProperties;
    use TModelPagesRelations;
    use TModelPagesValidation;
    use TModelPagesEvents;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Initialize Method
     */

    public function init()
    {
        $this->setSource('ilya_pages');
    }

    public static function findAllParentsByLang($lang = null)
    {
        if(!$lang)
        {
            return [];
        }

        $findAllParentsByLang = self::find([
            'conditions' => 'language_iso = :lang:',
            'bind' => [
                'lang' => $lang
            ]
        ])->toArray();

        return array_column($findAllParentsByLang, 'id');
    }

}