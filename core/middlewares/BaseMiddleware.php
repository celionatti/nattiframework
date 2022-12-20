<?php 

/**
 * User: Celio Natti
 * Date: 20/12/2022
 * Time: 02:38 AM
 */

namespace app\core\middlewares;

 /**
  * Class BaseMiddleware

  * @author celio natti <celionatti@gmail.com>
  * @package app\core\middlewares
  */

  abstract class BaseMiddleware
  {
    abstract public function execute();
  }