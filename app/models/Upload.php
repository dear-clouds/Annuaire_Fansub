<?php

class Upload extends Eloquent
{

	protected $guarded = array();
	protected $table = 'uploads';

	public static function saveUpload($data)
	{
		DB::table('uploads')->insert($data);
	}


	public function auth()
	{
		return $this->belongsTo('User');
	}


}