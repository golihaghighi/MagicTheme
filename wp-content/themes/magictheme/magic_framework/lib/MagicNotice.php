<?php

/** 
 * A class that initializes Magic Notice
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicNotice implements iMagicRender {

	public $children;

	public $title;

	public $description;

	public $notice;

	public $hidden_property;

	public $hidden_value;

	public $hidden_values;

	/**
	 * @param string $title_notice
	 * @param string $description
	 * @param string $notice
	 * @param string $hidden_property
	 * @param string $hidden_value
	 * @param array $hidden_values
	 */
	public function __construct( 
		$title_notice = "",
		$description = "",
		$notice = "",
		$hidden_property = "",
		$hidden_value = "",
		$hidden_values = array() ) {
		$this->children = array();
		$this->title = $title_notice;
		$this->description = $description;
		$this->notice = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
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

<div class="magicf-page-form-section" <?php if ($hidden) { ?>
	style="display: none" <?php } ?>>


	<div class="magicf-field-desc">
		<h4><?php echo esc_attr($this->title); ?></h4>

		<p><?php echo esc_attr($this->description); ?></p>
	</div>
	<!-- close div.magicf-field-desc -->

	<div class="magicf-section-content">
		<div class="container-fluid">
			<div class="alert alert-warning">
                        <?php echo esc_attr($this->notice); ?>
                    </div>
		</div>
	</div>
	<!-- close div.magicf-section-content -->

</div>
<?php
	}
}



