<?php
declare(strict_types=1);

use Migrations\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddCommonTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('system_parameters')
            ->addColumn('social_reason', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('fantasy_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('cnpj_cpf', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('generate_access_logs', 'boolean', [
                'default' => 1,
                'null' => false,
            ])
            ->addColumn('generate_change_log', 'boolean', [
                'default' => 1,
                'null' => false,
            ])
            ->addColumn('emails', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
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

        $this->table('status')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('alias', 'string', [
                'default' => null,
                'limit' => 100,
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

        $this->table('levels')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('deletable', 'boolean', [
                'default' => 1,
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

        $this->table('levels_permissions')
            ->addColumn('level_id', 'integer', [
                'default' => 11,
                'null' => false,
            ])
            ->addColumn('prefix', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('controller', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('action', 'string', [
                'default' => null,
                'limit' => 150,
                'null' => false,
            ])
            ->create();

        $this->table('users')
            ->addColumn('user', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('status', 'integer', [
                'default' => 11,
                'null' => false,
            ])
            ->addColumn('super', 'boolean', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('level_id', 'integer', [
                'default' => 11,
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

        $this->table('logs_access')
            ->addColumn('user_id', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
            ->addColumn('ip', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('logs_change')
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('table_name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('record_id', 'integer', [
                'default' => 1,
                'null' => false,
            ])
            ->addColumn('action_type', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('new_value', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
                'null' => false,
            ])
            ->addColumn('old_value', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('about')
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('cell_phone', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('facebook', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('instagram', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('linkedin', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('github', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('about', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
                'null' => true,
            ])
            ->addColumn('vision', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
                'null' => true,
            ])
            ->addColumn('mission', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
                'null' => true,
            ])
            ->addColumn('values_about', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
                'null' => true,
            ])
            ->create();

        $this->table('uploads')
            ->addColumn('filename', 'string', [
                'default' => null,
                'limit' => 1000,
                'null' => false,
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
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('order_files', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('extension', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('alt', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'limit' => MysqlAdapter::TEXT_LONG,
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
}
