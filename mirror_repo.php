<?php

// Variables
$hash = "put_hash_here";
$mirror_user = "OresomeCraft";
$key = "Put generated GitHub key here";

// No modifcations needed beyond this point!

if ($_REQUEST['hash'] !== $hash) {
    die("Authentication failed!");
}

$origin_user = $_REQUEST['origin_user'];
$repo = $_REQUEST['repo'];

delete_repo($mirror_user, $repo, $key); // Delete mirror
fork_repo($origin_user, $repo, $key, "&organization=" . $mirror_user); // Refork

function delete_repo($user, $repo, $auth_key)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/" . $user . "/" . $repo . "?access_token=" . $auth_key);
    curl_setopt($ch, CURLOPT_USERAGENT, "OresomeCraft Auto-Forker");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    echo $result;
}

function fork_repo($user, $repo, $auth_key, $optional_params = "")
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/" . $user . "/" . $repo . "/forks" . "?access_token=" . $auth_key . $optional_params);
    curl_setopt($ch, CURLOPT_USERAGENT, "OresomeCraft Website");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

    $result = curl_exec($ch);

    echo $result;
}