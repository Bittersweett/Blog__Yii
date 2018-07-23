<?php
/**
 * Created by PhpStorm.
 * User: bittersweet
 * Date: 2018/7/21
 * Time: 下午4:16
 */

namespace backend\models;


use common\models\Adminuser;
use yii\base\Model;

class ResetpwdForm extends Model
{

    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat','compare','compareAttribute'=>'password','message'=>'两次输入的密码不一致！'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => '密码',
            'password_repeat'=>'重输密码',
        ];
    }


    public function resetPassword($id)
    {
        if (!$this->validate()) return null;
        $adminuser=Adminuser::findOne($id);
        $adminuser->setPassword($this->password);//??
        $adminuser->removePasswordResetToken();//???

        return $adminuser->save()?true:false;
    }
}