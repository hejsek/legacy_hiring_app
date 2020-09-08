<?php
require 'vendor/autoload.php';

use LegacyApp\Database;
use LegacyApp\Request;

use Tracy\Debugger;
Debugger::enable();

try {
	$database = new Database("localhost", "user", "password");
	$users = $database->getAllUsers();
	$req = new Request();

	foreach ($users as $user) {
		try {
			$result = $req->getSomething($user);
			echo "ok name is " . $user->getName();
		} catch (\Exception $e) {
			echo $e->getMessage();
			continue;
		} finally {
			echo "\n";
		}
	}
} catch (\Exception $e) {
	echo $e->getMessage();
}