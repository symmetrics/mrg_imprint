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
 * @copyright 2010 symmetrics gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
 
/**
 * This class is solely for the purpose of backwards compatibility
 * you shouldn't rely on it as it is deprecated and will be removed in the future
 *
 * @category  Symmetrics
 * @package   Symmetrics_Imprint
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Sergej Braznikov <sb@symmetrics.de>
 * @copyright 2010 symmetrics gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */
class Symmetrics_Imprint_Block_Deprecated_Impressum extends Symmetrics_Imprint_Block_Abstract
{
    /**
     * @const path to content block templates
     */
    const IMPRINT_TEMPLATE_PATH = 'symmetrics/imprint/';
    
    /**
     * @var array $_fieldMap Translation map for old to new fields
     */
    protected $_fieldMap = array(
        'shopname' => 'shop_name',
        'company1' => 'company_first',
        'company2' => 'company_second',
        'taxnumber' => 'tax_number',
        'vatid' => 'vat_id',
        'taxoffice' => 'financial_office',
        'hrb' => 'register_number',
        'legal' => 'business_rules',
        'bankaccountowner' => 'bank_account_owner',
        'bankaccount' => 'bank_account',
        'bankcodenumber' => 'bank_code_number',
        'bankname' => 'bank_name'
    );
    
    /**
     * @var array $_contentMap Translation map for old to new content blocks
     */
    protected $_contentMap = array(
        'address' => 'address',
        'bank' => 'bank',
        'communication' => 'communication',
        'legal' => 'legal',
        'tax' => 'tax',
        'emailfooter' => 'email/footer'
    );

    /**
     * Convert old to new identifiers
     *
     * @param string $map       mapname for conversion
     * @param string $name      identifier to convert
     * @param bool   $checkOnly check only if entry exists for translation
     *
     * @return string|bool
     */
    protected function _convertIdentifier($map, $name, $checkOnly=false)
    {
        $map = '_' . $map . 'Map';
        $map = $this->$map;
        if (array_key_exists($name, $map)) {
            if ($checkOnly) {
                
                return true;
            }
            
            return $map[$name];
        }
        
        if ($checkOnly) {
            
            return false;
        }
        
        return $name;
    }
    
    /**
     * Convert old to new field names
     *
     * @param string $name field name to convert
     *
     * @return string
     */
    protected function _convertFieldName($name)
    {
        return $this->_convertIdentifier('field', $name);
    }
    
    /**
     * Convert old to new content names
     *
     * @param string $name content block name to convert
     *
     * @return string
     */
    protected function _convertContentName($name)
    {
        return $this->_convertIdentifier('content', $name);
    }
        
    /**
     * Check wether $fieldName is a content block or a field
     *
     * @param string $name cotnent block name to check
     *
     * @return bool
     */
    protected function _isContent($name)
    {
        return $this->_convertIdentifier('content', $name, true);
    }
    
    /**
     * Create Block, load template, render it and return it as string
     *
     * @param string $name template name to render
     *
     * @return string
     */
    protected function _renderTemplateAsString($name)
    {
        return $this->getLayout()
            ->createBlock('imprint/content')
            ->setTemplate(self::IMPRINT_TEMPLATE_PATH . $name . '.phtml')
            ->toHtml();
    }
    
    /**
     * Render imprint field or block
     *
     * @return string
     */
    protected function _toHtml() 
    {
        $value = $this->getValue();
        
        if ($this->_isContent($value)) {
            
            return $this->_renderTemplateAsString($this->_convertContentName($value));
        } else {
            
            return $this->getData($this->_convertFieldName($value));
        }
    }
}