<?php

function filter_form($post)
{
    return is_array($post) ? array_map('filter_form', $post) : htmlspecialchars(trim($post));
}



?>