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
class PI_Avatar_Model_Avatar extends Mage_Core_Model_Abstract{
    
    protected $_supportedExtensions = array('jpg', 'JPG', 'png', 'PNG', 'gif', 'GIF');
    protected $_file = null;

    public function getAvatarBasePath() {
        return Mage::getBaseDir('media') . DS . 'customer';
    }

    public function setAvatarFileData($fileData) {
        $this->_file = $fileData;
    }
    
    public function getAvatarFileData() {
        return $this->_file;
    }

    public function saveAvatarFile() {
        
        $uploadedFile = null;
        
        if ($fileData = $this->getAvatarFileData()) {
            
            $uploader = new Varien_File_Uploader($this->getAvatarFileData());
            
            $uploader->setFilesDispersion(true);
            $uploader->setFilenamesCaseSensitivity(false);
            $uploader->setAllowRenameFiles(true);
            $uploader->setAllowedExtensions($this->_supportedExtensions);
            
            $uploader->save($this->getAvatarBasePath(), $fileData['name']);
            $uploadedFile = $uploader->getUploadedFileName();
        }
        return $uploadedFile;
    }

}