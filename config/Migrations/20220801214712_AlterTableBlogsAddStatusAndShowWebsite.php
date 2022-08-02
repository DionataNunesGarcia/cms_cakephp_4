<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterTableBlogsAddStatusAndShowWebsite extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('blogs')
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
                'after' => 'user_id',
            ])
            ->addColumn('show_website', 'boolean', [
                'default' => 0,
                'null' => false,
                'after' => 'user_id',
            ])
            ->changeColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->update();
    }

    /**
     * @return void
     */
    public function down()
    {
        $this->table('blogs')
            ->removeColumn('status')
            ->removeColumn('show_website')
            ->update();
    }
}
