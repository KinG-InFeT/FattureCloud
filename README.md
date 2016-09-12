# FattureCloud

Installazione

Scaricare il ZIP ed entrarre il contenuto in vendor/

Accedere alla cartella kiboko/fatture-cloud-laravel

eseguire il comando composer install

aprire il file app.php e aggiungere all'array aliases
'FattureCloud' => Kiboko\FattureCloud\Facades\FattureCloudFacade::class,

aprire il file app.php e aggiungere all'array providers
Kiboko\FattureCloud\FattureCloudServiceProvider::class,

aprire poi il file .env e aggiungere le credenziali API
FC_UID=12345
FC_KEY=123456789te123st123
