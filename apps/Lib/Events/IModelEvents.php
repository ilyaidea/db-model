<?php
/**
 * Summary File IModelEvents
 *
 * Description File IModelEvents
 *
 * @author Faeze Eshaghi
 * Date: 4/8/2019
 * Time: 1:48 AM
 * @version 1.0.0
 */
namespace Lib\Events;

interface IModelEvents
{
    public function afterCreate();
    public function afterSave();
    public function afterUpdate();
    public function afterValidation();
    public function afterValidationOnCreate();
    public function afterValidationOnUpdate();
    public function beforeCreate();
    public function beforeSave();
    public function beforeUpdate();
    public function beforeValidation();
    public function beforeValidationOnCreate();
    public function beforeValidationOnUpdate();
    public function onValidationFails();
    public function prepareSave();
}