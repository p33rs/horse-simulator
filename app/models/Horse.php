<?php

class Horse extends Eloquent {
    protected $guarded = ['likes'];
    public function user()
    {
        return $this->belongsTo('User');
    }
    public function getChillingAttribute($value) {
        return $value === '1';
    }
    public function getUserIdAttribute($value) {
        return (int) $value;
    }
    public function getIdAttribute($value) {
        return (int) $value;
    }
    public function getLikesAttribute($value) {
        return (int) $value;
    }
}
