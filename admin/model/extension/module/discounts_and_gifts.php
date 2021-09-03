<?php

class ModelExtensionModuleDiscountsAndGifts extends Controller {

	public function install() {

		$this->installTables();

		return TRUE;

	}

	public function installTables(){
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "discounts_and_gifts` (
              `id` INT NOT NULL AUTO_INCREMENT,
              `category_id` varchar(20) NOT NULL,
              `time_start` datetime NOT NULL,
              `time_end` datetime NOT NULL,
              `type` varchar(1) NOT NULL default 0,
               PRIMARY KEY (`id`)
            ) DEFAULT CHARSET=utf8;");
	}

	public function upgrade(){

		$this->installTables();

	}

	public function uninstall(){

		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "discounts_and_gifts");

	}

}