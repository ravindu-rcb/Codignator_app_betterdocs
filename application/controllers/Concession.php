<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Concession extends CI_Controller
{
    public function index()
    {

        $data['page_title'] = 'Concession';
        $data['doc_slug']   = 'concession-table';
        $data['rows'] = [
            ['ID'=>'C-1001','Requester'=>'Alex','Type'=>'Fee reduction','Status'=>'Pending'],
            ['ID'=>'C-1002','Requester'=>'Mina','Type'=>'Deadline extension','Status'=>'Approved'],
            ['ID'=>'C-1003','Requester'=>'Ravi','Type'=>'Special approval','Status'=>'Rejected'],
        ];
        $this->load->view('concession_table', $data);
    }

    // was: public function new()
    public function new_form()
    {
        $data['page_title'] = 'Concession';
        $data['doc_slug']   = 'concession-configuration';
        $this->load->view('concession_form', $data);
    }
}
