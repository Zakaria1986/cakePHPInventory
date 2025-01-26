<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateProducts extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('products');
        $table
            ->addColumn('name', 'string', ['limit' => 50, 'null' => false])
            ->addColumn('quantity', 'integer', ['default' => 0, 'null' => false])
            ->addColumn('price', 'decimal', ['precision' => 4, 'scale' => 2, 'null' => false])
            ->addColumn('status', 'string', ['null' => false])
            ->addColumn('created', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('modified', 'datetime', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
//bin/cake migrations migrate
