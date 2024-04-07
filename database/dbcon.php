<?php

require 'vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFoundException;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use Kreait\Firebase\Exception\Auth\ExpiredIdToken;
use Kreait\Firebase\Auth\UserRecord;
use Kreait\Firebase\ServiceAccount;



$baseStorageUrl = 'https://firebasestorage.googleapis.com/v0/b/your-project-name.appspot.com';//replace with the storage url
// Firebase credentials
$firebaseCredentialPath ='DATABASE/__path to json__';
$firebaseDatabaseUri = ')(https://(link)rtdb.firebaseio.co))';//replace with your project link

// Firebase initialization using Factory
$firebase = (new Factory())
    ->withServiceAccount($firebaseCredentialPath)
    ->withDatabaseUri($firebaseDatabaseUri);

// Create a Firebase database instance
$database = $firebase->createDatabase();
$auth = $firebase->createAuth();


?>
