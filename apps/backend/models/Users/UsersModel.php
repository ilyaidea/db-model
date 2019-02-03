<?php

namespace Ad\Backend\Models\Users ;

use Phalcon\Mvc\Model ;

class UsersModel extends Model
{
    use TUsersModelProperties;

    public function initialize()
    {
        $this->setSource('ilya_ad_users');

    }


}