<?php
/*----------------------------------------------------------------------------------|  www.vdm.io  |----/
				VDM 
/-------------------------------------------------------------------------------------------------------/

	@version		6.0.0
	@build			23rd July, 2026
	@created		20th July, 2026
	@package		Hello World
	@subpackage		script.php
	@author			Llewellyn <https://www.vdm.io>	
	@copyright		Copyright (C) 2015. All Rights Reserved
	@license		GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
  ____  _____  _____  __  __  __      __       ___  _____  __  __  ____  _____  _  _  ____  _  _  ____ 
 (_  _)(  _  )(  _  )(  \/  )(  )    /__\     / __)(  _  )(  \/  )(  _ \(  _  )( \( )( ___)( \( )(_  _)
.-_)(   )(_)(  )(_)(  )    (  )(__  /(__)\   ( (__  )(_)(  )    (  )___/ )(_)(  )  (  )__)  )  (   )(  
\____) (_____)(_____)(_/\/\_)(____)(__)(__)   \___)(_____)(_/\/\_)(__)  (_____)(_)\_)(____)(_)\_) (__) 

/------------------------------------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;
use Joomla\CMS\Version;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;
use Joomla\Filesystem\File;
use Joomla\Filesystem\Folder;

/**
 * Privacy - Helloworld script file.
 *
 * @package Helloworld
 */
class plgPrivacyHelloworldInstallerScript
{
	/**
	 * [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 284] The CMS Application.
	 *
	 * @since  4.4.2
	 */
	protected $app;

	/**
	 * [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 292] A list of files to be deleted
	 *
	 * @var    array
	 * @since  3.6
	 */
	protected array $deleteFiles = [];

	/**
	 * [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 301] A list of folders to be deleted
	 *
	 * @var    array
	 * @since  3.6
	 */
	protected array $deleteFolders = [];

	/**
	 * Constructor
	 *
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 */
	public function __construct($adapter)
	{
		// [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 319] get application
		$this->app = Factory::getApplication();


/***[JCBGUI.joomla_plugin.php_script_construct.66.$$$$]***/
 // PHP script that should run in __construct of script./***[/JCBGUI$$$$]***/

		if (is_file(JPATH_ROOT . '/plugins/privacy/helloworld/helloworld.php'))
		{
			$this->deleteFiles[] = '/plugins/privacy/helloworld/helloworld.php';
		}
	}

	/**
	 * Called on uninstall
	 *
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function uninstall($adapter)
	{

/***[JCBGUI.joomla_plugin.php_method_uninstall.66.$$$$]***/
// PHP script that should run during uninstall./***[/JCBGUI$$$$]***/

	}

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($route, $adapter)
	{
		// [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 432] set application to local method var, just use $this->app in future [we will drop $app in J6]
		$app = $this->app;

		// [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 440] the default for both install and update
		$jversion = new Version();
		if (!$jversion->isCompatible('5.0.0'))
		{
			$app->enqueueMessage('Please upgrade to at least Joomla! 5.0.0 before continuing!', 'error');
			return false;
		}

		if ('install' === $route)
		{

/***[JCBGUI.joomla_plugin.php_preflight_install.66.$$$$]***/
// PHP code that should run preflight during install.

			// check that helloworld is installed
			if (!is_dir(JPATH_ADMINISTRATOR . '/components/com_helloworld'))
			{
				$app->enqueueMessage('[[[component_acronym]]] must first be installed from <a href="[[[get_component_link]]]" target="_blank">[[[component_link_name]]]</a>.', 'error');
				return false;
			}/***[/JCBGUI$$$$]***/

		}

		if ('uninstall' === $route)
		{

/***[JCBGUI.joomla_plugin.php_preflight_uninstall.66.$$$$]***/
// PHP code that should run preflight during uninstall./***[/JCBGUI$$$$]***/

		}

		if ('update' === $route)
		{

/***[JCBGUI.joomla_plugin.php_preflight_update.66.$$$$]***/
 // PHP code that should run preflight during update./***[/JCBGUI$$$$]***/

		}

		// [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 359] remove old files and folders
		$this->removeFiles();

		return true;
	}

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install|update)
	 * @param   InstallerAdapter  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, $adapter)
	{
		// [VDM\Joomla\Componentbuilder\Compiler\Extension\JoomlaSix\InstallScript 432] set application to local method var, just use $this->app in future [we will drop $app in J6]
		$app = $this->app;

		if ('install' === $route)
		{

/***[JCBGUI.joomla_plugin.php_postflight_install.66.$$$$]***/
// PHP code that should run postflight during install./***[/JCBGUI$$$$]***/

		}

		if ('update' === $route)
		{

/***[JCBGUI.joomla_plugin.php_postflight_update.66.$$$$]***/
// PHP code that should run postflight during update./***[/JCBGUI$$$$]***/

		}

		return true;
	}

	/**
	 * Remove the files and folders in the given array from
	 *
	 * @return  void
	 * @since   5.0.2
	 */
	protected function removeFiles()
	{
		if (!empty($this->deleteFiles))
		{
			foreach ($this->deleteFiles as $file)
			{
				if (is_file(JPATH_ROOT . $file) && !File::delete(JPATH_ROOT . $file))
				{
					echo Text::sprintf('JLIB_INSTALLER_ERROR_FILE_FOLDER', $file) . '<br>';
				}
			}
		}

		if (!empty($this->deleteFolders))
		{
			foreach ($this->deleteFolders as $folder)
			{
				if (is_dir(JPATH_ROOT . $folder) && !Folder::delete(JPATH_ROOT . $folder))
				{
					echo Text::sprintf('JLIB_INSTALLER_ERROR_FILE_FOLDER', $folder) . '<br>';
				}
			}
		}
	}
}
