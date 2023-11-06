<?php

const BASE_URL = 'http://localhost:8000/';

function dd($data)
{
    die('<pre>' . print_r($data, true) . '</pre>');
}

function asset($file) {
    return BASE_URL . 'assets/' . $file;
}