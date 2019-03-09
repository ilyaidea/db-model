<?php

namespace Lib\Mvc\Model\Translate;


trait TModelTranslateEvents
{
    public function afterSave()
    {
         CmsCache::getInstance()->save('translates', self::buildCmsTranslatesCache());

    }
    public function afterDelete()
    {
        CmsCache::getInstance()->save('translates', self::buildCmsTranslatesCache());
    }

    public static function buildCmsTranslatesCache()
    {
        $save = [];
        $languages = ModelLanguage::find();
        /** @var ModelLanguage $lang */
        foreach($languages as $lang) {
            $save[$lang->getIso()] = [""=>""];
        }

        $entries = ModelTranslate::find();
        /** @var ModelTranslate $el */
        foreach ($entries as $el) {
            $save[$el->getLanguage()][$el->getPhrase()] = $el->getTranslation();
        }
        return $save;
    }

}