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
        'home' => 'Home',
        'about' => 'About Us',
        'about_content' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,',
        'terms_and_conditions' => 'Terms & Conditions',
        'privacy_policy' => 'Privacy Policy',
        'follow_social' => 'Follow Us',
        'donate' => 'Donate',
        'companies' => 'Companies',
        'reviews' => 'Reviews',
    ],
    'errors' => [
        'page_not_found' => 'Page Not Found',
        'page_not_found_text' => 'The page you were looking for could not be found.',
        'error_404' => 'Error 404',
        '404' => '404',
        'internal_error' => 'Internal Error',
        'internal_error_text' => 'Unexpected error',
        'error_500' => 'Error 500',
        '500' => '500',
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
        'main_content' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the gre',
        'services_1' => [
            'icon' => 'flaticon-loupe',
            'title' => 'Find the Company you want to check out',
            'description' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was bo'
        ] ,
        'services_2' => [
            'icon' => 'flaticon-laptop',
            'title' => 'Take a look at what people are saying',
            'description' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was bo'
        ],
        'services_3' => [
            'icon' => 'flaticon-done',
            'title' => 'Add your own opinion',
            'description' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was bo'
        ],
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
            'name' => 'Name *',
            'business_sector' => 'Business Sector *',
            'country' => 'Country *',
            'state' => 'State *',
            'city' => 'City *',
            'website' => 'Website Url *',
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
        'create' => 'Create review',
        'subtitle' => 'All fields marked with * are required',
        'title_label' => 'Title',
        'text_label' => 'Text',
        'score_label' => 'Score',
        'tags_label' => 'Chose your tags',
        'sidebar_title' => 'How does this work?',
        '1_star_description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m',
        '2_star_description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, to',
        '3_star_description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m',
        '4_star_description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, to',
        '5_star_description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m',
        'sidebar_step_1' => 'Complete the form with the required information. </br> Once you are all done, submit the form for review',
        'sidebar_step_2' => 'Our team will review the information ',
        'sidebar_step_3' => 'The company will be available in the system for everybody',
        'error' => 'Oh! Looks like something went wrong and we couldn\'t register your review :(',
        'invalid_company' => 'Invalid company',
        'success' => [
            'title' => 'Thank you for your contribution!',
            'body' => 'Your review for <strong>:company</strong> was successfully registrated in our system.
                Now, our team is going to review the information you register, and make it public on the site for enyone to use.
                We thank you again for participate in this project, and hope to see you soon in our site.
                Have a nice day!',
            'after_message' => '',
            'continue' => 'I wanna continue looking'
        ]
    ]
];
