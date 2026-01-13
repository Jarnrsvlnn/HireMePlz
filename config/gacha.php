<?php

return [
    'tiers' => [
        'Godlike' => [
            'weight' => 1,
        ],
        'Legendary' => [
            'weight' => 9,
        ],
        'Epic' => [
            'weight' => 20,
        ],
        'Kinda mid' => [
            'weight' => 30
        ],
        'Uncommon' => [
            'weight' => 25
        ],
        'Common' => [
            'weight' => 15
        ]
    ],

    'pity' => [
        'limited' => [
            'after' => 60,
            'min_tier' => 'Godlike'
        ],
        'beginner' => [
            'after' => 40,
            'min_tier' => 'Legendary'
        ],
        'standard' => [
            'after' => 90,
            'min_tier' => 'Godlike'
        ],
    ],

    'banners' => [
        'limited' => [
            'title' => "Limited Time Banner",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            'rules' => [
                'allowed_tiers' => ['Godlike', 'Legendary', 'Epic'],
                'allow_exclusive' => true
            ]
        ],
        'beginner' => [
            'title' => "Beginner's Banner",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            'rules' => [
                'allowed_tiers' => ['Epic', 'Kinda mid', 'Uncommon', 'Common'],
                'allow_exclusive' => false
            ]
        ],
        'standard' => [
            'title' => "Standard Banner",
            'description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
            'rules' => [
                'allowed_tiers' => ['Godlike', 'Legendary', 'Epic', 'Kinda mid', 'Uncommon', 'Common'],
                'allow_exclusive' => false
            ]
        ]
    ]
];
