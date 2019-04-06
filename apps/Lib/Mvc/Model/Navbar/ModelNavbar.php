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


}