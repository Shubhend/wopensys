<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\Model\ConfigFile\Fields;

/**
* 
*/
class AuthSalt extends Constant {

	/**
	* put your comment there...
	* 	
	* @var mixed
	*/
	protected $name = 'AUTH_SALT';

	/**
	* put your comment there...
	* 
	*/
	protected function getType() {
		return new Types\StringType();
	}

}

