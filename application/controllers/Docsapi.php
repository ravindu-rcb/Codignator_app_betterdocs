<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docsapi extends CI_Controller
{
    // Set to your WordPress base
    private $wp_base = 'http://localhost:8080';
    // BetterDocs post type, usually 'docs', sometimes 'betterdocs'
    private $cpt = 'docs';

    public function get($slug = '')
    {
        if (!$slug) {
            return $this->output->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Missing slug']));
        }

        $endpoint = $this->wp_base . '/wp-json/wp/v2/' . $this->cpt
                  . '?slug=' . rawurlencode($slug)
                  . '&_fields=title,content,link';

        $ch = curl_init($endpoint);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 8,
        ]);
        $resp = curl_exec($ch);
        $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err  = curl_error($ch);
        curl_close($ch);

        if ($resp === false) {
            return $this->output->set_status_header(502)
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Could not reach WordPress', 'detail' => $err]));
        }

        $arr = json_decode($resp, true);
        if ($http !== 200 || !is_array($arr)) {
            return $this->output->set_status_header(502)
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Bad response from WordPress', 'status' => $http]));
        }

        if (empty($arr)) {
            return $this->output->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Document not found']));
        }

        $doc = $arr[0];
        return $this->output->set_content_type('application/json')
            ->set_output(json_encode([
                'title'   => $doc['title']['rendered']   ?? '',
                'content' => $doc['content']['rendered'] ?? '',
                'link'    => $doc['link']                ?? ''
            ]));
    }
}
