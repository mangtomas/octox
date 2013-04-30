<?php

/*
* Autoloading models class and helpers
* 
*/

/*loading models automatically e.g. array('db','model1');
*default models
*	-db
*	-session
*/
$config['models'] = array('user','crud','db','session');

//Helpers
//e.g. array('default','helper1');
$config['helpers'] = array('generals','info','natsession');

//Libararies
$config['libraries'] = array('hash');