<?php 

return [
        'name' => 'Thành viên',
        'route' => '',
        'sort' => 23,
        'active'=> 'member',
        'icon' => ' icon-people',
        'middleware' => [],
        'group' => [
                'list-member' => [
                        'name'  => trans('Danh sách thành viên'),
                        'icon'  => null,
                        'route' => route('get.list.member')   ,
                        'active'=> 'list-member ',
                        'middleware' => [],
                ],
                'create-member' => [
                        'name'  => trans('Thêm mới thành viên'),
                        'icon'  => null,
                        'route' => route('get.create.member')   ,
                        'active'=> 'create-member ',
                        'middleware' => [],
                ],
                'list-on-month-member' => [
                        'name'  => trans('Danh sách thành viên trong tháng'),
                        'icon'  => null,
                        'route' => route('get.list_on_month.member')   ,
                        'active'=> 'list-on-month-member',
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