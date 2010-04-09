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

/* @var $dbAdapter Varien_Db_Adapter_Pdo_Mysql */
$dbAdapter = $installer->getConnection();
/* @var $select Varien_Db_Adapter_Pdo_Mysql */
$select = $dbAdapter->select();
$select->from('core_email_template');

// Fetches IDs of templates as an array
$templates = $dbAdapter->fetchCol($select);


$pattern = array(
    '{{block type="symmetrics_impressum/impressum" value="shopname"}}',
    '{{block type="symmetrics_impressum/impressum" value="email"}}',
    '{{block type="symmetrics_impressum/impressum" value="emailfooter"}}'
);

$replace = array(
    '{{block type="imprint/field" value="shop_name"}}',
    '{{block type="imprint/field" value="email"}}',
    '{{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}'
);

// $patternShopname = '{{block type="symmetrics_impressum/impressum" value="shopname"}}';
// $replaceShopname = '{{block type="imprint/field" value="shop_name"}}';
// 
// $patternEmail = '{{block type="symmetrics_impressum/impressum" value="email"}}';
// $replaceEmail = '{{block type="imprint/field" value="email"}}';
// 
// $patternFooter = '{{block type="symmetrics_impressum/impressum" value="emailfooter"}}';
// $replaceFooter = '{{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}';

// replaces old symmetrics_impressum calls by new imprint calls in subject and content
foreach ($templates as $templateId) {
    $templateId = intval($templateId);
    $template = Mage::getModel('core/email_template')->load($templateId);
    $templateText = $template->getTemplateText();
    $templateSubject = $template->getTemplateSubject();
    
    $templateSubject = str_replace($pattern, $replace, $templateSubject);
    $templateText = str_replace($pattern, $replace, $templateText);
    
    // $templateSubject = str_replace($patternShopname, $replaceShopname, $templateSubject);
    // $templateSubject = str_replace($patternEmail, $replaceEmail, $templateSubject);
    // $templateSubject = str_replace($patternFooter, $replaceFooter, $templateSubject);
    // 
    // $templateText = str_replace($patternShopname, $replaceShopname, $templateText);
    // $templateText = str_replace($patternEmail, $replaceEmail, $templateText);
    // $templateText = str_replace($patternFooter, $replaceFooter, $templateText);

    $template->setTemplateSubject($templateSubject)
             ->setTemplateText($templateText)
             ->setModifiedAt(new Zend_Db_Expr('NOW()'))
             ->save();
}
$installer->endSetup();