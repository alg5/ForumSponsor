<?php
/** 
*
* ForumSponsor [English]
*
* @package ForumSponsor
* @copyright (c) 2014 alg
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'FORUM_SPONSOR'			=> 'With the support of',
	'FORUM_SPONSOR_ADM'		=> 'Data sponsor forum on index',
	'FORUM_SPONSOR_EXPLAIN'	=> 'HTML code for sponsor forum banner ',
	'FORUM_SPONSOR_ABOVE_ADM'		=> 'Data sponsor above the  forum ',
	'FORUM_SPONSOR_ABOVE_EXPLAIN'	=> 'HTML/BBCODE banner(data) from sponsor above the forum',
	'USE_HTML'						=> 'Parse  HTML',
	'USE_BBCODE'						=> 'Parse  BBCode',
));
