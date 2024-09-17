#!/bin/bash

app="dir___servico_remove_arquivos_1min1"
app_pid=`ps aux  | grep $app | grep -v grep | awk '{ print $2 }'`
echo $app_pid

if ps -p $app_pid > /dev/null 2>&1; then
    echo "Cron de remover rodando */5 * * * * "
    echo "Não inicializando outra instância"
    exit
else
    # m h  dom mon dow   command
    find /public/arquivos -type f ! -name '*.jpeg' ! -name '*.jpg' ! -name '*.mp4' ! -name '*.MP4' ! -name '*.png' ! -name '*.pdf' ! -name '*.docx' ! -name '*.html' ! -name '*.htm' ! -name '*.xps' ! -name '*.JPEG' ! -name '*.JPG' ! -name '*.PNG' ! -name '*.PDF' ! -name '*.DOCX' ! -name '*.HTML' ! -name '*.HTM' ! -name '*.XPS' -delete
fi
