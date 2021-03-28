<?php

declare(strict_types=1);

namespace Test\Functional;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Psr7\Factory\ServerRequestFactory;

class WebCase extends TestCase
{
    private ?App $app = null;

    /**
     * Очистка перед завершением теста
     */
    protected function tearDown(): void
    {
        $this->app = null;
        parent::tearDown();
    }

    /**
     * Создание приложения
     * @return App
     */
    protected function app(): App
    {
        $this->dotenv();

        if ($this->app === null) {
            /** @var App */
            $this->app = (require __DIR__ . '/../../config/app/application.php')($this->container());
        }
        return $this->app;
    }

    /**
     * Создание контейнера
     * @return ContainerInterface
     */
    private function container(): ContainerInterface
    {
        /** @var ContainerInterface */
        return require __DIR__ . '/../../config/app/container.php';
    }

    /**
     *
     * Отправка запроса
     * @param string $method
     * @param string $path
     * @param array $body
     * @return ServerRequestInterface
     */
    protected static function toJson(string $method, string $path, array $body = []): ServerRequestInterface
    {
        $request = self::request($method, $path)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json');
        try {
            $request->getBody()->write(json_encode($body, JSON_THROW_ON_ERROR));
        } catch (\JsonException $e) {
        }
        return $request;
    }

    /**
     * Построение запроса
     * @param string $method
     * @param string $path
     * @return ServerRequestInterface
     */
    protected static function request(string $method, string $path): ServerRequestInterface
    {
        return (new ServerRequestFactory())->createServerRequest($method, $path);
    }

    /**
     * Инициализация переменных окружения
     */
    private function dotenv(): void
    {
        $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../../', '.env-test');
        $dotenv->load();
    }
}
