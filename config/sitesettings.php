<?php

return [
    'nav_menu_exclude'      => [],
    'footer_menu_exclude'   => [],

    'enquiry_subject'       => 'Contact Us Form Submitted',
    'enquiry_emails'        => explode(',', env('EMAIL_ENQUIRY')),
    'no_reply_email'        => env('EMAIL_NO_REPLY'),
    'digital_bridge_email'  => 'contactforms@digitalbridge.com.au',
    'thumb_width'           => 300,

    'default_product_type'  => 'variant', //variant|simple
    'default_country'       => 'AU'
];
