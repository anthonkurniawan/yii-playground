<?php
/**
 * INotificationManager interface
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.notifications
 * @subpackage Module.notifications.interface
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
/**
 * INotificationManager is the interface which describe functionality
 * of all managers which has posibility to work with notifications
 * 
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.notifications
 * @subpackage Module.notifications.interface
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
interface INotificationManager
{
    /**
     * Creates new notification and returns notification identifier
     * 
     * @param IActiveNotification $notification notification instance
     * 
     * @return integer notification identifier if it created successfully
     */
    public function add(IActiveNotification $notification);
    
    /**
     * Removes notification
     * 
     * @param IActiveNotification $notification notification object
     * 
     * @return boolean whether notification deleted successfully
     */
    public function delete(IActiveNotification $notification);
    
    /**
     * Returns actual database connection
     * 
     * @return CDbConnection opened database connection
     */
    public function getDbConnection();
}