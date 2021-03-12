<?php

	class Offers_model extends CI_Model{

		public function get_Daily_Deals(){
			return $this->db->get('products_daily_deals')->result_array();
		}

		public function save_Daily_Deals(){
			$deals = $this->input->post('deals');
			$this->db->truncate('products_daily_deals');
			foreach($deals as $deal){
				$this->db->insert('products_daily_deals', [
					'products_daily_deals_post' => $deal
				]);
			}
		}

		public function get_Trending_Categories(){
			return $this->db->get('products_trending_categories')->result_array();
		}

		public function save_Trending_Categories(){
			$trendings = $this->input->post('trendings');
			$this->db->truncate('products_trending_categories');
			foreach($trendings as $trending){
				$this->db->insert('products_trending_categories', [
					'products_trending_categories_cat' => $trending
				]);
			}
		}

		public function get_Best_Offers($id = FALSE){
			if($id){
				return $this->db->where('products_best_offers_id', $id)->get('products_best_offers')->row_array();
			}
			return $this->db->get('products_best_offers')->result_array();
		}

		public function save_Best_Offers($image){
			$this->db->insert('products_best_offers', [
				'products_best_offers_title' => $this->input->post('name'),
				'products_best_offers_image' => $image,
				'products_best_offers_status' => '1',
				'products_best_offers_created' => now(),
			]);
		}

		public function get_Best_Offer_Products($id){
			$this->db->where('best_offer_products_offer', $id);
			return $this->db->get('best_offer_products')->result_array();
		}

		public function edit_Best_Offers($id, $image){
			$this->db->where('products_best_offers_id', $id);
			$this->db->update('products_best_offers', [
				'products_best_offers_title' => $this->input->post('name'),
				'products_best_offers_image' => $image,
				'products_best_offers_status' => $this->input->post('status')
			]);
		}

		public function save_Best_Offer_Products($id){
			$products = $this->input->post('products');
			$this->db->where('best_offer_products_offer', $id)->delete('best_offer_products');
			foreach($products as $product){
				$this->db->insert('best_offer_products', [
					'best_offer_products_post' => $product,
					'best_offer_products_offer' => $id
				]);
			}
		}

		public function delete_Best_Offers($id){
			$this->db->where('best_offer_products_offer', $id)->delete('best_offer_products');
			$this->db->where('products_best_offers_id', $id)->delete('products_best_offers');
		}
	}





























