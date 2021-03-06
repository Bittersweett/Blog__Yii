<?php
/**
 * Created by PhpStorm.
 * User: bittersweet
 * Date: 2018/7/21
 * Time: 下午3:03
 */
namespace backend\models;

use yii\helpers\VarDumper;

class SignupForm extends \yii\base\Model
{


    public $username;
    public $nickname;
    public $email;
    public $password;
    public $password_repeat;
    public $profile;

    public function rules()
    {
        //return parent::rules(); // TODO: Change the autogenerated stub
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '用户名已经存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '邮件地址已经存在.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一致！'],

            ['nickname','required'],
            ['nickname','string','max'=>128],

            ['profile','string'],
        ];
    }

    public function attributeLabels()
    {
        //return parent::attributes(); // TODO: Change the autogenerated stub
        return [
          'username'=>'用户名',
          'nickname'=>'昵称',
          'password'=>'密码',
          'password_repeat'=>'再次输入密码',
          'email'=>'E-mail',
          'profile'=>'简介',
        ];
    }

    public function signup()
    {
        if (!$this->validate()){
            return null;
        }
        $user=new \common\models\Adminuser();

        $user->username=$this->username;
        $user->email=$this->email;
        $user->nickname=$this->nickname;
        $user->profile=$this->profile;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->password='*';
        $user->save();

        return $user->save()?$user:null;

    }
}