## Тестирование на Windows + wsl2 / Ubuntu 20.04 LTS
пользователь на сервере userapp/userapp123,
ip server 172.21.228.190 Фронт и бэк на 2 доменах,
тестово для доступа из под винды два домена
пропишем в C:\Windows\System32\drivers\etc\hosts:

	172.21.228.190  front.local
	172.21.228.190  back.local

## Идём по ssh на сервер,

## заходим под рут, вводим пароль пользователя системы userapp123
	sudo su 
## обновление пакетов
	sudo apt update
## Установка редактора, гит, и прочее + apache php mysql
	sudo apt install -y nano git curl unzip apache2 mysql-server mysql-client php7.4 php-mysql php7.4-curl phpunit

## Убираем какую то ошибку Mysql ))
	sudo usermod -d /var/lib/mysql/ mysql
## Стартуем mysql
	sudo service mysql start
## Настраиваем доступ к базам, отвечаем: n, создаем пароль для root для mysql/userapp123, y y y y 
	sudo mysql_secure_installation

## cоздаем в mysql бд, и пользователя которые потом пропишем в конфиг !!! запоминаем, добавляем права 
	mysql
	CREATE DATABASE yiiaap;
	CREATE USER 'user'@'localhost' IDENTIFIED BY 'qweqweqwe';
	GRANT ALL PRIVILEGES ON yiiaap.* TO 'user'@'localhost';
	FLUSH PRIVILEGES;
	exit

## выкачиваем репозиторий
	cd /var/www
	sudo git clone https://github.com/hrompik/yiiapp.git
	cd /var/www/yiiapp
	
## устанавливаем композер
	sudo curl -sS https://getcomposer.org/installer -o composer-setup.php
	sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

## заходим в настройки yii испольуем dev конфиг, и потом его инициацию, либо выбираемс прод и потом тож
	sudo nano /var/www/yiiapp/environments/dev/common/config/main-local.php
	cd /var/www/yiiapp
	sudo php init
## отвечаемс 0 y, и выходим из под рута для композера
	exit

## Даем права пользователя к папке, и загружаем пакеты композером
	sudo chown -R `whoami` /var/www/
	cd /var/www/yiiapp
	composer u

## заходим в рут, включаем мод реврайт в апаче, и добавлем 2 виртуальых хоста с доменами, изменить название и внутри пару строк на нужные домены если есть
	sudo su
	sudo a2enmod rewrite
	sudo cp /var/www/yiiapp/apache_conf/front.local.conf /etc/apache2/sites-available/front.local.conf
	sudo a2ensite front.local
	sudo cp /var/www/yiiapp/apache_conf/back.local.conf /etc/apache2/sites-available/back.local.conf
	sudo a2ensite back.local

## запускаем апач
	sudo service apache2 restart

## Запускаем миграции rbac и текущие
	cd /var/www/yiiapp
	sudo php yii migrate --migrationPath=@yii/rbac/migrations/
## y
	sudo php yii migrate
## y

## Из widnows по front.local и back.local, работает-с,
admin/admin видит типо всех
user1/user1
...
user9/user9
Только свои пепяки, у usera9 больше всех пепяк
