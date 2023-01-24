<h1>Eukles Test</h1>

Après le clonage du repo

Run ```composer install```


Run ``` ./vendor/bin/sail up``` Celà crée et lance les conteneurs docker en passant par Sail (laravel service)

Via Docker au sein du conteneur <b>laravel-1</b> lancer la commande : ``` php artisan migrate```


Ensuite : ``` php artisan db:seed --class=ClientTableSeeder``` (celà permet de génerer 10 clients)

Voilà logiquement tout est fonctionnel
