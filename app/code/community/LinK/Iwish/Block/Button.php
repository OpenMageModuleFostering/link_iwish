<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sgdesmet
 * Date: 06/12/12
 * Time: 17:16
 * To change this template use File | Settings | File Templates.
 */

class Link_Iwish_Block_Button extends Mage_Core_Block_Template
{

    /**
     * Constructor. Set template.
     */
    protected function _construct()
    {
        parent::_construct();
        Mage::log('Constructed');
        $this->setTemplate('iwish/button.phtml');
    }

    protected function _toHtml()
    {
        if (Mage::getStoreConfig('iwish_options/config/enabled'))
            return parent::_toHtml();
        else
            return;
    }


}

?>