<?php

declare(strict_types=1);

namespace Test\Functional;

class HomeActionTest extends WebCase
{

    public function testSuccess(): void
    {
        $response = $this->app()->handle(
            self::toJson('GET', '/')->withHeader('Test', '!NEW_HOME')
        );

        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('application/json', $response->getHeaderLine('Content-Type'));
        self::assertEquals('{}', (string)$response->getBody());
    }

    /**
     * @param string $method
     * @dataProvider getNotValidMethods
     */
    public function testNotSupportMethods(string $method): void
    {
        $response = $this->app()->handle(self::toJson($method, "/"));
        self::assertEquals('405', $response->getStatusCode());
    }

    /**
     * @return \string[][]
     */
    public function getNotValidMethods(): array
    {
        return [
            ['POST'],
            ['PUT'],
            ['DELETE'],
            ['PATCH'],
        ];
    }
}
