<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $quantity
 * @property string $price
 * @property string $status
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */

    // This is a virtual status, meaning it doesn't not interact with the database
    protected array $_accessible = [
        'name' => true,
        'quantity' => true,
        'price' => true,
        'status' => true,
    ];

    /*
    this getter method _get< the column to get from the table used to 
    get the value of status here which then dynamcally sets the status based on conditions>
    */
    protected function _getStatus()
    {
        if ($this->quantity > 10) {
            return 'In stock';
        } elseif ($this->quantity > 0) {
            return 'Low stock';
        } else {
            return 'Out of stock';
        }
    }
}
