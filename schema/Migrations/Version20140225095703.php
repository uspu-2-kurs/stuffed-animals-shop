<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nito
 * Date: 25.02.14
 * Time: 9:57
 * To change this template use File | Settings | File Templates.
 */

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema,
    Doctrine\DBAL\Schema\Table,
    Doctrine\DBAL\Schema\Column,
    Doctrine\DBal\Types\Type;

class Version20140225095703 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if (!$schema->hasTable('basket')) {
            $sql = <<<SQL
create table basket(
         basketId varchar(250),
         itemId int,
         number int
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
        if ($schema->hasTable('basket')) {
            $schema->dropTable('basket');
        }
    }
}