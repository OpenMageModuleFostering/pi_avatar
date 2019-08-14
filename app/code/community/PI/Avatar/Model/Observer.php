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
class PI_Avatar_Model_Observer extends Varien_Object{
    
    public function saveCustomerAvatar($observer){
        $fileName = null;
        $customer = $observer->getEvent()->getCustomer();
        if(isset($_FILES['avatar-file'])){
            $avatarFile = $_FILES['avatar-file'];
            $avatar = Mage::getModel('avatar/avatar');
            $avatar->setAvatarFileData($avatarFile);
            try{
                $fileName = $avatar->saveAvatarFile();
                $customer->setData(PI_Avatar_Model_Config::AVATAR_ATTR_CODE, $fileName);
            }catch(Exception $e){
                Mage::logException($e);
            }
        }    
        
        return $this;
    }   
    
}