<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\UpgradeFTPUser;

# Input field base
use WCFE\Modules\Editor\View\Editor\Fields\InputField;

/**
* 
*/
class Field extends InputField {

	/**
	* put your comment there...
	* 
	*/
	public function getText() {
		return $this->__( 'User' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->__( 'either user FTP or SSH username. Most likely these are the same, but use the appropriate one for the type of update you wish to do.' );
	}

}
