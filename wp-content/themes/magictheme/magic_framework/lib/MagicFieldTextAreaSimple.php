<?php

/** 
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicFieldTextAreaSimple extends MagicFieldType {

	/**
	 *(non-PHPdoc) 
	 * @see MagicFieldType::render()
	 */
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		
		if (!empty($repeat) && array_key_exists('name', $repeat) && array_key_exists('index', $repeat)) {
			$name	= $repeat['name'] . '['.$repeat['index'].']['. $name .']';
			$value	= $repeat['value'];
		} else {
			$value = magic_option_get_value($name);
		}
		
		?>

        <div class="col-lg-3">
            <em class="magicf-field-description"><?php echo esc_html($label); ?></em>
            <textarea class="form-control magicf-form-element"
                      name="<?php echo esc_attr($name); ?>"
                      rows="5"><?php echo esc_attr($value); ?></textarea>
        </div>
        <?php

    }
}

