<?php

function assets_app($path = null)
{
    return $path == "" ? base_url().'assets/js/app/' : base_url().'/assets/js/app/'.preg_replace("/^\//", "", $path);
}

function assets_js($path = null)
{
    return $path == "" ? base_url().'assets/js/' : base_url().'/assets/js/'.preg_replace("/^\//", "", $path);
}

function assets_css($path = null)
{
    return $path == "" ? base_url().'assets/css/' : base_url().'/assets/css/'.preg_replace("/^\//", "", $path);
}

function assets_plugin($path = null)
{
    return $path == "" ? base_url().'assets/plugin/' : base_url().'/assets/plugin/'.preg_replace("/^\//", "", $path);
}

function assets_template($path = null)
{
    return $path == "" ? base_url().'assets/plugin/' : base_url().'/assets/template/'.preg_replace("/^\//", "", $path);
}


?>