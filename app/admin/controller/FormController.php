<?php

namespace plugin\pluginExample\app\admin\controller;

use app\Basic;
use app\expose\build\builder\ActionBuilder;
use app\expose\build\builder\FormBuilder;
use app\expose\enum\Action;
use app\expose\enum\State;
use support\Request;

class FormController extends Basic
{
    public function index(Request $request)
    {
        $builder = new FormBuilder();
        $action = new ActionBuilder();
        $action->add('询问获取远程数据', [
            'path' => '/app/pluginExample/admin/Form/remote_data',
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
            'path' => '/app/pluginExample/admin/Form/remote_data',
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
        $builder->add('input', 'Input', 'input', '', [
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
        ], $action);
        $builder->add('select', 'Select', 'select', '', [
            'col' => [
                'xs' => 24,
                'sm' => 24,
                'md' => 24,
                'lg' => 24,
                'xl' => 8,
            ],
            'props' => [
                'placeholder' => 'Select Placeholder',
                'clearable' => true
            ],
            'options' => [
                [
                    'label' => '选项一',
                    'value' => '选项一'
                ],
                [
                    'label' => '选项二',
                    'value' => '选项二',
                    'tips' => '选项二Tips'
                ]
            ]
        ]);
        $builder->add('remote_select', 'Remote Select', 'select', '', [
            'col' => [
                'xs' => 24,
                'sm' => 24,
                'md' => 24,
                'lg' => 24,
                'xl' => 8,
            ],
            'remote' => [
                'url' => '/app/pluginExample/admin/Form/remote_select'
            ],
            'props' => [
                'placeholder' => 'Remote Select Placeholder',
                'clearable' => true
            ],
            'options' => []
        ]);
        $builder->add('mention', 'Mention', 'mention', '', [
            'col' => [
                'xs' => 24,
                'sm' => 24,
                'md' => 24,
                'lg' => 24,
                'xl' => 8,
            ],
            'remote' => [
                'url' => '/app/pluginExample/admin/Form/remote_select'
            ],
            'props' => [
                'placeholder' => 'Mention Placeholder',
                'clearable' => true
            ],
            'options' => []
        ]);
        $builder->add('autocomplete', 'Autocomplete', 'autocomplete', '', [
            'col' => [
                'xs' => 24,
                'sm' => 24,
                'md' => 24,
                'lg' => 24,
                'xl' => 8,
            ],
            'remote' => [
                'url' => '/app/pluginExample/admin/Form/remote_select'
            ],
            'props' => [
                'placeholder' => 'Autocomplete Placeholder',
                'clearable' => true
            ],
            'options' => []
        ]);
        $builder->add('switch', '状态', 'switch', '', [
            'col' => [
                'xs' => 24,
                'sm' => 24,
                'md' => 24,
                'lg' => 24,
                'xl' => 8,
            ],
            'props' => [
                'active-value' => State::YES['value'],
                'inactive-value' => State::NO['value']
            ]
        ]);
        $builder->add('bundle', '附件库', 'bundle', '', [
            'props' => [
                // 'accept' => 'image/*',
                'multiple' => 1
            ]
        ]);
        return $this->resData($builder);
    }
    public function remote_select(Request $request)
    {
        $keyword = $request->post('keyword');
        $form = $request->post('form');
        $options = [
            [
                'label' => '选项一',
                'value' => '选项一'
            ],
            [
                'label' => '选项二',
                'value' => '选项二',
                'tips' => '选项二Tips'
            ]
        ];
        return $this->resData($options);
    }
    public function remote_data(Request $request)
    {
        $action = new ActionBuilder();
        $action->setData([
            'input' => '远程获取数据',
            'select' => '选项一'
        ]);
        $action->setDataAction('append');
        return $this->resData($action);
    }
}
