<?php

namespace Lib\Mvc\Model\Navbar;

use Lib\Mvc\Model\BaseModel;

class ModelNavbar extends BaseModel
{
    use TModelNavbarProperties;
    use TModelNavbarValidations;
    use TModelNavbarEvents;
    use TModelNavbarRelations;

    public function init()
    {
        $this->setSource('ilya_navbar_component');
    }

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