<?php

/** 
 * A interface that implements Layout Node methods
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
interface iMagicLayoutNode {


	public function hasChildren();

	public function getChild( $key );

	public function addChild( $key, $value );
}

