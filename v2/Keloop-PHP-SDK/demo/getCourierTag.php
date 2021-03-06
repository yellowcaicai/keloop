<?php

/*
 *   Copyright (c) 2012—2016 成都零点信息技术有限公司 All
 */

/**
 * 获取配送员的最新坐标
 *
 * @author xuhaha
 */

header("Content-type: text/html; charset=utf-8");

// 引用keloopSDK文件
require '../KeloopSdk2.php';

// TODO:: 从数据库中获取 access_key 和 access_sec，下面直接定义两个变量
$accessKey = 'K6GQF8N8';
$accessSec = 'Z0AX4ZHH';
// 封装参数
$para = array(
    'trade_no' => '17060808582300002'
);
// 如果之前使用了 v1 版本的开放接口，生成的 access_key 和开发密钥(dev_secret)未绑定，则进行兼容绑定
$para['dev_secret'] = '9LIYXQ2PTKSZNGUJHHESXP7V1COHY2TW';
// 创建 SDK 实例
$sdk = new KeloopCnSdk2($accessKey, $accessSec);
// 调用 getCourierTag 方法
$result = $sdk->getCourierTag($para);
// 业务逻辑处理
if (is_null($result)) {
    exit('获取配送员最新坐标接口异常');
} else if (is_array($result)) {
    if ($result['code'] == 200) {
        $data = $result['data'];
        var_dump($data);
        exit('success');
    } else {
        exit('错误信息：' . $result['message']);
    }
} else {
    exit('接口调用异常');
}
