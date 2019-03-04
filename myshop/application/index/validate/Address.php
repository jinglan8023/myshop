<?php
namespace app\index\validate;
use think\Validate;
class Address extends Validate
{
    //规则
    protected $rule=[
        'address_man'=>'require',
        'address_tel'=>'require',
        'address_detail'=>'require',
        'province'=>'require',
        'city'=>'require',
        'district'=>'require',
    ];
    //提示
    protected $message=[
        'address_man.require'=>'收件人姓名必填',
        'address_tel.require'=>'收件人电话必填',
        'address_detail.require'=>'收件人详细地址必填',
        'province.require'=>'配送区域必选',
        'city.require'=>'配送区域必选',
        'district.require'=>'配送区域必选',
    ];
    //场景
    protected $scene=[
        'add'=>['address_man','address_tel','address_detail','province','city','district'],
    ];
}