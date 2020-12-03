<?php

namespace App\Helpers;

/**
*
*/
class Data
{

	public $projectSortCategories = [
        ['name' => '新着順', 'type' => 'date', 'value' => 'd'],
        ['name' => 'お気に入り順', 'type' => 'popularity', 'value' => 'p'],
        ['name' => '支援総額順', 'type' => 'date', 'value' => 'c'],
        ['name' => '達成間近順', 'type' => 'completed', 'value' => 'per']
    ];


	public $productSortCategories = [
        ['name' => '新着順', 'type' => 'date', 'value' => 'd'],
        ['name' => 'お気に入り順', 'type' => 'popularity', 'value' => 'p'],
        ['name' => '人気の商品', 'type' => 'mostsold', 'value' => 'most'],
        // ['name' => '支援総額順', 'type' => 'date', 'value' => 'i'],
        // ['name' => '達成間近順', 'type' => 'completed', 'value' => 'c']
    ];

	// public $prefectures = [
	// 			['name' => '北海道', 'type' => 'date', 'value' => '北海道'],
	// 			['name' => '青森', 'type' => 'popularity', 'value' => '青森'],
	// 			['name' => '秋田', 'type' => 'date', 'value' => '秋田'],
	// 			['name' => '岩手', 'type' => 'completed', 'value' => '岩手'],
	// 			['name' => '山形', 'type' => 'completed', 'value' => '山形'],
	// 			['name' => '宮城', 'type' => 'completed', 'value' => '宮城'],
	// 			['name' => '福島', 'type' => 'completed', 'value' => '福島'],
	// 			['name' => '栃木', 'type' => 'completed', 'value' => '栃木'],
	// 			['name' => '群馬', 'type' => 'completed', 'value' => '群馬'],
	// 			['name' => '茨城', 'type' => 'completed', 'value' => '茨城'],
	// 			['name' => '埼玉', 'type' => 'completed', 'value' => '埼玉'],
	// 			['name' => '東京', 'type' => 'completed', 'value' => '東京'],
	// 			['name' => '千葉', 'type' => 'completed', 'value' => '千葉'],
	// 			['name' => '神奈川', 'type' => 'completed', 'value' => '神奈川'],
	// 			['name' => '新潟', 'type' => 'completed', 'value' => '新潟'],
	// 			['name' => '石川', 'type' => 'completed', 'value' => '石川'],
	// 			['name' => '富山', 'type' => 'completed', 'value' => '富山'],
	// 			['name' => '長野', 'type' => 'completed', 'value' => '長野'],
	// 			['name' => '福井', 'type' => 'completed', 'value' => '福井'],
	// 			['name' => '岐阜', 'type' => 'completed', 'value' => '岐阜'],
	// 			['name' => '山梨', 'type' => 'completed', 'value' => '山梨'],
	// 			['name' => '愛知', 'type' => 'completed', 'value' => '愛知'],
	// 			['name' => '静岡', 'type' => 'completed', 'value' => '静岡'],
	// 			['name' => '兵庫', 'type' => 'completed', 'value' => '兵庫'],
	// 			['name' => '京都', 'type' => 'completed', 'value' => '京都'],
	// 			['name' => '滋賀', 'type' => 'completed', 'value' => '滋賀'],
	// 			['name' => '大阪', 'type' => 'completed', 'value' => '大阪'],
	// 			['name' => '奈良', 'type' => 'completed', 'value' => '奈良'],
	// 			['name' => '三重', 'type' => 'completed', 'value' => '三重'],
	// 			['name' => '和歌山', 'type' => 'completed', 'value' => '和歌山'],
	// 			['name' => '鳥取', 'type' => 'completed', 'value' => '鳥取'],
	// 			['name' => '島根', 'type' => 'completed', 'value' => '島根'],
	// 			['name' => '岡山', 'type' => 'completed', 'value' => '岡山'],
	// 			['name' => '広島', 'type' => 'completed', 'value' => '広島'],
	// 			['name' => '香川', 'type' => 'completed', 'value' => '香川'],
	// 			['name' => '愛媛', 'type' => 'completed', 'value' => '愛媛'],
	// 			['name' => '徳島', 'type' => 'completed', 'value' => '徳島'],
	// 			['name' => '高知', 'type' => 'completed', 'value' => '高知'],
	// 			['name' => '福岡', 'type' => 'completed', 'value' => '福岡'],

	// 			['name' => '佐賀', 'type' => 'completed', 'value' => '佐賀'],
	// 			['name' => '長崎', 'type' => 'completed', 'value' => '長崎'],
	// 			['name' => '熊本', 'type' => 'completed', 'value' => '熊本'],
	// 			['name' => '大分', 'type' => 'completed', 'value' => '大分'],
	// 			['name' => '宮崎', 'type' => 'completed', 'value' => '宮崎'],
	// 			['name' => '鹿児島', 'type' => 'completed', 'value' => '鹿児島'],
	// 			['name' => '沖縄', 'type' => 'completed', 'value' => '沖縄']
	// 		];




			public $prefectures = [
				['name' => '北海道', 'type' => 'completed', 'value' => '北海道'],
				['name' => '青森県', 'type' => 'completed', 'value' => '青森県'],
				['name' => '岩手県', 'type' => 'completed', 'value' => '岩手県'],
				['name' => '宮城県', 'type' => 'completed', 'value' => '宮城県'],
				['name' => '秋田県', 'type' => 'completed', 'value' => '秋田県'],
				['name' => '山形県', 'type' => 'completed', 'value' => '山形県'],
				['name' => '福島県', 'type' => 'completed', 'value' => '福島県'],
				['name' => '茨城県', 'type' => 'completed', 'value' => '茨城県'],
				['name' => '栃木県', 'type' => 'completed', 'value' => '栃木県'],
				['name' => '群馬県', 'type' => 'completed', 'value' => '群馬県'],
				['name' => '埼玉県', 'type' => 'completed', 'value' => '埼玉県'],
				['name' => '千葉県', 'type' => 'completed', 'value' => '千葉県'],
				['name' => '東京都', 'type' => 'completed', 'value' => '東京都'],
				['name' => '神奈川県', 'type' => 'completed', 'value' => '神奈川県'],
				['name' => '新潟県', 'type' => 'completed', 'value' => '新潟県'],
				['name' => '富山県', 'type' => 'completed', 'value' => '富山県'],
				['name' => '石川県', 'type' => 'completed', 'value' => '石川県'],
				['name' => '福井県', 'type' => 'completed', 'value' => '福井県'],
				['name' => '山梨県', 'type' => 'completed', 'value' => '山梨県'],
				['name' => '長野県', 'type' => 'completed', 'value' => '長野県'],
				['name' => '岐阜県', 'type' => 'completed', 'value' => '岐阜県'],
				['name' => '静岡県', 'type' => 'completed', 'value' => '静岡県'],
				['name' => '愛知県', 'type' => 'completed', 'value' => '愛知県'],
				['name' => '三重県', 'type' => 'completed', 'value' => '三重県'],
				['name' => '滋賀県', 'type' => 'completed', 'value' => '滋賀県'],
				['name' => '京都府', 'type' => 'completed', 'value' => '京都府'],
				['name' => '大阪府', 'type' => 'completed', 'value' => '大阪府'],
				['name' => '兵庫県', 'type' => 'completed', 'value' => '兵庫県'],
				['name' => '奈良県', 'type' => 'completed', 'value' => '奈良県'],
				['name' => '和歌山県', 'type' => 'completed', 'value' => '和歌山県'],
				['name' => '鳥取県', 'type' => 'completed', 'value' => '鳥取県'],
				['name' => '島根県', 'type' => 'completed', 'value' => '島根県'],
				['name' => '岡山県', 'type' => 'completed', 'value' => '岡山県'],
				['name' => '広島県', 'type' => 'completed', 'value' => '広島県'],
				['name' => '山口県', 'type' => 'completed', 'value' => '山口県'],
				['name' => '徳島県', 'type' => 'completed', 'value' => '徳島県'],
				['name' => '香川県', 'type' => 'completed', 'value' => '香川県'],
				['name' => '愛媛県', 'type' => 'completed', 'value' => '愛媛県'],
				['name' => '高知県', 'type' => 'completed', 'value' => '高知県'],
				['name' => '福岡県', 'type' => 'completed', 'value' => '福岡県'],
				['name' => '佐賀県', 'type' => 'completed', 'value' => '佐賀県'],
				['name' => '長崎県', 'type' => 'completed', 'value' => '長崎県'],
				['name' => '熊本県', 'type' => 'completed', 'value' => '熊本県'],
				['name' => '大分県', 'type' => 'completed', 'value' => '大分県'],
				['name' => '宮崎県', 'type' => 'completed', 'value' => '宮崎県'],
				['name' => '鹿児島県', 'type' => 'completed', 'value' => '鹿児島県'],
				['name' => '沖縄県', 'type' => 'completed', 'value' => '沖縄県']
			];



		
}
