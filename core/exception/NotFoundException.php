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

 class NotFoundException extends \Exception
 {
   protected $message = 'Page not found';
   protected $code = 404;
 }