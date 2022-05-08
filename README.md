# MVC
#Конфигурация apache:
<VirtualHost *:80>
	
	ServerAdmin admin@example.com
	ServerName mvc
	ServerAlias www.mvc.com
	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/MVC/public
	ErrorLog ${APACHE_LOG_DIR}/error.log
	CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
