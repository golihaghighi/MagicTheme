<?php


/** 
 * A class that initializes Magic Row
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicRow implements iMagicLayoutNode, iMagicRender{

	public $children;
	public $next;

	/**
	 * 
	 */
	public function __construct($next=false) {

		$this->children = array();
		$this->next = $next;
	}
	public function hasChildren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild( $key ) {
		return $this->children[$key];
	}

	public function addChild( $key, $value ) {
		$this->children[$key] = $value;
	}

	public function render( $factory ) {
		?>
        <div class="row<?php if ($this->next) echo " next-row"; ?>">
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
	}
	public function renderChild(iMagicRender $child, $factory) {
		$child->render($factory);
	}

}

