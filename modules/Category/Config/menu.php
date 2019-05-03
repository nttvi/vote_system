<?php 

return [
        'name' => 'Thể loại',
        'route' => '',
        'sort' => 23,
        'active'=> 'category',
        'icon' => 'fas fa-bars',
        'middleware' => [],
        'group' => [
                'list-category' => [
                        'name'  => trans('Danh sách thể loại bầu chọn'),
                        'icon'  => null,
                        'route' => route('get.list.election_type')   ,
                        'active'=> 'list-category ',
                        'middleware' => [],
                ],
                'create-category' => [
                        'name'  => trans('Thêm mới thể loại bầu chọn'),
                        'icon'  => null,
                        'route' => route('get.create.election_type')   ,
                        'active'=> 'create-category ',
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