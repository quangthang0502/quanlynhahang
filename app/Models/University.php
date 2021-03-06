<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model {
	protected $fillable = [
		'id',
		'vi_ten',
		'en_ten',
		'vi_viet_tat',
		'en_viet_tat',
		'ten_cu',
		'co_quan',
		'dia_chi',
		'dien_thoai',
		'fax',
		'website',
		'email',
		'nam_thanh_lap',
		'thoi_gian_bat_dau_dao_tao',
		'thoi_gian_cap_bang_khoa_dau',
		'loai_hinh_dao_tao',
		'gioi_thieu_id',
		'image',
		'slug',
		'type',
	];

	public static function findBySlug( $slug ) {
		return self::where( 'slug', $slug )->first();
	}
}
