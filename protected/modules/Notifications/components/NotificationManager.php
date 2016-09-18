<?php
/**
 * NotificationManager class
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.notifications
 * @subpackage Module.notifications.component
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
/**
 * BaseDeliveryManager is the manager class which has basic
 * functionality of all delivery managers
 * 
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.notifications
 * @subpackage Module.notifications.component
 * @author     Evgeniy Marilev <marilev@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
class NotificationManager extends CComponent implements INotificationManager
{
    const CONFIG_DATABASE_CONNECTION = 'connection';
    
    /**
     * Delivering defaults
     * @var array
     */
    private $_defaults = array(
        self::CONFIG_DATABASE_CONNECTION => 'db',
    );
    
    /**
     * Result configuration
     * @var array
     */
    private $_config;
    
    /**
     * Custom options
     * @var array
     */
    public $config = array();
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
    }
    
    /**
     * Manager initialization
     * 
     * @return void
     * @see SearchModel::init()
     */
    public function init()
    {
    }
    
    /**
     * Creates new notification and returns notification identifier
     * 
     * @param IActiveNotification $notification notification instance
     * 
     * @return integer notification skeleton identifier if it creation successfull
     */
    public function add(IActiveNotification $notification)
    {
        $db = $this->getDbConnection();
        $transaction = $db->getCurrentTransaction();
        $newTransaction = false;
        if (!$transaction || !$transaction->getActive()) {
            $transaction = $db->beginTransaction();
            $newTransaction = true;
        }
        try {
            if (!$skeleton = $notification->getSkeleton()) {
                $skeleton = new Notification();
                $skeleton->type = $notification->getType();
                if (!$skeleton->save()) {
                    $message = 'Can\'t save notification skeleton!';
                    throw new Exception($message);
                }
                $notification->setSkeleton($skeleton);
            }
            if (!$notification->save()) {
                $message = 'Can\'t save notification!';
                throw new Exception($message);
            }
            if ($newTransaction && $transaction->getActive()) {
                $transaction->commit();
            }
            return $skeleton->id;
        } catch (Exception $e) {
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
            if ($newTransaction && $transaction->getActive()) {
                $transaction->rollback();
            }
        }
        return null;
    }
    
    /**
     * Removes notification
     * 
     * @param IActiveNotification $notification notification object
     * 
     * @return boolean whether notification deleted successfully
     */
    public function delete(IActiveNotification $notification)
    {
        $skeleton = $notification->getSkeleton();
        return $skeleton->delete();
    }
    
    /**
     * Returns actual database connection
     * 
     * @return CDbConnection opened database connection
     */
    public function getDbConnection()
    {
        $config = $this->getConfig();
        return Yii::app()->getComponent($config[self::CONFIG_DATABASE_CONNECTION]);
    }
    
    /**
     * Returns result delivering configuration
     * 
     * @return array delivering configuration
     */
    protected function getConfig()
    {
        if (!isset($this->_config)) {
            $this->_config = CMap::mergeArray($this->_defaults, $this->config);
        }
        return $this->_config;
    }
}