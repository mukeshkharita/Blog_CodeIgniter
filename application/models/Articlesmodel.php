<?php

class Articlesmodel extends CI_Model
{
	public function articles_list($limit,$offset)
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db
						->select(['title','id'])
						->from('articles')
						->where('user_id',$user_id)
						->limit($limit,$offset)
						->get();
		$articles = $query->result();
		return $articles;
	}
	public function all_articles_list($limit,$offset)
	{
		$query = $this->db
						->select(['title','id','created_at'])
						->from('articles')
						->limit($limit,$offset)
						->order_by('created_at','DESC')
						->get();
		$articles = $query->result();
		return $articles;
	}

	public function num_rows()
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db
						->select(['title','id'])
						->from('articles')
						->where('user_id',$user_id)
						->get();
		$articles = $query->num_rows();
		return $articles;
	}
	public function count_all_articles()
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db
						->select(['title','id'])
						->from('articles')
						->get();
		$articles = $query->num_rows();
		return $articles;
	}
	public function add_article($array)
	{
		$affected_rows = $this->db->insert('articles',$array);
		return $affected_rows;
	}

	public function find_article($aerticle_id)
	{
		$q = $this->db->where('id',$aerticle_id)
				->select(['title','id','body'])
				->get('articles');
		return $q->row();
	}
	public function update_article($article_id,Array $article)
	{
		$affected_rows = $this->db->where('id',$article_id)
		->update('articles',$article);
		return $affected_rows;
	}
	public function deleted_article($article_id)
	{
		return $this->db->delete('articles',['id'=>$article_id]);
	}
	public function search($query,$limit,$offset)
	{
		$q = $this->db->from('articles')
		->like('title',$query)
		->limit($limit,$offset)
		->get();
		return $q->result();
	}
	public function count_search_results($query)
	{
		$q = $this->db->from('articles')
		->like('title',$query)
		->get();
		return $q->num_rows();
	}

	public function find($id)
	{
		$q = $this->db->from('articles')
		->where(['id'=>$id])
		->get();
		if($q->num_rows())
			return $q->row();
		else
			return FALSE;

	}
}