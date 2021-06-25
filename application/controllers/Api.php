<?php
defined('BASEPATH') OR exit('No direct script access allowed');
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin:*');
	//header('Access-Control-Allow-Origin:http://mi-linux.wlv.ac.uk/~1922139/ci3/index.php/Api/books');

/*if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type');
	header('Access-Control-Allow-Origin:http://mi-linux.wlv.ac.uk/~1922139/ci3/index.php/Api/books');
	exit;
}*/

 

class Api extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Booksmodel');
		$this->load->helper('url_helper');
		
	}
//display data from this method

	public function books()
	{
		//header('Access-Control-Allow-Origin:https://mi-linux.wlv.ac.uk/~1922139/ci3/index.php/Api/books');
		//header('Access-Control-Allow-Methods:GET');
		header('Access-Control-Allow-Origin:*');
		$data['books'] = $this->Booksmodel->getAllBooks();
		$this->load->view('api/index', $data);
	}
	/* add new books*/
	public function add_books()
	{
	
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Methods: POST');
	//Read values from POST (form)
		$bookName = $this->input->post('bookName');
		$author = $this->input->post('author');
		$review = $this->input->post('review');
		
	    $this->Booksmodel->add_books($bookName, $author, $review);
		
		print($bookName.'added');
	}
	/* delete books*/
	public function delete_books($id)
	{
		$this->Booksmodel->delete_books($id);
	}
	
	/*Update books*/
	 public function update_books() {
		 header('Access-Control-Allow-Origin: *');
         header('Access-Control-Allow-Methods: PUT');
		 
	    $id= $this->input->post('id');
        $bookName= $this->input->post('bookName');
        $author = $this->input->post('author');
        $review = $this->input->post('review');

		$this->Booksmodel->update_books($id, $bookName, $author, $review);

      
    }
}
?>