<h2>Products Index</h2>

<!-- Flash messages for feedback -->
<?= $this->Flash->render() ?>

<!-- Products Table -->
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