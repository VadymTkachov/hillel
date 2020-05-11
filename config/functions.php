<?php

/**
 * @param string $path
 */
function site_redirect($path = '')
{
    header("Location: " . SITE_URL . '/' . $path);
    exit;
}
