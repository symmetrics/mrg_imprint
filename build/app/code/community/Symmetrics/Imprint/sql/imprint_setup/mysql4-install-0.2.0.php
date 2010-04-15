<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Symmetrics
 * @package   Symmetrics_Imprint
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Sergej Braznikov <sb@symmetrics.de>
 * @author    Siegfried Schmitz <ss@symmetrics.de>
 * @copyright 2010 symmetrics gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
 
$installer = $this;
$installer->startSetup();

$prefixNew = 'general/imprint/';
$prefixOld = 'general/impressum/';
    
$configMap = array (
    'shop_name' => 'shopname',
    'company_first' => 'company1',
    'company_second' => 'company2',
    'street' => 'street',
    'zip' => 'zip',
    'city' => 'city',
    'telephone' => 'telephone',
    'fax' => 'fax',
    'email' => 'email',
    'web' => 'web',
    'tax_number' => 'taxnumber',
    'vat_id' => 'vatid',
    'court' => 'court',
    'financial_office' => 'taxoffice',
    'ceo' => 'ceo',
    'register_number' => 'hrb',
    'bank_account' => 'bankaccount',
    'bank_code_number' => 'bankcodenumber',
    'bank_account_owner' => 'bankaccountowner',
    'bank_name' => 'bankname',
    'swift' => 'swift',
    'iban' => 'iban',
    'business_rules' => 'rechtlicheregelungen'
);

foreach ($configMap as $oldPath => $newPath) {
    if ($value = Mage::getStoreConfig($prefixOld . $oldPath)) {
        Mage::setStoreConfig($prefixNew . $newPath, $value);
    }
}


$installer->endSetup();