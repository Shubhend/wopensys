<?php
/**
* 
*/

# Define namespace
namespace WCFE\Modules\Editor\View\Editor\Templates\Fields\MaxMemoryLimit;

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
		return $this->__( 'Max Memory limit' );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getTipText() {
		return $this->__( 'When in the administration area, the memory can be increased or decreased from the Memory Limit by defining Max Memory Limit.' );
	}

}
