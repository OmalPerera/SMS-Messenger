<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'KRlA9u7wNlDoUwyz24gchWlFKC84yFw9',
        ],
    ],
];

<<<<<<< HEAD
//Disable the debug module + gii tool for the production environment
/*if (!YII_ENV_TEST) {
=======
<<<<<<< HEAD
if (!YII_ENV_TEST) {
=======
//Disable the debug module + gii tool for the production environment
/*if (!YII_ENV_TEST) {
>>>>>>> dev
>>>>>>> c9dd91bf6b5599b9a0c1122a19df9d5eea6a2f0d
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}
<<<<<<< HEAD
*/
=======
<<<<<<< HEAD

=======
*/
>>>>>>> dev
>>>>>>> c9dd91bf6b5599b9a0c1122a19df9d5eea6a2f0d
return $config;
