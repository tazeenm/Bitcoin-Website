<?php
require_once __DIR__.'/server.php';

$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send();
$userid = 1234; // A value on your server that identifies the user
$server->handleAuthorizeRequest($request, $response, $is_authorized, $userid);

if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}

$token = $server->getAccessTokenData(OAuth2\Request::createFromGlobals());
echo "User ID associated with this token is {$token['user_id']}";

?>