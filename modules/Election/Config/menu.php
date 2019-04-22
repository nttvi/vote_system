<?php 

return [
        'name' => 'Cuộc bầu cử',
        'route' => '',
        'sort' => 23,
        'active'=> 'election',
        'icon' => 'fas fa-vote-yea',
        'middleware' => [],
        'group' => [
                'list-election' => [
                        'name'  => trans('Danh sách cuộc bầu cử'),
                        'icon'  => null,
                        'route' => route('get.list.election')   ,
                        'active'=> 'list-election ',
                        'middleware' => [],
                ],
                'create-election' => [
                        'name'  => trans('Thêm mới cuộc bầu cử'),
                        'icon'  => null,
                        'route' => route('get.create.election')   ,
                        'active'=> 'create-election ',
                        'middleware' => [],
                ],

        // \TTSoft\Categories\Entities\Category::DOC_STATUS => [
        //     'name'  => trans('Tình trạng chứng từ'),
        //     'icon'  => null,
        //     'route' => route('categories.get.list',\TTSoft\Categories\Entities\Category::DOC_STATUS),
        //     'active'=> 'DOC_STATUS',
        //     'middleware' => [],
        // ],
        // \TTSoft\Categories\Entities\Category::POSITION => [
        //     'name'  => trans('Chức vụ'),
        //     'icon'  => null,
        //     'route' => route('categories.get.list',\TTSoft\Categories\Entities\Category::POSITION),
        //     'active'=> 'POSITION',
        //     'middleware' => [],
        // ],
        // \TTSoft\Categories\Entities\Category::EDUCATION => [
        //     'name'  => trans('Trình độ học vấn'),
        //     'icon'  => null,
        //     'route' => route('categories.get.list',\TTSoft\Categories\Entities\Category::EDUCATION),
        //     'active'=> 'POSITION',
        //     'middleware' => [],
        // ],
        
        ]
];