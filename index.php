<?php
/* PHP wrapper for "Lauren's Lovely Landscapes" app.
 *
 * This script depends on the following code in .htaccess:
 *    <IfModule mod_rewrite.c>
 *        RewriteEngine on
 *        RewriteCond %{REQUEST_FILENAME} !-f
 *        RewriteCond %{REQUEST_FILENAME} !-d
 *        RewriteRule ^ index.php [L]
 *    </IfModule>
 *
 * Place the "static" and "views" directories from 
 * the "Lauren's..." project into the document root along
 * with this script and the above .htaccess file.
 */

include('vars.php');

$lll_route = trim("$_SERVER[REQUEST_URI]", "/");

if (file_exists("views/$lll_route.tpl")) {
	ob_start();
	require_once("views/$lll_route.tpl");
	$lllpage = ob_get_contents();
	ob_end_clean();

	echo $lllpage;

} elseif ($lll_route == "") {
	ob_start();
	require_once("views/home.tpl");
	$lllpage = ob_get_contents();
	ob_end_clean();

	echo $lllpage;

} else {
	echo "\"$lll_route\" page not found";
	ob_start();
	require_once("views/home.tpl");
	$lllpage = ob_get_contents();
	ob_end_clean();

	echo $lllpage;
}

?>
