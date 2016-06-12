<?php

class CustomSoapClient extends SoapClient {

    private $username;
    private $password;
    
    function __construct($wsdl, $options){
        SoapClient::SoapClient($wsdl,$options);
    }
    /*Generates de WSSecurity header*/
    private function wssecurity_header() {

        /* The timestamp. The computer must be on time or the server you are
         * connecting may reject the password digest for security.
         */
        $timestamp = gmdate('Y-m-d\TH:i:s\Z');
        /* A random word. The use of rand() may repeat the word if the server is
         * very loaded.
         */
        $nonce = mt_rand();
        /* This is the right way to create the password digest. Using the
         * password directly may work also, but it's not secure to transmit it
         * without encryption. And anyway, at least with axis+wss4j, the nonce
         * and timestamp are mandatory anyway.
         */
        $passdigest = base64_encode(
                pack('H*',
                        sha1(
                                pack('H*', $nonce) . pack('a*',$timestamp).
                                pack('a*',$this->password))));

        $auth = 
            '<wsse:Security SOAP-ENV:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.'.
            'org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
            <wsse:UsernameToken>
            <wsse:Username>'.$this->username.'</wsse:Username>
            <wsse:Password Type ="wsse:PasswordText">'.$this->password.'</wsse:Password>
            <wsu:Created>'.$timestamp.'</wsu:Created>
            <wsu:Expires>'.'>2021-10-13T09:00:00Z'.'</wsu:Expires>
            </wsse:UsernameToken>
            </wsse:Security>';
        
                $auth2 = 
            '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/" xmlns:u="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
<s:Header>
<o:Security s:mustUnderstand="1" xmlns:o="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
<u:Timestamp u:Id="_0">
<u:Created>2016-06-02T20:53:52.913Z</u:Created>
<u:Expires>2016-06-02T20:58:52.913Z</u:Expires>
</u:Timestamp>
<o:UsernameToken u:Id="uuid-42b3ea66-3045-427a-8c0c-a74fe38e273f-2">
<o:Username>
<!-- Removed-->
</o:Username>
<o:Password>
<!-- Removed-->
</o:Password>
</o:UsernameToken>
</o:Security>
<To s:mustUnderstand="1" xmlns="http://schemas.microsoft.com/ws/2005/05/addressing/none">https://asus:8182/WebHost/BSIService.svc/sec</To>
<Action s:mustUnderstand="1" xmlns="http://schemas.microsoft.com/ws/2005/05/addressing/none">http://tempuri.org/ISecureBSIService/FindPlayerSecure</Action>
</s:Header>';


         /* XSD_ANYXML (or 147) is the code to add xml directly into a SoapVar.
         * Using other codes such as SOAP_ENC, it's really difficult to set the
         * correct namespace for the variables, so the axis server rejects the
         * xml.
         */
        $authvalues = new SoapVar($auth,XSD_ANYXML);
        
        $header = new SoapHeader("http://docs.oasis-open.org/wss/2004/01/oasis-".
            "200401-wss-wssecurity-secext-1.0.xsd", "Security", $authvalues, true);

        return $header;
    }

    /* It's necessary to call it if you want to set a different user and
     * password
     */
    public function __setUsernameToken($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }


    /* Overwrites the original method adding the security header. As you can
     * see, if you want to add more headers, the method needs to be modifyed
     */
    public function __soapCall($function_name, $arguments, $options = NULL, $input_headers = NULL, &$output_headers = NULL) {

        $result = parent::__soapCall($function_name, $arguments, $options = NULL, $this->wssecurity_header(), $output_headers = NULL);

        return $result;
    }
}