<?php

namespace Unsocialism\Service\Registrieren;

class RegistrierenPdoService implements RegistrierenService
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function register($username, $email, $password, $link) 
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (username, email, passwort, link, status)
    	VALUES(?, ?, ?, ?, ?)");
    	$stmt->bindValue(1, $username);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
        $stmt->bindValue(4, $link);
        $stmt->bindValue(5, 2);
        $stmt->execute();
		
        return true;
    }
    public function getAllUsernames($username)
    {
    	// $username vorgegebener Username
    	$stmt = $this->pdo->prepare("SELECT username FROM user");
    	$stmt->execute();
    	
    	$tester = 0;
    	foreach ($stmt as $row)
    	{
    		if(strtolower($username) === strtolower($row['username']))
    		{
    			$tester = 1;
    		}
    	}
    	if ($tester == 1)
    	{
    		return false;
    	}
    	else 
    	{
    		return true;
    	}
    }
    
    public function getAllEmails($email)
    {
    	// $username vorgegebener Username
    	$stmt = $this->pdo->prepare("SELECT email FROM user");
    	$stmt->execute();
    	 
    	$tester = true;
    	foreach ($stmt as $row)
    	{
    		if(strtolower($email) === strtolower($row['email']))
    		{
    			$tester = false;
    		}
    	}
		return $tester;
    }
    
    public function getAllLinks($username)
    {
    	// $username vorgegebener Username
    	$stmt = $this->pdo->prepare("SELECT link FROM user");
    	$stmt->execute();
    	 
    	$tester = true;
    	foreach ($stmt as $row)
    	{
    		if(strtolower($link) == strtolower($row['link']))
    		{
    			$tester = false;
    		}
    	}
    	return $tester;
    }
}
