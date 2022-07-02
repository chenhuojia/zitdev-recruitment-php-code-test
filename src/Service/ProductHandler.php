<?php

namespace App\Service;

class ProductHandler
{

    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    /**
     * 计算商品总金额
     * @return int|mixed
     */
    public function testGetTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }

    /**
     * 过滤Dessert类型产品并排序
     * @return array
     */
    public function testSortAndFilterProduct()
    {
        $product = [];
        foreach ($this->products as $item)
        {
            if (ucfirst($item['type']) == 'Dessert') $product[] = $item;
        }
        $price = array_column($product, 'price');
        array_multisort($price,SORT_DESC,$product);
        return $product;
    }

    /**
     * 转化时间戳
     * @return array[]
     */
    public function testChangeCreatedAt()
    {
        $newProduct = [];
        foreach ($this->products as $product)
        {
            $product['unix_create_at'] = isset($product['create_at']) && $product['create_at'] ? strtotime($product['create_at']) : 0;
            $newProduct[]         = $product;
        }
        return $newProduct;
    }

}