<?php

namespace App\Models;

use App\Core\DB;

class Comment extends DB
{
    private ?int $id = null;
    protected int $id_article;
    protected ?int $id_comment_response;
    protected int $id_user;
    protected string $content;
    protected string $created_at;
    protected bool $valid = false;
    protected ?string $validate_at = null;
    protected ?int $id_validator = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getIdArticle(): int {
        return $this->id_article;
    }

    public function setIdArticle(int $id_article): void {
        $this->id_article = $id_article;
    }

    public function getIdCommentResponse(): ?int {
        return $this->id_comment_response;
    }

    public function setIdCommentResponse(?int $id_comment_response): void {
        $this->id_comment_response = $id_comment_response;
    }

    public function getIdUser(): int {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): void {
        $this->id_user = $id_user;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }

    public function isValid(): bool {
        return $this->valid;
    }

    public function setValid(bool $valid): void {
        $this->valid = $valid;
    }

    public function getValidateAt(): ?string {
        return $this->validate_at;
    }

    public function setValidateAt(?string $validate_at): void {
        $this->validate_at = $validate_at;
    }

    public function getIdValidator(): ?int {
        return $this->id_validator;
    }

    public function setIdValidator(?int $id_validator): void {
        $this->id_validator = $id_validator;
    }
}
