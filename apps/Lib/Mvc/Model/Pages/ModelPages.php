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

    /**
     * return array of titles whose parent and language are equal
     * we use it for title exclusionIn validation
     * @example
     *  inputted language : 'fa'
     *  inputted parent_id : 1
     *      array(
     *               [0] => fa_title_1_1
                     [1] => fa_title_1_2
                     [2] => fa_title_1_3
     *          )
     * @param string $field
     * @return array
     */
    public function queryForTitleUniqueness($field)
    {
        $parentId = $this->getParentId();

        $language = $this->getLanguageIso();

        $result = $this->getModelsManager()->createBuilder()
            ->from(self::class);

        if ($parentId  && method_exists($this,'getParentId') )
        {
            $result->where(' parent_id = :parentId:',
                ['parentId'=>$parentId]);
        }
        else
        {
            $result->where(' parent_id IS NULL');

        }
        if ($language && method_exists($this,'getLanguageIso'))
        {
            $result->andWhere('language_iso = :lang:',[ 'lang'=> $language ]);
        }

        $result = $result->getQuery()->execute();

        return array_column($result->toArray(),$field);
    }

}