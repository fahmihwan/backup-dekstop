<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailOrders extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'meja' => $this->meja,
            'nota' => $this->nota,
            'created_at' => $this->created_at->diffForHumans(),
            'status_pemesanan' => $this->status_pemesanan,
            'status_pembayaran' => $this->status_pembayaran,
            'tipe_pembayaran' => $this->tipe_pembayaran,
            'total_harga' => $this->total_harga,
            'ppn' => $this->ppn,
            'total_bayar' => $this->total_bayar,
            'created_at' => $this->created_at,
        ];
    }
}
