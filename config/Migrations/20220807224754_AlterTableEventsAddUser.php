<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterTableEventsAddUser extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('events')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
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
        $this->table('events')
            ->removeColumn('user_id')
            ->update();
    }
}
