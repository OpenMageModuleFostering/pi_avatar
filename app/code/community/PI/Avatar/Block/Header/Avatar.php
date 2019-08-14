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




/*
 * display avatar in magento header
 */

class PI_Avatar_Block_Header_Avatar extends Mage_Core_Block_Template {
    
    protected  $_avatar = null;
    
    const DEFAULT_WIDTH = 75;
    
    const DEFAULT_HEIGHT = 75;
    

    public function __construct() {
        parent::__construct();
        $customer = $this->getCustomerFromSession();
        if($customer){
            $customerObj = Mage::getModel('customer/customer')->load($customer->getId());
            if($avatar = $customerObj->getPiAvatar()){
                $this->_avatar = $avatar; 
            }else{
                $this->_avatar = null;     
            }
        }
        
    }
    
    protected function getCustomerFromSession(){
        return Mage::getSingleton('customer/session')->getCustomer();
    }
    
    protected function getWidth(){
        $configWidth = (int)Mage::getStoreConfig(
                          'customer/avatar_group/avatar_field_width',
                          Mage::app()->getStore()
                        );
        
        if($configWidth > 0){
            $width = $configWidth;
        }else{
            $width = self::DEFAULT_WIDTH;
        }
        
        return $width;
    }
    
    protected function getHeight(){
        $configHeight = (int)Mage::getStoreConfig(
                           'customer/avatar_group/avatar_field_height',
                           Mage::app()->getStore()
                        );
        
        if($configHeight > 0){
            $height = $configHeight;
        }else{
            $height = self::DEFAULT_HEIGHT;
        }
        
        return $height;
    }
    
    public function getAvatar(){
        return $this->_avatar;
    }
    public function getAvatarPath(){
        /*if($file = $this->getAvatar()){
            $path = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) 
                    . 'customer' 
                    . $file;
            return $path; 
        }*/

        return $this->getUrl('avatar/customer/viewAvatar');
    }
    
    public function getAvatarHtml(){
        /**$html = "<img src='"
                .$this->getAvatarPath().
                "' width ='".$this->getWidth()
                ."' height='".$this->getHeight()
                ."'/>";**/
		$html = "<img src='"
                .$this->getAvatarPath().
                "' width ='35' height='35'/>";
        return $html; 
    }
    
    public function getUploadUrl(){
        return Mage::getUrl('*/customer/upload');
    }
}
