<?php

declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Products seed.
 */
class ProductsSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {

        $data = [
            [
                'name' => 'Test Product 1',
                'quantity' => 100,
                'price' => 19.99,
                'status' => 'in stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Test Product 2',
                'quantity' => 0,
                'price' => 9.99,
                'status' => 'out of stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Test Product 3',
                'quantity' => 100,
                'price' => 19.99,
                'status' => 'in stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Test Product 4',
                'quantity' => 0,
                'price' => 9.99,
                'status' => 'out of stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Test Product 5',
                'quantity' => 0,
                'price' => 9.99,
                'status' => 'out of stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Test Product 6',
                'quantity' => 0,
                'price' => 9.99,
                'status' => 'out of stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Test Product 6',
                'quantity' => 0,
                'price' => 9.99,
                'status' => 'out of stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Test Product 6',
                'quantity' => 0,
                'price' => 9.99,
                'status' => 'out of stock',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ]
        ];
        // identify the table
        $table = $this->table('products');
        // Insert into the table
        $table->insert($data)->save();
    }
}
