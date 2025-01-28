<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsTable;
use Cake\TestSuite\TestCase;


class ProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsTable
     */
    protected $Products;
    public $import = ['table' => 'products'];
    public $records = [
        [
            'id' => 1,
            'name' => 'Product Name',
            'price' => 20.00,
            'quantity' => 10,
            'status' => 'low stock',
            'created' => '2023-01-01 00:00:00',
            'modified' => '2023-01-01 00:00:00'
        ],
    ];


    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Products') ? [] : ['className' => ProductsTable::class];
        $this->Products = $this->getTableLocator()->get('Products', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Products);
        parent::tearDown();
    }

    /**
     * Test insert data into the database
     *
     * @param array $data
     * @return void
     * @dataProvider dataProviderForDBTest
     */
    public function testInsertDataIntoDB(array $data)
    {
        $product = $this->Products->newEntity($data);
        $this->assertEmpty($product->getErrors(), 'Validation errors occurred: ' . print_r($product->getErrors(), true));
        $result = $this->Products->save($product);
        if ($result === false) {
            debug($product);
        }
        $this->assertNotFalse($result, 'The product should be saved successfully.');


        $savedProduct = $this->Products->get($result->id);
        $this->assertEquals($data['name'], $savedProduct->name, 'The product name should match.');
        $this->assertEquals($data['price'], $savedProduct->price, 'The product price should match.');
        $this->assertEquals($data['quantity'], $savedProduct->quantity, 'The product quantity should match.');
        // $this->assertEquals($data['satus'], $savedProduct->status, 'The product quantity should match.');
    }

    /**
     * Data provider for dataProviderForDBTest
     *
     * @return array
     */
    public function dataProviderForDBTest(): array
    {
        return [
            [
                [

                    'name' => 'Unitphp test product',
                    'price' => 20.00,
                    'quantity' => 10,
                    'status' => 'low stock',

                ]
            ],

            // [
            //     [
            //         'name' => 'Unit Test Product 1',
            //         'quantity' => 10,
            //         'status' => 'low stock',
            //         'price' => 99.99,
            //     ]
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 2',
            //         'price' => 5.50,
            //         'quantity' => 5,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 3',
            //         'price' => 50.50,
            //         'quantity' => 5,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 4',
            //         'price' => 40.50,
            //         'quantity' => 12,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 5',
            //         'price' => 100.50,
            //         'quantity' => 40,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 6',
            //         'price' => 10.50,
            //         'quantity' => 13,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 7',
            //         'price' => 20.50,
            //         'quantity' => 12,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 8',
            //         'price' => 15.50,
            //         'quantity' => 5,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 9',
            //         'price' => 30.10,
            //         'quantity' => 14,
            //         'status' => 'low stock',
            //     ],
            // ],
            // [
            //     [
            //         'name' => 'Unit Test Product 10',
            //         'price' => 50.50,
            //         'quantity' => 20,
            //         'status' => 'low stock',
            //     ],
            // ],

        ];
    }
}
