<?php

	class Offers extends MX_Controller{

		public function daily_deals(){
			allowUser([121]);
			$this->load->model("Offers_model");
			$deals = [];
			$data["products"] = modules::run('products/products/return_Products');
			$dailydeals = $this->Offers_model->get_Daily_Deals();
			foreach($dailydeals as $dailydeal){
				$deals[] = $dailydeal['products_daily_deals_post'];
			}
			$data["dailydeals"] = $deals;
			$data["title"] = "Daily Deals";
			$data["page"] = $this->load->view("daily-deals", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}

		public function save_daily_deals(){
			allowUser([121]);
			$this->load->model("Offers_model");
			$this->Offers_model->save_Daily_Deals();
			save_Activity('Daily deals has been updated');
			redirect($_SERVER['HTTP_REFERER']);
		}

		public function trending_categories(){
			allowUser([121]);
			$this->load->model("Offers_model");
			$trending = [];
			$data["categories"] = modules::run('products/products/return_Categories');
			$trending_categories = $this->Offers_model->get_Trending_Categories();
			foreach($trending_categories as $trending_category){
				$trending[] = $trending_category['products_trending_categories_cat'];
			}
			$data["cat"] = $trending;
			$data["title"] = "Trending Categories";
			$data["page"] = $this->load->view("trending-categories", $data, true);
			echo modules::run("layouts/layouts/load", $data);
		}

		public function save_trending_categories(){
			allowUser([121]);
			$this->load->model("Offers_model");
			$this->Offers_model->save_Trending_Categories();
			save_Activity('Trending categories has been updated');
			redirect($_SERVER['HTTP_REFERER']);
		}

		public function best_offers(){
			allowUser([121]);
			$this->load->model("Offers_model");
			$trending = [];
			$data["offers"] = $this->Offers_model->get_Best_Offers();
			$data["title"] = "Daily Deals";

			$this->form_validation->set_rules('name', 'Offer Title', 'required|min_length[1]|max_length[100]');
			
			if ($this->form_validation->run() === FALSE){
				$data["page"] = $this->load->view("best-offers", $data, true);
				echo modules::run("layouts/layouts/load", $data);
			} else {
				$image = doUpload();
				$this->Offers_model->save_Best_Offers($image);
				save_Activity('New Best offer added');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		public function edit_best_offers($id){
			allowUser([121]);
			$this->load->model("Offers_model");
			$offer = [];
			$data["offer"] = $this->Offers_model->get_Best_Offers($id);
			$offerproducts = $this->Offers_model->get_Best_Offer_Products($id);
			foreach($offerproducts as $offerproduct){
				$offer[] = $offerproduct['best_offer_products_post'];
			}
			$data["offerproducts"] = $offer;
			$data["title"] = "Edit Offer";
			$data["products"] = modules::run('products/products/return_Products');

			$this->form_validation->set_rules('name', 'Offer Title', 'required|min_length[1]|max_length[100]');
			
			if ($this->form_validation->run() === FALSE){
				$data["page"] = $this->load->view("edit-best-offers", $data, true);
				echo modules::run("layouts/layouts/load", $data);
			} else {
				if($_FILES['userfile']['name']){
					$image = doUpload();
					deleteUpload($this->input->post('old_Picture'));
				}else{
					$image = $this->input->post('old_Picture');
				}
				$this->Offers_model->edit_Best_Offers($id, $image);
				save_Activity('Best offer was updated');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		public function save_best_offers($id){
			allowUser([121]);
			$this->load->model("Offers_model");
			$this->Offers_model->save_Best_Offer_Products($id);
			save_Activity('Product of best offers was updated');
			redirect($_SERVER['HTTP_REFERER']);
		}

		public function delete_best_offers($id){
			allowUser([121]);
			$this->load->model("Offers_model");
			$this->Offers_model->delete_Best_Offers($id);
			save_Activity('Best offer deleted');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
































