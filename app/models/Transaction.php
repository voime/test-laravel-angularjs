<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Transaction extends Eloquent {

	protected $connection = 'mongodb';
    protected $collection = 'transaction';

    public function user()
    {
        return $this->belongsTo('User','user_id','id');
    }

}