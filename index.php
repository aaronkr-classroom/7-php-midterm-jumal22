<?php include 'includes/header.php'; ?>

<?php
$products = [
    [
        'name' => '키보드',
        'price' => 30000,
        'stock' => 10
    ],
    [
        'name' => '마우스',
        'price' => 15000,
        'stock' => 3
    ],
    [
        'name' => '모니터',
        'price' => 120000,
        'stock' => 0
    ]
];

function getStockMessage($stock)
{
    if ($stock >= 5) {
        return ['msg' => '재고 충분', 'class' => 'good'];
    } elseif ($stock >= 1) {
        return ['msg' => '재고 부족', 'class' => 'low'];
    } else {
        return ['msg' => '품절', 'class' => 'out'];
    }
}

$totalInventoryValue = 0;
$productCount = count($products);
?>

<table>
    <tr>
        <th>상품명</th>
        <th>가격</th>
        <th>재고</th>
        <th>재고 상태</th>
    </tr>

    <?php $totalStock = 0; 
        foreach ($products as $product): 
        $status = getStockMessage($product['stock']);
        $totalStock += $product['stock'];
        $totalInventoryValue += $product['price'] * $product['stock'];
    ?>
    <tr>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo number_format($product['price']); ?>원</td>
        <td><?php echo $product['stock']; ?>개</td>
        <td class="<?php echo $status['class']; ?>"><?php echo $status['msg']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="summary">
    <p>총 상품 종류: <?php echo $productCount; ?>종 [키보드, 마우스, 모니터]</p>
    <p>총 상품 개수: <?php echo $totalStock; ?>개 [10,3,0]</p>
    <p><strong>전체 재고 가격: <?php echo number_format($totalInventoryValue); ?>원</strong></p>
</div>

<?php include 'includes/footer.php'; ?>