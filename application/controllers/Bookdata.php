<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookdata extends CI_Controller {
	public function index()
	{	
		$this->load->model('Bookdata_M');
		$data['us'] = $this->Bookdata_M->getus();
		$data['book'] = $this->Bookdata_M->getbook();       
     
		$data['content'] = $this->router->class.'/'.$this->router->method;
		$this->load->view('bookdata_Layout/layout',$data);
	}

	public function FirstModalBorrowBook()
	{
		$this->load->model('Bookdata_M');
		$data['booklibrary'] = $this->Bookdata_M->getbookInLibrary();
		$this->load->view($this->router->class.'/'.$this->router->method,$data);
	}
	public function SecondModalRestoreBook()
	{
		$this->load->model('Bookdata_M');
		$data['bookborrow'] = $this->Bookdata_M->getbookborrow();
		$this->load->view($this->router->class.'/'.$this->router->method,$data);
	}
	public function ThirdModalAddBook()
	{
		$this->load->model('Bookdata_M');
		$data['us'] = $this->Bookdata_M->getus();
		$this->load->view($this->router->class.'/'.$this->router->method,$data);
	}
	public function FourthModalCommentBook()
	{
		$id = $this->input->post('id');
		$this->load->model('Bookdata_M');

		if(isset($_POST['cm'])){
			$data = array(
				'book_id' => $this->input->post('id'),
				'us_id' => '4',
			 	'cm' => $this->input->post('cm')
			);
			$this->Bookdata_M->comment($data);
		}
		
		$data['bookc'] = $this->Bookdata_M->getbookc($id);
		$data['showbook'] = $this->Bookdata_M->showbook($id);
		$this->load->view($this->router->class.'/'.$this->router->method,$data);
	}
	public function FifthModalEditBook()
	{
		$id = $this->input->post('id');
		$this->load->model('Bookdata_M');
		$data['us'] = $this->Bookdata_M->getus();
		$data['showbook'] = $this->Bookdata_M->showbook($id);
		$this->load->view($this->router->class.'/'.$this->router->method,$data);
	}
	public function insertbook()
	{
		$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '4096';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
        $config['remove_spaces'] = TRUE;


        $this->load->library("upload",$config);

        if ($this->upload->do_upload('featured')) {
                       
            $data = array(
			'img' => $_FILES['featured']['name'],
			'na' => $this->input->post('na'),
		 	'na_2' => $this->input->post('na_2'),
		 	'page' => $this->input->post('page'),
		 	'price' => $this->input->post('price'),
		 	'rcmb' => $this->input->post('rcmb'),
		 	'introduction' => $this->input->post('introduction')
			);
			$this->load->model('Bookdata_M');
			$this->Bookdata_M->insertbook($data);
        } else {
            $errors = $this->upload->display_errors();
            echo $errors; 
        }
        $data['content'] = $this->router->class.'/'.$this->router->method;
        redirect(base_url().$this->router->class.'','refresh',$data);
		
	}
	public function update()
	{
		$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '4096';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
        $config['remove_spaces'] = TRUE;


        $this->load->library("upload",$config);
       
		if(@$_POST){ #if form submitted
			$id = $this->input->post('id');
			if($this->upload->do_upload('featured')){
				$data['img'] = $_FILES['featured']['name'];
			}
			$data = array(
				'na' => $this->input->post('na'),
			 	'na_2' => $this->input->post('na_2'),
			 	'page' => $this->input->post('page'),
			 	'price' => $this->input->post('price'),
			 	'rcmb' => $this->input->post('rcmb'),
			 	'cst' => $this->input->post('cst'),
			 	'st' => $this->input->post('st'),
			 	'introduction' => $this->input->post('introduction')
			);
		}else{
			$errors = $this->upload->display_errors();
            echo $errors;
		}

		$this->load->model('Bookdata_M');
		$this->Bookdata_M->updatebook($data,$id);

		$data['content'] = $this->router->class.'/'.$this->router->method;
       	redirect(base_url().$this->router->class.'','refresh',$data);	
	}

}
?>