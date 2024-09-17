#!/bin/bash

app="email___envio_smtp_1min1"
app_pid=`ps aux  | grep email___envio_smtp_1min1 | grep -v grep | awk '{ print $2 }'`
echo $app_pid

if ps -p $app_pid > /dev/null 2>&1; then
    echo "Cron rodando"
    echo "Não inicializando outra instância"
    exit
else
    echo "Cron não está rodando"
    /usr/bin/php /var/www/html/cron/email___envio_smtp_1min1.php
    exit
fi
