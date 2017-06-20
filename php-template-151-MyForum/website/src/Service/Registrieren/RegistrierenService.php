<?php

namespace Unsocialism\Service\Registrieren;

interface RegistrierenService
{
   public function register($username, $email, $password, $link);
}
