<?php
/**
*
* @package ForumSponsor
* @copyright (c) alg
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

namespace alg\ForumSponsor\migrations;

class v_1_0_1 extends \phpbb\db\migration\migration
{
	static public function depends_on()
	{
		return array('\alg\ForumSponsor\migrations\v_1_0_0');
	}
   
	public function update_schema()
	{
		return array(
			'change_columns'	=> array(
				$this->table_prefix . 'forums'		=> array(
						'forum_sponsor_above' => array('VCHAR_UNI:1000', ''),
				),
			),
		);
	}	

}
