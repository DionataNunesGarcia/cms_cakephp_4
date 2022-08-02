<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterTableAddFieldsProfile extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
                'after' => 'password',
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
                'after' => 'password',
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
                'after' => 'status',
            ])
            ->addColumn('cell_phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
                'after' => 'status',
            ])
            ->addColumn('first_access', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'after' => 'status',
            ])
            ->addColumn('last_access', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'after' => 'status',
            ])
            ->update();
    }

    /**
     * @return void
     */
    public function down()
    {
        $this->table('users')
            ->removeColumn('email')
            ->removeColumn('name')
            ->removeColumn('phone')
            ->removeColumn('cell_phone')
            ->removeColumn('first_access')
            ->removeColumn('last_access')
            ->update();
    }
}
