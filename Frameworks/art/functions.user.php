<?php
/**
 * user/member handlers
 *
 * @copyright       The XOOPS project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @since           1.00
 * @version         $Id: functions.user.php 12360 2014-03-08 09:46:59Z beckmi $
 * @package         Frameworks
 * @subpackage      art
 */
if (!defined("FRAMEWORKS_ART_FUNCTIONS_USER")):
define("FRAMEWORKS_ART_FUNCTIONS_USER", true);

xoops_load('XoopsUserUtility');

    /**
     * @param bool $asString
     *
     * @return mixed
     */
    function mod_getIP($asString = false)
{
    $GLOBALS['xoopsLogger']->addDeprecated("Deprecated function '" . __FUNCTION__ . "', use XoopsUserUtility directly.");

    return XoopsUserUtility::getIP($asString);
}

    /**
     * @param      $uid
     * @param bool $usereal
     * @param bool $linked
     *
     * @return array
     */
    function &mod_getUnameFromIds( $uid, $usereal = false, $linked = false )
{
    $GLOBALS['xoopsLogger']->addDeprecated("Deprecated function '" . __FUNCTION__ . "', use XoopsUserUtility directly.");
    $ids = XoopsUserUtility::getUnameFromIds($uid, $usereal, $linked);

    return $ids;
}

    /**
     * @param      $uid
     * @param int  $usereal
     * @param bool $linked
     *
     * @return string
     */
    function mod_getUnameFromId( $uid, $usereal = 0, $linked = false)
{
    $GLOBALS['xoopsLogger']->addDeprecated("Deprecated function '" . __FUNCTION__ . "', user XoopsUserUtility directly.");

    return XoopsUserUtility::getUnameFromId($uid, $usereal, $linked);
}

endif;
