# PagesExtended
Typo3 Plugin to extend default page settings

## Usage

The Plugin will use the default Typo3 TCA types.

>Step 1

Add new columns as SQL query. This is required to save the value of the columns later.
```sql
CREATE TABLE pages (
    additional_image int(11) unsigned default '0',
);

CREATE TABLE pages_language_overlay (
    additional_image int(11) unsigned default '0',
);
```
*File: ext_tables.sql*

>Step 2

Add new tab with columns to array.
```php
$tabs = array(
    'Additional Tab' => array(
        'additional_image' => array(
            'exclude' => 0,
            'label' => 'Image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'additional_image',
                array(
                    'maxitems' => 1,
                    'appearance' => array(
                        'showPossibleLocalizationRecords' => 1,
                        'showAllLocalizationLink' => 1,
                        'showSynchronizationLink' => 1,
                        'useSortable' => 1,
                    ),
                ),
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ),
    ),
);
```
*File: ext_tables.php*

>Step 3

Install plugin and reload backend.

## Requirements

> Typo3 6.2 or higher

> Full backend access

> Access to install tool

[![Donate](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q98R2QXXMTUF6&source=url)
