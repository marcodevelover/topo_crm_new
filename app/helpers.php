<?php
// function setActive($routename){
// 	return request()->routeIs($routename.'.*') ? 'active' : '';
// }
// For add'active' class for activated route nav-item

if(!function_exists('get_version'))
{
  function get_version()
  {
    return config("app.version");
  }
}

if(!function_exists('get_host'))
{
  function get_host()
  {
    return ((@$_SERVER["HTTPS"] == "on") ? "https://" : "http://") . $_SERVER["HTTP_HOST"];
  }
}

if(!function_exists('get_asset'))
{
  function get_asset($curl="")
  {
    $response = "";

    $curl = trim($curl);

    if(!empty($curl))
    {
      if(stripos($curl, "http") !== false)
      {
        $response = $curl;
      }
      else
      {
        $response = asset($curl);
      }
    }

    return $response . '?' . get_version();
  }
}

function active_class($path, $active = 'active') {

  return request()->routeIs($path.'.*') ? 'active' : '';
  
}

// For checking activated route
function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

// For add 'show' class for activated route collapse
function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}
