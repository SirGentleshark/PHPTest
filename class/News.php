<?php

//NAMESPACE DECLARATIONS
namespace App\Class;
use DateTimeImmutable;

class News
{
	//PRIVATE PROPERTIES
	private $id;
	private $title;
	private $body;
	private $createdAt;

	//GETTERS
	//Get News ID as int or null if no value
	public function getID(): ?int { return $this->id ?? null;}
	//Get News Title text as string or null if no value
	public function getTitle(): ?string { return $this->title ?? null;}
	//Get News Body text as string or null if no value
	public function getBody(): ?string { return $this->body ?? null;}
	//Get News Creation Date as DateTimeImmutable or null if no value
	public function getCreatedAt(): ?DateTimeImmutable { return $this->createdAt ?? null;}

	//SETTERS
	//Set News ID int
	public function setID(int $id): self { $this->id = $id; return $this; }
	//Set News Title string
	public function setTitle(string $title): self { $this->title = $title; return $this; }
	//Set News Body string
	public function setBody(string $body): self { $this->body = $body; return $this; }
	//Set News Creation DateTime, input must be DateTimeImmutable
	public function setCreatedAt(DateTimeImmutable $createdAt): self { $this->createdAt = $createdAt; return $this; }

}