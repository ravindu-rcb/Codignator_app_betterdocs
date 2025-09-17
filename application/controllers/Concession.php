<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Concession extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Docmap_model', 'docmap');
    }

    public function index() {
        $data['page_title'] = 'Concession';
        $data['rows'] = [
            ['ID'=>'C-1001','Requester'=>'Alex','Type'=>'Fee reduction','Status'=>'Pending'],
            ['ID'=>'C-1002','Requester'=>'Mina','Type'=>'Deadline extension','Status'=>'Approved'],
            ['ID'=>'C-1003','Requester'=>'Ravi','Type'=>'Special approval','Status'=>'Rejected'],
        ];
        $m = $this->docmap->get_slug($this->router->class, $this->router->method);
        $data['doc_slug'] = $m['wp_slug'] ?? '';
        $this->load->view('concession_table', $data);
    }

    public function new_form() {
        $data['page_title'] = 'Concession';
        $m = $this->docmap->get_slug($this->router->class, $this->router->method);
        $data['doc_slug'] = $m['wp_slug'] ?? '';
        $this->load->view('concession_form', $data);
    }
}

