<?php

$spBaseUrl = getenv('SP_BASE_URL'); //or http://<your_domain>

$settingsInfo = array(
    'debug' => true,
    'sp' => array(
        'entityId' => $spBaseUrl . '/metadata.php',
        'assertionConsumerService' => array(
            'url' => $spBaseUrl . '/acs.php',
        ),
        'singleLogoutService' => array(
            'url' => $spBaseUrl . '/index.php?sls',
        ),
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    ),
    'idp' => array(
        'entityId' => getenv('IDP_ENTITY_ID'),
        'singleSignOnService' => array(
            'url' => getenv('IDP_SSO_URL'),
        ),
        'singleLogoutService' => array(
            'url' => getenv('IDP_SLO_URL'),
        ),
        'x509cert' => getenv('IDP_X509CERT'),
    ),
);
