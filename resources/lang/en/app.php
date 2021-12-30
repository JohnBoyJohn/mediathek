<?php

return [

    /**************************************************************************
    *                       CUSTOM LANGUAGE LINES                             *
    **************************************************************************/
    'pageTitle' => 'Movie Tracker',
    'footerTitle' => 'Footer',
    'Dashboard' => 'Dashboard',
    'requiredField' => '* = Pflichtfeld',
    'year' => 'Jahr',
    'selectDefault' => 'bitte auswählen',

    // Search Page
    'search' => [
        'title' => 'Suche',
        'submit' => 'suchen',
        'movieTitle' => 'Filmtitel',
        'type' => [
            'label' => 'Typ',
            'movie' => 'Film',
            'series' => 'Serie',
            'episode' => 'Episode',
        ],
        'watched' => 'gesehen'
    ],

    // List Page
    'list' => [
        'title' => 'Liste der gesehenen Filme',
        'table' => [
            'header' => [
                'title' => 'Title',
                'genre' => 'Genre',
                'released' => 'Released',
                'runtime' => 'Runtime',
                'extra' => 'Extra',
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
            'success' => 'Der Film wurde hinzugefügt.',
            'alreadyThere' => 'Der Film wurde bereits hinzugefüt.',
        ],
        'error' => 'Ein Fehler ist aufgetreten. Bitte probieren Sie es später erneut.',
    ],
];
