<?php
$prodId = $product->id;
$prodName = $product->name;
$prodPrice = $product->price;
$prodQuantity = $product->quantity;
$prodSatus = $product->status;
?>
<!-- Custome CSS style -->
<style type="text/css">
    .prodTitleClass {
        font-weight: bold;
    }

    .btmNav {

        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 10px;

    }

    .p {
        grid-area: 1 / 1 / 1/ span 0 / span 0;
    }
</style>
<p><?= $this->Html->link('Back to Home Page', ['action' => 'index'], ['class' => 'button']) ?></p>
<h1>You are viewing individual Product: </h1>
<div class="product-container">
    <p class="product-title">
        <span class="prodTitleClass"> id: </span><?= $prodId ?>
    </p>
    <p class="product-description"> <span class="prodTitleClass"> Product Name: </span><?= $prodName ?></p>
    <p class="product-description"> <span class="prodTitleClass"> Prdocut price: £</span> <?= $prodPrice  ?></p>
    <P class="product-price"> <span class="prodTitleClass"> Product quantity: </span><?= $prodQuantity ?></p>
    <p class="product-price"> <span class="prodTitleClass"> Product Status: </span><?= $prodSatus ?></p>
</div>


<div class="btmNav">
    <p><?= $this->Html->link('Add New Product', ['action' => 'add'], ['class' => 'button']) ?></p>
    <p><?= $this->Html->link('Edit Product', ['action' => 'edit'], ['class' => 'button']) ?></p>
    <p> <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $prodId],  ['class' => 'button'], ['confirm' => __('Are you sure you want to delete: {0}?', $product->name)]) ?></p>

</div>