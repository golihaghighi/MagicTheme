<?php

/** 
 * @author Afshin
 * @package MagicFramework
 * @version 1.0
 */
abstract class MagicFieldType {

	abstract public function render( $name, $label="",$description="", $options = array(), $args = array(), $hidden = false );
}

