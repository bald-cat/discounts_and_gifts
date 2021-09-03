<?php

class ModelToolDiscountsAndGifts extends Model {

	public function getTimeEnd($category_id){

		$sql = "SELECT time_end FROM " . DB_PREFIX . "discounts_and_gifts WHERE category_id = '" . $category_id . "'";
		$query = (array) $this->db->query($sql);
		$time = $query['row']['time_end'];

		$result = new DateTime($time);

		return $result->format('Y-m-d\TH:i:s');

	}

	public function getTimeStart($category_id){

		$sql = "SELECT time_start FROM " . DB_PREFIX . "discounts_and_gifts WHERE category_id = '" . $category_id . "'";
		$query = (array) $this->db->query($sql);
		$time = $query['row']['time_start'];

		$result = new DateTime($time);

		return $result->format('Y-m-d\TH:i:s');

	}

}