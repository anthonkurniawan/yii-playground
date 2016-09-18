<?php
/**
 * IActiveNotification interface
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.interface
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
/**
 * IActiveNotification is the interface which describe functionality
 * of all activerecord-based notifications models
 * 
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.interface
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
interface IActiveNotification
{
    /**
     * Returns notification type
     * 
     * @return integer notification type
     */
    public function getType();
    
    /**
     * Returns notification skeleton record
     * 
     * @return Notification notification skeleton
     */
    public function getSkeleton();
    
    /**
     * Changes notification skeleton record
     * 
     * @param Notification $skeleton notification skeleton
     * 
     * @return void
     */
    public function setSkeleton($skeleton);
}