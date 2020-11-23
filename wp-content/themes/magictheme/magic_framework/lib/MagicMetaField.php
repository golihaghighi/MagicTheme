<?php


/** 
 * A class that initializes Magic Meta Field
 * @author Afshin
 * @package MagicFramework
 * @version 1.0
 */
class MagicMetaField implements iMagicRender{

	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();

	
	/**
	 * @param $type
	 * @param $name
	 * @param string $default_value
	 * @param string $label
	 * @param string $description
	 * @param array $options
	 * @param array $args
	 * @param string $hidden_property
	 * @param array $hidden_values
	 */
	public function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {

		global $magic_framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$magic_framework->magicMetaBoxes->addOption($this->name,$this->default_value, $type);
	}
	public function render( $factory ) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (magic_option_get_value($this->hidden_property)==$value)
					$hidden = true;
					
			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}

}

