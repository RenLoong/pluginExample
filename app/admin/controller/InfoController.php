<?php

namespace plugin\pluginExample\app\admin\controller;

use app\Basic;
use app\expose\build\builder\ActionBuilder;
use app\expose\build\builder\InfoBuilder;
use app\expose\enum\Action;
use support\Request;

class InfoController extends Basic
{
    public function index(Request $request)
    {
        $builder = new InfoBuilder();
        $action = new ActionBuilder();
        $action->add('询问获取远程数据', [
            'path' => '/app/pluginExample/admin/Info/remote_data',
            'model' => Action::COMFIRM['value'],
            'props' => [
                'type' => 'primary',
                'title' => '询问获取远程数据'
            ],
            'component' => [
                'name' => 'button',
                'props' => [
                    'type' => 'primary',
                    'size' => 'small'
                ]
            ]
        ]);
        $action->add('直接获取远程数据', [
            'path' => '/app/pluginExample/admin/Info/remote_data',
            'model' => Action::REQUEST['value'],
            'props' => [
                'type' => 'primary',
                'title' => '直接获取远程数据'
            ],
            'component' => [
                'name' => 'button',
                'props' => [
                    'type' => 'primary',
                    'size' => 'small'
                ]
            ]
        ]);
        $builder->add('input', 'Input', 'span', [
            'col' => [
                'xs' => 24,
                'sm' => 24,
                'md' => 24,
                'lg' => 24,
                'xl' => 8,
            ],
            'props' => [
                'placeholder' => 'Input Placeholder',
                'clearable' => true
            ]
        ],$action);
        $subBuilder = new InfoBuilder('subInfo','Sub Info');
        $subBuilder->add('input1', 'Input', 'span', [
            'col' => [
                'xs' => 24,
                'sm' => 24,
                'md' => 24,
                'lg' => 24,
                'xl' => 8,
            ],
            'props' => [
                'placeholder' => 'Input Placeholder',
                'clearable' => true
            ]
        ]);
        $builder->addGroupInfo($subBuilder);
        $builder->setData([
            'input' => 'Input Value',
            'subInfo' => [
                'input1' => 'Sub Info Input Value'
            ]
        ]);
        return $this->resData($builder);
    }
    public function remote_data(Request $request)
    {
        $action = new ActionBuilder();
        $action->setData([
            'input' => '远程获取数据',
            'subInfo'=>[
                'input1' => 'Sub Info Input1 Value'
            ]
        ]);
        $action->setDataAction('append');
        return $this->resData($action);
    }
}
