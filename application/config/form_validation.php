<?php

$config = [
			'add_article_rules' => [
										[
											'field' => 'title',
											'label' => 'Article Title',
											'rules' => 'required|alpha|trim'
										],
										[
											'field' => 'body',
											'label' => 'Article Body',
											'rules' => 'required'
										],

			                       ],
			'admin_login' => [
										[
											'field' => 'username',
											'label' => 'User name',
											'rules' => 'required|alpha|trim'
										],
										[
											'field' => 'password',
											'label' => 'Password',
											'rules' => 'required'
										],

			                       ]

];