<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docsapi extends CI_Controller
{
    private $wp_base;
    private $cpts;

    public function __construct()
    {
        parent::__construct();
        // Use env if provided, otherwise reach the host from Docker
        $this->wp_base = getenv('WP_BASE') ?: 'http://host.docker.internal:8080';
        // BetterDocs CPT varies; try both
        $this->cpts = array_map('trim', explode(',', getenv('WP_CPT') ?: 'docs,betterdocs'));
    }

    public function get($slug = '')
    {
        if (!$slug) {
            return $this->output->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode(['error' => 'Missing slug']));
        }

        $lastErr = null;
        foreach ($this->cpts as $cpt) {
            $endpoint = $this->wp_base . '/wp-json/wp/v2/' . $cpt
                      . '?slug=' . rawurlencode($slug)
                      . '&_fields=title,content,link';

            $ch = curl_init($endpoint);
            curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 8]);
            $resp = curl_exec($ch);
            $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $err  = curl_error($ch);
            curl_close($ch);

            if ($resp === false) { $lastErr = ['502', $err]; continue; }

            $arr = json_decode($resp, true);
            if ($http !== 200 || !is_array($arr)) { $lastErr = [$http, 'Bad response']; continue; }
            if (empty($arr))   { $lastErr = ['404', 'Empty']; continue; }

            $doc = $arr[0];
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode([
                    'title'   => $doc['title']['rendered']   ?? '',
                    'content' => $doc['content']['rendered'] ?? '',
                    'link'    => $doc['link']                ?? ''
                ]));
        }

        // If we got here, nothing worked
        $code = (int)($lastErr[0] ?? 502);
        return $this->output->set_status_header($code ?: 502)
            ->set_content_type('application/json')
            ->set_output(json_encode(['error' => 'Could not load doc', 'detail' => $lastErr]));
    }
}
