<?php
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version20140225100502 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('items')) {
            $sql = <<<SQL
create table items(
itemId int Primary Key auto_increment,
itemName varchar(255),
itemDescription text,
itemPrice decimal(10,2)
);
SQL;
            $this->addSql($sql);
        }
    }

    public function down(Schema $schema)
    {
        if ($schema->hasTable('items')) {
            $schema->dropTable('items');
        }
    }
}