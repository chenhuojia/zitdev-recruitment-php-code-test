<?php

namespace Test\Service;

use App\Service\AppLogger;
use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $productService;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->productService = new ProductHandler();
    }

    /**
     * 计算商品总金额
     * @doesNotPerformAssertions
     */
    public function testGetTotalPrice()
    {
        echo PHP_EOL;
        echo '题目1 计算商品总金额'.PHP_EOL;
        (new AppLogger())->info('商家总金额：'.$this->productService->testGetTotalPrice().PHP_EOL);
    }

    /**
     * 过滤Dessert类型产品并排序
     * @doesNotPerformAssertions
     * @return array
     */
    public function testSortAndFilterProduct()
    {
        echo PHP_EOL;
        echo '题目1 筛选Dessert类型产品并排序'.PHP_EOL;
        (new AppLogger())->info(var_export($this->productService->testSortAndFilterProduct(),true).PHP_EOL);
    }

    /**
     * 转化时间戳
     * @doesNotPerformAssertions
     */
    public function testChangeCreatedAt()
    {
        echo PHP_EOL;
        echo '题目1 转化时间戳'.PHP_EOL;
        (new AppLogger())->info(var_export($this->productService->testChangeCreatedAt(),true).PHP_EOL);
    }
}