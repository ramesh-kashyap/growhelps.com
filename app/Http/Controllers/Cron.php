<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\User;
use App\BuyFund;
use App\Investment;
use App\TaskUserUrl;
use App\Payout;
use App\AddTaskUrl;
use App\Withdraw;
use App\Club_a;
use Validator;
use Hash;
use Carbon\Carbon;
use Log;
use Redirect;
use DB;
use Auth;
use Helper;
class Cron extends Controller
{
   

  public function index()

    {  


//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->get();

    if ($allResult) 
    {
       $counter=1;
     foreach ($allResult as $key => $value) 
     {
      
     $userID=$value->id;
     $userName=$value->username;
     $totalclub_deduction=$value->club_deduction;
     $todays="2021-12-31";
     $colume_req=array('0','performance_bonus','level_bonus','cto_bonus','magic_bonus');
     $remarks_req=array('0','Performance Bonus','Level Bonus','C.T.O Bonus','Royal magic Bonus');
    
    $tran_check=Payout::where('user_id',$userID)->where('ttime', '>',Carbon::now()->subDays(10))->where('ttime', '<',Carbon::now())->count(); 

     if ($tran_check<=0) 
     {
              echo "count :".$counter."<br>";
          echo $userName."<br>";
                    // echo "level : ".$p."<br>";
               
                  
              
          $income_insert['user_id']=$userID;
          $income_insert['user_id_fk']=$userName;
       
          $income_insert['ttime']=$todays;
        
          $order_id=Payout::create($income_insert); 
         
         echo "<br>";    

         for ($p=1; $p < 5; $p++) 
         { 
           # code...
         $remarks=$remarks_req[$p];

         $last_ttime=Payout::where('user_id',$userID)->first(); 
        
         if (!empty($last_ttime) && @$last_ttime->ttime!=$todays) 
         {           
          $amount_to=Income::where('user_id',$userID)->where('remarks',$remarks)->where('ttime','>',$last_ttime->ttime)->where('ttime','<','2022-01-01')->sum('comm');
          $tds_charge=Income::where('user_id',$userID)->where('ttime','>',$last_ttime->ttime)->where('ttime','<','2022-01-01')->sum('tds');
          $admin_chrge=Income::where('user_id',$userID)->where('ttime','>',$last_ttime->ttime)->where('ttime','<','2022-01-01')->sum('admin_charge');
           $total_amount=Income::where('user_id',$userID)->where('ttime','>',$last_ttime->ttime)->where('ttime','<','2022-01-01')->sum('comm');
           $payable_amount=Income::where('user_id',$userID)->where('ttime','>',$last_ttime->ttime)->where('ttime','<','2022-01-01')->sum('comm');

         }
         else
         {

          $amount_to=Income::where('user_id',$userID)->where('remarks',$remarks)->where('ttime','<','2022-01-01')->sum('comm');
          $tds_charge=Income::where('user_id',$userID)->where('ttime','<','2022-01-01')->sum('tds');
          $admin_chrge=Income::where('user_id',$userID)->where('ttime','<','2022-01-01')->sum('admin_charge');
           $total_amount=Income::where('user_id',$userID)->where('ttime','<','2022-01-01')->sum('comm');
           $payable_amount=Income::where('user_id',$userID)->where('ttime','<','2022-01-01')->sum('comm');

         }
          $club_check = Club_a::where('user_id',$userID)->count('id');

         $amount=($amount_to)?$amount_to:0;
         $payable_amount=($payable_amount)?$payable_amount:0;
         $total_amount=($total_amount)?$total_amount:0;
         $tds_charge=($tds_charge)?$tds_charge:0;
         $admin_charge=($admin_chrge)?$admin_chrge:0;
         $deduction=$tds_charge+$admin_charge; 
          if (!empty($club_check)) 
          {
            $charge=5;
          }
          else
          {
            $charge=30;
          }
          $club_deduction=$payable_amount*$charge/100;
          $payable_amount=$payable_amount-$club_deduction;

           $colume=$colume_req[$p];

        $income_insert=array('user_id'=>$userID,$colume=>$amount,'deduction'=>$deduction,'withdraw_amt'=>$payable_amount,'payable_amt'=>$payable_amount,'total'=>$total_amount,'ttime'=>$todays,'club_deduction'=>$club_deduction);
                              
            Payout::where('user_id',$userID)->orderBy('id', 'DESC')->limit(1)->update($income_insert);

            if ($p=="1" && $payable_amount>0) 
            {
            $totalclub_deduction=$totalclub_deduction+$club_deduction;
            $upgrade=array('club_deduction'=>$totalclub_deduction);
            User::where('id',$userID)->update($upgrade);
            $income_with=array('user_id_fk'=>$userName,'user_id'=>$userID,'amount'=>$payable_amount,'status'=>'Pending','payment_mode'=>"INR",'wdate'=>$todays);

             Withdraw::create($income_with); 

            }
            

         }
     }

     $counter++;   
     }
    } 
    
 
    

}




 public function level_bonus()

    {  


//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->get();

    if ($allResult) 
    {
       $counter=1;
     foreach ($allResult as $key => $value) 
     {
      
     $userID=$value->id;
     $userName=$value->username;
     $totalclub_deduction=$value->club_deduction;
     $todays=date("Y-m-d");
    
     $bv_business=array('0','12','37','87','212','462','1062','2312','4812','9812','22312','52312','127312','327312','827312','1952312','4452312');

     $bonus_amr=array('0','0','1500','2500','5000','10000','21000','50000','125000','250000','600000','1500000','3500000','9000000','21500000','50000000','100000000');

      $rank_achive=array('0','SILVER','SILVER STAR','GOLD','GOLD STAR','PLATINUM','PLATINUM STAR','EMERALD',' ROYAL EMERALD','TOPAZ','RUBY','SAPPHIRE','DIAMOND','ROYAL DIAMOND','AMBASSDOR','CROWN AMBASSDOR','BRAND AMBASSDOR');

            $rightTeam_arr=$this->team_by_position($userID,'Right');
            $leftTeam_arr=$this->team_by_position($userID,'Left');



      if(!empty($rightTeam_arr) && !empty($leftTeam_arr))
      {
           
         
        $leftTeam=User::select('id')->whereIn('id',$leftTeam_arr)->where('active_status','Active')->count();
        $rightTeam=User::select('id')->whereIn('id',$rightTeam_arr)->where('active_status','Active')->count();


           $tleftpackage=($leftTeam)? $leftTeam:0;
           $trightpackage=($rightTeam)? $rightTeam:0;
          // $amount = $tleftpackage+$trightpackage; 
          if($tleftpackage<$trightpackage)
           {
           $amount = $tleftpackage;   
         
           }
          if($tleftpackage>$trightpackage)
          {
           $amount = $trightpackage;   
          
          }
          if($tleftpackage==$trightpackage)
          {
            $amount = $trightpackage;
        

          }
          
       
          
         for ($p=1; $p < 17; $p++) 
         { 
           # code...
           
           
      $mtching=Income::where('user_id',$userID)->where('remarks','Level Bonus')->orderBy('id', 'DESC')->limit(1)->sum('tleft');
         
         $matching_pv=$amount-$mtching;
         
         
        //  print_r($matching_pv);
         
         
          $bv_req=$bv_business[$p];
       

      
      $goalstatus=($matching_pv>=$bv_req? 'Achieved':'Pending');
      
       if($goalstatus=="Achieved")
         {
        
         $credit_amt=$bonus_amr[$p];  
         
            echo "count :".$counter."<br>";
          echo $userName."<br>";
        echo "level : ".$p."<br>";
     
       echo "amount : ".$credit_amt."<br>";
    
       echo "<br>";
                   
             $admin_charge=$credit_amt*5/100;
             $tds=$credit_amt*5/100;
            $net_amount=$credit_amt-$credit_amt*10/100;      
    
            $income_insert['user_id']=$userID;
            $income_insert['user_id_fk']=$userName;
            $income_insert['comm']=$net_amount;
            $income_insert['amount']=$credit_amt;
            $income_insert['admin_charge']=$admin_charge;
            $income_insert['tds']=$tds;
            $income_insert['amt']=$credit_amt;
            $income_insert['level']=$p;
            $income_insert['remarks']='Level Bonus';
            $income_insert['tleft']=$bv_business[$p];
            $income_insert['rank']=$rank_achive[$p];
            $income_insert['ttime']=$todays;
                   
            $income = Income::firstOrCreate(['remarks' => 'Level Bonus','level'=>$p,'user_id'=>$userID],$income_insert);        
             
             
         }

      
            

         }
         
      }
     

     $counter++;   
     }
    } 
    
 
    

}

 public function Set_user_club_a()

    {  


//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->get();

    if ($allResult) 
    {
       $counter=1;
     foreach ($allResult as $key => $value) 
     {
      
     $userID=$value->id;
     $userName=$value->username;
     $Name=$value->name;
     $totalclub_deduction=$value->club_deduction;
     $totalupgrade_deduction=$value->upgrade_walet;
     $todays=date("Y-m-d");
    
  $bonus_amr=array('0','2500','5000','10000','20000','40000','80000','160000');
  $upgrade_amout=array('0','5000','10000','20000','40000','80000','160000','5000');
  $club_deduction=array('0','1250','2500','5000','10000','20000','40000','80000');
  $club_net_amt=array('0','5000','10000','20000','40000','80000','160000','635000');

       $check_club_=Club_a::where('user_id',$userID)->count();


      if($check_club_>0)
      {
          
         for ($p=1; $p < 8; $p++) 
         { 
    
      $check_tableuser=$this->my_level_team_count($userID,$p,'club_as');  
//   $check_tableuser=12;
      
      $goalstatus=($check_tableuser>=12 ? 'Achieved':'Pending');
      
       if($goalstatus=="Achieved")
         {
        
          $totalclub_deduction=$totalclub_deduction+$club_deduction[$p];
          $upgrade=array('club_deduction'=>$totalclub_deduction);
          User::where('id',$userID)->update($upgrade);
        
         $credit_amt=$bonus_amr[$p];  
         $new_round=$p+1;
         
            $wordlist = \DB::table('club_as')->where('round',$new_round)->orderBy('id','asc')->limit(1)->first();
                  $first_id=(!empty($wordlist)?$wordlist->user_id:0);
                  $Report=$this->getNodeInsertPostionByParentId_bronze(array($first_id),'club_as',$new_round);
                $pos =$Report['node'];
                if($pos=="1")
                {
                    $pos = "Left";
                }
               elseif($pos=="2")
                {
                    $pos = "Middle";
                }
                else{
                    $pos = "Right";
                }
                $sponsor = $Report['parentId'];
               $userLevel = \DB::table('club_as')->where('round',$new_round)->where('user_id',$sponsor)->first();               
                $mxLevel= (!empty($userLevel)?$userLevel->level+1:0);
                
          $check_user=\DB::table('club_as')->where('round',$new_round)->where('user_id',$userID)->count();
                
                if($check_user<=0)
                {
                  $data = [
                        'ParentId' =>$sponsor,
                        'level' => $mxLevel,
                        'user_id' => $userID,
                        'username' => $userName,
                        'name' => $Name,
                        'position' => $pos,
                        'added_by' => 'User',
                        'round' => $new_round,
                        
                    ];
                    if($new_round<8)
                    {
                   DB::table('club_as')->insert($data);
                    }
         
         $credit_amt=$club_net_amt[$p];
            echo "count :".$counter."<br>";
          echo $userName."<br>";
        echo "level : ".$p."<br>";
     
       echo "amount : ".$credit_amt."<br>";
    
       echo "<br>";
                   
             $admin_charge=$credit_amt*5/100;
             $tds=$credit_amt*5/100;
            $net_amount=$credit_amt-$credit_amt*10/100;      
            $income_insert['user_id']=$userID;
            $income_insert['user_id_fk']=$userName;
            $income_insert['comm']=$net_amount;
            $income_insert['amount']=$credit_amt;
            $income_insert['admin_charge']=$admin_charge;
            $income_insert['tds']=$tds;
            $income_insert['amt']=$credit_amt;
            $income_insert['level']=$p;
            $income_insert['rank']='Club 1st';
            $income_insert['remarks']='Royal Magic Bonus';
            $income_insert['ttime']=$todays;
                   
            $income = Income::firstOrCreate(['remarks' => 'Royal Magic Bonus','level'=>$p,'rank'=>'Club 1st','user_id'=>$userID],$income_insert);    
            
                }
             
             
         }

      
            

         }
         
      }
     

     $counter++;   
     }
    } 
    
 
    

}



   function getNodeInsertPostionByParentId_bronze($parentId,$table,$round){
    

          if ($parentId!=0)
           {
            # code...
        
        $position = array('status'=>false);
        $parents = array();
         // print_r($parentId);die()
        foreach($parentId as $parent){  

                $q2= DB::table($table)->select("*")->where('ParentId',$parent)->where('round',$round)->orderBy('position');
                $count = $q2->count();
                  
            //echo $count."<br>";
             $myinfo = $q2->get();
           //echo '<pre>'; print_r($myinfo); die('down user list');
                 if($count >= 3){
                    foreach($myinfo as $row) {

                       $query= DB::table($table)->select("".$table.".user_id",
                    DB::raw("(SELECT COUNT(".$table.".id) FROM ".$table."
                                WHERE ".$table.".ParentId = ".$table.".user_id AND ".$table.".round= ".$round.") as cnt"))->where('round',$round)->orderBy('id','asc');
                    //   print_r($query->result_array())."<pre>";die;
                        foreach ($query->get() as $key => $value)
                         {
                          $user_id=$value->user_id;
                          $count=$value->cnt;
                          if ($count<3) {
                              
                        @$parents[@$parent][] = $user_id;
                       
                          }
                        }
                       
                      
                    //   print_r($parents);die();

                    }
                }
                elseif($count==1){
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '2';
                    //echo '<pre>1';print_r($position);echo '</pre>';
                    return $position;
                }
                elseif($count==2){
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '3';
                    //echo '<pre>1';print_r($position);echo '</pre>';
                    return $position;
                }
                else{
                    $position['status'] = true;
                    $position['parentId'] = $parent;
                    $position['node'] = '1';
                    //echo '<pre>2';print_r($position);echo '</pre>';
                   return $position;
                }
            }

        return $this->searchByParentsbronze($parents,$table);
      }
      else
      {
        $position['parentId'] =0;
        $position['node'] = '1';
        return $position;
      }
      
    }

    function searchByParentsbronze($parents,$table){
        //   echo '<pre>'; print_r($parents); die('down user list');

            foreach($parents as $parent){
                return $this->getNodeInsertPostionByParentId_bronze($parent,$table);  
            }
        }




    public function my_level_team_count($userid,$round,$table,$level=2){
        $arrin=array($userid);
        $ret=array();

        $i=1;
        while(!empty($arrin)){
            $alldown=DB::table($table)->select('user_id')->whereIn('ParentId',$arrin)->where('round',$round)->get()->toArray();     
            if(!empty($alldown)){
                $arrin = array_column($alldown,'user_id');
                $ret[$i]=$arrin;
                $i++;
                if($i>$level){
                    break;
                }
              
            }else{
                $arrin = array();
            } 
        }   
       
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }
        
        
        return count($final);
        
    }


  public function leadership_bonus()

    {  


//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->get();

    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
       $userID=$value->id;
        $userName=$value->username;
        $Package=$value->package;
       
       $rightTeam=$this->team_by_position($userID,'Right');
       $leftTeam=$this->team_by_position($userID,'Left');

       if (!empty($rightTeam) && !empty($leftTeam) && $Package>=100)
        {
        
         $leftCappingUsr=User::whereIn('id',$leftTeam)->where('capping',1)->count('id'); 
         $rightCappingUsr=User::whereIn('id',$rightTeam)->where('capping',1)->count('id'); 

          if($leftCappingUsr<$rightCappingUsr)
           {
           $amount = $leftCappingUsr;        
           }
          if($leftCappingUsr>$rightCappingUsr)
          {
           $amount = $rightCappingUsr;         
          }
          if($leftCappingUsr==$rightCappingUsr)
          {
            $amount = $rightCappingUsr;

          }
         
         $bonus=$amount/2;
          if ($bonus>0)
           {
            echo "ID:".$userName." amounts:".$bonus."<br>";
             $data['remarks'] = 'Leadership Bonus';
            $data['comm'] = $bonus;
            $data['amt'] = $bonus;
            $data['ttime'] = date("Y-m-d");
            $data['user_id_fk'] = $userName;
            $data['user_id']=$userID; 

     $income = Income::firstOrCreate(['remarks' => 'Leadership Bonus','ttime'=>date("Y-m-d"),'user_id'=>$userID],$data);


          }
       

     }

      }
   }
}


 public function matching_bonus()

    {  


//   User::where('id',20)->update(['name' =>'Rameshk']);
    $allResult=User::where('active_status','Active')->get();
date_default_timezone_set("Asia/Kolkata");
    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
       $userID=$value->id;
        $userName=$value->username;
        $Package=$value->package;
        $pairAmount=$value->capping;
        $todays=date("Y-m-d");
        if ($Package==10)
         {
         $capping=20;
         }
         else
         {
          $capping=250;
         }
       
       $rightTeam_arr=$this->team_by_position($userID,'Right');
       $leftTeam_arr=$this->team_by_position($userID,'Left');
        $Preview_date=date('Y-m-d', strtotime('-1 day', strtotime($todays)));
    //   $Preview_date=$todays;
      
          $left_direct=User::where('sponsor',$userID)->where('active_status','Active')->where('position','Left')->count('id'); 
         $right_direct=User::where('sponsor',$userID)->where('position','Right')->where('active_status','Active')->count('id');

       if (!empty($left_direct) && !empty($right_direct))
        {
         $leftTeam=User::select('id')->whereIn('id',$leftTeam_arr)->where('active_status','Active')->count();
         $rightTeam=User::select('id')->whereIn('id',$rightTeam_arr)->where('active_status','Active')->count();

         $TodayrightTeam=User::select('id')->whereIn('id',$rightTeam_arr)->where('active_status','Active')->where('adate','like',"%".$Preview_date. "%")->count('id');

         $TodayleftTeam=User::select('id')->whereIn('id',$leftTeam_arr)->where('active_status','Active')->where('adate','like',"%".$Preview_date. "%")->count('id');
           $TodaysPair= $TodayrightTeam+$TodayleftTeam;

         if($TodayleftTeam<$TodayrightTeam)
           {
           $TodaysPair = $TodayleftTeam;   
         
           }
          if($TodayleftTeam>$TodayrightTeam)
          {
           $TodaysPair = $TodayrightTeam;   
           
          }
          if($TodayleftTeam==$TodayrightTeam)
          {
            $TodaysPair = $TodayrightTeam;

          }

          // print_r($TodaysPair);die();

         if ($TodaysPair%2==0)
            {
             $TodaysPair=$TodaysPair;
            }
            else
            {
              $TodaysPair=$TodaysPair-1;
            }
            
            // $TodaysPair= $TodaysPair/2;
         
        
         $total_right=($rightTeam)?$rightTeam:0;
         $total_left=($leftTeam)?$leftTeam:0;
        
         if(($total_right>1) && ($total_left>0) || ($total_left>1) && ($total_right>0))
       {
    
         
      
           $tleftpackage=($total_left)? $total_left:0;
           $trightpackage=($total_right)? $total_right:0;
          // $amount = $tleftpackage+$trightpackage; 
          if($tleftpackage<$trightpackage)
           {
           $amount = $tleftpackage;   
           $curry = $trightpackage-$tleftpackage;  
           $cutPairSide= 1;  
           }
          if($tleftpackage>$trightpackage)
          {
           $amount = $trightpackage;   
           $curry = $tleftpackage-$trightpackage;  
            $cutPairSide= 2;    
          }
          if($tleftpackage==$trightpackage)
          {
            $amount = $trightpackage;
            $curry = $tleftpackage-$trightpackage;
            $cutPairSide= 1;

          }
          $curry = 0;
          
          if ($amount%2==0)
            {

             $amount=$amount;
            }
            else
            {
              $amount=$amount-1;
            }

            // $amount= $amount/2;
            
            
         
 
          $mtching=Income::where('user_id',$userID)->where('remarks','Performance Bonus')->orderBy('id', 'DESC')->limit(1)->sum('amt');
           $amount=$amount;
           $tamount = $amount;
          $amount_total = $amount - $mtching;
          $amount = $amount - $mtching;
           // print_r($amount);
           $pair200=Income::where('user_id',$userID)->where('remarks','Performance Bonus')->sum('pair200');
           if ($pair200<=0)
            {
              // die("hii");
             $pair200amt=200;
             $amount=$amount-1;
            }
            else
            {
              $pair200amt=0;
            }
            $pair1000=Income::where('user_id',$userID)->where('remarks','Performance Bonus')->sum('pair1000');
            $pair400=Income::where('user_id',$userID)->where('remarks','Performance Bonus')->sum('pair400');
               
         
              $n_m_t_1000 = 2000 - $pair1000;
              
            if ($amount>0 && $pair1000<2000 && $TodaysPair>0) 
            {

              if ($amount>1 && $TodaysPair>1)
               {
                $pair1000amt=2000; 
               }
               else
               {
                 $pair1000amt=1000;
                
               }
               
               if($pair1000amt >= $n_m_t_1000)
                {
                  $pair1000amt = $n_m_t_1000;

                }
            $amount=($amount)-$pair1000amt/1000;
            $TodaysPair=($TodaysPair)-$pair1000amt/1000;
             
            }
            else
            {
             $pair1000amt=0; 
            }
         
         
             $n_m_t_400 = 4000 - $pair400;
           if ($amount>0 && $pair400<4000 && $TodaysPair>0) 
            {
              if ($amount>9 && $TodaysPair>9)
               {
                 $pair400amt=4000;
                 
               }
               else
               {            

                  if($TodaysPair>=$amount) 
                  {
                  $pair400amt=$amount*400;
                  }
                  else
                  {
                    $pair400amt=0;

                  }

               }

               if($pair400amt >= $n_m_t_400)
                {
                  $pair400amt = $n_m_t_400;
                }

                $amount=($amount)-$pair400amt/400;
                $TodaysPair=($TodaysPair)-$pair400amt/400;
             
            }
            else
            {
             $pair400amt=0; 
            }
              
              
              
             $n_m_t_200 = 30000;
             if ($amount>0 && $pair400>=4000 && $pair1000>=2000 || $amount>0 && $pair400amt>=4000 && $pair1000amt>=2000)
              {
                  $pair200amt11=$pair200amt;
                  
                 $pair200amt=($amount*200);
                $amount=($amount)-$pair200amt/200;  
                $pair200amt=$pair200amt +$pair200amt11; 
                 if($pair200amt >= $n_m_t_200)
                {
                  $pair200amt = $n_m_t_200;
                }
              }
          
          $amount_total=$amount_total-$amount;
          $tamount=$mtching+$amount_total;
          $now_matching=$tamount-$mtching;
           
        //   echo $TodaysPair."<br>";
        //   print_r($amount);die;

        //   print_r($amount);die;       
          // $amount = ($amount/100)*10; 
          $NetAmt= $pair200amt+$pair400amt+$pair1000amt;
          
        
           // if ($mtching<=0) 
           // {
           // User::where('id',$userID)->update(array('capping'=>$cutPairSide));
           // }

              $admin_charge=$NetAmt*5/100;
              $tds=$NetAmt*5/100;
              $net_amt=$NetAmt-$NetAmt*10/100;
                

          if ($NetAmt>0)
           {
            echo "ID:".$userName." amounts:".$NetAmt."<br>";
            $data['remarks'] = 'Performance Bonus';
            $data['comm'] = $net_amt;
            $data['admin_charge'] = $admin_charge;
            $data['amount'] = $NetAmt;
            $data['tds'] = $tds;
            $data['amt'] = $tamount;
            $data['ttime'] = date("Y-m-d");
            $data['user_id_fk'] = $userName;
            $data['tleft']=$tleftpackage;
            $data['tright']=$trightpackage;
            $data['pair200']=$pair200amt;
            $data['pair400']=$pair400amt;
            $data['pair1000']=$pair1000amt;
            $data['user_id']=$userID; 
            $data['invest_id']=$now_matching; 
            $data['curry']=$curry;



    //  $income = Income::create($data);
      $income = Income::firstOrCreate(['remarks' => 'Performance Bonus','ttime'=>date("Y-m-d"),'user_id'=>$userID],$data);


          }


      }
       

     }

      }
   }
}



  public function get_total_invest_by_team($user_ids)
    {
      
     $business= Investment::whereIn('user_id',$user_ids)->where('status','Active')->sum('amount');
     return $business;
        
    }
    
      public  function my_binary($userid){
        $arrin=array($userid);
        $ret=array();
        // print_r($arrin);die();
        while(!empty($arrin)){
         $alldown= User::select('id')->whereIn('Parentid',$arrin)->get()->toArray();
         if(!empty($alldown)){
                $arrin = array_column($alldown,'id');
                $ret[]=$arrin;
              
              
            }else{
                $arrin = array();
            } 
        }
        // continue;    
        $final = array();         
        if(!empty($ret)){
            array_walk_recursive($ret, function($item, $key) use (&$final){
                $final[] = $item;
            });
        }

        return $final;
        
    }  


     public  function team_by_position($userid,$position){
        $ret=array();
        $get_position_user=User::where('Parentid',$userid)->where('position',$position)->first();
        if($get_position_user){
        
            $ret=$this->my_binary($get_position_user->id);
            $ret[]=$get_position_user->id;
        }
       
        return $ret;
    }



  public function Generate_roi()

    {  

    $allResult=Investment::where('status','Active')->where('roiCandition',0)->get();
    $todays=Date("Y-m-d");
    $last_date=  date('Y-m-d', strtotime("- 1 day", strtotime($todays)));
    if ($allResult) 
    {
     foreach ($allResult as $key => $value) 
     {
      
      $userID=$value->user_id;
       $joining_amt = $value->amount;
       $percent=0.75;
      $userDetails=User::where('id',$userID)->where('active_status','Active')->first();
    $userTaskApproved=TaskUserUrl::where('user_id',$userID)->where('status','Approved')->where('tdate',$last_date)->count();
    $userTaskPending=TaskUserUrl::where('user_id',$userID)->where('status','Pending')->where('tdate',$last_date)->count();

       $taskStatus=($userTaskApproved>0 && $userTaskPending<=0  ? 'Achieved':'Pending');
       // print_r($userTaskPending)."<br>";
       // print_r($taskStatus);die();
      if ($userDetails) 
      {
        $activation_date=$userDetails->adate;
       if ($joining_amt=="100")
       {
       $start_date=$activation_date;
       $end_date=  date('Y-m-d', strtotime("+ 3 day", strtotime($start_date)));
       $endSevendate=  date('Y-m-d', strtotime("+ 7 day", strtotime($start_date)));
       $count3daysUser=User::where('sponsor',$userID)->where('active_status','Active')->where('package',100)->whereBetween('adate',[$start_date, $end_date])->get();
       $directCount = $count3daysUser->count();
        if ($directCount>=2) 
        {

          $percent=1; 
         if ($taskStatus=='Achieved' && $directCount>=2) 
         {
           $percent=1.5;   
         }
         
        $countLeftDIrect=User::where('sponsor',(!empty($count3daysUser[0]))?$count3daysUser[0]->id:0)->where('active_status','Active')->where('package',100)->whereBetween('adate',[$start_date, $endSevendate])->count();
        $countRightDIrect=User::where('sponsor',(!empty($count3daysUser[1]))?$count3daysUser[1]->id:0)->where('active_status','Active')->where('package',100)->whereBetween('adate',[$start_date, $endSevendate])->count();

        $booterThird=($countLeftDIrect>=2 && $countRightDIrect>=2  ? 'Achieved':'Pending');
        if ($booterThird=="Achieved") 
        {
          $percent=1.5;  
        }
         if ($taskStatus=='Achieved' && $booterThird=="Achieved") 
         {
           $percent=2;   
         }
 
        }
        else
        {

         if ($taskStatus=='Achieved') 
         {
           $percent=1;   
         } 
        }

        }
        else
        {
         if ($taskStatus=='Achieved') 
         {
           $percent=1;   
         } 
        }

         $total_profit_b = Income::where('user_id', $userID)->where('invest_id', $value->id)->where('remarks','Roi Bonus')->sum("comm");
          $total_profit=($total_profit_b)?$total_profit_b:0;
          $totalYouGet=$joining_amt*250/100;
           $roi = $joining_amt*$percent/100; 
          if ($total_profit_b<$totalYouGet) 
          {

            echo "ID:".$userDetails->username." Package:".$joining_amt." Roi:".$roi." % ".$percent." Task Status: ".$taskStatus."<br>";
             $data['remarks'] = 'Roi Bonus';
            $data['comm'] = $roi;
            $data['amt'] = $joining_amt;
            $data['invest_id']=$value->id;
            $data['ttime'] = date("Y-m-d");
            $data['user_id_fk'] = $userDetails->username;
            $data['user_id']=$userDetails->id; 

   $income = Income::firstOrCreate(['remarks' => 'Roi Bonus','ttime'=>date("Y-m-d"),'user_id'=>$userID,'invest_id'=>$value->id],$data);
           
          }
          else
          {
           Investment::where('id',$value->id)->update(['roiCandition' => 1]);   
          }



      }
      




     }
    } 
    
 
    

}


}
