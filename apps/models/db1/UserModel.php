<?php 
	
	namespace apps\models\db1;
	use Phalcon\Mvc\Model;

	class UserModel extends Model {
	    //我们可以建立一些类的公共变量,变量对应表的字段
	    public $id;
	    public $name;
	    public $phone;
	    public $passwd;

	    public static function returnCode()
	    {
	    	return '我是model的code';
	    }
	}