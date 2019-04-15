<?php
namespace Lib\Mvc\Model\Pages;

use Lib\Mvc\Model\BaseModel;

class ModelPages extends BaseModel
{
    use TModelPagesProperties;
    use TModelPagesRelations;
    use TModelPagesValidations;
    use TModelPagesEvents;


    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Initialize Method
     */

    public function init()
    {
        $this->setSource('ilya_pages');
    }

    /**
     * find all records whose language is equal to the inputted language and get a array of ids
     * we use it for parent_id validation
     * @example
     *
     *  findAllParentsByLang('en')
     *
     *  Array(
                 [0] => 1
                 [1] => 32
                 [2] => 33

             )
     *
     * @param null $language
     * @return array
     */
    public static function findAllParentsByLang($language = null)
    {
        if(!$language)
        {
            return [];
        }

        $findAllParentsByLang = self::find([
            'conditions' => 'language_iso = :lang:',
            'bind' => [
                'lang' => $language
            ]
        ])->toArray();

        return array_column($findAllParentsByLang, 'id');
    }

}