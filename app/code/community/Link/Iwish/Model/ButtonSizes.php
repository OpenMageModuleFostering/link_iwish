<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sgdesmet
 * Date: 10/12/12
 * Time: 16:36
 * To change this template use File | Settings | File Templates.
 */

class Link_Iwish_Model_ButtonSizes
{
    public function toOptionArray()
    {
        return array(
            array('value'=>24, 'label'=>Mage::helper('iwish')->__('Small (24px)')),
            array('value'=>50, 'label'=>Mage::helper('iwish')->__('Big (50px)')),
        );
    }
}

?>