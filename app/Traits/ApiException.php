<?php

namespace App\Traits;

use App\Exceptions\LibraryException;

trait ApiException
{
    /**
     * Returna a bad request exception.
     *
     * @param  array|string  $exception
     * @return void
     */
    public function badRequestException(array|string $exception): void
    {
        throw new LibraryException($exception, 400);
    }

    /**
     * Returna a unauthorized request exception.
     *
     * @param  array|string  $exception
     * @return void
     */
    public function unauthorizedRequestException(array|string $exception): void
    {
        throw new LibraryException($exception, 401);
    }

    /**
     * Returna a pre condition failed exception.
     *
     * @param  array|string  $exception
     * @return void
     */
    public function preConditionFailedException(array|string $exception): void
    {
        throw new LibraryException($exception, 412);
    }

    /**
     * Return a not found request exception.
     *
     * @param  array|string  $exception
     * @return void
     */
    public function notFoundRequestException(array|string $exception): void
    {
        throw new LibraryException($exception, 404);
    }
}
