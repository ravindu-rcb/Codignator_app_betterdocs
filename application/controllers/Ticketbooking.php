<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticketbooking extends CI_Controller
{
    public function index()
    {
        $data['page_title'] = 'Ticket Booking';
        $data['doc_slug']   = 'ticket-booking'; // WP slug (post=12)
        $this->load->view('ticket_booking', $data);
    }

}
