<?php

namespace Ad\Backend\Models\Users ;

use Phalcon\Mvc\Model ;

class ModelUsers extends Model
{
    use TModelUsersProperties;
    use TModelUsersRelations;
    use TModelUsersValidations;
    use TModelUsersEvents;

    public function initialize()
    {
        $this->setSource('ilya_ad_users');

    }


}