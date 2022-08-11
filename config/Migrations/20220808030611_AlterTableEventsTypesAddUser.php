<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterTableEventsTypesAddUser extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('events_types')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
                'after' => 'status',
            ])
            ->addColumn('deletable', 'boolean', [
                'default' => 1,
                'null' => false,
                'after' => 'status',
            ])
            ->update();
    }

    /**
     * @return void
     */
    public function down()
    {
        $this->table('events_types')
            ->removeColumn('user_id')
            ->update();
    }
}
