<?php

namespace Lib\Mvc\Model\Translate;


use Lib\Mvc\Model\BaseModel;

class  ModelTranslate extends BaseModel
{
    use TModelTranslateProperties;
    use TModelTranslateEvents;
    use TModelTranslateValidations;
    use TModelTranslateRelations;

    public function init()
    {
        $this->setSource('ilya_translate');
    }
    public static function findCachedByLang($lang = null)
    {
        $translates = self::translates();
        return $translates[$lang];
    }
    public static function translates()
    {
        return CmsCache::getInstance()->get('translates');
    }

    public function findByPhraseAndLang($phrase, $lang = null)
    {
        if (!$lang)
        {
            $lang = $this->helper->locale()->getLanguage();
        }
        $result = self::findFirst([
            'phrase = :phrase: AND language = :lang:',
            'bind' => [
                'phrase' => $phrase,
                'lang'   => $lang,
            ]
        ]);
        return $result;
    }

    /**
     * insert inputted array (that include the differences between Db & Cache) to Translate Database
     * @param array $array
     */
    public static function insertArrayToDatabase(array $array )
    {
    //dump($array);
        foreach ($array as $lang => $diffs)
        {
            $language = ModelLanguage::findFirstByIso($lang);
            if ($language)
            {
                foreach ($diffs as $phrase => $translate)
                {
                    $allLanguages = ModelLanguage::find(['columns' => 'iso']);
                    foreach ($allLanguages as $selectedLanguage)
                    {
                        $modelTranslate = ModelTranslate::findFirst([
                            'conditions' => 'phrase = :phrase: AND language = :lang:',
                            'bind' => [
                                'phrase' => $phrase ,
                                'lang'   => $lang
                            ]
                        ]);

                        if (!$modelTranslate)
                        {
                            $modelTranslate = new ModelTranslate();
                        }


                            if ($selectedLanguage->iso == $lang)
                            {
                                $modelTranslate->setTranslation($translate);
                                $modelTranslate->setLanguage($lang);
                                $modelTranslate->setPhrase($phrase);
                                /** @var ModelTranslate $modelTranslate */
                                if (!$modelTranslate->save())
                                {
                                    dump($modelTranslate->getMessages());
                                }

                            }

                            else
                            {

                                $a = ModelTranslate::findFirst([
                                    'conditions' => 'language = :lang: AND phrase = :phrase:',
                                    'bind' => [
                                        'lang'   => $selectedLanguage->iso,
                                        'phrase' => $phrase
                                    ]
                                ]);
                                if (!$a)
                                {
                                    $modelTranslate->setLanguage($selectedLanguage->iso);
                                    $modelTranslate->setPhrase($phrase);
                                    /** @var ModelTranslate $modelTranslate */
                                    if (!$modelTranslate->save())
                                    {
                                        dump($modelTranslate->getMessages());
                                    }
                                }
                           }
                    }
                }
            }
        }
    }
}