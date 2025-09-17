<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Docmap_model extends CI_Model {
    private $table = 'doc_mappings';

    public function get_slug($controller, $method) {
        $row = $this->db->select('wp_slug, wp_cpt')
                        ->from($this->table)
                        ->where(array(
                            'controller' => strtolower($controller),
                            'method'     => strtolower($method),
                            'active'     => 1
                        ))
                        ->get()->row_array();
        return $row ?: null;
    }
}
