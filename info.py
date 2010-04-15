# encoding: utf-8


# =============================================================================
# package info
# =============================================================================
NAME = 'symmetrics_module_imprint'

TAGS = ('symmetrics', 'magento', 'module', 'imprint', 'impressum', 'mrg')

LICENSE = 'AFL 3.0'

HOMEPAGE = 'http://www.symmetrics.de'

INSTALL_PATH = ''


# =============================================================================
# responsibilities
# =============================================================================
TEAM_LEADER = {
    'Sergej Braznikov': 'sb@symmetrics.de',
}

MAINTAINER = {
    'Sergej Braznikov': 'sb@symmetrics.de',
}

AUTHORS = {
    'Sergej Braznikov': 'sb@symmetrics.de',
}

# =============================================================================
# additional infos
# =============================================================================
INFO = 'Impressum Module'

SUMMARY = '''
    Das Modul Symmetrics_Impressum erweitert das 
    Magento-Backend um viele Felder, die fuer die Ausgabe
    der Seite "Impressum" wichtig sind. Es ersetzt alte 
    symmetrics_impressum - Aufrufe in den E-mail templates durch neue.
'''

NOTES = ''''''

# =============================================================================
# relations
# =============================================================================
REQUIRES = [
    {'magento': '*', 'magento_enterprise': '*'},
]

EXCLUDES = {}

VIRTUAL = {}

DEPENDS_ON_FILES = ()

PEAR_KEY = ''

COMPATIBLE_WITH = {
    'magento': ['1.4'],
    'magento_enterprise': ['1.7'],
}
