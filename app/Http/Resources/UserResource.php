<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $showSensitiviteFields = false;

    public function toArray($request)
    {
        if (!$this->showSensitiviteFields) {
            $this->resource->addHidden(['phone', 'email']);
        }

        $data = parent::toArray($request);

        $data['bound_phone'] = $this->resource->phone ? true : false;
        $data['bound_wechat'] = ($this->resource->weixin_unionid || $this->resource->weixin_openid) ? true : false;

        return $data;

    }

    public function showSensitiviteFields()
    {
        $this->showSensitiviteFields = true;

        return $this;
    }
}
