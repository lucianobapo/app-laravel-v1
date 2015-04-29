#!/bin/sh
chgrp www-data -R storage/
chmod -R g+w storage/
chmod -R g+s storage/
setfacl -dR -m g::rw- storage/
