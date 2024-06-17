<?php
return [
    'register' => [
        'password' => [
            'required' => 'Vui lòng nhập mật khẩu.',
            'min' => 'Mật khẩu phải có ít nhất :min ký tự.',
        ],
        'confirm-password' => [
            'required' => 'Vui lòng xác nhận mật khẩu.',
            'min' => 'Mật khẩu xác nhận phải có ít nhất :min ký tự.',
            'same' => 'Mật khẩu xác nhận không trùng khớp với mật khẩu đã nhập.',
        ],
        'username' => [
            'required' => 'Vui lòng nhập tên người dùng.',
            'max' => 'Tên người dùng không được vượt quá :max ký tự.',
            'unique' => 'Tên người dùng đã tồn tại.',
        ],
        'birthday' => [
            'required' => 'Vui lòng nhập ngày sinh.',
            'date' => 'Ngày sinh không hợp lệ.',
            'before_or_equal' => 'Ngày sinh phải nhỏ hơn hoặc bằng ngày hiện tại.',
            'after_or_equal' => 'Ngày sinh phải lớn hơn hoặc bằng ngày 01/01/1940.',
        ],
        'name' => [
            'required' => 'Vui lòng nhập tên.',
            'max' => 'Tên không được vượt quá :max ký tự.',
            'regex' => 'Tên chỉ được chứa các ký tự chữ cái, khoảng trắng và dấu gạch ngang.',
        ],
        'email' => [
            'required' => 'Vui lòng nhập địa chỉ email.',
            'email' => 'Địa chỉ email không hợp lệ.',
            'max' => 'Địa chỉ email không được vượt quá :max ký tự.',
            'unique' => 'Địa chỉ email đã tồn tại.',
        ],
    ],
    'login' => [
        'username' => [
            'required' => 'Vui lòng nhập tên tài khoản hoặc email.',
        ],
        'password' => [
            'required' => 'Vui lòng nhập mật khẩu.',
        ]
    ]
];

