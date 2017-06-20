<?php

namespace Unsocialism\Service\Login;

interface LoginService
{
   public function authenticate($username, $password);
}
