<?php 

/**
 * Class Response
 * 
 * @author Celio Natti <celionatti@gmail.com>
 * @package app\core
 */

namespace app\core;

 class Response
 {
   public function setStatusCode($code)
   {
      http_response_code($code);
   }
 }