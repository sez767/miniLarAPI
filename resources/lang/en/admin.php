<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'arrival' => [
        'title' => 'Arrival',

        'actions' => [
            'index' => 'Arrival',
            'create' => 'New Arrival',
        ],
    ],
    'tour' => [
        'title' => 'Tours',

        'actions' => [
            'index' => 'Tours',
            'create' => 'New Tour',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'begin' => 'Begin',
            'end' => 'End',
            'tour_id' => 'Tour name',
        ]    
            
        
    ],

    // Do not delete me :) I'm used for auto-generation
];