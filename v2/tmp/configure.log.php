<?php //003ab
if(!extension_loaded('ionCube Loader')){$__oc=strtolower(substr(php_uname(),0,3));$__ln='ioncube_loader_'.$__oc.'_'.substr(phpversion(),0,3).(($__oc=='win')?'.dll':'.so');@dl($__ln);if(function_exists('_il_exec')){return _il_exec();}$__ln='/ioncube/'.$__ln;$__oid=$__id=realpath(ini_get('extension_dir'));$__here=dirname(__FILE__);if(strlen($__id)>1&&$__id[1]==':'){$__id=str_replace('\\','/',substr($__id,2));$__here=str_replace('\\','/',substr($__here,2));}$__rd=str_repeat('/..',substr_count($__id,'/')).$__here.'/';$__i=strlen($__rd);while($__i--){if($__rd[$__i]=='/'){$__lp=substr($__rd,0,$__i).$__ln;if(file_exists($__oid.$__lp)){$__ln=$__lp;break;}}}@dl($__ln);}else{die('The file '.__FILE__." is corrupted.\n");}if(function_exists('_il_exec')){return _il_exec();}echo('Site error: the file <b>'.__FILE__.'</b> requires the ionCube PHP Loader '.basename($__ln).' to be installed by the site administrator.');exit(199);
?>
4+oV53BL9l1/8Pl74cspqn8/W/LE440XACA2mD93jR+vYlvr5SMU3VoOO97AtEgEPZjJLhY1YdGY
pCxcJB/GtqJRiky1PCP7gVGldj+Nv/DjGtFBJQsZZjKAFdc15+ehrvLeonjhN3fkkDQrXQ27pYRi
Vm3PB0AhtRjM6ZiA1475kIEehxOWhWCERzpRNuRS3rkBS9gBaD49jVh+HYJnVpe/jGBwi6KPrpem
wpSx++/aD2r/vvwxAKgVjHl9qXZqBy9lvzvB0YVfK+T8PsgRJ4wVWAmVU6b0sz9bLKmJL0if2Mlf
m9N5NzRWbJizwwEqgNT+bmUM5wdL4P9x/s45en/IkGcuvdYvV0sBCYGgwbbtHC6ePf6fIigQWXYX
a7RILya73A4hFaq3kGya0gq=2016-09-26T17:41:43+01:00 INFO (6): Create configuration file
2016-09-26T17:41:43+01:00 INFO (6): Create site in PA4WP...
2016-09-26T17:41:43+01:00 INFO (6): PA4WP REST Api response 
headers:
HTTP/1.1 201 Created
Date: Mon, 26 Sep 2016 16:41:43 GMT
Server: Apache/2.2.11 (Unix) mod_ssl/2.2.11 OpenSSL/0.9.8e-fips-rhel5
X-powered-by: PHP/5.3.13
P3p: CP="NON COR CURa ADMa OUR NOR UNI COM NAV STA"
Connection: close
Transfer-encoding: chunked
Content-type: application/json

body:
{"response":"dd258406-6cc9-7fc5-975f-a8a735cfc352"}
2016-09-26T17:41:43+01:00 INFO (6): Created site with uuid: dd258406-6cc9-7fc5-975f-a8a735cfc352
2016-09-26T17:41:43+01:00 INFO (6): Set publish setting to created site with uuid: dd258406-6cc9-7fc5-975f-a8a735cfc352
2016-09-26T17:41:43+01:00 INFO (6): PA4WP REST Api response 
headers:
HTTP/1.1 200 OK
Date: Mon, 26 Sep 2016 16:41:43 GMT
Server: Apache/2.2.11 (Unix) mod_ssl/2.2.11 OpenSSL/0.9.8e-fips-rhel5
X-powered-by: PHP/5.3.13
P3p: CP="NON COR CURa ADMa OUR NOR UNI COM NAV STA"
Connection: close
Transfer-encoding: chunked
Content-type: application/json

body:
{"response":"done"}
2016-09-26T17:41:43+01:00 INFO (6): Set site owner info for site with uuid: dd258406-6cc9-7fc5-975f-a8a735cfc352
2016-09-26T17:41:43+01:00 INFO (6): PA4WP REST Api response 
headers:
HTTP/1.1 200 OK
Date: Mon, 26 Sep 2016 16:41:43 GMT
Server: Apache/2.2.11 (Unix) mod_ssl/2.2.11 OpenSSL/0.9.8e-fips-rhel5
X-powered-by: PHP/5.3.13
P3p: CP="NON COR CURa ADMa OUR NOR UNI COM NAV STA"
Connection: close
Transfer-encoding: chunked
Content-type: application/json

body:
{"response":"done"}
2016-09-26T17:41:43+01:00 INFO (6): Generate password for site uuid: dd258406-6cc9-7fc5-975f-a8a735cfc352
2016-09-26T17:41:43+01:00 INFO (6): PA4WP REST Api response 
headers:
HTTP/1.1 201 Created
Date: Mon, 26 Sep 2016 16:41:43 GMT
Server: Apache/2.2.11 (Unix) mod_ssl/2.2.11 OpenSSL/0.9.8e-fips-rhel5
X-powered-by: PHP/5.3.13
P3p: CP="NON COR CURa ADMa OUR NOR UNI COM NAV STA"
Connection: close
Transfer-encoding: chunked
Content-type: application/json

body:
{"response":"d8fecf4da602e1e3fc13c64f6c649637"}
2016-09-26T17:41:43+01:00 INFO (6): Create config for site uuid: dd258406-6cc9-7fc5-975f-a8a735cfc352
2016-09-26T17:41:43+01:00 INFO (6): Generated config: 
<?php
$config = array (
  'sbUrl' => 'https://wpb.portugal-telecom-sa.ptasp.com',
  'siteUuid' => 'dd258406-6cc9-7fc5-975f-a8a735cfc352',
  'connectorPasswordHash' => '90c413a8a49632d961b7dba39c4360ac',
  'connectorPasswordSalt' => 'ac392ce22ab4bc7698e4abb01893ebaf',
  'sitePasswordHash' => 'DQxwDHL5Av1TYFLkDF1QLSV5ZlISYSL5DljmYHZgDmSTYHLfIv0wESLfHmktPzNX',
  'sessionLifeTime' => 1800,
  'ownerLocale' => 'en-US',
);
