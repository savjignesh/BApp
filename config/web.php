<?php
use kartik\mpdf\Pdf;
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
		'view' => [
			'theme' => [
				'pathMap' => [ 
					'@app/views' => [ 
						'@webroot/themes/demo/views',
					]
				],
				'baseUrl'   => '@web/themes/demo/views',
		   ],
		],
         'pdf' => [
        'class' => Pdf::classname(),
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'destination' => Pdf::DEST_BROWSER,
        // refer settings section for all configuration options
    ],
		'urlManager' => [
			'showScriptName' => false,
			'enablePrettyUrl' => true
        ],    
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JigneshYii2',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
			//'class' => 'app\components\User',
			'identityClass' => 'dektrium\user\models\User',
			//'loginUrl' => ['/web/site/login'],  
            //'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
		
    ],
	
	'modules' => [
   
		'gii' => [
		  'class' => 'yii\gii\Module', //adding gii module
		  'allowedIPs' => ['127.0.0.1', '::1']  //allowing ip's 
		],
		'admin' => [
            'class' => 'app\modules\admin\Module',
		],
		'user' => [
			'class' => 'dektrium\user\Module',
			'enableUnconfirmedLogin' => true,
			 'admins' => ['admin']
		],
	   
	  ],
    'params' => $params,
	'as beforeRequest' => [
    'class' => 'yii\filters\AccessControl',
    'rules' => [
        [
            'allow' => true,
            'actions' => ['login'],
        ],
        [
            'allow' => true,
            'roles' => ['@'],
        ],
    ],
    'denyCallback' => function () {
        return Yii::$app->response->redirect(['user/login']);
    },
],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
