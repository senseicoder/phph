# PHPH aka PHP Handled pour les crons

## Exemples de mail

* mail envoyés à deux personnes depuis une adresse forgée, avec présence des erreurs PHP, et sortie du script; utilisation d'un tag précis, et d'un titre dédié
```
title: [cron:testm6] test titre (rc:0)
from: m6@daneel.net
to: cedric@daneel.net, c.girard@epiconcept.fr

Notice: Undefined variable: b in /home/cedric/www/e/phph/test.php on line 3
super /home/cedric/www/o/utilitaires/
---
journal PHP: /space/applisdata//php_errors_cron.log
````

* mail sur script absent, et 
````
title: [cron:testm6] test titre (rc:1)

Could not open input file: /space/www/apps/moncedricapp/test.php
---
journal PHP: /space/applisdata//php_errors_cron.log
````

## Exemples de journal

* exécution manuelle, en mode CLI
````
2019-06-28_12h33m08s;15115;begin;/space/www/apps/moncedricapp/test.php (/space/www/apps/moncedricapp/test.php)
2019-06-28_12h33m08s;15115;params;PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin:/snap/bin\\MAILTO=cedric@epiconcept.fr\\MAILFROM=infra@epiconcept.fr\\TAG=[cli] \\LOGNAME=root\\label=crontab /space/www/apps/moncedricapp/test.php\\APP=moncedricapp\\errorlog=/space/applisdata/moncedricapp/php_errors_cron.log\\SUDO_USER=cedric\\runmode=cli\\
2019-06-28_12h33m12s;15115;results;rc=0\\seconds=1.000\\megabytes=0.43
2019-06-28_12h33m12s;15115;fin;/space/www/apps/moncedricapp/test.php
````
* exécution normale
````
2019-06-28_12h34m01s;15199;begin;/home/cedric/www/e/phph/test.php (/home/cedric/www/e/phph/test.php)
2019-06-28_12h34m01s;15199;error;variable APP non définie pour script /home/cedric/www/e/phph/test.php
2019-06-28_12h34m01s;15199;params;PATH=/usr/bin:/bin\\MAILTO=c.girard@epiconcept.fr\\MAILFROM=m6@daneel.net\\TAG=[cron:testm6] \\LOGNAME=root\\label=test out\\APP=undefined\\errorlog=/var/log/php/cron.log\\SUDO_USER=\\runmode=cron\\
2019-06-28_12h34m04s;15199;results;rc=0\\seconds=1.000\\megabytes=0.43
2019-06-28_12h34m04s;15199;fin;/home/cedric/www/e/phph/test.php
````
* exécution avec script non trouvé
````
2019-06-28_12h34m01s;15200;begin;/space/www/apps/moncedricapp/test2.php (/space/www/apps/moncedricapp/test2.php)
2019-06-28_12h34m01s;15200;params;PATH=/usr/bin:/bin\\MAILTO=c.girard@epiconcept.fr\\MAILFROM=m6@daneel.net\\TAG=[cron:testm6] \\LOGNAME=root\\label=test in\\APP=moncedricapp\\errorlog=/space/applisdata/moncedricapp/php_errors_cron.log\\SUDO_USER=\\runmode=cron\\
2019-06-28_12h34m01s;15200;error;script absent (/space/www/apps/moncedricapp/test2.php)
2019-06-28_12h34m03s;15200;results;rc=1\\
2019-06-28_12h34m03s;15200;fin;/space/www/apps/moncedricapp/test2.php
````
* les erreurs existantes
````
2019-06-28_12h27m05s;14289;error;fichier /space/applisdata/moncedricapp/php_errors_cron.log non existant pour script /space/www/apps/moncedricapp/test.php (app: moncedricapp)
2019-06-28_12h28m01s;14419;error;script absent (/space/www/apps/moncedricapp/test2.php)
2019-06-28_12h28m01s;14420;error;variable APP non définie pour script /home/cedric/www/e/phph/test.php
````
