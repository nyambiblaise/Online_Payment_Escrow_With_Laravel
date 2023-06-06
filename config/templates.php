<?php
return [

    'about-us' => [
        'field_name' => [
            'short_title' => 'text',
            'title' => 'text',
            'short_description' => 'textarea',
            'youtube_link' => 'url'
        ],
        'validation' => [
            'short_title.*' => 'required|max:100',
            'title.*' => 'required|max:100',
            'short_description.*' => 'required|max:2000'
        ]
    ],


    'faq' => [
        'field_name' => [
            'short_title' => 'text',
            'title' => 'text',
            'short_details' => 'textarea',
        ],
        'validation' => [
            'short_title.*' => 'required|max:100',
            'title.*' => 'required|max:100',
            'short_details.*' => 'required|max:2000'
        ]
    ],

    'testimonial' => [
        'field_name' => [
            'short_title' => 'text',
            'title' => 'text',
            'description' => 'text',
        ],
        'validation' => [

            'short_title.*' => 'required|max:200',
            'title.*' => 'required|max:200',
            'description.*' => 'required|max:2000'
        ]
    ],


    'how-it-work' => [
        'field_name' => [
            'short_title' => 'text',
            'title' => 'text',
            'description' => 'text',
        ],
        'validation' => [
            'title.*' => 'required|max:200',
            'description.*' => 'required|max:2000'
        ],
        'size' => [
            'image' => '960x500'
        ]
    ],

    'why-chose-us' => [
        'field_name' => [
            'short_title' => 'text',
            'title' => 'text',
            'description' => 'text',
        ],
        'validation' => [
            'short_title.*' => 'required|max:200',
            'title.*' => 'required|max:200',
            'description.*' => 'required|max:2000'
        ]
    ],


    'news-letter' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text'
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'sub_title.*' => 'required|max:2000'
        ]
    ],


    'we-accept' => [
        'field_name' => [
            'short_title' => 'text',
            'title' => 'text',
            'short_details' => 'textarea',
        ],
        'validation' => [
            'short_title.*' => 'required|max:100',
            'title.*' => 'required|max:100',
            'short_details.*' => 'required|max:2000'
        ]
    ],


    'contact-us' => [
        'field_name' => [
            'short_title' => 'text',
            'title' => 'text',
            'short_details' => 'text',
            'address' => 'text',
            'email' => 'text',
            'phone' => 'text',
            'footer_left_text' => 'textarea',
            'image' => 'file'
        ],
        'validation' => [
            'short_title.*' => 'required|max:100',
            'title.*' => 'required|max:100',
            'short_details.*' => 'required|max:200',
            'address.*' => 'required|max:2000',
            'email.*' => 'required|max:2000',
            'phone.*' => 'required|max:2000',
            'footer_left_text.*' => 'required|max:2000',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png',
        ]
    ],


    'message' => [
        'required' => 'This field is required.',
        'min' => 'This field must be at least :min characters.',
        'max' => 'This field may not be greater than :max characters.',
        'image' => 'This field must be image.',
        'mimes' => 'This image must be a file of type: jpg, jpeg, png.',
    ],
    'template_media' => [
        'image' => 'file',
        'thumbnail' => 'file',
        'youtube_link' => 'url',
        'button_link' => 'url',
    ]
];
