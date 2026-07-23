<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				VDM 
/-------------------------------------------------------------------------------------------------------/

	@version		6.0.0
	@build			23rd July, 2026
	@created		20th July, 2026
	@package		Hello World
	@subpackage		Helloworld.php
	@author			Llewellyn <https://www.vdm.io>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/
namespace JCB\Plugin\Privacy\Helloworld\Extension;

/***[JCBGUI.joomla_plugin.head.66.$$$$]***/
use Joomla\Utilities\ArrayHelper;
use Joomla\Component\Privacy\Administrator\Plugin\PrivacyPlugin;
use Joomla\Database\DatabaseAwareTrait;/***[/JCBGUI$$$$]***/
use Joomla\Component\Privacy\Administrator\Table\RequestTable;
use Joomla\CMS\User\User;
use Joomla\Component\Privacy\Administrator\Removal\Status;
use JCB\Component\Helloworld\Administrator\Helper\HelloworldHelper;
use Joomla\Component\Privacy\Administrator\Export\Domain;

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


/***[JCBGUI.class_extends.comment.4.$$$$]***/
/**
 * Privacy - Helloworld plugin.
 *
 * @package   Helloworld
 * @since     2.0.0
 *//***[/JCBGUI$$$$]***/

final class Helloworld extends PrivacyPlugin
{

/***[JCBGUI.joomla_plugin.main_class_code.66.$$$$]***/
	use DatabaseAwareTrait;

	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0
	 */
	protected  $autoloadLanguage = true;

	/**
	 * Performs validation to determine if the data associated with a remove information request can be processed
	 *
	 * @param   RequestTable  $request  The request record being processed
	 * @param   User                $user     The user account associated with this request if available
	 *
	 * @return  Status
	 *
	 * @since   1.0
	 */
	public function onPrivacyCanRemoveData(RequestTable $request, User $user = null)
	{
		$status = new Status();

		// This plugin only processes data for registered user accounts
		if (!$user)
		{
			return $status;
		}

		// check if the helper method is set in the component
		if (method_exists(HelloworldHelper::class, 'onPrivacyCanRemoveData'))
		{
			HelloworldHelper::onPrivacyCanRemoveData($this, $status, $request, $user);
		}

		return $status;
	}

	/**
	 * Processes an export request for Joomla core user data
	 *
	 * @param   RequestTable  $request  The request record being processed
	 * @param   User                $user     The user account associated with this request if available
	 *
	 * @return  Domain[]
	 *
	 * @since   1.0
	 */
	public function onPrivacyExportRequest(RequestTable $request, User $user = null)
	{
		$domains = array();

		// This plugin only processes data for registered user accounts
		if (!$user)
		{
			return $domains;
		}

		// check if the helper method is set in the component
		if (method_exists(HelloworldHelper::class, 'onPrivacyExportRequest'))
		{
			HelloworldHelper::onPrivacyExportRequest($this, $domains, $request, $user);
		}

		return $domains;
	}

	/**
	 * Removes the data associated with a remove information request
	 *
	 * @param   RequestTable  $request  The request record being processed
	 * @param   User                $user     The user account associated with this request if available
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function onPrivacyRemoveData(RequestTable $request, User $user = null)
	{
		// This plugin only processes data for registered user accounts
		if (!$user)
		{
			return;
		}

		// check if the helper method is set in the component
		if (method_exists(HelloworldHelper::class, 'onPrivacyRemoveData'))
		{
			HelloworldHelper::onPrivacyRemoveData($this, $request, $user);
		}
	}/***[/JCBGUI$$$$]***/

}
