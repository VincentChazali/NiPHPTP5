<?php
/**
 *
 * 幻灯片 - 内容 - 逻辑层
 *
 * @package   NiPHPCMS
 * @category  admin\logic\
 * @author    失眠小枕头 [levisun.mail@gmail.com]
 * @copyright Copyright (c) 2013, 失眠小枕头, All rights reserved.
 * @version   CVS: $Id: ContentBanner.php v1.0.1 $
 * @link      http://www.NiPHP.com
 * @since     2016/11/14
 */
namespace app\admin\logic;

use think\Request;
use think\Lang;
use app\admin\model\Banner as ModelBanner;

class ContentBanner
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
        $map = ['pid' => $this->request->param('pid/f', 0)];

        $banner = new ModelBanner;
        $result =
        $banner->where($map)
        ->paginate();

        $list = [];
        foreach ($result as $value) {
            $list[] = $value->toArray();
        }

        $page = $result->render();

        return ['list' => $list, 'page' => $page];
    }

    /**
     * 添加数据
     * @access public
     * @param
     * @return boolean
     */
    public function added()
    {
        $data = [
            'name'   => $this->request->post('name', ''),
            'pid'    => $this->request->post('pid/f', 0),
            'title'  => $this->request->post('title', ''),
            'width'  => $this->request->post('width/d', 0),
            'height' => $this->request->post('height/d', 0),
            'image'  => $this->request->post('image', ''),
            'url'    => $this->request->post('url', ''),
            'lang'   => Lang::detect(),
        ];

        $banner = new ModelBanner;
        $banner->data($data)
        ->allowField(true)
        ->isUpdate(false)
        ->save();

        return $banner->id ? true : false;
    }

    /**
     * 查询编辑数据
     * @access public
     * @param
     * @return array
     */
    public function getEditorData()
    {
        $map = [
            'id' => $this->request->param('id/f')
        ];

        $banner = new ModelBanner;
        $result =
        $banner->field(true)
        ->where($map)
        ->find();

        return !empty($result) ? $result->toArray() : [];
    }

    /**
     * 编辑数据
     * @access public
     * @param
     * @return boolean
     */
    public function editor()
    {
        $data = [
            'name'   => $this->request->post('name', ''),
            'pid'    => $this->request->post('pid/f', 0),
            'title'  => $this->request->post('title', ''),
            'width'  => $this->request->post('width/d', 0),
            'height' => $this->request->post('height/d', 0),
            'image'  => $this->request->post('image', ''),
            'url'    => $this->request->post('url', ''),
        ];

        $map = ['id' => $this->request->post('id/f')];

        $banner = new ModelBanner;
        $result =
        $banner->allowField(true)
        ->isUpdate(true)
        ->save($data, $map);

        return $result ? true : false;
    }

    /**
     * 删除数据
     * @access public
     * @param
     * @return boolean
     */
    public function remove()
    {
        $id = $this->request->param('id/f');

        $banner = new ModelBanner;

        $map = ['pid' => $id];
        $result =
        $banner->where($map)
        ->delete();

        $map = ['id' => $id];
        $result =
        $banner->where($map)
        ->delete();

        return $result ? true : false;
    }

    /**
     * 排序
     * @access public
     * @param
     * @return boolean
     */
    public function listSort()
    {
        $post = $this->request->post('sort/a');
        foreach ($post as $key => $value) {
            $data[] = [
                'id' => $key,
                'sort' => $value,
            ];
        }

        $banner = new ModelBanner;
        $result =
        $banner->saveAll($data);

        return true;
    }
}
