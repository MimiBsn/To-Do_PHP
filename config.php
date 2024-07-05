<?php

// If the requested resource exists, serve it directly
if (file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'])) {
    return false;
}

// Otherwise, route the request to index.php
include_once 'index.php';
