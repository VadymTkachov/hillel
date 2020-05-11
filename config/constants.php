<?php

namespace Config;

define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME']);
define('ASSETS_URL', SITE_URL . '/assets/');
