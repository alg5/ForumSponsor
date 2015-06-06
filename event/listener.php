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
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.display_forums_modify_template_vars'		=> 'display_forums_modify_template_vars',
				'core.viewtopic_assign_template_vars_before'							 => 'viewtopic_assign_template_vars_before',
				'core.viewforum_get_topic_data'							 => 'viewforum_get_topic_data',
			'core.acp_manage_forums_request_data'			=> 'acp_manage_forums_request_data',
			'core.acp_manage_forums_display_form'			=> 'acp_manage_forums_display_form',
		);
	}
	public function display_forums_modify_template_vars($event)
	{
		$this->user->add_lang_ext('alg/ForumSponsor', 'info_acp_forumsponsor');
		$forum_row = $event['forum_row'];
		$row = $event['row'];
		$forum_row = array_merge($forum_row, array(
				'FORUM_SPONSOR'			=> ($row['forum_sponsor']) ? $row['forum_sponsor'] : '',
				'FORUM_SPONSOR_ABOVE'			=> ($row['forum_sponsor_above']) ? $row['forum_sponsor_above'] : '',
				));
		$event['forum_row'] = $forum_row;
	}
	 
	 public function viewtopic_assign_template_vars_before($event)
	 {
		$forum_sponsor_above = $event['topic_data']['forum_sponsor_above'];
		if($forum_sponsor_above)
		{
				$fs_allow_html = $event['topic_data']['forum_sponsor_allow_html'];
				if ($fs_allow_html)
				{
					 $fs_above = $forum_sponsor_above;
				}
				else
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
	//print_r($event['forum_data']);
	$forum_sponsor_above = $event['forum_data']['forum_sponsor_above'];
	if($forum_sponsor_above)
	{
	 $fs_allow_html = $event['forum_data']['forum_sponsor_allow_html'];
		if ($fs_allow_html)
		{
			$fs_above = $forum_sponsor_above;
		}
		else
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
		$fs_above_allow_html = $this->request->variable('forum_sponsor_allow_html', false);
		$forum_sponsor_above ='';
		$fs_above_uid = $fs_above_bitfield = '';
		$fs_above_options=7;
		if ($fs_above_allow_html)
		{
			$forum_sponsor_above = htmlspecialchars_decode(utf8_normalize_nfc($fs_above));
			$allow_bbcode = $allow_smilies = $allow_urls = false;
		}
		else
		  {
				//include_once($this->phpbb_root_path . 'includes/functions_content.' . $this->php_ext);
				$allow_bbcode = $allow_smilies = $allow_urls = true;
				generate_text_for_storage(
				$fs_above,
				$fs_above_uid,
				$fs_above_bitfield,
				$fs_above_options,
				true,
				true,
				true
			);

				$forum_sponsor_above = $fs_above;
				
		  }
		$forum_data += array(
			'forum_sponsor'									=>  htmlspecialchars_decode(utf8_normalize_nfc($fs)),
			'forum_sponsor_above'					=>  $forum_sponsor_above,
			'forum_sponsor_allow_html'		 =>  $fs_above_allow_html,
			'forum_sponsor_above_uid'			  =>  $fs_above_uid,
			'forum_sponsor_above_bitfield'	=>  $fs_above_bitfield,
			'forum_sponsor_above_options'	=>  $fs_above_options,
		);
		$event['forum_data'] = $forum_data;
		//print_r($event['forum_data']);
	}
	public function acp_manage_forums_display_form($event)
	{
		$forum_data = $event['forum_data'];
		$template_data = $event['template_data'];
		$fs_above = isset($forum_data['forum_sponsor_above']) ? $forum_data['forum_sponsor_above'] : '';
		if($fs_above && !$forum_data['forum_sponsor_allow_html'])
		{
			$ret = generate_text_for_edit($fs_above, $forum_data['forum_sponsor_above_uid'], $forum_data['forum_sponsor_above_options']);
			$fs_above = $ret['text'];
		}
		$template_data += array(
			'FORUM_SPONSOR'	=> isset($forum_data['forum_sponsor']) ? $forum_data['forum_sponsor'] : '',
			'FORUM_SPONSOR_ABOVE'	=> $fs_above,
				'S_FORUM_SPONSOR_HTML_CHECKED'	=>  $forum_data['forum_sponsor_allow_html'],
		);

		$event['template_data'] = $template_data;
	}
	#endregion
}
