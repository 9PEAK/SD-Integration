<?php
namespace Peak\SD\SDProduct\Model;

use Illuminate\Support\Facades\Cache;

trait Product {


	use Base;


	public function sdProduct()
	{
		return $this->sdProduct = Cache::remember(
			self::sd_key($this->id),
			self::$sd_exp,
			function () {
				$api = new \Peak\MicroService\Integration\SDProduct (
					[
						'token' => [
							'id' => 'sd-product',
							'key' => config('sd.sd-product'),
						]
					],
					[
//				'api_url' => 'http://sd-laravel/product/'
						'api_url' => 'http://sd.9peak.net/product/'
					]
				);

				$res = $api->request(
					'searchProduct',
					[
						'id' => 1
					]
				);

				if ($res) {
					return $api->result[0];
				}
			}
		);
	}




}
