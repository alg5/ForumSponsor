<?php
/**
*
* @package forumsponsor
* @copyright (c) alg
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace alg\forumsponsor\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{

	public function effectively_installed()
	{
		return isset($this->config['forumsponsor']) && version_compare($this->config['forumsponsor'], '2.0.*', '>=');
	}

	static public function depends_on()
	{
			return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_schema()
	{
		return  array(
			'add_columns' => array (
				$this->table_prefix . 'forums' => array  (
					'forum_sponsor' => array('VCHAR:500', ''),
					'forum_sponsor_parse_type' => array('BOOL', 0),
					'forum_sponsor_uid' => array('VCHAR:8', ''),
					'forum_sponsor_bitfield' => array('VCHAR:255', ''),
					'forum_sponsor_options' => array('UINT:11', 7),
					'forum_sponsor_above' => array('VCHAR_UNI:500', ''),
					'forum_sponsor_above_parse_type' => array('BOOL', 0),
					'forum_sponsor_above_uid' => array('VCHAR:8', ''),
					'forum_sponsor_above_bitfield' => array('VCHAR:255', ''),
					'forum_sponsor_above_options' => array('UINT:11', 7),
				)
			)
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'forums' => array(
					'forum_sponsor',
					'forum_sponsor_parse_type',
					'forum_sponsor_uid',
					'forum_sponsor_bitfield',
					'forum_sponsor_options',
					'forum_sponsor_above',
					'forum_sponsor_above_parse_type',
					'forum_sponsor_above_uid',
					'forum_sponsor_above_bitfield',
					'forum_sponsor_above_options',
				),
			),
		);
	}

	public function update_data()
	{
		return array(
			array('config.add', array('forum_sponsor', '2.0.0')),
		);
	}
	public function revert_data()
	{
		return array(
			array('config.remove', array('forum_sponsor')),
		);
	}
}
