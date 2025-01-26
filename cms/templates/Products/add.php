<!-- Show messages -->
<?= $this->Flash->render() ?>
<?= $this->Form->create($product, [
    'type' => 'post',
    'url' => ['action' => 'add']
]) ?>
<legend><?= __('Add a New Product') ?></legend>
<?= $this->Form->control(
    'name',
    [
        '
         label' => 'Product Name',
        'required' => true,
    ]
);
?>
<?= $this->Form->control(
    'quantity',
    [
        'label' => 'Product quantity',
        'required' => true,
        'type' => 'number',
        'min' => 0,
        'max' => 1000,
        'required' => true
    ]
);
?>
<?= $this->Form->control(
    'price',
    [
        'label' => 'Product Price',
        'required' => true,
        'step' => '0.01',
        'min' => 0,
        'required' => true
    ]
);
?>

<?= $this->Form->control(
    'status',
    [
        'label' => 'Status [Please, select an option]',
        'type' => 'select',
        'options' => [
            'in stock' => 'In Stock',
            'low stock' => 'Low Stock',
            'out of stock' => 'Out of Stock',
        ],
        'required' => true
    ]
);
?>
<?= $this->Form->button(__('Add prodcut')) ?>
<?= $this->Form->end() ?>