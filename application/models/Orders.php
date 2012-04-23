<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orders
 *
 * @author NKIGEN
 */
include_once 'OAuth.php';
class Orders extends CI_Model{
    public function __construct() {
        $this->load->database();
        $this->load->library('curl');
    }
    protected function get_orders()
    {
        $query = $this->db->get_where('orders',array('status'=>1));
        return $query->result_array();
    }
    public function process_orders()
    {
        $data['orders'] = $this->get_orders();
        foreach ($data['orders'] as $order) {
            $this->send_to_pesapal($order['id'],$order['transaction_id']);
        }
    }
    protected function send_to_pesapal($order,$ref) {
        
    $token=$params=NULL;
    $consumer_key = 'JWKUPgmqQSAkBZXuVLcy7okYX7EfY2xc';
    $consumer_secret = '0iu+alFcAkRUVYJ9lBmvMJwGf5Y=';
    $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
    $statusrequest = 'https://www.pesapal.com/api/querypaymentstatus';
    
    $consumer = new OAuthConsumer($consumer_key,$consumer_secret);
    $request_status = OAuthRequest::from_consumer_and_token($consumer, $token,"GET", $statusrequest, $params);
    $request_status->set_parameter("pesapal_merchant_reference", $order);
    $request_status->set_parameter('pesapal_transaction_tracking_id', $ref);
    $request_status->sign_request($signature_method, $consumer, $token);
    $st = 1;
    $ch = curl_init($request_status);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1000);
    $data = curl_exec($ch);
    $curl_errno = curl_errno($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);
 
    if($curl_errno == 0)
        {
            $values = array();
            $elements = split("=", $creq);
            $values[$elements[0]]=$elements[1];
            $status = $values['pesapal_response_data'];
            switch($status)
            {
                case "PENDING":
                    $st = 1;
                break;
                case "COMPLETED":
                    $st = 2;
                break;
                case "FAILED":
                    $st = 3;
                break;   
            }
            $query = $this->updateOrders($order, $st);
        }
    
    }
   protected function updateOrders($order,$status){
       $sql = "UPDATE orders SET status=" .$status." where id=".$order;
       $query = $this->db->query($sql);
   }
   public function renderUpdatedOrders()
   {
       $this->process_orders();
        $query = $this->db->get('orders');
        return $query->result_array();
   }
   
}

?>
