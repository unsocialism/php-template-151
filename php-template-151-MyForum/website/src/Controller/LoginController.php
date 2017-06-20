<?php

namespace Unsocialism\Controller;

use Unsocialism\SimpleTemplateEngine;
use Unsocialism\Service\Login\LoginService;

class LoginController 
{
  /**
   * @var Unsocialism\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @var Unsocialism\Service\Login\LoginService
   */
  private $loginService;
  
  /**
   * @param Unsocialism\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, LoginService $loginService)
  {
     $this->template = $template;
     $this->loginService = $loginService;
  }
  
  public function showLogin()
  {
  	 echo $this->template->render("login.html.php");
  }
  
  public function login(array $data)
  {
  	if(!array_key_exists("email", $data) OR !array_key_exists("password", $data)) 
  	{
  		$this->showLogin();
  		return;
  	}
  	
  	if($this->loginService->authenticate($data["email"], $data["password"])) 
  	{
  		
  	} 
  	else 
  	{
  		echo $this->template->render("login.html.php", [
  			"email" => $data["email"]		
  		]);
  	}
  }
}












