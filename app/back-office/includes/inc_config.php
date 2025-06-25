<?php

// *** Database connexion

define('DB_HOST','localhost');
define('DB_NAME','hippodrome');
define('DB_USER','benjamin');
define('DB_PASS','b4mz0rus@Localhost');

// *** Site base (front-end)
define('SITE_FRONT_BASE','http://localhost:3000/hippodrome-beaumont.fr/app/');

// *** Site base (admin)
define('SITE_ADMIN_BASE',SITE_FRONT_BASE.'back-office/');

// *** Users types
define('USERS_TYPES', [
    'superadmin' => 'Super administrateur',
    'admin' => 'Administrateur',
    'contributor' => 'Contributeur'
]);

// *** Races categories
define('RACES_CATEGORIES', [
    'race' => 'Course',
    'qualif' => 'Épreuve de qualification'
]);