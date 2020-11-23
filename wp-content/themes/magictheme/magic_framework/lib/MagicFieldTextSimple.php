<?php

/** 
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicFieldTextSimple extends MagicFieldType {

	/**
	 *(non-PHPdoc) 
	 * @see MagicFieldType::render()
	 */
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		
		
		if (!empty($repeat) && array_key_exists('name', $repeat) && array_key_exists('index', $repeat)) {
			$id		= $name . '-' . $repeat['index'];
			$name	= $repeat['name'] . '['.$repeat['index'].']['. $name .']';
			$value	= $repeat['value'];
		} else {
			$id = $name;
			$value = magic_option_get_value($name);
		}
		
		?>


        <div class="col-lg-3" id="qodef_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="magicf-field-description"><?php echo esc_attr($label); ?></em>
            <input type="text"
                   class="form-control magicf-input magicf-form-element"
                   name="<?php echo esc_attr($name); ?>" value="<?php echo htmlspecialchars($value); ?>"/></div>
        <?php

    }
}

