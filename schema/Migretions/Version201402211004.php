<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version20140211155200 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('order')) {
            $sql = <<<SQL
CREATE TABLE order  (
orderID int primary key autoincrement,
phone varchar(255),
address text,
total decimal(10,2)

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
        if ($schema->hasTable('order')) {
            $schema->dropTable('order');
        }
    }
}

