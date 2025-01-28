<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\ProductsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\ProductsController Test Case
 *
 * @uses \App\Controller\ProductsController
 */
class ProductsControllerTest extends TestCase
{
    use IntegrationTestTrait;
    // test data 
    public array $data = [
        'name' => 'Add new item 1 through controller',
        'price' => 30.00,
        'quantity' => 10,
        'status' => 'in stock'
    ];

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Products',
    ];
    public function setUp(): void
    {
        parent::setUp();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
    }
    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\ProductsController::index()
     */
    public function testIndex(): void
    {
        $this->get('/products');
        $this->get('/products/index');
        $this->get('/products/add');
        $this->assertResponseOk();
        $this->assertResponseContains('Products');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\ProductsController::view()
     */
    public function testView(): void
    {
        $this->get('/products/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\ProductsController::add()
     * dataProvider test_data_for_add
     */

    public function testAdd(): void
    {
        $this->post(
            '/products/add',
            [
                'name' => 'Add new item 1 through controller',
                'price' => 20.00,
                'quantity' => 10,
                'status' => 'in stock'

            ],
            [
                'name' => 'Add new item 1 through controller 2',
                'price' => 33.00,
                'quantity' => 0,
                'status' => 'out of stock'

            ],
            [
                'name' => 'Add new item 1 through controller 3',
                'price' => 30.00,
                'quantity' => 11,
                'status' => 'in stock'

            ],
            [
                'name' => 'Add new item 1 through controller 4',
                'price' => 5,
                'quantity' => 40,
                'status' => 'in stock'

            ],
            [
                'name' => 'Add new item 1 through controller 5',
                'price' => 10.00,
                'quantity' => 4,
                'status' => 'low stock'

            ],
            [
                'name' => 'Add new item 1 through controller 6',
                'price' => 40.00,
                'quantity' => 10,
                'status' => 'low stock'

            ]
        );
        $this->assertResponseSuccess();
        $this->assertRedirect(['action' => 'index']);
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\ProductsController::edit()
     */
    public function testEdit(): void
    {
        // seems like datas are being stored in the database
        $data = [
            [
                'name' => 'Editing New Product',
                'price' => 30.00,
                'quantity' => 4,
                'status' => 'low stock'
            ],
            [
                'name' => 'Editing new item 1 through controller 5',
                'price' => 10.00,
                'quantity' => 4,
                'status' => 'Low stock'

            ],
            [
                'name' => 'Edting new item 1 through controller 6',
                'price' => 40.00,
                'quantity' => 20,
                'status' => 'in stock'

            ]
        ];
        // getting error on this one
        $this->put('/products/edit/3', $data);
        $this->assertResponseSuccess();
        $this->assertRedirect(['action' => 'index']);
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\ProductsController::delete()
     */
    public function testDelete(): void
    {
        $this->delete('/products/delete/12');
        $this->assertResponseSuccess(); // database is not being connected. This might further need connecting with the database. 
        $this->assertRedirect(['action' => 'index']);
    }

    // this is data provider for the test however its seem like that is not longer supported as it give depricated warning. 

    // public function test_data_for_add(): array
    // {
    //     return [

    //         [
    //             [
    //                 'name' => 'Add new item 1 through controller',
    //                 'price' => 30.00,
    //                 'quantity' => 10,
    //                 'status' => 'in stock'

    //             ]
    //         ]
    //     ];
    // }
}

// Command to run when testing the script 
// vendor/bin/phpunit tests/TestCase/Controller/ProductsControllerTest.php
