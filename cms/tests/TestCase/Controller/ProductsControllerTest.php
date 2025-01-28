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
        $this->post('/products/add', [
            'name' => 'Add new item 1 through controller',
            'price' => 30.00,
            'quantity' => 10,
            'status' => 'in stock'

        ]);
        $this->assertResponseSuccess();
        $this->assertRedirect(['action' => 'index']);

        // Verify the product was saved in the database
        $products = $this->getTableLocator()->get('Products');
        $product = $products->find()->where(['name' => 'Add new item 1 through controller'])->first();
        $this->assertNotEmpty($product, 'The product saved in the database.');
        $this->assertEquals(30, $product->price);
        $this->assertEquals(10, $product->quantity);
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
            'name' => 'New Product',
            'price' => 30.00,
            'quantity' => 10,
            'status' => 'in stock'
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

        $products = $this->getTableLocator()->get('Products');
        $query = $products->find()->where(['id' => 1]);
        $this->assertEquals(0, $query->count());
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
