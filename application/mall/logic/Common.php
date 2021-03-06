<?php
/**
 *
 * 常用设置 - 公众 - 逻辑层
 *
 * @package   NiPHPCMS
 * @category  mall\logic\
 * @author    失眠小枕头 [levisun.mail@gmail.com]
 * @copyright Copyright (c) 2013, 失眠小枕头, All rights reserved.
 * @version   CVS: $Id: Common.php v1.0.1 $
 * @link      http://www.NiPHP.com
 * @since     2016/11/25
 */
namespace app\mall\logic;

use think\Request;
use think\Lang;
use think\Config;
use think\Cookie;
use think\Url;
use think\Cache;
use app\admin\model\Config as ModelConfig;

class Common
{
    protected $request = null;
    protected $toHtml = [
        'mall_bottom_message',
        'mall_copyright',
        'mall_script'
    ];

    public function __construct()
    {
        $this->request = Request::instance();
    }

    /**
     * 获得网站基本设置数据
     * @access public
     * @param
     * @return array
     */
    public function getMallData()
    {
        $module = strtolower($this->request->module());
        $map = [
            'name' => [
                'in',
                'mall_name,mall_keywords,mall_description,mall_bottom_message,mall_copyright,mall_script,' . $module . '_theme'
            ],
            'lang' => Lang::detect()
        ];

        $config = new ModelConfig;

        $result =
        $config->field(true)
        ->where($map)
        ->cache(!APP_DEBUG, 0)
        ->select();

        $data = [];
        foreach ($result as $value) {
            $value = $value->toArray();
            if (in_array($value['name'], $this->toHtml)) {
                $data[$value['name']] = htmlspecialchars_decode($value['value']);
            } else {
                $data[$value['name']] = $value['value'];
            }
        }

        return $data;
    }
}
