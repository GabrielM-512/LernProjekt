<?php
/*
This file traverses up the directory tree and tries to search for prepend_global.php (as outlined in the documentation document).
If it fails to reach it, it will die with an error message.

This file should (!!!) be identical in every subdirectory which has some kind of .php script, as it dynamically finds prepend_global.php and thus will find it as long as it is mounted at /backend.

TBD: Implement some kind of system that alerts site admins about an error within prepend.php, as failing to find prepend_global.php before reaching /backend (or, even worse, the root of the actual filesystem) would mean not being able to use
the global /includes/db_connect.php to establish a connection with the DB and input an error into the software_errors table.
*/

//initialise $dir as the current working directory
$dir = __DIR__;

//step through the directories as long as prepend_global.php hasn't been found.
while (!file_exists($dir . '/prepend_global.php')) {
    // check if /backend has already been reached. This check can be put here since, if backend has been reached and /prepend_global.php is mounted there, the loop won't be executed again.
    // If it isn't mounted there, the loop will re-execute and die because it isn't authorised to go further than /backend.
    if (basename($dir) === 'backend') {
        die('Error: prepend_global.php not found in file system.');
    }

    // Get the parent directory of the current directory.
    $parent = dirname($dir);

    // Check if the root of the filesystem has been reached. The check must be made since if this file is placed outside of /backend and its subdirectories,
    // it won't ever fail upon reaching /backend and continue to the root of the filesystem, where it will be stuck in an infinite loop since trying to get the dirname(filesystem_root) == filesystem_root, and it will simply retry.
    if ($parent === $dir) {
        die('Error: Reached filesystem root without finding prepend_global.php.');
    }
    // overwrite the current directory with its parent directory and restart the loop
    $dir = $parent;
}

// finally, include prepend_global.php to make it accessible to the calling script
require_once($dir . '/prepend_global.php');
?>
