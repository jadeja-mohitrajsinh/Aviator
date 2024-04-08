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



$baseStorageUrl = 'https://firebasestorage.googleapis.com/v0/b/aviator-a150a.appspot.com/o/images%2F';
// Firebase credentials
$firebaseCredentialPath ='DATABASE/aviator-a150a-firebase-adminsdk-lhv3p-8bfc4c3fc4.json';
$firebaseDatabaseUri = 'https://aviator-a150a-default-rtdb.firebaseio.com';


// Firebase initialization using Factory
$firebase = (new Factory())
    ->withServiceAccount($firebaseCredentialPath)
    ->withDatabaseUri($firebaseDatabaseUri);

// Create a Firebase database instance
$database = $firebase->createDatabase();
$auth = $firebase->createAuth();


?>
