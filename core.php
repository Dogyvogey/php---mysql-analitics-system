<?php

# Define the database connection options

define("__DBHOST__", "localhost"); // DB Host i.e localhost
define("__DBUSER__", "yourusername"); // DB USER i.e root
define("__DBPASS__", "yourpassword"); // DB PASS i.e someword3012
define("__DBNAME__", "yourdatabase"); // The database been connected to

# Creating the connection don't touch unless you know what you doing !!!!.

@mysql_connect(__DBHOST__, __DBUSER__, __DBPASS__) or die(mysql_error());
@mysql_select_db(__DBNAME__) or die(mysql_error());

?>
