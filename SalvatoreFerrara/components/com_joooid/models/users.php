<?php
/**
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die;

JFactory::getLanguage()->load('com_users', JPATH_ADMINISTRATOR);

require_once(JPATH_ADMINISTRATOR.'/components/com_users/models/users.php');

class JOOOIDModelUsers extends UsersModelUsers
{
	protected $context = 'com_joooid.users';

	/**
	 * NO METHODS, ALWAYS CALL SUPERCLASS
	 */

}

