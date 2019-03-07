<?php
namespace Lib;

class Validation extends \Phalcon\Validation
{
    public function __construct( array $validators = null )
    {
        parent::__construct( $validators );

        $this->_defaultMessages["MyUniqueness"] = "My Uniqueness messages";
    }
}