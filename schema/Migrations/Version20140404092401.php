<?php
/**
 * Created by JetBrains PhpStorm.
 * User: inform
 * Date: 21.02.14
 * Time: 10:03
 * To change this template use File | Settings | File Templates.
 */namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version20140404092401 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('categories')) {
            $sql = <<<SQL
CREATE TABLE categories (
categoriesId int primary key  autoincrement,
 categoryName varchar(255)
 )ENGINE=InnoDB DEFAULT CHARSET=utf8
SQL;
            $this->addSql($sql);

        }

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        if ($schema->hasTable('categories')) {
            $schema->dropTable('categories');
        }
    }
}