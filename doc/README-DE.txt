* DOCUMENTATION

** INSTALLATION
Extrahieren Sie den Inhalt dieses Archives in das Magento Verzeichnis.

** USAGE
Das Modul erweitert das Magento-Backend um viele Felder,
die für die Ausgabe der Seite "Impressum" wichtig sind. Felder, die im Backend
gefüllt werden, können auf allen Seiten und statischen Blöcken im Frontend
ausgelesen werden. Dazu liefert das Modul viele hilfreiche Templates, die die
Ausgabe erleichtern und vorformatieren. Erreichbar ist das Modul im Backend
unter System/Konfiguration/Allgemein/Impressum

** FUNCTIONALITY
*** A: Fügt folgende Felder unter System/Konfiguration/Allgemein/Impressum im Backend hinzu:
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
       Füllen Sie bitte *alle* Felder aus. Diese Daten werden bei allen
       Testcases gebraucht.
*** B: Es werden vordefinierte Templates zur Ausgabe von
       Impressum-Informationen in CMS Seiten und Blöcken geliefert
*** C: Auf einer CMS-Seite oder im statischen Block können einzelne
       Impressum-Felder mit dem folgenden Befehl ausgelesen werden:
       {{block type="imprint/field" value="[field_name]"}}
*** D: Auf einer CMS-Seite oder im statischen Block können zusammengefasste
       und vordefinierte Felder als einzelne Templates mit einem Befehl 
       ausgegeben werden:
       {{block type="imprint/content" template="[path/to/template.phtml]"}}
       Folgende Templates stehen zur verfügung:
       - address.phtml
       - bank.phtml
       - communication.phtml
       - email/footer.phtml
       - legal.phtml
       - tax.phtml
*** E: app/design/frontend/default/default/template/symmetrics/imprint/address.phtml
       Gibt die vollständige Anschrift der Firma aus (company_first,
       company_second, street, zip, city)
*** F: app/design/frontend/default/default/template/symmetrics/imprint/bank.phtml
       Gibt Kontoinformationen aus (bank_account_owner, bank_account,
       bank_code_number, bank_name, swift, iban)
*** G: app/design/frontend/default/default/template/symmetrics/imprint/communication.phtml
       Gibt alle Kommunikationsdaten aus (telephone, fax, web, email)
*** H: app/design/frontend/default/default/template/symmetrics/imprint/email/footer.phtml
       Gibt den formatierten Footer für E-Mails aus (shop_name, company_first,
       company_second, street, zip, city, telephone, fax, web, email)
*** I: app/design/frontend/default/default/template/symmetrics/imprint/legal.phtml
       Gibt rechtliche Infos über den Shopbetreiber aus (ceo, court,
       register_number, business_rules)
*** J: app/design/frontend/default/default/template/symmetrics/imprint/legal.phtml
       Gibt Steuerinformationen aus (tax_office, tax_number, vat_id)
*** K: Das Modul bietet eine Abwärtskompatibilität zu den alten Impressum-Aufrufen

** TECHNICAL
Das Modul besteht aus 3 Block Klassen (Abstract.php, Content.php und Field.php)
und 6 Templates mit vordefinierten Felder. Die Einstellungsfelder in
System/Konfiguration werden ueber die system.xml angelegt.

- Symmetrics_Imprint_Block_Abstract ist eine Abstrakte Klasse und bietet die
Daten aus System/Konfiguration/Allgemein/Impressum an.

- Symmetrics_Imprint_Block_Field ermöglicht den Zugriff auf ein einzelnes
Impressum-Feld. Der Befehl dazu lautet {{block type="imprint/field" value="[field_name]"}}.
Für die Ausgabe ist die Methode _toHtml() zuständig.

- Symmetrics_Imprint_Block_Content ist eine leere Klasse, die nur dafür da ist
um die Templates wie z.B. address.phtml zu rendern.

** PROBLEMS
Keine Probleme bekannt.

* TESTCASES

** BASIC
*** A: Prüfen Sie, ob im Backend unter System/Konfiguration/Allgemein/
       ein neue Felgruppe "Impressum" angezeigt wird. Folgende Felder werden
       angezeigt: 
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

*** B: Prüfen Sie ob folgende Dateien unter diesen Pfaden existieren:
        - app/design/frontend/default/default/template/symmetrics/imprint/address.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/bank.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/communication.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/email/footer.phtml
        - app/design/frontend/default/default/template/symmetrics/imprint/legal.phtml

*** C: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

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
       
       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden.

*** D: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

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

       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden.

*** E: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

       {{block type="imprint/content" template="symmetrics/imprint/address.phtml"}}
     
       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden:

       - company_first
       - company_second
       - street
       - zip
       - city

*** F: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

       {{block type="imprint/content" template="symmetrics/imprint/bank.phtml"}}

       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden:

       - bank_account_owner
       - bank_account
       - bank_code_number
       - bank_name
       - swift
       - iban

*** G: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

       {{block type="imprint/content" template="symmetrics/imprint/communication.phtml"}}

       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden:

       - telephone
       - fax
       - web
       - email

*** H: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

       {{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}

       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden:

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

*** I: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

       {{block type="imprint/content" template="symmetrics/imprint/legal.phtml"}}

       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden:

       - ceo
       - court
       - register_number
       - business_rules

*** J: Erstellen Sie eine neue CMS Seite oder einen statischen Block mit folgendem
       Inhalt:

       {{block type="imprint/content" template="symmetrics/imprint/tax.phtml"}}

       Prüfen Sie ob alle in der Konfiguration hinterlegte Felder richtig ausgegeben werden:
       
       - tax_office
       - tax_number
       - vat_id
       
*** K: Erstellen Sie eine CMS Seite mit folgendem Inhalt und prüfen Sie, ob alle
        in der Konfiguration hinterlegten Felder richtig ausgegeben werden:
        
            <hr/> {{block type="symmetrics_impressum/impressum" value="shopname"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="company1"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="company2"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="street"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="zip"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="city"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="telephone"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="fax"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="email"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="web"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="taxnumber"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="vatid"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="court"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="taxoffice"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="ceo"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="hrb"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="legal"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="bankaccountowner"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="bankaccount"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="bankcodenumber"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="bankname"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="swift"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="iban"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="bank"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="emailfooter"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="address"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="communication"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="legal"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="tax"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="bank"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="web_href"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="email_href"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="imprint"}}'
            <hr/> {{block type="symmetrics_impressum/impressum" value="imprintplain"}}
