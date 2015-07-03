<?php
/**
 *
 * @package ForumSponsor
 * @copyright (c) 2014 alg 
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace alg\ForumSponsor\event;

/**
* @ignore
*/

/**
* Event listener
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	public function __construct(\phpbb\template\template $template, \phpbb\user $user, \phpbb\request\request_interface $request, $phpbb_root_path, $php_ext)
	{
		$this->template = $template;
		$this->user = $user;
		$this->request = $request;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;

		if (!defined('PARSE_AS_HTML'))
		{
			define('PARSE_AS_HTML', 0);
		}
		if (!defined('PARSE_AS_BBCODE'))
		{
			define('PARSE_AS_BBCODE', 1);
		}

	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.display_forums_modify_template_vars'		=> 'display_forums_modify_template_vars',
			'core.viewtopic_assign_template_vars_before'	 => 'viewtopic_assign_template_vars_before',
			'core.viewforum_get_topic_data'						 => 'viewforum_get_topic_data',
			'core.acp_manage_forums_request_data'			=> 'acp_manage_forums_request_data',
			'core.acp_manage_forums_display_form'			=> 'acp_manage_forums_display_form',
		);
	}
	public function display_forums_modify_template_vars($event)
	{
		$this->user->add_lang_ext('alg/ForumSponsor', 'info_acp_forumsponsor');
		$forum_row = $event['forum_row'];
		$row = $event['row'];
		$forum_sponsor = $row['forum_sponsor'];
		$fs = $forum_sponsor;
		if($fs)
		{
			$fs_parse_type = $row['forum_sponsor_parse_type'];
			if ($fs_parse_type == PARSE_AS_BBCODE)
			{
				//parse BBCode
				$fs = generate_text_for_display(
					$forum_sponsor,
					$row['forum_sponsor_uid'],
					$row['forum_sponsor_bitfield'],
					$row['forum_sponsor_options']
				);
			}
		}
		$forum_row = array_merge($forum_row, array(
				'FORUM_SPONSOR'			=> $fs,
				));
		$event['forum_row'] = $forum_row;
	}

	public function viewtopic_assign_template_vars_before($event)
	{
		$forum_sponsor_above = $event['topic_data']['forum_sponsor_above'];
        $fs_above = $forum_sponsor_above;
		if($fs_above)
		{
			$fs_above_parse_type = $event['topic_data']['forum_sponsor_above_parse_type'];
			if ($fs_above_parse_type == PARSE_AS_BBCODE)
			{
				$fs_above = generate_text_for_display(
					$forum_sponsor_above,
					$event['topic_data']['forum_sponsor_above_uid'],
					$event['topic_data']['forum_sponsor_above_bitfield'],
					$event['topic_data']['forum_sponsor_above_options']
				);
			}
			$this->template->assign_vars(array(
				'FORUM_SPONSOR_ABOVE'		=> $fs_above,
			));
		}
	}
	public function viewforum_get_topic_data($event)
	{
		$forum_sponsor_above = $event['forum_data']['forum_sponsor_above'];
		$fs_above = $forum_sponsor_above;
		if($fs_above)
		{
			$fs_above_parse_type = $event['forum_data']['forum_sponsor_above_parse_type'];
			if ($fs_above_parse_type == PARSE_AS_BBCODE)
			{
				$fs_above = generate_text_for_display(
					$forum_sponsor_above,
					$event['forum_data']['forum_sponsor_above_uid'],
					$event['forum_data']['forum_sponsor_above_bitfield'],
					$event['forum_data']['forum_sponsor_above_options']
				);
			}
		$this->template->assign_vars(array(
			'FORUM_SPONSOR_ABOVE'		=> $fs_above,
		));
		}
	}

	#region ACP functions
	public function acp_manage_forums_request_data($event)
	{
		$forum_data = $event['forum_data'];
		$fs =	$this->request->variable('forum_sponsor', '', true);
		$fs_above =	$this->request->variable('forum_sponsor_above', '', true);
		$fs_uid = $fs_bitfield = '';
		$fs_options=7;
		$fs_parse_type = $this->request->variable('forum_sponsor_parse_type', PARSE_AS_HTML);
		$fs = $this->parse_text_by_parse_type($fs_parse_type, $fs, $fs_uid, $fs_bitfield, $fs_options);

		$fs_above_parse_type = $this->request->variable('forum_sponsor_above_parse_type', PARSE_AS_HTML);
		$fs_above_uid = $fs_above_bitfield = '';
		$fs_above_options=7;
		$fs_above = $this->parse_text_by_parse_type($fs_above_parse_type, $fs_above, $fs_above_uid, $fs_above_bitfield, $fs_above_options);

		$forum_data += array(
			'forum_sponsor'					  =>  $fs,
			'forum_sponsor_parse_type' =>  $fs_parse_type,
			'forum_sponsor_uid'			  =>  $fs_uid,
			'forum_sponsor_bitfield'	=>  $fs_bitfield,
			'forum_sponsor_options'	=>  $fs_options,

			'forum_sponsor_above'					=>  $fs_above,
			'forum_sponsor_above_parse_type' =>  $fs_above_parse_type,
			'forum_sponsor_above_uid'				 =>  $fs_above_uid,
			'forum_sponsor_above_bitfield'		 =>  $fs_above_bitfield,
			'forum_sponsor_above_options'		 =>  $fs_above_options,
		);
		$event['forum_data'] = $forum_data;
	}
	public function acp_manage_forums_display_form($event)
	{
		$template_data = $event['template_data'];
		$forum_data = $event['forum_data'];
		$fs = isset($forum_data['forum_sponsor']) ? $forum_data['forum_sponsor'] : '';
		if($fs && $forum_data['forum_sponsor_parse_type'] == PARSE_AS_BBCODE)
		{
			$ret = generate_text_for_edit($fs, $forum_data['forum_sponsor_uid'], $forum_data['forum_sponsor_options']);
			$fs = $ret['text'];
		}
		$fs_above = isset($forum_data['forum_sponsor_above']) ? $forum_data['forum_sponsor_above'] : '';
		if($fs_above && $forum_data['forum_sponsor_above_parse_type'] == PARSE_AS_BBCODE)
		{
				$ret = generate_text_for_edit($fs_above, $forum_data['forum_sponsor_above_uid'], $forum_data['forum_sponsor_above_options']);
				$fs_above = $ret['text'];
		}
		$template_data += array(
			'FORUM_SPONSOR'	=>$fs,
			'FORUM_SPONSOR_ABOVE'	=> $fs_above,
			'S_FORUM_SPONSOR_HTML_CHECKED'	=>  $forum_data['forum_sponsor_parse_type'] == PARSE_AS_HTML ? true :false,
			'S_FORUM_SPONSOR_ABOVE_HTML_CHECKED'	=>  $forum_data['forum_sponsor_above_parse_type'] == PARSE_AS_HTML ? true :false,
		);

		$event['template_data'] = $template_data;
	}

	private function parse_text_by_parse_type($parse_type, $text_src, &$uid, &$bitfield, $options)
	{
		$text_dst ='';
		if ($parse_type == PARSE_AS_HTML)
		{
			$text_dst = htmlspecialchars_decode(utf8_normalize_nfc($text_src));
		}
		else
		{
				//PARSE_AS_BBCODE
				$text_dst = $text_src;
			generate_text_for_storage(
				$text_dst,
				$uid,
				$bitfield,
				$options,
				true,
				true,
				true
			);
		}
		return $text_dst;
	}
	#endregion
}
