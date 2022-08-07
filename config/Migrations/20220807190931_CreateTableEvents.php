<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTableEvents extends AbstractMigration
{
    public function up()
    {
        $this->table('events')
            ->addColumn('title', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('slug', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('details', 'text', [
                'limit' => \Phinx\Db\Adapter\MysqlAdapter::TEXT_LONG,
                'null' => false,
            ])
            ->addColumn('event_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('start', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('all_day', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('event_status', 'enum', [
                'values' => [
                    'scheduled',
                    'confirmed',
                    'in progress',
                    'rescheduled',
                    'completed'
                ],
                'default' => 'scheduled'
            ])
            ->addColumn('foreign_key', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('model', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
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

        $this->table('events_types')
            ->addColumn('name', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('slug', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('color', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => 0,
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

    public function down()
    {
        $this->table('events')
            ->drop()
            ->save();

        $this->table('events_types')
            ->drop()
            ->save();
    }
}
