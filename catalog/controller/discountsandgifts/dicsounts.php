<?php

class ControllerDiscountsAndGiftsDiscounts extends Controller {

	public function index(){

		$this->document->setTitle("Все акции");

		$this->load->model('catalog/category');
		$this->load->model('tool/discounts_and_gifts');

		$categories_id = $this->model_tool_discounts_and_gifts->getDiscountsId();

		$data['discounts_and_gifts_link'] = 'index.php?route=discountsandgifts/all';
		$data['discounts_link'] = 'index.php?route=discountsandgifts/discount';
		$data['gifts_link'] = 'gifts';

		$data['categories'] = [];

		foreach ($categories_id as $key=>$value){

			$category = $this->model_catalog_category->getCategory($value['category_id']);;

			$category_info = [
				'category_id' => $category['category_id'],
				'image' => $category['image'],
				'name' => $category['name'],
				'description' => $category['description'],
				'meta_title' => $category['meta_title'],
				'meta_h1' => $category['meta_h1'],
				'meta_description' => $category['meta_description'],
				'meta_keyword' => $category['meta_keyword'],
				'type' => $this->model_tool_discounts_and_gifts->getType($value['category_id']),
				'time_start' => $this->model_tool_discounts_and_gifts->getTimeStart($value['category_id']),
				'time_end' => $this->model_tool_discounts_and_gifts->getTimeEnd($value['category_id']),
				'href' => $this->url->link('product/category', 'path=' . $category['category_id'])
			];


			$data['categories'][] =  $category_info;

		}

		$category_total = count($data['categories']);

		$pagination = new Pagination();
		$pagination->total = $category_total;
		$pagination->page = 1;
		$pagination->limit = 3;
		$pagination->url = $this->url->link('discountsandgifts/all', '&page={page}');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('discounts_and_gifts/discounts', $data));
	}

}