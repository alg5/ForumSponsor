<?php
/** 
*
* reqtpl [Russian]
*
* @package reqtpl
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
	'ACP_REQTPL_CANNOT_APPLY_TO_CATEGORY'	=> '������ ������� ���������� ������ ��� ���������',
	'ACP_REQTPL_DELETE_FORUM_TPL'			=> '������� ������ �������',
	'ACP_REQTPL_DELETED'					=> '������ ������� �����',
	'ACP_REQTPL_SAVE_FORUM_TPL'				=> '��������� ������',
	'ACP_REQTPL_CREATE_FORUM_TPL'			=> '������� ������ �������',
	'ACP_REQTPL_ADD_FIELD'					=> '�������� ����',
	'ACP_REQTPL_NO_TPL'						=> '',
	'ACP_REQTPL_SAVED'						=> '������ ������� �������',
	'ACP_REQTPL_FIELD_NOT_EXISTS'			=> '���� �����������',
	'ACP_REQTPL_FIELD_OPTIONS'				=> '��������� ����',
	'ACP_REQTPL_FIELD_OPTIONS_EXPLAIN'		=> '',
	'REQTPL_FIELD_NAME'						=> '��������',
	'REQTPL_FIELD_NAME_EXPLAIN'				=> '',
	'REQTPL_FIELD_COMMENT'					=> '�����������',
	'REQTPL_FIELD_COMMENT_EXPLAIN'			=> '',
	'REQTPL_FIELD_TYPE'						=> '���',
	'REQTPL_FIELD_TYPE_EXPLAIN'				=> '',
	'REQTPL_FIELD_OPTIONS'					=> '��������',
	'REQTPL_FIELD_OPTIONS_EXPLAIN'			=> '������� �������� ��� ����������� ������ (������ ����� �� ����� �������)',
	'REQTPL_FIELD_IMPORTANT'				=> '����������� ��� ����������',
	'REQTPL_FIELD_IMPORTANT_EXPLAIN'		=> '',
	'REQTPL_FIELD_SIZE'						=> '������ ����',
	'REQTPL_FIELD_SIZE_EXPLAIN'				=> '������������ ���������� ��������. �������� ������ ���� ������ ���� ��� ����, ���� ����������� �� ���������.',
	'REQTPL_FIELD_MATCH'					=> '������ �������',
	'REQTPL_FIELD_MATCH_EXPLAIN'			=> '�� ������ ������� ���������� ���������, �� �������� ����� ���������� ������ ��������� ��������. �������� ���� ������, ���� �������� ������� �� ���������.',
	'REQTPL_FIELD_DEFAULT'					=> '�������� ��-���������',
	'REQTPL_FIELD_DEFAULT_EXPLAIN'			=> '�� ������ ������� ��������, ������� ����� �������� ������������� � ���� ������� ��� ����������',
	
	'REQTPL_FIELD_ADDED'					=> '���� ���������',
	'REQTPL_FIELD_EDITED'					=> '���� ���������������',
	
	'ACP_REQTPL_FIELD_TYPE_INPUT'			=> '��������� ������',
	'ACP_REQTPL_FIELD_TYPE_TEXTAREA'		=> '��������� ����',
	'ACP_REQTPL_FIELD_TYPE_CHECKBOX'		=> '�������',
	'ACP_REQTPL_FIELD_TYPE_SELECT'			=> '���������� ������',
	'ACP_REQTPL_FIELD_TYPE_IMAGE'			=> '�����������',
	
	'ACP_REQTPL_MAIN_OPTIONS'				=> '�������� ���������',
	'ACP_REQTPL_EDIT_FORUM'					=> '��������� ������� ������� ��� ������',
	'ACP_REQTPL_SELECT'						=> '������� �����',
	'ACP_REQTPL_SELECT_FORUM'				=> '������� �����',
	
	'ACP_REQTPL_NAME'						=> '��������',
	'ACP_REQTPL_NAME_EXPLAIN'				=> '',
	'ACP_REQTPL_COMMENT'					=> '��������',
	'ACP_REQTPL_COMMENT_EXPLAIN'			=> '',
	'ACP_REQTPL_SHOW'						=> '���������� �� ����� ������',
	'ACP_REQTPL_SHOW_EXPLAIN'				=> '�� ������ �������� ��������� ����������� ������� ������� ��� ��� ��������',
	
	'ACP_REQTPL_FIELD_NAME'					=> '��������',
	'ACP_REQTPL_FIELD_TYPE'					=> '���',
	'ACP_REQTPL_FIELD_IMPORTANT'			=> '�����������',
));
