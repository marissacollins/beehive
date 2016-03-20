<?php
/**
 * Database configuration
 
CREATE USER 'beeadmin'@'localhost' IDENTIFIED by   'password';
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'beeadmin'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
 
 */
define('DB_USERNAME', 'beeadmin');
define('DB_PASSWORD', 'password');
define('DB_HOST', 'localhost');
define('DB_NAME', 'honeybee');

define('USER_CREATED_SUCCESSFULLY', 0);
define('USER_CREATE_FAILED', 1);
define('USER_ALREADY_EXISTED', 2);
define('RECORD_ALREADY_EXISTED', -2);

?>
