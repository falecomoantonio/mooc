<?php


namespace Mooc\Traits;


trait CryptId
{
    public function getCryptIdAttribute()
    {
        try {
            return encrypt($this->original[$this->primaryKey]);
        } catch (\Exception $e) {
            logger($e->getMessage());
            return null;
        }
    }
}
