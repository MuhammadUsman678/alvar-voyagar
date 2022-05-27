<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class newsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title_news' => $this->news_title,
            'Short_description' => $this->Short_description,
            'brief_description' => $this->brief_description,
            'publishedAt' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'thumbnail' => url('/storage').'/'.$this->thumbnail,
            'banner_img' => url('/storage').'/'.$this->banner_img,
        ];
    }
}
