<?php

class Admin extends MY_Controller
{
	public function dashboard()
	{
		$this->load->library('pagination');
		$config = [
			'base_url'=> base_url('admin/dashboard'),
			'per_page' => 5,
			'total_rows' => $this->articles->num_rows(),
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'first_tag_open' => '<li>',
			'first_tag_colse' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_colse' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_colse' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_colse' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_colse' => '</li>',
			'cur_tag_open' => "<li class='active'><a>",
			'cur_tag-close' => "/<li>"


		];
		$this->pagination->initialize($config);

		$articles = $this->articles->articles_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}
	public function add_article()
	{
		$this->load->view('admin/add_article');
	}
	
	public function store_article()
	{
		$config = [
			'upload_path'	=>		'./uploads',
			'allowed_types'	=>		'jpg|gif|png|jpeg|pdf',
		];
		$this->load->library('upload', $config);

		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload('image'))
		{
			$post = $this->input->post();
			unset($post['submit']);
			$data = $this->upload->data();
			$image_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
			$post['image_path'] = $image_path;
			return $this->_flashAndRedirect($this->articles->add_article($post),'Article Added!','Article Not Added!');
		}
		else
		{
			$upload_error = $this->upload->display_errors();
			$this->load->view('admin/add_article',compact('upload_error'));
		}
	}
	public function edit_article($article_id)
	{
		$articles = $this->articles->find_article($article_id);
		$this->load->view('admin/edit_article',['article'=>$articles]);
	}
	public function update_article($article_id)
	{
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules'))
		{
			$post = $this->input->post();
			unset($post['submit']);
			return $this->_flashAndRedirect($this->articles->update_article($article_id,$post),'Article Updated!','Article Not Updated!');

		}
		else
		{
			return redirect("admin/edit_article/{$article_id}");
		}
	}

	public function delete_article()
	{
		$article_id = $this->input->post('article_id');
		return $this->_flashAndRedirect($this->articles->deleted_article($article_id),'Article Deleted!','Article Not Deleted!');
		
	}

	public function __construct()
	{
		
		parent::__construct();
		if(! $this->session->userdata('user_id'))
		 return redirect('login');
		$this->load->model('articlesmodel','articles');
		$this->load->helper('form');
	}

	private function _flashAndRedirect($success,$sm,$fm)
	{
		if($success)
		{
			$this->session->set_flashdata('feedback',$sm);
			$this->session->set_flashdata('feedback_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('feedback',$fm);
			$this->session->set_flashdata('feedback_class','alert-danger');
		}
		return redirect('/admin/dashboard');
	}
}