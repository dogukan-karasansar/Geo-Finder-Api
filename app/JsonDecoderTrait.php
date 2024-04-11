<?php

namespace App;

use Illuminate\Support\Facades\File;

trait JsonDecoderTrait
{
    public function getJson(string $path): string
    {
        return File::get(base_path($path));
    }


    public function decodeJson(string $path): mixed
    {
        return json_decode(json: $this->getJson($path), associative: true);
    }
}
