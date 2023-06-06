<?php
return [
    'slider' => [
        'field_name' => [
            'title' => 'text',
            'sub_title' => 'text',
            'details' => 'text',
            'button_name' => 'text',
            'button_link' => 'url',
            'button_note' => 'text',
            'image' => 'file',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'information.*' => 'required|max:100',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '1920x1080'
        ]
    ],

    'how-it-work' => [
        'field_name' => [
            'title' => 'text',
            'image' => 'file',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'image.*' => 'required|max:2000|image|mimes:jpg,jpeg,png',
        ],
        'size' => [
            'image' => '80x80'
        ]
    ],
    'faq' => [
        'field_name' => [
            'title' => 'text',
            'description' => 'textarea'
        ],
        'validation' => [
            'title.*' => 'required|max:190',
            'description.*' => 'required|max:3000'
        ]
    ],
    'testimonial' => [
        'field_name' => [
            'name' => 'text',
            'designation' => 'text',
            'description' => 'textarea',
            'image' => 'file'
        ],
        'validation' => [
            'name.*' => 'required|max:100',
            'designation.*' => 'required|max:2000',
            'description.*' => 'required|max:2000',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '55x55'
        ]
    ],


    'why-chose-us' => [
        'field_name' => [
            'title' => 'text',
            'information' => 'textarea',
            'image' => 'file',
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'information.*' => 'required|max:300',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '50x50'
        ]
    ],

    'blog' => [
        'field_name' => [
            'title' => 'text',
            'description' => 'textarea',
            'image' => 'file'
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'description.*' => 'required|max:3500',
            'image.*' => 'nullable|max:3072|image|mimes:jpg,jpeg,png'
        ],
        'size' => [
            'image' => '670x424',
            'thumb' => '290x236'
        ]
    ],





    'social' => [
        'field_name' => [
            'name' => 'text',
            'icon' => 'icon',
            'link' => 'url',
        ],
        'validation' => [
            'name.*' => 'required|max:100',
            'icon.*' => 'required|max:100',
            'link.*' => 'required|max:100'
        ],
    ],


    'support' => [
        'field_name' => [
            'title' => 'text',
            'description' => 'textarea'
        ],
        'validation' => [
            'title.*' => 'required|max:100',
            'description.*' => 'required|max:5000'
        ]
    ],


    'message' => [
        'required' => 'This field is required.',
        'min' => 'This field must be at least :min characters.',
        'max' => 'This field may not be greater than :max characters.',
        'image' => 'This field must be image.',
        'mimes' => 'This image must be a file of type: jpg, jpeg, png.',
    ],

    'content_media' => [
        'image' => 'file',
        'thumbnail' => 'file',
        'youtube_link' => 'url',
        'button_link' => 'url',
        'link' => 'url',
        'icon' => 'icon'
    ]
];
