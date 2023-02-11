<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardDetailOrders extends JsonResource
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
            'id' => $this->id,
            'nota' => $this->nota,
            'nama' => $this->nama,
            'meja' => $this->meja,
            'qty' => $this->qty,
            'status_pemesanan' => $this->status_pemesanan,
            'status_pembayaran' => $this->status_pembayaran,
            'tipe_pembayaran' => $this->tipe_pembayaran,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
