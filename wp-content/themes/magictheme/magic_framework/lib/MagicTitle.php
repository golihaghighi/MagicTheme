<?php


/** 
 * A class that initializes Magic Title
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicTitle implements iMagicRender{

	private $name;
	private $title;
	public $hidden_property;
	public $hidden_values = array();

	
	/**
	 * @param string $name
	 * @param string $title_class
	 * @param string $hidden_property
	 * @param string $hidden_value
	 */
	public function __construct($name="",$title_class="",$hidden_property="",$hidden_value="") {

		$this->title = $title_class;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
	}
	public function render( $factory ) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (magic_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
		}
		?>
        <h5 class="magicf-page-section-subtitle" id="magicf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
        <?php
	}

}

