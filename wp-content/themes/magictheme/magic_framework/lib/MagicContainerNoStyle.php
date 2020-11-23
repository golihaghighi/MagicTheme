<?php

/** 
 * A class that initializes Magic Container without css classes
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicContainerNoStyle implements iMagicLayoutNode, iMagicRender {

	public $children;

	public $name;

	public $hidden_property;

	public $hidden_value;

	public $hidden_values;

	/**
	 * @param string $name
	 * @param string $hidden_property
	 * @param string $hidden_value
	 * @param array $hidden_values
	 */
	public function __construct( $name = "", $hidden_property = "", $hidden_value = "", $hidden_values = array() ) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChildren() {
		return ( count( $this->children ) > 0 ) ? true : false;
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
			else {
				foreach ( $this->hidden_values as $value ) {
					if ( magic_option_get_value( $this->hidden_property ) == $value )
						$hidden = true;
				}
			}
		}
		?>
<div id="magicf_<?php echo esc_attr($this->name); ?>"
	<?php if ($hidden) { ?> style="display: none" <?php } ?>>
            <?php
		foreach ( $this->children as $child ) {
			$this->renderChild( $child, $factory );
		}
		?>
        </div>
<?php
	}

	public function renderChild( iMagicRender $child, $factory ) {
		$child->render( $factory );
	}
}

