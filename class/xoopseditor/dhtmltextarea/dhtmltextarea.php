<?php
/**
 * XOOPS dhtmltextarea class
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
 * @package         class
 * @subpackage      editor
 * @since           2.3.0
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: dhtmltextarea.php 12360 2014-03-08 09:46:59Z beckmi $
 */
defined( 'XOOPS_ROOT_PATH' ) or die( 'Restricted access' );

xoops_load('XoopsEditor');

/**
 * FormDhtmlTextArea
 *
 * @package
 * @author John
 * @copyright Copyright (c) 2009
 * @version $Id: dhtmltextarea.php 12360 2014-03-08 09:46:59Z beckmi $
 * @access public
 */
class FormDhtmlTextArea extends XoopsEditor
{
    /**
     * Hidden text
     *
     * @var string
     * @access private
     */
    var $_hiddenText = 'xoopsHiddenText';

    /**
     * FormDhtmlTextArea::__construct()
     *
     * @param array $options
     */
    function __construct($options = array())
    {
        parent::__construct( $options );
        $this->rootPath = '/class/xoopseditor/' . basename( dirname( __FILE__ ) );
        $hiddenText = isset( $this->configs['hiddenText'] ) ? $this->configs['hiddenText'] : $this->_hiddenText;
        xoops_load('XoopsFormDhtmlTextArea');
        $this->renderer = new XoopsFormDhtmlTextArea( '', $this->getName(), $this->getValue(), $this->getRows(), $this->getCols(), $hiddenText, $this->configs );
    }

    /**
     * FormDhtmlTextArea::FormDhtmlTextArea()
     *
     * @param array $options
     */
    function FormDhtmlTextArea($options = array())
    {
        $this->__construct($options);
    }

    /**
     * FormDhtmlTextArea::render()
     *
     * @return string
     */
    function render()
    {
        return $this->renderer->render();
    }
}
