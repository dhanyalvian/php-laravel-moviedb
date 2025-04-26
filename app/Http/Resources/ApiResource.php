<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    public bool $status = true;
    public string $message = '';
    public $resource;

    public function __construct(bool $status, string $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }
    
    public function toResponse($request)
    {
        return response()->json(
            [
                'meta' => [
                    'status' => $this->status,
                    'timestamp' => now(),
                ],
                'data' => $this->toArray($request),
                'message' => $this->message,
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}
