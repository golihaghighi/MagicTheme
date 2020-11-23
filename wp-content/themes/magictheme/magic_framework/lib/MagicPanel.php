<?php

/** 
 * A class that initializes Magic Panel
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicPanel implements iMagicLayoutNode, iMagicRender {

	public $children;

	public $title;

	public $name;

	public $hidden_property;

	public $hidden_value;

	/**
	 * @param string $title_panel
	 * @param string $name
	 * @param string $hidden_property
	 * @param string $hidden_value
	 */
	function __construct( $title_panel = "", $name = "", $hidden_property = "", $hidden_value = "" ) {
		$this->children = array();
		$this->title = $title_panel;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
	}

	public function getChild( $key ) {
		return $this->children[$key];
	}

	public function addChild( $key, $value ) {
		$this->children[$key] = $value;
	}

	public function render( $factory ) {
		$hidden = false;
		if ( ! empty( $this->hidden_property ) ) {
			if ( magic_option_get_value( $this->hidden_property ) == $this->hidden_value )
				$hidden = true;
		}
		?>
<div class="magicf-page-form-section-holder"
	id="magicf_<?php echo esc_attr($this->name); ?>" <?php if ($hidden) { ?>
	style="display: none" <?php } ?>>
	<h3 class="magicf-page-section-title"><?php echo esc_attr($this->title); ?></h3>
            <?php
		foreach ( $this->children as $child ) {
			$this->renderChild( $child, $factory );
		}
		?>
        </div>
<?php
	}

	public function hasChildren() {
		return ( count( $this->children ) > 0 ) ? true : false;
	}

	public function renderChild( iMagicRender $child, $factory ) {
		$child->render( $factory );
	}
}

