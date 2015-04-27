#!/bin/sh
chgrp www-data -R storage/
setfacl -dR -m g::rw- storage/
chmod g+s storage/
chmod g+s storage/logs/
chmod g+s storage/debugbar/
