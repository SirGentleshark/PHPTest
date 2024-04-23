<?php

//NAMESPACE DECLARATIONS
namespace App\Class;
use DateTimeImmutable;

class Comment
{
	//PRIVATE PROPERTIES
	private $id;
	private $body;
	private $createdAt;
	private $newsId;

	// GETTERS
	//Get Comment ID as int or null if no value
	public function getID(): ?int { return $this->id ?? null;}
	//Get Comment Body text as string or null if no value
	public function getBody(): ?string { return $this->body ?? null;}
	//Get Comment Creation Date as DateTimeImmutable or null if no value
	public function getCreatedAt(): ?DateTimeImmutable { return $this->createdAt ?? null;}
	//Get Comment foreign key for corresponding News ID as int or null if no value
	public function getNewsId(): ?int { return $this->newsId ?? null;}

	//SETTERS
	//Set Comment ID int value
	public function setID(int $id): self { $this->id = $id; return $this; }
	//Set Comment Body string value
	public function setBody(string $body): self { $this->body = $body; return $this; }
	//Set Comment Creation DateTime value, input must be DateTimeImmutable
	public function setCreatedAt(DateTimeImmutable $createdAt): self { $this->createdAt = $createdAt; return $this; }
	//Set Comment foreign key for corresponding News ID int value
	public function setNewsID(int $newsId): self { $this->newsId = $newsId; return $this; }

}