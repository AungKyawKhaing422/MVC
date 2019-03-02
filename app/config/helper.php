<?php
function beautify($data)
{
    echo "<pre>" . print_r($data, true) . "</pre>";
}

function asset($file)
{
    return SITE_URL . "/assets/" . $file;
}