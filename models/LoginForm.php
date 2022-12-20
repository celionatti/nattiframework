<?php 

/**
 * User: Celio natti
 * Date: 19/12/2022
 * Time: 09:59 PM
 */

namespace app\models;

use app\core\Model;
use app\core\Application;

/**
 * Class LoginForm
 * 
 * @author celio natti <celionatti@gmail.com>
 * @package app\models
 */

 class LoginForm extends Model
 {
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'E-mail',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if(!$user) {
            $this->addError('email', 'User does not exist with this Email address');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }

 }