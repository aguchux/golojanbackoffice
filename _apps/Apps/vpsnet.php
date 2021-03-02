<?php

namespace Apps;

class vpsnet
{

    public $secrete_key = vps_net_api_key;
    public $vps_username = vps_username;
    public $vps_password = vps_password;
    public $domain_id = vps_domain_id;

    public $headers = NULL;
    public $url = "https://api.vps.net/virtual_machines.api10json";

    public function __construct()
    {
        $this->headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Basic {$this->secrete_key}",
            "Cache-Control: no-cache"
        );
    }

    public function addDNS($domain)
    {
        $url = "https://api.vps.net/domains/{$this->domain_id}/records.api10json";
        $data = array(
            "domain_record" => array(
                "ttl" => 86400,
                "data" => "{$domain}.com.",
                "type" => "A",
                "host" => "107.182.235.44"
            )
        );
        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_USERNAME, "agu.chux@yahoo.com");
        curl_setopt($ch, CURLOPT_PASSWORD, "*Delta1201#");
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        return $result;
    }
}
