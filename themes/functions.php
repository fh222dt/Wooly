<?php
/**
* Helpers for theming, available for all themes in their template files and functions.php.
* This file is included right before the themes own functions.php
*/

    /**
* Print debuginformation from the framework.
*/
function get_debug() {
  $wo = CWooly::Instance(); 
  $html = null;
  if(isset($wo->config['debug']['db-num-queries']) && $wo->config['debug']['db-num-queries'] && isset($wo->db)) {
    $html .= "<p>Database made " . $wo->db->GetNumQueries() . " queries.</p>";
  }   
  if(isset($wo->config['debug']['db-queries']) && $wo->config['debug']['db-queries'] && isset($wo->db)) {
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $wo->db->GetQueries()) . "</pre>";
  }   
  if(isset($wo->config['debug']['lydia']) && $wo->config['debug']['lydia']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CLydia:</p><pre>" . htmlent(print_r($wo, true)) . "</pre>";
  }   
  return $html;
}



/**
* Create a url by prepending the base_url.
*/
function base_url($url=null) {
  return CWooly::Instance()->request->base_url . trim($url, '/');
}

/**
* Return the current url.
*/
function current_url() {
  return CWooly::Instance()->CreateUrl($urlOrController, $method, $arguments);
}

/**
* Create a url to an internal resource.
*
* @param string the whole url or the controller. Leave empty for current controller.
* @param string the method when specifying controller as first argument, else leave empty.
* @param string the extra arguments to the method, leave empty if not using method.
*/
function create_url($urlOrController=null, $method=null, $arguments=null) {
  return CWooly::Instance()->request->CreateUrl($urlOrController, $method, $arguments);
}

/**
* Render all views.
*/
function render_views($region='default') {
  return CWooly::Instance()->views->Render($region);
}

/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CWooly::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}

/**
* Get a gravatar based on the user's email.
*/
function get_gravatar($size=null) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(CWooly::Instance()->user['email']))) . '.jpg?' . ($size ? "s=$size" : null);
}

/**
* Login menu. Creates a menu which reflects if user is logged in or not.
*/
function login_menu() {
  $wo = CWooly::Instance();
  if($wo->user['isAuthenticated']) {
    $items = "<a href='" . create_url('user/profile') . "'><img class='gravatar' src='" . get_gravatar(20) . "' alt=''> " . $wo->user['acronym'] . "</a> ";
    if($wo->user['hasRoleAdministrator']) {
      $items .= "<a href='" . create_url('acp') . "'>acp</a> ";
    }
    $items .= "<a href='" . create_url('user/logout') . "'>logout</a> ";
  } else {
    $items = "<a href='" . create_url('user/login') . "'>login</a> ";
  }
  return "<nav id='login-menu'>$items</nav>";
}

/**
* Escape data to make it safe to write in the browser.
*/
function esc($str) {
  return htmlEnt($str);
}

/**
* Filter data according to a filter. Uses CMContent::Filter()
*
* @param $data string the data-string to filter.
* @param $filter string the filter to use.
* @returns string the filtered string.
*/
function filter_data($data, $filter) {
  return CMContent::Filter($data, $filter);
}

/**
* Prepend the theme_url, which is the url to the current theme directory.
*/
function theme_url($url) {
  return create_url(CWooly::Instance()->themeUrl . "/{$url}");
}

/**
* Prepend the theme_parent_url, which is the url to the parent theme directory.
*
* @param $url string the url-part to prepend.
* @returns string the absolute url.
*/
function theme_parent_url($url) {
  return create_url(CWooly::Instance()->themeParentUrl . "/{$url}");
}

/**
* Check if region has views. Accepts variable amount of arguments as regions.
*
* @param $region string the region to draw the content in.
*/
function region_has_content($region='default' /*...*/) {
  return CWooly::Instance()->views->RegionHasView(func_get_args());
}

/**
* Get list of tools.
*/
function get_tools() {
  global $wo;
  return <<<EOD
<p>Tools:
<a href="http://validator.w3.org/check/referer">html5</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">css3</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css21">css21</a>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">unicorn</a>
<a href="http://validator.w3.org/checklink?uri={$wo->request->current_url}">links</a>
<a href="http://qa-dev.w3.org/i18n-checker/index?async=false&amp;docAddr={$wo->request->current_url}">i18n</a>
<!-- <a href="link?">http-header</a> -->
<a href="http://csslint.net/">css-lint</a>
<a href="http://jslint.com/">js-lint</a>
<a href="http://jsperf.com/">js-perf</a>
<a href="http://www.workwithcolor.com/hsl-color-schemer-01.htm">colors</a>
<a href="http://dbwebb.se/style">style</a>
</p>

<p>Docs:
<a href="http://www.w3.org/2009/cheatsheet">cheatsheet</a>
<a href="http://dev.w3.org/html5/spec/spec.html">html5</a>
<a href="http://www.w3.org/TR/CSS2">css2</a>
<a href="http://www.w3.org/Style/CSS/current-work#CSS3">css3</a>
<a href="http://php.net/manual/en/index.php">php</a>
<a href="http://www.sqlite.org/lang.html">sqlite</a>
<a href="http://www.blueprintcss.org/">blueprint</a>
</p>
EOD;
}

