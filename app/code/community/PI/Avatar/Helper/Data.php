<?php

/**
 * PI Avatar Module.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Team
 * that is bundled with this package of PI Infomatix Pvt. Ltd.
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * PI Support does not guarantee correct work of this package
 * on any other Magento edition except Magento COMMUNITY edition.
 * =================================================================
 */
class PI_Avatar_Helper_Data extends Mage_Core_Helper_Abstract {

    const XML_PATH_UPLOAD_WIDGET_ENABLED = 'customer/avatar_widget/enabled';


    public function _getAvatar(){
        return Mage::getSingleton('avatar/avatar');
    }
    
    public function isShowUploadWidget(){
        return Mage::app()->getStore()->getConfig(self::XML_PATH_UPLOAD_WIDGET_ENABLED);
    }
}

?>
