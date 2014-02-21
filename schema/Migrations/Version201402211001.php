<?php
/**
 * Created by JetBrains PhpStorm.
 * User: inform
 * Date: 21.02.14
 * Time: 10:13
 * To change this template use File | Settings | File Templates.
 */
namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version201402211001 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('table_name')) {
            $sql = <<<SQL
CREATE TABLE categories (
Описание полей
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
        if ($schema->hasTable('table_name')) {
            $schema->dropTable('table_name');
        }
    }
}