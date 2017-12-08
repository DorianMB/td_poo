<?php

namespace Article;

use LogicException;
use PDO;

class Article
{

    public const STATUS_LIST = [
        'draft'     => 0,
        'published' => 1,
        'deleted'   => 2,
    ];

    private $id;
    private $name;
    private $content;
    private $status;

    public function __construct($name, $content)
    {
        $this->name = $name;
        $this->content = $content;
    }

    public function setId(int $id): self
    {
        if ($id < 1) {
            $logicException = new LogicException('Mon message d\'erreur');

            throw $logicException;
        }

        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return ucfirst($this->name);
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function setStatus(int $status)
    {
        if (in_array($status, self::STATUS_LIST)) {
            $this->status = $status;

            return $this;
        }

        throw new LogicException('blablabla');
    }

    public function isPublished()
    {
        return $this->status === self::STATUS_LIST['published'];
    }

    public function getStatus()
    {
        return $this->status;
    }
}

// --------------

$art = new Article('titre', 'contenu');
$art->setStatus(6);

$art->isPublished();

try {
    $art->setId(-9);
} catch (LogicException $exception) {
    echo 'Il y a une erreur : ' . $exception->getMessage();
}


$pdo = new \PDO('localhost', 'root', '', [PDO::SQLSRV_ENCODING_UTF8]);
