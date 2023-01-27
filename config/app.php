<?php 

define('SITE_URL', 'http://localhost/Ecommerce-web/');

function base_url($slug){
    echo SITE_URL.$slug;
}