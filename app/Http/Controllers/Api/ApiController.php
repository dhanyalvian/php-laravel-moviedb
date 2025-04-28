<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Resources\ListResource;

class ApiController extends BaseController
{
    protected function respList(bool $status, array $resource, string $message = ''): ListResource
    {
        return new ListResource($status, $message, $resource);
    }
    
    protected function getResource(array $result): array
    {
        return $result;
    }
}
