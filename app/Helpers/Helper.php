<?php
use App\User;
use App\Income;
// use Helper;
class Helper{


  private static $private_key = '4b4E9675636B4157d104da82c9c8d5019b9cbdd081081F92F442Bd3772c86Aca';
  private static $public_key = '547470541a12629130c5068957b4c75bdc2716920f4ea934bc35bcdc227ae0af';
  private static $ch = null;

    public static function messageList()
    {
        return Message::whereNull('read_at')->orderBy('created_at', 'desc')->get();
    } 

    
   public static function runQuery($select,$table,$where,$colunm)
   {

   $details= DB::table($table)->select($select)->where($colunm,$where)->get()->toArray();
   
   return (!empty($details)?$details[0]:array());
        
    }



       public static function add_level_income($id,$amt)
        {

          //$user_id =$this->session->userdata('user_id_session')
      $data = User::where('id',$id)->orderBy('id','desc')->first();
      
        $user_id = $data->username;
        $fullname=$data->name;
       
        $rname = $data->username;
        $user_mid = $data->id;
          
      
              $cnt = 1;

                $amount = $amt/100;
                
        
                while ($user_mid!="" && $user_mid!="1"){
  
                      $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
                      $sponsor=$Sposnor_id->sponsor;
                      if (!empty($sponsor))
                       {
                        $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                      $sp_status=$Sposnor_status->active_status;
                      }
                      else
                      {
                        $Sposnor_status =array();
                        $sp_status="Pending";
                      }
                     
                    
                       if($sp_status=="Active")
                       {  
                     if($cnt==1)
                      {
                        $pp = $amount*10;
                       
                        
                      }
                      if($cnt==2)
                      {
                        $pp = $amount*5;
                       
                        
                      }
                      if($cnt==3)
                      {
                        $pp = $amount*2;
                       
                        
                      }
                      if($cnt==4)
                      {
                        $pp = $amount*1;
                       
                        
                      }
                      if($cnt==5)
                      {
                        $pp = $amount*0.5;
                       
                        
                      } 

                      if($cnt==6)
                      {
                        $pp = $amount*0.5;
                       
                        
                      }
                      if($cnt>=7 && $cnt<=10)
                      {
                        $pp = $amount*0.25;
                       
                        
                      }
                       if($cnt>=11 && $cnt<=15)
                      {
                        $pp = $amount*0.10;
                       
                        
                      }
                     
                      
                      }else
                      {
                        $pp=0;
                      }               
                     
                      
                      $user_mid = @$Sposnor_status->id;
                      //echo $user_id;
                     //die;
                      $idate = date("Y-m-d");
                
                     
                      $spid = @$Sposnor_status->id;
                   
                     
                      $user_id_fk=$sponsor;
                      //print_r($user_id_fk);die;
                     // echo $cnt." ".$spid." ".$pp."<br>";
                      if($spid>0 && $cnt<=10){
                        if($pp>0){
                         
                         $data = [
                        'user_id' => $user_mid,
                        'user_id_fk' =>$Sposnor_status->username,
                        'amt' => $amt,
                        'comm' => $pp,
                        'remarks' => 'Level Bonus',
                        'level' => $cnt,
                        'rname' => $rname,
                        'fullname' => $fullname,
                        'ttime' => Date("Y-m-d"),
                        
                    ];
                     $user_data =  Income::create($data);
                    $cnt++;
                    
                }
               }
     }

     return true;
  }


public static function withdrawal_request_api($mobileno,$beneficiaryid,$net_amt)
{
    
    // print_r($beneficiaryid);die;
       $baseurl ="http://13.127.227.22/freeunlimited/v3"; //LIVE 
// $baseurl ="http://13.127.227.22/corporate/v3/demo"; //DEMO

  $apikey="192164778378516"; //JOLOSOFT api key
   $userid="2826"; //JOLOSOFT api userid - get from profile page on jolosoft
    $callbackurl="https://starmines.in/";//CALL BACK URL OF your server
   $headerstring = "$userid|$apikey";
   $hashedheaderstring = hash("sha512", $headerstring);
   
     //generating unique random order id
$myorderid= substr(number_format(time() * rand(),0,'',''),0,10);
if(empty($myorderid)){
echo "Client order ID not generated.";
exit;
}
//set header hash in header
$header= array('Content-Type:application/json','Authorization:'.$hashedheaderstring);
$remarks="withdrwal To Bank Account";
//build payload in json
$paramList = array();
$paramList["apikey"] = $apikey;
$paramList["mobileno"] = $mobileno;
$paramList["beneficiary_account_no"] = $beneficiaryid->account_no;
$paramList["beneficiary_ifsc"] = $beneficiaryid->ifsc_code;
$paramList["purpose"] ="BONUS";
$paramList["amount"] = $net_amt;
$paramList["orderid"] = $myorderid;
$paramList["remarks"] = $remarks;
$paramList["callbackurl"] = $callbackurl;
$payload = json_encode($paramList, true);
// print_r($payload);die;
$ch = curl_init("$baseurl/transfer.php");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$file_contents = curl_exec ($ch); // execute
$err = curl_error($ch);
curl_close($ch);
// echo "$file_contents";//show response
// exit;
if(!empty($file_contents)){
$jsondata = json_decode($file_contents, true);
$rcstatus = $jsondata['status'];
$errormsg = $jsondata['error'];

return $jsondata;
}
else
{
   return array(); 
}
    
}

  public static function add_direct_income($id,$amt)
        {

          //$user_id =$this->session->userdata('user_id_session')
      $data = User::where('id',$id)->orderBy('id','desc')->first();
      
        $user_id = $data->username;
        $fullname=$data->name;
       
        $rname = $data->username;
        $user_mid = $data->id;
          
      
              $cnt = 1;

                $amount = $amt/100;
                
        
               
  
                      $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
                      $sponsor=$Sposnor_id->sponsor;
                      if (!empty($sponsor))
                       {
                        $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                      $sp_status=$Sposnor_status->active_status;
                      }
                      else
                      {
                        $Sposnor_status =array();
                        $sp_status="Pending";
                      }
                     
                    
                     if($sp_status=="Active")
                       {  
                    
                        $pp = $amount*5;
                       
                   
                      
                      }else
                      {
                        $pp=0;
                      }               
                     
                      
                      $user_mid = @$Sposnor_status->id;
                      //echo $user_id;
                     //die;
                      $idate = date("Y-m-d");
                
                     
                      $spid = @$Sposnor_status->id;
                   
                     
                      $user_id_fk=$sponsor;
                      //print_r($user_id_fk);die;
                     // echo $cnt." ".$spid." ".$pp."<br>";
                      if($spid>0 && $pp>0){
                     
                         
                         $data = [
                        'user_id' => $user_mid,
                        'user_id_fk' =>$Sposnor_status->username,
                        'amt' => $amt,
                        'comm' => $pp,
                        'remarks' => 'Direct Bonus',
                        'level' => $cnt,
                        'rname' => $rname,
                        'fullname' => $fullname,
                        'ttime' => Date("Y-m-d"),
                        
                    ];
                     $user_data =  Income::create($data);
                   
              
               }
    

     return true;
  }



// coinpayment code 


  // public static function Setup($private_key, $public_key) {
  //   $this->private_key = $private_key;
  //   $this->public_key = $public_key;
  //   static::$ch = null;
  // }
  
  /**
   * Gets the current CoinPayments.net exchange rate. Output includes both crypto and fiat currencies.
   * @param short If short == TRUE (the default), the output won't include the currency names and confirms needed to save bandwidth.
   */
  public static function GetRates($short = TRUE) {
    $short = $short ? 1:0;
    return Helper::api_call('rates', array('short' => $short));
  }
  /*
  
   */
  public static function GetBasicProfile() {
  
    return Helper::api_call('get_basic_info', []);
  }
  /**
   * Gets your current coin balances (only includes coins with a balance unless all = TRUE).<br />
   * @param all If all = TRUE then it will return all coins, even those with a 0 balance.
   */
  public static function GetBalances($all = FALSE) {   
    return Helper::api_call('balances', array('all' => $all ? 1:0));
  }
  
  /**
   * Creates a basic transaction with minimal parameters.<br />
   * See CreateTransaction for more advanced features.
   * @param amount The amount of the transaction (floating point to 8 decimals).
   * @param currency1 The source currency (ie. USD), this is used to calculate the exchange rate for you.
   * @param currency2 The cryptocurrency of the transaction. currency1 and currency2 can be the same if you don't want any exchange rate conversion.
   * @param buyer_email Set the buyer's email so they can automatically claim refunds if there is an issue with their payment.
   * @param address Optionally set the payout address of the transaction. If address is empty then it will follow your payout settings for that coin.
   * @param ipn_url Optionally set an IPN handler to receive notices about this transaction. If ipn_url is empty then it will use the default IPN URL in your account.
   */
  public static function CreateTransactionSimple($amount, $currency1, $currency2, $buyer_email, $address='', $ipn_url='') {    
    $req = array(
      'amount' => $amount,
      'currency1' => $currency1,
      'currency2' => $currency2,
      'buyer_email' => $buyer_email,
      'address' => $address,
      'ipn_url' => $ipn_url,
    );
    return Helper::api_call('create_transaction', $req);
  }

  public static function CreateTransaction($req) {
    // See https://www.coinpayments.net/apidoc-create-transaction for parameters
    return Helper::api_call('create_transaction', $req);
  }

  /**
   * Creates an address for receiving payments into your CoinPayments Wallet.<br />
   * @param currency The cryptocurrency to create a receiving address for.
   * @param ipn_url Optionally set an IPN handler to receive notices about this transaction. If ipn_url is empty then it will use the default IPN URL in your account.
   */
  public static function GetCallbackAddress($currency, $ipn_url = '') {    
    $req = array(
      'currency' => $currency,
      'ipn_url' => $ipn_url,
    );
    return Helper::api_call('get_callback_address', $req);
  }
public static function Gettxninfo($txn) {    
    $req = array(
      'txid' => $txn,
    );
    return Helper::api_call('get_tx_info', $req);
  }
  /**
   * Creates a withdrawal from your account to a specified address.<br />
   * @param amount The amount of the transaction (floating point to 8 decimals).
   * @param currency The cryptocurrency to withdraw.
   * @param address The address to send the coins to.
   * @param auto_confirm If auto_confirm is TRUE, then the withdrawal will be performed without an email confirmation.
   * @param ipn_url Optionally set an IPN handler to receive notices about this transaction. If ipn_url is empty then it will use the default IPN URL in your account.
   */
  public static function CreateWithdrawal($amount, $currency, $address, $auto_confirm = TRUE, $ipn_url = '') {   
    $req = array(
      'amount' => $amount,
      'currency' => $currency,
      'address' => $address,
      'auto_confirm' => $auto_confirm ? 1:0,
      'ipn_url' => $ipn_url,
    );
    return Helper::api_call('create_withdrawal', $req);
  }

  /**
   * Creates a transfer from your account to a specified merchant.<br />
   * @param currency The cryptocurrency to withdraw.
   * @param merchant The merchant ID to send the coins to.
   * @param auto_confirm If auto_confirm is TRUE, then the transfer will be performed without an email confirmation.
   */
  public static function CreateTransfer($amount, $currency, $merchant, $auto_confirm = FALSE) {    
    $req = array(
      'amount' => $amount,
      'currency' => $currency,
      'merchant' => $merchant,
      'auto_confirm' => $auto_confirm ? 1:0,
    );
    return Helper::api_call('create_transfer', $req);
  }

  /**
   * Creates a transfer from your account to a specified $PayByName tag.<br />
   * @param amount The amount of the transaction (floating point to 8 decimals).
   * @param currency The cryptocurrency to withdraw.
   * @param pbntag The $PayByName tag to send funds to.
   * @param auto_confirm If auto_confirm is TRUE, then the transfer will be performed without an email confirmation.
   */
  public static function SendToPayByName($amount, $currency, $pbntag, $auto_confirm = FALSE) {   
    $req = array(
      'amount' => $amount,
      'currency' => $currency,
      'pbntag' => $pbntag,
      'auto_confirm' => $auto_confirm ? 1:0,
    );
    return Helper::api_call('create_transfer', $req);
  }
  
  private static function is_setup() {
    return (!empty(static::$private_key) && !empty(static::$public_key));
  }
  
  private static function api_call($cmd, $req = array()) {
    if (!Helper::is_setup()) {
      return array('error' => 'You have not called the Setup function with your private and public keys!');
    }
    
    // Set the API command and required fields
    $req['version'] = 1;
    $req['cmd'] = $cmd;
    $req['key'] = static::$public_key;
    $req['format'] = 'json'; //supported values are json and xml
      
    // Generate the query string
    $post_data = http_build_query($req, '', '&');
      
    // Calculate the HMAC signature on the POST data
    $hmac = hash_hmac('sha512', $post_data, static::$private_key);
      
    // Create cURL handle and initialize (if needed)
    if (static::$ch === null) {
      static::$ch = curl_init('https://www.coinpayments.net/api.php');
      curl_setopt(static::$ch, CURLOPT_FAILONERROR, TRUE);
      curl_setopt(static::$ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt(static::$ch, CURLOPT_SSL_VERIFYPEER, 0);
    }
    curl_setopt(static::$ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac));
    curl_setopt(static::$ch, CURLOPT_POSTFIELDS, $post_data);
      
    $data = curl_exec(static::$ch);                
    if ($data !== FALSE) {
      if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
        // We are on 32-bit PHP, so use the bigint as string option. If you are using any API calls with Satoshis it is highly NOT recommended to use 32-bit PHP
        $dec = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
      } else {
        $dec = json_decode($data, TRUE);
      }
      if ($dec !== NULL && count($dec)) {
        return $dec;
      } else {
        // If you are using PHP 5.5.0 or higher you can use json_last_error_msg() for a better error message
        return array('error' => 'Unable to parse JSON result ('.json_last_error().')');
      }
    } else {
      return array('error' => 'cURL error: '.curl_error(static::$ch));
    }
  }



  // end coinpayment 
   
    // Total price with shipping and coupon
   
}

?>