<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "student_id"=> $this->id,
            "full_name"=> $this->first_name." ".$this->last_name,
            "image"=> "1700430844_hm.png",
            "email"=> "null",
            "phone"=> null,
            "age"=> 7,
            "birthday"=> null,
            "account_status"=> "enabled",
            "about"=> null,
            "website"=> null,
            "country"=> "ksa",
            "user_id"=> null,
            "gender"=> "male",
            "points"=> 1,
            "likedby"=> "[1]"
        ];
    }
}
