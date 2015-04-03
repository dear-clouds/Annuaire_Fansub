<?php

class Image extends Eloquent
{

	protected $guarded = array();
	protected $table = 'images';

	public static function saveUpload($data)
	{
		DB::table('images')->insert($data);
	}


	public function auth()
	{
		return $this->belongsTo('User');
	}


}