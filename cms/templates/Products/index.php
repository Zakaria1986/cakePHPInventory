<!-- Flash messages for feedback -->
<?= $this->Flash->render() ?>

<!-- Filter Form -->
<section class='filter_and_search_sec'>
    <div class="filter-form ">
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <!-- filter starts here -->
        <fieldset>
            <?= $this->Form->control('status', [
                'type' => 'select',
                'style' => 'width: 100%;',
                'options' => [
                    '' => 'All', // Default to show all products
                    'in stock' => 'In Stock',
                    'low stock' => 'Low Stock',
                    'out of stock' => 'Out of Stock',
                ],
                'value' => $status, // Remmber the select key
            ]) ?>
        </fieldset>

        <!-- The action buttons i.e. submit -->
        <?= $this->Form->button(__('filter')) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="search-form">
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <fieldset>
            <?= $this->Form->control('search', [
                'type' => 'text',
                'placeholder' => 'Search by name',
                'style' => 'width:100%;',
                'value' => $searchQuery, // Remember the search key
            ]) ?>
        </fieldset>
        <?= $this->Form->button(__('Search')) ?>
        <?= $this->Form->end() ?>
    </div>
</section>
<!-- Products Table -->
<h2>Products Index</h2>
<table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id', 'ID') ?></th>
            <th><?= $this->Paginator->sort('name', 'Name') ?></th>
            <th><?= $this->Paginator->sort('quantity', 'Quantity') ?></th>
            <th><?= $this->Paginator->sort('price', 'Price') ?></th>
            <th><?= $this->Paginator->sort('status', 'Status') ?></th>
            <th class="actions"><?= __('Edit | Delete') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= h($product->id) ?></td>
                    <td> <?= $this->Html->link(__(h($product->name)), ['action' => 'view', $product->id]) ?>
                    <td><?= h($product->quantity) ?></td>
                    <td><?= h($product->price) ?></td>
                    <td><?= h($product->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?> |
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete: {0}?', $product->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6"><?= __('No proudcts has been added, Please new products') ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<!-- Add New Item Nav -->
<p><?= $this->Html->link('Add New Product', ['action' => 'add'], ['class' => 'button']) ?></p>

<!-- Pagination Controls -->
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('First')) ?>
        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Next') . ' >') ?>
        <?= $this->Paginator->last(__('Last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>