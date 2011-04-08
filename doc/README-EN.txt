* DOCUMENTATION

** INSTALLATION
Extract content of this archive to the Magento directory.

** USAGE
The module expands the Magento backend to many fields,
that are important for display of the “Impressum” page. Fields, that are filled
in backend, can be read on all pages and static blocs in frontend.
Also the module delivers many helpful templates, that
simplify and preformat the display. The module is accessible in backend 
under System/Konfiguration/Allgemein/Impressum ( System/Configuration/General/Impressum)

** FUNCTIONALITY
*** A: Adds the following fields under  System/Konfiguration/Allgemein/Impressum (System/Configuration/General/Impressum) in backend:
       - Shop Name (shop_name)
       - Firma 1 (company_first)
       - Firma 2 (company_second)
       - Straße (street)
       - PLZ (zip)
       - Ort (city)
       - Telefon (telephone)
       - Fax (fax)
       - E-Mail (email)
       - Website (web)
       - Steuernummer (tax_number)
       - USt.Nr. (vat_id)
       - Zuständiges Gericht (court)
       - Zuständiges Finanzamt (financial_office)
       - Geschäftsführer / Vorstand (ceo)
       - HRB Nummer (register_number)
       - Verweis auf berufliche Regelungen (business_rules)
       - Kontoinhaber (bank_account_owner)
       - Kontonummer (bank_account)
       - BLZ (bank_code_number)
       - Kreditinstitut (bank_name)
       - SWIFT (swift)
       - IBAN (iban)
       Please fill in *all* the fields. These data are used
       for all testcases.
*** B: Predefined templates are delivered for display of
       impressum information in CMS pages and blocks
*** C: On a CMS page or in static block separate 
        impressum fields can be read with the following command:
       {{block type="imprint/field" value="[field_name]"}}
*** D: On a CMS page or in static block combined and predefined
       fields can be displayed as separate templates using the command:
       {{block type="imprint/content" template="[path/to/template.phtml]"}}
       The following templates are available:
       - address.phtml
       - bank.phtml
       - communication.phtml
       - email/footer.phtml
       - legal.phtml
       - tax.phtml
*** E: app/design/frontend/default/default/template/symmetrics/imprint/address.phtml
       Displays the full address of the company (company_first,
       company_second, street, zip, city)
*** F: app/design/frontend/default/default/template/symmetrics/imprint/bank.phtml
       Displays the account information (bank_account_owner, bank_account,
       bank_code_number, bank_name, swift, iban)
*** G: app/design/frontend/default/default/template/symmetrics/imprint/communication.phtml
       Displays all communication data (telephone, fax, web, email)
*** H: app/design/frontend/default/default/template/symmetrics/imprint/email/footer.phtml
       Displays the formatted footer for e-mails (shop_name, company_first,
       company_second, street, zip, city, telephone, fax, web, email). The fields 
       from "tax", "legal", "bank" must also be shown.
*** I: app/design/frontend/default/default/template/symmetrics/imprint/legal.phtml
       Displays legal information about the shop owner (ceo, court,
       register_number, business_rules)
*** J: app/design/frontend/default/default/template/symmetrics/imprint/legal.phtml
       Displays tax information (tax_office, tax_number, vat_id)
*** K: The module provides a backward compatibility for old impressum calls.
*** L: If the impressum module had been previously installed, the old settings
        of the module are transmitted once.

** TECHNICAL
The module consists of 3 block classes (Abstract.php, Content.php und Field.php)
and 6 templates with predefined fields. The settings fields in 
System/Konfiguration are created through the system.xml.

- Symmetrics_Imprint_Block_Abstractis an abstract class and provides
the data from System/Konfiguration/Allgemein/Impressum (System/Configuration/General/Impressum).

- Symmetrics_Imprint_Block_Field enables the access to a separate 
impressum field. The command for this is {{block type="imprint/field" value="[field_name]"}}.
For the display the method _toHtml()  is responsible.

- Symmetrics_Imprint_Block_Content is an empty class which is there only in order to render the templates such as for example address.phtml.

- There is a migrations script that directly accesses the resource module
    of config-data, reads old impressum values and inserts
    to imprint module. If there are already records in the imprint module
    (which should not be possible), they are overwritten.

** PROBLEMS
No problems are known.

* TESTCASES

** BASIC
*** A: Check if a new “Impressum” group is displayed in backend under
       System/Configuration/General/Impressum. 
       The following fields are shown: 
            - Shop Name (shop_name)
            - Firma 1 (company_first)
            - Firma 2 (company_second)
            - Straße (street)
            - PLZ (zip)
            - Ort (city)
            - Telefon (telephone)
            - Fax (fax)
            - E-Mail (email)
            - Website (web)
            - Steuernummer (tax_number)
            - USt.Nr. (vat_id)
            - Zuständiges Gericht (court)
            - Zuständiges Finanzamt (financial_office)
            - Geschäftsführer / Vorstand (ceo)
            - HRB Nummer (register_number)
            - Verweis auf berufliche Regelungen (business_rules)
            - Kontoinhaber (bank_account_owner)
            - Kontonummer (bank_account)
            - BLZ (bank_code_number)
            - Kreditinstitut (bank_name)
            - SWIFT (swift)
            - IBAN (iban)

*** B: Check if the following data exist under these paths::
        - app/design/frontend/default/default/template/symmetrics/imprint/address.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/bank.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/communication.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/email/footer.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/legal.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/tax.phtml

*** C: Create a new CMS page or a static block with the following content:
    
       shop_name: {{block type="imprint/field" value="shop_name"}}
       company_first: {{block type="imprint/field" value="company_first"}}
       company_second: {{block type="imprint/field" value="company_second"}}
       street: {{block type="imprint/field" value="street"}}
       zip: {{block type="imprint/field" value="zip"}}
       city: {{block type="imprint/field" value="city"}}
       telephone: {{block type="imprint/field" value="telephone"}}
       fax: {{block type="imprint/field" value="fax"}}
       email: {{block type="imprint/field" value="email"}}
       web: {{block type="imprint/field" value="web"}}
       tax_number: {{block type="imprint/field" value="tax_number"}}
       vat_id: {{block type="imprint/field" value="vat_id"}}
       court: {{block type="imprint/field" value="court"}}
       financial_office: {{block type="imprint/field" value="financial_office"}}
       ceo: {{block type="imprint/field" value="ceo"}}
       register_number: {{block type="imprint/field" value="register_number"}}
       business_rules: {{block type="imprint/field" value="business_rules"}}
       bank_account_owner: {{block type="imprint/field" value="bank_account_owner"}}
       bank_account: {{block type="imprint/field" value="bank_account"}}
       bank_code_number: {{block type="imprint/field" value="bank_code_number"}}
       bank_name: {{block type="imprint/field" value="bank_name"}}
       swift: {{block type="imprint/field" value="swift"}}
       iban: {{block type="imprint/field" value="iban"}}
       
       Check if all fields stored in the configuration are displayed correctly.

*** D: Create a new CMS page or a static block with the following content:
    
       address
       {{block type="imprint/content" template="symmetrics/imprint/address.phtml"}}

       communication
       {{block type="imprint/content" template="symmetrics/imprint/communication.phtml"}}

       email footer
       {{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}

       legal
       {{block type="imprint/content" template="symmetrics/imprint/legal.phtml"}}

       tax
       {{block type="imprint/content" template="symmetrics/imprint/tax.phtml"}}

       bank
       {{block type="imprint/content" template="symmetrics/imprint/bank.phtml"}}

       Check if all fields stored in the configuration are displayed correctly.

*** E: Create a new CMS page or a static block with the following content:
      
       {{block type="imprint/content" template="symmetrics/imprint/address.phtml"}}
     
       Check if all fields stored in the configuration are displayed correctly.

       - company_first
       - company_second
       - street
       - zip
       - city

*** F: Create a new CMS page or a static block with the following content:

       {{block type="imprint/content" template="symmetrics/imprint/bank.phtml"}}

       Check if all fields stored in the configuration are displayed correctly:

       - bank_account_owner
       - bank_account
       - bank_code_number
       - bank_name
       - swift
       - iban

*** G: Create a new CMS page or a static block with the following content:

       {{block type="imprint/content" template="symmetrics/imprint/communication.phtml"}}

       Check if all fields stored in the configuration are displayed correctly:

       - telephone
       - fax
       - web
       - email

*** H: Create a new CMS page or a static block with the following content:
    
       {{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}

       Check if all fields stored in the configuration are displayed correctly:

       - shop_name
       - company_first
       - company_second
       - street
       - zip
       - city
       - telephone
       - fax
       - web
       - email

       The fields from "tax", "legal", "bank" must also be shown.

*** I: Create a new CMS page or a static block with the following content:
   
       {{block type="imprint/content" template="symmetrics/imprint/legal.phtml"}}

       Check if all fields stored in the configuration are displayed correctly:

       - ceo
       - court
       - register_number
       - business_rules

*** J: Create a new CMS page or a static block with the following content:
     
       {{block type="imprint/content" template="symmetrics/imprint/tax.phtml"}}

       Check if all fields stored in the configuration are displayed correctly:
       
       - tax_office
       - tax_number
       - vat_id
       
*** K: Create a new CMS page or a static block with the following content and check if 
	all fields stored in the configuration are displayed correctly:

      <hr/> {{block type="symmetrics_impressum/impressum" value="shopname"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="company1"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="company2"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="street"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="zip"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="city"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="telephone"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="fax"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="email"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="web"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="taxnumber"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="vatid"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="court"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="taxoffice"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="ceo"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="hrb"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="legal"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="bankaccountowner"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="bankaccount"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="bankcodenumber"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="bankname"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="swift"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="iban"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="bank"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="emailfooter"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="address"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="communication"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="legal"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="tax"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="bank"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="web_href"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="email_href"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="imprint"}}
      <hr/> {{block type="symmetrics_impressum/impressum" value="imprintplain"}}

*** L: Install the  symmetrics_module_impressum and in systemconfiguration enter 
    values in the old impressum fields. Also change the values 
    on the store or website level. Delete the impressum module
    and install symmetrics_module_imprint. 
	The values should 1:1 be taken to the new imprint settings
	through the migration script.
      