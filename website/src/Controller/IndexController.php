<?php

namespace Unsocialism\Controller;

use Unsocialism\SimpleTemplateEngine;
use Unsocialism\Service\Homepage\HomepageService;
use Unsocialism\Service\Security\CSRFProtectionService;

class IndexController
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;

  private $homepageService;

  private $pdo;

  private $csrfService;

  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, HomepageService $homepageService, \PDO $pdo, CSRFProtectionService $csrfProtectionService)
  {
     $this->template = $template;
     $this->homepageService = $homepageService;
     $this->pdo = $pdo;
     $this->csrfService = $csrfProtectionService;
  }

  public function homepage()
  {
  	$postsdb = $this->homepageService->getAllPost();
  	$posts = array();
  	$counter = 0;
  	$likesNumber = 0;
  	$dislikes = 0;
  	if($postsdb != NULL)
  	{
	  	foreach ($postsdb as $post)
	  	{
	  		$likesNumber = 0;
	  		$dislikes = 0;
	  		$temp['id'] = $post['id'];
	  		$temp['user_id'] = $post['user_id'];
	  		$temp['title'] = $post['title'];
	  		$temp['content'] = $post['content'];
	  		$temp['likeCount'] = $this->homepageService->getLikesByPostId($post['id'], 0);
	  		$temp['dislikeCount'] = $this->homepageService->getLikesByPostId($post['id'], 1);
	  		$posts[$counter] = $temp;
	  		$counter++;
	  	}
  	}
    echo $this->template->render("home.html.php", array('posts' => $posts, 'csrf' => $this->csrfService->getHtmlCode("csrfIndex")));
  }

  public function like(array $data)
  {
  	if(array_key_exists("csrf", $data))
  	{
  		if(!$this->csrfService->validateToken("csrfIndex", $data["csrf"]))
  		{
  			$this->homepage();
  			return;
  		}
  	}
  	else
  	{
  		$this->homepage();
  		return;
  	}
  	if (isset($_SESSION['user_id']))
  	{
  		$like = $this->homepageService->getLikeByUserIdAndPostId($_SESSION['user_id'], $data["like"]);
  		if($like != NULL)
  		{
  			if ($like['isDislike'] == 1)
  			{
  				$this->homepageService->changeLike($like['id'], 0);
  			}
  			else if ($like['isDislike'] == 0)
  			{
  				$this->homepageService->removeLike($like['id']);
  			}
  		}
  		else
  		{
  			$this->homepageService->addLike($_SESSION['user_id'], $data["like"], 0);
  		}
  	}
	else
	{
		header('Location: /login');
	}
  }

  public function dislike(array $data)
  {
  	if(array_key_exists("csrf", $data))
  	{
  		if(!$this->csrfService->validateToken("csrfIndex", $data["csrf"]))
  		{
  			$this->homepage();
  			return;
  		}
  	}
  	else
  	{
  		$this->homepage();
  		return;
  	}
  	if (isset($_SESSION['user_id']))
  	{
  		$like = $this->homepageService->getLikeByUserIdAndPostId($_SESSION['user_id'], $data["dislike"]);
  		if($like != NULL)
  		{
  			if ($like['isDislike'] == 0)
  			{
  				$this->homepageService->changeLike($like['id'], 1);
  			}
  			else if ($like['isDislike'] == 1)
  			{
  				$this->homepageService->removeLike($like['id']);
  			}
  		}
  		else
  		{
  			$this->homepageService->addLike($_SESSION['user_id'], $data["dislike"], 1);
  		}
  	}
  	else
  	{
  		header('Location: /login');
  	}
  }

  public function showNewPost()
  {
  	echo $this->template->render("newPost.html.php", ["csrf" => $this->csrfService->getHtmlCode("csrfNewPost")]);
  }

  public function addPost(array $data)
  {
  	if(array_key_exists("csrf", $data))
  	{
  		if(!$this->csrfService->validateToken("csrfNewPost", $data["csrf"]))
  		{
  			$this->showNewPost();
  			return;
  		}
  	}
  	else
  	{
  		$this->showNewPost();
  		return;
  	}
  	$this->homepageService->addPost($_SESSION['user_id'],$data["title"], $data["content"]);
  	header("Location: /");
  }

  public function deletePost(array $data)
  {
  	if(array_key_exists("csrf", $data))
  	{
  		if(!$this->csrfService->validateToken("csrfIndex", $data["csrf"]))
  		{
  			$this->homepage();
  			return;
  		}
  	}
  	else
  	{
  		$this->homepage();
  		return;
  	}
  	$this->homepageService->deletePost($data["deletePost"]);
  }
}
