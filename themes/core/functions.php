<?php
/**
* Helpers for the template file.
*/
$wo->data['header'] = '<h1>Header: Wooly</h1>';
//$wo->data['main']   = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
$wo->data['footer'] = '<p>Footer: &copy; Wooly by Frida Holmström</p>';


/**
* Print debuginformation from the framework.
*/
/*function get_debug() {
  $wo = CWooly::Instance();
  $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($wo->config, true)) . "</pre>";
  $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($wo->data, true)) . "</pre>";
  $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($wo->request, true)) . "</pre>";
  return $html;
}*/