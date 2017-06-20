<?php

namespace Unsocialism\Service\Activate;

class ActivatePdoService implements ActivateService
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function activate($link)
	{
		// $username vorgegebener Username
		$stmt = $this->pdo->prepare("SELECT link FROM user WHERE link=?");
		$stmt->bindValue(1, $link);
		$stmt->execute();
		
		$tester = false;
		foreach ($stmt as $row)
		{
			if(strtolower($link) == strtolower($row['link']))
			{
				$tester = true;
			}
		}
		if ($tester)
		{
			// $username vorgegebener Username
			$stmt = $this->pdo->prepare("UPDATE user SET status=1 WHERE link=? ");
			$stmt->bindValue(1, $link);
			$stmt->execute();
		}
		return $tester;
	}
}
