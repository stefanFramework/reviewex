<?php
return [
    'general' => [
        'title' => 'Reviewex',
        'slogan' => 'Speak your mind',
        'back_to_top' => 'TOP',
        'search' => 'Search your company ...',
        'copyright' => '&copy;Copyright 2021 <a href="#">Reviewex</a> All Rights Reserved',
        'all_right_reserved' => 'All Rights Reserved',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'back_home' => 'Go Home',
        'terms_and_conditions' => 'Terms & Conditions',
        'privacy_policy' => 'Privacy Policy',
        'follow_social' => 'Follow Us',
        'donate' => 'Donate',
    ],
    'errors' => [
        'general_error' => 'An unknown error has happend',
        'required' => 'This field is required',
        'url' => 'This field must be a valid url'
    ],
    'metadata' => [
        'title' => 'Reviewex',
        'keywords' => '',
        'description' => '',
        'author' => '', // Email address
        'viewport' => 'width=device-width, initial-scale=1, shrink-to-fit=no'
    ],
    'home' => [
        'register_new_company' => 'Register new company',
        'search_small_text' => 'Couldn\'t find the company you were looking for? <a href=":url">Register new company</a>',
        'main_content' => 'Lorem Ipsum'
    ],
    'company' => [
        'information' => [
            'reviews_title' => 'Reviews',
            'tags_title' => 'What people are saying',
            'tags_no_content' => 'No news so far ... be the first!',
            'reviews_summary_amount' => ':number reviews',

        ],
        'registration' => [
            'default_selection' => '',
            'title' => 'Register new Company',
            'subtitle' => 'All fields marked with * are required',
            'name' => 'Name',
            'business_sector' => 'Business Sector',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'website' => 'Website Url',
            'sidebar_title' => 'How does this work?',
            'sidebar_step_1' => 'Complete the form with the required information. </br> Once you are all done, submit the form for review',
            'sidebar_step_2' => 'Our team will review the information ',
            'sidebar_step_3' => 'The company will be available in the system for everybody',
            'duplicated_company' => 'The company that you are trying to register already exists in our system',
            'error' => 'Oh! Looks like something went wrong and we couldn\'t register your company :(',
        ],
        'success' => [
            'title' => 'Thank you for your contribution!',
            'body' => '<strong>:company</strong> was successfully registrated in our system.
                Now, our team is going to review the information you register, and make it public on the site for enyone to use.
                We thank you again for participate in this project, and hope to see you soon in our site.
                Have a nice day!',
            'after_message' => 'What? Wanna add a review for the company you just registered? Sure! Just click on the button below'
        ]
    ],
    'review' => [
        'create' => 'Create review'
    ]
];
