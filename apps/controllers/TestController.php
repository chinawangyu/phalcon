<?php 
	
	use Phalcon\Mvc\Controller;
	use apps\models\db1\UserModel;

	class TestController extends Controller
	{

		//http://localhost/phalcon/run/index.php?_url=/test/index 默认访问
		//重写url后 http://localhost/phalcon/run/test/index
		public function indexAction()
		{	
			$code = UserModel::returnCode();
			var_dump($code);
		}

	}