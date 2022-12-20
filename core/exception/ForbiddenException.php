<?php

/**
 * User: Celio Natti
 * Date: 20/12/2022
 * Time: 02:38 AM
 */

namespace app\core\exception;


/**
 * Class ForbiddenException
 * @author celio natti <celionatti@gmail.com>
 * @package app\core\exception
 */

 class ForbiddenException extends \Exception
 {
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
 }