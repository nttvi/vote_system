<?php 

return [
        'name' => 'Cuộc bầu chọn',
        'route' => '',
        'sort' => 23,
        'active'=> 'election',
        'icon' => 'fas fa-vote-yea',
        'middleware' => [],
        'group' => [
                'list-election' => [
                        'name'  => trans('Danh sách cuộc bầu chọn'),
                        'icon'  => null,
                        'route' => route('get.list.election')   ,
                        'active'=> 'list-election ',
                        'middleware' => [],
                ],
                'create-election' => [
                        'name'  => trans('Thêm mới cuộc bầu chọn'),
                        'icon'  => null,
                        'route' => route('get.create.election')   ,
                        'active'=> 'create-election ',
                        'middleware' => [],
                ],

        ]
];