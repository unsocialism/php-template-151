<?php

namespace Unsocialism\Controller;

use Unsocialism\SimpleTemplateEngine;

class IndexController 
{
  /**
   * @var Unsocialism\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @param Unsocialism\SimpleTemplateEngine
   */
  public function __construct(\Twig_Environment $template)
  {
     $this->template = $template;
  }

  public function homepage() 
  {
    	echo '
    	<!Doctype>
    	<html>
    	<head>
		<link rel="stylesheet" href="stylesheet.css">
    	<title>Jodel</title>
    	</head>
    	<body>
    	<div class="green" small-1 medium-1 large-1>
    		BLABLABLA
    	</div>
    	<div class="red small-2 medium-2 large-2">
    	' . $this->showLoginButton() . '
    	</div>
    		
    	<div class="yellow small-1 medium-3 large-3">
    	Content
    	</div>
    		
    	<div class="blue small-1 medium-3 large-3">
    	footer
    	</div>
    	</body>
    	</html>
    	';
    	
    
  }
  
  public function showLoginButton()
  {
  	if (isset($_SESSION["username"]))
  	{
  		$button =  "<a href='/ausloggen'><button class=''>Ausloggen</button></a>";
  	}
  	else 
  	{
  		$button =  "<a href='/login'><button>Login</button></a>";
  	}
  	return $button;
  }

}
