<!-- Nav buttons to go back to home, add or delete the item -->
<div class="btmNav">
    <p><?= $this->Html->link('Back to Home Page', ['action' => 'index'], ['class' => 'button']) ?></p>
    <p><?= $this->Html->link('Add New Product', ['action' => 'add'], ['class' => 'button']) ?></p>
    <p> <?= $this->Html->link("View product", ['action' => 'view', $product->id], ['class' => 'button']) ?></p>
    <p> <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id],  ['class' => 'button'], ['confirm' => __('Are you sure you want to delete: {0}?', $product->name)]) ?></p>
</div>


<h1>You are editing The Priduction, make sure to enter the correct data!</h1>
<?= $this->Flash->render() ?>
<!-- Edit Product Form -->
<div class="form-container">
    <?= $this->Form->create($product, ['type' => 'post']) ?>
    <fieldset>
        <?php
        echo $this->Form->control('name', [
            'label' => 'Product Name',
            'required' => true,
            'placeholder' => 'Enter the product name',
        ]);

        echo $this->Form->control('quantity', [
            'label' => 'Quantity',
            'required' => true,
            'type' => 'number',
            'min' => 0,
            'max' => 1000,
        ]);

        echo $this->Form->control('price', [
            'label' => 'Price (£)',
            'required' => true,
            'type' => 'number',
            'step' => '0.01',
            'min' => 0,
        ]);

        echo $this->Form->control('status', [
            'label' => 'Status',
            'type' => 'select',
            'options' => [
                'in stock' => 'In Stock',
                'low stock' => 'Low Stock',
                'out of stock' => 'Out of Stock',
            ],
        ]);
        ?>
    </fieldset>

    <?= $this->Form->button(__('Update Changes'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>