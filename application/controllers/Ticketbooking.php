<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticketbooking extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Docmap_model', 'docmap');
    }

    public function index() {
        $data['page_title'] = 'Ticket Booking';
        $m = $this->docmap->get_slug($this->router->class, $this->router->method);
        $data['doc_slug'] = $m['wp_slug'] ?? '';
        $this->load->view('ticket_booking', $data);
    }
}

