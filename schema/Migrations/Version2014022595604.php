<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nito
 * Date: 25.02.14
 * Time: 9:56
 * To change this template use File | Settings | File Templates.
 */

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version2014022595604 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('order')) {
            $sql = <<<SQL

create table `order` (
orderId int primary key auto_increment,
address text,
phone varchar (255),
total decimal (10,2)
)
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
