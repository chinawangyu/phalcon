<?php

use Phalcon\Di\FactoryDefault;

header('Content-type:text/html;charset=utf-8;');
define('ROOT_PATH', realpath(__DIR__ . "/../.."));

try {
		//生成配置对象
		$origin_cfg = require ROOT_PATH."/phalcon/apps/config/config.php";
		$config = new \Phalcon\Config($origin_cfg);


		// 注册自动加载的目录
		$loader = new \Phalcon\Loader();
		$loader->registerDirs(
		    array(
		        $config->application->controllersDir,
		        $config->application->modelsDir,
		    )
		);
		
		// 注册命名空间- 代码可以随意放置
		$loader->registerNamespaces(array(
			'apps\models\db1'  => ROOT_PATH.'/phalcon/apps/models/db1',
		));


		$loader->register();


		//注册di
		$di = new FactoryDefault();

		$di->set('view', function () {

		    $view = new \Phalcon\Mvc\View();
		    $view->setViewsDir(ROOT_PATH.'/phalcon/app/view/');
		    return $view;
		});

		$application = new \Phalcon\Mvc\Application($di);
		echo $application->handle()->getContent();	
	}catch( \Exception $e ){
		 echo "PhalconException: ", $e->getMessage();
	}