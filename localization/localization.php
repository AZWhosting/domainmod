<?php
//error_reporting(E_ALL | E_STRICT);
if (session_id() == '') { // Si la session n'existe pas
    session_start(); // On crée la session
}
// define constants
define('PROJECT_DIR', DIR_ROOT);
define('LOCALE_DIR', PROJECT_DIR .'/lang');
//require_once(LOCALE_DIR .'/ok.php');
define('DEFAULT_LOCALE', 'en_US');
require_once('lib/gettext/gettext.inc');

/**/
 
$supported_locales = array('en_US', 'fr_FR');
$encoding = 'UTF-8';
//$locale = isset($_POST['lang']) ? $_POST['lang'] : (!empty($_GET['lang']) ? $_GET['lang']: (!empty($_SESSION['lang']) ? $_SESSION['lang']: DEFAULT_LOCALE));
$locale = (isset($_POST['lang']))? $_POST['lang'] :(!empty($_SESSION['lang']) ? $_SESSION['lang']: DEFAULT_LOCALE);
//On assigne cette variable de langue en SESSION
$_SESSION['lang'] = $locale;

/// gettext setup
T_setlocale(LC_MESSAGES, $locale);
// Set the text domain as 'messages'
$domain = 'trad';
T_bindtextdomain($domain, LOCALE_DIR);
T_bind_textdomain_codeset($domain, $encoding);
T_textdomain($domain);

// Function Plural


?>
<?php
 //Test plural
 $count=1;
//echo sprintf(ngettext("%d Comment","%d Comments",$count),$count);


/*echo"</br>";
echo"</br>";
echo __("Users");
echo"</br>";
var_dump($_SESSION['lang']);*/

