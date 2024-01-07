<?php

namespace App\Models;

use App\Core\DB;

class Article extends DB
{
    private ?int $id = null;
    protected string $title;
    protected string $content;
    protected string $keywords;
    protected ?string $picture_url;
    protected int $id_category;
    protected string $created_at;
    protected int $id_creator;
    //protected ?string $updated_at;
    protected ?int $id_updator;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getPictureUrl(): ?string
    {
        return $this->picture_url;
    }

    public function setPictureUrl(?string $picture_url): void
    {
        $this->picture_url = $picture_url;
    }

    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category): void
    {
        $this->id_category = $id_category;
    }

    public function getIdCreator(): int
    {
        return $this->id_creator;
    }

    public function setIdCreator(int $id_creator): void
    {
        $this->id_creator = $id_creator;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getIdUpdator(): ?int
    {
        return $this->id_updator;
    }

    public function setIdUpdator(?int $id_updator): void
    {
        $this->id_updator = $id_updator;
    }

}