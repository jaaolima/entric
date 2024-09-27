=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
API 
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

1) \api\src\config\config.php
	
	Configurar os dados de acesso ao banco de dados e dados de navegação, rota e arquivos.
	
	DB_HOST: host do banco de dados;
	DB_USER: usuário de acesso ao banco de dados;
	DB_PASSWORD: senha de acesso ao banco de dados;
	DB_NAME: nome do banco de dados;
	SECRET: senha para encriptação;
	
	BASE_PATH: caminho base do sistema;
	BASE_URI: caminho interno de diretório do sistema;
	BASE_SISTEMA_URI: caminho onde ficará os arquivos como: fotos dos produtos e videos;

2) \api\banco_de_dados.zip

	Fazer importação do banco de dados mais atual;
	
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
SISTEMA
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

1) \sistema\app\config\conf6ion.php
	
	Configurar os dados de navegação, rota e arquivos.
	
	BASE_PATH: caminho base do sistema;
	BASE_URI: caminho interno de diretório do sistema;
	BASE_SISTEMA_URI: caminho onde ficará os arquivos como: fotos dos produtos e videos;
	BASE_API: endereço da API de acesso ao banco de dados;
	
	SMTP_HOST: host para acesso ao SMTP, configuração necessária para o CRON enviar e-mails transacionais;
	SMTP_AUTH: e-mail de autenticação de SMTP;
	SMTP_PASSWORD: senha de autenticação de SMTP;
	SMTP_SECURE: o tipo de protocolo;
	SMTP_PORT: a porte de acesso ao SMTP;
	SMTP_EMAIL: e-mail que está habilitado ao envio;
	SMTP_NAME: nome que está habilitado ao envio;

2) \sistema\cron\email___envio_smtp_1min1.php
	
	Existe um pequeno serviço de CRON para envio de e-mails transacionais, pode ser rodando a cada 1 minuto.

3) \sistema\cron\dir___servico_remove_arquivos_1min1.sh
	
	Este arquivo serve para remover arquivos maliciosos caso existam, previnindo ataques hackes.
	
4) \sistema\relatorio\libs\conf6ion.php

	Configurar os dados de acesso ao banco de dados e dados de navegação, rota e arquivos.
	
	DB_HOST: host do banco de dados;
	DB_USER: usuário de acesso ao banco de dados;
	DB_PASSWORD: senha de acesso ao banco de dados;
	DB_NAME: nome do banco de dados;
	SECRET: senha para encriptação; 
	
	BASE_PATH: caminho base do sistema;
	BASE_URI: caminho interno de diretório do sistema;
	BASE_SISTEMA_URI: caminho onde ficará os arquivos como: fotos dos produtos e videos;
	
	É importante salientar que seria interessante migrar esta parte também para o API e deixar somente ela para acesso ao banco de dados;
	
	
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
APP - Aplicativo
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

1) \app

	Aplicativo android para rodar os vídeos no tablet;
	O aplicativo foi desenvolvido em ionic
	
	@angular/cli 12.0.1
	@ionic 5.5.2
	npm install
	ng serve	
	
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
SITE
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

1) \site\20210916_entric_2fc0287e12790cbf6521_20210916163713_archive.zip

	O site desenvolvimento em WORDPRESS e este arquivo ZIP é de um plugin chamado de DUPLICATOR. É só preparar o site com o wordpress instalado;
	Instalar o plugin DUPLICATOR;
	E importar este arquivo ZIP para o DUPLICATOR instalar o site;
	Segue o LINK da documentação do Plugin https://wpfront.com/integrations/duplicator-integration/?ref=3

	
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
Servidor API - Ubuntu
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	
1) Abaixo segue os comandos para criar o ambiente funcional para a API, é claro que pode utilizar outra distribuição Linux. As informações abaixo são somente para guiar-se;
	sudo apt update
	sudo apt install apache2
	sudo ufw app list
	sudo ufw allow in "Apache"
	sudo systemctl restart apache2
	apt-get install software-properties-common gnupg2 -y
	add-apt-repository ppa:ondrej/php
	apt-get update -y
	apt-get install php7.4 php7.4-fpm php7.4-cli libapache2-mod-php7.4 -y
	php --version
	=-=-=- MYSQL =-=-=-=-=-=-=-=-=-=-
	apt install php-mysql
	sudo apt install mysql-server
	sudo mysql_secure_installation
	XM*QuR6Vn&c;!_WxO)%PFxEr
	ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'XM*QuR6Vn&c;!_WxO)%PFxEr';
	private:6Vn&c;!_WxO)
	sudo systemctl status mysql
	sudo systemctl restart mysql
	=-=-=- MARIADB =-=-=-=-=-=-=-=-=-
	sudo apt install mariadb-server mariadb-client -y
	sudo apt install -y software-properties-common
	sudo apt-key adv --fetch-keys 'https://mariadb.org/mariadb_release_signing_key.asc'
	sudo add-apt-repository 'deb [arch=amd64,arm64,ppc64el] https://mariadb.mirror.liquidtelecom.com/repo/10.6/ubuntu focal main'
	sudo apt update && sudo apt install -y mariadb-server mariadb-client
	sudo systemctl status mariadb
	sudo systemctl start mariadb
	sudo systemctl enable mariadb
	sudo mysql_secure_installation
	XM*QuR6Vn&c;!_WxO)%PFxEr
	private:6Vn&c;!_WxO)
	=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=	
	sudo apt-get install php-mysql
	sudo a2enmod rewrite
	sudo nano /etc/apache2/sites-available/000-default.conf
	<VirtualHost *:80>
		<Directory /var/www/html>
			Options Indexes FollowSymLinks MultiViews
			AllowOverride All
			Require all granted
		</Directory>
	sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
		bind-address = 0.0.0.0
	phpmyadmin -> variables -> sql_mode=only_full_group_by
	sudo systemctl restart mysql
	sudo apt install wget
	wget http://archive.ubuntu.com/ubuntu/pool/main/o/openssl/libssl1.1_1.1.0g-2ubuntu4_amd64.deb
	sudo dpkg -i libssl1.1_1.1.0g-2ubuntu4_amd64.deb
	wget https://github.com/wkhtmltopdf/packaging/releases/download/0.12.6-1/wkhtmltox_0.12.6-1.focal_amd64.deb
	sudo apt install ./wkhtmltox_0.12.6-1.focal_amd64.deb
	sudo chown _apt /var/lib/update-notifier/package-data-downloads/partial/
	wkhtmltopdf --version

sudo apt-get install php-fpdf
sudo apt-get install pdftk

	wkhtmltopdf --margin-left 0 --margin-right 0 --no-pdf-compression https://sistema.entric.com.br/relatorio/OGlEUEUzeXQ1OGJ6alpKQ0QwRkFjZz09___h relatorio_header.pdf
	wkhtmltopdf -O Landscape --background --margin-left 0 --margin-right 0 --no-pdf-compression https://sistema.entric.com.br/relatorio/OGlEUEUzeXQ1OGJ6alpKQ0QwRkFjZz09___p relatorio_product.pdf
	wkhtmltopdf --margin-left 0 --margin-right 0 --no-pdf-compression https://sistema.entric.com.br/relatorio/OGlEUEUzeXQ1OGJ6alpKQ0QwRkFjZz09___f relatorio_footer.pdf
	pdftk A=relatorio_header.pdf B=relatorio_product.pdf C=relatorio_footer.pdf cat A B C output relatorio_completo2.pdf
	pdftk A=relatorio_header.pdf B=relatorio_product.pdf C=relatorio_footer.pdf cat A B1-endEAST C output relatorio_completo2.pdf
	
	É importante se atentar a este software "wkhtmltopdf" para poder rodar o relatório e criar o PDFs.
	
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
Servidor SISTEMA - Ubuntu
=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

1) Abaixo segue os comandos para criar o ambiente funcional para a SISTEMA, é claro que pode utilizar outra distribuição Linux. As informações abaixo são somente para guiar-se;

	sudo apt update
	sudo apt install apache2
	sudo ufw app list
	sudo ufw allow in "Apache"
	apt-get install software-properties-common gnupg2 -y
	add-apt-repository ppa:ondrej/php
	apt-get update -y
	apt-get install php7.4 php7.4-fpm php7.4-cli  libapache2-mod-php7.4 -y
	sudo systemctl restart apache2
	sudo a2enmod rewrite
	sudo apt-get install php7.4-mbstring
	sudo apt-get install php7.4-mysql
	sudo nano /etc/apache2/sites-available/000-default.conf
	<VirtualHost *:80>
		<Directory /var/www/html>
			Options Indexes FollowSymLinks MultiViews
			AllowOverride All
			Require all granted
		</Directory>