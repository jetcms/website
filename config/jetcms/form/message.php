<?php return [
    'layouts' => 'form.layouts.master',
    'success_redirect' => null,
    'success_tpl' => 'form.success.default',
    'email_to' => ['alexbaks@bk.ru'],
    'email_subject' => 'Заявка',
    'only'=> [
        'name',
        'email',
        'messages'
    ],
    'flash_only'=> [
        'name',
        'email',
        'messages'
    ],
    'vlidation'=>[
        'name' => 'required',
        'email' => 'required|min:7'
    ],
    'description'=>[
        'telefon.min' => 'Слишком кароткий номер'
    ]
];