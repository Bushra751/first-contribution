<?php


require_once('config.php');

// Create login URl
$instURL = "https://api.instagram.com/oauth/authorize/?client_id=" . INSTAGRAM_CLIENT_ID . "&redirect_uri=" . urlencode(INSTAGRAM_REDIRECT_URI) . "&response_type=code&scope=basic";