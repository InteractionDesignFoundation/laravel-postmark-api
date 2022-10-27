<?php

namespace InteractionDesignFoundation\Postmark\Contracts;

use Psr\Http\Message\ResponseInterface;

interface Hydrator
{
    public function hydrate(ResponseInterface $response, string $class);
}