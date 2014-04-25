<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version201404040915 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('order_list')) {
            $sql = <<<SQL
CREATE TABLE order_list (
orderId int,
itemId int,
number  int,
price decimal (10,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
SQL;

            $this->addSql($sql);

        }

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        if ($schema->hasTable('order_list')) {
            $schema->dropTable('order_list');
        }
    }
}
/**
 * Created by JetBrains PhpStorm.
 * User: inform
 * Date: 21.02.14
 * Time: 9:37
 * To change this template use File | Settings | File Templates.
 */
