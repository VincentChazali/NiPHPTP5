<?php
/**
 *
 * 错误日志 - 扩展 - 逻辑层
 *
 * @package   NiPHPCMS
 * @category  admin\logic\
 * @author    失眠小枕头 [levisun.mail@gmail.com]
 * @copyright Copyright (c) 2013, 失眠小枕头, All rights reserved.
 * @version   CVS: $Id: ExpandELog.php v1.0.1 $
 * @link      http://www.NiPHP.com
 * @since     2016/11/15
 */
namespace app\admin\logic;

use think\Request;
use util\File as UtilFile;

class ExpandELog
{
    protected $request = null;

    public function __construct()
    {
        $this->request = Request::instance();
    }

    /**
     * 列表数据
     * @access public
     * @param
     * @return array
     */
    public function getListData()
    {
        $dir = $this->request->param('name');
        $dir = $dir ? decrypt($dir) . DIRECTORY_SEPARATOR : $dir;

        $list = UtilFile::get(LOG_PATH . $dir);

        rsort($list);

        // 删除过期日志
        $days = strtotime('-90 days');
        foreach ($list as $key => $value) {
            if ($value['time'] <= $days) {
                UtilFile::delete(LOG_PATH . $dir . $value['name']);
                unset($list[$key]);
            } else {
                $list[$key]['id'] = encrypt($value['name']);
            }
        }

        return $list;
    }

    /**
     * 查看数据
     * @access public
     * @param
     * @return array
     */
    public function getOneData()
    {
        $dir = $this->request->param('name');
        $dir = $dir ? decrypt($dir) . DIRECTORY_SEPARATOR : $dir;

        $name = $this->request->param('id');
        $name = $name ? decrypt($name) : $name;

        return file_get_contents(LOG_PATH . $dir . $name);
    }
}
