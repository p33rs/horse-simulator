<?php

class Horse extends Eloquent {
    protected $guarded = ['likes'];
    public function user()
    {
        return $this->belongsTo('User');
    }
}
