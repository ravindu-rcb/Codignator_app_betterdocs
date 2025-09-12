<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticketbooking extends CI_Controller
{
    public function index()
    {
        // Use a different BetterDocs page if you like
        $data['page_title']     = 'Ticket Booking';
        $this->load->view('ticket_booking', $data);
    }
}
