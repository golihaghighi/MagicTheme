<?php

/** 
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicFieldTextAreaHtml extends MagicFieldType {

	/**
	 *(non-PHPdoc) 
	 * @see MagicFieldType::render()
	 */
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		
		if (!empty($repeat) && array_key_exists('name', $repeat) && array_key_exists('index', $repeat)) {
			$id		= $name . '-' . $repeat['index'];
			
			//if textareahtml already exists it will have index as number, if created in repeater it will be a string because of the tinymce rules
			if (is_int($repeat['index'])) {
				$field_id	= $repeat['name'] . '_textarea_index_'.$repeat['index'].'_'. $name;
			} else {
				$field_id	= $repeat['name'] . '_textarea_index_'. $name;
			}
			$name	= $repeat['name'] . '['.$repeat['index'].']['. $name .']';
			$value	= $repeat['value'];
		} else {
			$id = $field_id = $name;
			$value = magic_option_get_value($name);
		}
		
		?>
        <div class="magicf-page-form-section">


            <div class="magicf-field-desc">
                <h4><?php echo esc_attr($label); ?></h4>

                <p><?php echo esc_attr($description); ?></p>
            </div>
            <!-- close div.magicf-field-desc -->
            <div class="magicf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php wp_editor( $value, $field_id, array('textarea_name' => $name, 'height' => '200'));?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.magicf-section-content -->

        </div>

        <?php

    }
}

