<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pin_Search
 *
 * @author NKIGEN
 */
class Pin_Search extends CI_Model{
    
     var $channel ;
    
      public function get_pin($kra_pin)
        {
            echo $this->makeRequest( 'post','http://www.kra.go.ke/checker/results.php' ,
                    array('pin='.$kra_pin, 'submit=Search'),
                    'http://www.kra.go.ke/checker/pinchecker.php' );
        }
     public function curl(  )
        {
            $this->channel = curl_init( );
            curl_setopt( $this->channel, CURLOPT_FOLLOWLOCATION, true );
            curl_setopt( $this->channel, CURLOPT_RETURNTRANSFER, true );
        }
    public function makeRequest( $method, $url, $vars, $referer)
        {
            $this->curl();
            if( is_array( $vars ) ):
                $vars = implode( '&', $vars );
            endif;
            
            curl_setopt( $this->channel, CURLOPT_URL, $url );
            if ( strtolower( $method ) == 'post' ) :
                curl_setopt( $this->channel, CURLOPT_POST, true );
                curl_setopt( $this->channel, CURLOPT_POSTFIELDS, $vars );
                curl_setopt($this->channel, CURLOPT_REFERER, $referer);
            endif;
            // return data
            return curl_exec( $this->channel );
        }
}

?>
