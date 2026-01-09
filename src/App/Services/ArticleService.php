<?php

namespace App\Services;

use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\ViewModels\Article as ViewModelsArticle;
use Core\Helpers\Validator;

class ArticleService{
    private static ?ArticleService $articleService = null;

    private function __construct() {}

    public static function getInstance(): ArticleService{
        if (self::$articleService === null) {
            self::$articleService = new ArticleService();
        }

        return self::$articleService;
    }

    public function getArticles(): ?array{
        $articleRepository = ArticleRepository::getInstance();
        return $articleRepository->findAll();
    }

    public function getAuthorArticles(int $author_id): ?array{
        $articleRepository = ArticleRepository::getInstance();
        return $articleRepository->findByAuthor($author_id);
    }

    public function getAuthorMostInteractedArticle(int $author_id): ?Article{
        $articleRepository = ArticleRepository::getInstance();
        return $articleRepository->findAuthorMostInteractedArticle($author_id);
    }

    public function getAuthorMostCommentedArticle(int $author_id): ?Article{
        $articleRepository = ArticleRepository::getInstance();
        return $articleRepository->findAuthorMostCommentedArticle($author_id);
    }

    public function getAuthorArticlesCount(int $author_id): ?int{
        $articleRepository = ArticleRepository::getInstance();
        return $articleRepository->getAuthorArticlesCount($author_id);
    }

    public function getArticle(int $id): ?Article{
        $articleRepository = ArticleRepository::getInstance();
        return $articleRepository->findById($id);
    }

    public function getArticleWithRelations(int $id): ?ViewModelsArticle{
        $articleRepository = ArticleRepository::getInstance();
        return $articleRepository->getWithRelations($id);
    }

    public function create(array $data, array $file, int $authorId)
    {
        if (!Validator::article(array_merge($data, ['cover' => $file]))) {
            return false;
        }

        $articleRepository = ArticleRepository::getInstance();

        $coverPath = $this->uploadCover($file);

        $status = $articleRepository->create(
            [
                'title'     => $data['title'],
                'cover'     => $coverPath,
                'body'      => $data['content'],
                'author_id' => $authorId,
            ],
            $data['categories']
        );

        if ($status) {
            return true;
        }

        $this->removeCover($coverPath);

        return false;
    }

    public function update(int $id, array $data, array $file, int $authorId)
    {
        if (!Validator::article(array_merge($data, ['cover' => $file]))) {
            return false;
        }

        $articleRepository = ArticleRepository::getInstance();

        $article = $articleRepository->findById($id);

        if (!$article) {
            return false;
        }

        if ($article->author_id !== $authorId) {
            return false;
        }

        $this->removeCover($article->cover);

        $coverPath = $this->uploadCover($file);

        $status = $articleRepository->update(
            $id, 
            [
                'title'     => $data['title'],
                'cover'     => $coverPath,
                'body'      => $data['content'],
                'author_id' => $authorId,
            ],
            $data['categories']
        );

        if ($status) {
            return true;
        }

        $this->removeCover($coverPath);

        return false;
    }

    public function delete(int $id){
        $articleRepository = ArticleRepository::getInstance();
        $article = $articleRepository->findById($id);

        if (!$article) {
            return false;
        }

        $this->removeCover($article->cover);

        return $articleRepository->delete($id);
    }

    private function uploadCover(array $file): string
    {
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $name = 'cover-' . time() . '.' . $extension;
        $path = __DIR__ . '/../../public/images/' . $name;

        move_uploaded_file($file['tmp_name'], $path);

        return "/images/$name";
    }

    private function removeCover(string $coverPath): void
    {
        if (file_exists(__DIR__ . '/../../public' . $coverPath)) {
            unlink(__DIR__ . '/../../public' . $coverPath);
        }
    }
}