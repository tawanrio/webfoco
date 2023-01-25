<?php 

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// pastas

define('MODEL_PATH', dirname(__FILE__,2) . '/model');
define('VIEW_PATH', dirname(__FILE__,2) . '/view');
define('CONTROLLER_PATH', dirname(__FILE__,2) . '/controller');
define('EXCEPTION_PATH', dirname(__FILE__,2) .'/exceptions');

// arquivos

require_once(dirname(__FILE__) . '/loader.php');
require_once(dirname(__FILE__) . '/Database.php');
require_once(dirname(__FILE__).'/session.php');
require_once(EXCEPTION_PATH .'/ValidationException.php');

// sincroniza db
loadModel('Synchronize');

$synchronize = Synchronize::synchronizeDB();
