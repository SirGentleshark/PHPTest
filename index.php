<?php

//NAMESPACE DECLARATIONS
namespace App;
use App\utils\NewsManager;
use App\utils\CommentManager;
use App\utils\DB;

//INITIALIZATION SCRIPT & FILE VALIDATION
define('ROOT', __DIR__);
require_once(ROOT . '/utils/NewsManager.php');
require_once(ROOT . '/utils/CommentManager.php');
require_once(ROOT . '/utils/DB.php');

//Instance declaration
$db = DB::getInstance();
$newsManager = NewsManager::getInstance();
$commentManager = CommentManager::getInstance($db);

foreach ($newsManager->listNews() as $news) {
	//Print out News Title and Body
    echo("############ NEWS " . $news->getTitle() . " ############\n");
    echo($news->getBody() . "\n");

	//Collect comments for current News
    $comments = $commentManager->listComments($news->getID());

	//Print all comments collected
    foreach ($comments as $comment) {
        echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
    }
}