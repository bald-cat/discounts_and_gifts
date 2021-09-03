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

	public function getType($category_id){

		$sql = "SELECT type FROM " . DB_PREFIX . "discounts_and_gifts WHERE category_id = '" . $category_id . "'";
		$query = (array) $this->db->query($sql);
		$result = $query['row']['type'];

		return $result;
	}

	public function getAllId(){
		$sql = "SELECT category_id FROM " . DB_PREFIX . "discounts_and_gifts";
		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getDiscountsId(){
		$sql = "SELECT category_id FROM " . DB_PREFIX . "discounts_and_gifts WHERE type = '" . 0 . "'";
		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getGiftsId(){
		$sql = "SELECT category_id FROM " . DB_PREFIX . "discounts_and_gifts WHERE type = '" . 1 . "'";
		$query = $this->db->query($sql);

		return $query->rows;
	}

}