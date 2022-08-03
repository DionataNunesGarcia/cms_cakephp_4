<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTableContactsNewsLetters extends AbstractMigration
{
    /**
     * @return void
     */
    public function up()
    {
        $this->table('contacts_newsletters')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }

    /**
     * @return void
     */
    public function down()
    {
        $this->table('contacts_newsletters')
            ->drop()
            ->save();
    }
}
