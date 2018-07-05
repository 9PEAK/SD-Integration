<?php
namespace Peak\SD\SDProduct\Model;

trait Base {


	protected static $sd_pref = 'sd';
	protected static $sd_exp = 60*6;

	protected static function sd_key ($id)
	{
		if ( $id) {
			return self::$sd_pref.'-'.static::class.'-'.$id;
		}
	}

}
