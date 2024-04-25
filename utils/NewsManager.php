<?php

//NAMESPACE DECLARATIONS
namespace App\utils;
use App\class\News;

class NewsManager
{
	//PRIVATE PROPERTIES
	private static $instance = null;

	//CONSTRUCT FUNCTION VALIDATING FILE PRESENCE
	private function __construct()
	{
		require_once(ROOT . '/utils/DB.php');
		require_once(ROOT . '/utils/CommentManager.php');
		require_once(ROOT . '/class/News.php');
	}

	//Singleton getInstance method
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	/**
	* list all news
	*/
	public function listNews()
	{
		$db = DB::getInstance();
		$rows = $db->select('SELECT * FROM `news`');

		$news = [];
		foreach($rows as $row) {
			$n = new News();
			$news[] = $n->setId($row['id'])
			  ->setTitle($row['title'])
			  ->setBody($row['body'])
			  ->setCreatedAt(new \DateTimeImmutable($row['created_at']));
		}

		return $news;
	}

	// UNUSED
	// add a record in news table
	/*
	public function addNews($title, $body)
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO `news` (`title`, `body`, `created_at`) VALUES('". $title . "','" . $body . "','" . date('Y-m-d') . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}
	*/

	// UNUSED
	// deletes a record in news table based on provided id
	/*
	public function deleteNews($id)
	{
		$comments = CommentManager::getInstance()->listComments();
		$idsToDelete = [];

		foreach ($comments as $comment) {
			if ($comment->getNewsId() == $id) {
				$idsToDelete[] = $comment->getId();
			}
		}

		foreach($idsToDelete as $id) {
			CommentManager::getInstance()->deleteComment($id);
		}

		$db = DB::getInstance();
		$sql = "DELETE FROM `news` WHERE `id`=" . $id;
		return $db->exec($sql);
	}
	*/
}