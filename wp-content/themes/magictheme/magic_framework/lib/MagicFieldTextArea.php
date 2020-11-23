<?php

/** 
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicFieldTextArea extends MagicFieldType {

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
							<textarea class="form-control magicf-form-element"
                                      name="<?php echo esc_attr($name); ?>"
                                      rows="5"><?php echo htmlspecialchars($value); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.magicf-section-content -->

        </div>
        <?php

    }
	
}

