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
    'Torsten Walluhn': 'tw@symmetrics.de',
}

MAINTAINER = {
    'Yauhen Yakimovich': 'yy@symmetrics.de',
}

AUTHORS = {
    'Sergej Braznikov': 'sb@symmetrics.de',
    'Yauhen Yakimovich': 'yy@symmetrics.de',
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
    'magento': ['1.4.0.0', '1.4.0.1', '1.4.1.0'],
    'magento_enterprise': ['1.7.0.0', '1.7.1.0', '1.8.0.0'],
}
