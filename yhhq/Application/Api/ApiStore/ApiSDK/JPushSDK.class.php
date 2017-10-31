<?php
/**
 * 极光推送Manager
 * @since   2017/03/24 创建
 * @author  zhaoxiang <zhaoxiang051405@gmail.com>
 */

namespace Api\ApiStore\ApiSDK;


use Api\ApiStore\ApiSDK\JPush\Device;
use Api\ApiStore\ApiSDK\JPush\Push;
use Api\ApiStore\ApiSDK\JPush\Report;
use Api\ApiStore\ApiSDK\JPush\Schedule;

class JPushSDK {

    public static function push() {
        return new Push();
    }

    public static function report() {
        return new Report();
    }

    public static function device() {
        return new Device();
    }

    public static function schedule() {
        return new Schedule();
    }
}