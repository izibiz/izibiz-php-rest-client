PHP - İZİBİZ REST TEST PROJESİ


Bu proje Authentication ve E-Adisyon ürünlerini için örnekler yazılmıştır.

İndirilmesi Gerekenler

https://windows.php.net/download adresinden 64bit bilgisayar için "VS16 x64 Non Thread Safe"  altındaki zip dosyası indirilir. 
Bu klasörü C dizini altına çıkarılır. Gelişmiş sistem ayarlarından system variables'a dosyanın yolu path kısmına eklenir.

KURULUM

Projemizi indirdikten sonra vs code ile proje açılır. Terminalde "composer require phpunit/phpunit" komutu çalıştırılır. Komut çalışınca vendor klasörü ve composer dosyaları oluşmaktadır.
Sonra "./vendor/bin/phpunit" komutu çalıştırılır ve ".phpunit.result.cache" dosyası oluşur. composer.json dosyasına 

													"autoload": {
															"psr-4": {
																"App\\":"app"
															}
														} 
ekleme yapılır. Terminalde "composer update" komutu çalıştırılır.Daha sonra Terminale "./vendor/bin/phpunit --testdox" yazınca testlerimiz çalışmaya başlar.