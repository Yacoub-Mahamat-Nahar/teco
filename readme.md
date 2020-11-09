Application Biblioateco
1. Ajouter les dependance php : composer install
2. Créer la Base des données (voir les configuration dans le fichier .env)
3. ajouter une clé: php artisan key:generate
4. Mettre à jours la configuration du cache: php artisan config:cache
faire la migration pour créer les tables dans la base des données: php artisan migrate
5. Initialiser les données : php artisan db:seed
 
