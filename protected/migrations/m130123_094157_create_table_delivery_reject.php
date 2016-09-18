<?php
/**
 * m130123_094157_create_table_delivery_reject class
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.data
 * @author     Cherepovski Dmitri <cherep@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */

/**
 * m130123_094157_create_table_delivery_reject is the database migration class
 * which applies changes in database which required for the functionale of delivery
 * rejection
 *
 * PHP version 5
 *
 * @category   Packages
 * @package    Module.delivery
 * @subpackage Module.delivery.data
 * @author     Cherepovski Dmitri <cherep@jviba.com>
 * @license    http://www.gnu.org/licenses/lgpl.html LGPL
 * @link       https://jviba.com/display/PhpDoc
 */
class m130123_094157_create_table_delivery_reject extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable(
            'delivery_reject',
            array(
                'id' => 'pk',
                'recipient_address' => 'string',
                'channel_type' => 'SMALLINT(5) UNSIGNED NOT NULL',
                'notification_type' => 'SMALLINT(5) UNSIGNED',
            )
        );
        $this->createIndex('recipient_address_index', 'delivery_reject', 'recipient_address');
	}

	public function safeDown()
	{
        $this->dropTable('delivery_reject');
	}
}