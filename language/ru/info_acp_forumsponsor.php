<?php
/** 
*
* ForumSponsor [Russian]
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
	'FORUM_SPONSOR'			=> 'При поддержке',
	'FORUM_SPONSOR_ADM'		=> 'Данные спонсора форума на главной странице',
	'FORUM_SPONSOR_EXPLAIN'	=> 'HTML/BBCODE баннера от спонсора на главной странице',
	'FORUM_SPONSOR_ABOVE_ADM'		=> 'Баннер и данные спонсора над форумом',
	'FORUM_SPONSOR_ABOVE_EXPLAIN'	=> 'HTML/BBCODE баннера от спонсора  над форумом',
	'USE_HTML'						=> 'Использовать  HTML',
	'USE_BBCODE'						=> 'Использовать  BBCode',
));
