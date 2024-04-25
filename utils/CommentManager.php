<?php

//NAMESPACE DECLARATIONS
namespace App\utils;
use App\class\Comment;
use App\utils\DB;
use DateTimeImmutable;

class CommentManager
{
	//PRIVATE PROPERTIES
	private static $instance = null;

	//CONSTRUCT FUNCTION VALIDATING FILE PRESENCE
	private function __construct()
	{
		require_once(ROOT . '/utils/DB.php');
		require_once(ROOT . '/class/Comment.php');
	}

	//Singleton getInstance method
	public static function getInstance() : self
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	// Returns comments array populated with data from the DB accessed via getInstance() for the provided newsID int
	public function listComments(int $newsId) : array
	{
		$db = DB::getInstance();
		$sql = 'SELECT * FROM `comment` WHERE `news_id` = :newsId';
		$params = ['newsId' => $newsId];
	
		$rows = $db->select($sql, $params);
	
		$comments = [];
		foreach ($rows as $row) 
		{
			$n = new Comment();
			$comments[] = $n->setId($row['id'])
						   ->setBody($row['body'])
						   ->setCreatedAt(new DateTimeImmutable($row['created_at']))
						   ->setNewsId($row['news_id']);
		}
	
		return $comments;
	}

	// UNUSED
	// Insert provided input of body and newsID into DB accessed via getInstance(), returns updated DB
	/*
	public function addCommentForNews($body, $newsId) : int
	{
		$db = DB::getInstance();
		$sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES('". $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}
	*/

	// UNUSED
	// Removes comment corresponding to provided comment id, from DB accessed via getInstance(), returns updated DB
	/*
	public function deleteComment($id) : int
	{
		$db = DB::getInstance();
		$sql = "DELETE FROM `comment` WHERE `id`=" . $id;
		return $db->exec($sql);
	}
	*/
}