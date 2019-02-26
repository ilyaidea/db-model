<?php
namespace Lib\Mvc\Model\Pages;


use Lib\Validation;
use Modules\System\Native\Models\Language;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\Numericality;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Uniqueness;

trait TModelPagesValidation
{
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'title',
            new PresenceOf([
                'message' => 'this :field is required'
            ])
        );

//        $validator->add(
//            'title',
//            new Uniqueness([
//                'model' => new ModelPages(),
//                'message' => 'title must be unique'
//            ])
//        );

        // Language
        $validator->add(
            'language',
            new InclusionIn([
                'domain' => array_column(Language\ModelLanguage::findCachedLanguages(), 'iso'),
                'message' => 'language is not in domain'
            ])
        );

//        dump(self::findAllParentsByLang($this->getLanguage()));
        // parent id
        $validator->add(
            'parent_id',
            new InclusionIn([
                'domain' => self::findAllParentsByLang($this->getLanguage()),
                'message' => 'parent id is not in domain',
                'allowEmpty' => true
            ])
        );

        // Position
        $validator->add(
            'position',
            new Numericality([
                'message' => 'the :field must be numeric',
                'allowEmpty' => true
            ])
        );

        return $this->validate($validator);
    }
}