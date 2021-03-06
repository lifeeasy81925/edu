<?php
/**
 * Extended object handlers
 *
 * For backward compatibility
 *
 * @copyright       The XOOPS project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @since           1.00
 * @version         $Id: object.php 12516 2014-04-30 14:03:37Z cesag $
 * @package         Frameworks
 * @subpackage      art
 */

//if (!class_exists("ArtObject")):
if (class_exists("ArtObject")) return;

/**
 * Art Object
 *
 * @author D.J. (phppp)
 * @copyright copyright &copy; 2005 XoopsForge.com
 * @package module::article
 *
 * {@link XoopsObject}
 **/

class ArtObject extends XoopsObject
{
    /**
     * @var string
     */
    var $plugin_path;

    /**
     * Constructor
     *
     */
    function ArtObject()
    {
    }
}

/**
* object handler class.
* @package module::article
*
* @author  D.J. (phppp)
* @copyright copyright &copy; 2000 The XOOPS Project
*
* {@link XoopsPersistableObjectHandler}
*
*/

class ArtObjectHandler extends XoopsPersistableObjectHandler
{

    var $db;

    /**
     * Constructor
     *
     * @param object $db             reference to the {@link XoopsDatabase} object
     * @param string $table
     * @param string $className
     * @param string $keyName
     * @param string $identifierName
     */

    function __construct(&$db, $table, $className, $keyName, $identifierName)
    {
        $this->db = $db;
        parent::__construct($db, $table, $className, $keyName, $identifierName);
    }

    /**
     * @param        $db
     * @param string $table
     * @param string $className
     * @param string $keyName
     * @param bool   $identifierName
     */
    function ArtObjectHandler(&$db, $table = "", $className = "", $keyName = "", $identifierName = false)
    {
        $this->__construct( $db, $table, $className, $keyName, $identifierName );
    }

    /**
     * get MySQL server version
     *
     * @param null $conn
     *
     * @return string
     */
    function mysql_server_version($conn = null)
    {
        if (!is_null($conn)) {
            return mysql_get_server_info($conn);
        } else {
            return mysql_get_server_info();
        }
    }

    /**
     * get MySQL major version
     *
     * @return integer : 3 - 4.1-; 4 - 4.1+; 5 - 5.0+
     */
    function mysql_major_version()
    {
        $version = $this->mysql_server_version();
        if (version_compare( $version, "5.0.0", "ge" ) ) $mysql_version = 5;
        elseif (version_compare( $version, "4.1.0", "ge" ) ) $mysql_version = 4;
        else $mysql_version = 3;
        return $mysql_version;
    }

    /**
     * @param object $object
     * @param bool   $force
     *
     * @return mixed
     */
    function insert(&$object, $force = true)
    {
        if ($ret = parent::insert($object, $force)) {
            $object->unsetNew();
        }

        return $ret;
    }
}
//endif;
