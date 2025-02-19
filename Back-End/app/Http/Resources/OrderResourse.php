<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderItemResourse;

class OrderResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'user_id' => new UserResource($this->order->user), //check this association
            'order_items' => OrderItemResourse::collection($this->orderItems),
            'total'       => $this->total,
            'created_at'  => $this->created_at,
        ];
    }
}
