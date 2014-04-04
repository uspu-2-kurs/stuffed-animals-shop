<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version20140307094005 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('order_list')) {
            $sql = <<<SQL
CREATE TABLE order_list(
    orderId INT NOT NULL,
    itemId INT NOT NULL,
    number INT NOT NULL,
    price DECIMAL(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;
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