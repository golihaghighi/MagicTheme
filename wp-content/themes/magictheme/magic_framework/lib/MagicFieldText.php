<?php

/** 
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicFieldText extends MagicFieldType {

	/**
	 *(non-PHPdoc) 
	 * @see MagicFieldType::render()
	 */
	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$col_width = 12;
		$class = '';
		$data_string = '';
		
		if (!empty($repeat) && array_key_exists('name', $repeat) && array_key_exists('index', $repeat)) {
			$id		= $name . '-' . $repeat['index'];
			$name	= $repeat['name'] . '['.$repeat['index'].']['. $name .']';
			$value	= $repeat['value'];
		} else {
			$id = $name;
			$value = magic_option_get_value($name);
		}
		
		if(isset($args["col_width"])) {
			$col_width = $args["col_width"];
		}
		
		if($label === '' && $description === '') {
			$class .= ' magicf-no-description';
		}
		
		if(isset($args['custom_class']) && $args['custom_class'] != '') {
			$class .= ' '  . $args['custom_class'];
		}
		
		if(isset($args['input-data']) && $args['input-data'] != '') {
			foreach($args['input-data'] as $data_key => $data_value) {
				$data_string .= $data_key . '=' . $data_value;
				$data_string .= ' ';
			}
		}
		
		?>

        <div class="magicf-page-form-section <?php echo esc_attr($class); ?>" id="magicf_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="magicf-field-desc">
                <h4><?php echo esc_attr($label); ?></h4>

                <p><?php echo esc_attr($description); ?></p>
            </div>
            <!-- close div.magicf-field-desc -->

            <div class="magicf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <input type="text"
                                <?php echo esc_attr($data_string); ?>
                                   class="form-control magicf-input magicf-form-element"
                                   name="<?php echo esc_attr($name); ?>" value="<?php echo htmlspecialchars($value); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.magicf-section-content -->

        </div>
        <?php
	}
}

