<?php

function site_redirect($path)
{
    header("Location: " . $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/{$path}/");
}
