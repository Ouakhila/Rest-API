<?php
defined('BASEPATH') OR exit('No direct script access allowed');



header('Access-Control-Allow-Origin:*');
/*header('Access-Control-Allow-Origin:http://mi-linux.wlv.ac.uk/~1922139/ci3/index.php/Api/books');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type');
	header('Access-Control-Allow-Origin:http://mi-linux.wlv.ac.uk/~1922139/ci3/index.php/Api/books');
	exit;
}*/

 class Booksmodel extends CI_Model {

	
	public function __construct()
	{
		
		$this->load->database();	
		
	}
		
	public function getAllBooks() 
	{
	$query = $this->db->get('books');
	return $query->result_array();
	}
	//add books
	public function add_books($bookName, $author, $review)
	{
	
		$data = array(
		'bookName' =>$bookName,
		'author' => $author,
		'review' => $review,
		);
		 
		$this->db->set('bookName', $bookName);
	    $this->db->set('author', $author);
		$this->db->set('review', $review);
		$this->db->insert('books');
		
	}
	//delete books
	public function delete_books($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('books');
		
	}
	//update 
	public function update_books($id, $bookName, $author, $review)
	{
		 $this->db->where('id', $id);
      
		return $this->db->update( 'books',array(
		'bookName' => $bookName,
		'author' => $author,
		'review' => $review));
       
    }
}
?>