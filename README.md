# recruitment-php-code-test

## 步骤

```shell
git clone https://github.com/zitdev/recruitment-php-code-test.git
cd recruitment-php-code-test
composer install
#写一个App\Demo类的单元测试（文件名：tests/App/DemoTest.php）
#执行单元测试
./vendor/phpunit/phpunit/phpunit tests/App/DemoTest.php 
```


## 题目4

### geoHelperAddress
- 41行 convert_addresses 远程接口返回值没有检验是否存在所用到数组的键和值
- 50行 商家位置的座標 使用枚举类或属性来维护
- 52行 $merchant_id 远程接口返回值没有检验是否存在
- 52行 $merchant_id 远程接口返回正确数据后是否需要缓存数据
- 59，71，74行 返回值return 既有false，又有0 不规范
- 61行 if条件结果为false时，应该区分44行$response['error'] != 0 的日记记录
- 高并发场景下 44行如果 $response['error'] != 0 需要缓存错误信息（缓存一定时间），避免短时间内大量无效远程接口请求

### checkStatusCallback
- 82，86，92行 $status 应该用枚举来定义而非硬编码(方便扩展和维护)
- 82，86，92行 $code_arr 与 $open_code 数据类型应该和$status一致
- 93行 $open_status_arr[$status]如果没存在会报错