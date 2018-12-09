<?php
/**
 * Pages Extended
 * Copyright (c) shopbase
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$tabs = array(
	// Additional Tabs
);

foreach($tabs as $tabname => $columns) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $columns, 1);
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages_language_overlay', $columns, 1);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', '--div--;' . $tabname . ', ' . getColumns($columns) . ';;;;1-1-1');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages_language_overlay', '--div--;' . $tabname . ', ' . getColumns($columns) . ';;;;1-1-1');

    $TCA['pages_language_overlay']['interface']['showRecordFieldList'] .= ', ' . getColumns($columns);
}

function getColumns($columns)
{
	$result = '';

    foreach ($columns as $name => $column) {
        $result .= $name . ', ';
	}

	return substr($result, 0, -2);
}
