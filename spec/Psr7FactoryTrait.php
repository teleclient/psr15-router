<?php

/*
 * PSR-15 Router by @ajgarlag
 *
 * Copyright (C) Antonio J. García Lagar <aj@garcialagar.es>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Ajgarlag\Psr15\Router;

use Http\Factory\Diactoros\ResponseFactory;
use Http\Factory\Diactoros\ServerRequestFactory;
use Http\Factory\Diactoros\UriFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

trait Psr7FactoryTrait
{
    /**
     * @param array  $server
     * @param string $method
     * @param string $uri
     *
     * @return ServerRequestInterface
     */
    protected function fakeAServerRequest($server = [], $method = 'GET', $uri = 'http://example.org')
    {
        $requestFactory = new ServerRequestFactory();
        $uriFactory = new UriFactory();
        $request = $requestFactory->createServerRequestFromArray($server)
            ->withMethod($method)
            ->withUri($uriFactory->createUri($uri))
        ;

        return $request;
    }

    /**
     * @param int $code
     *
     * @return ResponseInterface
     */
    protected function fakeAResponse($code = 200)
    {
        $factory = new ResponseFactory();
        $response = $factory->createResponse($code);

        return $response;
    }
}
