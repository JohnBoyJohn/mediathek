<?php

return [

    /**************************************************************************
    *                       CUSTOM LANGUAGE LINES                             *
    **************************************************************************/
    'pageTitle' => 'Movie Tracker',
    'footerTitle' => 'Footer',
    'Dashboard' => 'Dashboard',
    'requiredField' => '* required',
    'year' => 'Jahr',
    'selectDefault' => 'select',

    // Sidebar
    'sidebar' => [
        'dashboard' => 'Movie Dashboard',
        'search' => 'Movie Search'
    ],

    // Search Page
    'search' => [
        'title' => 'Search',
        'resultTitle' => 'Search Result',
        'submit' => 'search',
        'movieTitle' => 'Movie Title',
        'type' => [
            'label' => 'Type',
            'movie' => 'Movie',
            'series' => 'Series',
            'episode' => 'Episode',
        ],
        'watched' => 'watched',

        'released' => 'Release Date',
        'runtime' => 'Runtime',
        'plot' => 'Plot',
    ],

    // List Page
    'list' => [
        'title' => 'List of watched movies',
        'table' => [
            'header' => [
                'title' => 'Title',
                'genre' => 'Genre',
                'released' => 'Released',
                'runtime' => 'Runtime',
            ],
        ],
    ],

    // Details Page
    'details' => [
        'title' => 'Movie Details',
    ],
    
    // AJAX Messages
    'messages' => [
        'movie' => [
            'success' => 'The movie was successfully added',
            'alreadyThere' => 'The movie was added before.',
        ],
        'error' => 'An error occours. Please try again later.',
    ],
];
