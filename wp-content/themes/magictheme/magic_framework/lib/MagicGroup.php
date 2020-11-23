<?php


/** 
 * A class that initializes Magic Group
 * @author Afshin
 * @version 1.0
 * @package MagicFramework
 */
class MagicGroup implements iMagicLayoutNode, iMagicRender{

	public $children;
	public $title;
	public $description;

	
	/**
	 * @param string $title_group
	 * @param string $description
	 */
	public function __construct($title_group="",$description="") {

		$this->children = array();
		$this->title = $title_group;
		$this->description = $description;
	}

	
	public function hasChildren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild( $key ) {
		return $this->children[$key];
	}

	public function addChild( $key, $value ) {
		$this->children[$key] = $value;
	}

	public function render( $factory ) {
		?>

        <div class="magicf-page-form-section">


            <div class="magicf-field-desc">
                <h4><?php echo esc_attr($this->title); ?></h4>

                <p><?php echo esc_attr($this->description); ?></p>
            </div>
            <!-- close div.magicf-field-desc -->

            <div class="magicf-section-content">
                <div class="container-fluid">
                    <?php
                    foreach ($this->children as $child) {
                        $this->renderChild($child, $factory);
                    }
                    ?>
                </div>
            </div>
            <!-- close div.magicf-section-content -->

        </div>
        <?php
	}
	public function renderChild(iMagicRender $child, $factory) {
		$child->render($factory);
	}
}

