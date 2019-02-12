<?php
/**
 * Created by PhpStorm.
 * User: Webhouse
 * Date: 2/5/2019
 * Time: 12:42 PM
 */

namespace Ad\Backend\Forms\Ad ;

use Ad\Backend\Models\Category\CategoryModel;
use Ad\Backend\Models\Users\UsersModel;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class AdForm extends \Phalcon\Forms\Form
{
    public function initialize($entity = null, $options = null)
    {
        $this->addUserId();
        $this->addCategoryId();
        $this->addSubmit();
        $this->addCsrf();

    }
    private function addUserId()
    {
       $user_id =  new Select(
           'user_id',
           array_column(UsersModel::find()->toArray(),'name',"id"));

       $user_id->setLabel('press user id');
       $user_id->setAttributes([
             'style' => "color:red"
       ]);
//       $user_id->setUserOption( 'note' , 'For example:');
       $user_id->addValidator(
           new PresenceOf([
               'message' => ' required'
           ])
       );
        $this->add($user_id);

    }
    private function addCategoryId()
    {
        $category_id =  new Select(
            'category_id',
            array_column(CategoryModel::find()->toArray(),'title','id')

        );
        $category_id->setLabel('select category');
        $this->add($category_id);
    }
    private function addSubmit()
    {
        $submit = new Submit('save');
        $this->add($submit);
    }
    private function addCsrf()
    {
        $csrf = new Hidden('csrf', [
            'value' => $this->security->getToken()
        ]);

        $csrf->clear();
        $this->add($csrf);
    }
}