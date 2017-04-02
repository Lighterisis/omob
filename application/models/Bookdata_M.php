<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookdata_M extends CI_Model {

 	public function getus(){
 		$us = $this->db->get('us')->result();
        return $us;
 	}

 	public function getbook(){
 		$book = $this->db->get('book')->result();
        return $book;
 	}
 	public function getbookborrow(){
 		$this->db->select('na,img');
 		$this->db->where('cst',$cst='Borrowed');
 		$bookborrow = $this->db->get('book')->result();
        return $bookborrow;
 	}
 	public function getbookInLibrary(){
        //SELECT na,img FROM `book` WHERE cst = 'In the library'
 		$this->db->select('na,img');
 		$this->db->where('cst',$cst='In the library');
 		$booklibrary = $this->db->get('book')->result();
        return $booklibrary;
 	}
 	public function getbookc($id){
        // SELECT us.usn,bookc.cmd,bookc.cm,book.id FROM us 
        // JOIN bookc ON bookc.us_id=us.id
        // JOIN book ON book.id=bookc.book_id WHERE book.id=2
 		$this->db->select('us.usn,bookc.cmd,bookc.cm,book.id');
 		$this->db->from('us');
 		$this->db->join('bookc','bookc.us_id = us.id');
        $this->db->join('book','book.id = bookc.book_id');
        $this->db->where('book.id',$id);
        $this->db->order_by('bookc.id','DESC');
 		$bookc = $this->db->get()->result();
        return $bookc;
 	}
    public function comment($data){
        $this->db->insert('bookc',$data);
    }
    public function getbookh(){
        $bookh = $this->db->get('bookh')->result();
         return $bookh;
    }
 	public function insertbook($inb){
        $this->db->select('id');
        $this->db->where('usn',$inb['rcmb']);
        $us = $this->db->get('us')->row();
        $inb['rcmb']=$us->id;
        
        $this->db->insert('book',$inb);
 	}
    public function showbook($id){
        $this->db->where('id',$id);
        $book = $this->db->get('book')->result();
        return $book;
    }
    public function updatebook($data,$id){
        $this->db->select('id');
        $this->db->where('usn',$data['rcmb']);
        $us = $this->db->get('us')->row();
        $data['rcmb']=$us->id;
        $this->db->where('id', $id);
        $this->db->update('book', $data);
    }
}
?>