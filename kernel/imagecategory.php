<?php
/**
 * XOOPS Kernel Class
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         kernel
 * @since           2.0.0
 * @author          Kazumi Ono (AKA onokazu) http://www.myweb.ne.jp/, http://jp.xoops.org/
 * @version         $Id: imagecategory.php 12537 2014-05-19 14:19:33Z beckmi $
 */
defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * @author  Kazumi Ono <onokazu@xoops.org>
 * @copyright copyright (c) 2000 XOOPS.org
 **/

/**
 * XOOPS Image Category
 *
 * @package     kernel
 *
 * @author        Kazumi Ono    <onokazu@xoops.org>
 * @copyright    copyright (c) 2000-2003 XOOPS.org
 */
class XoopsImagecategory extends XoopsObject
{
    var $_imageCount;

    /**
     * Constructor
     **/
    function XoopsImagecategory()
    {
        $this->XoopsObject();
        $this->initVar('imgcat_id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('imgcat_name', XOBJ_DTYPE_TXTBOX, null, true, 100);
        $this->initVar('imgcat_display', XOBJ_DTYPE_INT, 1, false);
        $this->initVar('imgcat_weight', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('imgcat_maxsize', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('imgcat_maxwidth', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('imgcat_maxheight', XOBJ_DTYPE_INT, 0, false);
        $this->initVar('imgcat_type', XOBJ_DTYPE_OTHER, null, false);
        $this->initVar('imgcat_storetype', XOBJ_DTYPE_OTHER, null, false);
    }

    /**
     * Returns Class Base Variable imgcat_id
     */
    function id($format = 'N')
    {
        return $this->getVar('imgcat_id', $format);
    }

    /**
     * Returns Class Base Variable imgcat_id
     */
    function imgcat_id($format = '')
    {
        return $this->getVar('imgcat_id', $format);
    }

    /**
     * Returns Class Base Variable imgcat_name
     */
    function imgcat_name($format = '')
    {
        return $this->getVar('imgcat_name', $format);
    }

    /**
     * Returns Class Base Variable imgcat_display
     */
    function imgcat_display($format = '')
    {
        return $this->getVar('imgcat_display', $format);
    }

    /**
     * Returns Class Base Variable imgcat_weight
     */
    function imgcat_weight($format = '')
    {
        return $this->getVar('imgcat_weight', $format);
    }

    /**
     * Returns Class Base Variable imgcat_maxsize
     */
    function imgcat_maxsize($format = '')
    {
        return $this->getVar('imgcat_maxsize', $format);
    }

    /**
     * Returns Class Base Variable imgcat_maxwidth
     */
    function imgcat_maxwidth($format = '')
    {
        return $this->getVar('imgcat_maxwidth', $format);
    }

    /**
     * Returns Class Base Variable imgcat_maxheight
     */
    function imgcat_maxheight($format = '')
    {
        return $this->getVar('imgcat_maxheight', $format);
    }

    /**
     * Returns Class Base Variable imgcat_type
     */
    function imgcat_type($format = '')
    {
        return $this->getVar('imgcat_type', $format);
    }

    /**
     * Returns Class Base Variable imgcat_storetype
     */
    function imgcat_storetype($format = '')
    {
        return $this->getVar('imgcat_storetype', $format);
    }

    /**
     * Enter description here...
     *
     * @param unknown_type $value
     */
    function setImageCount($value)
    {
        $this->_imageCount = intval($value);
    }

    /**
     * Enter description here...
     *
     * @return unknown
     */
    function getImageCount()
    {
        return $this->_imageCount;
    }

}

/**
 * XOOPS image caetgory handler class.
 * This class is responsible for providing data access mechanisms to the data source
 * of XOOPS image category class objects.
 *
 *
 * @author  Kazumi Ono <onokazu@xoops.org>
 */

class XoopsImagecategoryHandler extends XoopsObjectHandler
{
    /**
     * Create a new {@link XoopsImageCategory}
     *
     * @param  boolean $isNew Flag the object as "new"
     * @return object
     **/
    function &create($isNew = true)
    {
        $imgcat = new XoopsImagecategory();
        if ($isNew) {
            $imgcat->setNew();
        }

        return $imgcat;
    }

    /**
     * Load a {@link XoopsImageCategory} object from the database
     *
     * @param int $id ID
     *
     * @internal param bool $getbinary
     * @return object {@link XoopsImageCategory}, FALSE on fail
     */
    function &get($id)
    {
        $id = intval($id);
        $imgcat = false;
        if ($id > 0) {
            $sql = 'SELECT * FROM ' . $this->db->prefix('imagecategory') . ' WHERE imgcat_id=' . $id;
            if (!$result = $this->db->query($sql)) {
                return $imgcat;
            }
            $numrows = $this->db->getRowsNum($result);
            if ($numrows == 1) {
                $imgcat = new XoopsImagecategory();
                $imgcat->assignVars($this->db->fetchArray($result));
            }
        }

        return $imgcat;
    }

    /**
     * Write a {@link XoopsImageCategory} object to the database
     *
     * @param  object &$imgcat {@link XoopsImageCategory}
     * @return bool
     **/
    function insert(&$imgcat)
    {
        /**
         * @TODO: Change to if (!(class_exists($this->className) && $obj instanceof $this->className)) when going fully PHP5
         */
        if (!is_a($imgcat, 'xoopsimagecategory')) {
            return false;
        }

        if (!$imgcat->isDirty()) {
            return true;
        }
        if (!$imgcat->cleanVars()) {
            return false;
        }
        foreach ($imgcat->cleanVars as $k => $v) {
            ${$k} = $v;
        }
        if ($imgcat->isNew()) {
            $imgcat_id = $this->db->genId('imgcat_imgcat_id_seq');
            $sql = sprintf("INSERT INTO %s (imgcat_id, imgcat_name, imgcat_display, imgcat_weight, imgcat_maxsize, imgcat_maxwidth, imgcat_maxheight, imgcat_type, imgcat_storetype) VALUES (%u, %s, %u, %u, %u, %u, %u, %s, %s)", $this->db->prefix('imagecategory'), $imgcat_id, $this->db->quoteString($imgcat_name), $imgcat_display, $imgcat_weight, $imgcat_maxsize, $imgcat_maxwidth, $imgcat_maxheight, $this->db->quoteString($imgcat_type), $this->db->quoteString($imgcat_storetype));
        } else {
            $sql = sprintf("UPDATE %s SET imgcat_name = %s, imgcat_display = %u, imgcat_weight = %u, imgcat_maxsize = %u, imgcat_maxwidth = %u, imgcat_maxheight = %u, imgcat_type = %s WHERE imgcat_id = %u", $this->db->prefix('imagecategory'), $this->db->quoteString($imgcat_name), $imgcat_display, $imgcat_weight, $imgcat_maxsize, $imgcat_maxwidth, $imgcat_maxheight, $this->db->quoteString($imgcat_type), $imgcat_id);
        }
        if (!$result = $this->db->query($sql)) {
            return false;
        }
        if (empty($imgcat_id)) {
            $imgcat_id = $this->db->getInsertId();
        }
        $imgcat->assignVar('imgcat_id', $imgcat_id);

        return true;
    }

    /**
     * Delete an image from the database
     *
     * @param  object &$imgcat {@link XoopsImageCategory}
     * @return bool
     **/
    function delete(&$imgcat)
    {
        /**
         * @TODO: Change to if (!(class_exists($this->className) && $obj instanceof $this->className)) when going fully PHP5
         */
        if (!is_a($imgcat, 'xoopsimagecategory')) {
            return false;
        }

        $sql = sprintf("DELETE FROM %s WHERE imgcat_id = %u", $this->db->prefix('imagecategory'), $imgcat->getVar('imgcat_id'));
        if (!$result = $this->db->query($sql)) {
            return false;
        }

        return true;
    }

    /**
     * Enter description here...
     *
     * @param  unknown_type       $criteria
     * @param  bool|\unknown_type $id_as_key
     * @return unknown
     */
    function getObjects($criteria = null, $id_as_key = false)
    {
        $ret = array();
        $limit = $start = 0;
        $sql = 'SELECT DISTINCT c.* FROM ' . $this->db->prefix('imagecategory') . ' c LEFT JOIN ' . $this->db->prefix('group_permission') . " l ON l.gperm_itemid=c.imgcat_id WHERE (l.gperm_name = 'imgcat_read' OR l.gperm_name = 'imgcat_write')";
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $where = $criteria->render();
            $sql .= ($where != '') ? ' AND ' . $where : '';
            $limit = $criteria->getLimit();
            $start = $criteria->getStart();
        }
        $sql .= ' ORDER BY imgcat_weight, imgcat_id ASC';
        $result = $this->db->query($sql, $limit, $start);
        if (!$result) {
            return $ret;
        }
        while ($myrow = $this->db->fetchArray($result)) {
            $imgcat = new XoopsImagecategory();
            $imgcat->assignVars($myrow);
            if (!$id_as_key) {
                $ret[] =& $imgcat;
            } else {
                $ret[$myrow['imgcat_id']] =& $imgcat;
            }
            unset($imgcat);
        }

        return $ret;
    }

    /**
     * Count some images
     *
     * @param  object $criteria {@link CriteriaElement}
     * @return int
     **/
    function getCount($criteria = null)
    {
        $sql = 'SELECT COUNT(*) FROM ' . $this->db->prefix('imagecategory') . ' i LEFT JOIN ' . $this->db->prefix('group_permission') . " l ON l.gperm_itemid=i.imgcat_id WHERE (l.gperm_name = 'imgcat_read' OR l.gperm_name = 'imgcat_write')";
        if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
            $where = $criteria->render();
            $sql .= ($where != '') ? ' AND ' . $where : '';
        }
        if (!$result =& $this->db->query($sql)) {
            return 0;
        }
        list ($count) = $this->db->fetchRow($result);

        return $count;
    }

    /**
     * Get a list of imagesCaegories
     *
     * @param  array  $groups
     * @param  string $perm
     * @param  null   $display
     * @param  null   $storetype
     * @internal param int $imgcat_id
     * @internal param bool $image_display
     * @return array  Array of {@link XoopsImage} objects
     */
    function getList($groups = array(), $perm = 'imgcat_read', $display = null, $storetype = null)
    {
        $criteria = new CriteriaCompo();
        if (is_array($groups) && !empty($groups)) {
            $criteriaTray = new CriteriaCompo();
            foreach ($groups as $gid) {
                $criteriaTray->add(new Criteria('gperm_groupid', $gid), 'OR');
            }
            $criteria->add($criteriaTray);
            if ($perm == 'imgcat_read' || $perm == 'imgcat_write') {
                $criteria->add(new Criteria('gperm_name', $perm));
                $criteria->add(new Criteria('gperm_modid', 1));
            }
        }
        if (isset($display)) {
            $criteria->add(new Criteria('imgcat_display', intval($display)));
        }
        if (isset($storetype)) {
            $criteria->add(new Criteria('imgcat_storetype', $storetype));
        }
        $categories =& $this->getObjects($criteria, true);
        $ret = array();
        foreach (array_keys($categories) as $i) {
            $ret[$i] = $categories[$i]->getVar('imgcat_name');
        }

        return $ret;
    }
}
