<?php
/**
 * Created by PhpStorm.
 * User: inform
 * Date: 07.03.14
 * Time: 10:19
 */
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version20140307094504 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('order')) {
            $sql = <<<SQL
CREATE TABLE order(
        orderId INT NOT NULL auto_increment,
    	address TEXT DEFAULT '',
		phone CHAR(255) NOT NULL DEFAULT 0,
		total DECIMAL(10,2) NOT NULL DEFAULT 0,
		PRIMARY KEY (orderId),
 )ENGINE=MyISAM DEFAULT CHARSET=UTF8;
SQL;
            $this->addSql($sql);
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        if ($schema->hasTable('order')) {
            $schema->dropTable('order');
        }
    }
}