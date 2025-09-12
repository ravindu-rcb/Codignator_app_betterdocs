<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Concession extends CI_Controller
{
    // Index now shows the Concession Table
    public function index()
    {
        $data['page_title'] = 'Concession Table';
        // BetterDocs slug for the table doc, change if your slug is different
        $data['doc_slug']   = 'concession-table';

        // Demo rows, replace with DB results later
        $data['rows'] = [
            ['ID' => 'C-1001', 'Requester' => 'Alex', 'Type' => 'Fee reduction',     'Status' => 'Pending'],
            ['ID' => 'C-1002', 'Requester' => 'Mina', 'Type' => 'Deadline extension', 'Status' => 'Approved'],
            ['ID' => 'C-1003', 'Requester' => 'Ravi', 'Type' => 'Special approval',   'Status' => 'Rejected'],
        ];

        $this->load->view('concession_table', $data);
    }

    // Keep your original form at /concession/new
    public function new()
    {
        $data['page_title'] = 'Concession';
        $data['doc_slug']   = 'understanding-elements'; // your existing form doc
        $this->load->view('concession', $data);
    }
}
