<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version201402211002 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('items')) {
            $sql = <<<SQL
    CREATE TABLE items (
itemId int primary key  autoincrement,
itemName varchar(255),
itemDescription text,
itemPrice float)
ENGINE=InnoDB DEFAULT CHARSET=utf8
SQL;
            $this->addSql($sql);

        }

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        if ($schema->hasTable('items')) {
            $schema->dropTable('items');
        }
    }
}