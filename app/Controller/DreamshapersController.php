<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
date_default_timezone_set('Asia/Calcutta');
//ini_set('memory_limit', '256M');
//set_time_limit(0);
class DreamshapersController extends AppController
{
	public $helper=array('html', 'form', 'Js');
	public $components = array(
    'Paginator',
    'Session','Cookie','RequestHandler'
 	);
	public function functionreport_edit()
	{
		$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
		$function_book_id=$this->request->query["id"];
        $this->loadmodel('function_booking');
        $this->loadmodel('room_reservation');
        $this->loadmodel('master_outlet');
        $this->loadmodel('master_tax');
        $this->loadmodel('master_item');
        $this->loadmodel('master_item_type');
		$this->loadmodel('master_other_service');
		if($this->request->is('post'))
			{
				if(isset($this->request->data["edit_function_booking"]))
				{
                @$type_id=$this->request->data["itemtype_id"];
                @$multiple_type_id= implode(",",$type_id);
				
				
				@$item_n_id=$this->request->data["item_name_id"];
                @$multiple_item_id= implode(",",$item_n_id);
               
                if(sizeof($this->request->data['other_service'])>0)
                {
                    $all_service_value = implode(",",$this->request->data['other_service']);
                }
                else
                {
                    $all_service_value ='';
                }
				//pr($all_service_value);
				
				 @$tax_id=$this->request->data["tax_id"];
                @$multiple_tax_id= implode(",",$tax_id);
				$b_date=date('Y-m-d', strtotime($this->request->data['b_date']));
				$b_time=$this->request->data['b_time'];
				$pax_amt=$this->request->data['pax_amt'];
				$res_no_id=$this->request->data['res_no_id'];
				$ftp_no=$this->request->data['ftp_no'];
				$name=$this->request->data['name'];
				$outlet_venue_id=$this->request->data['outlet_venue_id'];
				$address=$this->request->data['address'];
				$t_number=$this->request->data['t_number'];
				$email=$this->request->data['email'];
				$rate=$this->request->data['rate'];
				$gross=$this->request->data['gross'];
				$totaltax=$this->request->data['totaltax'];
				$rate_type=@$this->request->data['rate_type'];
				//$choice_menu=@$this->request->data['choice_menu'];
				$tot_amt=@$this->request->data['tot_amt'];
				$per_expected=$this->request->data['per_expected'];
				$pax=$this->request->data['pax'];
				$no_of_person=$this->request->data['no_of_person'];
				$shape=@$this->request->data['shape'];
				$instruction=$this->request->data['instruction'];
				$advance= @$this->request->data['advance'];
				$function_no= @$this->request->data['function_no'];
				$pax_r= @$this->request->data['pax_r'];
				$pax_o= @$this->request->data['pax_o'];
				
				//$aa=array('b_date' => "'$b_date'",'b_time' => "'$b_time'",'pax_amount' =>"'$pax_amt'",'res_no_id' => "'$res_no_id'",'ftp_no' => "'$ftp_no'",'name' => "'$ftp_no'",'outlet_venue_id' => "'$outlet_venue_id'", 'address' => "'$address'",'t_number' => "'$t_number'", 'email' => "'$email'", 'rate' => "'$rate'",'tax_id' => "'$multiple_tax_id'", 'per_expected' => "'$per_expected'",'pax' => "'$pax'", 'no_of_person' => "'$no_of_person'",'shape' => "'$shape'", 'other_service' => "'$all_service_value'", 'instruction' => "'$instruction'", 'itemtype_id' => "'$multiple_type_id'");
             
		$this->function_booking->updateAll(array('b_date' => "'$b_date'",'b_time' => "'$b_time'",'pax_amt' =>"'$pax_amt'",'res_no_id' => "'$res_no_id'",'ftp_no' => "'$ftp_no'",'name' => "'$name'",'outlet_venue_id' => "'$outlet_venue_id'", 'address' => "'$address'", 'advance' => "'$advance'",'t_number' => "'$t_number'", 'email' => "'$email'", 'rate' => "'$rate'",'tax_id' => "'$tax_id'", 'per_expected' => "'$per_expected'",'pax' => "'$pax'", 'rate_type' => "'$rate_type'", 'totaltax' => "'$totaltax'", 'tot_amt' => "'$tot_amt'", 'gross' => "'$gross'", 'no_of_person' => "'$no_of_person'",'shape' => "'$shape'", 'other_service' => "'$all_service_value'", 'instruction' => "'$instruction'", 'itemtype_id' => "'$multiple_type_id'",'item_name_id' => "'$multiple_item_id'", 'pax_r' => "'$pax_r'", 'pax_o' => "'$pax_o'", 'function_no' => "'$function_no'"), array('id' => $function_book_id));
		//$this->set('active',2);
		$this->redirect(array('action' => 'functionbooking'));
		

		
				}
			}
		
		
		$this->loadmodel('master_item_categorie');
		$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
           
        $this->set('fetch_function_booking', $this->function_booking->find('all', array('conditions' => array('flag' => "0", 'id' => $function_book_id))) );
        $this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions' => array('flag' => "0",'booking_type' => 1))));
        $this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions' => array('flag' => "0"))) );
        $this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions' => array('flag' => "0"))) );
        $this->set('fetch_master_item', $this->master_item->find('all', array('conditions' => array('flag' => "0"))) );
        $this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_master_other_service', $this->master_other_service->find('all', array('conditions' => array('flag' => "0"))) );
		$this->loadmodel('menu_category');
		$this->set('fetch_menu_category', $this->menu_category->find('all',array('conditions' => array('flag' => "0"))));
		$this->loadmodel('menu_category_item');
		$this->set('fetch_menu_category_item', $this->menu_category_item->find('all',array('conditions' => array('flag' => "0"))));
		$this->loadmodel('gr_no');
		$this->set('fetch_gr_no', $this->gr_no->find('all'));
	}
	////////////////////////////////// 	/////////////Company Report///////////////
	function master_function_tax()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
			
		}
		else
		{
			$this->layout='index_layout';
		}
		 $this->loadmodel('master_function_tax');
		 if($this->request->is('post'))
			{
				if(isset($this->request->data["add_tax"]))
				{
					$master_tax=$this->request->data["master_tax_id"];
					$master_tax_id=implode(',',$master_tax);
					/*$conditions=array('master_tax_id' => $master_tax_id);
					$count=$this->master_function_tax->find('count', array('conditions' => $conditions));
					if($count==0){
						$fetch_id=$this->master_function_tax->find('all', array('conditions' => $conditions));
						$update_id=$fetch_id[0]['master_function_tax']['id'];
						
					$this->master_function_tax->updateAll(array('master_tax_id' => "'$master_tax_id'"), array('id' => $update_id));
					}
					else
					{*/
						$this->master_function_tax->saveAll(array('master_tax_id' => $master_tax_id));
					//}
					 $this->set('active',1);
				}
			}
		
			
		$this->set('fetch_function_master_tax', $this->master_function_tax->find('all',array('order'=>'id DESC','limit'=>1 )));
		
		$this->loadmodel('master_tax');
		$this->set('fetch_master_tax', $this->master_tax->find('all',array('conditions'=>array('flag' => 0 ))));
	}
	function master_otherservice()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
			
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		 $this->loadmodel('master_other_service');
		 if($this->request->is('post'))
			{
			if(isset($this->request->data["add_category_name"]))
			{
				
				$service=$this->request->data["service"];
				$this->loadmodel('master_other_service');
				@$os=$this->master_other_service->find('all', array('fields' => array('service'),'conditions'=>array('flag' => 0, 'service' =>$service)));
				$os1=$os[0]['master_other_service']['service'];
				
				 if($service==$os1)
				 {
					 $this->set('error','Data Already Exist');				
				 }
				else
				{
				$this->master_other_service->saveAll(array('service' => $service));
				$this->redirect(array('action' => 'master_otherservice'));
				}
}
			else if(isset($this->request->data["edit_category_name"]))
			{
				$edit_service=$this->request->data["edit_service"];
				$this->master_other_service->updateAll(array('service' => "'$edit_service'"), array('id' => $this->request->data["id"]));
				$active='2';
                $this->set('active',$active);
			}
			else if(isset($this->request->data["delete_category_name"]))
			{
				$this->master_other_service->updateAll(array('flag' => 1), array('id' => $this->request->data["delete_id"]));
				$active='2';
                $this->set('active',$active);
			}
			
			
		}
			$this->set('fetch_company_category', $this->master_other_service->find('all', array('conditions' => array('flag' => "0"))) );
	}
	
/////////////////////////////////////////////////////////////	
function function_invoice()
{
$id=$this->request->query("id");
if($this->RequestHandler->isAjax())
{
$this->layout='ajax_layout';
}
else
{
$this->layout='index_layout';
}
$this->loadmodel('function_booking');
$this->loadmodel('pos_kot');
$this->loadmodel('master_item');
$this->loadmodel('receipt_checkout');
$this->loadmodel('address');
$this->loadmodel('master_outlet');

$conditions =array ('id'=> array($id));
$this->set('fetch_function_booking', $this->function_booking->find('all', array('conditions' => $conditions)));
$this->set('fatch_plan_kot_data', $this->pos_kot->find('all'));
$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions' => $conditions)));
$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
$this->set('fatch_master_items', $this->master_item->find('all'));
$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
}
//////////////////////

////////////////////////////////////////////////////////////	
function fun_report()
{
$id=$this->request->query("id");
if($this->RequestHandler->isAjax())
{
$this->layout='ajax_layout';
}
else
{
$this->layout='index_layout';
}
$this->loadmodel('function_booking');
$this->loadmodel('pos_kot');
$this->loadmodel('master_item');
$this->loadmodel('receipt_checkout');
$this->loadmodel('invoiceadd');
$this->loadmodel('master_outlet');

$conditions =array ('id'=> array($id));
$this->set('fetch_function_booking', $this->function_booking->find('all', array('conditions' => $conditions)));
$this->set('fatch_plan_kot_data', $this->pos_kot->find('all'));
$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions' => $conditions)));
$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
$this->set('fatch_master_items', $this->master_item->find('all'));
$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));

}
/////////////////////
function informationbill()
{
$id=$this->request->query("id");
if($this->RequestHandler->isAjax())
{
$this->layout='ajax_layout';
}
else
{
$this->layout='index_layout';
}
$this->loadmodel('room_checkin_checkout');
$this->loadmodel('pos_kot');
$this->loadmodel('master_item');
$this->loadmodel('checkout');
$this->loadmodel('address');
$this->loadmodel('master_tax');

$conditions =array ('id'=> array($id));
$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => $conditions)));
$this->set('fatch_plan_kot_data', $this->pos_kot->find('all'));
$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
$this->set('fetch_checkout', $this->checkout->find('all', array('conditions' => $conditions)));
$this->set('fatch_master_items', $this->master_item->find('all'));
$this->set('fetch_master_tax', $this->master_tax->find('all'));
$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
}
//////////////////////
function informationbill_multi()
{
$id=$this->request->query("id");
if($this->RequestHandler->isAjax())
{
$this->layout='ajax_layout';
}
else
{
$this->layout='index_layout';
}
$this->loadmodel('room_checkin_checkout');
$this->loadmodel('pos_kot');
$this->loadmodel('master_item');
$this->loadmodel('master_tax');
$this->loadmodel('checkout');
$this->loadmodel('address');

$this->loadmodel('room_checkin_checkout');
$mflag=$this->room_checkin_checkout->find('all', array('fields' => array('multi_flag'),'conditions'=>array('id' =>$id)));
$mmff=$mflag[0]['room_checkin_checkout']['multi_flag'];

//pr($mmff);
$conditionss =array ('multi_flag'=> $mmff);
$conditions =array ('id'=> array($id));

//$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all', array('conditions' => $conditions));
//pr($fetch_room_checkin_checkout);
//exit;

$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => $conditionss)));
$this->set('fetch_room_checkin_checkoutt', $this->room_checkin_checkout->find('all', array('conditions' => $conditions)));
$this->set('fatch_plan_kot_data', $this->pos_kot->find('all'));
$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
$this->set('fetch_checkout', $this->checkout->find('all', array('conditions' => $conditions)));
$this->set('fatch_master_items', $this->master_item->find('all'));
$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
$this->set('fetch_master_tax', $this->master_tax->find('all'));

}
//////////////////////////

function house_keeping_bill()
	{
		$last_record_id=$this->request->query("id");
		
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		 $this->loadmodel('house_keeping');
		  $this->loadmodel('address');
		 $this->loadmodel('receipt_checkout');
		 $conditions =array ('id'=> $last_record_id);
		 
		 $this->set('fetch_house_keeping', $this->house_keeping->find('all', array('conditions' => $conditions)));
		 $this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );

		//$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
		}
	//////////////////////
	function user_infobill()
	{
		$id=$this->request->query("id");	
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}	
			else
		{
			$this->layout='index_layout';
		}
		 $this->loadmodel('room_checkin_checkout');
		 $this->loadmodel('master_roomno');
		 $this->loadmodel('master_tax');
		 $this->loadmodel('address');
		 
		 	$this->loadmodel('room_checkin_checkout');
			$conditions=array('id' => $id, 'flag' => "0", 'status'=>0);
			$fetch_pos_check=$this->room_checkin_checkout->find('all',array('fields' => array('master_roomno_id', 'card_no'),'conditions'=>$conditions));
				@$rnno=$fetch_pos_check[0]['room_checkin_checkout']['master_roomno_id'];
				@$card_no=$fetch_pos_check[0]['room_checkin_checkout']['card_no'];
			    $this->loadmodel('pos_kot');
			    $conditions=array('master_roomnos_id' => $rnno,'card_no' => $card_no, 'flag' => "0", 'flag1'=>0);
				 $this->set('fetch_pos_nooo',$this->pos_kot->find('all',array('fields' => array('due_amount'),'conditions'=>$conditions)));
				 $this->loadmodel('house_keeping');
			    $conditions=array('master_roomno_id' => $rnno,'card_no' => $card_no, 'flag' => "0",'status'=>0);
				$this->set('fetch_pos_noooo',$this->house_keeping->find('all',array('fields' => array('due_amount'),'conditions'=>$conditions)));
					$this->loadmodel('other_service');
			    $conditions=array('master_roomno_id' => $rnno,'card_no' => $card_no, 'flag' => "0", 'status'=>0);
				$this->set('fetch_pos_noooo',$this->other_service->find('all',array('fields' => array('due_amount'),'conditions'=>$conditions)));
							
			
		 $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => array('flag' => 0, 'status' => 0, 'id' =>$id))));
		 $this->set('fetch_master_tax', $this->master_tax->find('all'));
		 $this->set('fetch_master_roomno', $this->master_roomno->find('all'));
		 $this->set('fetch_master_tax', $this->master_tax->find('all'));
		 $this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
		}
		////////////////////////////////
		function infobill()
	 {
		$id=$this->request->query("id");	
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}	
			else
		{
			$this->layout='index_layout';
		}
		 $this->loadmodel('room_checkin_checkout');
		 $this->loadmodel('master_roomno');
		 $this->loadmodel('master_tax');
		 $this->loadmodel('address');
		 $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => array('flag' => 0, 'status' => 0))));
		 $this->set('fetch_master_tax', $this->master_tax->find('all'));
		 $this->set('fetch_master_roomno', $this->master_roomno->find('all'));
		 $this->set('fetch_master_tax', $this->master_tax->find('all'));
		 $this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
	}
		////////////////////////////////
		
		function infobill1()
	{
		$id=$this->request->query("id");	
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
		 $this->loadmodel('room_checkin_checkout');
		 $this->loadmodel('master_tax');
		 $this->loadmodel('invoiceadd');
		 $conditions =array ('id'=> array($id));
		 $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => $conditions)));
		 $this->set('fetch_master_tax', $this->master_tax->find('all'));
		 $this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));	
		}
		////////////////////////
		
		function guest_reg()
	{
		
		$id=$this->request->query("id");
		
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
			
		}
		else
		{
			$this->layout='index_layout';
		}
		
		$this->loadmodel('invoiceadd');
		 
		 $conditions =array ('id'=> array($id));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
		}

		////////////////////////////////
	
	/////////////////////////
	function receipt_print()
	{
		
		$id=$this->request->query("id");
		
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
			
		}
		else
		{
			$this->layout='index_layout';
		}
		
		 $this->loadmodel('receipt_checkout');
		 
		 $conditions =array ('id'=> array($id));
		$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
			
		}

		////////////////////////////////
		
	public function roomstatisticreport_datewise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit1']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
				$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			echo "<script>
			location='roomstatisticreport_datewise';
			window.open('roomstatisticreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
		}
	}
		/////////////////////
		function roomstatisticreport()
	{
		
		$id=$this->request->query("id");
		
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
			
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('arrival_date between ? and ?' => array($start_date, $end_date));
        $this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => $conditions)));
			
		}

	///////////////////////////////////////////////Company Report///////////////
	////////////////////////////////
	public function cashierreport_datewise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit1']))
		{
			$start_date=$this->data["start_date"];
			$cash_report=$this->data["cash_report"];
			//pr($cash_report);
			//exit;	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			//echo $start_date;
			//echo $end_date;
			$cash_report=$this->data["cash_report"];
			if($cash_report==1)
			{
			echo "<script>
			location='cashierreport_datewise';
			window.open('pos_cashierreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
			}
			else if($cash_report==2){
			echo "<script>
			location='cashierreport_datewise';
			window.open('cashierreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";
			}
			else if($cash_report==3){
			echo "<script>
			location='cashierreport_datewise';
			window.open('function_cashierreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
			}
			else{
			echo "<script>
			location='cashierreport_datewise';
			window.open('combine_cashierreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
			}
			
			
			}
	}
		/////////////////////
		///////////////////////////////////////////////////
	public function menu_item_report()
	{
		if($this->RequestHandler->isAjax())
		{ 
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
		if(isset($this->request->data['submit']))
		{
		$menu_category_idd=$this->data["menu_category_idd"];
		$this->loadmodel('menu_category_item');
		$menur=$this->menu_category_item->find('all', array('fields' => array('menu_category_idd'),'conditions'=>array('flag' => 0, 'menu_category_idd' =>$menu_category_idd)));
			$menurr=$menur[0]['menu_category_item']['menu_category_idd'];
			if($menu_category_idd==$menurr)
			{
				
			echo "<script>
			location='menu_item_report';
			window.open('menu_report?con=$menurr','_newtab');
			</script>";	
			}
			}
		$this->loadmodel('address');
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
		$this->loadmodel('menu_category');
		$this->set('fetch_menu_category', $this->menu_category->find('all',array('conditions' => array('flag' => "0"))));
		$this->loadmodel('menu_category_item');
		$this->set('fetch_menu_category_item', $this->menu_category_item->find('all',array('conditions' => array('flag' => "0"))));
	}
	///////////////////////////////////////////////////
	/////////////////////
		function menu_report()
	{
		$id=$this->request->query("con");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$conditions[]=array('menu_category_idd' => $id,'flag' => 0);
		$conditionss[]=array('flag' => 0, 'id'=>$id);
		$this->loadmodel('menu_category_item');
		$this->set('fetch_menu_category_item', $this->menu_category_item->find('all', array('conditions' => $conditions, 'order'=>'master_item_type_id ASC',)));
       
	    $this->loadmodel('menu_category');
		$this->set('fetch_menu_category', $this->menu_category->find('all', array('conditions' => $conditionss)));
		
		///$this->loadmodel('master_item');
		//$this->set('fetch_master_item', $this->master_item->find('all', array('conditions' => $conditions)));
		//$this->loadmodel('master_item_type');
	//	$this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions' => $conditions)));
				}
	/////////////////////////////////////
	public function tax_ledger_report()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit1']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			$tax_report=$this->data["tax_report"];
			echo "<script>
			location='tax_ledger_report';
			window.open('taxreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";
		}
	}
	
	///////////////////////////////////////////////
	public function kot_bill_datewise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit1']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			$cash_report=$this->data["cash_report"];
			if($cash_report==1){
			echo "<script>
			location='kot_bill_datewise';
			window.open('pos_bill_wise?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";
			}
			else if($cash_report==2)
			{
			echo "<script>
			location='kot_bill_datewise';
			window.open('pos_nc_wise?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
			}
			
			else if($cash_report==3){
			echo "<script>
			location='kot_bill_datewise';
			window.open('pos_plan_wise?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";
			}
			else if($cash_report==4){
			echo "<script>
			location='kot_bill_datewise';
			window.open('pos_pool_wise?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";
			}
			
			else{
			echo "<script>
			location='kot_bill_datewise';
			window.open('pos_combine_wise?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
			}
		}
	}
	/////////////////////
	function pos_pool_wise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('date between ? and ?' => array($start_date, $end_date), 'kot_type'=>4);
          // pr($conditions);
		   //exit;
		   $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('pos_kot_item');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			$this->loadmodel('master_steward');
			//$this->set('fatch_pos_kot_item', $this->pos_kot_item->find('all'));
			$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => $conditions, 'kot_type'=>4)));
			//$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
			//$this->set('fatch_master_items', $this->master_item->find('all'));
			//$this->set('fatch_plan_item', $this->plan_item->find('all'));
			//$this->set('fatch_master_steward', $this->master_steward->find('all'));
			//$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
	////////////////////////////////
	/////////////////////
	function pos_bill_wise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		//$conditions =array ('current_date between ? and ?' => array($start_date, $end_date), 'kot_type'=>1);

$conditions =array('or' => array(
    array("kot_type" => 1, 'date between ? and ?' => array($start_date, $end_date)),
      array("kot_type" => 3, 'date between ? and ?' => array($start_date, $end_date))
    ));


            $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('pos_kot_item');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			$this->loadmodel('master_steward');
			//$this->set('fatch_pos_kot_item', $this->pos_kot_item->find('all'));
			$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => $conditions)));
			//$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
			//$this->set('fatch_master_items', $this->master_item->find('all'));
			//$this->set('fatch_plan_item', $this->plan_item->find('all'));
			//$this->set('fatch_master_steward', $this->master_steward->find('all'));
			//$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
	///////////////////////////////////////
	/////////////////////
	function pos_nc_wise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('date between ? and ?' => array($start_date, $end_date), 'kot_type'=>2);
          // pr($conditions);
		   //exit;
		   $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('pos_kot_item');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			$this->loadmodel('master_steward');
			//$this->set('fatch_pos_kot_item', $this->pos_kot_item->find('all'));
			$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => $conditions, 'kot_type'=>2)));
			//$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
			//$this->set('fatch_master_items', $this->master_item->find('all'));
			//$this->set('fatch_plan_item', $this->plan_item->find('all'));
			//$this->set('fatch_master_steward', $this->master_steward->find('all'));
			//$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
		///////////////////////////////////////////
		/////////////////////
	function pos_plan_wise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('date between ? and ?' => array($start_date, $end_date), 'kot_type'=>3);
          // pr($conditions);
		   //exit;
		   $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('pos_kot_item');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			$this->loadmodel('master_steward');
			$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => $conditions, 'kot_type'=>3)));
		}
	
		/////////////////////
	function pos_combine_wise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		//$conditions =array ('current_date between ? and ?' => array($start_date, $end_date), 'kot_type'=>1);
$conditions =array('or' => array(
    array("kot_type" => 1,'status'=>1, 'date between ? and ?' => array($start_date, $end_date)),
      array("kot_type" => 3,'status'=>1, 'date between ? and ?' => array($start_date, $end_date))
    ));
		$conditions1 =array ('date between ? and ?' => array($start_date, $end_date), 'kot_type'=>2,'status'=>1);
		$conditions2 =array ('date between ? and ?' => array($start_date, $end_date), 'kot_type'=>4,'status'=>1);
          // pr($conditions);
		   //exit;
		   $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('pos_kot_item');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			$this->loadmodel('master_steward');
			
			//$this->set('fatch_pos_kot_item', $this->pos_kot_item->find('all'));
			$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => $conditions)));
			$this->set('fetch_pos_kot1', $this->pos_kot->find('all', array('conditions' => $conditions1)));
			$this->set('fetch_pos_kot2', $this->pos_kot->find('all', array('conditions' => $conditions2)));
			//$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
			//$this->set('fatch_master_items', $this->master_item->find('all'));
			//$this->set('fatch_plan_item', $this->plan_item->find('all'));
			//$this->set('fatch_master_steward', $this->master_steward->find('all'));
			//$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
		/////////////////////////////////
	public function in_out_datewise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit1']))
		{
			$start_date=$this->data["start_date"];
			$cash_report=$this->data["cash_report"];
			//pr($cash_report);
			//exit;	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			//echo $start_date;
			//echo $end_date;
			
			if($cash_report==1)
			{
			echo "<script>
			location='in_out_datewise';
			window.open('outwardreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
			}
			else if($cash_report==2) {
			echo "<script>
			location='in_out_datewise';
			window.open('in_out_available?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";
			}
			else {
				echo "<script>
			location='in_out_datewise';
			window.open('inwardreport?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";
			}
			}
	}
		/////////////////////
	
	
	////////////////////////////////
		
	public function account_sheet_info()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit1']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
				$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			echo $start_date;
			echo $end_date;
			
			echo "<script>
			location='account_sheet_info';
			window.open('account_sheet?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
		}
	}
		/////////////////////
		function cashierreport()
	{
		$id=$this->request->query("id");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('date_to between ? and ?' => array($start_date, $end_date), 'flag1' => 0);
        $this->loadmodel('room_checkin_checkout');
		$this->loadmodel('invoiceadd');
		 $this->loadmodel('receipt_checkout');
		$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
	//////////////////////////////////////////////////////////////
	/////////////////////
		function function_cashierreport()
	{
		$id=$this->request->query("id");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('date_to between ? and ?' => array($start_date, $end_date), 'flag1' => 2);
        $this->loadmodel('room_checkin_checkout');
		$this->loadmodel('function_booking');
		$this->loadmodel('invoiceadd');
		 $this->loadmodel('receipt_checkout');
		$this->set('fetch_receipt_checkouut', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
	//////////////////////////////////////////////////////////////
	
	/////////////////////
		function inwardreport()
	{
		$id=$this->request->query("id");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('date between ? and ?' => array($start_date, $end_date), 'inward_id' => 0);
        $this->loadmodel('in_out_ward');
		$this->loadmodel('invoiceadd');
		// $this->loadmodel('receipt_checkout');
		$this->set('fetch_in_out_ward', $this->in_out_ward->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}

	//////////////////////////////////////////////////////////////
	/////////////////////
		function in_out_available()
	{
		$date=date("Y-m-d");
		$id=$this->request->query("id");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		//pr($start_date);
		//pr($end_date);
		//exit;
		
		//$conditions =array ();
		$conditions =array ('date between ? and ?' => array($start_date, $end_date));
        $this->loadmodel('in_out_ward');
		$this->loadmodel('invoiceadd');
		
		//$this->loadmodel('stock_category');
		// $this->loadmodel('receipt_checkout');
		$this->loadmodel('stock');
		$this->set('fetch_stock', $this->stock->find('all', array('flag' => 0)));
		//$this->set('fetch_stock_category', $this->stock_category->find('all', array('conditions' => $conditions)));
		$this->set('fetch_in_out_ward', $this->in_out_ward->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}

	//////////////////////////////////////////////////////////////
	
	/////////////////////
		function outwardreport()
	{
		$id=$this->request->query("id");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('date between ? and ?' => array($start_date, $end_date), 'inward_id' => 1);
        $this->loadmodel('in_out_ward');
		$this->loadmodel('invoiceadd');
		// $this->loadmodel('receipt_checkout');
		$this->set('fetch_in_out_ward', $this->in_out_ward->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}

	//////////////////////////////////////////////////////////////
	
	/////////////////////
		function pos_cashierreport()
	{
		$id=$this->request->query("id");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		$conditions =array ('date_to between ? and ?' => array($start_date, $end_date), 'flag1' => 1);
        $this->loadmodel('room_checkin_checkout');
		$this->loadmodel('invoiceadd');
		$this->loadmodel('receipt_checkout');
		$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
	//////////////////////////////////////////////////////////////
	public function room_reservation_report()
        {
			if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
            $start_date1=$this->request->query("start_date");
			$end_date1=$this->request->query("end_date");
			
			$this->set('start_date1',$start_date1);
			$this->set('end_date1',$end_date1);
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			//$company_id=$q[2];
			//$booking_type=$q[3];
			
			
			/*if(!empty($start_date1)){
			$start_date=date("Y-m-d",strtotime($start_date1));
			}else {$start_date=''; }
			if(!empty($end_date1)){
			$end_date=date("Y-m-d",strtotime($end_date1));
			}else {$end_date =''; }*/
			
			/////////////////////////////////
			/*$this->loadmodel('room_reservation');
			if(!empty($booking_type)){
				$conditions = array ('flag' => 0, 'booking_type' => $booking_type);
				
				
			}
			
			///////////////////////////////////////
			
			$this->loadmodel('room_reservation');
			if(!empty($company_id) && !empty($start_date)){
				$conditions = array ('date between ? and ?' => array($start_date, $end_date),'flag' => 0 , 'company_id' => $company_id);
			}else if(!empty($start_date)) {
				$conditions = array ('date between ? and ?' => array($start_date, $end_date),'flag' => 0 );
			}
			elseif(!empty($company_id) && empty($start_date)){
				$conditions = array ('flag' => 0 , 'company_id' => $company_id);
			}
			else
			{$conditions = array ('flag' => 0 ); }
		$fetch_room_reservation=$this->room_reservation->find('all', array('conditions' => $conditions));
		//pr($fetch_room_reservation);*/
		
		$this->loadmodel('room_reservation');
		$conditions = array (
              'OR' => array(
            array('arrival_date between ? and ?' => array($start_date, $end_date), 'checkin_id'=>0),
            array('b_date between ? and ?' => array($start_date, $end_date), 'checkin_id'=>0),
        ));
		$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions' => $conditions)));
		
		
}
	/////////////////////
	public function checkin_room_report()
        {
			if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
            $start_date1=$this->request->query("start_date");
			$end_date1=$this->request->query("end_date");
			
			$this->set('start_date1',$start_date1);
			$this->set('end_date1',$end_date1);
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
		$this->loadmodel('room_checkin_checkout');
		$conditions = array('arrival_date between ? and ?' => array($start_date, $end_date));
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => $conditions)));
}
	/////////////////////
	public function function_book_report()
        {
			if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
            $start_date1=$this->request->query("start_date");
			$end_date1=$this->request->query("end_date");
			
			$this->set('start_date1',$start_date1);
			$this->set('end_date1',$end_date1);
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
		$this->loadmodel('function_booking');
		$conditions = array('b_date between ? and ?' => array($start_date, $end_date));
		$this->set('fetch_function_booking', $this->function_booking->find('all', array('conditions' => $conditions)));
}
	/////////////////////

	public function checkout_room_report()
        {
			if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
            $start_date1=$this->request->query("start_date");
			$end_date1=$this->request->query("end_date");
			
			$this->set('start_date1',$start_date1);
			$this->set('end_date1',$end_date1);
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
		$this->loadmodel('room_checkin_checkout');
		$conditions = array('arrival_date between ? and ?' => array($start_date, $end_date), 'status'=>1);
            
        
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => $conditions)));
		
		
}
		
	/////////////////////
	
		function combine_cashierreport()
	{
		$id=$this->request->query("id");
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		$conditions =array ('date_to between ? and ?' => array($start_date, $end_date));
        $this->loadmodel('room_checkin_checkout');
		$this->loadmodel('invoiceadd');
		$this->loadmodel('receipt_checkout');
		$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
	//////////////////////////////////////////////////////////////
	
		function account_sheet()
	    {
		$id=$this->request->query("id");
		
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		$conditions =array ('date_to between ? and ?' => array($start_date, $end_date));
        $this->loadmodel('room_checkin_checkout');
		$this->loadmodel('invoiceadd');
		 $this->loadmodel('receipt_checkout');
		$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => $conditions)));
		$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
		}

	///////////////////////////////////////////////Company Report///////////////
	
	
	
	////////////////////////////////////////////////////////////////
	
	function billingreport_datewise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
				$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			echo "<script>
			location='billingreport_datewise';
			window.open('report_billing?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
		}
	}
	
	function report_billing()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('current_date between ? and ?' => array($start_date, $end_date), array('kot_type !='=>4));
           
		   $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			
			$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
			$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
			
			$this->set('fatch_master_items', $this->master_item->find('all'));
			$this->set('fatch_plan_items', $this->plan_item->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
			
		}
		////////////////////////////////// 	/////////////Company Report///////////////
	public function itemreport_datewise()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit1']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
				$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			echo "<script>
			location='itemreport_datewise';
			window.open('itemwise_report?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
		}
	}
	
	
		
		function itemwise_report()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('current_date between ? and ?' => array($start_date, $end_date), array('kot_type !='=>4));
           
		   
		   $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			
			$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
			$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
			
			$this->set('fatch_master_items', $this->master_item->find('all'));
			$this->set('fatch_plan_items', $this->plan_item->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
			
		}

	//////////////////////
	public function billwise_date()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			echo "<script>
			location='billwise_date';
			window.open('billwise_report?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
		}
	}
	
	function billwise_report()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$conditions =array ('current_date between ? and ?' => array($start_date, $end_date), array('kot_type !='=>4));
		//$conditions =array('or' =>array("kot_type" => 1),array("kot_type" => 2),array("kot_type" => 3));
		  
		  
//$conditions =array('or' => array(
  //      array("kot_type" => 1, 'current_date between ? and ?' => array($start_date, $end_date)),
    //    array("kot_type" => 2, 'current_date between ? and ?' => array($start_date, $end_date)),
		//array("kot_type" => 3, 'current_date between ? and ?' => array($start_date, $end_date))
        //));
		
		 
		   $this->loadmodel('invoiceadd');
		    $this->loadmodel('pos_kot');
			$this->loadmodel('pos_kot_item');
			$this->loadmodel('master_item');
			$this->loadmodel('plan_item');
			$this->loadmodel('master_item_category');
			$this->loadmodel('master_steward');
			$this->set('fatch_pos_kot_item', $this->pos_kot_item->find('all'));
			$this->set('fetch_pos_kot', $this->pos_kot->find('all',  array('conditions' => $conditions)));
			$this->set('fatch_billing_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
			$this->set('fatch_master_items', $this->master_item->find('all'));
			$this->set('fetch_master_item_category', $this->master_item_category->find('all'));
			$this->set('fatch_plan_item', $this->plan_item->find('all'));
			$this->set('fatch_master_steward', $this->master_steward->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
		}
////////////////////////////////////////		
//////////////////////////////Other reports-
 function companyreport()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('company_registration');
		$this->loadmodel('invoiceadd');
			
			$this->set('fetch_company_registration', $this->company_registration->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
	}
	
				function excel_companyreport()
	{
		
		$this->layout="";
		$filename='company_registration_excel';
		header ("Expires: 0");
		header ("border: 1");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=".$filename.".xls");
		header ("Content-Description: Generated Report" );
		
		$excel = "<table border='1'>
		<tr>
		<th>S.no</th>
		<th>Company Name</th>
        <th>Company Category</th>
		<th>Company Address</th>
		<th>Authorized Person Name</th>
		<th>Authorized Contact No.</th>
		<th>Authorized Email id</th>
		<th>Room Plan</th>
        <th>PAN No.</th>
        <th>Service Tax No.</th>
		<th>Telephone No.</th>
		<th>Mobile No.</th>
		<th>Correspondence Address</th>
		<th>Permanent Adderss</th>
        
		
		</tr>";
		$i=0;
		$this->loadModel('company_registration');
		
		$fatch_company_registration=$this->company_registration->find('all');
		foreach($fatch_company_registration as $view_data)
			{ $i++;
			
			
				@$id=$view_data['company_registration']['id'];
				@$company_name=$view_data['company_registration']['company_name'];
				@$company_category_id=$view_data['company_registration']['company_category_id'];
				@$complete_address=$view_data['company_registration']['complete_address'];
				@$authorized_person_name=$view_data['company_registration']['authorized_person_name'];
		        @$authorized_contact_no=$view_data['company_registration']['authorized_contact_no'];
				@$authorized_email_id=$view_data['company_registration']['authorized_email_id'];
				@$master_plan_idd=$view_data['company_registration']['master_plan_idd'];
				@$pan_no=$view_data['company_registration']['pan_no']; 
				@$service_tax_no=$view_data['company_registration']['service_tax_no'];
				@$telephone_no=$view_data['company_registration']['telephone_no'];
				@$mobile_no=$view_data['company_registration']['mobile_no']; 
				@$c_address=$view_data['company_registration']['c_address'];
				@$p_address=$view_data['company_registration']['p_address'];
			
			
				
		$excel.="	
		<tr>
		<td>".$i."</td>
		<td>".ucwords($company_name)."</td>
		<td>".ucwords(@$company_category_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$view_data['company_registration']['company_category_id']), array()))."</td> 
		<td>".ucwords($complete_address)."</td> 
		<td>".ucwords($authorized_person_name)."</td>
		<td>".$authorized_contact_no."</td>
		<td>".$authorized_email_id."</td>
		<td>".ucwords(@$master_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$view_data['company_registration']['master_plan_idd']), array()))."</td>
        <td>".ucwords($pan_no)."</td>
		<td>".$service_tax_no."</td>
        <td>".$telephone_no."</td>
		 <td>".$mobile_no."</td>
		<td>".ucwords($c_address)."</td>
		<td>".ucwords($p_address)."</td>";
		
		$excel.="</tr>";
		}
	$excel.="</table>";
	

	echo $excel;
	exit;
	}
	
	
	function report_avaliablity_status()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
	}
////////////////////////////////////////////////-------------------------------------------------------
	
	function companytariff_report()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
            $this->loadmodel('fo_room_booking');	
			 $this->loadmodel('invoiceadd');		
			$this->set('fetch_fo_room_booking', $this->fo_room_booking->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
					
	}
	
				function excel_companytariff_report()
	{
		
		$this->layout="";
		$filename='company_tariff_excel';
		header ("Expires: 0");
		header ("border: 1");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=".$filename.".xls");
		header ("Content-Description: Generated Report" );
		
		$excel = "<table border='1'>
		<tr>
		<th>S.no</th>
		<th>Company Category Wise</th>
		<th>Company Name Wise</th>
        <th>Room Type</th>
		<th>Room Plan</th>
		<th>Date From</th>
		<th>Date To</th>
		<th>GIT</th>
		<th>Special Rate</th>
        <th>Meals</th>
        <th>Remarks</th>
		
		
		
		</tr>";
		$i=0;
		$this->loadModel('fo_room_booking');
		$fatch_fo_room_booking=$this->fo_room_booking->find('all');
		foreach($fatch_fo_room_booking as $view_data)
			{ $i++;
				@$id=$view_data['fo_room_booking']['id'];
				@$company_category_id=$view_data['fo_room_booking']['company_category_id'];
				@$company_id=$view_data['fo_room_booking']['company_id'];
				@$master_room_type_id=$view_data['fo_room_booking']['master_room_type_id'];
				@$master_room_plan_id=$view_data['fo_room_booking']['master_room_plan_id'];
				@$date_from=$view_data['fo_room_booking']['date_from'];
		        @$date_to=$view_data['fo_room_booking']['date_to'];
				@$GIT=$view_data['fo_room_booking']['GIT'];
				@$special_rate=$view_data['fo_room_booking']['special_rate'];
				@$meals=$view_data['fo_room_booking']['meals']; 
				@$remarks=$view_data['fo_room_booking']['remarks'];
			
				
		$excel.="	
		<tr>	
		<td>".$i."</td>
		<td>".ucwords(@$company_category_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$view_data['fo_room_booking']['company_category_id']), array()))."</td>
		<td>".ucwords(@$company_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$view_data['fo_room_booking']['company_id']), array()))."</td>
		
		<td>".ucwords(@$master_room_type_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$view_data['fo_room_booking']['master_room_type_id']), array()))."</td> 
		<td>".ucwords(@$master_room_plan_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$view_data['fo_room_booking']['master_room_plan_id']), array()))."</td> 
		<td>".$date_from."</td>
		<td>".$date_to."</td>
		<td>".ucwords($GIT)."</td>
		<td>".$special_rate."</td>
        <td>".$meals."</td>
		<td>".ucwords($remarks)."</td>";
		
		$excel.="</tr>";
		}
			
	$excel.="</table>";
	

	echo $excel;
	exit;
	}
///////////////-----------------------------------------------------------------------	
	
	function functionreport()
	{
		$this->layout="";
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('function_booking');
		$this->loadmodel('invoiceadd');
			
			$this->set('fetch_function_booking', $this->function_booking->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
					
	}
	
			function excel_functionreport()
	{
		
		$this->layout="";
		$filename='Function_Booking_excel';
		header ("Expires: 0");
		header ("border: 1");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=".$filename.".xls");
		header ("Content-Description: Generated Report" );
		
		$excel = "<table border='1'>
		<tr>
		<th>S.no</th>
		<th>Booking</th>
        <th>Banquet Date</th>
		<th>Banquet Time</th>
		<th>Resv. No</th>
		<th>FTP. No</th>
		<th>Name</th>
		<th>Outlet/Venue</th>
        <th>Telephone No.</th>
        <th>Address</th>
		<th>Email-Id</th>
		<th>Rate</th>
		<th>Per Person Tax</th>
		<th>Tax</th>
		<th>Per Expected</th>
		<th>Pax Guaranteed</th>
		<th>No. of Persons</th>
		<th>Shape</th>
		<th>Other Service</th>
		<th>Instruction</th>
		<th>Menu Choice</th>
		
		
		
		</tr>";
		$i=0;
		$this->loadModel('function_booking');
		$fatch_function_booking=$this->function_booking->find('all');
		foreach($fatch_function_booking as $view_data)
			{ $i++;
				@$id=$view_data['function_booking']['id'];
				@$booking=$view_data['function_booking']['booking'];
				@$b_date=$view_data['function_booking']['b_date'];
				@$b_time=$view_data['function_booking']['b_time'];
				@$res_no_id=$view_data['function_booking']['res_no_id'];
		        @$ftp_no=$view_data['function_booking']['ftp_no'];
				@$name=$view_data['function_booking']['name'];
				@$outlet_venue_id=$view_data['function_booking']['outlet_venue_id'];
				@$address=$view_data['function_booking']['address']; 
				@$t_number=$view_data['function_booking']['t_number'];
				@$email=$view_data['function_booking']['email'];
				@$rate=$view_data['function_booking']['rate'];
				@$person_tax=$view_data['function_booking']['person_tax'];
				@$tax_id=$view_data['function_booking']['tax_id'];
				@$per_expected=$view_data['function_booking']['per_expected'];
				@$pax=$view_data['function_booking']['pax'];
				@$no_of_person=$view_data['function_booking']['no_of_person'];
				@$shape=$view_data['function_booking']['shape'];
				@$other_service=$view_data['function_booking']['other_service'];
				@$instruction=$view_data['function_booking']['instruction'];
				@$itemtype_id=$view_data['function_booking']['itemtype_id'];
			
				
		$excel.="	
		<tr>
		<td>".$i."</td>
		<td>".ucwords($booking)."</td>
		<td>".ucwords($b_date)."</td> 
		<td>".ucwords($b_time)."</td> 
		<td>".@$res_no_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'reservation_no_fetch',$view_data['function_booking']['res_no_id']), array())."</td>
		<td>".$ftp_no."</td>
		<td>".ucwords($name)."</td>
		<td>".ucwords(@$outlet_venue_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_outlet_fetch',$view_data['function_booking']['outlet_venue_id']), array()))."</td>
		<td>".ucwords($address)."</td>
		<td>".$t_number."</td>
        <td>".$email."</td>
		<td>".ucwords($rate)."</td>
		<td>".ucwords($person_tax)."</td>
		<td>".ucwords(@$tax_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch',$view_data['function_booking']['tax_id']), array()))."</td>
		<td>".ucwords($per_expected)."</td>
		<td>".ucwords($pax)."</td>
		<td>".ucwords($no_of_person)."</td>
		<td>".ucwords($shape)."</td>
		<td>".ucwords($other_service)."</td>
		<td>".ucwords($instruction)."</td>
		<td>".ucwords($itemtype_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$view_data['function_booking']['itemtype_id']), array()))."</td>";
		
		$excel.="</tr>";
		}
			
	$excel.="</table>";
	

	echo $excel;
	exit;
	}
	
	
	/////////////////////////////////////-------------------------------------------------------
	
	function checkinreport()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('invoiceadd');
			
			$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
			
					
	}
	
				function excel_checkinreport()
	{
		
		$this->layout="";
		$filename='Checkin_report_excel';
		header ("Expires: 0");
		header ("border: 1");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=".$filename.".xls");
		header ("Content-Description: Generated Report" );
		
		$excel = "<table border='1'>
		<tr>
		<th>S.no</th>
		<th>Reg. Card no</th>
        <th> Resv. No.</th>
		<th>Arrival Date</th>
		<th>Arrival Time</th>
		<th>Company Name</th>
		<th>Guest Name</th>
		<th>Address</th>
        <th>Arriving From</th>
        <th>Next Destination</th>
		<th>Nationality</th>
		<th>City</th>
		<th>Duration</th>
		<th>Checkout Date</th>
		<th>Room No.</th>
		<th>Room Type</th>
		<th>Plan Name</th>
		<th>Pax</th>
		<th>Source of Booking</th>
		<th>Room Charge</th>
		<th>Advance</th>
		<th>Child</th>
		<th>Billing Inst.</th>
		<th>Apply Special Rates </th>
		
		
		
		</tr>";
		$i=0;
		$this->loadModel('room_checkin_checkout');
		$fatch_room_checkin_checkout=$this->room_checkin_checkout->find('all');
		foreach($fatch_room_checkin_checkout as $view_data)
			{ $i++;
				@$id=$view_data['room_checkin_checkout']['id'];
				@$card_no=$view_data['room_checkin_checkout']['card_no'];
				@$room_reservation_id=$view_data['room_checkin_checkout']['room_reservation_id'];
				@$arrival_date=$view_data['room_checkin_checkout']['arrival_date'];
				@$arrival_time=$view_data['room_checkin_checkout']['arrival_time'];
		        @$company_id=$view_data['room_checkin_checkout']['company_id'];
				@$guest_name=$view_data['room_checkin_checkout']['guest_name'];
				@$permanent_address=$view_data['room_checkin_checkout']['permanent_address'];
				@$arriving_from=$view_data['room_checkin_checkout']['arriving_from']; 
				@$next_destination=$view_data['room_checkin_checkout']['next_destination'];
				@$nationality=$view_data['room_checkin_checkout']['nationality'];
				@$city=$view_data['room_checkin_checkout']['city'];
				@$duration=$view_data['room_checkin_checkout']['duration'];
				@$checkout_date=$view_data['room_checkin_checkout']['checkout_date'];
				@$master_roomno_id=$view_data['room_checkin_checkout']['master_roomno_id'];
				@$room_type_id=$view_data['room_checkin_checkout']['room_type_id'];
				@$plan_id=$view_data['room_checkin_checkout']['plan_id'];
				@$pax=$view_data['room_checkin_checkout']['pax'];
				@$source_of_booking=$view_data['room_checkin_checkout']['source_of_booking'];
				@$room_charge=$view_data['room_checkin_checkout']['room_charge'];
				@$advance=$view_data['room_checkin_checkout']['advance'];
				@$child=$view_data['room_checkin_checkout']['child'];
				@$billing_instruction=$view_data['room_checkin_checkout']['billing_instruction'];
				@$apply_special_rates=$view_data['room_checkin_checkout']['apply_special_rates'];
				
			
				
		$excel.="	
		<tr>
		<td>".$i."</td>
		<td>".ucwords($card_no)."</td>
		<td>".ucwords($room_reservation_id)."</td> 
		<td>".ucwords($arrival_date)."</td> 
		<td>".$arrival_time."</td>
		<td>".ucwords(@$company_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$view_data['room_checkin_checkout']['company_id']), array()))."</td>
		<td>".ucwords($guest_name)."</td>
		<td>".ucwords($permanent_address)."</td>
		<td>".ucwords($arriving_from)."</td>
		<td>".ucwords($next_destination)."</td>
        <td>".ucwords($nationality)."</td>
		<td>".ucwords($city)."</td>
		<td>".ucwords($duration)."</td>
		<td>".ucwords($checkout_date)."</td>
		<td>".ucwords($master_roomno_id)."</td>
		<td>".ucwords(@$room_type_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$view_data['room_checkin_checkout']['room_type_id']), array()))."</td>
		<td>".ucwords(@$plan_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$view_data['room_checkin_checkout']['plan_id']), array()))."</td>
		<td>".ucwords($pax)."</td>
		<td>".ucwords($source_of_booking)."</td>
		<td>".ucwords($room_charge)."</td>
		<td>".ucwords($advance)."</td>
		<td>".ucwords($child)."</td>
		<td>".ucwords($billing_instruction)."</td>
		<td>".ucwords($apply_special_rates)."</td>";
		
		$excel.="</tr>";
		}
			
	$excel.="</table>";
	

	echo $excel; exit;
	}
	//////----------------------------------------------------
	
	function checkoutreport()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('invoiceadd');
			
			$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all'));
			$this->set('fetch_invoiceadd', $this->invoiceadd->find('all'));
					
	}
	
	
	
	function excel_checkoutreport()
	{
		
		$this->layout="";
		$filename='Checkout_report_excel';
		header ("Expires: 0");
		header ("border: 1");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=".$filename.".xls");
		header ("Content-Description: Generated Report" );
		
		$excel = "<table border='1'>
		<tr>
		<th>S.no</th>
		<th>Room no</th>
        <th>Guest/Group Name</th>
		<th>Room Type</th>
		<th>Checkin Date</th>
		<th>Plan</th>
		<th>Billing Instruction</th>
		<th>Source of Booking</th>
        <th>Pax</th>
        <th>Child</th>
		<th>Room Charge</th>
		<th>Advance Taken</th>
		<th>Total Charge</th>
		<th>Taxes</th>
		<th>Gross Amount</th>
		<th>Room Discount</th>
		<th>Food Discount</th>
		<th>Other Discount</th>
		<th>Net Amount</th>
		<th>Remarks</th>
		
		
		</tr>";
		$i=0;
		$this->loadModel('room_checkin_checkout');
		$fatch_room_checkin_checkout=$this->room_checkin_checkout->find('all');
		foreach($fatch_room_checkin_checkout as $view_data)
			{ $i++;
				@$id=$view_data['room_checkin_checkout']['id'];
				@$master_roomno_id=$view_data['room_checkin_checkout']['master_roomno_id'];
				@$guest_name=$view_data['room_checkin_checkout']['guest_name'];
				@$room_type_id=$view_data['room_checkin_checkout']['room_type_id'];
				@$arrival_date=$view_data['room_checkin_checkout']['arrival_date'];
				@$plan_id=$view_data['room_checkin_checkout']['plan_id'];
		        @$billing_instruction=$view_data['room_checkin_checkout']['billing_instruction'];
				@$source_of_booking=$view_data['room_checkin_checkout']['source_of_booking'];
				@$pax=$view_data['room_checkin_checkout']['pax'];
				@$child=$view_data['room_checkin_checkout']['child']; 
				@$room_charge=$view_data['room_checkin_checkout']['room_charge'];
				@$advance_taken=$view_data['room_checkin_checkout']['advance_taken'];
				@$total_charge=$view_data['room_checkin_checkout']['total_charge'];
				@$taxes=$view_data['room_checkin_checkout']['taxes'];
				@$gross_amount=$view_data['room_checkin_checkout']['gross_amount'];
				@$room_discount=$view_data['room_checkin_checkout']['room_discount'];
				@$foo_discount=$view_data['room_checkin_checkout']['foo_discount'];
				@$other_discount=$view_data['room_checkin_checkout']['other_discount'];
				@$net_amount=$view_data['room_checkin_checkout']['net_amount'];
				@$remarks=$view_data['room_checkin_checkout']['remarks'];
				
				
			
				
		$excel.="	
		<tr>
		<td>".$i."</td>
		<td>".ucwords($master_roomno_id)."</td>
		<td>".ucwords($guest_name)."</td> 
		<td>".ucwords(@$room_type_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$view_data['room_checkin_checkout']['room_type_id']), array()))."</td> 
		<td>".$arrival_date."</td>
		
		<td>".ucwords(@$plan_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$view_data['room_checkin_checkout']['plan_id']), array()))."</td>
		
		<td>".ucwords($billing_instruction)."</td>
		<td>".ucwords($source_of_booking)."</td>
		<td>".ucwords($pax)."</td>
		<td>".ucwords($child)."</td>
		<td>".ucwords($room_charge)."</td>
        <td>".ucwords($advance_taken)."</td>
		<td>".ucwords($total_charge)."</td>
		<td>".ucwords($taxes)."</td>
		<td>".ucwords($gross_amount)."</td>
		<td>".ucwords($room_discount)."</td>
		<td>".ucwords($foo_discount)."</td>
		<td>".ucwords($other_discount)."</td>
		<td>".ucwords($net_amount)."</td>
		<td>".ucwords($remarks)."</td>";
		
		$excel.="</tr>";
		}
			
	$excel.="</table>";
		echo $excel;
	exit;
	}

//////////////////////////////Bill Settleing/////////////////////////////////////////////
	function bill_settleing()
	{
		$kot_id = $this->request->query('kot_id');		
		$date=date("Y-m-d");
		$cutrrent_time=date("h:i:s A");
		$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
			?>
			<style>
			.radio-list > label.radio-inline:first-child {
				padding-left: 20px;
			}
			</style>
			<?php
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadModel('bill_settlement');
		$this->loadModel('pos_kot');
		$this->loadmodel('pos_saler_counter');
		
		if(isset($this->request->data['print_submit']))
		{	
			@$steward_id=$this->data["steward"];
			$table_no=$this->data["table_no"];	
			$guest_name=$this->data["guest_name"];	
			$bill_no=$this->data["bill_no"];	
			$kot_amount=$this->data["amount"];	
			$taxes=$this->data["taxes"];	
			$service_charge=$this->data["service_charge"];	
			$gross=$this->data["gross"];
			$tips=$this->data["tips"];	
			$discount=$this->data["discount"];	
			$payment_mode=@(string)$this->data["payment_mode"];	
			$master_r_id=$this->data["master_roomnos_id"];
			$cnm=$this->data["card_n"];
			$master_r_id=$this->data["master_roomnos_id"];
			$amount=$this->data["amount"];
			$dueamt=$this->data["dueamt"];
			$kot_billing_id=$this->data["bill"];
			$bill_no=$this->data["bill_no"];
		    $discount=$this->data["discount"];
		    $guest_name=$this->data["guest_name"];	
			$bill_no=$this->data["bill_no"];
			$p_user_id=$this->data["p_user_id"];
			$c_member_id=$this->data["c_member_id"];
			$amountt=$this->request->data["amountt"];
			$pos_due_zero=0;
			$pos_due_amount=$amountt-$amount-$pos_due_zero;
			
			$this->pos_kot->updateAll(array('status1' =>1, 'guest_name'=> "'$guest_name'", 'pos_gross' => "'$gross'",'pos_taxes' => "'$taxes'", 'service_charge' => "'$service_charge'", 'tips' => "'$tips'", 'pos_discount'=>"'$discount'", 'pos_net_amount' =>"'$amountt'",'due_amount' =>"'$pos_due_amount'" ), array('id' => $bill_no));	
    ?>
             <script>
			 window.open("bill_settleing_print?kot_id=<?php echo $bill_no; ?>",'_blank');
			// window.open("receipt",'_blank');
			 </script>
             <?php
			 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=billing_kot?active=1">';
		}
		else if(isset($this->request->data['submit']))
		{	
			@$steward_id=$this->data["steward"];
			$table_no=$this->data["table_no"];	
			$guest_name=$this->data["guest_name"];	
			$bill_no=$this->data["bill_no"];	
			$kot_amount=$this->data["amount"];	
			$taxes=$this->data["taxes"];	
			$service_charge=$this->data["service_charge"];	
			$gross=$this->data["gross"];
			$tips=$this->data["tips"];	
			$discount=$this->data["discount"];	
			$payment_mode=@(string)$this->data["payment_mode"];	
			$master_r_id=$this->data["master_roomnos_id"];
			$cnm=$this->data["card_n"];
			$master_r_id=$this->data["master_roomnos_id"];
			$amount=$this->data["amount"];
			$dueamt=$this->data["dueamt"];
			$kot_billing_id=$this->data["bill"];
			$bill_no=$this->data["bill_no"];
		    $discount=$this->data["discount"];
		    $guest_name=$this->data["guest_name"];	
			$bill_no=$this->data["bill_no"];
			$amountt=$this->request->data["amountt"];
			$amount=$this->request->data["amount"];
			$payment_mode=$this->request->data["payment_mode"];
			$p_user_id=$this->request->data["p_user_id"];
			$pos_due_zero=0;
			$pos_due_amount=$amountt-$amount-$pos_due_zero;
			$this->pos_kot->updateAll(array('status1' =>0,'status' =>1, 'guest_name'=> "'$guest_name'", 'pos_gross' => "'$gross'",'pos_taxes' => "'$taxes'", 'service_charge' => "'$service_charge'", 'tips' => "'$tips'", 'pos_discount'=>"'$discount'", 'pos_net_amount' =>"'$amountt'",'received_amount' =>"'$amount'",'due_amount' =>"'$pos_due_amount'"), array('id' => $bill_no));	
			
//////////////////////////receipt////////////////
               /* $this->loadModel('card_amount');
				$registration_id=$this->request->data["registration_id"];
				$conditions=array(array('registration_id' => $registration_id, 'flag' => 0), 'order'=>'id DESC','limit'=>1);
				$fetch_card_balance=$this->card_amount->find('all',array('conditions'=>array('registration_id' => $registration_id,'flag' => "0"), 'order'=>'id DESC','limit'=>1,'fields'=>array('balance_amount')));
				if(!empty($fetch_card_balance)){
				$ftc_balance=$fetch_card_balance[0]['card_amount']['balance_amount'];
				@$main_balance=$ftc_balance-$amount;
				}
				else
				{
					$main_balance=$amount;
				}
				$this->card_amount->saveAll(array('registration_id' => $registration_id,'recharge_amount' => $recharge_amount,
				'balance_amount' => $main_balance,'date' => $date,'time' => $time));
                $this->redirect(array('action' => 'card_amount'));*/
                ///////////////////////////////end//////////////				
	
				
				$service_charge=$this->data["service_charge"];
				$cheque_no=@(int)$this->data["cheque_no"];
				$cheque_date=$this->data["cheque_date"];
				$neft_no=@(int)$this->data["neft_no"];
				$credit_card_name=$this->data["credit_card_name"];
				$credit_card_no=@(int)$this->data["credit_card_no"];
				$bank_name=$this->data["bank_name"];
				$narration=$this->data["narration"];
				
				$taxes=$this->data["taxes"];	
			    $tips=$this->data["tips"];	
			    $discount=$this->data["discount"];
				$date=date("Y-m-d");
				$current_time=date("h:i:s A");
				$amount=$this->request->data["amount"];
				$amountt=$this->request->data["amountt"];
				$bill_no=$this->request->data["bill_no"];
				$helpers = array('Time');
				$cnm=$this->request->data["card_n"];
				$this->loadModel('pos_kot_item');
				$this->loadModel('ledger');
				$this->loadModel('ledger_master');
				$this->loadModel('ledger_cr_dr');
				$t_date=date('Y-m-d', strtotime($date));
               
			   
			    $fetch_transaction_id_bill=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Invoice')));
                $t_id_b=$fetch_transaction_id_bill+1;
				$this->ledger->saveAll(array('ledger_category_id'=>4,'user_id'=> $p_user_id,'transaction_type'=>'Invoice','transaction_id'=> $t_id_b,'receipt_type'=> 'POS','invoice_id' => $bill_no, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				    $last_ledger_id=$this->ledger->getLastInsertID(); 
				//
				$kot_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$p_user_id)));
				$l_id=$kot_m_ledger[0]['ledger_master']['id'];
				//
				//
				$kot_item_ledger=$this->pos_kot_item->find('all', array('conditions'=>array('pos_kots_id' =>$bill_no)));
				$st1_cat=$kot_item_ledger[0]['pos_kot_item']['item_category_id'];
				//
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'dr' => $amountt));
				if($discount>0){
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '10','dr' => $discount));}
				if($tips>0){
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '9','cr' => $tips));
				}
				if($service_charge>0){
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '8','cr' => $service_charge));
				}
				
				
				foreach($kot_item_ledger as $lr_data)
				{
				$this->loadModel('sales_temp');
					@$st1_bill_no=$lr_data['pos_kot_item']['pos_kots_id'];
				    @$st1_amount=$lr_data['pos_kot_item']['gross'];
					@$st1_cat=$lr_data['pos_kot_item']['item_category_id'];
					$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $st1_cat,'cr' => $st1_amount));
				}
	////////// Rohit Joshi tax code //////
	$this->loadModel('pos_kot_item');
	$result_pos_kot_item=$this->pos_kot_item->find('all', array('conditions'=>array('pos_kots_id' =>$bill_no)));
			foreach($result_pos_kot_item as $data_item){
				$master_items_id=$data_item['pos_kot_item']['master_items_id'];
				$gross_amount=$data_item['pos_kot_item']['gross'];
				$this->loadModel('master_item');
				$result_master_item=$this->master_item->find('all', array('conditions'=>array('id' =>$master_items_id)));
				foreach($result_master_item as $data_master){
					
					$master_item_type_id=$data_master['master_item']['master_item_type_id'];
					$this->loadModel('master_item_type');
				   $result_master_item_type=$this->master_item_type->find('all', array('conditions'=>array('id' =>$master_item_type_id)));
				   foreach($result_master_item_type as $data_item_type){
					  $master_tax_id=$data_item_type['master_item_type']['master_tax_id'];
					  $master_tax_id_modify= explode(',',$master_tax_id);
					   $vat_gross=0;
						foreach($master_tax_id_modify as $data_tax){
							
							$this->loadModel('master_tax');
							$result_master_tax=$this->master_tax->find('all', array('conditions'=>array('id' =>$data_tax)));
							$tax_applicable=$result_master_tax[0]['master_tax']['tax_applicable'];
							$name=$result_master_tax[0]['master_tax']['name'];
							if($name=='Service Tax'){
								
								$total_gro=$gross_amount*$tax_applicable/100;
								$this->loadModel('ledger_cr_dr');
								$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '29','cr' => $total_gro));
				
								
								 $vat_gross=$gross_amount+$total_gro;
								
							}
							if($name=='VAT'){
								if(!empty($vat_gross)){
									$vat_actual=$vat_gross;
								}else{
									$vat_actual=$gross_amount;
								}
								
								 $total_vat=$vat_actual*$tax_applicable/100;
								 $this->loadModel('ledger_cr_dr');
								 $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '39','cr' => $total_vat));
								
							}
							
						}
						
				   }
					
					
				}
			}
	
/////////end code//////////		
			 $fetch_transaction_id=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Receipt')));
             $t_id=$fetch_transaction_id+1;
              if($amount>0)
			  {
				  $this->ledger->saveAll(array('ledger_category_id'=>4,'user_id'=> $p_user_id,'transaction_id'=> $t_id,'transaction_type'=> 'Receipt','receipt_type'=> 'POS','invoice_id' => $bill_no, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				  
				  
				 $last_ledger_id=$this->ledger->getLastInsertID();
				  // 
				$kot_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$p_user_id)));
				$l_id=$kot_m_ledger[0]['ledger_master']['id'];
				//
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=>$l_id,'cr' => $amount));
				  
				if($payment_mode=='Cash')
				{
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '35','dr' => $amount));
				}else
				{
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '37','dr' => $amountt));
			    }
			  }
					
			?>
             <script>
			 window.open("bill_settleing_print?kot_id=<?php echo $bill_no; ?>",'_blank');
			//window.open("receipt",'_blank');
			 </script>
             <?php
			 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=billing_kot?active=1">';
		}
		$this->loadModel('master_steward');
		$this->set('fatch_master_steward', $this->master_steward->find('all'));
		$this->loadModel('pos_kot');
		$this->set('fatch_billing_kot_data', $this->pos_kot->find('all',array('conditions'=>array('kot_type'=>1))));
		$this->set('fatch_billing_kot_query_string', $this->pos_kot->find('all',array('conditions'=>array('id'=>$kot_id))));
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
		$this->loadmodel('receipt_checkout');
		$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => '0'))));
		$this->set('fetch_pos_saler_counter', $this->pos_saler_counter->find('all'));
				$this->loadmodel('card_amount');
		$this->loadmodel('registration');
					$this->set('fetch_registration', $this->registration->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_card_amount', $this->card_amount->find('all', array('conditions' => array('flag' => "0"))) );

		$this->loadmodel('master_roomno');
		$this->set('fatch_master_roomno', $this->master_roomno->find('all'));
		$this->loadmodel('master_table');
		$this->set('fetch_master_table', $this->master_table->find('all'));
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_table');
		$this->set('fatch_master_table', $this->master_table->find('all' ,array('conditions'=>array('flag' => 0 ))));
	}
	
	/* function popupkot()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
		
		$popup=$this->request->query('con');
		$id=$this->request->query('id');
		//exit;
		
		if($popup==1)
		{
		?>
             <script>
			 window.open("bill_kot_print?kot_id=<?php echo $id; ?>",'_blank');
			 </script>
             <?php
			 echo "<meta http-equiv='Refresh' content='0 ;URL=billing_kot'>";
			  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=billing_kot?active=1">';
		} if($popup==2){ ?>
			  <script>
			  window.open("bill_kot_print?kot_id=<?php echo $id; ?>",'_blank');
			  </script><?php
			 echo "<meta http-equiv='Refresh' content='0;URL=bill_settleing?kot_id=".$id."'>";
		}
		}*/
		
	
	/////////////////////////////////
		  function billing_kot_2()
	{
		 $date=date("Y-m-d"); 
	 	$cutrrent_time=date("h:i:s A");
		$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadModel('pos_kot');
		
		/*$popup=$this->request->query('con');
		
		if!empty($popup))
		{
			echo 'sfsf';
		}*/
		
		if(isset($this->request->data['form_submit']))
		{	
			$outlet_name=$this->data["outlet_name"];
			$session=$this->data["session"];	
			$master_itemcategory_id=@(int)$this->data["master_itemcategory_id"];	
			$guest_name=$this->data["guest_name"];	
			$covers=@$this->data["covers"];	
			$card_no=@(int)$this->data["card_no"];
			$roomno_id=@(int)$this->data["room_no"];
			$remarks=@$this->data["remarks"];
			$discount=@$this->data["discount"];	
			$club_member_id=@(int)$this->data["club_member_id"];
		    $rec_amount=$this->data["rec_amount"];
			$net_amount=$this->data["net_amount"];
			$tot_amount=$this->data["tot_amount"];
			//$payment_type=$this->request->data["payment_type"];
			$payment_mode=$this->request->data["payment_mode"];
			$cheque_date=$this->request->data["cheque_date"];
			$narration=$this->request->data["narration"];
			
			$pos_due_zero=0;
            $pos_due_amount=$net_amount-$rec_amount-$pos_due_zero;
			
			
			$user_id=@(int)$this->data["user_id"];
			if($user_id==0 || $user_id=='')
			{
				$pos_user_id='1';
			}else{
			$pos_user_id=$user_id;
			}
				
				$fetch_for_last_id=$this->pos_kot->find('all', array('conditions' => array('kot_type' => 4),'order'=>'id DESC','limit'=>1));
				if(sizeof($fetch_for_last_id)>0)
				{
					$fetch_last_id=$fetch_for_last_id[0]['pos_kot']['billing_kot_2_id'];
					$fetch_billing_kot_id=$fetch_last_id+1;	
				}
				else
				{
					$fetch_billing_kot_id=1;
				}
				$this->pos_kot->saveAll(array("master_outlets_id"=>$outlet_name,"session"=>$session,"user_id"=>$pos_user_id,"club_member_id"=>$club_member_id,"current_date"=>$date,"guest_name"=>$guest_name,"covers"=>$covers, "master_roomnos_id"=>$roomno_id, "card_no"=>$card_no,"master_itemcategory_id"=>@$master_itemcategory_id,"remarks"=>$remarks,"kot_type"=>4,"billing_kot_2_id"=>$fetch_billing_kot_id,'time'=>$cutrrent_time, 'pos_gross'=> $tot_amount, 'pos_discount'=> $discount, 'pos_net_amount'=> $net_amount, 'received_amount'=> $rec_amount,'due_amount'=> $pos_due_amount, 'status'=>1));		
			
			$last_record_id=$this->pos_kot->getLastInsertID();     
			$this->loadmodel('pos_kot_item_temp');
			$this->loadmodel('pos_kot_item');
			$conditions=array('user_id' => $user_id=$this->Session->read('user_id'),'kot_type'=>4);
			$fetch_pos_kot_item_temp=$this->pos_kot_item_temp->find('all',(array('conditions'=>$conditions)));
			
			foreach($fetch_pos_kot_item_temp as $temp_data_foreach)
			{
				foreach($temp_data_foreach as $view)	
				{
				$this->loadmodel('pos_kot_item');
				$this->pos_kot_item->saveAll(array("pos_kots_id"=>$last_record_id,"master_items_id"=>$view['master_items_id'],"quantity"=>$view['quantity'],"rate"=>$view['rate'],"amount"=>$view['amount'],"gross"=>$view['gross'],"taxes"=>$view['taxes'],"item_category_id"=>$view['item_category_id']));
				$this->pos_kot_item_temp->delete(array('id' => $view['id']));	
				}
			}
			
			
			
	///////////////////////////////////////////////////////////////////////
	            $last_record_id=$this->pos_kot->getLastInsertID(); 		
				$cheque_no=@(int)$this->data["cheque_no"];
				$cheque_date=$this->data["cheque_date"];
				$neft_no=@(int)$this->data["neft_no"];
				$credit_card_name=$this->data["credit_card_name"];
				$credit_card_no=@(int)$this->data["credit_card_no"];
				$bank_name=$this->data["bank_name"];
				$narration=$this->data["narration"];
				
				$taxes=$this->data["taxes"];	
			    $discount=$this->data["discount"];
				$date=date("Y-m-d");
				$current_time=date("h:i:s A");
				$tot_amount=$this->request->data["amount"];
				$net_amount=$this->request->data["net_amount"];
				//$bill_no=$this->request->data["bill_no"];
				$card_no=$this->request->data["card_no"];
				$this->loadModel('pos_kot_item');
				$this->loadModel('ledger');
				$this->loadModel('ledger_master');
				$this->loadModel('ledger_cr_dr');
				$t_date=date('Y-m-d', strtotime($date));
			   
			    $fetch_transaction_id_bill2=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Invoice')));
                $t_id_b=$fetch_transaction_id_bill2+1;
				$this->ledger->saveAll(array('ledger_category_id'=>13,'user_id'=> $pos_user_id, 'transaction_type'=>'Invoice','transaction_id'=> $t_id_b,'receipt_type'=> 'POS','invoice_id' => $last_record_id, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				    $last_ledger_id=$this->ledger->getLastInsertID(); 
				//
				$kot_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$pos_user_id)));
				$l_id=$kot_m_ledger[0]['ledger_master']['id'];
				//
				//
				$kot_item_ledger=$this->pos_kot_item->find('all', array('conditions'=>array('pos_kots_id' =>$last_record_id)));
				@$st1_cat=$kot_item_ledger[0]['pos_kot_item']['item_category_id'];
				//
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'dr' => $net_amount));
				if($discount>0){
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '10','dr' => $discount));}
				
				
				foreach($kot_item_ledger as $lr_data)
				{
				$this->loadModel('ledger');
					@$st1_bill_no=$lr_data['pos_kot_item']['pos_kots_id'];
				    @$st1_amount=$lr_data['pos_kot_item']['gross'];
					@$st1_cat=$lr_data['pos_kot_item']['item_category_id'];
					$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $st1_cat,'cr' => $st1_amount));
				}
				
				////////// Rohit Joshi tax code //////
	$this->loadModel('pos_kot_item');
	$result_pos_kot_item=$this->pos_kot_item->find('all', array('conditions'=>array('pos_kots_id' =>$last_record_id)));
			foreach($result_pos_kot_item as $data_item){
				$master_items_id=$data_item['pos_kot_item']['master_items_id'];
				$gross_amount=$data_item['pos_kot_item']['gross'];
				$this->loadModel('master_item');
				$result_master_item=$this->master_item->find('all', array('conditions'=>array('id' =>$master_items_id)));
				foreach($result_master_item as $data_master){
					
					$master_item_type_id=$data_master['master_item']['master_item_type_id'];
					$this->loadModel('master_item_type');
				   $result_master_item_type=$this->master_item_type->find('all', array('conditions'=>array('id' =>$master_item_type_id)));
				   foreach($result_master_item_type as $data_item_type){
					  $master_tax_id=$data_item_type['master_item_type']['master_tax_id'];
					  $master_tax_id_modify= explode(',',$master_tax_id);
					   $vat_gross=0;
						foreach($master_tax_id_modify as $data_tax){
							
							$this->loadModel('master_tax');
							$result_master_tax=$this->master_tax->find('all', array('conditions'=>array('id' =>$data_tax)));
							$tax_applicable=$result_master_tax[0]['master_tax']['tax_applicable'];
							$name=$result_master_tax[0]['master_tax']['name'];
							if($name=='Service Tax'){
								
								$total_gro=$gross_amount*$tax_applicable/100;
								$this->loadModel('ledger_cr_dr');
								$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '29','cr' => $total_gro));
				
								
								 $vat_gross=$gross_amount+$total_gro;
								
							}
							if($name=='VAT'){
								if(!empty($vat_gross)){
									$vat_actual=$vat_gross;
								}else{
									$vat_actual=$gross_amount;
								}
								
								 $total_vat=$vat_actual*$tax_applicable/100;
								 $this->loadModel('ledger_cr_dr');
								 $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '39','cr' => $total_vat));
								
							}
							
						}
						
				   }
					
					
				}
				
	
				
			}



			
/////////end code//////////		
				
				
				
			 $fetch_transaction_id_bill2=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Receipt')));
             $t_id=$fetch_transaction_id_bill2+1;
              if($rec_amount>0)
			  {
				  $this->ledger->saveAll(array('ledger_category_id'=>13,'user_id'=> $pos_user_id,'transaction_id'=> $t_id,'transaction_type'=> 'Receipt','receipt_type'=> 'POS','invoice_id' => $last_record_id, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				  
				  
				 $last_ledger_id=$this->ledger->getLastInsertID();
				  // 
				$kot_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$pos_user_id)));

				$l_id=$kot_m_ledger[0]['ledger_master']['id'];
				//
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=>$l_id,'cr' => $rec_amount));
				  
				if($payment_mode=='Cash')
				{
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '35','dr' => $rec_amount));
				}else
				{
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '37','dr' => $rec_amount));
			    }
			  }
			
			////////////////////////////////.................//////////////////////////////////////
			?>
             <script>
			 window.open("billing_kot_2_print?kot_id=<?php echo $last_record_id; ?>",'_blank');
			 </script>
             <?php
			 echo "<meta http-equiv='Refresh' content='0 ;URL=billing_kot_2'>";
			 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=billing_kot_2?active=1">';
}
		
		$this->loadmodel('master_item_type');
		$this->set('fetch_master_item_type', $this->master_item_type->find('all',array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('company_registration');
		$this->set('fetch_company_registration', $this->company_registration->find('all' ,array('conditions'=>array('flag' => 0 ))));
		
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all' ,array('conditions'=>array('flag' => 0 ))));
		//$this->loadmodel('master_room_plan');
		//$this->set('fetch_room_plan', $this->master_room_plan->find('all'));
		$this->loadmodel('master_table');
		$this->set('fetch_master_table', $this->master_table->find('all' ,array('conditions'=>array('flag' => 0 ))));
		//$this->loadmodel('master_room_type');
		//$this->set('fatch_master_room_type', $this->master_room_type->find('all'));
		$this->loadmodel('master_roomno');
		$this->set('fatch_master_roomno', $this->master_roomno->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_steward');
		$this->set('fatch_master_steward', $this->master_steward->find('all' ,array('conditions'=>array('flag' => 0))));
		$this->loadmodel('master_item');
		$this->set('fatch_master_items', $this->master_item->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('plan_item_category');
		$this->set('fetch_plan_item_category', $this->plan_item_category->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->set('fatch_billing_kot_data', $this->pos_kot->find('all',array('conditions'=>array('kot_type'=>4 , 'flag' => 0 ))));
		$this->loadmodel('master_item_categorie');
		$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
		$this->loadmodel('registration');
		$this->set('fetch_registration', $this->registration->find('all'));
	}	
	//////////////////////////////////////
	  function billing_kot()
	{
		 $date=date("Y-m-d"); 
	 	$cutrrent_time=date("h:i:s A");
		$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadModel('pos_kot');
		
		if(isset($this->request->data['form_submit']))
		{	
			$outlet_name=$this->data["outlet_name"];
			$session=$this->data["session"];	
			$table_no=@(int)$this->data["table_no"];
			$guest_name=$this->data["guest_name"];	
			$covers=@$this->data["covers"];	
			$steward=@(int)$this->data["steward"];
			$card_no=$this->data["card_no"];
			$roomno_id=$this->data["room_no"];
			$remarks=@$this->data["remarks"];	
			$room_service=@$this->data["room_service"];	
			$master_itemcategory_id=@(int)$this->data["master_itemcategory_id"];
			$club_member_id=@(int)$this->data["club_member_id"];
			$table_no_id=@$this->data["table_no_id"];
			
			
			$user_id=@(int)$this->data["user_id"];
			if($user_id==0 || $user_id=='')
			{
				$pos_user_id='1';
			}else{
			$pos_user_id=$user_id;
			}
				$fetch_for_last_id=$this->pos_kot->find('all', array('conditions' => array('kot_type' => 1),'order'=>'id DESC','limit'=>1));
				if(sizeof($fetch_for_last_id)>0)
				{
					$fetch_last_id=$fetch_for_last_id[0]['pos_kot']['billing_kot_id'];
					$fetch_billing_kot_id=$fetch_last_id+1;	
				}
				else
				{
					$fetch_billing_kot_id=1;
				}
			//$last_record_id=$this->pos_kot->getLastInsertID();///////////////////// Last InsertId
			$update_record=$this->pos_kot->find('all', array('fields' => array('master_tables_id', 'id'),'conditions'=>array('status' => 0, 'master_tables_id' =>$table_no)));
			if(!empty($update_record)){
			@$tr=$update_record[0]['pos_kot']['master_tables_id'];
			@$update_id=$update_record[0]['pos_kot']['id'];
			
			$this->pos_kot->updateAll(array("master_tables_id"=>"'$table_no'"), array('id' => $update_id));
			$last_record_id=$update_id;
			}
			else
			{
			$this->pos_kot->saveAll(array("master_outlets_id"=>$outlet_name,"user_id"=>$pos_user_id,"session"=>$session,"club_member_id"=>$club_member_id,"date"=>$date,"master_tables_id"=>@$table_no,"guest_name"=>$guest_name,"covers"=>$covers, "master_roomnos_id"=>$roomno_id, "card_no"=>$card_no,"master_stewards_id"=>@$steward,"remarks"=>$remarks,"kot_type"=>1,"billing_kot_id"=>$fetch_billing_kot_id,'time'=>$cutrrent_time, "room_service"=>$room_service, "master_itemcategory_id"=>$master_itemcategory_id));		
			$last_record_id=$this->pos_kot->getLastInsertID();     
			}
			$this->loadmodel('pos_kot_item_temp');
			$this->loadmodel('pos_kot_item');
			$conditions=array('user_id' => $user_id=$this->Session->read('user_id'),'kot_type'=>1);
			$fetch_pos_kot_item_temp=$this->pos_kot_item_temp->find('all',(array('conditions'=>$conditions)));
					
				foreach($fetch_pos_kot_item_temp as $temp_data_foreach)
			    {
				foreach($temp_data_foreach as $view)
				{
				$this->loadmodel('pos_kot_item');
				$this->pos_kot_item->saveAll(array("pos_kots_id"=>$last_record_id,"master_items_id"=>$view['master_items_id'],"quantity"=>$view['quantity'],"rate"=>$view['rate'],"amount"=>$view['amount'],"gross"=>$view['gross'],"taxes"=>$view['taxes'], "item_category_id"=>$view['item_category_id']));
				$this->pos_kot_item_temp->delete(array('id' => $view['id']));
				}
				}
			?>
             <script>
			 window.open("bill_kot_print?kot_id=<?php echo $last_record_id; ?>",'_blank');
			 </script>
             <?php
			 echo "<meta http-equiv='Refresh' content='0 ;URL=billing_kot'>";
			  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=billing_kot?active=1">';
}
		
		if(isset($this->request->data['bill_settle']))
		{	
			$outlet_name=$this->data["outlet_name"];
			$session=$this->data["session"];	
			$table_no=@(int)$this->data["table_no"];	
			$guest_name=$this->data["guest_name"];	
			$covers=@$this->data["covers"];	
			$steward=@(int)$this->data["steward"];
			$card_no=$this->data["card_no"];
			$roomno_id=$this->data["room_no"];
			$remarks=@$this->data["remarks"];	
			$room_service=@$this->data["room_service"];	
			$master_itemcategory_id=@(int)$this->data["master_itemcategory_id"];
			$club_member_id=@(int)$this->data["club_member_id"];
			$table_no_id=@$this->data["table_no_id"];
			$user_id=@(int)$this->data["user_id"];
			if($user_id==0 || $user_id=='')
			{
				$pos_user_id='1';
			}else{
			$pos_user_id=$user_id;
			}
				$fetch_for_last_id=$this->pos_kot->find('all', array('conditions' => array('kot_type' => 1),'order'=>'id DESC','limit'=>1));
				if(sizeof($fetch_for_last_id)>0)
				{
					$fetch_last_id=$fetch_for_last_id[0]['pos_kot']['billing_kot_id'];
					$fetch_billing_kot_id=$fetch_last_id+1;	
				}
				else
				{
					$fetch_billing_kot_id=1;
				}
			$update_record=$this->pos_kot->find('all', array('fields' => array('master_tables_id', 'id'),'conditions'=>array('status' => 0, 'master_tables_id' =>$table_no)));
			if(!empty($update_record)){
			@$tr=$update_record[0]['pos_kot']['master_tables_id'];
			@$update_id=$update_record[0]['pos_kot']['id'];
			
			$this->pos_kot->updateAll(array("master_tables_id"=>"'$table_no'"), array('id' => $update_id));
			$last_record_id=$update_id;
			}
			else
			{
			$this->pos_kot->saveAll(array("master_outlets_id"=>$outlet_name,'user_id'=>$pos_user_id,"session"=>$session,"club_member_id"=>$club_member_id,"current_date"=>$date,"master_tables_id"=>@$table_no,"guest_name"=>$guest_name,"covers"=>$covers, "master_roomnos_id"=>$roomno_id, "card_no"=>$card_no,"master_stewards_id"=>@$steward,"remarks"=>$remarks,"kot_type"=>1,"billing_kot_id"=>$fetch_billing_kot_id,'time'=>$cutrrent_time, "room_service"=>$room_service, "master_itemcategory_id"=>$master_itemcategory_id));		
			$last_record_id=$this->pos_kot->getLastInsertID();     
			}
			$this->loadmodel('pos_kot_item_temp');
			$this->loadmodel('pos_kot_item');
			$conditions=array('user_id' => $user_id=$this->Session->read('user_id'),'kot_type'=>1);
			$fetch_pos_kot_item_temp=$this->pos_kot_item_temp->find('all',(array('conditions'=>$conditions)));
					
				foreach($fetch_pos_kot_item_temp as $temp_data_foreach)
			    {
				foreach($temp_data_foreach as $view)
				{
				$this->loadmodel('pos_kot_item');
				$this->pos_kot_item->saveAll(array("pos_kots_id"=>$last_record_id,"master_items_id"=>$view['master_items_id'],"quantity"=>$view['quantity'],"rate"=>$view['rate'],"amount"=>$view['amount'],"gross"=>$view['gross'],"taxes"=>$view['taxes'], "item_category_id"=>$view['item_category_id']));
				$this->pos_kot_item_temp->delete(array('id' => $view['id']));
				}
				}
			?>
             <script>
			 window.open("bill_kot_print?kot_id=<?php echo $last_record_id; ?>",'_blank');
			 </script>
             <?php
			echo "<meta http-equiv='Refresh' content='0;URL=bill_settleing?kot_id=".$last_record_id."'>";
	}
		$this->loadmodel('master_item_type');
		$this->set('fetch_master_item_type', $this->master_item_type->find('all',array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_table');
		$this->set('fetch_master_table', $this->master_table->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('company_registration');
		$this->set('fetch_company_registration', $this->company_registration->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_roomno');
		$this->set('fatch_master_roomno', $this->master_roomno->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_steward');
		$this->set('fatch_master_steward', $this->master_steward->find('all' ,array('conditions'=>array('flag' => 0))));
		$this->loadmodel('master_item');
		$this->set('fatch_master_items', $this->master_item->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('plan_item_category');
		$this->set('fetch_plan_item_category', $this->plan_item_category->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->set('fatch_billing_kot_data', $this->pos_kot->find('all',array('conditions'=>array('kot_type'=>1 , 'flag' => 0 ))));
		$this->set('feetch_billing_kot_data', $this->pos_kot->find('all',array('conditions'=>array('flag' => 0, 'status'=>0))));
		$this->set('feeetch_billing_kot_data', $this->pos_kot->find('all',array('conditions'=>array('flag' => 0, 'status'=>0, 'status1' => 1))));
		$this->loadmodel('master_item_categorie');
		$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
		$this->loadmodel('registration');
		$this->set('fetch_registration', $this->registration->find('all'));
		$this->loadmodel('pos_kot_item');
		$this->set('fetch_pos_kot_item', $this->pos_kot_item->find('all'));
		
	}
	///////////////////////////////////////
	  function table_transfer()
	{
		$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadModel('pos_kot');
	  if(isset($this->request->data['add_transfer_table']))
		{	
			$outlet_name=$this->data["outlet_name"];
            $table_no=@(int)$this->data["table_no"];	
			$table_no_id=@$this->data["table_no_id"];
			$extra_bed=@$this->data["extra_bed"];
			$extra_bed_charge=@$this->data["extra_bed_charge"];
			$master_roomno_id=@$this->data["master_roomno_id"];
			
				$this->loadmodel('pos_kot');
				@$mt=$this->pos_kot->find('all', array('fields' => array('master_tables_id'),'conditions'=>array('flag' => 0, 'status' => 0, 'master_tables_id' =>$table_no)));
				@$mt1=$mt[0]['pos_kot']['master_tables_id'];
				if(empty($mt1))
				{
				 $this->set('error','No Table is Running Right Now, You Can Not Change');
				}
				else{
			    $this->pos_kot->updateAll(array("master_tables_id"=>"'$table_no_id'"), array('master_tables_id' => $table_no));
				$this->redirect(array('action' => 'table_transfer'));
				}
				/*$this->loadmodel('room_checkin_checkout');
				$extra=$this->room_checkin_checkout->find('all', array('fields' => array('master_roomno_id'),'conditions'=>array('flag' => 0, 'status' => 0, 'id' =>$master_roomno_id)));
				
				$extra1=$extra[0]['room_checkin_checkout']['master_roomno_id'];	
		    	$this->room_checkin_checkout->updateAll(array("extra_bed"=>"'$extra_bed'","extra_bed_charge"=>"'$extra_bed_charge'"), array('master_roomno_id' => $extra1));*/
				$this->redirect(array('action' => 'table_transfer'));
				
		}
	    $this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_table');
		$this->set('fetch_master_table', $this->master_table->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('pos_kot');
		$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
	}
	//////////////////////////////
	function laundry()
	{
		//$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadModel('pos_kot');
	  if(isset($this->request->data['add_transfer_table']))
		{	
			$outlet_name=$this->data["outlet_name"];
            $table_no=@(int)$this->data["table_no"];	
			$table_no_id=@$this->data["table_no_id"];
			$extra_bed=@$this->data["extra_bed"];
			$extra_bed_charge=@$this->data["extra_bed_charge"];
			$master_roomno_id=@$this->data["master_roomno_id"];
				$this->loadmodel('room_checkin_checkout');
				$extra=$this->room_checkin_checkout->find('all', array('fields' => array('master_roomno_id'),'conditions'=>array('flag' => 0, 'status' => 0, 'id' =>$master_roomno_id)));
				
				$extra1=$extra[0]['room_checkin_checkout']['master_roomno_id'];	
		    	$this->room_checkin_checkout->updateAll(array("extra_bed"=>"'$extra_bed'","extra_bed_charge"=>"'$extra_bed_charge'"), array('master_roomno_id' => $extra1));
				$this->redirect(array('action' => 'laundry'));
		}
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
	}
	/////////////////////////
	function bill_kot_print()
	{
		$this->layout='ajax_layout';
		$last_record_id = $this->request->query('kot_id');
		
		$this->loadModel('pos_kot');
		$conditions=array('id' => $last_record_id );
		$this->set('fetch_data',$this->pos_kot->find('all',(array('conditions'=>$conditions))));
		
		$this->loadModel('pos_kot_item');		
		$conditions=array('pos_kots_id' => $last_record_id , 'bill_flag' => 0 );
		$this->set('fetch_item_all',$this->pos_kot_item->find('all',(array('conditions'=>$conditions))));
		$this->pos_kot_item->updateAll(array('bill_flag'=> 1 ), array('pos_kots_id' => $last_record_id));     
		
		
		$this->loadModel('address');
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
	}
	
	////////////////////////////
	function billing_kot_2_print()
	{
		$this->layout='ajax_layout';
		$last_record_id = $this->request->query('kot_id');
		
		$this->loadModel('pos_kot');
		$conditions=array('id' => $last_record_id );
		$this->set('fetch_data',$this->pos_kot->find('all',(array('conditions'=>$conditions))));
		
		$this->loadModel('pos_kot_item');		
		$conditions=array('pos_kots_id' => $last_record_id);
		$this->set('fetch_data_item',$this->pos_kot_item->find('all',(array('conditions'=>$conditions))));
		
		$this->loadModel('address');
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
	}
	////////////////////////////
	function bill_settleing_print()
	{
		$this->layout='ajax_layout';
		$last_record_id = $this->request->query('kot_id');
		
		$this->loadModel('pos_kot');
		$conditions=array('id' => $last_record_id );
		$this->set('fetch_data',$this->pos_kot->find('all',(array('conditions'=>$conditions))));
		
		//$this->loadModel('pos_kot_item');		
		//$conditions=array('pos_kots_id' => $last_record_id);
		//$this->set('fetch_data_item',$this->pos_kot_item->find('all',(array('conditions'=>$conditions))));
		//$this->pos_kot_item->updateAll(array('bill_flag'=> 1 ), array('pos_kots_id' => $last_record_id));  
			    
				$this->loadmodel('pos_kot_item');
				$this->set('fetch_item_all',$this->pos_kot_item->find('all',array('conditions'=>array('pos_kots_id'=>$last_record_id))));
				$this->loadModel('address');
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
	}
	////////////////////////////
	function plan_bill_print()
	{
		$this->layout='ajax_layout';
		$last_record_id = $this->request->query('kot_id');
		
		$this->loadModel('pos_kot');
		$conditions=array('id' => $last_record_id);
		$this->set('fetch_data',$this->pos_kot->find('all',(array('conditions'=>$conditions))));
		$fetch_pos_no1=$this->pos_kot->find('all',array('conditions'=>$conditions));
				$this->loadmodel('master_item');
		$this->loadmodel('master_item_type');
		$this->set('fetch_master_item', $this->master_item->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions'=>array('flag' => "0"))));
					
					//$plan_itm=$fetch_pos_no1[0]['pos_kot']['plan_item'];
			$this->loadmodel('plan_item_category');
				$this->set('fetch_plan_item_category', $this->plan_item_category->find('all', array('conditions' => array('flag' => "0"))));
					
		
	
	     $this->loadModel('master_item');
		$conditions=array('id' => $last_record_id);
	  $this->set('fetch_data1',$this->master_item->find('all',(array('conditions'=>$conditions))));

		//$this->loadModel('pos_kot_item');		
		//$conditions=array('pos_kots_id' => $last_record_id);
		//$this->set('fetch_data_item',$this->pos_kot_item->find('all',(array('conditions'=>$conditions))));
		//$this->pos_kot_item->updateAll(array('bill_flag'=> 1 ), array('pos_kots_id' => $last_record_id));     
		$this->loadModel('address');
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
	}
	////////////////////////////
	
	
	function edit_billing_kot()
	{
		$id=$this->request->query('id');
		$this->loadModel('pos_kot');
		$this->set('fatch_billing_kot_data', $this->pos_kot->find('all',array('conditions'=>array('kot_type'=>1 , 'flag' => 0, 'id' => $id ))));

		 $date=date("Y-m-d"); 
	 	$cutrrent_time=date("h:i:s A");
		$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadModel('pos_kot');
		if(isset($this->request->data['edit_form_submit']))
		{	
			$outlet_name=$this->data["outlet_name"];
			$session=$this->data["session"];	
			//$date=$this->data["date"];	
			$table_no=@(int)$this->data["table_no"];	
			//$room_no=$this->data["room_no"];	
			$guest_name=$this->data["guest_name"];	
			$covers=@$this->data["covers"];	
			$steward=@(int)$this->data["steward"];
			$card_no=@(int)$this->data["card_no"];
			$roomno_id=@(int)$this->data["room_no"];
			$remarks=@$this->data["remarks"];	
			$club_member_id=@(int)$this->data["club_member_id"];
			
		/*		$fetch_for_last_id=$this->pos_kot->find('all', array('conditions' => array('kot_type' => 1),'order'=>'id DESC','limit'=>1));
				pr($fetch_for_last_id);
				
				if(sizeof($fetch_for_last_id)>0)
				{
					$fetch_last_id=$fetch_for_last_id[0]['pos_kot']['billing_kot_id'];
					$fetch_billing_kot_id=$fetch_last_id+1;	
				}
				else
				{
					$fetch_billing_kot_id=1;
				}
			*/
			//$last_record_id=$this->pos_kot->getLastInsertID();///////////////////// Last InsertId
			$this->pos_kot->updateAll(array("master_outlets_id"=>"'$outlet_name'","session"=>"'$session'","club_member_id"=>"'$club_member_id'","current_date"=>"'$date'","master_tables_id"=>"'$table_no'","guest_name"=>"'$guest_name'","covers"=>"'$covers'", "master_roomnos_id"=>"'$roomno_id'", "card_no"=>"'$card_no'","master_stewards_id"=>"'$steward'","remarks"=>"'$remarks'",'time'=>"'$cutrrent_time'"), array('id' => $id));     
			// $last_record_id=$this->pos_kot->getLastInsertID();
			 
			$this->loadmodel('pos_kot_item_temp');
			$this->loadmodel('pos_kot_item');
			$conditions=array('user_id' => $this->Session->read('user_id'),'kot_type'=>1);
			$fetch_pos_kot_item_temp=$this->pos_kot_item_temp->find('all',(array('conditions'=>$conditions)));
			foreach($fetch_pos_kot_item_temp as $temp_data_foreach)
			{
				foreach($temp_data_foreach as $view)
				{
				$this->loadmodel('pos_kot_item');	
				$this->pos_kot_item->saveAll(array("pos_kots_id"=>$id,"master_items_id"=>$view['master_items_id'],"quantity"=>$view['quantity'],"rate"=>$view['rate'],"amount"=>$view['amount'],"gross"=>$view['gross'],"taxes"=>$view['taxes']));
				$this->pos_kot_item_temp->delete(array('id' => $view['id']));	
				} 
			}
			 ?>
             <script>
			 window.open("bill_kot_print?kot_id=<?php echo $id; ?>",'_newtab');
			 </script>
             <?php
			  echo "<meta http-equiv='Refresh' content='0 ;URL=billing_kot'>";
			  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=billing_kot?active=1">';
		
	}
		///////////////////////////////
		
		$this->loadmodel('master_item_type');
		$this->set('fetch_master_item_type', $this->master_item_type->find('all',array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('pos_kot_item');
		$this->set('fetch_pos_kot_item', $this->pos_kot_item->find('all',array('conditions'=>array())));
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all' ,array('conditions'=>array('flag' => 0 ))));
		//$this->loadmodel('master_room_plan');
		//$this->set('fetch_room_plan', $this->master_room_plan->find('all'));
		$this->loadmodel('master_table');
		$this->set('fatch_master_table', $this->master_table->find('all' ,array('conditions'=>array('flag' => 0 ))));
		//$this->loadmodel('master_room_type');
		//$this->set('fatch_master_room_type', $this->master_room_type->find('all'));
		$this->loadmodel('master_roomno');
		$this->set('fatch_master_roomno', $this->master_roomno->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_steward');
		$this->set('fatch_master_steward', $this->master_steward->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_item');
		$this->set('fatch_master_items', $this->master_item->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_item_categorie');
		$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
		$this->loadmodel('registration');
		$this->set('fetch_registration', $this->registration->find('all'));
		$this->loadmodel('plan_item_category');
		$this->set('fetch_plan_item_category', $this->plan_item_category->find('all' ,array('conditions'=>array('flag' => 0 ))));
	}

	////////////////////////
	 function plan_kot()
	{	
		$date=date("Y-m-d"); 
		$cutrrent_time=date("h:i:s A");
		$this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadModel('pos_kot');
		if($this->request->is('post')) {
			
			@$att_id1=$this->request->data["plan_item"];
              @$multiple_att_id1= implode(",",$att_id1);
			
			$outlet_name=$this->data["outlet_name"];
			$session=$this->data["session"];	
			//$date=$this->data["date"];	
			$table_no=@(int)$this->data["table_no"];	
			$roomno_id=@(int)$this->data["roomno_id"];
			$card_no=@$this->data["card_no"];	
			$guest_name=$this->data["guest_name"];	
			$covers=@$this->data["covers"];	
			$steward=@(int)$this->data["steward"];
			//$plan_id=$this->data["plan_id"];	
			$remarks=@$this->data["remarks"];
			$room_service=@$this->data["room_service"];
			$plan_rate=@$this->data["plan_rate"];
			$club_member_id=@(int)$this->data["club_member_id"];
			$plan_combo=@$this->data["plan_combo"];
			$master_room_plans_id=@(int)$this->data["master_room_plans_id"];
			$plan_item=@$multiple_att_id1;
			
			$user_id=@(int)$this->data["user_id"];
			if($user_id==0 || $user_id=='')
			{
				$pos_user_id='1';
			}else{
			$pos_user_id=$user_id;
			}
			
			
		
			
		//	$room_type_id=$this->data["room_type_id"];
				
				$fetch_for_last_id=$this->pos_kot->find('all', array('conditions' => array('kot_type' => 3),'order'=>'id DESC','limit'=>1));
				if(sizeof($fetch_for_last_id)>0)
				{
					$fetch_last_id=$fetch_for_last_id[0]['pos_kot']['plan_kot_id'];
					$fetch_billing_kot_id=$fetch_last_id+1;	
				}
				else
				{
					$fetch_billing_kot_id=1;
				}
				
			$this->pos_kot->saveAll(array("master_outlets_id"=>$outlet_name,"user_id"=>$pos_user_id,"session"=>$session,"date"=>$date,"master_tables_id"=>$table_no,"master_roomnos_id"=>$roomno_id,"card_no"=>$card_no,"guest_name"=>$guest_name,"covers"=>$covers,"master_stewards_id"=>$steward,"remarks"=>$remarks,"kot_type"=>3,"plan_kot_id"=>$fetch_billing_kot_id,'time'=>$cutrrent_time, "club_member_id"=>$club_member_id, "master_room_plans_id"=>$master_room_plans_id, "plan_item"=>@$plan_item, "room_service"=>$room_service, "plan_rate"=>$plan_rate));
			
			 $last_record_id=$this->pos_kot->getLastInsertID();
			
			$this->loadmodel('pos_kot_item_temp');
			$this->loadmodel('pos_kot_item');
			$conditions=array('user_id' => $user_id=$this->Session->read('user_id'),'kot_type'=>3);
			$fetch_pos_kot_item_temp=$this->pos_kot_item_temp->find('all',(array('conditions'=>$conditions)));
			foreach($fetch_pos_kot_item_temp as $temp_data_foreach)
			{
				foreach($temp_data_foreach as $view)
				{
				$this->loadmodel('pos_kot_item');	
				$this->pos_kot_item->saveAll(array("pos_kots_id"=>$last_record_id,"master_items_id"=>$view['master_items_id'],"master_itemss_id"=>$view['master_itemss_id'],"quantity"=>$view['quantity'],"rate"=>$view['rate'],"amount"=>$view['amount'],"gross"=>$view['gross'],"taxes"=>$view['taxes']));
				$this->pos_kot_item_temp->delete(array('id' => $view['id']));	
				}
			}
			?>
             <script>
			 window.open("plan_bill_print?kot_id=<?php echo $last_record_id; ?>",'_blank');
			 </script>
             <?php
			  echo "<meta http-equiv='Refresh' content='0 ;URL=plan_kot'>";
			  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=plan_kot?active=1">';
		}
		$this->loadmodel('company_registration');
		$this->set('fetch_company_registration', $this->company_registration->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_item_categorie');
		$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
		$this->loadmodel('master_item_type');
		$this->set('fetch_master_item_type', $this->master_item_type->find('all'));
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all'));
		$this->loadmodel('master_room_plan');
		$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag'=>0))));
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0', 'plan_id !='=>0))));
		$this->loadmodel('master_table');
		$this->set('fatch_master_table', $this->master_table->find('all'));
		$this->loadmodel('master_roomno');
		$this->set('fatch_master_roomno', $this->master_roomno->find('all'));
		$this->loadmodel('master_steward');
		$this->set('fatch_master_steward', $this->master_steward->find('all'));
		$this->loadmodel('master_item');
		$this->set('fatch_master_items', $this->master_item->find('all'));
		$this->set('fatch_plan_kot_data', $this->pos_kot->find('all',array('conditions'=>array('kot_type'=>3))));
		$this->set('faatch_plan_kot_data', $this->pos_kot->find('all',array('conditions'=>array('flag'=>0, 'status'=>0))));
		$this->set('faaatch_plan_kot_data', $this->pos_kot->find('all',array('conditions'=>array('flag'=>0, 'status'=>0, 'status1'=>1))));
		$this->loadmodel('plan_item');
		$this->set('fetch_plan_item', $this->plan_item->find('all'));
		$this->loadmodel('plan_item_category');
		$this->set('fetch_plan_item_category', $this->plan_item_category->find('all'));
		$this->loadmodel('registration');
		$this->set('fetch_registration', $this->registration->find('all'));
		
	}
	//////
	function nc_kot() 
	{
		$date=date("Y-m-d"); 
		$cutrrent_time=date("h:i:s A");
	    $this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadModel('pos_kot');
		if($this->request->is('post')) {
			
			$outlet_name=$this->data["outlet_name"];
			$session=$this->data["session"];	
			$club_member_id=@(int)$this->data["club_member_id"];	
			$table_no=@(int)$this->data["table_no"];	
			$room_no=@(int)$this->data["room_no"];	
			$guest_name=$this->data["guest_name"];	
			$covers=@$this->data["covers"];	
			$steward=@(int)$this->data["steward"];
			$plan_id=@(int)$this->data["plan_id"];	
			$remarks=$this->data["remarks"];	
			$room_type_id=@(int)$this->data["room_type_id"];
			$card_no=@$this->data["card_no"];
			$master_itemcategory_id=@(int)$this->data["master_itemcategory_id"];
				$user_id=@(int)$this->data["user_id"];
			if($user_id==0 || $user_id=='')
			{
				$pos_user_id='1';
			}else{
			$pos_user_id=$user_id;
			}
				
				$fetch_for_last_id=$this->pos_kot->find('all', array('conditions' => array('kot_type' => 2),'order'=>'id DESC','limit'=>1));
				if(sizeof($fetch_for_last_id)>0)
				{
					$fetch_last_id=$fetch_for_last_id[0]['pos_kot']['nc_kot_it'];
					$fetch_billing_kot_id=$fetch_last_id+1;	
				}
				else
				{
					$fetch_billing_kot_id=1;
				}
				
				$update_record=$this->pos_kot->find('all', array('fields' => array('master_tables_id', 'id'),'conditions'=>array('status' => 0, 'master_tables_id' =>$table_no)));
			if(!empty($update_record)){
			@$tr=$update_record[0]['pos_kot']['master_tables_id'];
			@$update_id=$update_record[0]['pos_kot']['id'];
			
			$this->pos_kot->updateAll(array("master_tables_id"=>"'$table_no'"), array('id' => $update_id));
			$last_record_id=$update_id;
			}
			else
			{
			$this->pos_kot->saveAll(array("master_outlets_id"=>$outlet_name,"user_id"=>$pos_user_id,"session"=>$session,"club_member_id"=>$club_member_id,"date"=>$date,"master_tables_id"=>$table_no,"master_roomnos_id"=>$room_no,"guest_name"=>$guest_name,"covers"=>$covers,"master_stewards_id"=>$steward,"master_room_plans_id"=>$plan_id,"remarks"=>$remarks,"master_room_types_id"=>$room_type_id,"kot_type"=>2,"nc_kot_it"=>$fetch_billing_kot_id,'time'=>$cutrrent_time, 'card_no'=> $card_no, 'master_itemcategory_id'=>$master_itemcategory_id));
			
			 $last_record_id=$this->pos_kot->getLastInsertID();
			}
			$this->loadmodel('pos_kot_item_temp');
			$this->loadmodel('pos_kot_item');
			$conditions=array('user_id' => $user_id=$this->Session->read('user_id'),'kot_type'=>2);
			$fetch_pos_kot_item_temp=$this->pos_kot_item_temp->find('all',(array('conditions'=>$conditions)));
			foreach($fetch_pos_kot_item_temp as $temp_data_foreach)
			{
				foreach($temp_data_foreach as $view)
				{
				$this->loadmodel('pos_kot_item');	
				$this->pos_kot_item->saveAll(array("pos_kots_id"=>$last_record_id,"master_items_id"=>$view['master_items_id'],"quantity"=>$view['quantity'],"rate"=>$view['rate'],"amount"=>$view['amount'],"gross"=>$view['gross'],"taxes"=>$view['taxes'],"item_category_id"=>$view['item_category_id']));
				$this->pos_kot_item_temp->delete(array('id' => $view['id']));	
				}
			}
			?>
             <script>
			 window.open("bill_kot_print?kot_id=<?php echo $last_record_id; ?>",'_blank');
			 </script>
             <?php
			 echo "<meta http-equiv='Refresh' content='0 ;URL=nc_kot'>";
			  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=nc_kot?active=1">';
		}
		$this->loadmodel('master_item_type');
		$this->set('fetch_master_item_type', $this->master_item_type->find('all',array('conditions'=>array('flag'=>0))));
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all',array('conditions'=>array('flag'=>0))));
		$this->loadmodel('company_registration');
		$this->set('fetch_company_registration', $this->company_registration->find('all' ,array('conditions'=>array('flag' => 0 ))));
		$this->loadmodel('master_room_plan');
		$this->set('fetch_room_plan', $this->master_room_plan->find('all',array('conditions'=>array('flag'=>0))));
		$this->loadmodel('master_table');
		$this->set('fatch_master_table', $this->master_table->find('all',array('conditions'=>array('flag'=>0))));
		$this->loadmodel('master_room_type');
		$this->set('fatch_master_room_type', $this->master_room_type->find('all',array('conditions'=>array('flag'=>0))));
		$this->loadmodel('master_roomno');
		$this->set('fatch_master_roomno', $this->master_roomno->find('all',array('conditions'=>array('flag'=>0))));
		$this->loadmodel('master_steward');
		$this->set('fatch_master_steward', $this->master_steward->find('all',array('conditions'=>array('flag'=>0))));
		$this->loadmodel('master_item');
		$this->set('fatch_master_items', $this->master_item->find('all',array('conditions'=>array('flag'=>0))));
		$this->set('fatch_NC_kot_data', $this->pos_kot->find('all',array('conditions'=>array('kot_type'=>2 , 'flag'=>0))));
		$this->set('faatch_NC_kot_data', $this->pos_kot->find('all',array('conditions'=>array('flag'=>0, 'status'=>0))));
		$this->set('faaatch_NC_kot_data', $this->pos_kot->find('all',array('conditions'=>array('flag'=>0, 'status1'=>1, 'status'=>0))));
		$this->loadmodel('master_item_categorie');
		$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
		$this->loadmodel('registration');
		$this->set('fetch_registration', $this->registration->find('all'));
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
		$this->loadmodel('plan_item_category');
		$this->set('fetch_plan_item_category', $this->plan_item_category->find('all' ,array('conditions'=>array('flag' => 0 ))));
}
		//////////////////

	public function roomattribute()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		
		$this->loadmodel('master_room_attribute');
		if(isset($this->request->data["add_master_room_attribute"]))
		{
			$name=$this->request->data["name"];
				$this->loadmodel('master_room_attribute');
				@$ra=$this->master_room_attribute->find('all', array('fields' => array('name'),'conditions'=>array('flag' => 0, 'name' =>$name)));
				$ra1=$ra[0]['master_room_attribute']['name'];
				
				 if($name==$ra1)
				 {
					 $this->set('error','Data Already Exist');				
				 }
				else
				{
				
		        $this->master_room_attribute->saveAll(array('name' => $name));
				$this->redirect(array('action' => 'roomattribute'));
				}
		}
			else if(isset($this->request->data["edit_master_room_attribute"]))
			{
			$edit_name=$this->request->data["edit_name"];
			$this->master_room_attribute->updateAll(array('name' => "'$edit_name'"), array('id' => $this->request->data["roomatt_id"]));
			$this->set('active',2);
			}
				else if(isset($this->request->data["delete_master_room_attribute"]))
				{
				$this->master_room_attribute->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_roomatt_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
				}

                  $this->set('fetch_master_room_attribute', $this->master_room_attribute->find('all', array('conditions' => array('flag' => "0"))));
		
	}
		
		//////////////////////////blank.ctp//////////////
		
		
		public function blank()
	    {
			if($this->RequestHandler->isAjax())
			{
				$this->layout='ajax_layout';
			}
			else
			{
				$this->layout='index_layout';
			}
			
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$this->request->query('page').'">';
		}
		
		
		
	//////////////////////////masterroom start//////////////////////////////////////////
		public function masterroom()
	    {
			if($this->RequestHandler->isAjax())
			{
				$this->layout='ajax_layout';
			}
			else
			{
				$this->layout='index_layout';
			}
			if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
			$this->loadmodel('master_room');
			$this->loadmodel('master_room_type');	
			$this->loadmodel('master_room_plan');	
			$this->loadmodel('master_room_attribute');
			$this->loadmodel('master_tax');
			if($this->request->is('post'))
			{				
				if(isset($this->request->data["add_master_room"]))
				{	
				$master_room_type_id=$this->request->data["master_room_type_id"];
				$master_room_plan_id =$this->request->data["master_room_plan_id"];
				$this->loadmodel('master_room');
				@$cmnty=$this->master_room->find('all', array('fields' => array('master_room_type_id', 'master_room_plan_id'),'conditions'=>array('flag' => 0, 'master_room_type_id' =>$master_room_type_id, 'master_room_plan_id'=>$master_room_plan_id)));
				@$cnmpty=$cmnty[0]['master_room']['master_room_type_id'];
				@$cnmptyy=$cmnty[0]['master_room']['master_room_plan_id'];
				
				 
				 if($master_room_type_id==$cnmpty && $master_room_plan_id==$cnmptyy)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
					@$att_id=$this->request->data["attribute_id"];
					@$multiple_att_id= implode(",",$att_id);	
					@$tax_multi=$this->request->data["master_tax_id"];
				    @$master_tax_id=implode(',', $tax_multi);
					//pr($master_tax_id);
					
					$this->master_room->saveAll(array(
					'tarrif_rate' => $this->request->data["tarrif_rate"],
					'master_room_type_id' => $this->request->data["master_room_type_id"],
					'master_room_plan_id' => $this->request->data["master_room_plan_id"],
					'discount' => $this->request->data["discount"], 
					//'include_tax' => @(string)$this->request->data["include_tax"],
					'attribute_id' => @(string)$multiple_att_id,
					//'luxury_tax' => @(int)$this->request->data["luxury_tax"],
					//'tax_applicable_id' => @(string)$this->request->data["tax_applicable_id"], 
                    'master_tax_id' => @$master_tax_id));
					$this->redirect(array('action' => 'masterroom'));
				}
					//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=masterroom?active=1">';
				}
				else if(isset($this->request->data["edit_master_room"]))
				{
					@$att_id=$this->request->data["attribute_id_edit"];
					@$multiple_att_id= implode(",",$att_id);
	
				$master_room_type_id_edit=$this->request->data["master_room_type_id_edit"];
				$master_room_plan_id_edit=$this->request->data["master_room_plan_id_edit"];
				$tarrif_rate_edit=$this->request->data["tarrif_rate_edit"];
				$edit_discount=$this->request->data["edit_discount"];
				//@$edit_include_tax=$this->request->data["edit_include_tax"];
                $edit_item_tex=$this->request->data["edit_item_tex"];
				$edit_item_tex=implode(',', $edit_item_tex);
				//@$luxury_tax_edit=$this->request->data["luxury_tax_edit"];
				@$attribute_id_edit=$this->request->data["attribute_id_edit"];
				
				$this->master_room->updateAll(array( 
				'master_room_type_id' => "'$master_room_type_id_edit'",'master_room_plan_id' => "'$master_room_plan_id_edit'",'tarrif_rate' => "'$tarrif_rate_edit'",
				'master_tax_id' => "'$edit_item_tex'", 'discount' => "'$edit_discount'",
				'attribute_id' => "'$multiple_att_id'",  ), array('id' => $this->request->data["masterroom_id"]));
				$this->set('active',2);
				}
				
				else if(isset($this->request->data["delete_master_room"]))
				{
					$this->master_room->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_masterroom_id"])); 
					$this->set('active',2);
                    $this->set('active_delete',1);
				}
			}
			$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
			$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
			$this->set('fetch_master_room', $this->master_room->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
			$this->set('fetch_master_room_attribute', $this->master_room_attribute->find('all', array('conditions'=>array('flag' => "0"))));
		}
		/////////////////////////////
		
	//////////////////////////menu item start//////////////////////////////////////////
		public function menu_category_item()
	    {
			if($this->RequestHandler->isAjax())
			{
				$this->layout='ajax_layout';
			}
			else
			{
				$this->layout='index_layout';
			}
			if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
			$this->loadmodel('menu_category_item');
			$this->loadmodel('menu_category');	
			$this->loadmodel('master_item');
			$this->loadmodel('master_item_category');
			$this->loadmodel('master_item_type');	
			if($this->request->is('post'))
			{				
				if(isset($this->request->data["add_menu_item"]))
				{	
				$menu_category_idd=$this->request->data["menu_category_idd"];
				$master_itemcategory_id=@(int)$this->request->data['master_itemcategory_id'];
		        $master_item_type_id=@(int)$this->request->data['master_item_type_id'];
				
				
				$this->loadmodel('menu_category_item');
				@$mci=$this->menu_category_item->find('all', array('fields' => array('menu_category_idd','master_item_type_id' ),'conditions'=>array('flag' => 0, 'menu_category_idd' =>$menu_category_idd, 'master_item_type_id' =>$master_item_type_id)));
				 //pr($mci);
				 @$mcii=$mci[0]['menu_category_item']['menu_category_idd'];
				 @$mciii=$mci[0]['menu_category_item']['master_item_type_id'];
				 
				 if($menu_category_idd==$mcii && $master_item_type_id==$mciii)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
					@$item_name_id_cat=$this->request->data["item_name_id"];
				    @$item_name_id_menu=implode(',', $item_name_id_cat);
					
					
					$this->menu_category_item->saveAll(array(
					'menu_category_idd' => $this->request->data["menu_category_idd"],
					'master_itemcategory_id' => $this->request->data["master_itemcategory_id"],
					'master_item_type_id' => $this->request->data["master_item_type_id"],
                    'item_name_id' =>$item_name_id_menu));
					$this->redirect(array('action' => 'menu_category_item'));
				}
				}
				else if(isset($this->request->data["edit_menu_item"]))
				{
					
					$edit_master_itemcategory_id=@(int)$this->request->data['edit_master_itemcategory_id'];
		            $edit_master_item_type_id=@(int)$this->request->data['edit_master_item_type_id'];
					
					$edit_menu_category_idd=$this->request->data["edit_menu_category_idd"];
					@$ffff=$this->request->data["edit_item_name_id"];
				    @$item_name_id_menu=implode(',', $ffff);
				$this->menu_category_item->updateAll(array( 
				'menu_category_idd' => "'$edit_menu_category_idd'",
				'master_itemcategory_id' => "'$edit_master_itemcategory_id'",
				'master_item_type_id' => "'$edit_master_item_type_id'",'item_name_id' => "'$item_name_id_menu'"), array('id' => $this->request->data["menu_cat_id"]));
				$this->set('active',2);
				}
				
				else if(isset($this->request->data["delete_menu_item"]))
				{
					$this->menu_category_item->updateAll(array('flag' => 1 ),array('id' => $this->request->data["menu_cat_idd"])); 
					$this->set('active',2);
                    $this->set('active_delete',1);
				}
				
				
			}
			$this->set('fetch_menu_category', $this->menu_category->find('all', array('conditions'=>array('flag' => "0"))));
			$this->set('fetch_menu_category_item', $this->menu_category_item->find('all', array('conditions'=>array('flag' => "0"))));
			$this->set('fetch_master_item', $this->master_item->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_master_item_category', $this->master_item_category->find('all', array('conditions' => array('flag' => "0"))) );
		    $this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions'=>array('flag' => "0"))));

		}
		//////////////////////////////////
		function master_room()
		{
			if($this->RequestHandler->isAjax())
			{
				$this->layout='ajax_layout';
			}
			else
			{
				$this->layout='index_layout';
			}
			$id = $this->request->query('id');
			$this->loadModel('master_room');
			$this->set('fetch_master_room', $this->master_room->find('all', array('conditions' => array('id' => $id))));
			//$this->Setting->find('all', array('conditions' => array('type' => $type)));
			if($this->request->is('post')) 
			{
			
			
				$no_of_rooms=$this->request->data['no_of_rooms_edit'];
				$tarrif_rate=$this->request->data['tarrif_rate_edit'];
				$master_room_type_id=$this->request->data['master_room_type_id_edit'];
				$extra_bed=$this->request->data['extra_bed_edit']; 
				$attribute_id=$this->request->data['attribute_id_edit'];
				$luxury_tax=$this->request->data['luxury_tax_edit'];
				$attribute_tax=$this->request->data['attribute_tax_edit'];
				$tax_applicable_id=$this->request->data['tax_applicable_id_edit'];
	
	
				$this->master_room->updateAll(array("no_of_rooms"=>"'$no_of_rooms'","tarrif_rate"=>"'$tarrif_rate'","master_room_type_id"=>"'$master_room_type_id'","extra_bed"=>"'$extra_bed'","attribute_id"=>"'$attribute_id'","luxury_tax"=>"'$luxury_tax'","attribute_tax"=>"'$attribute_tax'","tax_applicable_id"=>"'$tax_applicable_id'"), array('id' => $id));
				return $this->redirect(array('action' => 'master_room'));
			
			}
		}
		
		///////////////////////////////
	public function functionbooking()
    {
       $this->set('outlet',$this->Session->read('outlet_id'));
       if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
        $this->loadmodel('function_booking');
        $this->loadmodel('room_reservation');
        $this->loadmodel('master_outlet');
		$this->loadmodel('gr_no');
        $this->loadmodel('master_tax');
        $this->loadmodel('master_item');
        $this->loadmodel('master_item_type');
		$this->loadmodel('master_other_service');
		   if(isset($this->request->data["add_master_item"]))
            {
             /* $this->master_items->saveAll(array('item_name' => @(string)$this->request->data["item_name"],
                'master_item_type_id' => $this->request->data["master_item_type_id"],
                'billing_rate' => @$this->request->data["billing_rate"],
                'billing_room_rate' => @(int)$this->request->data["billing_room_rate"],
                'item_cost' => @$this->request->data["billing_room_rate"]));*/
				$this->master_item->saveAll($this->request->data);				
            }
        if(isset($this->request->data["add_function_booking"]))
            {
                
				@$advance=$this->request->data["advance"];
				@$tot_amount=$this->request->data["tot_amt"];
				@$outlet_venue_id=$this->request->data["outlet_venue_id"];
				@$rate=$this->request->data["rate"];
				$fun_zero=0;
				$net_due_fun_amount=$tot_amount-$advance-$fun_zero;
				
                @$multiple_type_id= implode(",",$type_id);
				@$item_n_id=$this->request->data["item_name_id"];
                @$multiple_item_id= implode(",",$item_n_id);
               
                if(sizeof($this->request->data['other_service'])>0)
                {
                    $all_service_value = implode(",",$this->request->data['other_service']);
                }
                else
                {
                    $all_service_value ='';
                }
				@$tax_id=$this->request->data["tax_id"];
                @$multiple_tax_id= implode(",",$tax_id);
               
                $this->function_booking->saveAll(array('b_date' => date('Y-m-d', strtotime($this->request->data["b_date"])),
                'b_time' => @$this->request->data["b_time"],
                'res_no_id' => @(int)$this->request->data["res_no_id"],
                'ftp_no' => @$this->request->data["ftp_no"],
                'name' => @(string)$this->request->data["name"],
                'outlet_venue_id' => @$this->request->data["outlet_venue_id"],
                'address' => @(string)$this->request->data["address"],
                't_number' => @(string)$this->request->data["t_number"],
                'email' => @(string)$this->request->data["email"],
                'rate' => @(int)$this->request->data["rate"],
				'rate_type' => @(int)$this->request->data["rate_type"],
				//'choice_menu' => @$this->request->data["choice_menu"],
				'tot_amt' => @(int)$this->request->data["tot_amt"],
				'gross' => @(int)$this->request->data["gross"],
                'pax_amt' => @(int)$this->request->data["pax_amt"],
				'function_no' => @(int)$this->request->data["function_no"],
                'tax_id' => @(int)$multiple_tax_id,
                'per_expected' => @(int)$this->request->data["per_expected"],
                'pax' => @(int)$this->request->data["pax"],
				'totaltax' => @(int)$this->request->data["totaltax"],
                'no_of_person' => @(int)$this->request->data["no_of_person"],
                'shape' => @(string)$this->request->data["shape"],
				'advance' => @(string)$this->request->data["advance"],
                'other_service' => @(string)$all_service_value,
                'instruction' => @(string)$this->request->data["instruction"],
				'menu_category_idd' => @(int)$this->request->data["menu_category_idd"],
				'pax_r' => @(string)$this->request->data["pax_r"],
				'pax_o' => @(string)$this->request->data["pax_o"],
				'due_amount' => @(string)$net_due_fun_amount,
                'itemtype_id' => @(string)$multiple_type_id,
				'item_name_id' => @(string)$multiple_item_id));
				
				
				 $this->gr_no->updateAll(array('function_no' =>$this->request->data["function_no"]+1), array('id' => 1));
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=room_reservation?active=1">';
				
				
	/////////////////////////////////////////////////////////////////////////////////////////////////
	
				
				
				$date=date("Y-m-d"); 
				$last_record_id=$this->function_booking->getLastInsertID();																																
				$this->loadModel('function_booking');
 				$this->loadModel('ledger');
				$this->loadModel('receipt');
				$totaltax=$this->data["totaltax"];
				$advance=$this->data["advance"];
				$gross=$this->data["gross"];
				
				
				$date=date("Y-m-d");
				$current_time=date("h:i:s A");
				$this->loadModel('function_booking');
				$this->loadModel('ledger');
				$this->loadModel('ledger_master');
				$this->loadModel('ledger_cr_dr');
				$t_date=date('Y-m-d', strtotime($date));
			   
			    $fetch_transaction_id_house=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Invoice')));
                $t_id_b=$fetch_transaction_id_house+1;
				$this->ledger->saveAll(array('ledger_category_id'=>10,'user_id'=> 1,'transaction_id'=> $t_id_b,'receipt_type'=> 'Function Booking','invoice_id' => $last_record_id,'transaction_date' => $t_date,'date'=>$date,'status'=>0));
				    $last_ledger_id=$this->ledger->getLastInsertID(); 
				//
				$house_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'10','user_id' =>1)));
				$l_id=$house_m_ledger[0]['ledger_master']['id'];
				//
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'dr' => $net_due_fun_amount));
				if($advance>0){
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'dr' => $advance));	
				}
				
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'cr' => $gross));
			//////////////////////////////////////////////////
			
			
			$this->loadModel('master_outlet');
	$result_pos_kot_item=$this->master_outlet->find('all', array('conditions'=>array('id' =>$outlet_venue_id)));
			foreach($result_pos_kot_item as $data_item){
					  $master_tax_id=$data_item['master_outlet']['master_tax_id'];
					  $master_tax_id_modify= explode(',',$master_tax_id);
					   $vat_gross=0;
						foreach($master_tax_id_modify as $data_tax){
							
							$this->loadModel('master_tax');
							$result_master_tax=$this->master_tax->find('all', array('conditions'=>array('id' =>$data_tax)));
							$tax_applicable=$result_master_tax[0]['master_tax']['tax_applicable'];
							$name=$result_master_tax[0]['master_tax']['name'];
							if($name=='Service Tax'){
								
								$total_gro=$rate*$tax_applicable/100;
								$this->loadModel('ledger_cr_dr');
								$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '29','cr' => $total_gro));
				
								
								 $vat_gross=$rate+$total_gro;
								
							}
							if($name=='VAT'){
								if(!empty($vat_gross)){
									$vat_actual=$vat_gross;
								}else{
									$vat_actual=$rate;
								}
								
								 $total_vat=$vat_actual*$tax_applicable/100;
								 $this->loadModel('ledger_cr_dr');
								 $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '39','cr' => $total_vat));
								
							}
						
				}
				
			}



			
/////////end code//////////		
			
		
			
			
			
				

				$this->set('active',1);
            }
            else if(isset($this->request->data["delete_function_booking_id"]))
            {
                $this->function_booking->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_booking_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);					
            } 
			
				  else if(isset($this->request->data["submit"]))
			{
				$id=$this->request->data["blid"];
	            //$ftc_bill_room=$this->bill->find('all', array('conditions'=>array('bill_no_id'=> $id)));
					 ?>
             <script>
			 window.open("function_invoice?id=<?php echo $id; ?>",'_new');
			  //window.open("receipt",'_blank');
			 </script>
             <?php
				
		}
		$this->loadmodel('function_booking');
			  $this->set('fetch_function_booking', $this->function_booking->find('all', array('conditions'=>array('flag' => "0"))));
			$this->loadmodel('master_item_categorie');
			$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );		
			$this->set('fetch_function_booking', $this->function_booking->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions' => array('flag' => "0",'booking_type' => 1))));
			$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_master_item', $this->master_item->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_master_other_service', $this->master_other_service->find('all', array('conditions' => array('flag' => "0"))) );
			$this->loadmodel('menu_category');
		$this->set('fetch_menu_category', $this->menu_category->find('all',array('conditions' => array('flag' => "0"))));
		$this->loadmodel('menu_category_item');
		$this->set('fetch_menu_category_item', $this->menu_category_item->find('all',array('conditions' => array('flag' => "0"))));
		$this->loadmodel('gr_no');
		$this->set('fetch_gr_no', $this->gr_no->find('all'));
    }
	//////////////////////////checkin//////////////////////////////////////////
	public function checkin()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('room_reservation');
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('company_category');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_room');
		$this->loadmodel('fo_room_booking');
		$this->loadmodel('gr_no');
		$this->loadmodel('address');
	    if(isset($this->request->data["add_room_checkin_checkout"]))
			{
				@$combine_room_id=$this->request->data["master_roomno_id"];
				$hhcm[]=implode(',', $combine_room_id);
                   $jj=0;
                  foreach($hhcm as $fcmb)
				  {
					  $jj=$fcmb;
				  }
  				
				@$rtype_id=$this->request->data["master_roomno_id"];
				@$room_reservation_id=$this->request->data["room_reservation_id"];
				@$mobile_no=$this->request->data["mobile_no"];
				@$email_id=$this->request->data["email_id"];
				@$rtype_id1=$this->request->data["room_type_id"];
				@$rtype_id2=$this->request->data["total_room"];
				@$rtype_id25=$this->request->data["plan_id"];
				@$rtype_id26=$this->request->data["room_discount"];
				@$rtype_id27=$this->request->data["taxes"];
                @$multiple_type_id2= implode(",",$rtype_id2);
			    $multiple_type_id2_ar=explode(',',$multiple_type_id2);
			   $q=0; 
			   $s=0;
					   foreach($multiple_type_id2_ar as $data22){ 
						   for($j=0; $j<$data22; $j++){
							$one_type_room[$s][]= $rtype_id[$q]; 
							$q++; 
						   }
						   $s++;
					   }
			   
			  	 $room='';
					   foreach($one_type_room as $imp){
					   $hello = implode(',', $imp);
						$room.= $hello.'-';			
					   }
			   
			   $all_wth = explode("-",$room);
			   $all_rows=array_filter($all_wth);
			  		 $total_room_insert=0;
						foreach($rtype_id2 as $key=> $data)
						{$total_room_insert+=$data;}

				@$rtype_id3=$this->request->data["room_charge"];
				@$taxes=$this->request->data["taxes"];
				@$arrival_date=date('Y-m-d', strtotime($this->request->data["arrival_date"]));
				@$room_discount=$this->request->data["room_discount"];
                $duration=$this->request->data["duration"];
				@$rtype_id6=$this->request->data["tg"];
                @$multiple_type_id6= implode(",",$rtype_id6);
				$zz=0;
				$ins_array=0;
				$ins_array1=0;
				$ins_ary_other=0;
				for($in=1; $in<=$total_room_insert; $in++)
				{ 	 	 $ins_ary_other++;
					$check=$all_rows[$zz];
					$find_no=explode(',',$check);
					$chk=sizeof($find_no);
					$master_room_no=$rtype_id[$ins_array];
					$check=$all_rows[$zz];
					$find_no=explode(',',$check);
					$chk=sizeof($find_no);
					$room_type=$rtype_id1[$zz];
					//pr($room_type);
					$plan_type=$rtype_id25[$zz];
					$discount_type=$rtype_id26[$zz];
					$taxes_type=$rtype_id27[$zz];
					
					//pr($plan_type);
					//exit;
					$room_charge=$rtype_id3[$zz];
					$excet_tg=$duration * $room_charge; 
					
					$company_id = @(int)$this->request->data["company_id"];
					if($company_id==0 || $company_id=='')
					{
						$pos_company_id='1';
					}else{
					$pos_company_id=$company_id;
					}
							
				$this->room_checkin_checkout->saveAll(array('card_no' =>@(string)$this->request->data["card_no"], 
					'room_reservation_id' => @(int)$this->request->data["room_reservation_id"],
					'arrival_date' => @$arrival_date,
					'arrival_time' => @$this->request->data["arrival_time"],
					'company_id' => @(int)$pos_company_id,
					'guest_name' => @$this->request->data["guest_name"],
					'permanent_address' => @$this->request->data["permanent_address"],
					'mobile_no' => @$this->request->data["mobile_no"],
					'email_id' => @$this->request->data["email_id"],
					'arriving_from' => @$this->request->data["arriving_from"],
					'next_destination' => @$this->request->data["next_destination"],
					'nationality' => @$this->request->data["nationality"],
					//'plan_combo' => @$this->request->data["plan_combo"],
					'city' => @$this->request->data["city"],
					'gross_amount' => @$this->request->data["gross_amount"],
					'duration' => @$duration,
					'checkout_date' => @date('Y-m-d', strtotime($this->request->data["checkout_date"])),
					'master_roomno_id' =>@$master_room_no,
					'room_type_id' => @$room_type,
					'plan_id' => @$plan_type,
					'room_charge' => @$room_charge,
					'combine_room_id' => @$jj,
					'total_room' => 1,
					'pax' => @$this->request->data["pax"],
					'source_of_booking' => @$this->request->data["source_of_booking"],
					'room_discount' => @$discount_type,
					'taxes' => @$taxes_type,
					'tg' => @$excet_tg,
					//'extra_bed' => @$this->request->data["extra_bed"],
					//'extra_bed_tot' => @$this->request->data["extra_bed_tot"],
					'traveller_name' => @$this->request->data["traveller_name"],
					'id_proof_no' => @$this->request->data["id_proof_no"],
					'advance_taken' => @$this->request->data["advance_taken"],
					'child' => @$this->request->data["child"],
					'id_proof' => @(string)$this->request->data["id_proof"],
					'billing_instruction' => @$this->request->data["billing_instruction"],
					'apply_special_rates' => @(int)$this->request->data["apply_special_rates"]));
			$ins_array++;
			$ins_array1++;
			if($ins_array1==$chk){ $zz++;  $ins_array1=0;}
				
				}
				
				$this->gr_no->updateAll(array('card_no' =>$this->request->data["card_no"]+1), array('id' => 1));
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=checkin?active=1">';
				
				$this->room_reservation->updateAll(array('status' =>1), array('id' => $room_reservation_id));

				$room_reservation_id=$this->request->data['room_reservation_id'];
				$arrival_date=date('Y-m-d', strtotime($this->request->data['arrival_date']));
				@$company_id=$this->request->data['company_id']; 
				$guest_name=$this->request->data['guest_name']; 
				$nationality=$this->request->data['nationality'];
				$checkout_date=date('Y-m-d', strtotime($this->request->data['checkout_date']));
				//$plan_id=$this->request->data['plan_id'];
				$source_of_booking=$this->request->data['source_of_booking'];
				$advance_taken=$this->request->data['advance_taken'];
				$traveller_name=$this->request->data['traveller_name'];
				$id_proof_no=$this->request->data['id_proof_no'];
             	$billing_instruction=$this->request->data['billing_instruction'];
				$this->room_reservation->updateAll(array('arrival_date' => "'$arrival_date'",'company_id' => "'@$company_id'",'name_person' => "'$guest_name'",'nationality' => "'$nationality'",'departure_date' => "'$checkout_date'",'plan_id' => "'$plan_type'",'rate_per_night' => "'$room_charge'",'source_of_booking' => "'$source_of_booking'",'advance' => "'$advance_taken'",'billing_instruction' => "'$billing_instruction'", 'traveller_name' => "'$traveller_name'", 'id_proof_no' => "'$id_proof_no'"),array('id' => $room_reservation_id));
						
			    $last_record_id=$this->room_checkin_checkout->getLastInsertID();
				//$room_booking_type=$this->request->data['room_booking_type'];
				$room_reservation_id=$this->request->data['room_reservation_id'];
				$arrival_date=date('Y-m-d', strtotime($this->request->data['arrival_date']));
				@$company_id=$this->request->data['company_id']; 
				$guest_name=$this->request->data['guest_name']; 
				$nationality=$this->request->data['nationality'];
				$checkout_date=date('Y-m-d', strtotime($this->request->data['checkout_date']));
				$plan_id=@$plan_type;
				$source_of_booking=$this->request->data['source_of_booking'];
				$advance_taken=$this->request->data['advance_taken'];
             	$billing_instruction=$this->request->data['billing_instruction'];
				$arrival_time=@$this->request->data["arrival_time"];
				$traveller_name=$this->request->data['traveller_name'];
				$id_proof_no=$this->request->data['id_proof_no'];
				
				if($room_reservation_id==0){
				$this->room_reservation->saveAll
				(array('arrival_date' => $arrival_date,'company_id' => @(int)$company_id,
				'name_person' => $guest_name,'nationality' => $nationality,
				'departure_date' => $checkout_date,'plan_id' => $plan_type,'rate_per_night' => $room_charge,
				'source_of_booking' => $source_of_booking, 'advance' => $advance_taken, 
				'time' => $arrival_time,'billing_instruction' => $billing_instruction, 'traveller_name' => $traveller_name,'id_proof_no' => $id_proof_no, 'checkin_id' => $last_record_id));
				}
			}
             if(isset($this->request->data["delete_room_checkin_id"]))
			{
				$this->room_checkin_checkout->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_checkin_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);
			}			
				
			 if(isset($this->request->data["add_company_registration"]))
			{$this->loadmodel('company_registration');
                $this->company_registration->saveAll(array('company_name' => $this->request->data["company_name"],
				'company_category_id' => @(string)$this->request->data["company_category_id"],
				'pan_no' => $this->request->data["pan_no"],
				'service_tax_no' => $this->request->data["service_tax_no"],
				'authorized_person_name' => $this->request->data["authorized_person_name"],
				'authorized_contact_no' => $this->request->data["authorized_contact_no"],
				'mobile_no' => $this->request->data["mobile_no"],
                'authorized_email_id' => $this->request->data["authorized_email_id"], 
				'c_address' => $this->request->data["c_address"],
				'master_plan_id' => @(string)$this->request->data["master_plan_id"],
				'p_address' => $this->request->data["p_address"]));
				
			}
	            $this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array( 'flag' => "0"))));
                $this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0"))));				
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status' => "Confirm"))));
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_fo_room_booking', $this->fo_room_booking->find('all', array('conditions'=>array('flag' => "0"))));
				//$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
				$this->set('fetch_gr_no', $this->gr_no->find('all'));
				$this->loadmodel('registration');
		        $this->set('fetch_registration', $this->registration->find('all'));
				
				
	}
	
	//////////////////////////////////outward-inward/////////////////////
	public function inward()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
				
		$this->loadmodel('in_out_ward');
		$this->loadmodel('stock');
		$this->loadmodel('stock_category');
	    if($this->request->is('post'))
		{			
		
			if(isset($this->request->data["add_inward"]))
			{
				/*$category_name=$this->request->data["category_name"];
				$this->loadmodel('company_category');
				@$cat=$this->company_category->find('all', array('fields' => array('category_name'),'conditions'=>array('flag' => 0, 'category_name' =>$category_name)));
				$catn=$cat[0]['company_category']['category_name'];
				 if($category_name==$catn)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->company_category->saveAll(array('category_name' => $category_name));
                $this->redirect(array('action' => 'categoryname'));
				}*/
				
				
				$inward_id=0;
                $this->in_out_ward->saveAll(array('master_itemcategory_id' => $this->request->data["master_itemcategory_id"],
				'master_item_type_id' => $this->request->data["master_item_type_id"],
				'quantity' => $this->request->data["quantity"],
			    'date' => date('Y-m-d', strtotime($this->request->data["date"])),
				'remark' => $this->request->data["remark"], 'inward_id' => $inward_id));
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=inward?active=1">';
				
			}
			else if(isset($this->request->data["edit_inward"]))
			{
				$edit_inward_id=0;
			$edit_master_itemcategory_id=$this->request->data["edit_master_itemcategory_id"];
				$edit_master_item_type_id=$this->request->data["edit_master_item_type_id"];
				$edit_quantity=$this->request->data["edit_quantity"];
				$edit_date=date('Y-m-d', strtotime($this->request->data["edit_date"]));
				$edit_remark=$this->request->data["edit_remark"];
				
				$this->in_out_ward->updateAll(array('master_itemcategory_id' => "'$edit_master_itemcategory_id'",
				'master_item_type_id' => "'$edit_master_item_type_id'", 'quantity' => "'$edit_quantity'",
				'date' => "'$edit_date'",
				'remark' => "'$edit_remark'", 'inward_id' => @$edit_inward_id), array('id' => $this->request->data["in_out_ward_id"]));
				 $this->set('active',2);
			}
				
			else if(isset($this->request->data["delete_inward"]))
			{
				$this->in_out_ward->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_in_out_ward"]));
				$this->set('active',2);
				$this->set('active_delete',1);

			}
			
		}
				
		$this->set('fetch_stock_category', $this->stock_category->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_in_out_ward', $this->in_out_ward->find('all', array('conditions' => array('flag' => "0", 'inward_id' => "0"))) );
		$this->set('fetch_stock', $this->stock->find('all', array('conditions'=>array('flag' => "0"))));
		
	}
	//////////////////////////////outward//////////////////////////
	public function outward()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('in_out_ward');
		$this->loadmodel('stock');
		$this->loadmodel('stock_category');
	    if($this->request->is('post'))
		{			
		
			if(isset($this->request->data["add_outward"]))
			{
				$master_itemcategory_id=$this->request->data["master_itemcategory_id"];
				$master_item_type_id=$this->request->data["master_item_type_id"];
				@$quantity=$this->request->data["quantity"];
				$this->loadmodel('in_out_ward');
				$innn=$this->in_out_ward->find('all', array('fields' => array('quantity'),'conditions'=>array('flag' => 0, 'master_itemcategory_id' =>$master_itemcategory_id, 'master_item_type_id' => $master_item_type_id, 'inward_id' =>0)));
				$qu=$innn[0]['in_out_ward']['quantity'];
				 
				            $de=0;
							$dee=0;
							$dk=0;
							$dkk=0;
							foreach($innn as $ftc){
				            $qu=$ftc['in_out_ward']['quantity'];
							$dee=$dee+$qu;
							}
							$dee;
							//exit;
							//////////
							$outtt=$this->in_out_ward->find('all', array('fields' => array('quantity'),'conditions'=>array('flag' => 0, 'master_itemcategory_id' =>$master_itemcategory_id, 'master_item_type_id' => $master_item_type_id, 'inward_id' =>1)));
				//$qu=$outtt[0]['in_out_ward']['quantity'];
				 
				            $de=0;
							$deee=0;
							$dk=0;
							$dkk=0;
							foreach($outtt as $ftcc){
				            $qu=$ftcc['in_out_ward']['quantity'];
							$deee=$deee+$qu;
							}
							$deee;
							//exit;
							
						$tot_in_out=$dee-$deee;	
						
							
				 if($quantity>$tot_in_out)
				 {
					 $this->set('error','Data Out of Range');
				 }
				else
				{
					$inward_id=1;
                $this->in_out_ward->saveAll(array('master_itemcategory_id' => $this->request->data["master_itemcategory_id"],
				'master_item_type_id' => $this->request->data["master_item_type_id"],
				'quantity' => @$quantity,
			    'date' => date('Y-m-d', strtotime($this->request->data["date"])),
				'remark' => $this->request->data["remark"], 'inward_id' => $inward_id));
				//$this->company_category->saveAll(array('category_name' => $category_name));
                $this->redirect(array('action' => 'outward'));
				}
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=outward?active=1">';
			}
			else if(isset($this->request->data["edit_outward"]))
			{
				$edit_inward_id=1;
			$edit_master_itemcategory_id=$this->request->data["edit_master_itemcategory_id"];
				$edit_master_item_type_id=$this->request->data["edit_master_item_type_id"];
				$edit_quantity=$this->request->data["edit_quantity"];
				$edit_date=date('Y-m-d', strtotime($this->request->data["edit_date"]));
				$edit_remark=$this->request->data["edit_remark"];
				
				$this->in_out_ward->updateAll(array('master_itemcategory_id' => "'$edit_master_itemcategory_id'",
				'master_item_type_id' => "'$edit_master_item_type_id'", 'quantity' => "'$edit_quantity'",
				'date' => "'$edit_date'",
				'remark' => "'$edit_remark'", 'inward_id' => @$edit_inward_id), array('id' => $this->request->data["in_out_ward_id"]));
				 $this->set('active',2);
			}
				
			else if(isset($this->request->data["delete_outward"]))
			{
				$this->in_out_ward->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_in_out_ward"]));
				$this->set('active',2);
				$this->set('active_delete',1);

			}
			
		}
				
		$this->set('fetch_stock_category', $this->stock_category->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_in_out_ward', $this->in_out_ward->find('all', array('conditions' => array('flag' => "0", 'inward_id' => "1"))) );
		$this->set('fetch_stock', $this->stock->find('all', array('conditions'=>array('flag' => "0"))));
		$this->loadmodel('master_tax');
		$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
		
	}
	////////////////////////////////////
	public function stock()
		{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('stock');
		$this->loadmodel('master_tax');
		$this->loadmodel('stock_category');
		
		if(isset($this->request->data["add_stock"]))
			{
				$itemtype_name=$this->request->data["itemtype_name"];
				$this->loadmodel('stock');
				@$st=$this->stock->find('all', array('fields' => array('itemtype_name'),'conditions'=>array('flag' => 0, 'itemtype_name' =>$itemtype_name)));
				$st1=$st[0]['stock']['itemtype_name'];
				 if($itemtype_name==$st1)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				//$this->company_category->saveAll(array('category_name' => $category_name));
				//$type=$this->request->data["type"];
				$this->stock->saveAll(array('itemtype_name' => $itemtype_name,'master_itemcategory_id' => $this->request->data["master_itemcategory_id"], 'type' => $this->request->data["type"]));
				$this->redirect(array('action' => 'stock'));
				}
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=stock?active=1">';
			}
			else if(isset($this->request->data["edit_stock"]))
			{	
				$edit_master_itemcategory_id=$this->request->data["edit_master_itemcategory_id"];
				$edit_itemtype=$this->request->data["edit_itemtype"];
				$this->stock->updateAll(array('itemtype_name' => "'$edit_itemtype'", 'master_itemcategory_id' =>"'$edit_master_itemcategory_id'"), array('id' => $this->request->data["stock_id"]));
				$this->set('active',2);
			}
			else if(isset($this->request->data["delete_stock"]))
			{
				$this->stock->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_stock_id"]));
             $this->set('active',2);
             $this->set('active_delete',1);
			}
				$this->set('fetch_stock_category', $this->stock_category->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_stock', $this->stock->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				}
//////////////////////////////////////////////////////////////////////

public function checkin_edit()
	{ //$edit_id=$this->request->query('id');
	$id=$this->request->query('id');
	$date=date("Y-m-d");
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('company_category');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_room');
		$this->loadmodel('gr_no');
		
		if(isset($this->request->data["edit_room_checkin"]))
			{
				
				@$combine_room_id=$this->request->data["master_roomno_id"];
				$hhcm[]=implode(',', $combine_room_id);
                   $jj=0;
                  foreach($hhcm as $fcmb)
				  {
					  $jj=$fcmb;
				  }
				  
				
				
				$card_no=$this->request->data['card_no'];
				//pr($card_no); 
				$room_reservation_id=$this->request->data['room_reservation_id'];
				$arrival_date=date('Y-m-d', strtotime($this->request->data['arrival_date']));
				$arrival_time=$this->request->data['arrival_time'];
				$company_id=$this->request->data['company_id']; 
				$guest_name=$this->request->data['guest_name']; 
				$permanent_address=$this->request->data['permanent_address'];
				$arriving_from=$this->request->data['arriving_from'];
				$next_destination=$this->request->data['next_destination'];
				$nationality=$this->request->data['nationality'];
				$city=$this->request->data['city'];
				$traveller_name=$this->request->data['traveller_name'];
				$id_proof_no=$this->request->data['id_proof_no'];
				//$gross_amount=$this->request->data['gross_amount'];
				$duration=$this->request->data['duration'];
				$checkout_date=date('Y-m-d', strtotime($this->request->data['checkout_date']));
				$plan_id=$this->request->data['plan_id'];
				$pax=$this->request->data['pax'];
				$source_of_booking=$this->request->data['source_of_booking'];
				$advance_taken=$this->request->data['advance_taken'];
				$child=$this->request->data['child'];
				$id_proof=$this->request->data['id_proof'];
				@$mobile_no=$this->request->data['mobile_no'];
				@$email_id=$this->request->data['email_id'];
				$billing_instruction=$this->request->data['billing_instruction'];
				//$apply_special_rates=$this->request->data['apply_special_rates'];
				@$rtype_id=$this->request->data["master_roomno_id"];
				@$rtype_id1=$this->request->data["room_type_id"];
				@$rtype_id25=$this->request->data["plan_id"];
				@$rtype_id26=$this->request->data["room_discount"];
				@$rtype_id27=$this->request->data["taxes"];
				@$rtype_id2=$this->request->data["total_room"];
                @$multiple_type_id2= implode(",",$rtype_id2);
			    $multiple_type_id2_ar=explode(',',$multiple_type_id2);
			   $q=0; 
			   $s=0;
					   foreach($multiple_type_id2_ar as $data22){ 
						   for($j=0; $j<$data22; $j++){
							$one_type_room[$s][]= $rtype_id[$q]; 
							$q++; 
						   }
						   $s++;
					   }
			   
			  	 $room='';
					   foreach($one_type_room as $imp){
					   $hello = implode(',', $imp);
						$room.= $hello.'-';			
					   }
			   
			   $all_wth = explode("-",$room);
			   $all_rows=array_filter($all_wth);
			
			  		 $total_room_insert=0;
						foreach($rtype_id2 as $key=> $data)
						{$total_room_insert+=$data;}
					@$rtype_id3=$this->request->data["room_charge"];
					//@$taxes=$this->request->data["taxes"];
					//@$room_discount=$this->request->data["room_discount"];
					$duration=$this->request->data["duration"];
					@$rtype_id6=$this->request->data["tg"];
					@$multiple_type_id6= implode(",",$rtype_id6);
					$hidd_edit_id=$this->request->data["hidd_edit_id"];
					
					$rr=sizeof($hidd_edit_id);
					
					$zz=0;
					$ins_array=0;
					$ins_array1=0;
					$ins_ary_other=0;
					for($in=1; $in<=$total_room_insert; $in++)
					{ 	 	 $ins_ary_other++;
						
						@$edit_id=$hidd_edit_id[$ins_array];
						
					$check=$all_rows[$zz];
					$find_no=explode(',',$check);
					$chk=sizeof($find_no);
					$master_room_no=$rtype_id[$ins_array];
					//pr($master_room_no);
					$check=$all_rows[$zz];
					$find_no=explode(',',$check);
					$chk=sizeof($find_no);
					$room_type=$rtype_id1[$zz];
					$plan_type=$rtype_id25[$zz];
					//pr($plan_type);
					$discount_type=$rtype_id26[$zz];
					//pr($discount_type);
					$taxes_type=$rtype_id27[$zz];
					//pr($taxes_type);
					//exit;
					$room_charge=$rtype_id3[$zz];
					$excet_tg=$duration * $room_charge; 
					
					if(!empty($edit_id)){ //echo $edit_id;
					$this->room_checkin_checkout->updateAll(array('card_no' =>"'$card_no'",'room_reservation_id' => "'$room_reservation_id'",'arrival_date' => "'$arrival_date'",'arrival_time' => "'$arrival_time'",'company_id' => "'$company_id'",'guest_name' => "'$guest_name'",'permanent_address' => "'$permanent_address'",'mobile_no' => "'$mobile_no'",'email_id' => "'$email_id'",'arriving_from' => "'$arriving_from'",'nationality' => "'$nationality'",'city' => "'$city'",'duration' => "'$duration'",'checkout_date' => "'$checkout_date'",'master_roomno_id' =>"'$master_room_no'",'room_type_id' => "'$room_type'",'plan_id' => "'$plan_type'",'room_charge' => "'$room_charge'",'total_room' => 1 ,'pax' => "'$pax'",'source_of_booking' => "'$source_of_booking'",'taxes' => "'$taxes_type'",'room_discount' => "'$discount_type'",'tg' => "'$excet_tg'",'advance_taken' => "'$advance_taken'",'child' => "'$child'",'id_proof' => "'$id_proof'",'billing_instruction' => "'$billing_instruction'", 'traveller_name' => "'$traveller_name'",'id_proof_no' => "'$id_proof_no'", 'combine_room_id' => "'$jj'"), array('id' => $edit_id));	
					}
					
					else
					{
						$this->room_checkin_checkout->saveAll(array('card_no' =>@(string)$this->request->data["card_no"],'room_reservation_id' => @(int)$this->request->data["room_reservation_id"],'arrival_date' => $date,'arrival_time' => @$this->request->data["arrival_time"],'company_id' => @(int)$this->request->data["company_id"],'guest_name' => @$this->request->data["guest_name"],'permanent_address' => @$this->request->data["permanent_address"],'mobile_no' => @$this->request->data["mobile_no"],'email_id' => @$this->request->data["email_id"],'arriving_from' => @$this->request->data["arriving_from"],'next_destination' => @$this->request->data["next_destination"],'nationality' => @$this->request->data["nationality"],'city' => @$this->request->data["city"],'gross_amount' => @$this->request->data["gross_amount"],'duration' => @$duration,'checkout_date' => @date('Y-m-d', strtotime($this->request->data["checkout_date"])),'master_roomno_id' =>@$master_room_no,'room_type_id' => @$room_type,'plan_id' => @$plan_type,'room_charge' => @$room_charge,'total_room' => 1,'pax' => @$this->request->data["pax"],'source_of_booking' => @$this->request->data["source_of_booking"],'taxes' => @$taxes_type,'room_discount' => @$discount_type,'tg' => @$excet_tg,'advance_taken' => @$this->request->data["advance_taken"],'child' => @$this->request->data["child"],'id_proof' => @(string)$this->request->data["id_proof"],'billing_instruction' => @$this->request->data["billing_instruction"], 'traveller_name' => @(string)$this->request->data["traveller_name"], 'id_proof_no' => @(string)$this->request->data["id_proof_no"], 'combine_room_id' => "'$jj'"));
					}
						
						
			 $ins_array++;
			$ins_array1++;
			if($ins_array1==$chk){ $zz++;  $ins_array1=0;}
						  
					}
					 $ins_ary_other;

			    $room_reservation_id=$this->request->data['room_reservation_id'];
				$arrival_date=date('Y-m-d', strtotime($this->request->data['arrival_date']));
				$company_id=$this->request->data['company_id']; 
				$guest_name=$this->request->data['guest_name']; 
				$nationality=$this->request->data['nationality'];
				$checkout_date=date('Y-m-d', strtotime($this->request->data['checkout_date']));
				$plan_id=@$plan_type;
				$source_of_booking=$this->request->data['source_of_booking'];
				$advance_taken=$this->request->data['advance_taken'];
             	$billing_instruction=$this->request->data['billing_instruction'];
				$traveller_name=$this->request->data['traveller_name'];
             	$id_proof_no=$this->request->data['id_proof_no'];
				
				
$this->room_reservation->updateAll(array('arrival_date' => "'$arrival_date'",'company_id' => "'$company_id'",'name_person' => "'$guest_name'",'nationality' => "'$nationality'",'departure_date' => "'$checkout_date'",'plan_id' => "'$plan_id'",'rate_per_night' => "'$room_charge'",'source_of_booking' => "'$source_of_booking'",'advance' => "'$advance_taken'",'billing_instruction' => "'$billing_instruction'", 'traveller_name' => "'$traveller_name'", 'id_proof_no' => "'$id_proof_no'"), array('id' => $room_reservation_id));

$room_reservation_id=$this->request->data['room_reservation_id'];
$id=$this->request->data['id'];
				$arrival_date=date('Y-m-d', strtotime($this->request->data['arrival_date']));
				$company_id=$this->request->data['company_id']; 
				$guest_name=$this->request->data['guest_name']; 
				$nationality=$this->request->data['nationality'];
				$checkout_date=date('Y-m-d', strtotime($this->request->data['checkout_date']));
				$plan_id=@$plan_type;
				$source_of_booking=$this->request->data['source_of_booking'];
				$advance_taken=$this->request->data['advance_taken'];
             	$billing_instruction=$this->request->data['billing_instruction'];
				$traveller_name=$this->request->data['traveller_name'];
             	$id_proof_no=$this->request->data['id_proof_no'];
$this->room_reservation->updateAll(array('arrival_date' => "'$arrival_date'",'company_id' => "'$company_id'",'name_person' => "'$guest_name'",'nationality' => "'$nationality'",'departure_date' => "'$checkout_date'",'plan_id' => "'$plan_id'",'rate_per_night' => "'$room_charge'",'source_of_booking' => "'$source_of_booking'",'advance' => "'$advance_taken'",'billing_instruction' => "'$billing_instruction'", 'traveller_name' => "'$traveller_name'", 'id_proof_no' => "'$id_proof_no'"), array('checkin_id' => $id, 'id2'=>0));
					 
			}
			
			/*else if(isset($this->request->data["dltrow"]))
			{
				$this->room_checkin_checkout->deleteAll(array('id' => $id ),array('id' => $this->request->data["row_remove_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);
			}*/
	
		
			
	            $this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array( 'flag' => "0"))));
                $this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0",'id' =>  $id))));				
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0"))));
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				//$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_gr_no', $this->gr_no->find('all'));
	}
////////////////////////////////////////invoice Adress//////////////////////


public function invoiceaddress()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
		$this->loadmodel('invoiceadd');
		
	}
//////////////////////////receipt//////////////////////////////////////////
	public function receipt()
	{
		$date=date("Y-m-d"); 
		$cutrrent_time=date("h:i:s A");
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('pos_kot');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_reservation');
		$this->loadmodel('function_booking');
	    if(isset($this->request->data["add_receipt_checkout"]))
			{
				
				$this->receipt_checkout->saveAll(array( 
				'date_to' => $date,
				'guest_name' =>@(string)$this->request->data["guest_name"],
				'room_type_id' => @$this->request->data["room_type_id"],
				'plan_id' => @(int)$this->request->data["plan_id"],
				'card_no' => @$this->request->data["card_no"],
				'recpt_type' => @$this->request->data["recpt_type"],
				'cash' => @$this->request->data["cash"],
				'cheque_amt' => @$this->request->data["cheque_amt"],
				'bill_no_id' => @(int)$this->request->data["bill_no_id"],
				'cheque_no' => @$this->request->data["cheque_no"],
				'neft_amt' => @$this->request->data["neft_amt"],
				'neft_no' => @$this->request->data["neft_no"],
				'credit_card_amt' => @$this->request->data["credit_card_amt"],
				'credit_card_name' => @$this->request->data["credit_card_name"],
				'credit_card_no' => @$this->request->data["credit_card_no"],
				'bill' => @(string)$this->request->data["bill"],
				'flag1' => 1));
				$this->set('active',1);
				
				$bill_no_id=@$this->request->data["bill_no_id"];
				$cash=@$this->request->data["cash"];
				$cheque_amt=@$this->request->data["cheque_amt"];
				//pr($master_roomno_id);
				
				$res_no_id = @$this->request->data["res_no_id"];
				$neft_amt=@$this->request->data["neft_amt"];
				$credit_card_amt =@$this->request->data["credit_card_amt"];
				
					
				
				$cash=@$this->request->data["cash"];
				$cheque_amt=@$this->request->data["cheque_amt"];
				$neft_amt=@$this->request->data["neft_amt"];
				$credit_card_amt =@$this->request->data["credit_card_amt"];
				
				$this->loadmodel('pos_kot');
			    $conditions=array('status' => 1, 'id'=> $bill_no_id);
				$fetch_pos_nno=$this->pos_kot->find('all',array('fields' => array('bill_settle_amount'),'conditions'=>$conditions));
				@$jkjk=$fetch_pos_nno[0]['pos_kot']['bill_settle_amount'];
				if($jkjk=='')
				{
					$jkjk=0;
				}
							$deep=0;
							foreach($fetch_pos_nno as $ftc){
				$bill_settle_amout_paid=$ftc['pos_kot']['bill_settle_amount'];
							$deep=$deep+$bill_settle_amout_paid+$cash+$cheque_amt+$neft_amt+$credit_card_amt;
							}
							
				
					$tott=$cash+$cheque_amt+$neft_amt+$credit_card_amt;
					$posdue=$this->pos_kot->find('all', array('fields' => array('bill_settle_due', 'id'),'conditions'=>array('status' => 1, 'id'=> $bill_no_id)));
					@$pp=$posdue[0]['pos_kot']['bill_settle_due'];
					@$pq=$posdue[0]['pos_kot']['id'];
					$deu=$pp-$tott;
					if($bill_no_id==$pq)
					{
					$this->pos_kot->updateAll(array('bill_settle_due' => "'$deu'",'bill_settle_amount' => "'$deep'", ), array('id' => $bill_no_id));
					}
			}
			else if(isset($this->request->data["edit_receipt_checkout"]))
			{
				/*if($this->request->data['edit_cash']=='')
				{
					$edit_cash=0;
					
				}                                                                                                             
				if($this->request->data['edit_cheque_amt']=='')
				{
					$edit_cheque_amt=0;
					
				}
				if($this->request->data['edit_neft_amt']=='')
				{
					$edit_neft_amt=0;
					
				}
				if($this->request->data['edit_credit_card_amt']=='')
				{
					$edit_credit_card_amt=0;
					
				}*/				
				$edit_date_to=date('Y-m-d', strtotime(@$this->request->data["edit_date_to"]));
				$edit_guest_name=@$this->request->data["edit_guest_name"];
				$edit_master_roomno_id=@$this->request->data["edit_master_roomno_id"];
				$edit_function_no=@$this->request->data["edit_function_no"];
				$edit_room_type_id=@$this->request->data["edit_room_type_id"];
				$edit_plan_id=@$this->request->data["edit_plan_id"];
				$edit_card_no=@$this->request->data["edit_card_no"];
				$edit_billing_ins=@$this->request->data["edit_billing_ins"];
				$edit_cash=@$this->request->data["edit_cash"];
				$edit_cheque_amt=@$this->request->data["edit_cheque_amt"];
				$edit_cheque_no=@$this->request->data["edit_cheque_no"];
				$edit_neft_amt=@$this->request->data["edit_neft_amt"];
				$edit_neft_no=@$this->request->data["edit_neft_no"];
				$edit_credit_card_amt=@$this->request->data["edit_credit_card_amt"];
				$edit_credit_card_name=@$this->request->data["edit_credit_card_name"];
				$edit_credit_card_no=@$this->request->data["edit_credit_card_no"];
				$edit_bill=@$this->request->data["edit_bill"];
				
				$this->receipt_checkout->updateAll(array('date_to' => "'$edit_date_to'",
				'guest_name' => "'$edit_guest_name'",
				'master_roomno_id' => "'$edit_master_roomno_id'",
				'function_no' => "'$edit_function_no'",
				'room_type_id' => "'$edit_room_type_id'",
				'plan_id' => "'$edit_plan_id'",
				'card_no' => "'$edit_card_no'",
				'billing_ins' => "'$edit_billing_ins'",
				'cash' => "'$edit_cash'",
				'cheque_amt' => "'$edit_cheque_amt'",
				'cheque_no' => "'$edit_cheque_no'",
				'neft_amt' => "'$edit_neft_amt'",
				'neft_no' => "'$edit_neft_no'",
				'credit_card_amt' => "'$edit_credit_card_amt'",
				'billing_ins' => "'$edit_billing_ins'",
				'credit_card_name' => "'$edit_credit_card_name'",
				'credit_card_no' => "'$edit_credit_card_no'",
				'bill' => "'$edit_bill'", 'flag1' => "'$flag1'"), array('id' => $this->request->data["receipt_id"]));
				$this->set('active',2);
			}
            else if(isset($this->request->data["delete_receipt_checkout"]))
			{
				$this->receipt_checkout->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_receipt_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			}			
			  $this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => array('flag' => "0", 'flag1' => "1"))));
			  $this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => array('flag' => "0", 'flag1'=>0))));
			  $this->set('fatch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions' => array('flag' => "0", 'checkout_id' =>0))) );
			  $this->set('fetch_master_room_plan', $this->master_room_plan->find('all'));
			  $this->set('fetch_master_room_type', $this->master_room_type->find('all'));
			  $this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0",'booking_type' => 1))));
			  $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all'));
			  $this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
			  $this->set('fetch_function_booking', $this->function_booking->find('all', array('conditions'=>array('flag' => "0"))));
	}
//////////////////////////receipt//////////////////////////////////////////
	public function calendar()
	{
		$date=date("Y-m-d"); 
		$cutrrent_time=date("h:i:s A");
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_roomno');
		$this->loadmodel('bill');
		$this->loadmodel('room_reservation');
		$this->loadmodel('room_reservation_no');
			  $this->set('fetch_bill', $this->bill->find('all', array('conditions'=>array('flag' => "0" ))));
			  $this->set('fetch_room_reservation_no', $this->room_reservation_no->find('all'));
		$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=> 0))));
		$this->set('fetch_room_reservationn', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 1, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=> 0))));
	}

//////////////////////////////////	receipt  ///////////////////////////////

public function paid_receipt()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('paid_receipt');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_roomno');
		
		
		
	    if(isset($this->request->data["add_paid_receipt"]))
			{
				
				$this->paid_receipt->saveAll(array( 
				'card_no' =>@(string)$this->request->data["card_no"],
				'date_to' => date('Y-m-d', strtotime($this->request->data["date_to"])),
				'description' => @$this->request->data["description"],
				'r_type' => @(string)$this->request->data["r_type"],
				'amount' => @$this->request->data["amount"],
				'master_roomno_id' => @$this->request->data["master_roomno_id"],
				'room_type_id' => @$this->request->data["room_type_id"],
				'remark' => @$this->request->data["remark"]));
				$this->set('active',1);
			}
			
			else if(isset($this->request->data["edit_paid_receipt"]))
			{

				$edit_card_no=@$this->request->data["edit_card_no"];
				$edit_date_to=date('Y-m-d', strtotime($this->request->data["edit_date_to"]));
				$edit_description=@$this->request->data["edit_description"];
				$edit_r_type=@$this->request->data["edit_r_type"];
				$edit_amount=@$this->request->data["edit_amount"];
				
				$edit_master_roomno_id=@$this->request->data["edit_master_roomno_id"];
				$edit_room_type_id=$this->request->data["edit_room_type_id"];
				$edit_remark=$this->request->data["edit_remark"];
				
				$this->paid_receipt->updateAll(array('card_no' => "'$edit_card_no'",
				'date_to' => "'$edit_date_to'",
				'description' => "'$edit_description'",
				'r_type' => "'$edit_r_type'",
				'amount' => "'$edit_amount'",
				'master_roomno_id' => "'$edit_master_roomno_id'",
				'room_type_id' => "'$edit_room_type_id'",
				'remark' => "'$edit_remark'"), array('id' => $this->request->data["paid_receipt_id"]));
				$this->set('active',2);

			}

            else if(isset($this->request->data["delete_paid_receipt"]))
			{
				$this->paid_receipt->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_paid_receipt_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);

			}			
				$this->set('fetch_paid_receipt', $this->paid_receipt->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all'));
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
	}
//////////////////////////////////	receipt  ///////////////////////////////
public function debtor_receipt()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
	    $this->loadmodel('debtor_receipt');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_roomno');
		
		
		
	    if(isset($this->request->data["add_debtor_receipt"]))
			{
				
				$this->debtor_receipt->saveAll(array( 
				'guest_name' =>@(string)$this->request->data["guest_name"],
				'wherepaid' => @$this->request->data["wherepaid"],
				//'advancebooking' => @$this->request->data["advancebooking"],
				'recpt_type' => @(string)$this->request->data["recpt_type"],
				'recpt_no' => @$this->request->data["recpt_no"],
				'date_to' => date('Y-m-d', strtotime($this->request->data["date_to"])),
				'amount' => @$this->request->data["amount"],
				'b_name' => @$this->request->data["b_name"],
				'neft_no' => @$this->request->data["neft_no"],
				'card_name' => @$this->request->data["card_name"],
				'narration' => @$this->request->data["narration"],));
				$this->set('active',1);
			}
			
			else if(isset($this->request->data["edit_debtor_receipt"]))
			{
				$edit_guest_name=@$this->request->data["edit_guest_name"];
				$edit_wherepaid=@$this->request->data["edit_wherepaid"];
				//$edit_advancebooking=@$this->request->data["edit_advancebooking"];
				$edit_recpt_type=@$this->request->data["edit_recpt_type"];
				$edit_recpt_no=@$this->request->data["edit_recpt_no"];
				$edit_date_to=@date('Y-m-d', strtotime($this->request->data["edit_date_to"]));
				$edit_amount=$this->request->data["edit_amount"];
				$edit_b_name=@$this->request->data["edit_b_name"];
				$edit_neft_no=@$this->request->data["edit_neft_no"];
				$edit_card_name=@$this->request->data["edit_card_name"];
				$edit_narration=@$this->request->data["edit_narration"];
				
				$this->debtor_receipt->updateAll(array('guest_name' => "'$edit_guest_name'",
				'wherepaid' => "'$edit_wherepaid'",
				//'advancebooking' => "'$edit_advancebooking'",
				'recpt_type' => "'$edit_recpt_type'",
				'recpt_no' => "'$edit_recpt_no'",
				'date_to' => "'$edit_date_to'",
				'amount' => "'$edit_amount'",
				'b_name' => "'$edit_b_name'",
				'neft_no' => "'$edit_neft_no'",
				'card_name' => "'$edit_card_name'",
				'narration' => "'$edit_narration'"), array('id' => $this->request->data["debtor_receipt_id"]));
				$this->set('active',2);

			}

            else if(isset($this->request->data["delete_debtor_receipt"]))
			{
				$this->debtor_receipt->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_debtor_receipt_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);

			}			
                $this->set('fetch_debtor_receipt', $this->debtor_receipt->find('all', array('conditions' => array('flag' => "0"))) );

				 $this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				  $this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				   $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all'));
				   $this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
	}
//////////////////////////////////receipt  ///////////////////////////////
	public function checkout()
    {
		$date=date("Y-m-d");
      if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
        $this->loadmodel('room_checkin_checkout');
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('paid_receipt');
        $this->loadmodel('master_room_plan');
        $this->loadmodel('master_room_type');
        $this->loadmodel('master_roomno');
		$this->loadmodel('master_item');
		$this->loadmodel('pos_kot');
        $this->loadmodel('pos_kot_item');
		$this->loadmodel('address');
		$this->loadmodel('room_serviceing');
		$this->loadmodel('gr_no');
		$this->loadmodel('bill');
		
       
        if(isset($this->request->data["add_room_checkin_checkout"]))
        {
				$checkout_no=$this->request->data["checkout_no"];
				$mobile_no=$this->request->data["edit_mobile_no"];
				$email_id=$this->request->data["edit_email_id"];
				$this->loadmodel('room_checkin_checkout');
			  $room_checkin_checkout_flagg = $this->room_checkin_checkout->find('all', array('fields' => array('MAX(multi_flag)')));
	          $room_checkin_checkout_flag=$room_checkin_checkout_flagg[0][0]['MAX(multi_flag)']+1;
	
			  $id_chekin_ary=$this->request->data["master_roomno_id"];
              foreach($id_chekin_ary as $idc)
			 {		
				@$curry=$this->room_checkin_checkout->find('all', array('fields' => array('master_roomno_id'),'conditions'=>array('status' => 0, 'id' =>$idc)));
			    @$curry1[]=$curry[0]['room_checkin_checkout']['master_roomno_id'];
			 }
			    $curry1;
				$room_no_id=implode(',', $curry1);
			$x=0;
			$i=0;
			foreach($id_chekin_ary as $id_chekin)
			{ $i++;
			    @$edit_guest_name=$this->request->data["edit_guest_name"];
                $edit_card_no=$this->request->data["edit_card_no"];
                @$edit_arrival_date=date('Y-m-d', strtotime($this->request->data["edit_arrival_date"]));
				@$edit_checkout_date=date('Y-m-d', strtotime($this->request->data["edit_checkout_date"]));
                @(int)$edit_plan_id=$this->request->data["edit_plan_id"];
                @$edit_billing_instruction=$this->request->data["edit_billing_instruction"];
                @$edit_source_of_booking=$this->request->data["edit_source_of_booking"];
				@$edit_duration=$this->request->data["edit_duration".$i];
                @$edit_pax=$this->request->data["edit_pax"];
				@$edit_child=$this->request->data["edit_child"];
				@$edit_other_discount=$this->request->data["edit_other_discount"];
                $edit_advance_taken=$this->request->data["edit_advance_taken"];
				@$edit_tg=$this->request->data["edit_tg".$i];
                @$edit_foo_discount=$this->request->data["edit_foo_discount".$i];
                @$edit_net_amount=$this->request->data["edit_net_amount".$i];
                @$edit_remarks=$this->request->data["edit_remarks"];
				//$room_no_id=$this->request->data["room_no_id"];
				@$edit_posnet_amount=$this->request->data["edit_posnet_amount".$i];
				@$edit_house_amount=$this->request->data["edit_house_amount".$i];
				@$edit_extra_bed=$this->request->data["edit_extra_bed".$i];
				@$edit_totaltax=$this->request->data["edit_totaltax".$i];
                $edit_totalnetamount=$this->request->data["edit_totalnetamount"];
				@$transfer_due_amount=$this->request->data["transfer_due_amount"];
				@$card_name=$this->request->data["card_name"];
				@$edit_due_amount=$this->request->data["edit_due_amount".$i];
				//@$edit_extra_bed_tot=$this->request->data["edit_extra_bed_tot"];
				@$discount_type=$this->request->data["discount_type"];
				@$edit_room_discount=$this->request->data["edit_room_discount"];
				
				/////ADVANCE UPDATE
				    @$advance=$this->request->data["advance"];
					if($advance>0)
					{
					$this->room_checkin_checkout->updateAll(array('advance_taken' => 0 ),array('card_no' => $edit_card_no ));
					$this->room_checkin_checkout->updateAll(array('advance_taken' => "'$edit_advance_taken'" ),array('id' => $id_chekin ));
					}
				///// ADVANCE UPDATE
				 
				 @$card_name=$this->request->data["card_name"];
				 $edit_transfer_dueamount_to=$this->request->data["edit_transfer_dueamount_to"];
				 @$transfer_due_amount=$this->request->data["transfer_due_amount"]; 
				$room_n_id=$this->request->data["room_n_id"];
              ////// DUE AMOUNT CALC
			 	 @$all=$this->room_checkin_checkout->find('all', array('fields' => array('transfer_due_amount', 'transfer_due_amount_roomno'),'conditions'=>array('status' => 0, 'id' =>$edit_transfer_dueamount_to)));
			@$tra=$all[0]['room_checkin_checkout']['transfer_due_amount'];
			$transfer_amt_id=explode(',', $tra);
			//pr($tra);
			//exit;
			$transfer_amt_id1=array_merge($transfer_amt_id,$transfer_due_amount);
			@$multiple_transferamount_id= implode(",",$transfer_amt_id1);
			
			if($tra=='')
			{
				$multiple_transferamount_idd= implode($transfer_amt_id1);
			}
			else
			{
			$multiple_transferamount_idd=$multiple_transferamount_id;
			}
			@$tra1=$all[0]['room_checkin_checkout']['transfer_due_amount_roomno'];
			$transfer_roomno_id=explode(',', $tra1);
			$transfer_roomno_id1=array_merge($transfer_roomno_id,$room_n_id);
			@$multiple_transferto_id= implode(",",$transfer_roomno_id1);
			if($tra1=='')
			{
				$multiple_transferto_idd=implode($transfer_roomno_id1);;
			}
			else
			{
			 $multiple_transferto_idd=$multiple_transferto_id;
			}

			$this->room_checkin_checkout->updateAll(array('transfer_due_amount' => "'$multiple_transferamount_idd'", 'transfer_due_amount_roomno' => "'$multiple_transferto_idd'"), array('id' => $edit_transfer_dueamount_to));                                                                                                                                                                                                                                                                                                                                                                       
				  
				  /////////////////////// FINAL  UPDaTE
				$cash=$this->request->data["rec_amount"];
				@$given_amount=$cash;
				$recpt_type=$this->request->data["payment_mode"];
				@$room_due=$this->request->data["edit_due_amount".$i];
				//@$amount=$this->request->data["amount"];
				if($room_due=='0')
				{
				$due_amount1=' ';	
				}
				else
				$due_amount1=$room_due;
				
				@$pos_room_update=$curry1[$x];
				
				//////////////////////////////////////////////////////////////////////////
                $this->room_checkin_checkout->updateAll(array(
                'guest_name' => "'$edit_guest_name'",
				'card_no' => "'$edit_card_no'",
				'checkout_date' => "'$edit_checkout_date'",
                'billing_instruction' => "'$edit_billing_instruction'",
                'source_of_booking' => "'$edit_source_of_booking'", 'duration' => "'$edit_duration'", 'pax' => "'$edit_pax'",
                'child' => "'$edit_child'",
                'advance_taken' => "'$edit_advance_taken'",
                'foo_discount' => "'$edit_foo_discount'",
				'other_discount' => "'$edit_other_discount'",
				'discount_type' => "'$discount_type'",
                'net_amount' => "'$edit_net_amount'",
				'cash_paid' => "'$given_amount'",
				'tg' => "'$edit_tg'", 'status' => 1, 'house_amount' => "'$edit_house_amount'", 'extra_bed' => "'$edit_extra_bed'",
                'remarks' => "'$edit_remarks'", 'posnet_amount' => "'$edit_posnet_amount'", 'paid_amt' => "'$multiple_transferamount_idd'", 
				'totalnetamount' => "'$edit_totalnetamount'", 'totaltax' => "'$edit_totaltax'", 'due_amount' => "'$edit_due_amount'", 'multi_flag' => "' $room_checkin_checkout_flag'", 'multi_combine_id' => @$pos_room_update), array('id' => $id_chekin));
				/////////////////////////////////////end////////////////////////////////////////////
				
				$this->loadmodel('master_room');
				$this->pos_kot->updateAll(array('flag1' => 1), array('master_roomnos_id' => @$pos_room_update, 'card_no'=>$edit_card_no));
				$this->loadmodel('house_keeping');
				$this->house_keeping->updateAll(array('status' => 1), array('master_roomno_id' => $pos_room_update, 'card_no'=>$edit_card_no));
				$this->loadmodel('other_service');
				$this->other_service->updateAll(array('status' => 1), array('master_roomno_id' => $pos_room_update, 'card_no'=>$edit_card_no));
			    $roomstatus='Dirty';
                $this->room_serviceing->saveAll(array('master_roomno_id' => @(int)$pos_room_update,'room_status' =>@$roomstatus,'service_date' =>@$date, 'flag' =>1));
				$x++;
			}
			    /////////////////////checkout///////////////////////////
				$this->loadmodel('checkout');
				$this->set('fetch_checkout', $this->checkout->find('all', array('conditions'=>array('flag' => "0"))));
		        @$transfer_due_amount=$this->request->data["transfer_due_amount"];
				$rec_amount=$this->request->data["rec_amount"];
				$edit_totalnetamount=$this->request->data["edit_totalnetamount"];
			    $fff=0;
				$tit_amount=$rec_amount+$fff;
		        $checkout_due=$rec_amount+$transfer_due_amount[0]+$fff;
				$checkout_due1=$edit_totalnetamount-$checkout_due;
		        $this->checkout->saveAll(array( 
				'master_roomno_id' => $room_no_id,
				'date' => @$edit_checkout_date,
				'check_id' => @$id_chekin,
				'checkout_no' => @$checkout_no,
                'user_id' => $this->request->data["edit_company_id"],
				'card_no' => $this->request->data["edit_card_no"],
				'guest_name' => $this->request->data["edit_guest_name"],
				'total_amount' => @$this->request->data["edit_totalnetamount"],
				'receive_amount' => @$tit_amount,
				'due_amount' => @$checkout_due1));
				@$last_record_id_checkout=$this->checkout->getLastInsertID();
				//////////////////////////////////////end//////////////////////////////
				
				
				/////////////////////////////////////////////Ledger//////////////////////////////////////
				$cheque_no=@(int)$this->data["cheque_no"];
				$cheque_date=$this->data["cheque_date"];
				$neft_no=@(int)$this->data["neft_no"];
				$credit_card_name=$this->data["credit_card_name"];
				$credit_card_no=@(int)$this->data["credit_card_no"];
				$bank_name=$this->data["bank_name"];
				$narration=$this->data["narration"];
				$date=date("Y-m-d");
				$current_time=date("h:i:s A");
				$edit_company_id=$this->request->data["edit_company_id"];
				$payment_mode=$this->request->data["payment_mode"];
				$this->loadModel('room_checkin_checkout');
				$this->loadModel('checkout');
				$this->loadModel('ledger');
				$this->loadModel('ledger_master');
				$this->loadModel('ledger_cr_dr');
				$t_date=date('Y-m-d', strtotime($date));
			   
			    $fetch_transaction_id_bill2=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Invoice')));
                $t_id_b=$fetch_transaction_id_bill2+1;
				$this->ledger->saveAll(array('ledger_category_id'=>1,'user_id'=> $edit_company_id,'transaction_type'=> 'Invoice','transaction_id'=> $t_id_b,'transaction_id'=> $t_id_b,'receipt_type'=> 'Room','invoice_id' => $last_record_id_checkout, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				$last_ledger_id=$this->ledger->getLastInsertID(); 
				$kot_m_ledger_checkout=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$edit_company_id)));
				$l_id=$kot_m_ledger_checkout[0]['ledger_master']['id'];
				/////////////////////////////////////////////////////////////////////////////
			
			$x=0;
			$i=0;
			foreach($id_chekin_ary as $id_chekin)
			{ $i++;
				@$edit_duration=$this->request->data["edit_duration".$i];
				@$edit_other_discount=$this->request->data["edit_other_discount"];
                $edit_advance_taken=$this->request->data["edit_advance_taken"];
				@$edit_tg=$this->request->data["edit_tg".$i];
               // $edit_foo_discount=$this->request->data["edit_foo_discount".$i];
				//$totaly_charge=$this->request->data["totaly_charge".$i];
                $edit_net_amount=$this->request->data["edit_net_amount".$i];
				@$edit_totaltax=$this->request->data["edit_totaltax".$i];
				@$edit_totaly_charge=$this->request->data["edit_totaly_charge".$i];
				@$discount_type=$this->request->data["discount_type"];
				@$edit_room_discount=$this->request->data["edit_room_discount".$i];
				@$edit_room_discountt=$this->request->data["edit_room_discountt".$i];
				@$edit_taxesed=$this->request->data["edit_taxesed".$i];
				
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'dr' => $edit_net_amount));
				if($edit_room_discount>0){
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '10','dr' => $edit_room_discountt));}
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '41','cr' => $edit_totaly_charge));
				////////// Rohit Joshi tax code //////
				
				if($edit_room_discountt==0 || $edit_room_discountt==''){
					$totcharge=$edit_totaly_charge;
				}else{
					$totcharge=$edit_totaly_charge-$edit_room_discountt;
				}
	            $this->loadModel('room_checkin_checkout');
                      @$edit_taxesed=$this->request->data["edit_taxesed".$i];
					  $master_tax_id_modify= explode(' - ',$edit_taxesed);
					  $master_tax_id_modify1=array_filter($master_tax_id_modify);
					  $vat_gross=0;
						foreach($master_tax_id_modify1 as $data_tax){
							
							$this->loadModel('master_tax');
							$result_master_tax=$this->master_tax->find('all', array('conditions'=>array('id' =>$data_tax)));
							$tax_applicable=$result_master_tax[0]['master_tax']['tax_applicable'];
							$name=$result_master_tax[0]['master_tax']['name'];
							if($name=='Service Tax'){
								
								$total_gro=$totcharge*$tax_applicable/100;
								$this->loadModel('ledger_cr_dr');
								$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '29','cr' => $total_gro));
								@$vat_gross=$totcharge+$total_gro;
							}
							if($name=='VAT'){
								if(!empty($vat_gross)){
									$vat_actual=$vat_gross;
								}else{
									@$vat_actual=$totcharge;
								}
								$total_vat=$vat_actual*$tax_applicable/100;
								 $this->loadModel('ledger_cr_dr');
								 $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '39','cr' => $total_vat));
							}
			}
/////////end code//////////		
			$x++;
			}
			
				////////////////////////////////////////////////////////end/////////////////////////////////////////////////////
		///////////////////////////////////////////////////////////////Ledger2/////////////////////
		    	$fetch_transaction_id_bill2=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Receipt')));
                $t_id=$fetch_transaction_id_bill2+1;
				$rec_amount=$this->request->data["rec_amount"];
                if($rec_amount>0)
			    {
				  $this->ledger->saveAll(array('ledger_category_id'=>1,'user_id'=> $edit_company_id,'transaction_id'=> $t_id,'transaction_type'=> 'Receipt','receipt_type'=> 'Room','invoice_id' => $last_record_id_checkout, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				  
				$last_ledger_id=$this->ledger->getLastInsertID();
				$kot_m_ledger_checkout=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$edit_company_id)));
				$l_id=$kot_m_ledger_checkout[0]['ledger_master']['id'];
				if($edit_other_discount>0)
				  {
				@$edit_other_discount=$this->request->data["edit_other_discount"];
				@$edit_totalnetamount=$this->request->data["edit_totalnetamount"];
				@$rec_amount=$this->request->data["rec_amount"];
				$tottji=$rec_amount+$edit_other_discount;
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'cr' => $tottji));
				if($payment_mode=='Cash')
				{
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '35','dr' => $rec_amount));
				}else
				{
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '37','dr' => $rec_amount));
			    }
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '10','dr' => $edit_other_discount));
				  }
				  
				else
				  {
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=>$l_id,'cr' => $rec_amount));
				if($payment_mode=='Cash')
				{
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '35','dr' => $rec_amount));
				}else
				{
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '37','dr' => $rec_amount));
			    }
				  }
				  
				  
			  }
				///////////////////////////////////////////////////////////////////////////////////////////////////
				// DUE AMOUNT CALC
			    $cash=$this->request->data["rec_amount"];
				@$given_amount=$cash;
				$recpt_type=$this->request->data["payment_mode"];
				$room_due=$this->request->data["edit_due_amount".$i];
				//$amount=$this->request->data["amount"];
				if($room_due=='0')
				{
				$due_amount1=' ';	
				}
				else
				$due_amount1=$room_due;
				$this->gr_no->updateAll(array('checkout_no' =>$this->request->data["checkout_no"]+1), array('id' => 1));
				
				$edit_card_no=$this->request->data["edit_card_no"];
				
				$sms=str_replace(' ', '+', 'Thank you for choosing us for your stay.');
				$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'send_sms',$sms,$mobile_no), array());
				$this->smtpmailer($this->request->data["edit_email_id"],'Dreamshapers','Enquiry', "hello" ,$this->request->data["edit_email_id"]);
				
				///////////////////////////////////////////////////////////
				//////////// RooM STATUS 
				if(sizeof($id_chekin_ary)>1)
				{
					 ?>
             <script>
			 window.open("informationbill_multi?id=<?php echo $id_chekin; ?>",'_new');
			  //window.open("receipt",'_blank');
			 </script>
             <?php
				}
				else
				{
				 ?>
             <script>
			 window.open("informationbill?id=<?php echo $id_chekin; ?>",'_new');
			 // window.open("receipt",'_blank');
			 </script>
             <?php
				}
			  echo "<meta http-equiv='Refresh' content='0 ;URL=checkout'>";
			  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=checkout?active=1">';
            
			}
			else if(isset($this->request->data["submit"]))
			{
				$this->loadmodel('checkout');
				$id=$this->request->data["blid"];
	            $ftc_bill_room=$this->checkout->find('all', array('conditions'=>array('check_id'=> $id)));
				$mmide=$ftc_bill_room[0]['checkout']['master_roomno_id'];
				$hh=explode(',',$mmide);
if(sizeof($hh)>1)
				{
					 ?>
             <script>
			 window.open("informationbill_multi?id=<?php echo $id; ?>",'_new');
			  //window.open("receipt",'_blank');
			 </script>
             <?php
				}
				else
				{
				 ?>
             <script>
			 window.open("informationbill?id=<?php echo $id; ?>",'_new');
			 // window.open("receipt",'_blank');
			 </script>
             <?php
				}
		}
		
                $this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions' => array('flag' => "0"))));
                $this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions' => array('flag' => "0"))));
                $this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions' => array('flag' => "0"))));
                $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0))));
				$this->set('fatch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0), 'group'=>'card_no')));
				$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => 0))));
				$this->set('fetch_paid_receipt', $this->paid_receipt->find('all', array('conditions'=>array('flag' => 0))));
				$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
				$this->loadmodel('master_room');
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_serviceing', $this->room_serviceing->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fatch_plan_kot_data', $this->pos_kot->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_gr_no', $this->gr_no->find('all'));
				$this->loadmodel('checkout');
				$this->set('fetch_bill', $this->checkout->find('all', array('conditions'=>array('flag' => "0"))));
				
    
	}
	
	////////////////////////////////////////
	public function steward()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_steward');
	    if(isset($this->request->data["add_master_steward"]))
			{
				
				$this->master_steward->saveAll(array('steward_name' =>@(string)$this->request->data["steward_name"], 
				'steward_mobile_no' => @(string)$this->request->data["steward_mobile_no"]));
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=steward?active=1">';
				
			}
			
			else if(isset($this->request->data["edit_master_steward"]))
			{
				$edit_steward_name=$this->request->data["edit_steward_name"];
				$edit_steward_mobile_no=$this->request->data["edit_steward_mobile_no"];
				
				$this->master_steward->updateAll(array('steward_name' => "'$edit_steward_name'", 'steward_mobile_no' => "'$edit_steward_mobile_no'"), array('id' => $this->request->data["msteward_id"]));
				$this->set('active',2);
			}

            else if(isset($this->request->data["delete_master_steward"]))
			{
				$this->master_steward->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_msteward_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			}
                $this->set('fetch_master_steward', $this->master_steward->find('all', array('conditions' => array('flag' => "0"))) );
	}
	///////////////////////
	public function master_item_category()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_item_category');
		$this->loadmodel('ledger_master');
	    if(isset($this->request->data["add_master_item_category"]))
			{
				$item_category=$this->request->data["item_category"];
				$this->loadmodel('master_item_category');
				@$itmcat=$this->master_item_category->find('all', array('fields' => array('item_category'),'conditions'=>array('flag' => 0, 'item_category' =>$item_category)));
				$itmmc=$itmcat[0]['master_item_category']['item_category'];
				 if($item_category==$itmmc)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->master_item_category->saveAll(array('item_category' =>@$item_category));
				
				@$last_record_id=$this->master_item_category->getLastInsertID();
				$this->ledger_master->saveAll(array('ledger_category_id'=>'4','name' => $item_category, 'name_id' => $last_record_id));
				$this->redirect(array('action' => 'master_item_category'));
				}
			}
			else if(isset($this->request->data["edit_master_item_category"]))
			{
				$edit_item_category=$this->request->data["edit_item_category"];
				$this->master_item_category->updateAll(array('item_category' => "'$edit_item_category'"), array('id' => $this->request->data["mitem_id"]));
				
				
				$this->loadmodel('ledger_master');
				@$fetch_fnb_ledger=$this->ledger_master->find('all', array('conditions' => array('name_id' => $this->request->data["mitem_id"], 'ledger_category_id'=>4)));
				$ledger_fnb_id=$fetch_fnb_ledger[0]['ledger_master']['id'];
				$this->ledger_master->updateAll(array('name' => "'$edit_item_category'"), array('id' => $ledger_fnb_id));
				$this->set('active',2);
			}
            else if(isset($this->request->data["delete_master_item_category"]))
			{
				$this->master_item_category->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_mitem_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			}
                $this->set('fetch_master_item_category', $this->master_item_category->find('all', array('conditions' => array('flag' => "0"))) );
	}
	////////////////////////////////////////
	public function stock_category()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}

		$this->loadmodel('stock_category');
	    if(isset($this->request->data["add_stock_category"]))
			{
				$item_category=$this->request->data["item_category"];
				$this->loadmodel('stock_category');
				@$sc=$this->stock_category->find('all', array('fields' => array('item_category'),'conditions'=>array('flag' => 0, 'item_category' =>$item_category)));
				$sc1=$sc[0]['stock_category']['item_category'];
				 if($item_category==$sc1)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->stock_category->saveAll(array('item_category' =>$item_category));
				$this->redirect(array('action' => 'stock_category'));
				}
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=stock_category?active=1">';
				
			}
			else if(isset($this->request->data["edit_stock_category"]))
			{
				$edit_item_category=$this->request->data["edit_item_category"];
				$this->stock_category->updateAll(array('item_category' => "'$edit_item_category'"), array('id' => $this->request->data["mitem_id"]));
				$this->set('active',2);
			}
            else if(isset($this->request->data["delete_stock_category"]))
			{
				$this->stock_category->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_mitem_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			}
                $this->set('fetch_stock_category', $this->stock_category->find('all', array('conditions' => array('flag' => "0"))) );
	}
////

	////////////////////////////////////////
	public function caretaker()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_caretaker');
	    if(isset($this->request->data["add_master_caretaker"]))
			{
				$this->master_caretaker->saveAll(array('caretaker_name' =>@(string)$this->request->data["caretaker_name"], 
				'caretaker_mobile_no' => @(string)$this->request->data["caretaker_mobile_no"]));
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=caretaker?active=1">';

				
			}
			
			else if(isset($this->request->data["edit_master_caretaker"]))
			{
				$edit_caretaker_name=$this->request->data["edit_caretaker_name"];
				$edit_caretaker_mobile_no=$this->request->data["edit_caretaker_mobile_no"];
				$this->master_caretaker->updateAll(array('caretaker_name' => "'$edit_caretaker_name'", 'caretaker_mobile_no' => "'$edit_caretaker_mobile_no'"), array('id' => $this->request->data["caretaker_id"]));
				$this->set('active',2);
			}

            else if(isset($this->request->data["delete_master_caretaker"]))
			{
				$this->master_caretaker->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_caretaker_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);
			}
	
                $this->set('fetch_master_caretaker', $this->master_caretaker->find('all', array('conditions' => array('flag' => "0"))) );
				
	}
////
////////////////////////////////////////
	public function logo_address()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('address');
		if(isset($this->request->data["add_address"]))
			{
				$file_name=@$_FILES["file"]["name"];
				if(!empty($file_name)){
					$file_name=$_FILES["file"]["name"];
					$file_tmp_name =$_FILES['file']['tmp_name'];
					$target = "expenset/";
					$target=@$target.basename($file_name);
					move_uploaded_file($file_tmp_name,@$target);
				}
				$this->address->saveAll(array(				
				'name' =>@$this->request->data["name"],
				'add' =>@$this->request->data["add"],
				'contact' =>@$this->request->data["contact"],
				'email' =>@$this->request->data["email"],
				'web' =>@$this->request->data["web"],
				'service_tax_no' =>@$this->request->data["service_tax_no"],
				'tin_no' =>@$this->request->data["tin_no"]));
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=logo_address?active=1">';

				
			}
			
			
	if(isset($this->request->data["edit_address"]))
			{

$file_name=@$_FILES["file"]["name"];
				if(!empty($file_name)){
					$file_name=$_FILES["file"]["name"];
					$file_tmp_name =$_FILES['file']['tmp_name'];
					$target = "expenset/";
					$target=@$target.basename($file_name);
					move_uploaded_file($file_tmp_name,@$target);}

				$edit_file=@(int)$this->request->data["edit_file"];
				$edit_name=$this->request->data["edit_name"];
				$edit_add=$this->request->data["edit_add"];
				$edit_contact=$this->request->data["edit_contact"];
				$edit_email=$this->request->data["edit_email"];
				$edit_web=$this->request->data["edit_web"];
				$edit_service_tax_no=$this->request->data["edit_service_tax_no"];
				$edit_tin_no=$this->request->data["edit_tin_no"];
				
				$this->address->updateAll(array('file' => "'$edit_file'", 'name' => "'$edit_name'", 'add' => "'$edit_add'",
				'contact' => "'$edit_contact'",
				'email' => "'$edit_email'",
				'web' => "'$edit_web'", 'service_tax_no' => "'$edit_service_tax_no'", 'tin_no' => "'$edit_tin_no'"), array('id' => $this->request->data["logo"]));
				$this->set('active',1);
				
			}
			else if(isset($this->request->data["delete_address"]))
			{
				$this->address->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_logo_id"]));
				$this->set('active',1);
			}
			
	                    $this->set('fetch_address', $this->address->find('all', array('conditions' => array('flag' => "0"))) );
				
	}
////

////////////////////////////////////////
	public function outstanding_bill()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
		if(isset($this->request->data["submit"]))
			{
				$company_id=$this->request->data["company_id"];
			?>
             <script>
			 window.open("outstanding?company_id=<?php echo $company_id; ?>",'_new');
			 </script>
             <?php
			  echo "<meta http-equiv='Refresh' content='0 ;URL=outstanding_bill'>";
			
			}
		$this->loadmodel('company_registration');
		$this->loadmodel('bill');
		$this->loadmodel('receipt_checkout');
		$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions' => array('flag' => "0"), 'due_amount'=>'>0')));
	    $this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all'));
		$this->set('fetch_bill', $this->bill->find('all'));
	}
////
public function outstanding()
	{
		$company_id=$this->request->query('company_id');
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('bill');
		$this->loadmodel('address');
		$this->set('fetch_bill', $this->bill->find('all', array('conditions'=>array('company_id'=> $company_id))));
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
	}
//////////	
	public function menu()
	{
		$user_id=$this->Session->read('user_id');
		$designation_id=$this->Session->read('designation_id');
		$this->loadmodel('module');
		//$conditions=array("designation_id" => $designation_id, "user_id" => $user_id);
		//$fetch_menu = $this->module->find('all',array('conditions'=>$conditions));DISTINCT
		return $fetch_menu = $this->module->find('all',array('order' => 'preferance ASC'));
		   
	}
	public function menu_submenu($main_menu,$data)
	{
		$user_id=$this->Session->read('user_id');
		$designation_id=$this->Session->read('designation_id');
		$this->loadmodel('module');
		//$conditions=array("main_menu" => $main_menu, "sub_menu" => $sub_menu);
		$conditions=array("main_menu" => $main_menu);
		if(!empty($data))
		{
			return $fetch_menu_submenu = $this->module->find('all',array('conditions'=>$conditions, 'group' => 'sub_menu'));
		}
		else
		{
			return $fetch_menu_submenu = $this->module->find('all',array('conditions'=>$conditions));
		}
		//return $fetch_menu = $this->module->find('all');
		
	}
	public function submenu($sub_menu)
	{
		$user_id=$this->Session->read('user_id');
		$designation_id=$this->Session->read('designation_id');
		$this->loadmodel('module');
		$conditions=array("sub_menu" => $sub_menu);
		return $fetch_submenu = $this->module->find('all',array('conditions'=>$conditions));
		
	}
	public function authentication()
	{
		$user_id=$this->Session->read('user_id');
		if(empty($user_id))
		{
			$this->Session->destroy();
			$this->redirect(array('action' => 'login'));
		}
	}
	public function logout()
	{
		$this->layout='ajax_layout';
		$this->Session->destroy();
		$this->redirect(array('action' => 'index'));
	}
	
	public function create_login() 
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
	$this->loadmodel('master_outlet');
	$this->loadmodel('login');
	
		if($this->request->is('post'))
		{
				if(isset($this->request->data['login_reg']))
				{
					
					if(sizeof($this->request->data['outlet_id'])>0)
                {
                    $all_service_value = implode(",",$this->request->data['outlet_id']);
                }
                else
                {
                    $all_service_value ='';
                }
				
				$login_id=$this->request->data["login_id"];
				$this->loadmodel('login');
				@$log=$this->login->find('all', array('fields' => array('login_id'),'conditions'=>array('approval_status' => 0, 'login_id' =>$login_id)));
				$log_id=$log[0]['login']['login_id'];
				 
				 if($login_id==$log_id)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
					   $this->login->saveAll(array('login_id'=>$login_id,
						'password'=>md5($this->request->data['password']),
						'username'=>$this->request->data['username'],
						'email_id'=>$this->request->data['email_id'],
						'outlet_id'=>@(string)$all_service_value));
						 $this->redirect(array('action' => 'create_login'));
				}
				}
				else if(isset($this->request->data["edit_login_reg"]))
			{
				
				if(sizeof($this->request->data['edit_outlet_id'])>0)
                {
                    $all_service_value = implode(",",$this->request->data['edit_outlet_id']);
                }
                else
                {
                    $all_service_value ='';
                }
                $edit_login_id=$this->request->data["edit_login_id"];
				//$edit_password=md5($this->request->data["edit_password"]);
				$edit_username=$this->request->data["edit_username"];
				$edit_email_id=$this->request->data["edit_email_id"];
				$edit_outlet_id=@$all_service_value;
				
				$this->login->updateAll(array('login_id' => "'$edit_login_id'", 'username' => "'$edit_username'"
				, 'email_id' => "'$edit_email_id'", 'outlet_id' => "'$edit_outlet_id'"), array('id' => $this->request->data["loginedit"]));
				$this->set('active',2);
				
			}

            else if(isset($this->request->data["delete_login_reg"]))
			{
				$this->login->updateAll(array('approval_status' => 1),array('id' => $this->request->data["delete_loginedit"]));
				$this->set('active',2);
				$this->set('active_delete',1);
			}
				
		}
		$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag'=>0))));
	    $this->set('fetch_login', $this->login->find('all', array('conditions'=>array('approval_status'=>0))));
	}
	
	/////////////////////////////////
	
	public function my_profile() {
	$this->layout='index_layout';
	$this->loadmodel('master_outlet');
	$this->loadmodel('login');
	
		if($this->request->is('post'))
		{
				
				if(isset($this->request->data['login_reg']))
				{
					$edit_current_password=$this->request->data["edit_current_password"];
					$edit_new_password=$this->request->data["edit_new_password"];
					$edit_password=$this->request->data["edit_password"];
					$pass=$this->request->data["pass"];
					$id_login=$this->request->data["id_login"];
					
			   if($edit_current_password==$pass && $edit_new_password==$edit_password)
					{
						$edit_password=md5($this->request->data["edit_password"]);
						$conditions = array ('id' => $id_login);
						$this->login->updateAll(array('password' => "'$edit_password'"), array('id'=> $conditions));
						
				    $conditions=array('id' => $id_login);
					$result = $this->login->find('all', array('conditions'=>$conditions));
					$user_id=$result[0]['login']['id'];
					$user_name=$result[0]['login']['username'];
					$passw=$result[0]['login']['password'];
					//$outlet_id=$result[0]['login']['outlet_id'];
					//$this->Session->write('login_id', $login_id);
					$this->Session->write('user_id', $user_id);
					$this->Session->write('user_name', $user_name);
					//$this->Session->write('passw', $password);
					}
					else
				{
										$this->set('wrong', 'Enter re-type correct password.');

				}
				/*elseif($edit_current_password==$password || $edit_new_password==$edit_password)
		{
		        $this->login->updateAll(array('password' => "'$edit_password'"));
				$this->login->updateAll(array('password' => "'$edit_password'"), array('id' => $this->request->data["loginedit"]));
				$this->set('active',1);
		}*/
					}
			
			
		}
		
		$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag'=>0))));
	    $this->set('fetch_login', $this->login->find('all', array('conditions'=>array('approval_status'=>0))));
	}
	/////////////////////////////////////////
	
	
	public function user_right() {
		$this->layout='index_layout';
		$this->loadmodel('login');
		$this->set('fetch_login', $this->login->find('all'));		
		if($this->request->is('post'))	
		{
			if(isset($this->request->data['right_submit']))
			{
				$this->loadmodel('user_right');
				
				$this->request->data['module_id']=implode(',', $this->request->data['module_id']);
				$conditions=array("user_id" => $this->request->data['user_id']);
				 @$fetch_user_right = $this->user_right->find('all',array('conditions'=>$conditions));
				$this->user_right->id=$fetch_user_right['0']['user_right']['id'];
				@$this->user_right->save($this->request->data);
			}
		}
	}
////////////////////////////////////////////////////////////	
	
		
	public function login() 
	{
		$this->layout='login_layout';
		///////////////// submit login ///////////////////////
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all'));
		if (isset($this->request->data['login_submit']) || isset($this->request->data["login_submit_text"]))
		{
			
				//$outlet_id=htmlentities($this->request->data["outlet_id"]);
				$login_id=htmlentities($this->request->data["login_id"]);
				$password=htmlentities($this->request->data["password"]);
				
				$md5ed_password = md5($password);
				$this->loadmodel('login');
				$conditions=array("login_id" => $login_id, "password" => $md5ed_password);
				$result = $this->login->find('all',array('conditions'=>$conditions));
				
					
				//$conditions=array("email_id" => $email_id, "password" => $md5ed_password);
				//$result = $this->login->find('all',array('conditions'=>$conditions));
				
				$n = sizeof($result);
				if($n==1)
				{
					$user_id=$result[0]['login']['id'];
					$user_name=$result[0]['login']['username'];
					$outlet_id=$result[0]['login']['outlet_id'];
					$designation_id=$result[0]['login']['designation_id'];
					$approval_status=$result[0]['login']['approval_status'];
					$this->Session->write('login_id', $login_id);
					$this->Session->write('user_id', $user_id);
					$this->Session->write('user_name', $user_name);
					$this->Session->write('passw', $password);
					$this->Session->write('outlet_id', $outlet_id);
					//$this->Session->write('id', $id);
					//$this->Session->write('outlet_id', $outlet_id);
					
					$this->redirect(array('action' => 'index'));
				}
				else
				{
					$this->loadmodel('login');
					$conditions=array("login_id" => $login_id);
					$result1 = $this->login->find('all',array('conditions'=>$conditions));
					 $n1 = sizeof($result1);
					if($n1>0)
					{ 
						 $this->set('wrong', 'Password is Incorrect');
					}
					else
					{
							
						$this->set('wrong', 'Login ID and Password are Incorrect');
					}	
				}
		
		}
		
		
	///////////////// submit login ///////////////////////
	///////////////// reset password ///////////////////////
		if (isset($this->request->data['reset_password']) || isset($this->request->data["reset_submit_text"]))
		{
			if($this->request->is('post')) 
			{
				//echo"hello"; exit;
				$this->Session->write('reset_password', 'true');
				$email_id=htmlentities($this->data["email"]);
				$this->loadmodel('login');
				$conditions=array("email_id" => $email_id);
				$result = $this->login->find('all',array('conditions'=>$conditions));
				
				$user_id=$result[0]['login']['id'];
				 $data=base64_encode($user_id);
				
				$message_web='<a href="http://app.nonmovinginventory.com/nonmovinginventory/reset_password?data='.$data.'">Click here to reset password.</a>';
				//$message_web='<a href="localhost/nmi/nonmovinginventory/reset_password?data='.$data.'">Click here to reset password.</a>';
				//$this->smtpmailer($email_id,'Nonmoving Inventory','Reset Password',$message_web,'');
				 echo "<script>window.close();</script>";
			}
		}
		///////////////// reset password ///////////////////////
    }
	public function reset_password() 
	{
		$this->layout='login_layout';
		$reset_session=$this->Session->read('reset_password');
		$this->set('reset_password', $reset_session);
		
		if (isset($this->request->data['confirm_submit']))
		{
				$new_password=htmlentities($this->data["new_password"]);
				$retype_password=htmlentities($this->data["retype_password"]);
				
				if(($new_password==$retype_password) && (!empty($new_password)))
				{
					$password=md5($new_password);
					$login_id=base64_decode($this->request->query['data']);
					$this->loadmodel('login');
					$this->login->updateAll(array('password'=>"'$password'"), array('id'=>$login_id));
					
					$conditions=array('id' => $login_id);
					$result = $this->login->find('all', array('conditions'=>$conditions));
					$designation_id=$result[0]['login']['designation_id'];
					$this->Session->delete('reset_password');
					$this->Session->write('user_id', $login_id);
					$this->Session->write('designation_id', $designation_id);
					$this->redirect(array('action' => 'user_index'));
				}
				else
				{
					$this->set('wrong', 'Enter re-type correct password.');
				}
			
		}
	}
	public function change_password() 
	{
		$this->authentication();
		$this->layout='login_layout';
		$user_id=$this->Session->read('user_id');
		if (isset($this->request->data['confirm_submit']))
		{
				$new_password=htmlentities($this->data["new_password"]);
				$retype_password=htmlentities($this->data["retype_password"]);
				
				if(($new_password==$retype_password) && (!empty($new_password)))
				{
					$password=md5($new_password);
					$login_id=$user_id;
					$this->loadmodel('login');
					$this->login->updateAll(array('password'=>"'$password'"), array('id'=>$login_id));
					
					$conditions=array('id' => $login_id);
					$this->redirect(array('action' => 'user_index'));
				}
				else
				{
					
					$this->set('wrong', 'Enter re-type correct password.');
				}
			
		}
	}
	/////////
	
	public function index()
	{
		$c_date=date("Y-m-d");	
		if($this->RequestHandler->isAjax())
		{ 
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_roomno');
		$this->loadmodel('company_category');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('fo_room_booking');
		$this->loadmodel('master_room_type');
		$this->loadmodel('room_reservation');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_room');
		$this->set('fetch_master_roomno', $this->master_roomno->find('all',array('conditions' => array('flag' => "0"))));
		$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array( 'flag' => "0"))));
                $this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0", 'status' => 0, 'arrival_date'=>$c_date ))));				
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=> 0))));
				
				
				$this->set('fetch_room_reservationn', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=>0, 'arrival_date'=>$c_date))));
				
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_fo_room_booking', $this->fo_room_booking->find('all', array('conditions'=>array('flag' => "0"))));
				//$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => "0"))));
				//$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
				//$this->set('fetch_gr_no', $this->gr_no->find('all'));
				$this->loadmodel('registration');
		        $this->set('fetch_registration', $this->registration->find('all'));
				
		//App::import('Vendor', 'attendance', array('file' => 'attendance' . DS . 'auth.php')); 

	}
	/////////////////////////////////////////
	
	public function index1()
	{
		if($this->RequestHandler->isAjax())
		{ 
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_roomno');
		$this->loadmodel('company_category');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('fo_room_booking');
		$this->loadmodel('master_room_type');
		$this->loadmodel('room_reservation');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_room');
		$this->set('fetch_master_roomno', $this->master_roomno->find('all',array('conditions' => array('flag' => "0"))));
		$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array( 'flag' => "0"))));
                $this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0", 'status' => 0))));				
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=> 0))));
				$this->set('fetch_room_reservationn', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=>0))));
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_fo_room_booking', $this->fo_room_booking->find('all', array('conditions'=>array('flag' => "0"))));
				$this->loadmodel('registration');
		        $this->set('fetch_registration', $this->registration->find('all'));
				
		//App::import('Vendor', 'attendance', array('file' => 'attendance' . DS . 'auth.php')); 

	}
	//////////////////////////
	
	public function index2()
	{
		if($this->RequestHandler->isAjax())
		{ 
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_roomno');
		$this->loadmodel('company_category');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('fo_room_booking');
		$this->loadmodel('master_room_type');
		$this->loadmodel('room_reservation');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_room');
		$this->set('fetch_master_roomno', $this->master_roomno->find('all',array('conditions' => array('flag' => "0"))));
		$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array( 'flag' => "0"))));
                $this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0", 'status' => 0))));				
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=> 0))));
				
				$this->set('fetch_room_reservationn', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0", 'reservation_status !='=> 'Cancelled', 'status'=>0))));
				
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_fo_room_booking', $this->fo_room_booking->find('all', array('conditions'=>array('flag' => "0"))));
				//$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => "0"))));
				//$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
				//$this->set('fetch_gr_no', $this->gr_no->find('all'));
				$this->loadmodel('registration');
		        $this->set('fetch_registration', $this->registration->find('all'));
				
		//App::import('Vendor', 'attendance', array('file' => 'attendance' . DS . 'auth.php')); 

	}
	//////////////////////////
	public function core_attendance()
	{
		if($this->RequestHandler->isAjax())
		{ 
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='ajax_layout';
		}
		//$this->loadmodel('master_roomno');
		//$this->set('fetch_master_roomno', $this->master_roomno->find('all',array('conditions' => array('flag' => "0"))));
		App::import('Vendor', 'attendance', array('file' => 'attendance' . DS . 'index.php')); 

	}
	

	public function roomtype()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		
		 $this->loadmodel('master_room_type');
		if(isset($this->request->data["add_room_type"]))
		{
			$room_type=$this->request->data["room_type"];
				$this->loadmodel('master_room_type');
				@$rt=$this->master_room_type->find('all', array('fields' => array('room_type'),'conditions'=>array('flag' => 0, 'room_type' =>$room_type)));
				$rt1=$rt[0]['master_room_type']['room_type'];
				
				 if($room_type==$rt1)
				 {
					 $this->set('error','Data Already Exist');				
				 }
				else
				{
		$this->master_room_type->saveAll(array('room_type' => $room_type));
		//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=roomtype?active=1">';
				$this->redirect(array('action' => 'roomtype'));
				}
			
			
		}
			else if(isset($this->request->data["edit_master_room_type"]))
			{
			$edit_room_type=$this->request->data["edit_room_type"];
			$this->master_room_type->updateAll(array('room_type' => "'$edit_room_type'"), array('id' => $this->request->data["roomtype_id"]));
			$this->set('active',2);

			}
				else if(isset($this->request->data["delete_master_room_type"]))
				{
				$this->master_room_type->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_roomtype_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);
				}

                   $this->set('fetch_room_type', $this->master_room_type->find('all', array('conditions' => array('flag' => "0"))) );
}

	
	
	function room_allocation_chart()
	{
		 if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_checkin_checkout');
		$this->set('fetch_master_roomno', $this->master_roomno->find('all'));
		$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0", 'status' => 0))));
	}
	////////////////////////////////////////////////////////////////
	
	public function ajax_php_file()
	{
		$this->layout='ajax_layout';
		
		///////////////////////////////////////Ashishji/////////////////////////////////////////
		if(@$this->request->query['bill_posting_ac']==1)
        {
            $ledger_id=$this->request->query['ledger_id'];
			$receipt_mode=$this->request->query['receipt_mode'];
			$cheque_no=$this->request->query['cheque_no'];
			$bank_name=$this->request->query['bank_name'];
			$cheque_date=$this->request->query['cheque_date'];
			$credit_card_name=$this->request->query['credit_card_name'];
			$credit_card_no=$this->request->query['credit_card_no'];
			$neft_no=$this->request->query['neft_no'];
			if(!empty($this->request->query["cheque_date"]))
			{
				$cheque_date=date('Y-m-d', strtotime($this->request->query["cheque_date"]));
			}
            $this->loadmodel('ledger');
			$this->loadmodel('ledger_cr_dr');
            $this->ledger->updateAll(array('receipt_mode' => "'$receipt_mode'", 'cheque_no' => "'$cheque_no'", 'bank_name' => "'$bank_name'", 'cheque_date' => "'$cheque_date'", 'credit_card_name' => "'$credit_card_name'", 'credit_card_no' => "'$credit_card_no'", 'neft_no' => "'$neft_no'" ),array('id' => $ledger_id));
			if($this->request->query['receipt_mode']=='Cash')
			{
				$this->ledger_cr_dr->updateAll(array('ledger_master_id'=>35),array('ledger_id'=>$ledger_id,'OR'=>array(array('ledger_master_id'=>35),array('ledger_master_id'=>37))));
			}
			else
			{
				$this->ledger_cr_dr->updateAll(array('ledger_master_id'=>37),array('ledger_id'=>$ledger_id,'OR'=>array(array('ledger_master_id'=>35),array('ledger_master_id'=>37))));
			}
            exit;
        }
		if(@$this->request->query['bill_posting_approved']==1)
        {
            $ledger_id=$this->request->query['ledger_id'];
            $this->loadmodel('ledger');
            $this->ledger->updateAll(array('status' => 1 ),array('id' => $ledger_id));
            exit;
        }
        if(@$this->request->query['bill_posting']==1)
        {
            $this->loadmodel('ledger_master');
            $this->loadmodel('ledger');
            $this->loadmodel('ledger_cr_dr');
            $fetch_ledger=$this->ledger->find('all',array('conditions'=>array('status'=>0,'transaction_type'=>'Receipt','receipt_type'=>$this->request->query['receipt_type'])));
            ?>
             
                  <table class="table self-table" style=" width:100% !important;" border="0" id="bill_post">
                        <thead>
                            <tr>
                                <th>S. No.</th><th>Company Name</th><th>Bill No.</th><th>Amount</th><th>View</th><th>Edit</th><th>Approved</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sr_no=0;
                        foreach($fetch_ledger as $data_ledger)
                        {    
                            $sr_no++;
                            $company_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_name',$data_ledger['ledger']['user_id']), array());
                           
                            $fetch_ledger_cr_dr=$this->ledger_cr_dr->find('all',array('conditions'=>array('ledger_id'=>$data_ledger['ledger']['id'],'ledger_master_id'=>$company_name[0]['ledger_master']['id'])));
                            $ledger_cr_dr=$this->ledger_cr_dr->find('all',array('conditions'=>array('ledger_id'=>$data_ledger['ledger']['id'])));
                            $contain='<table>';
                            foreach($ledger_cr_dr as $data)
                            {
                                $ledger_master_data=$this->ledger_master->find('all',array('fields'=>array('name'),'conditions'=>array('id'=>$data['ledger_cr_dr']['ledger_master_id'])));
                                $name=$ledger_master_data[0]['ledger_master']['name'];
                                $cr=$data['ledger_cr_dr']['cr'];
                                $dr=$data['ledger_cr_dr']['dr'];
                                $contain.='<tr><td>'.$name.'</td>';
                                if(!empty($cr))
                                {
                                    $contain.='<td>'.$cr.' Cr</td>';
                                }
                                else
                                {
                                    $contain.='<td>'.$dr.' Dr</td>';
                                   
                                }
                                $contain.='</tr>';
                            }
                            $contain.='</table>';
                        ?>
                            <tr>
                            <td><?php echo $sr_no; ?></td>
                            <td><?php echo $company_name[0]['ledger_master']['name']; ?></td>
                            <td><?php echo $data_ledger['ledger']['invoice_id']; ?></td>
                            <td><?php echo $fetch_ledger_cr_dr[0]['ledger_cr_dr']['cr']; ?></td>
                            <td><button type="button" class="btn blue btn-xs popovers" data-trigger="hover" data-container="body" data-placement="right" data-content="<?php echo $contain; ?>" data-original-title="Ledger View" data-title="Ledger View">View</button></td>
                            <td><a class="btn default" data-toggle="modal" href="#large<?php echo $sr_no; ?>">Edit </a><!-- /.modal -->
                            <form>
							<div class="modal fade bs-modal-lg" id="large<?php echo $sr_no; ?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Receipt Mode</h4>
										</div>
										<div class="modal-body">
											<div class="form-group">
                                                <label><input name="receipt_mode"  value="Cash" type="radio" <?php if($data_ledger['ledger']['receipt_mode']=='Cash'){ ?> checked="checked" <?php } ?>> Cash </label>
                                                <label><input name="receipt_mode" class="cheque" value="Cheque" type="radio" <?php if($data_ledger['ledger']['receipt_mode']=='Cheque'){ ?> checked="checked" <?php } ?>> Cheque</label>
                                                <label><input name="receipt_mode" class="credit_card" value="Credit Card" type="radio" <?php if($data_ledger['ledger']['receipt_mode']=='Credit Card'){ ?> checked="checked" <?php } ?>> Credit Card </label>
                                               <label> <input name="receipt_mode" class="neft" value="NEFT" type="radio" <?php if($data_ledger['ledger']['receipt_mode']=='NEFT'){ ?> checked="checked" <?php } ?>> NEFT </label>
                                            </div>
                                            <div id="cheque" class="receipt_mode" <?php if($data_ledger['ledger']['receipt_mode']!='Cheque'){ ?> style="display:none;" <?php } ?> >
                                            <p><label>Cheque No.</label>
                                            <div class="form-group"><input type="text" class="form-control input-medium" placeholder="Cheque No." name="cheque_no" value="<?php echo $data_ledger['ledger']['cheque_no']; ?>"></div>
                                            <label>Bank Name</label>
                                            <div class="form-group"><input type="text" class="form-control input-medium" placeholder="Bank Name" name="bank_name" value="<?php echo $data_ledger['ledger']['bank_name']; ?>"></div>
                                            <label>Cheque Date</label>
                                            <div class="form-group"><input type="text" class="form-control  input-medium date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="cheque_date" value="<?php  if(!empty($data_ledger['ledger']['cheque_date'])){ echo date('d-m-Y',strtotime($data_ledger['ledger']['cheque_date'])); } ?>"></div>
                                            </p>
                                            </div>
                                            <div id="credit_card" class="receipt_mode" <?php if($data_ledger['ledger']['receipt_mode']!='Credit Card'){ ?> style="display:none;" <?php } ?> >
                                            <p><label>Credit Card Name</label>
                                            <div class="form-group"><input type="text" class="form-control input-medium" placeholder="Credit Card Name" name="credit_card_name" value="<?php echo $data_ledger['ledger']['credit_card_name']; ?>"></div>
                                            <label>Credit Card No.</label>
                                            <div class="form-group"><input type="text" class="form-control input-medium" placeholder="Credit Card No." name="credit_card_no" value="<?php echo $data_ledger['ledger']['credit_card_no']; ?>"></div>
                                            </p>
                                            </div>
                                            <div id="neft" class="receipt_mode" <?php if($data_ledger['ledger']['receipt_mode']!='NEFT'){ ?> style="display:none;" <?php } ?>>
                                            <p><label>NEFT No.</label>
                                            <div class="form-group"><input type="text" class="form-control input-medium" placeholder="NEFT No." name="neft_no" value="<?php echo $data_ledger['ledger']['neft_no']; ?>"></div>
                                            </p>
                                            </div>
										</div>
										<div class="modal-footer">
                                        	<input type="hidden" value="<?php echo $data_ledger['ledger']['id']; ?>" name="ledger_id" />
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="button" name="submit" data-dismiss="modal" class="btn blue">Save changes</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
                            </form>
							<!-- /.modal --></td>
                            <td><button type="button" name="approved" class="btn green btn-xs" ledger_id=<?php echo $data_ledger['ledger']['id']; ?>>Approved</button></td>
                            </tr>
                            
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                   			
            <?php
			exit;
        }
        if(@$this->request->query['receipt_type_data']==1)
        {
            $user_id=$this->request->query['user_id'];
			if($this->request->query['receipt_type']=='Room')
            {
                $this->loadmodel('checkout');
                $conditions=array('status' => 0,'user_id'=>$user_id);
                $invoice_data=$this->checkout->find('all',array('fields'=>array('id','guest_name','master_roomno_id','card_no','due_amount'),'conditions'=>$conditions));
                foreach($invoice_data as $data)
                {
                    @$due_amount=$data['checkout']['due_amount'];
                   
                    echo '<option class="tooltips" data-container="body" data-placement="right" data-original-title="Guest Name-'.$data['checkout']['guest_name'].', Room No.-'.$data['checkout']['master_roomno_id'].', Card No.-'.$data['checkout']['card_no'].'" pos_net_amount="'.$due_amount.'" value="'.$data['checkout']['id'].'">'.$data['checkout']['id'].'</option>';
                }
            }
            if($this->request->query['receipt_type']=='POS')
            {
                $this->loadmodel('pos_kot');
                $conditions=array('status' => 1,'flag1' => 0,'user_id'=>$user_id);
                $invoice_data=$this->pos_kot->find('all',array('fields'=>array('id','guest_name','master_roomnos_id','card_no','due_amount'),'conditions'=>$conditions));
                foreach($invoice_data as $data)
                {
                    @$due_amount=$data['pos_kot']['due_amount'];
                   
                    echo '<option class="tooltips" data-container="body" data-placement="right" data-original-title="Guest Name-'.$data['pos_kot']['guest_name'].', Room No.-'.$data['pos_kot']['master_roomnos_id'].', Card No.-'.$data['pos_kot']['card_no'].'" pos_net_amount="'.$due_amount.'" value="'.$data['pos_kot']['id'].'">'.$data['pos_kot']['id'].'</option>';
                }
            }
            else if($this->request->query['receipt_type']=='House Keeping')
            {
               
                $this->loadmodel('house_keeping');
                $conditions=array('status' => 0,'user_id'=>$user_id);
                $invoice_data=$this->house_keeping->find('all',array('fields'=>array('id','guest_name','master_roomno_id','card_no','due_amount'),'conditions'=>$conditions));
                foreach($invoice_data as $data)
                {
                    @$due_amount=$data['house_keeping']['due_amount'];
                   
                    echo '<option class="tooltips" data-container="body" data-placement="right" data-original-title="Guest Name-'.$data['house_keeping']['guest_name'].', Room No.-'.$data['house_keeping']['master_roomno_id'].', Card No.-'.$data['house_keeping']['card_no'].'" pos_net_amount="'.$due_amount.'" value="'.$data['house_keeping']['id'].'">'.$data['house_keeping']['id'].'</option>';
                }
            }
            else if($this->request->query['receipt_type']=='Other Service')
            {
               
                $this->loadmodel('other_service');
                $conditions=array('status' => 0,'user_id'=>$user_id);
                $invoice_data=$this->other_service->find('all',array('fields'=>array('id','guest_name','master_roomno_id','card_no','due_amount'),'conditions'=>$conditions));
                foreach($invoice_data as $data)
                {
                    @$due_amount=$data['house_keeping']['due_amount'];
                   
                    echo '<option class="tooltips" data-container="body" data-placement="right" data-original-title="Guest Name-'.$data['other_service']['guest_name'].', Room No.-'.$data['other_service']['master_roomno_id'].', Card No.-'.$data['other_service']['card_no'].'" pos_net_amount="'.$due_amount.'" value="'.$data['other_service']['id'].'">'.$data['other_service']['id'].'</option>';
                }
            }
            else if($this->request->query['receipt_type']=='Outlet')
            {
               
                $this->loadmodel('function_booking');
                $conditions=array('status' => 0,'user_id'=>$user_id);
                $invoice_data=$this->function_booking->find('all',array('fields'=>array('id','name','function_no','due_amount'),'conditions'=>$conditions));
                foreach($invoice_data as $data)
                {
                    @$due_amount=$data['function_booking']['due_amount'];
                   
                    echo '<option class="tooltips" data-container="body" data-placement="right" data-original-title="Guest Name-'.$data['function_booking']['name'].', Function No.-'.$data['function_booking']['function_no'].'" pos_net_amount="'.$due_amount.'" value="'.$data['function_booking']['id'].'">'.$data['function_booking']['id'].'</option>';
                }
            }
            exit;
        }
		if($this->request->query('receipt_payment_mode_fetch')==1)             /////// Ashish
        {
            $ledger_category_id=$this->request->query("q");
            $this->loadmodel('ledger_master');
           
                 $conditionss=array('ledger_category_id' => $ledger_category_id);
                $fetch_ledger_receipt=$this->ledger_master->find('all',array('conditions'=>$conditionss,'fields'=>array('id','name')));
                echo '<option value="">--- Select Master ---</option>';
                foreach($fetch_ledger_receipt as $ledger_data)
                {
                    ?><option  value="<?php echo $ledger_data['ledger_master']['id']; ?>"><?php echo  $ledger_data['ledger_master']['name']; ?></option> <?php
                }
                exit;
        }
		/////////////////////////////////////////Ashish ji////////////////////////////
		if($this->request->query('receipt_payment_mode_fetch_report1')==1)             /////// Ashish
        {
            $ledger_category_id=$this->request->query("q");
            $this->loadmodel('ledger_master');
           
                 $conditionss=array('ledger_category_id' => $ledger_category_id);
                $fetch_ledger_receipt=$this->ledger_master->find('all',array('conditions'=>$conditionss,'fields'=>array('id','name')));
                echo '<option value="">--- Select Master ---</option>';
                foreach($fetch_ledger_receipt as $ledger_data)
                {
                    ?><option  value="<?php echo $ledger_data['ledger_master']['id']; ?>"><?php echo  $ledger_data['ledger_master']['name']; ?></option> <?php
                }
                exit;
        }
		////////////////////////////////////////////////////////////
		if(@$this->request->data['add_plan_in_roomresveration']==1)
        {
            $this->loadmodel('master_room_plan');
            $conditions=array('plan_name' => $this->request->data['plan_name']);
            $plan_name_dubble=$this->master_room_plan->find('all',array('conditions'=>$conditions));
			
            if(sizeof($plan_name_dubble)==0)
            {
                $this->master_room_plan->save($this->request->data);
                echo '<option value="'.$this->master_room_plan->getLastInsertId().'">'.$this->request->data['plan_name'].'</option>';
            }
        }
		
		if(@$this->request->data['add_roomtype_in_roomresveration']==1)
        {
		
            $this->loadmodel('master_room_type');
            $conditions=array('room_type' => $this->request->data['room_type']);
            $plan_name_dubble=$this->master_room_type->find('all',array('conditions'=>$conditions));
            if(sizeof($plan_name_dubble)==0)
            {
                $this->master_room_type->save($this->request->data);
                echo '<option value="'.$this->master_room_type->getLastInsertId().'">'.$this->request->data['room_type'].'</option>';
            }
        }
		
		
		if($this->request->query('function_book_pax_amount_calc')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $rate=$q[0];
			$pax=$q[1];
			//$tax_id=$q[2];
			$this->loadmodel('master_outlet');
			$fetch_function_master_tax=$this->master_outlet->find('all',array());
			if(!empty($fetch_function_master_tax)){ 
			$last_record=$fetch_function_master_tax[0]['master_outlet']['master_tax_id'];
			$tax_id=explode(',', $last_record);
			//pr($tax_id);
			 }
			
			$this->loadmodel('master_taxe');
			$fetch_master_taxe=$this->master_taxe->find('all', array('conditions'=>array('flag' => 0 )));
			foreach($fetch_master_taxe as $tax_data)
			{ $master_taxe_id=$tax_data['master_taxe']['id']; 
			if(!empty($tax_id)){
					foreach($tax_id as $ftc_data)
					{
						if($ftc_data==$master_taxe_id)
						{
							$tax_applicable=$tax_data['master_taxe']['tax_applicable'];	
							
							$tax_amt=$rate*$tax_applicable/100;
							$rate+=$tax_amt;
						}
					}
				}
			}
			
		 echo $total_pax_amount=$rate*$pax;
			
		}
		 if($this->request->query('checkin_typeofbooking_checked')==1)
		 {
			$check_box=$this->request->query("q");
   			$this->loadmodel('master_roomno');
			
			$fetch_master_roomno=$this->master_roomno->find('all', array('conditions'=>array('flag' => "0")));
			
			if($check_box=='Group Room Booking'){
				?><select class="form-control select2 select2_sample2 input-large" name="master_roomno_id[]" id="m2_id" multiple placeholder="Select Room No." onchange="count();">
            <?php
			foreach($fetch_master_roomno as $data)
                        {
                            $room_no=$data['master_roomno']['room_no'];
                            $room_no_explode=explode(',', $room_no);
                             
                           foreach($room_no_explode as $room_nos)
                            {
                              $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$room_nos), array());
                                
                                if(!empty($room_vacant))
                                {  $roo_blank_status=$room_vacant[0]['room_checkin_checkout']['status'];
                                    if($roo_blank_status=='1')
                                    {
                                     ?>
                                        <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                    <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                <?php
                                }
                            }
                        }
						?></select>
            <?php
			}
			else
			{
				?><select class="form-control input-large" name="master_roomno_id[]" id="m2_id"  placeholder="Select Room No." onchange="count();">
            <?php
			foreach($fetch_master_roomno as $data)
                        {
                            $room_no=$data['master_roomno']['room_no'];
                            $room_no_explode=explode(',', $room_no);
                             
                           foreach($room_no_explode as $room_nos)
                            {
                              $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$room_nos), array());
                                
                                if(!empty($room_vacant))
                                {  $roo_blank_status=$room_vacant[0]['room_checkin_checkout']['status'];
                                    if($roo_blank_status=='1')
                                    {
                                     ?>
                                        <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                    <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                <?php
                                }
                            }
                        }
						?></select>
                        <?php
			}
			exit;
			
		}
		 if($this->request->query('view_tax_item_type_kot')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			//pr($q);
			$size_of_Q=sizeof($q);
			
				if($size_of_Q>1){
				$item_id=$q[0];
				 $gross=$q[1];
				}
				else
				{  $item_id=$q[0];
				}
				if(!empty($item_id)){
   			$this->loadmodel('master_item');
			$this->loadmodel('master_item_type');
			$item_master_foreach=$this->master_item->find('all', array('conditions' => array('flag' => "0", 'id' => $item_id)));
			$master_item_category=$item_master_foreach[0]['master_item']['master_itemcategory_id'];
			$mas_item_id=$item_master_foreach[0]['master_item']['master_item_type_id'];
			$billing_rate=$item_master_foreach[0]['master_item']['billing_rate'];
			
			$fetch_item_category=$this->master_item_type->find('all', array('conditions' => array('id' => $mas_item_id,'master_itemcategory_id'=> $master_item_category)));
			$tax_id=$fetch_item_category[0]['master_item_type']['master_tax_id'];
			$tax_id_explod =explode(',', $tax_id);
				$this->loadmodel('master_tax');
				$total_tax_amount=0;$total_actual=0;
				foreach($tax_id_explod as $tax_id)
				{
					$tex_per_item=$this->master_tax->find('all', array('conditions' => array('flag' => "0", 'id' => $tax_id)));
					//pr($tex_per_item); 
					if(!empty($tex_per_item)){
						 $tax_applicable=$tex_per_item[0]['master_tax']['tax_applicable'];
						
						if($size_of_Q>1){
								$tax_amount=$gross * $tax_applicable/100;
								$total_actual=$gross+$tax_amount;
								$total_tax_amount+=$tax_amount; 
								$gross=$total_actual;
						}else{ 
									$tax_amount=$billing_rate * $tax_applicable/100;
									$total_actual=$billing_rate+$tax_amount;
									$total_tax_amount+=$tax_amount; 
									$billing_rate=$total_actual;
								}
						
						
						
						
					}
				}
				
			echo number_format($total_tax_amount,2);
			}
			exit;
		}
		//////////////////////////////////
		
		 if($this->request->query('view_tax_item_type_kott')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			//pr($q);
			$size_of_Q=sizeof($q);
			
				if($size_of_Q>1){
				$item_id=$q[0];
				$gross=$q[1];
				}
				else
				{  $item_id=$q[0];
				}
				if(!empty($item_id)){
   			$this->loadmodel('master_item');
			$this->loadmodel('master_item_type');
			$item_master_foreach=$this->master_item->find('all', array('conditions' => array('flag' => "0", 'id' => $item_id)));
			$master_item_category=$item_master_foreach[0]['master_item']['master_itemcategory_id'];
			$mas_item_id=$item_master_foreach[0]['master_item']['master_item_type_id'];
			$billing_rate=$item_master_foreach[0]['master_item']['billing_rate'];
			
			
			$fetch_item_category=$this->master_item_type->find('all', array('conditions' => array('id' => $mas_item_id,'master_itemcategory_id'=> $master_item_category)));
			$tax_id=$fetch_item_category[0]['master_item_type']['master_tax_id'];
			$tax_id_explod =explode(',', $tax_id);
				$this->loadmodel('master_tax');
				$total_tax_amount=0;
				foreach($tax_id_explod as $tax_id)
				{
					$tex_per_item=$this->master_tax->find('all', array('conditions' => array('flag' => "0", 'id' => $tax_id)));
					if(!empty($tex_per_item)){
						$tax_applicable=$tex_per_item[0]['master_tax']['tax_applicable'];
						if($size_of_Q>1){
						$tax_calc=$gross / 100 ;
						}else
						{$tax_calc=$billing_rate / 100 ;}
						$tax_amount=$tax_calc *  $tax_applicable;
						$total_tax_amount+=$tax_amount;
					}
				}
				
			echo $total_tax_amount;
			}
			exit;
		}
		//////////////////////////////////
		if($this->request->query('room_checkin_checkout_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_room_plan');
			$this->loadmodel('company_registration');
			$conditions = array ('arrival_date between ? and ?' => array($start_date, $end_date),'flag' => 0);
				$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all', array('conditions' => $conditions, 'group'=>'card_no'));
				$fetch_room_in_check=$this->room_checkin_checkout->find('all', array('conditions' => $conditions, 'fields'=>array('card_no','master_roomno_id')));
				//pr($fetch_room_in_check);
				//exit;
				
				$fetch_master_roomno=$this->master_roomno->find('all');
				$fetch_master_room_type=$this->master_room_type->find('all');
				$fetch_master_room_plan=$this->master_room_plan->find('all');
				$fetch_company_registration=$this->company_registration->find('all');
		?>
		
        
<table align="center" style="margin-top:5%"> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase"> Date from <?php echo $start_date1;?> to <?php echo $end_date1; ?> </span>
</td></tr></table>
    <table class="table table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Card no</th>
        <th>Resv. No.</th>
        <th>Arr. Date</th>
         <th>Dep. Date</th>
        <th>Company</th>
        <th>Guest Name</th>
        <th>Room No.</th>
        <th>Type</th>
        <th>Plan</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#0C6">Charge</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#009" class="print-hide">Edit</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#F00" class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
       
     	<?php
		$i=0;
		$cn=0;
        foreach($fetch_room_checkin_checkout as $data)
			{	
				 $i++;
				 $id_room_checkin_checkout=$data['room_checkin_checkout']['id'] ;
				$arrival_data=$data['room_checkin_checkout']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $data['room_checkin_checkout']['checkout_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
                 
        $guest_name=$data['room_checkin_checkout']['guest_name'];
        $permanent_address=$data['room_checkin_checkout']['permanent_address'];
        $arriving_from=$data['room_checkin_checkout']['arriving_from'];
		$room_type_id=$data['room_checkin_checkout']['room_type_id'];
        $next_destination=$data['room_checkin_checkout']['next_destination']; 
        $nationality=$data['room_checkin_checkout']['nationality'];
		$master_roomno_id=$data['room_checkin_checkout']['master_roomno_id']; 
         $city=$data['room_checkin_checkout']['city'];
        $duration=$data['room_checkin_checkout']['duration']; 
        $checkout_date=$data['room_checkin_checkout']['checkout_date'];
        $room_discount=$data['room_checkin_checkout']['room_discount'];
        $pax=$data['room_checkin_checkout']['pax'];    
        $room_charge=$data['room_checkin_checkout']['room_charge'];
        $total_room=$data['room_checkin_checkout']['total_room'];
        $taxes=$data['room_checkin_checkout']['taxes'];
        $advance_taken=$data['room_checkin_checkout']['advance_taken'];
        $child=$data['room_checkin_checkout']['child'];
        $id_proof=$data['room_checkin_checkout']['id_proof'];
        $billing_instruction=$data['room_checkin_checkout']['billing_instruction'];
		$card=$data['room_checkin_checkout']['card_no'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['room_reservation_id']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
         <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
        <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
       
        <td><?php
            echo $data['room_checkin_checkout']['combine_room_id'];
	?></td>
     <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
        
        <td class="print-hide"><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="checkin_edit?id=<?php echo $id_room_checkin_checkout; ?>"><i class="fa fa-edit"></i> Edit </a>
            
        <td class="print-hide">
            <a class="btn red btn-xs" data-toggle="modal" href="#delete_<?php echo $id_room_checkin_checkout; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete_<?php echo $id_room_checkin_checkout; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>

                        </div>
                       
                        <div class="modal-footer">
                        <form method="post" name="delete_<?php echo $id_room_checkin_checkout; ?>" >
                         <input type="hidden" name="delete_checkin_id" value="<?php echo $id_room_checkin_checkout; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_room_checkin_id" value="delete_room_checkin_id" class="btn blue">Delete</button>
</form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
         <?php
		exit;
		}
		
		////////////////////////////////////////////////////////////////////
		if($this->request->query('c_reg_view_search')==1)
        {
            $s_querys=$this->request->query("q");
            
			//$q=json_decode($q);
            //$start_date1=$q[0];
			//$end_date1=$q[1];
			//$start_date=date("Y-m-d",strtotime($start_date1));
			//$end_date=date("Y-m-d",strtotime($end_date1));
			$this->loadmodel('company_registration');
			$this->loadmodel('company_category');
			$this->loadmodel('master_room_plan');
				$conditions = array ('flag' => 0);
					//$fatch_book_room=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
					
					if(!empty($s_querys))
					{
				$fetch_company_registration=$this->company_registration->find('all', array('conditions'=>array('company_registration.company_name LIKE'=> '%'.$s_querys.'%')));
					}
					else
					{
						$fetch_company_registration=array();
					}
					
				//$fetch_company_registration=$this->company_registration->find('all', array('conditions' => $conditions));
		        $fetch_company_category=$this->company_category->find('all', array('conditions'=>array('flag' => "0")));
				$fetch_master_room_plan=$this->master_room_plan->find('all', array('conditions'=>array('flag' => "0")));
		 ?>
<table class="table table-bordered table-hover" style="font-size: 13px;" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Company Name</th>
       <th>Company Category</th>
        <th>Person Name</th>
        <th>Mobile No.</th>
       <th>Email id</th>
        <th>Address</th>
        <th class="print-hide">Edit</th>
        <th class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_company_registration as $data){ 
		 $i++;
		 $id_company_registration=$data['company_registration'] ['id'];
         $company_name=$data['company_registration'] ['company_name'];
             $company_category_id=$data['company_registration'] ['company_category_id'];
            $pan_no=$data['company_registration'] ['pan_no'];
            $service_tax_no=$data['company_registration'] ['service_tax_no'];
            $authorized_person_name=$data['company_registration'] ['authorized_person_name'];
            $authorized_contact_no=$data['company_registration'] ['authorized_contact_no'];
            $mobile_no=$data['company_registration'] ['mobile_no'];
            $authorized_email_id=$data['company_registration'] ['authorized_email_id'];
            $c_address=$data['company_registration'] ['c_address'];
            $master_plan_id=$data['company_registration']['master_plan_id'];
            $p_address=$data['company_registration'] ['p_address'];
            ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['company_registration'] ['company_name']; ?></td>
        <td><?php
        echo @$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$data['company_registration']['company_category_id']), array()); ?>
        </td>
        <td><?php echo $data['company_registration'] ['authorized_person_name']; ?></td>
        <td><?php echo $data['company_registration'] ['mobile_no']; ?></td>
        <td><?php echo $data['company_registration'] ['authorized_email_id']; ?></td>
        <td><?php echo $data['company_registration'] ['c_address']; ?></td>
        
									<td class="print-hide"><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppupreg_<?php echo $id_company_registration; ?>"><i class="fa fa-edit"></i> Edit </a>
								<div class="modal fade bs-modal-full" id="poppupreg_<?php echo $id_company_registration; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id_company_registration; ?>" id="edit_company_registration<?php echo $i; ?>">
                                        <div class="table-responsive">
										
                        <table class="table self-table" style=" width:90% !important;">
                        <tr>   
                        <input type="hidden" name="c_registration_id" value="<?php echo $id_company_registration; ?>" />

                             
                       
                        <td><div class="form-group"><label>Company Name <span style="color:#E02222">* </span></label></div></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Company Name" name="edit_company_name" id="edit_company_name" value="<?php echo $company_name; ?>" required></div></td>
                         <td><div class="form-group"><label>Company Category <span style="color:#E02222">* </span></label></div></td>
                      	<td><div class="form-group"><select class="form-control input-small" name="edit_company_category_id" required>
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_company_category as $data)
                                            {
                                            	?>
                                                <option <?php if($company_category_id==$data['company_category']['id']){?> selected="selected" <?php }?> value="<?php echo $data['company_category']['id'];?>"><?php echo $data['company_category']['category_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                        <td><label>PAN No.</label></td>
                      	<td><input type="text" class="form-control input-inline input-small" width="80px" placeholder="PAN No." name="edit_pan_no" id="edit_pan_no" 
                        value="<?php echo $pan_no; ?>" maxlength="10"></td>
                        </tr>
                       
                        <tr>
                       
                        <td><label>Service Tax No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Service Tax No." name="edit_service_tax_no" 
                        id="edit_service_tax_no" value="<?php echo $service_tax_no; ?>" ></td>
                        
                        <td><label>Authorized Person Name</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Authorized Person Name" name="edit_authorized_person_name" 
                        id="edit_authorized_person_name" value="<?php echo $authorized_person_name; ?>" required></td>
                        
                        
                        <td><label>Authorized Contact No.</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-phone"></i>
											</span>
                        
                        <input type="text" class="form-control input-inline" placeholder="Contact No." 
                        name="edit_authorized_contact_no" id="edit_authorized_contact_no" onkeypress="javascript:return isNumber (event)" value="<?php echo $authorized_contact_no; ?>" maxlength="10" style="width:91%"></div></td>
                        </tr>
                        <tr>
                        <td><label>Mobile No.</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-mobile-phone"></i>
											</span>
                        
                        <input type="text" class="form-control input-inline" onkeypress="javascript:return isNumber (event)" style="width:92%" placeholder="Mobile No." name="edit_mobile_no" 
                        id="edit_mobile_no"  value="<?php echo $mobile_no; ?>" maxlength="10"></div></td>
                        
                        <td><label>Authorized Email id</label></td>
                        <td>
                         <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
											</span>
                        <input type="text" class="form-control input-inline" placeholder="Email id" name="edit_authorized_email_id" 
                        id="edit_authorized_email_id" value="<?php echo $authorized_email_id; ?>" style="width:91%"></div></td>
                        
                        <td><div class="form-group"><label>Master Plan <span style="color:#E02222">* </span></label></div></td>
                        <td >
                        <div class="form-group">
                    		<select class="form-control input-small" name="edit_master_plan_id" id="edit_master_plan_id"  >
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_room_plan as $data)
                                {
                                    ?>
                                    <option <?php if($master_plan_id==$data['master_room_plan']['id']){?> selected="selected" <?php } ?> value="<?php echo $data['master_room_plan']['id'];?>"><?php echo $data['master_room_plan']['plan_name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                   		 </div>
                        </td>
                        </tr>
                        <tr>
                        <td colspan="10">
                         <div style="width:52%; float:left; ">
                             <div style="width:70%; float:left ">
                            <label>Correspondence Address</label>
                            <textarea class="form-control" rows="2" cols="3" id="edit_c_address<?php echo $i;?>" name="edit_c_address" style="resize:none;"><?php echo $c_address; ?></textarea>
                            </div>
                            <div style="width:20%; float:right ">
                            <br />
                            <label class="checkbox-inline" >
                            <input type="checkbox" name="same" onclick="same_as_edit(this.id,this.value)" value="<?php echo $i;?>" id="same<?php echo $i;?>"/>Same as
                            Correspondence
                            </label>
                            </div>
                        </div>
                        <div style="width:35%; float:right">
                        <label>Permanent Address</label>
                        <textarea class="form-control" cols="3" rows="2" id="edit_p_address<?php echo $i;?>"  name="edit_p_address" style="resize:none;"><?php echo $p_address; ?></textarea>
                        </div>
                        </td>
                        </tr>
                         <tr><td colspan="4" align="center"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_company_registration" value="edit_company_registration" class="btn blue">Update</button>
										</div></center></td></tr>
                        </table>
										</div></form>
                                        </div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                            
               </td>
<td class="print-hide"><a class="btn red btn-xs" data-toggle="modal" href="#deletereg<?php echo $id_company_registration; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            <div class="modal fade" id="deletereg<?php echo $id_company_registration; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                         <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                         </div>
                       <div class="modal-footer">
                        <form method="post" name="deletereg<?php echo $id_company_registration; ?>" >
                         <input type="hidden" name="delete_c_registration" value="<?php echo $id_company_registration; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_company_registration" value="delete_company_registration" class="btn blue">Delete</button>
                         </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
        <?php
			
		exit;		
		}
/////////////////////////////////////////////////

		//////////////////////////////////
		if($this->request->query('room_checkin_checkout_view_search')==1)
        {
            $s_query=$this->request->query("q");
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_room_plan');
			$this->loadmodel('company_registration');
			$conditions = array ('flag' => 1, 'status' => 1);
					//$fatch_book_room=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
					
					if(!empty($s_query))
					{
				$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all', array('conditions'=>array('room_checkin_checkout.guest_name LIKE'=> '%'.$s_query.'%')));
					}
					else
					{
						$fetch_room_checkin_checkout=array();
					}
				$fetch_master_roomno=$this->master_roomno->find('all');
				$fetch_master_room_type=$this->master_room_type->find('all');
				$fetch_master_room_plan=$this->master_room_plan->find('all');
				$fetch_company_registration=$this->company_registration->find('all');
		?>
		
        

    <table class="table table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Card no</th>
        <th>Resv. No.</th>
        <th>Arr. Date</th>
         <th>Dep. Date</th>
        <th>Company</th>
        <th>Guest Name</th>
        <th>Room No.</th>
        <th>Type</th>
        <th>Plan</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#0C6">Charge</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		$cn=0;
        foreach($fetch_room_checkin_checkout as $data)
			{	
				 $i++;
				 $id_room_checkin_checkout=$data['room_checkin_checkout']['id'] ;
				$arrival_data=$data['room_checkin_checkout']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $data['room_checkin_checkout']['checkout_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
                 
        $guest_name=$data['room_checkin_checkout']['guest_name'];
        $permanent_address=$data['room_checkin_checkout']['permanent_address'];
        $arriving_from=$data['room_checkin_checkout']['arriving_from'];
		$room_type_id=$data['room_checkin_checkout']['room_type_id'];
        $next_destination=$data['room_checkin_checkout']['next_destination']; 
        $nationality=$data['room_checkin_checkout']['nationality'];
		$master_roomno_id=$data['room_checkin_checkout']['master_roomno_id']; 
         $city=$data['room_checkin_checkout']['city'];
        $duration=$data['room_checkin_checkout']['duration']; 
        $checkout_date=$data['room_checkin_checkout']['checkout_date'];
        $room_discount=$data['room_checkin_checkout']['room_discount'];
        $pax=$data['room_checkin_checkout']['pax'];    
        $room_charge=$data['room_checkin_checkout']['room_charge'];
        $total_room=$data['room_checkin_checkout']['total_room'];
        $taxes=$data['room_checkin_checkout']['taxes'];
        $advance_taken=$data['room_checkin_checkout']['advance_taken'];
        $child=$data['room_checkin_checkout']['child'];
        $id_proof=$data['room_checkin_checkout']['id_proof'];
        $billing_instruction=$data['room_checkin_checkout']['billing_instruction'];
		$card=$data['room_checkin_checkout']['card_no'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['room_reservation_id']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>

        <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
        <td><?php
            echo $data['room_checkin_checkout']['master_roomno_id'];
	?></td>
     <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
        
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
         <?php
		exit;
		}
		
		////////////////////////////////////////////////////////////////////

		if($this->request->query('room_checkout_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_room_plan');
			$this->loadmodel('company_registration');
			$conditions = array ('checkout_date between ? and ?' => array($start_date, $end_date),'flag' => 0, 'status' => 1);
					//$fatch_book_room=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all', array('conditions' => $conditions, 'group'=> 'multi_flag'));
				$fetch_master_roomno=$this->master_roomno->find('all');
				$fetch_master_room_type=$this->master_room_type->find('all');
				$fetch_master_room_plan=$this->master_room_plan->find('all');
				$fetch_company_registration=$this->company_registration->find('all');
		?>
		
<table align="center"  style="margin-top:2% "> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase"> Date from <?php echo $start_date1;?> to <?php echo $end_date1; ?> </span>
</td></tr></table>
    <table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Card No.</th>
        <th>Arr.</th>
        <th>Dep.</th>
        <th>Company</th>
        <th>Name</th>
        <th>Room No.</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#093">Total Amount</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#03F">Pay By Room</th>
        <th style="font:Georgia, 'Times New Roman', Times, serif; color:#C00">Paid</th>
        <th class="print-hide">Invoice</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_checkin_checkout as $data)
			{	
				 $i++;
				 $id_room_checkin_checkout=$data['room_checkin_checkout']['id'] ;
				$arrival_data=$data['room_checkin_checkout']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $data['room_checkin_checkout']['checkout_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
                 
        $guest_name=$data['room_checkin_checkout']['guest_name'];
        $permanent_address=$data['room_checkin_checkout']['permanent_address'];
        $arriving_from=$data['room_checkin_checkout']['arriving_from'];
		$room_type_id=$data['room_checkin_checkout']['room_type_id'];
        $next_destination=$data['room_checkin_checkout']['next_destination']; 
        $nationality=$data['room_checkin_checkout']['nationality'];
		$master_roomno_id=$data['room_checkin_checkout']['master_roomno_id']; 
         $city=$data['room_checkin_checkout']['city'];
        $duration=$data['room_checkin_checkout']['duration']; 
        $checkout_date=$data['room_checkin_checkout']['checkout_date'];
        $room_discount=$data['room_checkin_checkout']['room_discount'];
        $pax=$data['room_checkin_checkout']['pax'];    
        $room_charge=$data['room_checkin_checkout']['room_charge'];
        $total_room=$data['room_checkin_checkout']['total_room'];
        $taxes=$data['room_checkin_checkout']['taxes'];
        $advance_taken=$data['room_checkin_checkout']['advance_taken'];
        $child=$data['room_checkin_checkout']['child'];
        $id_proof=$data['room_checkin_checkout']['id_proof'];
        $billing_instruction=$data['room_checkin_checkout']['billing_instruction'];
		$card=$data['room_checkin_checkout']['card_no'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
        <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
        
        <td><?php
            echo $data['room_checkin_checkout']['master_roomno_id'];
	?>
    
    <!--</td>
    <?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>-->
        
        
        <th><?php echo $data['room_checkin_checkout']['totalnetamount']; ?></th>
        <td><b><?php echo $data['room_checkin_checkout']['paid_room']; ?></b>
		<b><?php echo $data['room_checkin_checkout']['paid_amt']; ?></b></td>
        
        <th><?php echo $data['room_checkin_checkout']['cash_paid']; ?></th>
        <td class="print-hide"><a href="informationbill?id=<?php echo $id_room_checkin_checkout; ?>" target="_blank" class="btn blue btn-xs"><i class="fa fa-print"></i> Print</a>
        </td>
        
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
         <?php
		exit;
		}
		
        /////////////////////////////////////////////////////////////////
		if($this->request->query('checkin_add_data')==1)
        {
            $q=$this->request->query("q");
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_room');
			$this->loadmodel('master_room_plan');
			$room_type_id=$q+1;
			$fatch_book_room=$this->room_checkin_checkout->find('all');
			$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all');
			$fetch_master_room_type=$this->master_room_type->find('all');
			$fetch_master_roomno=$this->master_roomno->find('all');
			$fetch_master_room=$this->master_room->find('all');
			$fetch_master_room_plan=$this->master_room_plan->find('all');
			?>
                   <tr id="row<?php echo $room_type_id; ?>"> 
                   <td class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small" 
                    name="room_type_id[]" onchange="room_rate();"  id="rtid<?php echo $room_type_id;?>" placeholder="Room Type">
                    <option value="">-Select--</option>
                    <?php
                    foreach($fetch_master_room_type as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></label>
                </td>
                    <td><div class="form-group" style="float:left; width:60%"><select class=" form-control input-small" id="plid<?php echo $room_type_id;?>" name="plan_id[]" onchange="room_rate();"  placeholder="Plan Name">
                    <option value="">-Select--</option>
                    <?php
                    foreach($fetch_master_room_plan as $data)
                    {
                        ?>
                        <option value=
                        "<?php echo $data['master_room_plan']['id'];?>">
                        <?php echo $data['master_room_plan']['plan_name'];?></option>
                        <?php
                    }
                    ?>
                    </select></div>
                    </td>
                   
                        <td class="form-group"><label><select class="form-control select2 select2_sample2 input-small" name="master_roomno_id[]" id="m2_id<?php echo $room_type_id;?>" multiple placeholder="Select Room No." onchange="count();">
                        <?php
                        foreach($fetch_master_roomno as $data)
                        {
                           $room_no=$data['master_roomno']['room_no'];
                            $room_no_explode=explode(',', $room_no);
                             
                           foreach($room_no_explode as $room_nos)
                            {
                              $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$room_nos), array());
                                
                                if(!empty($room_vacant))
                                {  $roo_blank_status=$room_vacant[0]['room_checkin_checkout']['status'];
                                    if($roo_blank_status=='1')
                                    {
                                     ?>
                                        <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                    <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                <?php
                                }
                            }
                        }
                                    ?>
                    </select></label>
                    </td>
            <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Total" name="total_room[]" id="total_room<?php echo $room_type_id;?>" readonly="readonly"></label></td> 
            <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Charge" name="room_charge[]" id="room_charge_id<?php echo $room_type_id;?>" onkeyup="count();"></label></td>
            
            <td><input type="hidden" class="form-control input-inline input-xsmall" readonly="readonly" value="0" placeholder="Tax" name="taxes[]" id="tax_id<?php echo $room_type_id;?>"></td>
            <td class="form-group"><input type="text" class="form-control input-inline input-xsmall" value="0" placeholder="Discount" name="room_discount[]" id="discount_id<?php echo $room_type_id;?>"></td>

             <td><input type="text" class="form-control input-inline input-xsmall" placeholder="Total"readonly="readonly" name="tg[]" id="tg<?php echo $room_type_id;?>"></td>
              
            <td><label><button type="button"  onclick="delete_row_data(<?php echo $room_type_id; ?>)" class="btn red btn-sm">Delete</button></label></td><tr>
    
		<?php 
		exit;
		}
		/////////////////////////////////
		 /////////////////////////////////////////////////////////////////
		if($this->request->query('checkin_add_dt')==1)
        {
            $q=$this->request->query("q");
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('room_reservation');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_room');
			$this->loadmodel('master_room_plan');
			$room_type_id=$q+1;
			$fatch_book_room=$this->room_reservation->find('all');
			$fetch_room_checkin_checkout=$this->room_reservation->find('all');
			$fetch_master_room_type=$this->master_room_type->find('all');
			$fetch_master_roomno=$this->master_roomno->find('all');
			$fetch_master_room=$this->master_room->find('all');
			$fetch_master_room_plan=$this->master_room_plan->find('all');
			?>
                   <tr id="<?php echo $room_type_id; ?>"> 
                   <td class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small" 
                    name="room_type_id[]" onchange="room_rate();"  id="rtid<?php echo $room_type_id;?>" placeholder="Room Type">
                    <option value="">-Select--</option>
                    <?php
                    foreach($fetch_master_room_type as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></label>
                </td>
                   
                     
            <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Total" name="total_room[]" id="total_room<?php echo $room_type_id;?>"></label></td> 
            <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall" placeholder="Charge" name="room_charge[]" id="room_charge_id<?php echo $room_type_id;?>" onkeyup="count();"></label></td>
            
            
                     <td><input type="hidden" class="form-control input-inline input-xsmall" readonly="readonly" value="0" placeholder="Tax" name="taxes[]" id="tax_id<?php echo $room_type_id;?>"></td>
            <td class="form-group"><input type="text" class="form-control input-inline input-xsmall" value="0" placeholder="Discount" name="room_discount[]" id="discount_id<?php echo $room_type_id;?>"></td>
            <td><label><button type="button"  onclick="delete_row_data(<?php echo $room_type_id; ?>)" class="btn red btn-sm">Delete</button></label></td><tr>
    
		<?php 
		exit;
		}
		
		 /////////////////////////////////////////////////////////////////
		if($this->request->query('checkin_add_dt_tr')==1)
        {
            $q=$this->request->query("q");
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('room_reservation');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_room');
			$this->loadmodel('master_room_plan');
			$this->loadmodel('fo_room_booking');
			$master_room_type_id=$q+1;
			$fatch_book_room=$this->room_reservation->find('all');
			$fetch_room_checkin_checkout=$this->room_reservation->find('all');
			$fetch_master_room_type=$this->master_room_type->find('all');
			$fetch_master_roomno=$this->master_roomno->find('all');
			$fetch_master_room=$this->master_room->find('all');
			$fetch_master_room_plan=$this->master_room_plan->find('all');
			$fetch_fo_room_booking=$this->fo_room_booking->find('all');
			?>
                   <tr id="<?php echo $master_room_type_id; ?>"> 
                   <td><label>Room Type</label></td>
                   <td class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small select2me" 
                    name="master_room_type_id[]" onchange="room_tariff();"  id="rtid<?php echo $master_room_type_id;?>" placeholder="Select...">
                    <option value=""></option>
                    <?php
                    foreach($fetch_master_room_type as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_room_type']['id'];?>"><?php echo $data['master_room_type']['room_type'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></label>
                </td>
                <td><label>Tarriff Rate</label></td>
                        <td>
                        <div class="input-group">
                        <span class="input-group-addon">
                        <i class="fa fa-rupee"></i>
                        </span>
                        <input type="text" class="form-control input-inline" style="width:57%" placeholder="Tarriff Rate" name="special_rate[]" id="special_rate<?php echo $master_room_type_id;?>" ></div></td>
                        
            <td><label><button type="button"  onclick="delete_row_data(<?php echo $master_room_type_id; ?>)" class="btn red btn-sm">Delete</button></label></td><tr>
		<?php 
		exit;
		}
		/////////////////////////////////////////////////////////////////
		
		if($this->request->query('plankot_add_data')==1)
        {
            $q=$this->request->query("q");
			$this->loadmodel('plan_item');
			$this->loadmodel('plan_item_category');
			$item_name=$q+1;
			
			$fetch_plan_item=$this->plan_item->find('all');
			$fetch_plan_item_category=$this->plan_item_category->find('all');
			?>
                   <tr id="<?php echo $item_name; ?>"> 
                   <td><label>Item</label></td>
            <td class="form-group"><label><input type="text" class="form-control input-inline input-small" placeholder="" name="item_name<?php echo $item_name; ?>" id="item_name<?php echo $item_name;?>"></label></td> 
            <td><label>Rate</label></td>
            <td class="form-group"><label><input type="text" class="form-control input-inline input-small" placeholder="" name="item_cost<?php echo $item_name; ?>" id="item_cost<?php echo $item_name;?>" ></label></td>
              
            <td><label><button type="button"  onclick="delete_row_data(<?php echo $item_name; ?>)" class="btn red btn-sm">Delete</button></label></td><tr>
    
		<?php 
		exit;
		}
		
		//////////////////////////////////////////New Checkout...../////////////////////////////////
		
			////////////////////////////
	if($this->request->query('check_out_all_room_details_out_time')==1)
	{
		$i=0;
		$id=$this->request->query("q");
		$view_table='';
		$total_amount=0;	
		if($id>0){ 
			$master_roomno_id=explode(',', $id);
			
			foreach($master_roomno_id as $checkin_id)
			{ $i++;
				$view_table.='<div style="width:100%;">
				<fieldset>
					<legend>
					<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Room Details</strong></h5></span> </legend>                                          
					<table class="table self-table" style="margin-top:0%; width:100% !important; " border="0">
					<tr><td colspan="8">';
				$view_table.='<div style="width:10; max-height:150px;overflow-y:scroll">
				<fieldset>
				<legend>
				<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Room View</strong></h5></span>
				</legend>
				<table class="table table-bordered table-hover">
				<thead>                            
				<tr>
				<th style="text-align:center">Room No.</td>
				<th style="text-align:center">Duration</td>
				<th style="text-align:center">Amount </td>
				<th style="text-align:center">Total Amount </td>
				<th style="text-align:center">Tax</td>
				<th style="text-align:center">Gross Amount</td>
				<th style="text-align:center">Discount(%)</td>
				
				<th style="text-align:center">Room Amount</th>
				</tr></thead>';
				/////////////// ROOM DETAILS
				$this->loadmodel('room_checkin_checkout');
				$fetch_checkin_no=$this->room_checkin_checkout->find('all',array('conditions'=>array('id' => $checkin_id)));
				foreach($fetch_checkin_no as $ftc_data)
				{
					
					 $edit_duration=$ftc_data['room_checkin_checkout']['duration'];
					 $arrival_date=$ftc_data['room_checkin_checkout']['arrival_date'];
					 $currntdate=date('Y-m-d');
					 
					$result1 = array();
					$currentTime = strtotime($arrival_date);
					$endTime = strtotime($currntdate);
					while ($currentTime <= $endTime) 
					{
						if (date('N', $currentTime) < 8)
						{
							$result1[] = date('Y-m-d', $currentTime);
						}
						$currentTime = strtotime('+1 day', $currentTime);
					}
					 $total_duration=sizeof($result1);
					 $edit_advance_taken=$ftc_data['room_checkin_checkout']['advance_taken'];
					 $edit_room_charge=$ftc_data['room_checkin_checkout']['room_charge'];
					 $edit_card_no=$ftc_data['room_checkin_checkout']['card_no'];
					 $edit_room_discount=$ftc_data['room_checkin_checkout']['room_discount'];
					 $edit_room_type_id=$ftc_data['room_checkin_checkout']['room_type_id'];
					 $room_no=$ftc_data['room_checkin_checkout']['master_roomno_id'];
					 $company_id=$ftc_data['room_checkin_checkout']['company_id'];
					 $edit_taxes=$ftc_data['room_checkin_checkout']['taxes'];
					 $edit_room_type_id=$ftc_data['room_checkin_checkout']['room_type_id'];
					 
					$totaly_charge=$total_duration*$edit_room_charge;
					 
					 
			     	// $extrabed=$ftc_data['room_checkin_checkout']['extra_bed_tot'];
				
						 $this->loadmodel('master_room');
						 $master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $edit_room_type_id, 'flag' => "0")));
						
							if(!empty($master_room))
							{		
							 $tax_id=$master_room[0]['master_room']['master_tax_id'];
							   $tax_id_explod =explode(',', $tax_id);
							   
								$this->loadmodel('master_tax');
								$total_tax_amount=0;
								unset($tax_applicable);
									foreach($tax_id_explod as $tax_id)
									{	
										$tex_per_item=$this->master_tax->find('all', array('conditions' => array('flag' => "0", 'id' => $tax_id)));
										if(!empty($tex_per_item)){
											 $tax_applicable[]=$tex_per_item[0]['master_tax']['tax_applicable'];
										}
										else
										{ $tax_applicable=0; }
									}
							}
							$gross_a=round($total_duration*$edit_room_charge);
							$room_dis=round(($gross_a*$edit_room_discount)/100);
							
						 $gross_amount=round(($total_duration*$edit_room_charge)-$room_dis);
						 $total_tax_amt=0;
						 //$gross_amount=$gross_amount+$total_tax_amt;
						 foreach($tax_applicable as $tax)
						 {
							$total_tax_amt+=($gross_amount*$tax)/100;
						   $gross_amount+=$total_tax_amt;
                         }
							$gross_amountttt=round(($total_duration*$edit_room_charge)-$room_dis);
							$total_gross=$gross_amountttt+$total_tax_amt; //////////////// TOTAL GROSS
							$main_gross=$gross_a+$total_tax_amt;
							$total_room_amount=round($total_gross); //////////// TOTAL ROOM AMOUNT
							$total_amount+=$total_room_amount; 
							
					$view_table.='<tr>
					<input type="hidden" name="edit_rnoo'.$i.'" value="'.$room_no.'">
					<input type="hidden" name="edit_duration'.$i.'" value="'.$total_duration.'">
					<td align="center"><span style="font-size:12px;">'.$room_no.'</span></td>
					<td align="center"><span style="font-size:12px;">'.$total_duration.'</span></td>
					<td align="center"><span style="font-size:12px;">'.$edit_room_charge.'</span></td>
					<input type="hidden" name="edit_totaly_charge'.$i.'" value="'.$totaly_charge.'">
					<td align="center"><span style="font-size:12px;">'.$totaly_charge.'</span></td>
					<input type="hidden" name="edit_totaltax'.$i.'" value="'.$total_tax_amt.'">
					<input type="hidden" name="edit_taxesed'.$i.'" value="'.$edit_taxes.'">
					<td align="center"><span style="font-size:12px;">'.round($total_tax_amt).'</span></td>
					<input type="hidden" name="edit_tg'.$i.'" value="'.$main_gross.'">
					<td align="center"><span style="font-size:12px;">'.round($main_gross).'</span></td>
                    <input type="hidden" name="edit_room_discountt'.$i.'" value="'.$room_dis.'">					
					<input type="hidden" name="edit_room_discount'.$i.'" value="'.$edit_room_discount.'">
					<td align="center"><span style="font-size:12px;">'.$edit_room_discount.'</span></td>
					<input type="hidden" name="edit_net_amount'.$i.'" value="'.$total_room_amount.'">
					<td align="center"><span style="font-size:12px;">'.$total_room_amount.'</span></td>
					</tr>';
					 
				}
				$view_table.='</table></fieldset></div>';
				/////////////////////////// POS DATA
				
				$this->loadmodel('pos_kot');
			if(!empty($edit_card_no) && !empty($room_no))
			{ $tot_kot_due_amt=0;
			    $conditions=array('card_no' => $edit_card_no, 'flag' => "0" , 'master_roomnos_id' => $room_no);
				$fetch_pos_no=$this->pos_kot->find('all', array('conditions'=>$conditions));
				$check=sizeof($fetch_pos_no);
				if($check>0)
				{ 
				$view_table.='<div style="width:10; max-height:150px;overflow-y:scroll"><fieldset>
				<legend>
				<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>POS View</strong></h5></span>
				</legend>
				<table class="table table-bordered table-hover" height="50px" >
				<thead>                            
				<tr>
				<th style="text-align:center">Item</td>
				<th  style="text-align:center">Quantity </td>
				<th  style="text-align:center" > Rate  </td>
				<th  style="text-align:center">Gross  </td>
				<th style="text-align:center" >Taxes</td>
				<th  style="text-align:center">Amount </td>
				</tr></thead>';
				$grandamount=0;
					foreach($fetch_pos_no as $pos_data){
					$pos_kot_id=$pos_data['pos_kot']['id'];
					$payment_type=$pos_data['pos_kot']['payment_type'];
					$pos_amountt=$pos_data['pos_kot']['due_amount'];
					/*if($payment_type==2)
					{
						$pos_amountt=$pos_data['pos_kot']['pos_amountt'];
					}*/
					//$bill_settle_due=$pos_data['pos_kot']['bill_settle_due'];
					$tot_kot_due_amt+=$pos_amountt;
					$this->loadmodel('pos_kot_item');
					$fetch_poskot_item=$this->pos_kot_item->find('all',array('conditions'=>array('pos_kots_id' => $pos_kot_id)));
					foreach($fetch_poskot_item as $ftc_data)
					{ 
					$edit_master_items_id=@$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$ftc_data['pos_kot_item']['master_items_id']), array());
					
					$edit_quantity=$ftc_data['pos_kot_item']['quantity'];
					$edit_rate=$ftc_data['pos_kot_item']['rate'];
					$edit_gross=$ftc_data['pos_kot_item']['gross'];
					$edit_taxes=$ftc_data['pos_kot_item']['taxes'];
					$edit_amount=$ftc_data['pos_kot_item']['amount'];
					$grandamount+=$edit_amount;
						
					$view_table.='<tr>
					<td align="center"><label><span style="font-size:12px;">'.$edit_master_items_id.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_quantity.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_rate.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_gross.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_taxes.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_amount.'</span></label></td>
					</tr>';
					}
							$total_amount+=$pos_amountt;
					}
				$view_table.='</table></fieldset></div>';
				}
			 }
				/////////////// HOUSE KEEPING DETAILS	
				
				$this->loadmodel('house_keeping');
			if(!empty($edit_card_no) && !empty($room_no))
			{
				$grandamt=0;
			    $conditions=array('card_no' => $edit_card_no, 'flag' => "0" , 'master_roomno_id' => $room_no, 'status' => "0",);
				$fetch_keeping_no=$this->house_keeping->find('all',array('conditions'=>$conditions));
				
				$check=sizeof($fetch_keeping_no);
				if($check>0)
				{ 
					$view_table.='<div style="width:10; max-height:150px;overflow-y:scroll"><fieldset>
					<legend>
					<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>House Keeping</strong></h5></span>
					</legend>
					<table class="table table-bordered table-hover" > 
					<tr>
					<th style="text-align:center" width="20%">Wash&Iron Clothes</th>
					<th style="text-align:center"  width="20%">Price</th>
					<th style="text-align:center"  width="20%">Iron Clothes</th>
					<th style="text-align:center"  width="20%">Price</th>
					<th style="text-align:center"  width="20%">Total</th>
					</tr>';

					foreach($fetch_keeping_no as $ftc_data)
					{ 
					$edit_quantity=$ftc_data['house_keeping']['wash_iron_no'];
					$edit_rate=$ftc_data['house_keeping']['wash_iron_price'];
					$edit_gross=$ftc_data['house_keeping']['iron_no'];
					$edit_taxes=$ftc_data['house_keeping']['iron_price'];
					$edit_amount=$ftc_data['house_keeping']['total_amount'];
					$edit_due_amount=$ftc_data['house_keeping']['due_amount'];
					$grandamt+=$edit_due_amount;
					$view_table.='<tr>
					<td align="center"><label><span style="font-size:12px;">'.$edit_quantity.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_rate.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_gross.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_taxes.'</span></label></td>
					<td colspan="2" align="center"><label><span style="font-size:12px;">'.$edit_amount.'</span></label></td>
						</tr>';
					}
					$total_amount+=$grandamt;
					$view_table.='</table></fieldset></div><input type="hidden" class="form-control input-inline input-small" id="grandamt" value="'.$grandamt.'">';
			  }
			
			 }
			 
			 
			 /////////////// Extra Services DETAILS	
				
				$this->loadmodel('other_service');
			if(!empty($edit_card_no) && !empty($room_no))
			{
				$grandamt10=0;
			    $conditions=array('card_no' => $edit_card_no, 'flag' => "0",'status' => "0", 'master_roomno_id' => $room_no);
				$fetch_o_s=$this->other_service->find('all',array('conditions'=>$conditions));
				
				$check=sizeof($fetch_o_s);
				
				if($check>0)
				{ 
					$view_table.='<div style="width:10; max-height:150px;overflow-y:scroll"><fieldset>
					<legend>
					<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Other Services</strong></h5></span>
					</legend>
					<table class="table table-bordered table-hover" > 
					<tr>
					<th style="text-align:center" width="20%">Room No.</th>
					<th style="text-align:center"  width="20%">Card No.</th>
					<th style="text-align:center"  width="20%">Service</th>
					<th style="text-align:center"  width="20%">Quantity</th>
					<th style="text-align:center"  width="20%">Charge</th>
					<th style="text-align:center"  width="20%">Total</th>
					</tr>';

					
					foreach($fetch_o_s as $ftc_data)
					{ 
					$edit_master_roomno_id=$ftc_data['other_service']['master_roomno_id'];
					$edit_card_no=$ftc_data['other_service']['card_no'];
					$edit_service_name_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_service_fetch',$ftc_data['other_service']['service_name_id']), array());
					$edit_quantity=$ftc_data['other_service']['quantity'];
					$edit_charge=$ftc_data['other_service']['charge'];
					$edit_amount=$ftc_data['other_service']['total'];
					$edit_due_amount=$ftc_data['other_service']['due_amount'];
					$grandamt10+=$edit_due_amount;
					$view_table.='<tr>
					<td align="center"><label><span style="font-size:12px;">'.$edit_master_roomno_id.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_card_no.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_service_name_id.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_quantity.'</span></label></td>
					<td align="center"><label><span style="font-size:12px;">'.$edit_charge.'</span></label></td>
					<td  align="center"><label><span style="font-size:12px;">'.$edit_amount.'</span></label></td>
						</tr>';
					}
					$total_amount+=$grandamt10;
					$view_table.='</table></fieldset></div><input type="hidden" class="form-control input-inline input-small" id="grandamt" value="'.$grandamt10.'">';
			  }
			 }
			 
			 
			 
			 //////////////////////  DUE AMount OF OTHER ROOM
			 $this->loadmodel('room_checkin_checkout');
			if(!empty($edit_card_no) && !empty($room_no))
			{
			$all=$this->room_checkin_checkout->find('all', array('fields' => array('transfer_due_amount', 'transfer_due_amount_roomno'),'conditions'=>array('status' => 0,             'master_roomno_id' =>$room_no, 'card_no' => $edit_card_no)));
			
			@$tra=$all[0]['room_checkin_checkout']['transfer_due_amount'];
			$transfer_amt_id=explode(',', $tra);
			$transfer_amt_id=array_filter($transfer_amt_id);
			//pr($transfer_amt_id);
			@$tra1=$all[0]['room_checkin_checkout']['transfer_due_amount_roomno'];
			$transfer_roomno_id=explode(',', $tra1);
			$transfer_roomno_id=array_filter($transfer_roomno_id);
			$total_amount_room=0;
		    $check=sizeof($transfer_amt_id);
		    if($check>0)
		    { 
			$view_table.='<div style="width:100%"><div style="width:60%; float:left; max-height:200px;overflow-y:scroll"><fieldset>
			<legend>
			<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Due Amount</strong></h5></span>
			</legend>
			<table class="table table-bordered table-hover"> 
			<tr>
			<th>Room No.</td>	
			<th>Amount</td>	
			</tr>';
			$due_grandamt=0;
			$z=0;
			
			foreach($transfer_roomno_id as $room_ftc)
			{ 
				$total_amount_room+=$transfer_amt_id[$z];
				$view_table.='<tr>
				<td><label><span style="font-size:12px;">'.$room_ftc.'</span></label></td>
				<td><label><span style="font-size:12px;">'.$transfer_amt_id[$z].'</span></label></td>
				</tr>';
				$z++;
			}
			$view_table.='<tr><th><strong>TOTAL</strong></th><td><strong>'.$total_amount_room.'</strong></td>';
			
			$view_table.='</table></fieldset></div><input type="hidden" class="form-control input-inline input-small" id="due_grandamt" value="'.$total_amount_room.'">';

			}
		}
		
		 $total_amount+=$total_amount_room;
		//////////////////////////
			 
			$view_table.='</br>';
			$view_table.='<div style="width:100%; float:right" align="right"><table class="table-bordered table-hover" align="right" height="50px" width="100%" >
			<tr  style="background-color:#9FF"><td align="center">Extra Services</td>
			<td align="center">House Keeping</td>
			<td align="center">FNB Service</td>
			<td align="center"><label>Due Amount &nbsp;</label></td></tr>
			
			<tr>
			<td align="center">
			<input type="text" readonly="readonly" class="form-control input-inline input-small" value="'.$grandamt10.'" name="edit_extra_bed'.$i.'" id="grandamt10"></td>
			
			
			<td align="center">
			<input type="text" readonly="readonly" class="form-control input-inline input-small" value="'.$grandamt.'" name="edit_house_amount'.$i.'" id="grandamt1"></td>
			
			
			<td align="center">
			<input type="text" readonly="readonly" class="form-control input-inline input-small" placeholder="POS" value="'.$tot_kot_due_amt.'" name="edit_posnet_amount'.$i.'" id="kot_net_amount'.$i.'"></td>
			
			            
            <td  align="center">
			<input type="text" class="form-control input-inline input-small" placeholder="Net" value="'.$total_amount_room.'" name="edit_due_amount'.$i.'" id="due_grandamt1" readonly="readonly">
			</td></tr></table></div></div>';
			 
			 $view_table.='
			 </td></tr></table></fieldset></div>';
			$tot_kot_due_amt=0;
			$grandamt=0;
			$grandamt10=0; 
			}
			
		}
		echo $total_amount.',';
		echo  $view_table.',';	
		exit;
	}
		//////////////////////////////
	
		
		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////checkin

if($this->request->query('room_servicing_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			$this->loadmodel('room_serviceing');
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_caretaker');
			;
			$conditions = array ('service_date between ? and ?' => array($start_date, $end_date),'flag' => 0);
					//$fatch_book_room=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				$fetch_room_serviceing=$this->room_serviceing->find('all',array('conditions'=>$conditions));
				$fetch_master_roomno=$this->master_roomno->find('all');
				$fetch_master_caretaker=$this->master_caretaker->find('all');
				
		
		?>
		
<table align="center"  style="margin-top:2% "> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase">Date from <?php echo $start_date1;?> to <?php echo $end_date1; ?> </span>
</td></tr></table>
    <table class="table table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Room No.</th>
        <th>Date</th>
        <th>Room Status</th>
        <th>Serviced By</th>
        <th>Remark</th>
        
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_serviceing as $data)
			{	//pr($next_data);
				 $i++;
				 $id_room_serviceing=$data['room_serviceing']['id'] ;
				$arrival_data=$data['room_serviceing']['service_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $data['room_serviceing']['service_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
                 
         
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['room_serviceing']['master_roomno_id']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_serviceing']['service_date'])); ?></td>
        <td><?php echo $data['room_serviceing']['room_status']; ?></td>
        
        
        
        <td>
		
		
		<?php
        echo @$caretaker_fetch_id=$this->requestAction(array('controller' =>'Dreamshapers', 'action' => 'caretaker_fetch',$data['room_serviceing']['serviced_by']), array()); ?></td>
        
        
        
        <td><?php
            echo $data['room_serviceing']['remarks'];
            
	?></td>
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
         <?php
		exit;
		
		}
        
		/////////////////////////////////////////
		if($this->request->query('view_room_avaliablity_status_ajax')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$start_date=$q[0];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=$q[1];
			$end_date=date("Y-m-d",strtotime($end_date));
			 $this->loadmodel('room_checkin_checkout');
			 $this->loadmodel('room_reservation');
			 $this->loadmodel('master_roomno');	
			?>
            <div style="overflow-y:scroll">
            <table class="table table-bordered table-hover">
				<tr style="background-color:#899AC9; color:#090909"><td></td> <?php
                $result1 = array();
				$currentTime = strtotime($start_date);
				$endTime = strtotime($end_date);
				while ($currentTime <= $endTime) 
					{if (date('N', $currentTime) < 8)
						  {$result1[] = date('Y-m-d', $currentTime);}$currentTime = strtotime('+1 day', $currentTime);
					}
					foreach($result1 as $value)
					{	
						
						$timestamp = strtotime($value);
						$day = date('D', $timestamp);
						echo "<td><strong>".$day."</strong></td>";
                    }?>
           <td></td></tr>
           <tr style="background-color: rgb(225, 210, 179); color: rgb(9, 9, 9);"><td></td>
           <?php
                $result1 = array();
				$currentTime = strtotime($start_date);
				$endTime = strtotime($end_date);
				while ($currentTime <= $endTime) 
					{if (date('N', $currentTime) < 8)
						  {$result1[] = date('Y-m-d', $currentTime);}$currentTime = strtotime('+1 day', $currentTime);
					}
					foreach($result1 as $value)
					{	
						$value=date("d-M",strtotime($value));
						echo "<td><strong>".$value."</strong></td>";
                    }?>
           <th>TOTAL</th></tr>
           <tr style="background-color: rgb(174, 198, 219); color: rgb(9, 9, 9);"><th>Booked</th>
           <?php
		  
                $result1 = array();
				$currentTime = strtotime($start_date);
				$endTime = strtotime($end_date);
				while ($currentTime <= $endTime) 
					{if (date('N', $currentTime) < 8)
						  {$result1[] = date('Y-m-d', $currentTime);}$currentTime = strtotime('+1 day', $currentTime);
					}
					$count_total_booked=0;
					foreach($result1 as $value)
					{	
						$conditions=array('arrival_date' => $value,'status' => 0);
					$count=$this->room_checkin_checkout->find('count', array('conditions' => $conditions));
					$count_total_booked+=$count;
					//$fatch_book_room=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				?><td align="center"><?php if(!empty($count)){ echo $count; } else { echo "0"; } ?></td><?php 
                    }?>
           <th><?php echo $count_total_booked; ?></th></tr>
           
           <tr style="background-color: rgb(219, 174, 174); color: rgb(9, 9, 9);"><th>Holding(Confirmed)</th>
           <?php
		  
                $result1 = array();
				$currentTime = strtotime($start_date);
				$endTime = strtotime($end_date);
				while ($currentTime <= $endTime) 
					{if (date('N', $currentTime) < 8)
						  {$result1[] = date('Y-m-d', $currentTime);}$currentTime = strtotime('+1 day', $currentTime);
					}
					$count_total_confirm=0;
					foreach($result1 as $value)
					{	
						$conditions=array('arrival_date' => $value,'reservation_status' => 'Confirm');
					$count=$this->room_reservation->find('count', array('conditions' => $conditions));
					$count_total_confirm+=$count;
				?><td align="center"><?php if(!empty($count)){ echo $count; } else { echo "0"; } ?></td><?php 
                    }?>
           <th><?php echo $count_total_confirm; ?></th></tr>
           
           <tr style="background-color: rgb(180, 228, 135); color: rgb(9, 9, 9);"><th>Available</th>
           <?php
		  
                $result1 = array();
				$currentTime = strtotime($start_date);
				$endTime = strtotime($end_date);
				while ($currentTime <= $endTime) 
					{if (date('N', $currentTime) < 8)
						  {$result1[] = date('Y-m-d', $currentTime);}$currentTime = strtotime('+1 day', $currentTime);
					}
					$count_total_availabile=0;
					
					foreach($result1 as $value)
					{	
					$fatch_room=$this->master_roomno->find('all');
					
							$roomall='';
							$tot_room=0;
							foreach($fatch_room as $room)
							{	
								$room_no=$room['master_roomno']['room_no'];	
								$room_no_explode=explode(',', $room_no);
								$tot_room+=sizeof($room_no_explode);
							}
							
						    $tot_room;
							$conditions=array('arrival_date' => $value,'status' => 0);
							$count=$this->room_checkin_checkout->find('count', array('conditions' => $conditions));
							$total_available=$tot_room-$count;
							$count_total_availabile+=$total_available;
						?><td align="center"><?php echo $total_available;  ?></td><?php 
                  } ?>
           <th><?php echo $count_total_availabile; ?></th></tr>
           </table>
          <!-- <table class="table table-bordered table-hover">
				<tr>
                <td></td>
                    <td>
                    <div class="form-group">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="source_of_booking"  value="Direct"checked > Direct </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="source_of_booking" value="Company"> Company</label>
                                        <label class="radio-inline">
                                        <input type="radio" name="source_of_booking"  value="Travel Agent"> Travel Ajent</label>
                                    </div>
                    </div>
                    </td>
                </tr>
            </table> -->
           </div>
					
			
	
	<?php exit;	}
	
	 /*if($this->request->query('delete_company_category')==1)
		{
			$deleteoption=$this->request->query("q");
			//pr($deleteoption);
			$this->loadmodel('company_category');
			$this->company_category->updateAll(array('flag' => 1 ),array('id' => $deleteoption));
			$fetch_company_category=$this->company_category->find('all', array('conditions' => array('flag' => "0")));

			echo '<option value="">--- Select Room Type ---</option>';
			foreach($fetch_company_category as $data)
			{
				echo '<option edit_category_name="'.$data['company_category']['category_name'].'" value="'.$data['company_category']['id'].'">'.$data['company_category']['category_name'].'</option>';
			}
			
		}*/
	
//////////////////////////////////


/*if($this->request->query('delete_mcc')==1)
		{
			$deleteoption_currency=$this->request->query("q");
			$this->loadmodel('master_currency');
			$this->master_currency->updateAll(array('flag' => 1 ),array('id' => $deleteoption_currency));
			$fetch_master_currency=$this->master_currency->find('all', array('conditions' => array('flag' => "0")));
			echo '<option value="">--- Select Currency ---</option>';
			foreach($fetch_master_currency as $data)
			{
				echo '<option edit_master_currency="'.$data['master_currency']['currency_name'].'" value="'.$data['master_currency']['id'].'">'.$data['master_currency']['currency_name'].'</option>';
			}
		}*/


///////////////////////////
		if($this->request->query('check_id_room_no_ftc')==1)
			{
			$room_type_id=$this->request->query("q");
			$this->loadmodel('master_roomno');	
			$conditions=array('room_type_id' => $room_type_id);
				$fetch_room_no=$this->master_roomno->find('all',array('conditions'=>$conditions));
				foreach($fetch_room_no as $ftc_data)
				{
					
				$room_no=$ftc_data['master_roomno']['room_no'];	
				}
				echo '<option value="">---Select---</option>';
                
					$room_no_explode=explode(',', $room_no);
					foreach($room_no_explode as $room_nos)
					{
						?>
						 <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
					<?php
					}
			
			}
			
			/////////////////////
			if($this->request->query('check_id_room_noinfo_ftc')==1)
			{
				
			$roomno_id=$this->request->query("q");
			
			$this->loadmodel('room_checkin_checkout');	
			$conditions=array('master_roomno_id' => $roomno_id);
				$fetch_r_no=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				foreach($fetch_r_no as $ftc_data)
				{
				echo $reg_no=$ftc_data['room_checkin_checkout']['card_no'].",";
				echo $plan=$ftc_data['room_checkin_checkout']['plan_id'].",";
				echo $checkin=$ftc_data['room_checkin_checkout']['arrival_date'].",";
				echo $checkout=$ftc_data['room_checkin_checkout']['checkout_date'].",";
				echo $booked=$ftc_data['room_checkin_checkout']['source_of_booking'].",";
				echo $g_name=$ftc_data['room_checkin_checkout']['guest_name'].",";
				echo $b_ins=$ftc_data['room_checkin_checkout']['billing_instruction'].",";
				
				
				
				
				echo $id1=$ftc_data['room_checkin_checkout']['id'].",";
				echo $id2=$ftc_data['room_checkin_checkout']['arrival_date'].",";
				echo $id3=$ftc_data['room_checkin_checkout']['billing_instruction'].",";
				echo $id4=$ftc_data['room_checkin_checkout']['room_charge'].",";
				echo $id5=$ftc_data['room_checkin_checkout']['duration'].",";
				echo $id6=$ftc_data['room_checkin_checkout']['total_room'].",";
				echo $id7=$ftc_data['room_checkin_checkout']['taxes'].",";
				}
				
				
			}
			
			
			
			///////////////////////////////////
			
			
			
				if($this->request->query('check_id_reg_noinfo_ftc')==1)
			{
				
			$reg_no_id=$this->request->query("q");
			
			$this->loadmodel('room_checkin_checkout');	
			$conditions=array('id' => $reg_no_id);
				$fetch_reg_no=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				foreach($fetch_reg_no as $ftc_data)
				{
				echo $reg_no=$ftc_data['room_checkin_checkout']['card_no'].",";
				echo $plan=$ftc_data['room_checkin_checkout']['plan_id'].",";
				echo $checkin=$ftc_data['room_checkin_checkout']['arrival_date'].",";
				echo $checkout=$ftc_data['room_checkin_checkout']['checkout_date'].",";
				echo $booked=$ftc_data['room_checkin_checkout']['source_of_booking'].",";
				echo $g_name=$ftc_data['room_checkin_checkout']['guest_name'].",";
				echo $b_ins=$ftc_data['room_checkin_checkout']['billing_instruction'].",";
				
				echo $id1=$ftc_data['room_checkin_checkout']['id'].",";
				echo $id2=$ftc_data['room_checkin_checkout']['arrival_date'].",";
				echo $id3=$ftc_data['room_checkin_checkout']['billing_instruction'].",";
				echo $id4=$ftc_data['room_checkin_checkout']['room_charge'].",";
				echo $id5=$ftc_data['room_checkin_checkout']['duration'].",";
				echo $id6=$ftc_data['room_checkin_checkout']['total_room'].",";
				echo $id7=$ftc_data['room_checkin_checkout']['taxes'].",";
				
				}
				
			}
			
			//////////////////////////////////////
			
			
				if($this->request->query('check_id_all_noinfo_ftc')==1)
			{
				
			$st=$this->request->query("q");
			
			$this->loadmodel('room_checkin_checkout');	
			$conditions=array('id' => $st);
				$fetch_all_no=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				foreach($fetch_all_no as $ftc_data)
				{
				echo $id1=$ftc_data['room_checkin_checkout']['id'].",";
				echo $id2=$ftc_data['room_checkin_checkout']['arrival_date'].",";
				echo $id3=$ftc_data['room_checkin_checkout']['billing_instruction'].",";
				echo $id4=$ftc_data['room_checkin_checkout']['room_charge'].",";
				echo $id5=$ftc_data['room_checkin_checkout']['duration'].",";
				echo $id6=$ftc_data['room_checkin_checkout']['total_room'].",";
				echo $id7=$ftc_data['room_checkin_checkout']['taxes'].",";
				
				}
				
				
			}
			
			
			///////////////////////////////////////
			if($this->request->query('fatch_room_rate_roomreservation')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$room_type_id=$q[0];
			$plan_id=$q[1];
			$company_name=$q[2];
			$arival=$q[3];
			$arrival_date=date("Y-m-d", strtotime($arival));
			
			if(!empty($company_name))
			{			
				$this->loadmodel('fo_room_booking');
				
				$fo_room_booking=$this->fo_room_booking->find('all',array('conditions' => array('company_id' => $company_name,'master_room_type_id' => $room_type_id,'master_room_plan_id'=>$plan_id, 'flag' => "0" )));
				
				if(!empty($fo_room_booking))
				{		
					echo  $rcharge=$fo_room_booking[0]['fo_room_booking']['special_rate'];
				}
			}
			else
			{
				$this->loadmodel('master_room');
				$master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $room_type_id , 'flag' => "0")));
				
				if(!empty($master_room))
				{		
					echo $tarrif_rate=$master_room[0]['master_room']['tarrif_rate'];
				}
			
			}
				
		}
		//////////////////////////////
		
		if($this->request->query('fatch_outlet_rate_roomreservation')==1)
		{
			 $outlet_venue_id=$this->request->query("q");
			
			if(!empty($outlet_venue_id))
			{
			    $this->loadmodel('master_outlet');
				$master_outlet=$this->master_outlet->find('all',array('conditions' => array('id'=> $outlet_venue_id, 'flag' => "0" )));
				if(!empty($master_outlet))
				{		//pr($master_outlet);
					echo $rcharge=$master_outlet[0]['master_outlet']['rate'];
					
				}
			}
				
		}
		
		/////////////////////////////////
		if($this->request->query('fatch_outlet_rate_fun')==1)
		{
			 $outlet_venue_id=$this->request->query("q");
			
			if(!empty($outlet_venue_id))
			{
			    $this->loadmodel('master_outlet');
				$master_outlet=$this->master_outlet->find('all',array('conditions' => array('id'=> $outlet_venue_id, 'flag' => "0" )));
				if(!empty($master_outlet))
				{		//pr($master_outlet);
					echo $rcharge=$master_outlet[0]['master_outlet']['rate'].",";
					$rtax=$master_outlet[0]['master_outlet']['master_tax_id'];
					
					$tax_id=$master_outlet[0]['master_outlet']['master_tax_id'];
				    $tax_id_explod =explode(',', $tax_id);
					$this->loadmodel('master_tax');
					$total_tax_amount=0;
					foreach($tax_id_explod as $tax_id)
					{
						$tex_per_item=$this->master_tax->find('all', array('conditions' => array('flag' => "0", 'id' => $tax_id)));
						if(!empty($tex_per_item)){
							echo $tax_applicable=$tex_per_item[0]['master_tax']['tax_applicable'].' - ';
						}
					}		
				}
			}
		}
				///////////////////////////////////
			if($this->request->query('check_id_roomfunction_ftc')==1)
			{
			$id=$this->request->query("q");
			
			$this->loadmodel('room_checkin_checkout');
			
			$conditions=array('master_roomno_id' => $id);
				$fetch_room_no=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				foreach($fetch_room_no as $ftc_data)
				{
					
echo $rt_id=@$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$ftc_data['room_checkin_checkout']['room_type_id']), array()).",";

echo $rg_id=$ftc_data['room_checkin_checkout']['card_no'].",";
echo $p_id=@$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$ftc_data['room_checkin_checkout']['plan_id']), array()).","; 

echo $g_id=$ftc_data['room_checkin_checkout']['guest_name'].",";
echo $bi_id=$ftc_data['room_checkin_checkout']['billing_instruction'];
				}
			}			
			/////////////////////
			///////////////////////////////////
			if($this->request->query('function_bill_set')==1)
			{
			$id=$this->request->query("q");
			
			$this->loadmodel('function_booking');
			$this->loadmodel('fun_bill');
			
			$conditions=array('id' => $id);
			$fetch_fun_billl=$this->function_booking->find('all',array('conditions'=>$conditions));
				
				$kuku=0;
				$tutu=0;
				
				
				foreach($fetch_fun_billl as $ftc_fun_data)
				{
					
					$t_id=$ftc_fun_data['function_booking']['pax_amt'];
$agg=$ftc_fun_data['function_booking']['advance'];

$tutu=$t_id-$agg;
					
					
echo $rg_id=$ftc_fun_data['function_booking']['function_no'].",";
echo $g_id=$ftc_fun_data['function_booking']['name'].",";
echo $b_id=$ftc_fun_data['function_booking']['b_date'].",";
echo $res_no_id=$ftc_fun_data['function_booking']['res_no_id'].",";
echo $t_id=$ftc_fun_data['function_booking']['pax_amt'].",";
echo $agg=$ftc_fun_data['function_booking']['advance'].",";
echo $tutu.",";
				}
				
			}			
			/////////////////////
			///////////////////////////////////
			if($this->request->query('checkout_bill_set')==1)
			{
			$id=$this->request->query("q");
			
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('bill');
			
			$conditions=array('checkout_id' => $id);
			$fetch_room_billl=$this->bill->find('all',array('conditions'=>$conditions));
			
			
				$kuku=0;
				$tutu=0;
				$afc=0;
				$ahc=0;
				$agc=0;
				$aic=0;
				$kfcc=0;
				
				
				foreach($fetch_room_billl as $ftc_r_data)
				{
echo $rg_id=$ftc_r_data['bill']['card_no'].",";
echo $g_id=$ftc_r_data['bill']['guest_name'].",";
echo $tot_idd=$ftc_r_data['bill']['total'].",";

$tot_idd=$ftc_r_data['bill']['total'];
$afc=$ftc_r_data['bill']['cash'];
$agc=$ftc_r_data['bill']['neft_amt'];
$ahc=$ftc_r_data['bill']['cheque_amt'];
$aic=$ftc_r_data['bill']['credit_card_amt'];

$kuku=$afc+$agc+$ahc+$aic+$tutu;
echo $kuku.",";

$kfcc=$tot_idd-$kuku;

echo $kfcc.",";
	}
	          
				
			}			
			/////////////////////
			if($this->request->query('fatch_room_vacant')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $room_type_id=$q[0];
            $company_id=$q[1];
            $plan_id=$q[2];
           
            $this->loadmodel('fo_room_booking');
			$this->loadmodel('company_discount');
			$this->loadmodel('master_room');
			$this->loadmodel('master_tax');
$company_discount=$this->company_discount->find('all',array('conditions' => array('company_name_id' => $company_id,'room_type_id'=>$room_type_id)));
$master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id'=>$room_type_id)));
$fo_room_booking=$this->fo_room_booking->find('all',array('conditions' => array('company_id' => $company_id,'master_room_type_id'=>$room_type_id,'master_room_plan_id'=>$plan_id)));

                
   
   if(!empty($company_discount))
                {       
                    echo $disc=$company_discount[0]['company_discount']['discount'].",";
                }
				
				if(!empty($master_room))
                {       
                    //echo $stax=$master_room[0]['master_room']['tax_applicable_id'].",";
					
					// echo $stax=@$master_tax_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch',$data['master_room']['tax_applicable_id']), array());
					echo $stax=@$master_tax_fetch_idd=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch1',$master_room[0]['master_room']['tax_applicable_id']), array()).",";
       
                }
				
				if(!empty($fo_room_booking))
                {       
                    echo $rate1=$fo_room_booking[0]['fo_room_booking']['special_rate'].",";
                }
   
        }
		
		//////
		if($this->request->query('check_id_res_no_ftc')==1)
			{
			$room_reservation_id=$this->request->query("q");
			$this->loadmodel('room_reservation');	
			$conditions=array('id' => $room_reservation_id);
				$fetch_res_no=$this->room_reservation->find('all',array('conditions'=>$conditions));
				foreach($fetch_res_no as $ftc_data)
				{
					echo $sbooking_id=$ftc_data['room_reservation']['source_of_booking'].",";
					//$arr_id=$ftc_data['room_reservation']['arrival_date'].",";
			//		date("d-m-Y", strtotime()).",";
				echo $city=$ftc_data['room_reservation']['city'].",";
				
				
				/*if($arr_id=='0000-00-00')
				 { echo $arr_id=''.",";}
				 else
				 { echo $arr_id=date("d-m-Y", strtotime($arr_id)).","; }*/
				$dep_id=$ftc_data['room_reservation']['departure_date'].",";
				  if($dep_id=='0000-00-00')
				 { echo 	$dep_id=''.",";}
				 else
				 {echo  $dep_id=date("d-m-Y", strtotime($dep_id)).","; }
				 
				 echo $cp_id=$ftc_data['room_reservation']['company_id'].",";
				 
				echo $gname_id=$ftc_data['room_reservation']['name_person'].",";
				echo $national_id=$ftc_data['room_reservation']['nationality'].",";
				echo $rtid=$ftc_data['room_reservation']['room_type_id'].",";
				echo $plid=$ftc_data['room_reservation']['plan_id'].",";
				echo $ad_taken=$ftc_data['room_reservation']['advance'].",";
				echo $b_ins_id=$ftc_data['room_reservation']['billing_instruction'].",";
				echo $room_charge_id1=$ftc_data['room_reservation']['rate_per_night'].",";
				echo $traveller_name=$ftc_data['room_reservation']['traveller_name'].",";
				echo $id_proof_no=$ftc_data['room_reservation']['id_proof_no'].",";
				echo $telephone=$ftc_data['room_reservation']['telephone'].",";
				echo $email_id=$ftc_data['room_reservation']['email_id'].",";
				}
				
			}
		//////////////////////////////
		
	if($this->request->query('check_poscheckout_ftc')==1)
		{
			$master_roomno_id=$this->request->query("q");
			if(!empty($master_roomno_id)){
			$this->loadmodel('room_checkin_checkout');	
			$conditions=array('id' => $master_roomno_id);
			$fetch_checkin_no=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				foreach($fetch_checkin_no as $ftc_data)
				{
					$room_no_id=$ftc_data['room_checkin_checkout']['master_roomno_id'];
				echo $edit_guest_name=$ftc_data['room_checkin_checkout']['guest_name'].",";
				echo $edit_source_of_booking=$ftc_data['room_checkin_checkout']['source_of_booking'].",";
				
				echo $edit_arrival_date=date('d-m-Y', strtotime($ftc_data['room_checkin_checkout']['arrival_date'])).",";
				echo $edit_plan_id=$ftc_data['room_checkin_checkout']['plan_id'].",";
				echo $edit_child=$ftc_data['room_checkin_checkout']['child'].",";
				echo $edit_pax=$ftc_data['room_checkin_checkout']['pax'].",";
				echo $edit_billing_instruction=$ftc_data['room_checkin_checkout']['billing_instruction'].",";
				echo $edit_remarks=$ftc_data['room_checkin_checkout']['remarks'].",";
				echo $edit_duration=$ftc_data['room_checkin_checkout']['duration'].",";
				echo $edit_advance_taken=$ftc_data['room_checkin_checkout']['advance_taken'].",";
				echo $edit_room_charge=$ftc_data['room_checkin_checkout']['room_charge'].",";
				echo $edit_card_no=$ftc_data['room_checkin_checkout']['card_no'].",";
				echo $edit_room_discount=$ftc_data['room_checkin_checkout']['room_discount'].",";
				echo $edit_room_type_id=$ftc_data['room_checkin_checkout']['room_type_id'].",";
				//echo $edit_checkout_date=$ftc_data['room_checkin_checkout']['checkout_date'].",";
				$edit_card_no=$ftc_data['room_checkin_checkout']['card_no'];
				echo  $room_no_n0=$ftc_data['room_checkin_checkout']['master_roomno_id'].",";
				echo  $company_id=$ftc_data['room_checkin_checkout']['company_id'].",";
				echo $rn=$ftc_data['room_checkin_checkout']['master_roomno_id'].",";
				//echo $xtrabed=$ftc_data['room_checkin_checkout']['extra_bed_tot'].",";
				
				echo $edit_mobile_no=$ftc_data['room_checkin_checkout']['mobile_no'].",";
				echo $edit_email_id=$ftc_data['room_checkin_checkout']['email_id'].",";
				$edit_taxes=$ftc_data['room_checkin_checkout']['taxes'];
				$edit_room_type_id=$ftc_data['room_checkin_checkout']['room_type_id'];
				
				
				$this->loadmodel('master_room');
			     $master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $edit_room_type_id, 'flag' => "0")));
				
				if(!empty($master_room))
				{		
      			 $tax_id=$master_room[0]['master_room']['master_tax_id'];
				
				   $tax_id_explod =explode(',', $tax_id);
				   
					$this->loadmodel('master_tax');
					$total_tax_amount=0;
					foreach($tax_id_explod as $tax_id)
					{
						$tex_per_item=$this->master_tax->find('all', array('conditions' => array('flag' => "0", 'id' => $tax_id)));
						if(!empty($tex_per_item)){
							echo $tax_applicable=$tex_per_item[0]['master_tax']['tax_applicable'].' - ';
					}
						
					}
				}
				
				}
				
					}
	exit;
	}
		////////////////////////////
		
		//////////////////////////////
		
	if($this->request->query('check_poscheckout_ftccc')==1)
		{
			$master_roomno_id=$this->request->query("q");
			if(!empty($master_roomno_id)){
			$this->loadmodel('room_checkin_checkout');	
			$conditions=array('id' => $master_roomno_id);
			$fetch_checkin_no=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				foreach($fetch_checkin_no as $ftc_data)
				{
				echo $g_name=$ftc_data['room_checkin_checkout']['guest_name'].",";
				echo $room_no_id=$ftc_data['room_checkin_checkout']['master_roomno_id'].',';
				echo $card_name=$ftc_data['room_checkin_checkout']['card_no'].",";
				}
			}
	exit;
	}
		////////////////////////////
		if($this->request->query('pos_data_view_checkout')==1)
        {
			$q=$this->request->query("q");
			$q=json_decode($q);
			$card_id=$q[0];
			$room_id=$q[1];
			
			
			
			$this->loadmodel('pos_kot');
			    $conditions=array('card_no' => $card_id, 'flag' => "0" , 'master_roomnos_id' => $room_id);
				//pr($conditions);
				$fetch_pos_no=$this->pos_kot->find('all', array('conditions'=>$conditions));
			//pr($fetch_pos_no);
			//exit;
			$check=sizeof($fetch_pos_no);
		if($check>0)
		{ 
		$view_table='<div style="width:10; max-height:80px;overflow-y:scroll"><fieldset>
                <legend>
				<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>POS View</strong></h5></span>
				</legend><table  width="100%" border="0"> 
		                                
		<tr>
		<td></td>
		<th  align="center" style="padding-left:50px">Item</td>
		<th  align="center" style="padding-left:50px">Quantity </td>
		<th  align="center" style="padding-left:50px"> Rate  </td>
		<th  align="center" style="padding-left:50px">Gross  </td>
		<th align="center" style="padding-left:50px">Taxes</td>
		<th  align="center"style="padding-left:50px">Amount </td>
		<td></td>
		<td></td>
		</tr>';
		$grandamount=0;
		
		
			foreach($fetch_pos_no as $pos_data){
			$pos_kot_id=$pos_data['pos_kot']['id'];
			$this->loadmodel('pos_kot_item');
			$fetch_poskot_item=$this->pos_kot_item->find('all',array('conditions'=>array('pos_kots_id' => $pos_kot_id)));
			foreach($fetch_poskot_item as $ftc_data)
			{ 
			$edit_master_items_id=@$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$ftc_data['pos_kot_item']['master_items_id']), array());
			
			$edit_quantity=$ftc_data['pos_kot_item']['quantity'];
			$edit_rate=$ftc_data['pos_kot_item']['rate'];
			$edit_gross=$ftc_data['pos_kot_item']['gross'];
			$edit_taxes=$ftc_data['pos_kot_item']['taxes'];
			$edit_amount=$ftc_data['pos_kot_item']['amount'];
			$grandamount+=$edit_amount;
				
			$view_table.='<tr>
			<td></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_master_items_id.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_quantity.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_rate.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_gross.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_taxes.'</span></label></td>
			<td colspan="2" align="center"><label><span style="font-size:12px;">'.$edit_amount.'</span></label></td>
				</tr>';
 					}
			}
			//<input type="hidden" class="form-control input-inline input-small" id="grandamount" value="'.$grandamount.'">
	$view_table.='</table></fieldset></div>';
				 echo $view_table;				
			 }
		
			exit;
		
		}
		////////////////////////////
		////////////////////////////
		if($this->request->query('kot_due_amountt')==1)
        {
			$q=$this->request->query("q");
			$q=json_decode($q);
			$card_id=$q[0];
			$room_id=$q[1];
			$this->loadmodel('pos_kot');
			    $conditions=array('card_no' => $card_id, 'master_roomnos_id' => $room_id, 'flag' => "0");
				$fetch_pos_no=$this->pos_kot->find('all',array('fields' => array('pos_amountt','payment_type'),'conditions'=>$conditions));
				
				$payment_type=$fetch_pos_no['pos_kot']['payment_type'];
				if($payment_type==2)
				{
				
				
							$de=0;
							$dee=0;
							$dk=0;
							$dkk=0;
							foreach($fetch_pos_no as $ftc){
				$bill_settle_due=$ftc['pos_kot']['pos_amountt'];
							$dee=$dee+$bill_settle_due;
							}
							echo $dee;
							exit;
				}
		}
		////////////////////////////
		/*if($this->request->query('kot_due_amountttt')==1)
        {
			$master_roomno_id=$this->request->query("q");
			
			$this->loadmodel('pos_kot');
			$conditions=array('id' => $master_roomno_id, 'flag' => "0", 'status'=>0);
			$fetch_pos_check=$this->room_checkin_checkout->find('all',array('fields' => array('master_roomno_id'),'conditions'=>$conditions));
				$rnno=$fetch_pos_check[0]['room_checkin_checkout']['master_roomno_id'];
				pr($fetch_pos_nooo);
			    $this->loadmodel('pos_kot');
			    $conditions=array('master_roomnos_id' => $$rnno, 'flag' => "0", 'flag1'=>0);
				$fetch_pos_nooo=$this->pos_kot->find('all',array('fields' => array('bill_settle_due'),'conditions'=>$conditions));
				pr($fetch_pos_nooo);
							$de=0;
							$dee=0;
							$dk=0;
							$dkk=0;
							foreach($fetch_pos_nooo as $ftc){
				$bill_settle_due=$ftc['pos_kot']['bill_settle_due'];
							$dee=$dee+$bill_settle_due;
							}
							echo $dee;
							exit;
		}*/
		////////////////////////////
		
		if($this->request->query('table_data_view_checkout')==1)
        {
			$table_id=$this->request->query("q");
      			$this->loadmodel('pos_kot');
			    $conditions=array('master_tables_id' => $table_id, 'flag' => "0");
				$fetch_pos_no=$this->pos_kot->find('all',array('conditions'=>$conditions));
				
				$check=sizeof($fetch_pos_no);
				
		if($check>0)
		{ 
		$view_table='<div style="width:10;">
                <table  width="100%" border="0"> 
								
										
		<tr style="border-bottom:solid 2px;">
		<td></td>
		<th  align="center" style="padding-left:100px">Item Name</td>
		<th  align="center" style="padding-left:100px">Quantity </td>
		<th  align="center" style="padding-left:50px"> Rate  </td>
		<th  align="center" style="padding-left:50px">Gross  </td>
		<th align="center" style="padding-left:50px">Taxes</td>
		<th  align="center"style="padding-left:50px">Amount </td>
		<td></td>
		
		<td></td>
		
		</tr>';
		
		$grandamount=0;
		$grandtaxes=0;
		$grandgross=0;
			foreach($fetch_pos_no as $pos_data){ 
			$pos_kot_id=$pos_data['pos_kot']['id'];
			$this->loadmodel('pos_kot_item');
			$fetch_poskot_item=$this->pos_kot_item->find('all',array('conditions'=>array('pos_kots_id' => $pos_kot_id)));
			
			foreach($fetch_poskot_item as $ftc_data)
			{ 
			$edit_master_items_id=@$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$ftc_data['pos_kot_item']['master_items_id']), array());
			
			$edit_quantity=$ftc_data['pos_kot_item']['quantity'];
			$edit_rate=$ftc_data['pos_kot_item']['rate'];
			$edit_gross=$ftc_data['pos_kot_item']['gross'];
			$edit_taxes=$ftc_data['pos_kot_item']['taxes'];
			$edit_amount=$ftc_data['pos_kot_item']['amount'];
			$grandamount+=$edit_amount;
			$grandtaxes+=$edit_taxes;
			$grandgross+=$edit_gross;
	
			
			$view_table.='<tr>
			<td></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_master_items_id.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_quantity.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_rate.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_gross.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_taxes.'</span></label></td>
			<td colspan="2" align="center"><label><span style="font-size:12px;">'.$edit_amount.'</span></label></td>
				</tr>';
 					}
			}
			
	$view_table.='</table></div><input type="hidden" class="form-control input-inline input-small" id="grandamount" value="'.$grandamount.'">
		<input type="hidden" class="form-control input-inline input-small" id="grandtaxes" value="'.$grandtaxes.'">
	<input type="hidden" class="form-control input-inline input-small" id="grandgross" value="'.$grandgross.'">';

				 echo $view_table;				
			 }
		
			exit;
		
		}
		////////////////////////////
		
		/*if($this->request->query('planpos_data_view_checkout')==1)
        {
			$q=$this->request->query("q");
			$q=json_decode($q);
			$card_id=$q[0];
			$room_id=$q[1];
			
			$this->loadmodel('pos_kot');
			    $conditions=array('card_no' => $card_id, 'flag' => "0" , 'master_roomnos_id' => $room_id);
				//pr($conditions);
				$fetch_pos_no=$this->pos_kot->find('all',array('conditions'=>$conditions));
				@$pl=$fetch_pos_no[0]['pos_kot']['plan_item'];
				    @$explod_plan_data =explode(',', $pl);
					//pr($explod_plan_data);
					
					foreach($explod_plan_data as $data45)
					{
						echo @' - ';
					echo @$master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$data45), array());
					}
				exit;
		}*/
		
		/////////////////////////
		if($this->request->query('house_data_view_checkout')==1)
        {
			$q=$this->request->query("q");
			$q=json_decode($q);
			$card_id=$q[0];
			$room_id=$q[1];
			
			$this->loadmodel('house_keeping');
			    $conditions=array('card_no' => $card_id, 'flag' => "0" , 'master_roomno_id' => $room_id , 'payment_id'=> 0);
				//pr($conditions);
				$fetch_keeping_no=$this->house_keeping->find('all',array('conditions'=>$conditions));
				$check=sizeof($fetch_keeping_no);
		if($check>0)
		{ 
		$view_table='<div style="width:10; max-height:80px;overflow-y:scroll"><fieldset>
                <legend>
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>House Keeping</strong></h5></span>
				
				</legend><table  width="100%" border="0"> 
		                                
		<tr>
		<td></td>
		<th  align="center" style="padding-left:50px">Wash&Iron Clothes</td>
		<th  align="center" style="padding-left:50px">Price</td>
		<th  align="center" style="padding-left:50px">Iron Clothes</td>
		<th  align="center" style="padding-left:50px">Price</td>
		<th align="center" style="padding-left:50px">Total</td>
		<td></td>
		
		<td></td>
		
		</tr>';

			$grandamt=0;
			foreach($fetch_keeping_no as $ftc_data)
			{ 
			$edit_quantity=$ftc_data['house_keeping']['wash_iron_no'];
			$edit_rate=$ftc_data['house_keeping']['wash_iron_price'];
			$edit_gross=$ftc_data['house_keeping']['iron_no'];
			$edit_taxes=$ftc_data['house_keeping']['iron_price'];
			$edit_amount=$ftc_data['house_keeping']['total_amount'];
			$grandamt+=$edit_amount;
			$view_table.='<tr>
			<td></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_quantity.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_rate.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_gross.'</span></label></td>
			<td align="center"><label><span style="font-size:12px;">'.$edit_taxes.'</span></label></td>
			<td colspan="2" align="center"><label><span style="font-size:12px;">'.$edit_amount.'</span></label></td>
				</tr>';
				}
   $view_table.='</table></fieldset></div><input type="hidden" class="form-control input-inline input-small" id="grandamt" value="'.$grandamt.'">';
				 echo $view_table;				
			 }
			
			exit;
			
		}
		
		///////////////////////////////////
		/////////////////////////
		if($this->request->query('due_payment_view_checkout')==1)
        {
			$q=$this->request->query("q");
			$q=json_decode($q);
			$card_id=$q[0];
			$room_id=$q[1];
			
			$this->loadmodel('room_checkin_checkout');			
			$all=$this->room_checkin_checkout->find('all', array('fields' => array('transfer_due_amount', 'transfer_due_amount_roomno'),'conditions'=>array('status' => 0, 'master_roomno_id' =>$room_id, 'card_no' => $card_id)));
			@$tra=$all[0]['room_checkin_checkout']['transfer_due_amount'];
			$transfer_amt_id=explode(',', $tra);
			$transfer_amt_id=array_filter($transfer_amt_id);
			@$tra1=$all[0]['room_checkin_checkout']['transfer_due_amount_roomno'];
			$transfer_roomno_id=explode(',', $tra1);
			$transfer_roomno_id=array_filter($transfer_roomno_id);
		$check=sizeof($transfer_amt_id);
		if($check>0)
		{ 
		$view_table='<div style="width:10; max-height:80px;overflow-y:scroll"><fieldset>
                <legend>
<span style="color:#4DB3A2 !important" class="caption-subject font-green-sharp bold"><h5><strong>Due Amount</strong></h5></span>
				
				</legend>
				<table  width="50%" border="1"> 
		<tr>
		<th>Room No.</td>	
     	<th>Amount</td>
		</tr>';
			$due_grandamt=0;
			$z=0;
			$total_amount_room=0;
			foreach($transfer_roomno_id as $room_ftc)
			{ $z++;
			$total_amount_room+=$transfer_amt_id[$z];
			$view_table.='<tr>
			<td><label><span style="font-size:12px;">'.$room_ftc.'</span></label></td>
			<td><label><span style="font-size:12px;">'.$transfer_amt_id[$z].'</span></label></td>
			</tr>';
			}
   $view_table.='<tr><th><strong>TOTAL</strong></th><td>'.$total_amount_room.'</td>';
	 $view_table.='</table></fieldset></div><input type="hidden" class="form-control input-inline input-small" id="due_grandamt" value="'.$total_amount_room.'">';

   echo $view_table;
		}
				 				
			exit;
			
		}
		//////////////////////
		if($this->request->query('Bill_settleing_kot_view')==1)
        {
			$stew_id=$this->request->query("q");
			$this->loadmodel('pos_kot');
			$conditions=array('master_stewards_id' => $stew_id,'status'=>0);
			$fetch_kots=$this->pos_kot->find('all',array('conditions'=>$conditions));
			@$bb=$fetch_kots[0]['pos_kot']['master_tables_id']; 
			?>
            <table width="100%">
               <thead>
                <tr style=" border-bottom:1px solid #CCC">
                <th>Check</th><th>Outlet</th><th>Bill No.</th><th>Guest Name</th><th>Room No. / Table No.</th><th>Steward</th>
                </tr>
                </thead>
                <tbody>
                <?php
			
			foreach($fetch_kots as $dataa)
			{
				foreach($dataa as $view)
				{
				$club_member_id=$view['club_member_id'];
													?>
                   <?php if($club_member_id>0){?>

        <tr style="background-color:#FF0">
        <th>
        <div class="form-group"><div class="radio-list">
        <label><input type="radio" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $view['id'];?>)" value="<?php echo $view['id'];?>"></label>
        </div></div></th>
        <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$view['master_outlets_id']), array());?></td>
        <td><?php echo $view['id'];?></td>
        <td><?php echo $view['guest_name'];?></td>
        <td>
		<?php echo $view['master_roomnos_id'];?>
        <?php 
if($bb>0){?>
         <?php echo ' / '; ?>
        <?php echo @$master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$view['master_tables_id']), array()); ?>
      <?php } ?>
        </td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$view['master_stewards_id']), array());?></td>
        </tr>
        
<?php } else {?>
        
        <tr style="background-color:#3FF">
        <th>
        <div class="form-group"><div class="radio-list">
        <label><input type="radio" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $view['id'];?>)" value="<?php echo $view['id'];?>"></label>
        </div></div></th>
        <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$view['master_outlets_id']), array());?></td>
        <td><?php echo $view['id'];?></td>
        <td><?php echo $view['guest_name'];?></td>
        <td>
		<?php echo $view['master_roomnos_id'];?>
        <?php 
if($bb>0){?>
         <?php echo ' / '; ?>
        <?php echo @$master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$view['master_tables_id']), array()); ?>
      <?php } ?>
        </td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$view['master_stewards_id']), array());?></td>
        </tr>
        <?php }?>
        
        
        
         <?php
			}
			}
			exit;
		}
		//////////////////////
		if($this->request->query('Bill_settleing_kot_view_table')==1)
        {
			$table_id=$this->request->query("q");
			$this->loadmodel('pos_kot');
			$conditions=array('master_tables_id' => $table_id,'status'=>0);
			$fetch_kots=$this->pos_kot->find('all',array('conditions'=>$conditions));
			@$bb=$fetch_kots[0]['pos_kot']['master_tables_id']; 
			?>
            <table width="100%">
               <thead>
                <tr style=" border-bottom:1px solid #CCC">
                <th>Check</th><th>Outlet</th><th>Bill No.</th><th>Guest Name</th><th>Room No. / Table No.</th><th>Steward</th>
                </tr>
                </thead>
                <tbody>
                <?php
			
			foreach($fetch_kots as $dataa)
			{
				foreach($dataa as $view)
				{
					                    
                    $club_member_id=$view['club_member_id'];
													?>
                   <?php if($club_member_id>0){?>
                    
        <tr style="background-color:#FF0">
        <th>
        <div class="form-group"><div class="radio-list">
        <label><input type="radio" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $view['id'];?>)" value="<?php echo $view['id'];?>"></label>
        </div></div></th>
        <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$view['master_outlets_id']), array());?></td>
        <td><?php echo $view['id'];?></td>
        <td><?php echo $view['guest_name'];?></td>
        <td><?php echo $view['master_roomnos_id'];?>
        <?php 

if($bb>0){?>
         <?php echo ' / '; ?>
        <?php echo @$master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$view['master_tables_id']), array()); ?>
      <?php } ?>
        </td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$view['master_stewards_id']), array());?></td>
        </tr>
        

<?php } else {?>

          
        <tr style="background-color:#3FF">
        <th>
        <div class="form-group"><div class="radio-list">
        <label><input type="radio" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $view['id'];?>)" value="<?php echo $view['id'];?>"></label>
        </div></div></th>
        <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$view['master_outlets_id']), array());?></td>
        <td><?php echo $view['id'];?></td>
        <td><?php echo $view['guest_name'];?></td>
        <td><?php echo $view['master_roomnos_id'];?>
        <?php 

if($bb>0){?>
         <?php echo ' / '; ?>
        <?php echo @$master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$view['master_tables_id']), array()); ?>
      <?php } ?>
        </td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$view['master_stewards_id']), array());?></td>
        </tr>



 <?php }?>
         <?php
			}
			}
			exit;
		}
		
//////////////////////
		if($this->request->query('Bill_settleing_kot_view_outlet')==1)
        {
			$outlet_name=$this->request->query("q");
			$this->loadmodel('pos_kot');
			$conditions=array('master_outlets_id' => $outlet_name,'status'=>0);
			$fetch_kotss=$this->pos_kot->find('all',array('conditions'=>$conditions));
			@$bbb=$fetch_kotss[0]['pos_kot']['master_outlets_id'];
			//$club_member_id=$fetch_kotss[0]['pos_kot']['club_member_id']; 
			
			?>
            <table width="100%">
               <thead>
                <tr style=" border-bottom:1px solid #CCC">
                <th>Check</th><th>Outlet</th><th>Bill No.</th><th>Guest Name</th><th>Room No. / Table No.</th><th>Steward</th>
                </tr>
                </thead>
                <tbody>
                <?php
			
			foreach($fetch_kotss as $dataaa)
			{
				foreach($dataaa as $vieww)
				{
					$club_member_id=$vieww['club_member_id'];
													?>
                   <?php if($club_member_id>0){?>
                    <tr style="background-color:#FF0">
        <th>
        <div class="form-group"><div class="radio-list">
        <label><input type="radio" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $vieww['id'];?>)" value="<?php echo $vieww['id'];?>"></label>
        </div></div></th>
        <td><?php  echo @$Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$vieww['master_outlets_id']), array());?></td>
        <td><?php echo $vieww['id'];?></td>
        <td><?php echo $vieww['guest_name'];?></td>
        <td><?php echo $vieww['master_roomnos_id'];?>
        <?php 

if($bbb>0){?>
         <?php echo ' / '; ?>
        <?php echo @$master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$vieww['master_tables_id']), array()); ?>
      <?php } ?>
        </td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$vieww['master_stewards_id']), array());?></td>
        </tr>
                    <?php } else {?>
        <tr style="background-color:#3FF">
        <th>
        <div class="form-group"><div class="radio-list">
        <label><input type="radio" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $vieww['id'];?>)" value="<?php echo $vieww['id'];?>"></label>
        </div></div></th>
        <td><?php  echo @$Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$vieww['master_outlets_id']), array());?></td>
        <td><?php echo $vieww['id'];?></td>
        <td><?php echo $vieww['guest_name'];?></td>
        <td><?php echo $vieww['master_roomnos_id'];?>
        <?php 

if($bbb>0){?>
         <?php echo ' / '; ?>
        <?php echo @$master_table_no_fetch=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$vieww['master_tables_id']), array()); ?>
      <?php } ?>
        </td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$vieww['master_stewards_id']), array());?></td>
        </tr>
        
        <?php }?>
        
         <?php
			}
			}
			exit;
		}
		
///////////////////////////
		
		
		if($this->request->query('Bill_settleing_kot_view1')==1)
        {
			@$room_no_idd=$this->request->query("q");
		
			$this->loadmodel('room_checkin_checkout');
			$conditions=array('id' => $room_no_idd);
			$fetch_roomkots=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
			@$rm=$fetch_roomkots[0]['room_checkin_checkout']['master_roomno_id'];
			
			$this->loadmodel('pos_kot');
			$conditions=array('master_roomnos_id' => $rm,'status'=>0);
			@$fetch_kots=$this->pos_kot->find('all',array('conditions'=>$conditions));
			
			?>
            <table width="100%">
               <thead>
                <tr style=" border-bottom:1px solid #CCC">
                <th>Check</th><th>Outlet</th><th>Bill No.</th><th>Guest Name</th><th>Table No. / Room No.</th><th>Steward</th>
                </tr>
                </thead>
                <tbody>
                <?php
			
			foreach($fetch_kots as $dataa)
			{
				foreach($dataa as $view)
				{
					?>
        <tr>
        <th>
        <div class="form-group"><div class="radio-list">
        <label><input type="checkbox" name="bill" id="optionsRadios1" onclick="Item_name_replace(<?php echo $view['id'];?>)" value="<?php echo $view['id'];?>"></label>
        </div></div></th>
        <td><?php  echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$view['master_outlets_id']), array());?></td>
        <td><?php echo $view['id'];?></td>
        <td><?php echo $view['guest_name'];?></td>
        <td><?php echo $view['master_roomnos_id'];?></td>
        <td><?php  echo $steward_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_steward_name_fetch',$view['master_stewards_id']), array());?></td>
        </tr>
         <?php
			}
			}
			exit;
		}
		
///////
		
		if($this->request->query('fatch_room_vacantcheckin')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$company_name=$q[0];
			$room_type_id=$q[1];
			$plan_id=$q[2];
			
		if(!empty($company_name)){
		$this->loadmodel('fo_room_booking');
        $fo_room_booking=$this->fo_room_booking->find('all',array('conditions' => array('company_id' => $company_name,'master_room_type_id' => $room_type_id,'master_room_plan_id'=>$plan_id, 'flag' => "0")));
				if(!empty($fo_room_booking))
				{		
					echo $rcharge=$fo_room_booking[0]['fo_room_booking']['special_rate'].",";
					echo @$discount=$fo_room_booking[0]['fo_room_booking']['discount'].",";
					
				 $tax_id=$fo_room_booking[0]['fo_room_booking']['master_tax_id'];
				 $tax_id_explod =explode(',', $tax_id);
				 foreach($tax_id_explod as $taxxx1)
				 {
					 echo $taxxx1.' - ';
				 }
				
				}
				else{
				
				
				$this->loadmodel('master_room');
$master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $room_type_id, 'master_room_plan_id'=>$plan_id, 'flag' => "0")));
				if(!empty($master_room))
				{		
				echo $rcharge1=$master_room[0]['master_room']['tarrif_rate'].",";
				echo @$discount1=$master_room[0]['master_room']['discount'].",";
				 $tax_id=$master_room[0]['master_room']['master_tax_id'];
				 $tax_id_explod =explode(',', $tax_id);
				 foreach($tax_id_explod as $taxxx1)
				 {
					 echo $taxxx1.' - ';
				 }
				}
				}
		}
		

		else  {
				$this->loadmodel('master_room');
$master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $room_type_id, 'master_room_plan_id'=>$plan_id, 'flag' => "0")));
				
				if(!empty($master_room))
				{		
				echo $rcharge1=$master_room[0]['master_room']['tarrif_rate'].",";
				echo @$discount1=$master_room[0]['master_room']['discount'].",";
				 $tax_id=$master_room[0]['master_room']['master_tax_id'];
				 $tax_id_explod =explode(',', $tax_id);
				 foreach($tax_id_explod as $taxxx1)
				 {
					 echo $taxxx1.' - ';
				 }
				}}

	exit;
		}
		////////////////////////////////////////
				if($this->request->query('fatch_room_vacantreservation')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$company_name=$q[0];
			$room_type_id=$q[1];
			$plan_id=$q[2];
			
		if(!empty($company_name)){
		$this->loadmodel('fo_room_booking');
        $fo_room_booking=$this->fo_room_booking->find('all',array('conditions' => array('company_id' => $company_name,'master_room_type_id' => $room_type_id,'master_room_plan_id'=>$plan_id, 'flag' => "0")));
				if(!empty($fo_room_booking))
				{		
					echo $rcharge=$fo_room_booking[0]['fo_room_booking']['special_rate'].",";
					echo @$discount=$fo_room_booking[0]['fo_room_booking']['discount'].",";
					
				 $tax_id=$fo_room_booking[0]['fo_room_booking']['master_tax_id'];
				 $tax_id_explod =explode(',', $tax_id);
				 foreach($tax_id_explod as $taxxx1)
				 {
					 echo $taxxx1.' - ';
				 }
				
				}
				else{
				
				
				$this->loadmodel('master_room');
$master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $room_type_id, 'master_room_plan_id'=>$plan_id, 'flag' => "0")));
				if(!empty($master_room))
				{		
				echo $rcharge1=$master_room[0]['master_room']['tarrif_rate'].",";
				echo @$discount1=$master_room[0]['master_room']['discount'].",";
				 $tax_id=$master_room[0]['master_room']['master_tax_id'];
				 $tax_id_explod =explode(',', $tax_id);
				 foreach($tax_id_explod as $taxxx1)
				 {
					 echo $taxxx1.' - ';
				 }
				}
				}
		}
		

		else  {
				$this->loadmodel('master_room');
$master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $room_type_id, 'master_room_plan_id'=>$plan_id, 'flag' => "0")));
				
				if(!empty($master_room))
				{		
				echo $rcharge1=$master_room[0]['master_room']['tarrif_rate'].",";
				echo @$discount1=$master_room[0]['master_room']['discount'].",";
				 $tax_id=$master_room[0]['master_room']['master_tax_id'];
				 $tax_id_explod =explode(',', $tax_id);
				 foreach($tax_id_explod as $taxxx1)
				 {
					 echo $taxxx1.' - ';
				 }
				}}
	exit;
		}
		////////////////////////////////////////

		
		
		////////////////////////////////////
		if($this->request->query('fatch_room_vacantchecking')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$master_room_type_id=$q[0];
		$this->loadmodel('master_room');
		$master_room=$this->master_room->find('all',array('conditions' => array('master_room_type_id' => $master_room_type_id,'flag' => "0")));
				if(!empty($master_room))
				{		
					echo $rcharge=$master_room[0]['master_room']['tarrif_rate'].",";
				}
	exit;
		}
		////////////////////////////////////////
		////////////////////////////////
		if($this->request->query('fatch_room_vacant1')==1)
		{	$q=$this->request->query("q");
			$q=json_decode($q);
			$company_name=$q[0];
			$plan_id=$q[1];
			$this->loadmodel('fo_room_booking');
$fo_room_booking=$this->fo_room_booking->find('all',array('conditions' => array('company_id' => $company_name, 'master_room_plan_id'=>$plan_id, 'flag' => "0")));
				if(!empty($fo_room_booking))
				{		
					echo $rcharge1=$fo_room_booking[0]['fo_room_booking']['special_rate'].",";
				}
				
			$this->loadmodel('company_discount');
$company_discount=$this->company_discount->find('all',array('conditions' => array('company_name_id' => $company_name, 'flag' => "0")));
				if(!empty($company_discount))
				{		
					echo $discount=$company_discount[0]['company_discount']['discount'].",";
				}
					
	exit;
		}
		///////////////////////////
		///////////////////////////
		if($this->request->query('outlet_table_fetch')==1)
        {
            $outlet_id=$this->request->query("q");
            $this->loadmodel('master_table');
			
				 $conditionss=array('master_outlet_id' => $outlet_id , 'flag' => 0);
				$fetch_table_no=$this->master_table->find('all',array('conditions'=>$conditionss,'fields'=>array('id','table_no')));
				echo '<option value="">--- Select ---</option>';
                foreach($fetch_table_no as $key)
                {
					foreach($key as $item_tax=>$tax_data)
					{
						foreach($key as $dataa=>$one)
						{
							 $one['id'];
							 $one['table_no'];
						?><option  value="<?php echo $one['id']; ?>"><?php echo  $one['table_no']; ?></option> <?php
						}
					}
				}
				exit;
		}
		///////////////////////////
		if($this->request->query('outlet_cat_fetch')==1)
        {
            $outlet_id=$this->request->query("q");
            $this->loadmodel('master_item_category');
			$this->loadmodel('category_outlet_mapping');
				 $conditions=array('master_outlet_id' => $outlet_id , 'flag' => 0);
			 	$fetch_table_no=$this->category_outlet_mapping->find('all',array('conditions'=>$conditions,'fields'=>array('id','master_itemcategory_id')));
			$cat_session=$fetch_table_no[0]['category_outlet_mapping']['master_itemcategory_id'];	
			$explode_data=explode(",",$cat_session);
			$this->loadmodel('master_item_category');
			$fatch_master_item_cat=$this->master_item_category->find('all');
			?>
                        <option value="">--- Select ---</option>
                                         <?php
                        foreach($fatch_master_item_cat as $data)
                        {
                        if (in_array($data['master_item_category']['id'], $explode_data)){
                    ?>
                     <option value="<?php echo $data['master_item_category']['id'];?>" <?php if (in_array($data['master_item_category']['id'], $explode_data)){?> <?php } ?>>
					 <?php echo $data['master_item_category']['item_category'];?></option>
                            <?php
						}
                        }
                        ?>
                <?php
               /* foreach($fetch_table_no as $key)
                {
					foreach($key as $item_tax=>$tax_data)
					{
						foreach($key as $dataa=>$one)
						{
							 $one['id'];
							 $one['master_itemcategory_id'];
						?><option  value="<?php echo $one['id']; ?>"><?php echo  $one['master_itemcategory_id']; ?></option> <?php
						}
					}
				}*/
				exit;
		}
		
///////////////////////////
		if($this->request->query('outlet_item_c_fetch')==1)
        {
            $table_no=$this->request->query("q");
			//pr($table_no);
            $this->loadmodel('pos_kot');
			
				 $conditions=array('master_tables_id' => $table_no , 'flag' => 0, 'status'=>0);
				$fetch_table_noo=$this->pos_kot->find('all',array('conditions'=>$conditions));
				
				
				/*$steward=$ftc_dt['pos_kot']['master_stewards_id'];
				$this->loadmodel('master_steward');
				$conditions=array('id' => $steward , 'flag' => 0);
				$stew=$this->master_steward->find('all',array('conditions'=>$conditions, 'fields'=>array('steward_name')));
			    $st=$stew['master_steward']['steward_name'].",";*/
				
				foreach($fetch_table_noo as $ftc_dt){
				echo $cover=$ftc_dt['pos_kot']['covers'].",";
				echo $card_no=$ftc_dt['pos_kot']['card_no'].",";
				echo $room_no_idd=$ftc_dt['pos_kot']['master_roomnos_id'].",";
				echo $session=$ftc_dt['pos_kot']['session'].",";
				echo $guest_name=$ftc_dt['pos_kot']['guest_name'].",";
				echo $remark=$ftc_dt['pos_kot']['remarks'].",";
				echo $steward=$ftc_dt['pos_kot']['master_stewards_id'].",";
				}
				exit;
		}
		////////////

///////////////////////////
		
		 if($this->request->query('outlet_table_fetchh')==1)
        {
            $outlet_id=$this->request->query("q");
            $this->loadmodel('master_table');
			
				 $conditions=array('master_outlet_id' => $outlet_id , 'flag' => 0);
				$fetch_table_no=$this->master_table->find('all',array('conditions'=>$conditions,'fields'=>array('id','table_no')));
				echo '<option value="">--- Select ---</option>';
                foreach($fetch_table_no as $key)
                {
					foreach($key as $item_tax=>$tax_data)
					{
						foreach($key as $dataa=>$one)
						{
							 $one['id'];
							 $one['table_no'];
						?><option  value="<?php echo $one['id']; ?>"><?php echo  $one['table_no']; ?></option> <?php
						}
					}
				}
				exit;
		}
		////////////
		if($this->request->query('outlet_guest_fetch')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$room_no=$q[0];
			$this->loadmodel('room_checkin_checkout');
			$fetch_ckeckin_guest_name=$this->room_checkin_checkout->find('all', array('conditions' => array('master_roomno_id' => $room_no, 'status' => '0'),'order'=>'id DESC','limit'=>1));
			
			//pr($fetch_ckeckin_guest_name);
			if(!empty($fetch_ckeckin_guest_name)){}
			else
			{
			echo @$card_no=$fetch_ckeckin_guest_name[0]['room_checkin_checkout']['card_no'];
			}
exit;
		}	 
       ////////
	   if($this->request->query('kot_billing_delete_row')==1)
        {
            $delete_rows=$this->request->query("q");
           	$this->loadmodel('pos_kot_item_temp');
			$this->pos_kot_item_temp->delete(array('id' => $delete_rows));
			exit;
        }
		///
		if($this->request->query('delete_billingKOT_data')==1)
		{
			$q=$this->request->query("q");
			$this->loadmodel('pos_kot');
			$this->pos_kot->updateAll(array('flag' => 1), array('id' => $q));
			exit;
		}
		///
		if($this->request->query('delete_planKOT_data')==1)
		{
			$q=$this->request->query("q");
			$this->loadmodel('pos_kot');
			$this->pos_kot->updateAll(array('flag' => 1), array('id' => $q));
			exit;
		}
		//////////
		if($this->request->query('kot_plan_deleterow')==1)
        {
            $q=$this->request->query("q");
           	$this->loadmodel('pos_kot_item_temp');
			$this->pos_kot_item_temp->delete(array('id' => $q));
			exit;
        }
		if($this->request->query('checkin_data_deleterow')==1)
        {
			$delete_data=$this->request->query("delete");
			$this->loadmodel('room_checkin_checkout');
			$this->room_checkin_checkout->delete(array('id' => $delete_data));
			exit;
        }
		// 
		if($this->request->query('checkin_data_deleteroww')==1)
        {
			$delete_data=$this->request->query("delete");
			$this->loadmodel('room_reservation_no');
			$this->room_reservation_no->delete(array('id' => $delete_data));
			exit;
        }
		/////
		if($this->request->query('checkin_data_deleterowww')==1)
        {
			$delete_data=$this->request->query("delete");
			$this->loadmodel('fo_room_booking');
			$this->fo_room_booking->delete(array('id' => $delete_data));
			exit;
        }
		/////
		
		////$this->pos_kot_item_temp->delete(array('id' => $view['id'])); 11111
		if($this->request->query('Plan_kot_add_form')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
				$item=$q[0];
				if(empty($item))
				{
					$item=0;	
				}
				$plan_item=$q[1];
				if(empty($plan_item))
				{
					$plan_item=0;	
				}
				$quantity=$q[2];
				$rate=$q[3];
				$gross=$q[4];
				$texes=$q[5];
				$amount=$q[6];
				
				
				$user_id=$this->Session->read('user_id');
				$this->loadmodel('pos_kot_item_temp');	
				
$this->pos_kot_item_temp->saveAll(array('user_id'=> $user_id,'master_items_id' => @$item, 'master_itemss_id' => @$plan_item, 'quantity' => $quantity,'rate' => $rate,'taxes' => $texes,'amount' => $amount, 'gross' => $gross,'kot_type'=>3 ));

			$fetch_temp_pos=$this->pos_kot_item_temp->find('all', array('conditions' => array('user_id' => $user_id),'order'=>'id DESC','limit'=>1));
			//pr($fetch_temp_pos);
			//exit;
			
			foreach($fetch_temp_pos as $dattt)
			{
				
			$dele_id=$dattt['pos_kot_item_temp']['id'];
			 	$master_items_id=$dattt['pos_kot_item_temp']['master_items_id'];
				$master_itemss_id=$dattt['pos_kot_item_temp']['master_itemss_id'];
				$quantity=$dattt['pos_kot_item_temp']['quantity'];
				$rate=$dattt['pos_kot_item_temp']['rate'];
				$taxes=$dattt['pos_kot_item_temp']['taxes'];
				$gross=$dattt['pos_kot_item_temp']['gross'];
				$amount=$dattt['pos_kot_item_temp']['amount'];
				
			echo'<tr id="'.$dele_id.'">
                                <td>'.ucwords($item_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch',$dattt['pos_kot_item_temp']['master_items_id']), array())).'</td>
								<td>'.ucwords($plan_item=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch1',$dattt['pos_kot_item_temp']['master_itemss_id']), array())).'</td>
                               
                                <td>'.$quantity.'</td>
                                <td>'.$rate.'</td>
                                <td>'.$gross.'</td>
                                <td>'.$texes.'</td>
                                <td>'.$amount.' </td>
								<td align="center"><button type="button" class="btn btn-xs btn-danger" onclick="kot_plan_deleterow('.$dele_id.')"><i class="fa fa-trash-o"></i></button></td>
								</tr>';	
			}
			exit;
		}
		//////////////////////////
		if($this->request->query('Plan_kot_add_form1')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
				$item_name=$q[0];
				$amt=$q[1];
				$user_id=$this->Session->read('user_id');
				$this->loadmodel('pos_kot_item_temp');	
$this->pos_kot_item_temp->saveAll(array('user_id'=> $user_id,'master_items_id' => $item_name,'amt' => $amt, 'kot_type'=>3 ));
			$fetch_temp_pos=$this->pos_kot_item_temp->find('all', array('conditions' => array('user_id' => $user_id),'order'=>'id DESC','limit'=>1));
			foreach($fetch_temp_pos as $dattt)
			{
				
			$dele_id=$dattt['pos_kot_item_temp']['id'];
			$master_items_id=$dattt['pos_kot_item_temp']['master_items_id'];
			$amt=$dattt['pos_kot_item_temp']['amt'];
			echo'<tr id="'.$dele_id.'">
								<td>'.ucwords($item_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch',$dattt['pos_kot_item_temp'][                                'master_items_id']), array())).'</td>
								<td>'.$amt.' </td>
								<td align="center"><button type="button" class="btn btn-xs btn-danger" onclick="kot_plan_deleterow('.$dele_id.')"><i class="fa fa-trash-o"></i>                                 </button></td>
								</tr>';	
								}
								exit;
		}
		//////////////////////////
		if($this->request->query('outlet_table_fetch_plan')==1)
        {
            $outlet_id=$this->request->query("q");
            $this->loadmodel('master_table');
				 $conditions=array('master_outlet_id' => $outlet_id , 'flag' => 0 );
				$fetch_table_no=$this->master_table->find('all',array('conditions'=>$conditions,'fields'=>array('id','table_no')));
				echo '<option value="">--- Select ---</option>';
                foreach($fetch_table_no as $key)
                {
					foreach($key as $item_tax=>$tax_data)
					{
						foreach($key as $dataa=>$one)
						{
							 $one['id'];
							 $one['table_no'];
						?><option  value="<?php echo $one['id']; ?>"><?php echo  $one['table_no']; ?></option> <?php
						}
					}
				}
			exit;	
		}
		////
		/*if($this->request->query('fetch_plannamee')==1)
        {
            $plan_id=$this->request->query("q");
            $this->loadmodel('master_room_plan');
				 $conditions=array('id' => $plan_id, 'flag' => 0 );
				$fetch_pl_name=$this->master_room_plan->find('all',array('conditions'=>$conditions,'fields'=>array('plan_combo')));
				
				$explode_data=explode(",",$fetch_pl_name);
				
				
				
				//$ff= in_array($plan_combo, $fetch_pl_name);
				pr($explode_data);
				exit;
				
			echo '<option value="">--- Select ---</option>';
                foreach($fetch_table_no as $key)
                {
					foreach($key as $item_tax=>$tax_data)
					{
						foreach($key as $dataa=>$one)
						{
							 $one['id'];
							 $one['table_no'];
						?><option  value="<?php echo $one['id']; ?>"><?php echo  $one['table_no']; ?></option> <?php
						}
					}
				}
			exit;
		}*/
		//////////////////////////////
		if($this->request->query('plan_amount_item')==1)
		{
			$item=$this->request->query("q");
			$this->loadmodel('plan_item');
			$fetch_plan_amount=$this->plan_item->find('all', array('condition'=>array('id'=>$item)));
			if(empty($fetch_plan_amount)){}
			else
			{
			echo @$amount=$fetch_plan_amount[0]['plan_item']['item_cost'].',';
			}

	exit;
	
		}
		///
		////
		if($this->request->query('plan_item_amountt')==1)
		{
			 $session=$this->request->query("q");
			$this->loadmodel('plan_item');
			$this->loadmodel('plan_item_category');
			$this->loadmodel('master_item');
			$fetch_plan_amount=$this->plan_item->find('all', array('conditions'=>array('master_itemcategory_id'=>$session)));
			@$sessionn=$fetch_plan_amount[0]['plan_item']['item_name'];
			//pr($sessionn);
            $explode_data=explode(",",$sessionn);
			$this->loadmodel('master_item');
			$fatch_master_items=$this->master_item->find('all');
			?>
            <select class="form-control select2 select2_sample2" style="width:700px" name="plan_item[]" data-placeholder="Select..." multiple="multiple">
                        <option value=""></option>
                                         <?php
                        foreach($fatch_master_items as $data)
                        {
                        if (in_array($data['master_item']['id'], $explode_data)){
                    ?>
                     <option value="<?php echo $data['master_item']['id'];?>" <?php if (in_array($data['master_item']['id'], $explode_data)){?> selected="selected"<?php } ?>>
					 <?php echo $data['master_item']['item_name'];?></option>
                            <?php
						}
                        }
                        ?>
                        </select>
                        ,
                <?php
				if(empty($fetch_plan_amount)){}
			else
			{
			echo @$amount=$fetch_plan_amount[0]['plan_item']['item_cost'];
			}
			exit;
		}
		///
		
		////////////////////////////////////////////////////////
		if($this->request->query('other_services_entry')==1)
		{
			 $id=$this->request->query("q");
			$this->loadmodel('room_reservation');
			$this->loadmodel('room_reservation_no');
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_room_plan');
			$this->loadmodel('master_roomno');
			
			$fetch_master_room_type=$this->master_room_type->find('all', array('conditions'=>array('flag'=>0)));
			$fetch_master_roomno=$this->master_roomno->find('all', array('conditions'=>array('flag'=>0)));
			$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all', array('conditions'=>array('flag'=>0)));
			$fetch_room_reservation_no=$this->room_reservation_no->find('all');
			$fetch_room_reservation=$this->room_reservation->find('all', array('conditions'=>array('flag'=>0)));
			$fetch_master_room_plan=$this->master_room_plan->find('all', array('conditions'=>array('flag'=>0)));
			$fetch_plan_amount_ji=$this->room_reservation->find('all', array('conditions'=>array('id'=>$id)));
			@$r_rmt=$fetch_plan_amount_ji[0]['room_reservation']['plan_id'];
			$fetch_plan_amount=$this->room_reservation_no->find('all', array('conditions'=>array('room_reservation_id'=>$id)));
			
			$i=0;
			foreach($fetch_plan_amount as $room_reservation_no_data)
			{
				$i++;
				$tot=0;
                   @$rmt=$room_reservation_no_data['room_reservation_no']['room_type_id'];
				   @$trm=$room_reservation_no_data['room_reservation_no']['total_room'];
				    @$rct=$room_reservation_no_data['room_reservation_no']['room_charge'];
					@$rctt=$room_reservation_no_data['room_reservation_no']['taxes'];
					@$rctd=$room_reservation_no_data['room_reservation_no']['room_discount'];
					
					$tot=$trm*$rct;
					
				   ?>
                   <table width="100%" border="0" style="margin-top:5px;">
				   <tr id="<?php echo $i;?>" > 
                   <td class="form-group"><label><div style="float:left; width:60%"><select class=" form-control input-small" 
                    name="room_type_id[]" onchange="room_rate();" placeholder="Room Type" id="rtypeiddd">
                    <option value="">-Select--</option>
                    <?php
                    foreach($fetch_master_room_type as $data)
                    {
                    ?>
                    <option value="<?php echo $data['master_room_type']['id'];?>"
                     <?php if ($data['master_room_type']['id']==$rmt){ echo 'selected';} ?> ><?php echo $data['master_room_type']['room_type']; ?></option>
                    <?php
                    }
                    ?>
                    </select></div></label>
                </td>
                <?php
                foreach($fetch_plan_amount_ji as $room_reservation_data){
					@$r_rmt=$room_reservation_data['room_reservation']['plan_id'];
					?>
                    
                    <td><div class="form-group" style="float:left; width:50%"><select class=" form-control input-small" id="pliddd" name="plan_id[]" onchange="room_rate();"  placeholder="Plan Name">
                    <option value="">-Select--</option>
                    <?php
                    foreach($fetch_master_room_plan as $data)
                    {
                        ?>
                        <option value=
                        "<?php echo $data['master_room_plan']['id'];?>" <?php if ($data['master_room_plan']['id']==$r_rmt){ echo 'selected';} ?>>
                        <?php echo $data['master_room_plan']['plan_name'];?></option>
                        <?php
                    }
                    ?>
                    </select></div>
                    </td>
                    <?php } ?>
                   
                        <td class="form-group"><label><select class="form-control select2 select2_sample2 input-small c_count"
                         name="master_roomno_id[]" id="m2_iddd" multiple placeholder="Select Room No.">
                        <?php
                        foreach($fetch_master_roomno as $data)
                        {
                           $room_no=$data['master_roomno']['room_no'];
                            $room_no_explode=explode(',', $room_no);
                             
                           foreach($room_no_explode as $room_nos)
                            {
                              $room_vacant=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'function_ftc_room_report',$room_nos), array());
                                
                                if(!empty($room_vacant))
                                {  $roo_blank_status=$room_vacant[0]['room_checkin_checkout']['status'];
                                    if($roo_blank_status=='1')
                                    {
                                     ?>
                                        <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                    <?php
                                    }
                                }
                                else
                                {?>
                                    <option value="<?php echo $room_nos;?>"><?php echo $room_nos;?></option>
                                <?php
                                }
                            }
                        }
                                    ?>
                    </select></label>
                    </td>
            <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall c_change" tr_id="<?php echo $i;?>" placeholder="Total" name="total_room[]" id="total_roommm" value="<?php echo $trm;?>" ></label></td> 
            <td class="form-group"><label><input type="text" class="form-control input-inline input-xsmall c_change1" tr_id="<?php echo $i;?>" placeholder="Charge" name="room_charge[]" id="room_charge_iddd" value="<?php echo $rct;?>" onkeyup="c_count_change();"></label></td>
            
            <td><input type="hidden" class="form-control input-inline input-xsmall" placeholder="Tax" name="taxes[]" id="tax_iddd"  value="<?php echo $rctt;?>"></td>
            <td class="form-group"><input type="text" class="form-control input-inline input-xsmall"  placeholder="Discount" name="room_discount[]" id="discount_iddd"  value="<?php echo $rctd;?>" ></td>

             <td><input type="text" class="form-control input-inline input-xsmall" value="<?php echo $tot;?>" placeholder="Total" name="tg[]" id="tggg"></td>
            <td><label><button type="button" class="btn red btn-sm c_change2" onclick="dlt_row_change(<?php echo $i;?>);">Delete</button></label></td><tr></table>
    <?php
			}
			exit;
			
		}
        
		//////////////////////////////
		if($this->request->query('Bill_settleing_replace_form')==1)
        {
            $id=$this->request->query("q");
          	  $this->loadmodel('pos_kot');
				$conditions=array('id' => $id);
				$fetch_table_no=$this->pos_kot->find('all',array('conditions'=>$conditions,'fields'=>array('master_tables_id','guest_name','id', 'session', 'master_roomnos_id', 'card_no','user_id','club_member_id', 'foo_discount')));
                foreach($fetch_table_no as $key)
                {	
					foreach($key as $item_tax=>$tax_data)
					{
						$Bill_no=$tax_data['id'];
						$session=$tax_data['session'];
						$master_tables_id=$tax_data['master_tables_id'];
						$guest_name=$tax_data['guest_name'];
						$master_roomnos_id=$tax_data['master_roomnos_id'];
						$card_no=$tax_data['card_no'];
						$session=$tax_data['session'];
						$user_id=$tax_data['user_id'];
						$club_member_id=$tax_data['club_member_id'];
						$foo_discount=$tax_data['foo_discount'];
					}
				}
				?>
                <table class="table table-borderd" style="width:85% !important;">
                <tr style="text-align: center;">
                <td>
                    Table No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" value="<?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_table_no_fetch',$master_tables_id), array());?>" name="table_no" />
                </td>
                <td>
                    Guest Name
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" value="<?php echo ucwords($guest_name); ?>" name="guest_name" />
                </td>
                <td>
                    Bill No.
                </td>
                <td>
                <input type="text" class="form-control input-inline input-small" value="<?php echo $Bill_no; ?>" name="bill_no" />
                </td>
                <td>
                    Session                </td>
                <td>
                <input type="text" class="form-control input-inline input-small"  value="<?php echo $session; ?>" name="session" />
                </td>
                
                <td>
                <input type="hidden" value="<?php echo $master_roomnos_id; ?>" name="master_roomnos_id" /></td>
                </td>
                <td>
                <input type="hidden" value="<?php echo $card_no; ?>" name="card_n" />
                <input type="hidden" value="<?php echo $user_id; ?>" name="p_user_id" />
                 <input type="hidden" value="<?php echo $club_member_id; ?>" name="c_member_id" /></td>
                <td>
                
                </tr>
                </table>
                
				<table class="table table-striped table-hover">
               	<thead>
                <tr>
                <th>Check</th><th>Item Name</th><th>Quantity</th><th>Rate</th><th>Gross Amount</th><th>Tax</th><th>Amount</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$this->loadmodel('pos_kot_item');
				$fetch_item_all=$this->pos_kot_item->find('all',array('conditions'=>array('pos_kots_id'=>$Bill_no)));
			
				$total_amt='';
				$total_tax='';
				$total_gross='';
				$thali=array();
				foreach($fetch_item_all as $item_one)
				{
					$m_i_id=$item_one['pos_kot_item']['master_items_id'];
					foreach($fetch_item_all as $item_one_rpt)
					{
						$m_i_id1=$item_one_rpt['pos_kot_item']['master_items_id'];
					}
					
					foreach($item_one as $item_two)
					{
						if(array_key_exists($item_two['master_items_id'],$thali))
						{
							$thali[$item_two['master_items_id']]=array('quantity'=>$item_two['quantity']+$thali[$item_two['master_items_id']]['quantity'],'rate'=>$item_two['rate'],'gross'=>$item_two['gross']+$thali[$item_two['master_items_id']]['gross'],'taxes'=>$item_two['taxes']+$thali[$item_two['master_items_id']]['taxes'],'amount'=>$item_two['amount']+$thali[$item_two['master_items_id']]['amount']);
						}
						else
						{
							$thali[$item_two['master_items_id']]=array('quantity'=>$item_two['quantity'],'rate'=>$item_two['rate'],'gross'=>$item_two['gross'],'taxes'=>$item_two['taxes'],'amount'=>$item_two['amount']);
						}
						
					}
				}	
					foreach($thali as $key=>$data_act_data)
					{
						
							?>
                    <tr>
                    <td><div class="form-group"><div class="checkbox-list"><label><input onchange="add_item_for_bill(<?php echo $item_two['id']?>)" type="checkbox" checked="checked"></label></div></div></td>
                    <td><?php  echo $table_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$key), array());?></td>
                    <td><?php echo $data_act_data['quantity'];?></td>
                    <td><?php echo $data_act_data['rate'];?></td>
                    <td><?php echo $data_act_data['gross'];?></td>	
                    <td><?php echo $data_act_data['taxes'];?></td>
                    <td><?php echo $data_act_data['amount'];?></td>
                    </tr><?php
					
										
					$total_amt+=$data_act_data['amount'];
					$total_gross+=$data_act_data['gross'];
					$total_tax+=$data_act_data['taxes'];
					
					
					}
				//pr($thali);
				//		exit;
				?>
                
                
                
               
               </tbody>
               </table>
                <table class="table" style=" width:100% !important;">
                <tr style="text-align: center;">
                <td>
                    Gross
                </td>
                <td>
                <input type="text" class="form-control input-inline input-xsmall" readonly="readonly" value="<?php echo $total_gross; ?>" id="gross_id" name="gross" />
                </td>
                <td>
                    Taxes
                </td>
                <td>
                <input type="text" class="form-control input-inline input-xsmall" readonly="readonly" value="<?php echo $total_tax; ?>" name="taxes" />
                </td>
                <td>
                    Amount
                </td>
                <td>
                <input type="text" class="form-control input-inline input-xsmall" readonly="readonly" value="<?php echo $total_amt; ?>" name="amount" id="amount_id" />
                </td>
                <td>
                    Service Charge
                </td>
                <td>
                <input type="text" class="form-control input-inline input-xsmall" value="0" name="service_charge" id="service_charge" onkeyup="add_discount();"/>
                </td>
                 
                 <td>
                    Tips
                </td>
                <td>
                <input type="text" class="form-control input-inline input-xsmall" value="0" name="tips" id="tips" onkeyup="add_discount();"/>
                </td>
               
                </tr>
                <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>	
                     <td align="center">
                    Discount
                </td>
               
                   <?php if($foo_discount>0){
					   
					   $tt=($total_amt*$foo_discount)/100;
					   $Totamt_dis=$total_amt-$tt;
					   ?>
                <td align="center">
                  <div class="form-group" ><input type="text" disabled="disabled" class="form-control input-inline input-xsmall" value="<?php echo $tt;?>"  id="discount_id" name="discount" onkeyup="add_discount();"/></div>
                </td>
                <?php } else {
					$Totamt_dis=$total_amt;
					?>
                <td align="center">
                  <div class="form-group" ><input type="text" class="form-control input-inline input-xsmall" value="<?php echo $foo_discount;?>"  id="discount_id" name="discount" onkeyup="add_discount();"/></div>
                </td>
                <?php }?>
                
                <td align="center">
                    Net Amount
                </td>
                <td align="center">
                <input type="text" class="form-control input-inline input-xsmall" value="<?php echo $Totamt_dis; ?>" name="amountt" id="amount_idd" />
                </td>
                     
                     
                     </tr></thead></table></fieldset></td></tr>
                  
                </table>
                <?php
				exit;
		}
		///////
		if($this->request->query('Bill_settleing_replace_form11')==1)
        {
            $id=$this->request->query("q");
			pr($id);
			//exit;
			//$diff = abs(strtotime($date2) - strtotime($date1));
          	    $this->loadmodel('room_checkin_checkout');
				$conditions=array('id' => $id);
				$fetch_table_no1=$this->room_checkin_checkout->find('all',
				array('conditions'=>$conditions,'fields'=>array('master_roomno_id','id', 'duration', 'taxes', 'room_charge', 'arrival_date', 'checkout_date')));
				//$explode_data[]=explode(",",$fetch_table_no1);
				
              $check=sizeof($fetch_table_no1);
		if($check>0)
		{ 
		$view_table='<div style="width:10%;"><table  width="100%" border="0"> 
		<tr>
		<th  align="center">Check</td>
		<th  align="center" style="padding-left:50px">Room No.</td>
		<th  align="center" style="padding-left:50px">Arrival Date</td>
		<th  align="center" style="padding-left:50px">Departure Date</td>
		<th  align="center" style="padding-left:50px">Room Charge</td>
		<th  align="center" style="padding-left:50px">Total Day</td>
		<th  align="center" style="padding-left:50px">Taxes</td>
		</tr>';
			//$grandamt=0;
			foreach($fetch_table_no1 as $ftc_data)
			{ 
			$edit_quantity=$ftc_data['room_checkin_checkout']['master_roomno_id'];
			//$edit_quantity1=explode(",",$edit_quantity);
			$edit_rate=$ftc_data['room_checkin_checkout']['room_charge'];
			//$edit_rate1=explode(",",$edit_rate);
			$edit_gross=$ftc_data['room_checkin_checkout']['duration'];
			//$edit_gross1=explode(",",$edit_gross);
			$edit_taxes=$ftc_data['room_checkin_checkout']['taxes'];
			//$edit_taxes1=explode(",",$edit_taxes);
			//$grandamt+=$edit_amount;
			$view_table.='<tr>
			<td><div class="form-group"><div class="checkbox-list"><label><input type="checkbox" onchange="add_item_for_bill();" id="f"></label></div></div></td>
			<td><input type="text" class="form-control input-inline input-small" id="a+" readonly value='.$edit_quantity.'></td>
			<td><input type="text" class="form-control input-inline input-small" id="b+" readonly value='.$edit_rate.'></td>
			<td><input type="text" class="form-control input-inline input-small" id="c+" readonly value='.$edit_gross.'></td>
			<td><input type="text" class="form-control input-inline input-small"  id="d+" readonly value='.$edit_taxes.'></td>
				</tr>';
				}
            $view_table.='</table></fieldset></div>';
				 echo $view_table;				
			 }
			
			exit;
		}
		
		///////
		

		///////////////////
		if($this->request->query('billing_kot_add_form')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
				$item=$q[0];
				$quantity=$q[1];
				$rate=$q[2];
				$gross=$q[3];
				$texes=$q[4];
				$amount=$q[5];
				$m_cat_i=$q[6];
				$user_id=$this->Session->read('user_id');
					$this->loadmodel('pos_kot_item_temp');
				
$this->pos_kot_item_temp->saveAll(array('user_id'=> $user_id,'master_items_id' => $item,'quantity' => $quantity,'rate' => $rate,'taxes' => $texes,'amount' => $amount, 'gross' => $gross, 'item_category_id'=>$m_cat_i, 'kot_type' => 1));
				
			$fetch_temp_pos=$this->pos_kot_item_temp->find('all', array('conditions' => array('user_id' => $user_id),'order'=>'id DESC','limit'=>1));
			foreach($fetch_temp_pos as $dattt)
			{
				
			$dele_id=$dattt['pos_kot_item_temp']['id'];
			 	$master_items_id=$dattt['pos_kot_item_temp']['master_items_id'];
				
				$quantity=$dattt['pos_kot_item_temp']['quantity'];
				$rate=$dattt['pos_kot_item_temp']['rate'];
				$taxes=$dattt['pos_kot_item_temp']['taxes'];
				$gross=$dattt['pos_kot_item_temp']['gross'];
				$amount=$dattt['pos_kot_item_temp']['amount'];
			echo'<tr id="'.$dele_id.'">
                                <td>'.ucwords($item_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch',$dattt['pos_kot_item_temp']['master_items_id']), array())).'</td>
                               
                                <td>'.$quantity.'</td>
                                <td>'.$rate.'</td>
                                <td>'.$gross.'</td>
                                <td>'.$texes.'</td>
                                <td>'.$amount.' </td>
								<td align="center"><button type="button" class="btn btn-xs btn-danger" onclick="kot_billing_deleterow('.$dele_id.')"><i class="fa fa-trash-o"></i></button></td>
								
								</tr>';	
			}
exit;
		}
		/////////////////////
		///////////////////
		if($this->request->query('billing_kot_2_add_form')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
				$item=$q[0];
				$quantity=$q[1];
				$rate=$q[2];
				$gross=$q[3];
				$texes=$q[4];
				$amount=$q[5];
				$m_cat_i=$q[6];
				$user_id=$this->Session->read('user_id');
					$this->loadmodel('pos_kot_item_temp');
				
$this->pos_kot_item_temp->saveAll(array('user_id'=> $user_id,'master_items_id' => $item,'quantity' => $quantity,'rate' => $rate,'taxes' => $texes,'amount' => $amount, 'gross' => $gross,'item_category_id'=>$m_cat_i,'kot_type' => 4));
				
			$fetch_temp_pos=$this->pos_kot_item_temp->find('all', array('conditions' => array('user_id' => $user_id),'order'=>'id DESC','limit'=>1));
			foreach($fetch_temp_pos as $dattt)
			{
				
			$dele_id=$dattt['pos_kot_item_temp']['id'];
			 	$master_items_id=$dattt['pos_kot_item_temp']['master_items_id'];
				
				$quantity=$dattt['pos_kot_item_temp']['quantity'];
				$rate=$dattt['pos_kot_item_temp']['rate'];
				$taxes=$dattt['pos_kot_item_temp']['taxes'];
				$gross=$dattt['pos_kot_item_temp']['gross'];
				$amount=$dattt['pos_kot_item_temp']['amount'];
			echo'<tr id="'.$dele_id.'">
                                <td>'.ucwords($item_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch',$dattt['pos_kot_item_temp']['master_items_id']), array())).'</td>
                               
                                <td>'.$quantity.'</td>
                                <td>'.$rate.'</td>
                                <td>'.$gross.'</td>
                                <td>'.$texes.'</td>
                                <td>'.$amount.' </td>
								<td align="center"><button type="button" class="btn btn-xs btn-danger" onclick="kot_billing_deleterow('.$dele_id.', '.$amount.')"><i class="fa fa-trash-o"></i></button></td>
								
								</tr>';	
			}
exit;
		}
		///////////////////////////////
		if($this->request->query('room_reseveration_Edit_form')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$company_name=$q[0];
			if(empty($company_name)){ $company_name=0;}
			$nationality=$q[1];
		 	$telephone=$q[2];
			$fax=$q[3];
			$email_id=$q[4];
			$arrival_date_edit=$q[5];
			
			if($arrival_date_edit==''){  
			$arrival_date='0000-0-00'; } else {
				$arrival_date=date('Y-m-d', strtotime($arrival_date_edit));
			}
			$departure_date_edit=$q[6];
			if($departure_date_edit==''){  
			$departure_date='0000-0-00'; } else {
				$departure_date=date('Y-m-d', strtotime($departure_date_edit));
			}
			$plan_id=$q[7];
			if(empty($plan_id)){ $plan_id=0;}
			$billing_instruction=$q[8];
			$source_of_booking=$q[9];
			$safari_required=$q[10];
			$booking_thru_sales=$q[11];
			$reservation_status=$q[12];
			$room_type_id=$q[13];
			if(empty($room_type_id)){ $room_type_id=0;}
			$requested=$q[14];
			$granted=$q[15];
			$rate_per_night=$q[16];
			$remarks=$q[17];
			$name_person=$q[18];
			$room_rev_id=$q[19];
			$advance=$q[20];
			$booking_type=$q[21];
			$outlet_venue_id=$q[22];
			if(empty($outlet_venue_id)){ $outlet_venue_id=0;}
			$b_date=$q[23];
			if($b_date==''){  
			$b_date='0000-0-00'; } else {
				$b_date=date('Y-m-d', strtotime($b_date));
			}
			$id_proof_no=$q[24];
			$traveller_name=$q[25];
			//$total_room=$q[26];
			

			$this->loadmodel('room_reservation');
			$this->room_reservation->updateAll(array('company_id' => "'$company_name'",'nationality' => "'$nationality'",'telephone' => "'$telephone'",'fax' => "'$fax'",'email_id' => "'$email_id'",'arrival_date' => "'$arrival_date'",'departure_date' => "'$departure_date'",'plan_id' => "'$plan_id'",'billing_instruction' => "'$billing_instruction'",'source_of_booking' => "'$source_of_booking'",'safari_required' => "'$safari_required'",'booking_thru_sales' => "'$booking_thru_sales'",'reservation_status' => "'$reservation_status'",'remarks' => "'$remarks'",'room_type_id' => "'$room_type_id'",'requested' => "'$requested'",'granted' => "'$granted'",'rate_per_night' => "'$rate_per_night'",'name_person' => "'$name_person'",'advance'=>"'$advance'",'booking_type'=>"'$booking_type'", 'master_outlet_id' => "'$outlet_venue_id'", 'b_date' => "'$b_date'",'id_proof_no' => "'$id_proof_no'",'traveller_name' => "'$traveller_name'"), array( 'id' => $room_rev_id ));
		exit;
			
		}
		if($this->request->query('editoption_itemtype_ajax')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
             $editoption_itemtype=$q[0];
            $this->loadmodel('master_item_type');
			$this->loadmodel('master_taxe');
			
				$conditions=array('id' => $editoption_itemtype);
				$fetch_edit_tax_id=$this->master_item_type->find('all',array('conditions'=>$conditions,'fields'=>array('master_tax_id')));
				
                foreach($fetch_edit_tax_id as $data=>$key)
                {
					foreach($key as $data1=>$key1)
                	{
						
						foreach($key1 as $data2=>$master_tax_id)
                		{
							$master_tax_id;
						}
					}
				}
				
				$fetch_master_taxe=$this->master_taxe->find('all');
			
				echo '<option value="">--- Select ---</option>';
                foreach($fetch_master_taxe as $item_tax=>$tax_data)
                {
					
                    ?><option <?php if($tax_data['master_taxe']['id']==$master_tax_id){?> selected="selected" <?php }?> value="<?php echo  $tax_data['master_taxe']['id'] ?>"><?php echo  $tax_data['master_taxe']['name']?></option>
                    <?php
                }
exit;
        }
		////////////////////
		if($this->request->query('delete_ncKOT_data')==1)
		{
			$q=$this->request->query("q");
			$this->loadmodel('pos_kot');
			$this->pos_kot->delete(array('id' => $q));
exit;
		}
		///
		if($this->request->query('kot_NC_delete_row')==1)
        {
            $delete_rows=$this->request->query("q");
           	$this->loadmodel('pos_kot_item_temp');
			$this->pos_kot_item_temp->delete(array('id' => $delete_rows));
exit;
        }
		///
		if($this->request->query('NC_kot_add_form')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
				$item=$q[0];
				$quantity=$q[1];
				$rate=$q[2];
				$gross=$q[3];
				$texes=$q[4];
				$amount=$q[5];
				$m_cat_i=$q[6];
				$user_id=$this->Session->read('user_id');
				$this->loadmodel('pos_kot_item_temp');	
$this->pos_kot_item_temp->saveAll(array('user_id'=> $user_id,'master_items_id' => $item,'quantity' => $quantity,'rate' => $rate,'taxes' => $texes,'amount' => $amount, 'gross' => $gross,'item_category_id'=>$m_cat_i,'kot_type'=>2 ));
			$fetch_temp_pos=$this->pos_kot_item_temp->find('all', array('conditions' => array('user_id' => $user_id),'order'=>'id DESC','limit'=>1));
			foreach($fetch_temp_pos as $dattt)
			{
			    $dele_id=$dattt['pos_kot_item_temp']['id'];
			 	$master_items_id=$dattt['pos_kot_item_temp']['master_items_id'];
				$quantity=$dattt['pos_kot_item_temp']['quantity'];
				$rate=$dattt['pos_kot_item_temp']['rate'];
				$taxes=$dattt['pos_kot_item_temp']['taxes'];
				$gross=$dattt['pos_kot_item_temp']['gross'];
				$amount=$dattt['pos_kot_item_temp']['amount'];
			echo'<tr id="'.$dele_id.'">
                                <td>'.ucwords($item_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_item_fetch',$dattt['pos_kot_item_temp']['master_items_id']), array())).'</td>
                                <td>'.$quantity.'</td>
                                <td>'.$rate.'</td>
                                <td>'.$gross.'</td>
                                <td>'.$texes.'</td>
                                <td>'.$amount.' </td>
								<td align="center"><button type="button" class="btn btn-xs btn-danger" onclick="kot_NC_deleterow('.$dele_id.')"><i class="fa fa-trash-o"></i></button></td>
								</tr>';	
			}
exit;
		}
		/////
		if($this->request->query('outlet_table_fetch_NC')==1)
        {
            $outlet_id=$this->request->query("q");
            $this->loadmodel('master_table');
			
				 $conditions=array('master_outlet_id' => $outlet_id,'flag' => 0);
				$fetch_table_no=$this->master_table->find('all',array('conditions'=>$conditions,'fields'=>array('id','table_no')));
				echo '<option value="">--- Select ---</option>';
                foreach($fetch_table_no as $key)
                {
					foreach($key as $item_tax=>$tax_data)
					{
						foreach($key as $dataa=>$one)
						{
							 $one['id'];
							 $one['table_no'];
						?><option  value="<?php echo $one['id']; ?>"><?php echo  $one['table_no']; ?></option> <?php
						}
					}
				}
				exit;
		}
		////
		if($this->request->query('outlet_guest_fetch_NC')==1)
		{
			 $room_no=$this->request->query("q");
			$this->loadmodel('room_checkin_checkout');
			$fetch_ckeckin_guest_name=$this->room_checkin_checkout->find('all', array('conditions' => array('master_roomno_id' => $room_no, 'status' => 0),'order'=>'id DESC','limit'=>1));
			if(empty($fetch_ckeckin_guest_name)){}
			else
			{
			echo @$Guest_name=$fetch_ckeckin_guest_name[0]['room_checkin_checkout']['guest_name'];
			}
exit;
		}
		//
		if($this->request->query('outlet_guest_fetch_plan')==1)
		{
			 $room_no=$this->request->query("q");
			 
			$this->loadmodel('room_checkin_checkout');
			$fetch_ckeckin_guest_name=$this->room_checkin_checkout->find('all', array('conditions' => array('master_roomno_id' => $room_no, 'status' => 0),'order'=>'id DESC','limit'=>1));
			
			if(empty($fetch_ckeckin_guest_name)){}
			else
			{
			echo @$Guest_name=$fetch_ckeckin_guest_name[0]['room_checkin_checkout']['guest_name'].',';
			echo @$card=$fetch_ckeckin_guest_name[0]['room_checkin_checkout']['card_no'].',';
			echo @$plan=$fetch_ckeckin_guest_name[0]['room_checkin_checkout']['plan_id'].',';
			echo @$combo=$fetch_ckeckin_guest_name[0]['room_checkin_checkout']['plan_combo'];
			//echo $type_id= $fetch_ckeckin_guest_name[0]['room_checkin_checkout']['plan_combo'];
           //$explode_data[]=explode(",",$type_id);
			}
       
	   
exit;
		}
		///////////////////
		
		if($this->request->query('itemtype_addform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$item_type_form=$q[0];
			$master_tax_id_add=$q[1];
			
			$this->loadmodel('master_item_type');
			$count=$this->master_item_type->find('count', array('conditions' => array('itemtype_name' => $item_type_form)));
			if(!empty($count))
			{
			$fetch_item_type=$this->master_item_type->find('all', array('conditions' => array('itemtype_name' => $item_type_form)));
			$item_type_fatch=$fetch_item_type[0]['master_item_type']['itemtype_name'];
			}
			
			
			if(@$item_type_fatch != $item_type_form)
			{
				
			//echo $item_type_form;
				$this->master_item_type->saveAll(array('itemtype_name' => $item_type_form,'master_tax_id' => $master_tax_id_add));
				$fetch_item_type=$this->master_item_type->find('all');
				echo '<option value="">--- Select Room Type ---</option>';
				foreach($fetch_item_type as $data)
				{
					echo '<option edit_item="'.$data['master_item_type']['itemtype_name'].'" value="'.$data['master_item_type']['id'].'">'.$data['master_item_type']['itemtype_name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		if($this->request->query('function_book_service_add')==1)
		{
			$service=$this->request->query("q");
			$this->loadmodel('master_other_service');
			$this->loadmodel('master_item_type');
			$count=$this->master_other_service->find('count', array('conditions' => array('service' => $service)));
			
			
			if($count==0)
			{
			$this->master_other_service->saveAll(array('service' => $service));
			$last_record_id=$this->master_other_service->getLastInsertID();
			
				$fetch_service_type=$this->master_other_service->find('all' ,array('conditions' => array('id' => $last_record_id)));
				$service_name=$fetch_service_type[0]['master_other_service']['service'];
				
				
				?>
                 <label><input name="other_service[]" type="checkbox" value="<?php echo $service_name; ?>" /> <?php echo $service_name; ?></label>
               <?php
				 
				
			}
			else
			{
				echo 'error';
			}
exit;
		}
		
		
		
		
		
		if($this->request->query('function_book_item_add')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$master_item_type_id=$q[0];
			$item_name=$q[1];
			$billing_rate=$q[2];
			$billing_room_rate=$q[3];
			$item_cost=$q[4];
			$status=$q[5];
			
			
			$this->loadmodel('master_item');
			$this->loadmodel('master_item_type');
			$count=$this->master_item->find('count', array('conditions' => array('item_name' => $item_name)));
			$fetch_master_item_type=$this->master_item_type->find('all');
			
			if($count==0)
			{
			$this->master_item->saveAll(array('item_name' => $item_name,'master_item_type_id' => $master_item_type_id,'billing_rate' => $billing_rate,'billing_room_rate' => $billing_room_rate,'item_cost' => $item_cost,'status' => $status));
			$last_record_id=$this->master_item->getLastInsertID();
			
				$fetch_item_type=$this->master_item->find('all' ,array('conditions' => array('id' => $last_record_id)));
				$item_name=$fetch_item_type[0]['master_item']['item_name'];
				$item_id=$fetch_item_type[0]['master_item']['id'];
				$master_item_type_id=$fetch_item_type[0]['master_item']['master_item_type_id'];
				
				?>
                
                <input type="hidden" id="item_id" value="<?php echo $item_id; ?>">
                <input type="hidden" id="item_name" value="<?php echo $item_name; ?>">
                <input type="hidden" id="item_replace_id" value="<?php echo $master_item_type_id; ?>"><?php
				 
				
			}
			else
			{
				echo 'error';
			}
exit;
		}
		
if($this->request->query('billing_kot_item_add')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$master_item_type_id=$q[0];
			$item_name=$q[1];
			$billing_rate=$q[2];
			$billing_room_rate=$q[3];
			$item_cost=$q[4];
			$status=$q[5];
			$master_itemcategory_id=$q[6];
			
			$this->loadmodel('master_item');
			$count=$this->master_item->find('count', array('conditions' => array('item_name' => $item_name)));
			
			if($count==0)
			{
			$this->master_item->saveAll(array('master_itemcategory_id' => $master_itemcategory_id,'item_name' => $item_name,'master_item_type_id' => $master_item_type_id,'billing_rate' => $billing_rate,'billing_room_rate' => $billing_room_rate,'item_cost' => $item_cost,'status' => $status));
			$last_record_id=$this->master_item->getLastInsertID();
				$fetch_item_type=$this->master_item->find('all');
				echo '<option value=""> Select </option>';
				foreach($fetch_item_type as $data)
				{
					echo '<option quantity="1" rate="'.$data['master_item']['billing_room_rate'].'" amount="'.$data['master_item']['item_cost'].'"  value="'.$data['master_item']['id'].'">'.$data['master_item']['item_name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		/*if($this->request->query('item_type_editform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$editoption_itemtype=$q[0];
			$edit_itemtype=$q[1];
			$edit_item_tex=$q[2];
			
			$this->loadmodel('master_item_type');
			$count=$this->master_item_type->find('count', array('conditions' => array('itemtype_name' => $edit_itemtype)));
			if(!empty($count))
			{
				$fetch_item_type1=$this->master_item_type->find('all', array('conditions' => array('itemtype_name' => $edit_itemtype)));
				$item_type=$fetch_item_type1[0]['master_item_type']['itemtype_name'];
				$item_type_id=$fetch_item_type1[0]['master_item_type']['id'];
			}
			if((@$item_type != $edit_itemtype) || ($editoption_itemtype==@$item_type_id))
			{
				
				$this->master_item_type->updateAll(array('itemtype_name' => "'$edit_itemtype'",'master_tax_id' => "'$edit_item_tex'"), array('id' => $editoption_itemtype));
				$fetch_itemmm_type=$this->master_item_type->find('all');
				echo '<option value="">--- Select Room Type ---</option>';
				foreach($fetch_itemmm_type as $data)
				{
					echo '<option edit_item="'.$data['master_item_type']['itemtype_name'].'" value="'.$data['master_item_type']['id'].'">'.$data['master_item_type']['itemtype_name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		if($this->request->query('delete_master_item_type_form')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			 $deleteoption=$q[0];
			$this->loadmodel('master_item_type');
			$this->master_item_type->updateAll(array('flag' => 1 ),array('id' => $deleteoption));
			$fetch_item_type=$this->master_item_type->find('all', array('conditions' => array('flag' => "0")));
			echo '<option value="">--- Select item Type ---</option>';
			foreach($fetch_item_type as $data)
			{
				echo '<option edit_item="'.$data['master_item_type']['itemtype_name'].'" value="'.$data['master_item_type']['id'].'">'.$data['master_item_type']['itemtype_name'].'</option>';
			}
exit;
		}*/
		if($this->request->query('edit_master_table')==1)
		{
			 $q=$this->request->query("q");
			 $q=json_decode($q);
			 $edit_outlet_id=$q[0];
			 $edit_table_capacity=$q[1];
			 $edit_table_no=$q[2];
			 $id=$q[3];
			 $i=$q[4];
			 $this->loadmodel('master_table');
			 $this->loadmodel('master_outlet');
		
				$this->master_table->updateAll(array('master_outlet_id' => "'$edit_outlet_id'", 'table_capacity' => "'$edit_table_capacity'", 'table_no' => "'$edit_table_no'"), array('id' => $id));
		?> 
                            <td><?php echo $i; ?></td>
                    <td><?php
                            echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$edit_outlet_id), array()); ?></td>        
                             <td><?php echo $edit_table_capacity; ?></td>
                            <td><?php echo $edit_table_no; ?></td>
                            
                   			<td><a class="btn default btn-xs blue-stripe" data-toggle="modal" href="#edit<?php echo $id; ?>"> Edit</a>
                            
                              <div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="submit" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here.!</h4>
										</div>
										<div class="modal-body">
                     
                                             <div class="table-responsive">
                                         
                                                <table class="table self-table" style=" width:100% !important;" border="0">
                                                 <tr><td><label>Outlet Name</label></td>
                                                <td><select class="form-control input-medium" id="edit_outlet_id<?php echo $id;?>">
                                                    <option value="">--Select--</option>
                                                    <?php
													$fetch_master_outlet=$this->master_outlet->find('all');
                                                    foreach($fetch_master_outlet as $data1)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $data1['master_outlet']['id'];?>" <?php if($data1['master_outlet']['id']==$edit_outlet_id){ echo 'selected'; } ?>><?php echo $data1['master_outlet']['outlet_name'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select></td>
                                                </tr>
                                                <tr>
                                                <td><label>Table Capacity</label></td>
                                                <td><input type="text" class="form-control input-inline input-medium" placeholder="Table Capacity" id="edit_table_capacity<?php echo $id;?>" value="<?php echo $edit_table_capacity; ?>"></td>
                                                </tr>
                                                <tr>
                                                <td><label>Table No.</label></td>
                                                <td><input type="text" class="form-control input-inline input-medium" placeholder="Table No." id="edit_table_no<?php echo $id;?>" value="<?php echo $edit_table_no; ?>"></td>
                                                </tr>
                                                </table>
                                            </div>
                        				</div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                                            <button onclick="edit_table('<?php echo $id;?>','<?php echo $i;?>');" class="btn green"><i class="fa fa-plus"></i> Update</button>
                                        </div>
                                </div>
                                <!-- /.modal-content -->
                     		</div>
                            <!-- /.modal-dialog -->
            			</div>
                            </td>
                           
                                <td><button  onclick="delete_edit_table('<?php echo $id; ?>');" class="btn btn-danger btn-xs black"><i class="fa fa-trash-o"></i> Delete</button></td>
                           
                            <?php
exit;
		}
		if($this->request->query('delete_edit_table')==1)
		{
			 $q=$this->request->query("q");
			 $q=json_decode($q);
			
			 $id=$q[0];
			$this->loadmodel('master_table');
			 $this->master_table->delete(array('id' => $id));
exit;
		}
		if($this->request->query('edit_company_discount')==1)
		{
			 $q=$this->request->query("q");
			 $q=json_decode($q);
			 $company_category_id=$q[0];
			 $item_type_id=$q[1];
			 $discount=$q[2];
			 $other_discount=$q[3];
			 $id=$q[4];
			 
			 $i=$q[5];
			 $this->loadmodel('company_discount');
			 $this->loadmodel('company_category');
			 $this->loadmodel('master_item_type');
			$fetch_company_category=$this->company_category->find('all');	
			$fetch_master_item_type=$this->master_item_type->find('all');
			
			$this->company_discount->updateAll(array('company_category_id' => "'$company_category_id'", 'item_type_id' => "'$item_type_id'", 'discount' => "'$discount'", 'other_discount' => "'$other_discount'"), array('id' => $id));
			?> 
            <td><?php echo $i; ?></td>
            <td><?php echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_name',$company_category_id), array()); ?></td>        
            <td><?php echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'item_type_name',$item_type_id), array()); ?></td>              
            <td><?php echo $discount; ?></td>
            <td><?php echo $other_discount; ?></td>
            <td><a class="btn default btn-xs blue-stripe" data-toggle="modal" href="#edit<?php echo $id; ?>"> Edit</a>
            <div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="submit" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Update Here.!</h4>
                        </div>
                        <div class="modal-body">
     
                             <div class="table-responsive">
                         
                               <table class="table self-table" style=" width:100% !important;" border="0">
                               <tr>
                                <td><label>Company Category</label></td>
                                <td> <select class="form-control input-medium" name="company_category_id" id="company_category_id<?php echo $id; ?>">
                                    <option value="">-- Select --</option>
                                    <?php
                                    foreach($fetch_company_category as $data1)
                                    {
                                        ?>
                                        <option value="<?php echo $data1['company_category']['id']; ?>" <?php if($data1['company_category']['id']==$company_category_id){ echo 'selected'; } ?>><?php echo $data1['company_category']['category_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr><td><label>Item Type</label></td>
                                <td><select class="form-control input-medium" name="item_type_id" id="item_type_id<?php echo $id; ?>">
                                    <option value="">-- Select --</option>
                                    <?php
                                    foreach($fetch_master_item_type as $data1)
                                    {
                                        ?>
                                        <option value="<?php echo $data1['master_item_type']['id']; ?>" <?php if($data1['master_item_type']['id']==$item_type_id){ echo 'selected'; } ?>><?php echo $data1['master_item_type']['itemtype_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                <td><label>Discount</label></td>
                                <td><input type="text" class="form-control input-inline input-medium" placeholder="Enter Discount" name="discount" id="discount<?php echo $id; ?>" value="<?php echo $discount; ?>"></td>
                                </tr>
                               <tr>
                                <td><label>Other Discount</label></td>
                                <td><input type="text" class="form-control input-inline input-medium" placeholder="Other Discount" name="other_discount" id="other_discount<?php echo $id; ?>" value="<?php echo $other_discount; ?>"></td>
                                </tr>
                                </table>
                            </div>
                        </div>
                         <div class="modal-footer">
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button onclick="edit_company_discount('<?php echo $id; ?>','<?php echo $i;?>');" class="btn green"><i class="fa fa-plus"></i> Update</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            </td>
           <!--<td><button  onclick="delete_company_discount('<?php echo $id; ?>');" class="btn btn-danger btn-xs black"><i class="fa fa-trash-o"></i> Delete</button></td>-->
                           
                            <?php
exit;
		}
		/*if($this->request->query('delete_company_discount')==1)
		{
			 $q=$this->request->query("q");
			 $q=json_decode($q);
			
			 $id=$q[0];
			 $this->loadmodel('company_discount');
			 $this->company_discount->delete(array('id' => $id));
exit;
		}*/
		 if($this->request->query('room_reseveration_add_form')==1)
		{
			
			$date=date("Y-m-d");
		$cutrrent_time=date("h:i:s A");
		
			$q=$this->request->query("q");
			$q=json_decode($q);
			//pr($q);
			//exit;
			
			$company_name=$q[0];
			if(!empty($company_name))
			{
			}else{$company_name=0;}
			$nationality=$q[1];
		 	$telephone=$q[2];
			$fax=$q[3];
			$email_id=$q[4];
			$arrival_date_edit=$q[5];
			if($arrival_date_edit==''){  
			$arrival_date='0000-0-00'; } else {
				$arrival_date=date('Y-m-d', strtotime($arrival_date_edit));
			}
			$departure_date_edit=$q[6];
			if($departure_date_edit==''){  
			$departure_date='0000-0-00'; } else {
				$departure_date=date('Y-m-d', strtotime($departure_date_edit));
			}
			$plan_id=$q[7];
			$billing_instruction=$q[8];
			$source_of_booking=$q[9];
			$safari_required=$q[10];
			$booking_thru_sales=$q[11];
			$reservation_status=$q[12];
			$room_type_id=$q[13];
			if(!empty($room_type_id))
			{
			}else{$room_type_id=0;}
			$requested=$q[14];
			$granted=$q[15];
			$rate_per_night=$q[16];
			$remarks=$q[17];
			$name_person=$q[18];
			$advance=$q[19];
			$booking_type=$q[20];
			$outlet_venue_id=$q[21];
			if(!empty($outlet_venue_id))
			{
			}else{$outlet_venue_id=0;}
			$b_date=$q[22];
			if($b_date==''){  
			$b_date='0000-0-00'; } else {
				$b_date=date('Y-m-d', strtotime($b_date));
			}
			$id2=$q[23];
			$traveller_name=$q[24];
			$id_proof_no=$q[25];
			//$total_room=$q[26];
			//pr($checkin_id);
			
			$this->loadmodel('room_reservation');
			//echo $last_record_id=$this->room_reservation->getLastInsertID();
			//exit;
			$this->room_reservation->saveAll(array('booking_type' => $booking_type,'company_id' => $company_name,'nationality' => $nationality,'telephone' => $telephone,'fax' => $fax,'email_id' => $email_id,'arrival_date' => $arrival_date,'departure_date' => $departure_date,'plan_id' => $plan_id,'billing_instruction' => $billing_instruction,'source_of_booking' => $source_of_booking,'safari_required' => $safari_required,'booking_thru_sales' => $booking_thru_sales,'reservation_status' => $reservation_status,'remarks' => $remarks,'room_type_id' => $room_type_id,'requested' => $requested,'granted' => $granted,'rate_per_night' => $rate_per_night,'name_person' => $name_person,'advance'=>$advance,'date'=>$date, 'time' => $cutrrent_time,'master_outlet_id' => $outlet_venue_id,'b_date' => $b_date, 'traveller_name' => @$traveller_name, 'id_proof_no' => @$id_proof_no));	
	echo $last_record_id=$this->room_reservation->getLastInsertID();
	
	//$this->request->query('id')=$last_record_id;
	$this->room_reservation->updateAll(array('id2' => "'$last_record_id'"),array('id'=>$last_record_id));
	exit;	
		
	}
		if($this->request->query('function_book_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$res_id=$q[2];
			$outlet_id=$q[3];
			
			if(!empty($start_date1)){
			$start_date=date("Y-m-d",strtotime($start_date1));
			}else {$start_date=''; }
			if(!empty($end_date1)){
			$end_date=date("Y-m-d",strtotime($end_date1));
			}else {$end_date =''; }
			$this->loadmodel('function_booking');
			
			//$this->loadmodel('master_item_type');
			//$fetch_master_item_type=$this->master_item_type->find('all');
				$conditions = array ('flag' => 0 ,'res_no_id LIKE'  =>  $res_id, 'status' => 0);
			if(!empty($start_date) && !empty($res_id) && !empty($outlet_id)){
			$conditions = array ('b_date between ? and ?' => array($start_date, $end_date),'flag' => 0 , 'res_no_id LIKE' => '%'. $res_id . '%' , 'outlet_venue_id' => $outlet_id, 'status' => 0);	
			}
			else if(!empty($start_date) && !empty($res_id) ){
				$conditions = array ('b_date between ? and ?' => array($start_date, $end_date),'flag' => 0 , 'res_no_id LIKE' => '%'. $res_id . '%', 'status' => 0);
			}
			else if(!empty($start_date)) {
				$conditions = array ('b_date between ? and ?' => array($start_date, $end_date),'flag' => 0, 'status' => 0);
			}
			else if(!empty($outlet_id)){
				$conditions = array ('outlet_venue_id' => $outlet_id,'flag' => 0, 'status' => 0);
			}
			else if(!empty($res_id)){
				$conditions = array ('res_no_id LIKE' => '%'. $res_id . '%' , 'flag' => 0, 'status' => 0);
			}
			else
			{$conditions = array ('flag' => 0, 'status' => 0); }
			$fetch_function_booking=$this->function_booking->find('all', array('conditions' => $conditions));
				
if(empty($start_date))
			{?>
<table align="center"  style="margin-top:2% "> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase">Reseveration No <?php echo $res_id;?></span>
</td></tr></table>
<?php }
	else
	{?>
<table align="center"  style="margin-top:2% "> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase">Date from <?php echo $start_date1;?> to <?php echo $end_date1; ?> </span>
</td></tr></table>
<?php } ?>
    <table class="table table-striped table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th> Name</th>
        <th> Date</th>
        <th>Phone No.</th>
        <th> Outlet</th>
        <th>No. of Persons</th>
        <th>Amount</th>
        <th class="print-hide">Edit</th>
        <th class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_function_booking as $data){ 
		 $i++;
		 $id_function_booking=$data['function_booking']['id'];
        
        $b_date=$data['function_booking']['b_date'];
		if($b_date=='0000-00-00'){ $b_date='';}
		else {$b_date= date("d-m-Y", strtotime($b_date)); }
        $b_time=$data['function_booking']['b_time'];
        $res_no_id=$data['function_booking']['res_no_id']; 
        $ftp_no=$data['function_booking']['ftp_no']; 
         $name=$data['function_booking']['name'];
        $outlet_venue_id=$data['function_booking']['outlet_venue_id']; 
        $address=$data['function_booking']['address'];
        $t_number=$data['function_booking']['t_number'];    
        $email=$data['function_booking']['email'];
        $rate=$data['function_booking']['rate'];
        $tax_id=$data['function_booking']['tax_id'];
        $per_expected=$data['function_booking']['per_expected']; 
        $pax=$data['function_booking']['pax'];
        $no_of_person=$data['function_booking']['no_of_person'];    
        $shape=$data['function_booking']['shape'];
        $other_service=$data['function_booking']['other_service'];
        $instruction=$data['function_booking']['instruction'];
        $itemtype_id=$data['function_booking']['itemtype_id'];
		 ?>
        <tr>
        
        <td><?php echo $i; ?></td>
        <td><?php echo $data['function_booking']['name']; ?></td>
        <td><?php echo $b_date; ?></td> 
        <td><?php echo $data['function_booking']['t_number']; ?></td>
        <td><?php
        echo @$master_outlet_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_outlet_fetch',$data['function_booking']['outlet_venue_id']), array()); ?></td>
        <td><?php echo $data['function_booking']['no_of_person']; ?></td>
       <!--<td>
       <?php
       $type_id= $data['function_booking']['itemtype_id'];
        $explode_data=explode(",",$type_id);	
       
        foreach($explode_data as $dataa)
        {
        
       		echo @$master_itemtype_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_itemtype_fetch',$dataa), array());
       		
            echo ",";
       } 
	?></td>-->
 <td><?php echo $data['function_booking']['tot_amt']; ?></td>   
    
    <td class="print-hide"><a href="functionreport_edit?id=<?php echo $id_function_booking; ?>" target="_blank" class="btn blue btn-xs"><i class="fa fa-edit"></i> Edit</a></td>
        
            
        <td class="print-hide">
            <a class="btn red btn-xs" data-toggle="modal" href="#deletefun_<?php echo $id_function_booking; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="deletefun_<?php echo $id_function_booking; ?>" tabindex="-1" role="delete" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                         </div>
		 <div class="modal-footer">
                            <form method="post" name="deletefun_<?php echo $id_function_booking; ?>">
                            <input type="hidden" name="delete_booking_id" value="<?php echo $id_function_booking; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="delete_function_booking_id" value="delete_function_booking_id" class="btn blue">Delete</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td> 
        </tr>
        <?php } ?>
       </tbody>
        </table>
		<?php		
			exit;
			
		}
		
		if($this->request->query('registration_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			$this->loadmodel('registration');
				$conditions = array ('reg_date between ? and ?' => array($start_date, $end_date),'flag' => 0);
				$registrations_fetch=$this->registration->find('all', array('conditions' => $conditions));
				?>
                <table align="center"  style="margin-top:2% "> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase">Date from <?php echo $start_date1;?> to <?php echo $end_date1; ?> </span></td></tr></table>

				<table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Name</th>
        <th>S/W/D of</th>
        <th>Permanent Adderss</th>
        <th>Mobile No.</th>
        <th>Email</th>
        <th>Nationality</th>
        <th>Occupation</th>
        <th>Card No</th>
        <th>Edit</th>
        <th>Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($registrations_fetch as $data){  
		 //pr($data);
		 $i++;
		 $id=$data['registration']['id'] 
		 ?>
        <tr>
        
        <td><?php echo $i; ?></td>
        <td><?php echo $data['registration']['name']; ?></td>

        <td><?php echo $data['registration']['swd_of']; ?></td>
        <td><?php echo $data['registration']['p_address']; ?></td>
        <td><?php echo $data['registration']['mobile_no']; ?></td>
        <td><?php echo $data['registration']['email']; ?></td>
        <td><?php echo $data['registration']['nationality']; ?></td>
        <td><?php echo $data['registration']['occupation']; ?></td>
        <td><?php echo $data['registration']['card_id_no']; ?></td>
        <!--<td><a href="registration_pdf?id_pdf=<?php echo $id; ?>" target="_blank" class="btn green btn-xs"><i class="fa fa-print"></i> PDF</a></td>-->
        <td><a href="registration_edit?id=<?php echo $id; ?>" target="_blank" class="btn blue btn-xs"><i class="fa fa-edit"></i> Edit</a></td>
        <td>
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id ?>"><i class="fa fa-trash-o"></i> Delete</a>
            <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                     
                        <div class="modal-footer">
                        <form method="post" name="hello">
                        <input type="hidden" name="deleteId" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                            <button type="submit" name="delete_registration" class="btn default btn-xl red"><i class="fa fa-trash-o"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
       </td>
        </tr>
        
        <?php  }  ?>
     </tbody>
</table>

		<?php		
		exit;	
			
		}
		if($this->request->query('company_reg_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			$this->loadmodel('company_registration');
			$this->loadmodel('company_category');
			$this->loadmodel('master_room_plan');
				
				$conditions = array ('date between ? and ?' => array($start_date, $end_date),'flag' => 0);
				
				$fetch_company_registration=$this->company_registration->find('all', array('conditions' => $conditions));
		$fetch_company_category=$this->company_category->find('all', array('conditions'=>array('flag' => "0")));
				$fetch_master_room_plan=$this->master_room_plan->find('all', array('conditions'=>array('flag' => "0")));
		if(empty($fetch_company_registration))
			{?><br />

			<div class="alert alert-danger" style="width:50%; margin-left:15%">
							<strong>Sorry.!</strong> You have No records.
						</div>
						<?php
			}else
			{ ?>
<br />

<table align="center"  style="margin-top:4%"> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase"> Date from <?php echo $start_date1;?> to <?php echo $end_date1; ?> </span>
</td></tr></table>
<table class="table table-bordered table-hover" style="font-size: 13px; margin-top:1%" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Company Name</th>
       <th>Company Category</th>
        <th>Person Name</th>
        <th>Mobile No.</th>
       <th>Email id</th>
        <th>Address</th>
        <th class="print-hide">Edit</th>
        <th class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_company_registration as $data){ 
		 $i++;
		 $id_company_registration=$data['company_registration'] ['id'];
         $company_name=$data['company_registration'] ['company_name'];
             $company_category_id=$data['company_registration'] ['company_category_id'];
            $pan_no=$data['company_registration'] ['pan_no'];
            $service_tax_no=$data['company_registration'] ['service_tax_no'];
            $authorized_person_name=$data['company_registration'] ['authorized_person_name'];
            $authorized_contact_no=$data['company_registration'] ['authorized_contact_no'];
            $mobile_no=$data['company_registration'] ['mobile_no'];
            $authorized_email_id=$data['company_registration'] ['authorized_email_id'];
            $c_address=$data['company_registration'] ['c_address'];
            $master_plan_id=$data['company_registration']['master_plan_id'];
            $p_address=$data['company_registration'] ['p_address'];
            
        
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['company_registration'] ['company_name']; ?></td>
        <td><?php
        echo @$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$data['company_registration']['company_category_id']), array()); ?>
        </td>
        <td><?php echo $data['company_registration'] ['authorized_person_name']; ?></td>
        <td><?php echo $data['company_registration'] ['mobile_no']; ?></td>
        <td><?php echo $data['company_registration'] ['authorized_email_id']; ?></td>
        <td><?php echo $data['company_registration'] ['c_address']; ?></td>
        
									<td class="print-hide"><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppupreg_<?php echo $id_company_registration; ?>"><i class="fa fa-edit"></i> Edit </a>
								<div class="modal fade bs-modal-full" id="poppupreg_<?php echo $id_company_registration; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-full">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id_company_registration; ?>" id="edit_company_registration<?php echo $i; ?>">
                                        <div class="table-responsive">
										
                        <table class="table self-table" style=" width:90% !important;">
                        <tr>   
                        <input type="hidden" name="c_registration_id" value="<?php echo $id_company_registration; ?>" />

                             
                       
                        <td><div class="form-group"><label>Company Name <span style="color:#E02222">* </span></label></div></td>
                        <td><div class="form-group"><input type="text" class="form-control input-inline input-small" placeholder="Company Name" name="edit_company_name" id="edit_company_name" value="<?php echo $company_name; ?>" required></div></td>
                         <td><div class="form-group"><label>Company Category <span style="color:#E02222">* </span></label></div></td>
                      	<td><div class="form-group"><select class="form-control input-small" name="edit_company_category_id" required>
                                            <option value="">--Select --</option>
                                            <?php
                                            foreach($fetch_company_category as $data)
                                            {
                                            	?>
                                                <option <?php if($company_category_id==$data['company_category']['id']){?> selected="selected" <?php }?> value="<?php echo $data['company_category']['id'];?>"><?php echo $data['company_category']['category_name'];?></option>
                                                <?php
                                            }
                                            ?>
											</select></div></td>
                        <td><label>PAN No.</label></td>
                      	<td><input type="text" class="form-control input-inline input-small" width="80px" placeholder="PAN No." name="edit_pan_no" id="edit_pan_no" 
                        value="<?php echo $pan_no; ?>" maxlength="10"></td>
                        </tr>
                       
                        <tr>
                       
                        <td><label>Service Tax No.</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Service Tax No." name="edit_service_tax_no" 
                        id="edit_service_tax_no" value="<?php echo $service_tax_no; ?>" ></td>
                        
                        <td><label>Authorized Person Name</label></td>
                        <td><input type="text" class="form-control input-inline input-small" placeholder="Authorized Person Name" name="edit_authorized_person_name" 
                        id="edit_authorized_person_name" value="<?php echo $authorized_person_name; ?>" required></td>
                        
                        
                        <td><label>Contact No.</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-phone"></i>
											</span>
                        
                        <input type="text" class="form-control input-inline" placeholder="Contact No." 
                        name="edit_authorized_contact_no" id="edit_authorized_contact_no" onkeypress="javascript:return isNumber (event)" value="<?php echo $authorized_contact_no; ?>" maxlength="10" style="width:91%"></div></td>
                        </tr>
                        <tr>
                        <td><label>Mobile No.</label></td>
                        <td>
                        <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-mobile-phone"></i>
											</span>
                        
                        <input type="text" class="form-control input-inline" onkeypress="javascript:return isNumber (event)" style="width:92%" placeholder="Mobile No." name="edit_mobile_no" 
                        id="edit_mobile_no"  value="<?php echo $mobile_no; ?>" maxlength="10"></div></td>
                        
                        <td><label>Authorized Email id</label></td>
                        <td>
                         <div class="input-group">
											<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
											</span>
                        <input type="text" class="form-control input-inline" placeholder="Email id" name="edit_authorized_email_id" 
                        id="edit_authorized_email_id" value="<?php echo $authorized_email_id; ?>" style="width:91%"></div></td>
                        
                        <td><div class="form-group"><label>Master Plan <span style="color:#E02222">* </span></label></div></td>
                        <td >
                        <div class="form-group">
                    		<select class="form-control input-small" name="edit_master_plan_id" id="edit_master_plan_id"  >
                                <option value="">--- Select ---</option>
                                <?php
                                foreach($fetch_master_room_plan as $data)
                                {
                                    ?>
                                    <option <?php if($master_plan_id==$data['master_room_plan']['id']){?> selected="selected" <?php } ?> value="<?php echo $data['master_room_plan']['id'];?>"><?php echo $data['master_room_plan']['plan_name'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                   		 </div>
                        </td>
                        </tr>
                        <tr>
                        <td colspan="10">
                         <div style="width:52%; float:left; ">
                             <div style="width:70%; float:left ">
                            <label>Correspondence Address</label>
                            <textarea class="form-control" rows="2" cols="3" id="edit_c_address<?php echo $i;?>" name="edit_c_address" style="resize:none;"><?php echo $c_address; ?></textarea>
                            </div>
                            <div style="width:20%; float:right ">
                            <br />
                            <label class="checkbox-inline" >
                            <input type="checkbox" name="same" onclick="same_as_edit(this.id,this.value)" value="<?php echo $i;?>" id="same<?php echo $i;?>"/>Same as
                            Correspondence
                            </label>
                            </div>
                        </div>
                        <div style="width:35%; float:right">
                        <label>Permanent Address</label>
                        <textarea class="form-control" cols="3" rows="2" id="edit_p_address<?php echo $i;?>"  name="edit_p_address" style="resize:none;"><?php echo $p_address; ?></textarea>
                        </div>
                        </td>
                        </tr>
                         <tr><td colspan="4" align="center"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_company_registration" value="edit_company_registration" class="btn blue">Update</button>
										</div></center></td></tr>
                        </table>
										</div></form>
                                        </div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                            
               </td>
<td class="print-hide"><a class="btn red btn-xs" data-toggle="modal" href="#deletereg<?php echo $id_company_registration; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            <div class="modal fade" id="deletereg<?php echo $id_company_registration; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                         <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                         </div>
                       <div class="modal-footer">
                        <form method="post" name="deletereg<?php echo $id_company_registration; ?>" >
                         <input type="hidden" name="delete_c_registration" value="<?php echo $id_company_registration; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_company_registration" value="delete_company_registration" class="btn blue">Delete</button>
                         </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
        <?php
			}
		exit;		
		}
/////////////////////////////////////////////////
if($this->request->query('company_tarif_view_dateselect')==1)
        {
            $company_id=$this->request->query("q");
			$this->loadmodel('company_registration');
			$this->loadmodel('company_category');
			$this->loadmodel('fo_room_booking');
		    $this->loadmodel('master_room_type');
			 $this->loadmodel('master_tax');
		    $this->loadmodel('master_room_plan');
				$conditions = array('company_id'=> $company_id, 'flag' => 0);
				$fetch_fo_room_booking=$this->fo_room_booking->find('all', array('conditions' => $conditions, 'group' => 'company_id'));
                
				$fetch_company_registration=$this->company_registration->find('all', array('conditions'=>array('flag' => "0")));
				$fetch_company_category=$this->company_category->find('all', array('conditions'=>array('flag' => "0")));
				$fetch_master_room_type=$this->master_room_type->find('all', array('conditions'=>array('flag' => "0")));
				$fetch_master_room_plan=$this->master_room_plan->find('all', array('conditions'=>array('flag' => "0")));
				$fetch_master_tax=$this->master_tax->find('all', array('conditions'=>array('flag' => "0")));
if(empty($fetch_fo_room_booking))
			{?><br />

			<div class="alert alert-danger" style="width:50%; margin-left:15%">
							<strong>Sorry.!</strong> You have No records.
						</div>
						<?php
			}else
			{ ?>
<br />

  <table class="table table-bordered table-hover" id="sample_1" width="100%">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Company</th>
        <th> Room Plan</th>
        <th> Date From</th>
        <th>Date To</th>
        <th> Tax</th>
        <th>Dis.</th>
        <th>Food Dis.</th>
        <th>Remarks</th>
        <th class="print-hide">Edit</th>
        <th class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_fo_room_booking as $data){ 
		 $i++;
       $id_fo_room_booking=$data['fo_room_booking']['id'];
        $company_id=$data['fo_room_booking']['company_id'];
        $master_room_type_id=$data['fo_room_booking']['master_room_type_id'];
        $master_room_plan_id=$data['fo_room_booking']['master_room_plan_id'];
        $date_from=$data['fo_room_booking']['date_from']; 
        $date_to=$data['fo_room_booking']['date_to']; 
        $special_rate=$data['fo_room_booking']['special_rate']; 
        $remarks=$data['fo_room_booking']['remarks'];
		 $discount=$data['fo_room_booking']['discount'];
		  $food_discount=$data['fo_room_booking']['food_discount'];
		  $master_tax_id=$data['fo_room_booking']['master_tax_id'];
         $master_tax_id=explode(',', $master_tax_id);
		 ?>
        
        <tr>
        
        <td><?php echo $i; ?></td>
        
        <!--<td><?php  echo @$company_category_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_category_fetch',$data['fo_room_booking']['company_category_id']), array()); ?></td>-->
       
       <td><?php echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['fo_room_booking']['company_id']), array()); ?></td>
       
       
      <!-- <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['fo_room_booking']['master_room_type_id']), array()); ?></td>-->
                  
                <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['fo_room_booking']['master_room_plan_id']), array()); ?>
        </td>
        
         <td><?php echo date('d-m-Y', strtotime($data['fo_room_booking']['date_from'])); ?></td>
          <td><?php echo date('d-m-Y', strtotime($data['fo_room_booking']['date_to'])); ?></td>
           <td><?php
            foreach($master_tax_id as $taxes)
            {
            echo @$master_tax_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch',$taxes), array()).' @ ';
            echo @$master_tax_fetch_idd=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_tax_fetch1',$data['fo_room_booking']['master_tax_id']), array()).' , ';
            }
            ?></td>
        <td><?php echo $data['fo_room_booking']['discount']; ?></td>
        <td><?php echo $data['fo_room_booking']['food_discount']; ?></td>
        <td><?php echo $data['fo_room_booking']['remarks']; ?></td>
    <td class="print-hide"><a href="company_tariff_edit?id=<?php echo $id_fo_room_booking; ?>" class="btn blue btn-xs"><i class="fa fa-edit"></i> Edit </a>
       </td>
       <td class="print-hide">
            <a class="btn red btn-xs" data-toggle="modal" href="#delete_<?php echo $company_id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete_<?php echo $company_id; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>

                        </div>
                       
                        <div class="modal-footer">
                        <form method="post" name="delete_<?php echo $company_id; ?>" >
                         <input type="hidden" name="delete_ct_id" value="<?php echo $company_id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_company_tariff" value="delete_company_tariff" class="btn blue">Delete</button>
</form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        <?php }?>
      
       </tbody>
        </table>
         <?php
			}
		exit;		
		}
/////////////////////////////////////////////////
/////////////////////////////////////////////////
if($this->request->query('room_outlet_view_dateselect')==1)
        {
            $master_outlet_idd=$this->request->query("q");
			$this->loadmodel('master_roomno');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_outlet');
			$this->loadmodel('company_registration');
			$this->loadmodel('company_category');
			$this->loadmodel('fo_room_booking');
		    $this->loadmodel('master_room_type');
		    $this->loadmodel('master_room_plan');
				$conditions = array('master_outlet_id'=> $master_outlet_idd, 'flag' => 0);
				$fetch_master_room_type=$this->master_room_type->find('all',array('conditions' => array('flag' => "0")));
				$fetch_master_roomno=$this->master_roomno->find('all', array('conditions' => $conditions)) ;
				$fetch_master_outlet=$this->master_outlet->find('all', array('conditions' => array('flag' => "0")) );
				
if(empty($fetch_master_roomno))
			{?><br />

			<div class="alert alert-danger" style="width:50%; margin-left:15%">
							<strong>Sorry.!</strong> You have No records.
						</div>
						<?php
			}else
			{ ?>
<br />



  <table class="table table-bordered table-hover" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Outlet</th>
    	<th>Room Type</th>
        <th>Room No.</th>
        <th class="print-hide">Edit</th>
        <th class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_master_roomno as $data){ 
		 $i++;
		 $id=$data['master_roomno']['id'];
         $room_no=$data['master_roomno']['room_no'];
		 ?>
        <tr>
        
                <td><?php echo $i; ?></td>
                <td><?php
                            echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$data['master_roomno']['master_outlet_id']), array()); ?></td>        
        <td><?php
        echo $master_roomno_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_roomno_fetch',$data['master_roomno']['room_type_id']), array()); ?></td>
        <td><?php echo $room_no; ?></td>
        <td class="print-hide"><a class="btn blue btn-xs" data-toggle="modal" href="#popuprno<?php echo $id ;?>"><i class="fa fa-edit"></i> Edit </a>
<div class="modal fade" id="popuprno<?php echo $id ;?>" tabindex="-1" role="basic" aria-hidden="true" style="padding-top:35px">
<div class="modal-dialog modal-md">
<div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Update Here.!</h4>
    </div>

<div class="modal-body">
            <form method="post" name="popuprno<?php echo $id ;?>">
           
                <table class="table self-table" style=" width:100% !important;" border="0">
                    <tr>
                    <input type="hidden" name="roomno_id" value="<?php echo $id; ?>" />
                    <td><label>Outlet Name</label></td>
                    <td><div class="form-group"><select class="form-control input-medium" name="edit_master_outlet_id" required>
                    <option value="">--Select--</option>
                    <?php
                    foreach($fetch_master_outlet as $data2)
                    {
                    ?>
                    <option value="<?php echo $data2['master_outlet']['id'];?>" <?php if($data['master_roomno']['master_outlet_id']==$data2['master_outlet']['id']){ echo 'selected'; } ?>><?php echo $data2['master_outlet']['outlet_name'];?></option>
                    <?php
                    }
                    ?>
                    </select></div></td>
                    </tr>
                    
            <tr>
             <td><label>Room Type</label></td> 
             <td><div class="form-group"><select class="form-control input-medium" name="edit_room_type_id" id="edit_room_type_id" 
             value="" required>
             <option value="">-- Select Room Type --</option>
             <?php
             foreach($fetch_master_room_type as $data1)
             {
             ?>
             <option  value="<?php echo $data1['master_room_type']['id'];?>" <?php if($data['master_roomno']['room_type_id']==$data1['master_room_type']['id']){ echo 'selected'; } ?>><?php echo $data1['master_room_type']['room_type'];?></option>
            <?php
            }
            ?>
            </select></div>
            </td>
            </tr>
            <tr>
            <td><label>Room no</label></td>
            <td><input type="text" class="form-control input-inline input-medium" placeholder="Room No." name="edit_room_from" id="edit_room_no"
            value="<?php echo $room_no;?>" required></td>
            </tr>   
           
            <tr><td colspan="3"><center><div class="modal-footer">
            <button type="button" class="btn default" data-dismiss="modal">Close</button>
            <button type="submit" name="edit_master_roomno" value="edit_master_roomno" class="btn blue">Update</button>
            </div></center></td></tr>      
            </table>
            </form>
                </div>
           </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div></td>
    
                          
        <td class="print-hide">
            <a class="btn red btn-xs" data-toggle="modal" href="#delete<?php echo $id ?>"><i class="fa fa-trash-o"></i> Delete</a>
            
            <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                        </div>
                        <div class="modal-footer">
                        <form method="post" name="delete<?php echo $id ;?>">
                        <input type="hidden" name="delete_roomno_id" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_master_roomno" value="deletet_master_roomno" class="btn blue">Delete</button>
</form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        
        <?php } ?>
     </tbody>
</table> 
       <?php
			}
		exit;		
		}
/////////////////////////////////////////////////
if($this->request->query('menu_cat_view_dateselect')==1)
        {
            $menu_category_idd=$this->request->query("q");
				$conditions = array('menu_category_idd'=> $menu_category_idd, 'flag' => 0);
		$this->loadmodel('menu_category');
		$fetch_menu_category=$this->menu_category->find('all',array('conditions' => array('flag' => "0")));
		$this->loadmodel('menu_category_item');
		$fetch_menu_category_item=$this->menu_category_item->find('all',array('conditions' => $conditions));
			@$m_cat=$fetch_menu_category_item[0]['menu_category_item']['item_name_id'];
			//pr($sessionn);
            $explode_data=explode(",",$m_cat);
			$this->loadmodel('master_item');
			$fatch_master_items=$this->master_item->find('all');
			?>

    <table class="table table-striped table-bordered table-hover" id="sample_1">
     <tbody>
     	<?php
		$i=0;
		 foreach($fetch_menu_category_item as $data){ 
		 $i++;
		 $id=$data['menu_category_item']['id'];
         $menu_category_idd=$data['menu_category_item']['menu_category_idd'];
         $item_name_id=$data['menu_category_item']['item_name_id'];
         $explode_data=explode(',', $item_name_id);
		 ?>
        </tbody>
</table>
 <select class="form-control select2 select2_sample2" style="width:900px" name="item_name_id[]" data-placeholder="Select..." multiple="multiple">
                        <option value=""></option>
                                         <?php
                        foreach($fatch_master_items as $data)
                        {
                        if (in_array($data['master_item']['id'], $explode_data)){
                    ?>
                     <option value="<?php echo $data['master_item']['id'];?>" <?php if (in_array($data['master_item']['id'], $explode_data)){?> selected="selected"<?php } ?>>
					 <?php echo $data['master_item']['item_name'];?></option>
                            <?php
						}
                        }
                        ?>
                        </select> 
       <?php
			}
		exit;		
		}
/////////////////////////////////////////////////

if($this->request->query('house_keeping_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			$this->loadmodel('house_keeping');
			$this->loadmodel('master_caretaker');
			$this->loadmodel('master_roomno');
			$this->loadmodel('receipt_checkout');
			$this->loadmodel('room_checkin_checkout');
				
				$conditions = array ('date between ? and ?' => array($start_date, $end_date),'flag' => 0);
				//pr($conditions);
				$fetch_house_keeping=$this->house_keeping->find('all', array('conditions' => $conditions));
		$fetch_master_roomno=$this->master_roomno->find('all');
				$fetch_master_caretaker=$this->master_caretaker->find('all');
				$fetch_receipt_checkout=$this->receipt_checkout->find('all');
		if(empty($fetch_house_keeping))
			{?><br />

			<div class="alert alert-danger" style="width:50%; margin-left:15%">
							<strong>Sorry.!</strong> You have No records.
						</div>
						<?php
			}else
			{ ?>
<br />


<table align="center"  style="margin-top:5%"> <tr><td ><span style=" font-size:16px" class="caption-subject font-green-sharp bold uppercase"> Date from <?php echo $start_date1;?> to <?php echo $end_date1; ?> </span>
</td></tr></table>

<table class="table table-bordered table-hover" style="margin-top:1%" id="sample_1">
	<thead>
    <tr>
        <th>S. No</th>
        <th>Card No.</th>
        <th>Room No.</th>
        <th>Serviced By</th>
        <th>Wash&Iron(Clothes)</th>
        <th>Iron(Clothes)</th>
        <th style="font-family:Georgia, 'Times New Roman', Times, serif; color:#009">Total Amount</th>
        <th style="font-family:Georgia, 'Times New Roman', Times, serif; color:#0C3">Paid</th>
        <th class="print-hide">Invoice</th>
        <th class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
     <?php
		$i=0;
		 foreach($fetch_house_keeping as $data){ 
		 $i++;
		 $id_house_keeping=$data['house_keeping'] ['id'];
         $master_roomno_id=$data['house_keeping'] ['master_roomno_id'];
             $card_no=$data['house_keeping'] ['card_no'];
            $date=$data['house_keeping'] ['date'];
            $time=$data['house_keeping'] ['time'];
            $wash_iron_no=$data['house_keeping'] ['wash_iron_no'];
            $wash_iron_price=$data['house_keeping'] ['wash_iron_price'];
            $iron_no=$data['house_keeping'] ['iron_no'];
            $iron_price=$data['house_keeping'] ['iron_price'];
            $total_amount=$data['house_keeping'] ['total_amount'];
            $remarks=$data['house_keeping'] ['remarks'];
            $serviced_by=$data['house_keeping']['serviced_by'];
			$given_a=$data['house_keeping']['given_amount'];
		 ?>
         
       
         
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['house_keeping'] ['card_no']; ?></td>
        <td><?php echo $data['house_keeping'] ['master_roomno_id']; ?></td>
        <td><?php
        echo @$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'house_keeping_fetch',$data['house_keeping']['serviced_by']), array()); ?>
        </td>
        <td><?php echo $data['house_keeping'] ['wash_iron_no']; ?></td>
        <td><?php echo $data['house_keeping'] ['iron_no']; ?></td>
        <td><?php echo $data['house_keeping'] ['total_amount']; ?></td>
        <td>
		<?php 
              

if($given_a>0){?>
        <?php echo $data['house_keeping'] ['given_amount'];?>
      <?php }
	  else{?>
	  
	  <?php echo '-';?>
      
	  <?php } ?></td>
        
        <td class="print-hide"><p align="center">    
			
        <a href="house_keeping_bill?id=<?php echo $id_house_keeping;?>",'_newtab' class="btn default btn-xs blue-stripe"> Print</a></p>
</td>
     
									<!--<td><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppupreg_<?php echo $id_house_keeping; ?>"><i class="fa fa-edit"></i> Edit </a>
								<div class="modal fade bs-modal-lg" id="poppupreg_<?php echo $id_house_keeping; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id_house_keeping; ?>" id="edit_id_house_keeping<?php echo $i; ?>">
                                        <div class="table-responsive">
									 <table class="table self-table" style=" width:90% !important;">
                             <tr style="background-color:#9AC9E7">
                             <input type="hidden" name="h_keeping_id" value="<?php echo $id_house_keeping; ?>" id="edit_keeping_id" />
                        
                       <td><label style="margin-right:14px;">Room No.</label></td>
                                            <td class="form-group"><select class=" form-control input-small"name="edit_master_roomno_id" id="master_roomno_idd">
                                <option value="">Select No.</option>
									<?php
                                    foreach($fetch_master_roomno as $data)
                                    {
                                    	$room_no=$data['master_roomno']['room_no'];
										$room_no_explode=explode(',', $room_no);
                                       foreach($room_no_explode as $room_nos)
                                        {
                                        	?>
                                             <option value="<?php echo $room_nos;?>" <?php if($room_nos==$data['house_keeping']['master_roomno_id']){ echo 'selected'; } ?>><?php echo $room_nos;?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                                    </td>
                        <?php 
                        
                                    ?>
                                    <td><label>Card No.</label></td>
                        <td align="left"><input type="text" class="form-control input-medium" placeholder="Card No." name="edit_card_no" id="card_no" value="<?php echo $card_no;?>"></td>
                        </tr>
                        
                        <tr><td><label>Date</label></td>
                         <td class="form-group"><div class="input-group"><label><input type="text" class="form-control input-inline input-small date-picker" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="edit_date" data-date="12-08-2015" value="<?php echo $date; ?>"></label></div></td>
                        <td><label>Time</label></td>
                        <td>   <input class="form-control  input-inline input-small timepicker timepicker-no-seconds" type="text" placeholder="Time" name="edit_time" value="<?php echo $time; ?>">
                            </td>
                        </tr>

<tr>
                        
                        <td><label style="margin-right:8px;">Serviced By</label></td>
                        
                        <td class="form-group" colspan="3"><label><select class=" form-control input-medium" name="edit_serviced_by" id="serviced_by">
                                <option value="">-- Select Caretaker Name --</option>
									<?php
                                    foreach($fetch_master_caretaker as $data)
                                    {
                                    	
                                        	?>
                                            <option  value="<?php echo $data['master_caretaker']['id'];?>"
                                            <?php if($data['master_caretaker']['id']==$serviced_by){ echo 'selected'; } ?>
                                            ><?php echo $data['master_caretaker']['caretaker_name'];?></option>
                                        <?php
                                        }
                                    
                                    ?>
                                </select></label>
                                
                                    </td>
                        </tr>

<tr>
                        <td><label>Clothes No.<br>(Number of Clothes)</label></td>
                        
                        <input type="hidden" id="washhidden" name="washhidden" >
                        <input type="hidden" id="ironhidden" name="ironhidden" >
                       
                        <td align="right"><label>Wash & Iron</label></td>
                        <td><input type="text" class="form-control input-xsmall" placeholder="No." name="edit_wash_iron_no" id="wash_iron_no" onKeyUp="house_keeping();" value="<?php echo $wash_iron_no;?>"></td>
                       <td><input type="text" class="form-control input-xsmall" placeholder="Per/Rs."  name="edit_wash_iron_price" id="wash_iron_price" onKeyUp="house_keeping();" value="<?php echo $wash_iron_price;?>"></td>

                        </tr>

                        <tr>
                        <td></td>
                        <td align="right" style="padding-right:58px"><label>Iron</label></td>
                        <td><input type="text" class="form-control input-xsmall" placeholder="No." name="edit_iron_no" id="iron_no" onKeyUp="house_keeping();" value="<?php echo $iron_no;?>"></td>
                        <td><input type="text" class="form-control input-xsmall" placeholder="Per/Rs."  name="edit_iron_price" id="iron_price" onKeyUp="house_keeping();" value="<?php echo $iron_price;?>"></td>
                        </tr>
                        
                        <tr>
                        <td></td><td></td>
                        <td><label>Total Amount</label></td>
                        <td><input type="text" class="form-control input-xsmall" placeholder="Amount" name="edit_total_amount" id="total_amount" value="<?php echo $total_amount;?>"></td>
                        
                        </tr>
                        <tr>
                       <td><label style="margin-right:14px;">Remark</label></td>
                        <td colspan="3"><input type="text" class="form-control input" width="500px" placeholder="Keeping Remarks" name="edit_remarks" id="remarks" value="<?php echo $remarks;?>"></td>
                         
                        </tr>
                        
                        <tr style="background-color:#9AC9E7"><td colspan="4"><table border="0" width="100%">
                        
                        <tr><td colspan="8">                                        
<div>
								<strong>Cashier</strong>&nbsp;Receipt...
							</div> </td></tr> 
                                <tr><td colspan="8" align="center"><div class="form-group">
										<div class="radio-list" >
											<label class="radio-inline">
											<input type="radio" name="edit_recpt_type" id="rcc" value="Cash" style="margin-left:4px"
                                            <?php if($receipt_type=='Cash'){ ?> checked <?php }?>>Cash</label>
											<label class="radio-inline">
											<input type="radio" name="edit_recpt_type" id="rcq" value="Cheque"
                                            <?php if($receipt_type=='Cheque'){ ?> checked <?php }?>>Cheque</label>
                                            <label class="radio-inline">
											<input type="radio" name="edit_recpt_type" id="rcn" value="NEFT"
                                            <?php if($receipt_type=='NEFT'){ ?> checked <?php }?>>NEFT</label>
                                            <label class="radio-inline">
											<input type="radio" name="edit_recpt_type" id="rcr" value="Credit Card"
                                            <?php if($receipt_type=='Credit Card'){ ?> checked <?php }?>>Credit Card</label>
										</div>
						                </div>
                        </td>
                        </tr>
                        <?php if(!empty($cash))
                                                {
                                                
                                                
                                                 ?>
                                                 
                                <tr id="cash_idd"><td style="padding-right:10px"><label>Cash</label></td>
                        <td align="left"><input type="text" class="form-control input-inline input-small" placeholder="Cash Amount" name="edit_cash" ></td>
                        <td align="center"><label>Narration</label></td> 
                                       <td colspan="5"><input type="text" class="form-control input-inline input-large" placeholder="" name="edit_billing_ins" id="bi_id"></td>
                        </tr>
                        <?php } else if(!empty($cheque_amt))
                                                    {?>
                        <tr align="center" input style="display:none;" id="cheque_idd">
                        <td align="right" style="padding-right:10px"><label>Cheque Amount</label></td>
                        <td style="padding-right:10px"><input type="text" class="form-control input-inline input-small" placeholder="Cheque Amount" name="edit_cheque_amt" ></td>
                        <td style="padding-right:10px"><label>Cheque No.</label></td>
                        <td style="padding-right:10px"><input type="text" class="form-control input-inline input-small" placeholder="Cheque No." name="edit_cheque_no" ></td>
                       <td align="center"><label>Narration</label></td> 
                                       <td colspan="3"><input type="text" class="form-control input-inline input-large" placeholder="" name="edit_billing_ins" id="bi_id"></td>
                        </tr>
                        
                         <?php } else if(!empty($neft_amt)) {?>
                        <tr align="center" input style=" display:none;" id="neft_idd">
                        <td align="right" style="padding-right:10px"><label>NEFT Amount</label></td>
                        <td style="padding-right:10px"><input type="text" class="form-control input-inline input-small" placeholder="NEFT Amount" name="edit_neft_amt" ></td>
                        <td align="center" style="padding-right:10px"><label>NEFT No.</label></td>
                        <td style="padding-right:10px"><input type="text" class="form-control input-inline input-small" placeholder="NEFT No." name="edit_neft_no" ></td>
                        <td align="center"><label>Narration</label></td> 
                                       <td colspan="3"><input type="text" class="form-control input-inline input-large" placeholder="" name="edit_billing_ins" id="bi_id"></td>
                        </tr>
                        <?php } else if(!empty($credit_card_no)) {?>
                         <tr align="center" input style="display:none;" id="credit_idd">
                         <td><label>Amount</label></td>
                        <td style="padding-right:10px"><input type="text" class="form-control input-inline" style="width:100px" placeholder="Amount" name="edit_credit_card_amt" ></td>

                          <td colspan="2"  style="padding-right:10px"><select class=" form-control input-small select2me" name="edit_credit_card_name">
                                <option value="">--Select Credit Card Name--</option>
											 <option>ICICI</option>
                                             <option>SBI</option>
                                             <option>HDFC</option>
						       </select>
                                    </td>
                        <td colspan="2"><input type="text" class="form-control input-inline input-medium" placeholder="Credit Card No." name="edit_credit_card_no" ></td>
                        <td align="center"><label>Narration</label></td> 
                                       <td><input type="text" class="form-control input-inline input-small" placeholder="" name="edit_billing_ins" id="bi_id"></td>
                        </tr>
                        <?php }?>
                        </table></td></tr>
                      
                         <tr><td colspan="4" align="center"><center><div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_house_keeping" value="edit_house_keeping" class="btn blue">Update</button>
										</div></center></td></tr>
                        </table>
										</div></form>
                                        </div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                            
               </td>
<td class="print-hide"><a class="btn red btn-xs" data-toggle="modal" href="#deletereg<?php echo $id_house_keeping; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            <div class="modal fade" id="deletereg<?php echo $id_house_keeping; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                         <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                         </div>
                       <div class="modal-footer">
                        <form method="post" name="deletereg<?php echo $id_house_keeping; ?>" >
                         <input type="hidden" name="delete_h_keeping" value="<?php echo $id_house_keeping; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_house_keeping" value="delete_house_keeping" class="btn blue">Delete</button>
                         </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        
<?php } ?>
        </tbody>
        </table> 
        <?php
			}
			
		exit;		
		}
//////////////////////////////////////////////////				
		if($this->request->query('room_reservation_view_dateselect')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
            $start_date1=$q[0];
			$end_date1=$q[1];
			$start_date=date("Y-m-d",strtotime($start_date1));
			$end_date=date("Y-m-d",strtotime($end_date1));
			//$company_id=$q[2];
			//$booking_type=$q[3];
			
			
			/*if(!empty($start_date1)){
			$start_date=date("Y-m-d",strtotime($start_date1));
			}else {$start_date=''; }
			if(!empty($end_date1)){
			$end_date=date("Y-m-d",strtotime($end_date1));
			}else {$end_date =''; }*/
			
			/////////////////////////////////
			/*$this->loadmodel('room_reservation');
			if(!empty($booking_type)){
				$conditions = array ('flag' => 0, 'booking_type' => $booking_type);
				
				
			}
			
			///////////////////////////////////////
			
			$this->loadmodel('room_reservation');
			if(!empty($company_id) && !empty($start_date)){
				$conditions = array ('date between ? and ?' => array($start_date, $end_date),'flag' => 0 , 'company_id' => $company_id);
			}else if(!empty($start_date)) {
				$conditions = array ('date between ? and ?' => array($start_date, $end_date),'flag' => 0 );
			}
			elseif(!empty($company_id) && empty($start_date)){
				$conditions = array ('flag' => 0 , 'company_id' => $company_id);
			}
			else
			{$conditions = array ('flag' => 0 ); }
		$fetch_room_reservation=$this->room_reservation->find('all', array('conditions' => $conditions));
		//pr($fetch_room_reservation);*/
		
		$this->loadmodel('room_reservation');
		//$conditions = array ('arrival_date between ? and ?' => array($start_date, $end_date),'b_date between ? and ?' => array($start_date, $end_date),'flag' => 0, 'checkin_id' =>0);
		$conditions = array (
              'OR' => array(
            array('arrival_date between ? and ?' => array($start_date, $end_date), 'status'=> 0),
            array('b_date between ? and ?' => array($start_date, $end_date), 'status'=> 0),
        ));
				$fetch_room_reservation=$this->room_reservation->find('all', array('conditions' => $conditions));
?>

<!--<a class="btn default btn-xs blue" style="margin-left:94%; width:4%" href="room_reservation_excel" target="_blank">Excel</a> ---->
    <table class="table table-bordered table-hover" style="margin-top:1%" id="sample_1">
	<thead>
   
    <tr>
    	<th>S.No</th>
        <th>Booking Type</th>
        <th>Name</th>
        <th>Company</th>
        <th>Contact No.</th>
        <th>Arr. Date</th>
        <th>Dep. Date</th>
        <th>Banquet Date</th>
        <th>Plan</th>
       <!-- <th>PDF</th>-->
        <th class="print-hide">Edit</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_reservation as $next_data)
			{	//pr($next_data);
				 $i++;
				 $id=$next_data['room_reservation']['id'] ;
				$booking_type1 = $next_data['room_reservation']['booking_type'];
				if($booking_type1==0){ $booking_type='Room Reservation';}else{$booking_type='Function Reservation';}
				$arrival_data=$next_data['room_reservation']['arrival_date'];
				if($arrival_data=='0000-00-00')
				 {	$arrival_data='';}
				 else
				 { $arrival_data=date("d-m-Y", strtotime($arrival_data)); }
				$dap_date= $next_data['room_reservation']['departure_date'];
				  if($dap_date=='0000-00-00')
				 {	$dap_date='';}
				 else
				 { $dap_date=date("d-m-Y", strtotime($dap_date)); }
				$compny=$next_data['room_reservation']['company_id']; 
				$plan=$next_data['room_reservation']['plan_id'];
				$b_date= $next_data['room_reservation']['b_date'];
				  if($b_date=='0000-00-00')
				 {	$b_date='';}
				 else
				 {  $b_date=date("d-m-Y", strtotime($b_date)); }
				 
				 
			
		 ?>
        <tr id="for_delete<?php echo $id; ?>">
        <td><?php echo $i;?></td>
        <td><?php echo $booking_type; ?></td>
        <td><?php echo $next_data['room_reservation']['name_person']; ?></td>
        <td><?php if(!empty($compny)){ echo $Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$compny), array()); } ?></td>
        <td><?php echo $next_data['room_reservation']['telephone']; ?></td>
        <td><?php if($booking_type1==0){ echo $arrival_data; } else {echo '0';}?></td>
        <td><?php if($booking_type1==0){ echo $dap_date; } else {echo '0';} ?></td>
        <td><?php if($booking_type1==1){ echo $b_date; } else {echo '0';} ?></td>
        <td><?php if(!empty($plan)){ echo $this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_plan_name_fetch',$plan), array()); } ?></td>
      <!-- <td><a href="room_reservation_pdf?id_pdf=<?php echo $id; ?>" target="_blank" class="btn default btn-xs red-stripe"> PDF</a></td>-->
        <td class="print-hide"><a href="room_reservation_edit?id=<?php echo $id; ?>" class="btn blue btn-xs"><i class="fa fa-edit"></i> Edit</a></td>
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
		<?php		
				
			exit;
		}
		////////////////////////////////////////
		////////////////////////////////////////
		
		if($this->request->query('user_account_fetch')==1)
        {
            $username=$this->request->query("q");
			
			$this->loadmodel('login');
			$this->loadmodel('master_outlet');
			$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('flag' => 0)));
	        $this->set('fetch_login', $this->login->find('all', array('approval_status' => 0)));
			
			if(!empty($username)){
				$conditions = array ('id' => $username, 'approval_status' => 0);
				$fetch_login=$this->login->find('all', array('conditions'=> $conditions));
				$fetch_master_outlet=$this->master_outlet->find('all', array('flag' => 0));
				    ?>
    <!--<a class="btn default btn-xs blue" style="margin-left:94%; width:4%" href="room_reservation_excel" target="_blank">Excel</a> ---->
    <table class="table table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th style="padding-top:10px">S.No</th>
        <th>Login ID</th>
        <th>User Name</th>
        <th>Email ID</th>
        <th>Outlet</th>
        
        <th class="print-hide">Edit</th>
        <th class="print-hide">Delete</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_login as $next_data)
			{	//pr($next_data);
				 $i++;
				 $id=$next_data['login']['id'] ;
				$login_id = $next_data['login']['login_id'];
				
				//$password=$next_data['login']['password']; 
				//$password=md5($next_data['login']['password']);
				$username=$next_data['login']['username'];
				$email_id=$next_data['login']['email_id']; 
				$outlet_id=$next_data['login']['outlet_id']; 
				$outlet_idd=explode(",",$outlet_id);
				
				//$qDecoded = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $password ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $password ) ) ), "\0");
				
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $next_data['login']['login_id']; ?></td>
        <td><?php echo $next_data['login']['username']; ?></td>
        <td><?php echo $next_data['login']['email_id']; ?></td>
        <td><?php
			$outlet_id=$next_data['login']['outlet_id']; 
			$outlet_idd=explode(",",$outlet_id);
        foreach($outlet_idd as $dataa)
        {
       		echo @$master_item_category_fatch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'fetch_master_outlet',$dataa), array()).',&nbsp;';
       } 
	?>	
       </td>
        
        <td class="print-hide"><a class="btn blue btn-xs" data-toggle="modal" atttter="<?php echo $i;?>" href="#poppupreg_<?php echo $id; ?>"><i class="fa fa-edit"></i> Edit </a>
								<div class="modal fade bs-modal-lg" id="poppupreg_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:35px">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Update Here</h4>
										</div>
										<div class="modal-body">
                                        <form method="post" name="edit_<?php echo $id; ?>">
                                        <div class="table-responsive">
								<table width="100%" border="0">
                                <tr>
                        <input type="hidden" name="loginedit" value="<?php echo $id; ?>" />

                             <td>
                                		  <div class="form-group">
													<label class="control-label col-md-3">Login ID</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control " name="edit_login_id" value="<?php echo $login_id;?>" type="text">
                                                        </div>
													</div>
												</div>
                                                </td></tr>
                                				
                                		  
                                <tr><td>
                                            <div class="form-group">
													<label class="control-label col-md-3"> Username</label>
													<div class="col-md-4">
                                                     <div class="input-icon right">
														<i class="fa"></i>
														<input class="form-control "  name="edit_username" value="<?php echo $username;?>" type="text">
                                                        </div>
														
													</div>
												</div>
                                                </td></tr>
                                                <tr><td>
                                              <div class="form-group">
													<label class="control-label col-md-3">Email ID</label>
													<div class="col-md-4">
														<input class="form-control"  name="edit_email_id" value="<?php echo $email_id;?>" type="text">
														
													</div>
												</div>
                                                </td></tr>
                                                <tr>
                                                <td colspan="2">
                                                <table width="100%">
                                                <tr>
                                                <div class="form-group">
													<td><label class="control-label col-md-3">Outlet ID</label></td>
													
                                                    <div class="col-md-4">
											<?php  $j=0; $x=0;
											foreach($fetch_master_outlet as $item_name)
                                            { $j++; $x++;
                                            $servise=$item_name['master_outlet']['outlet_name'];
											 $outlet=$item_name['master_outlet']['id'];
                                            if($j==7){ $j=1;?><?php } 
                                            ?>
                                            <td id="data_view<?php echo $x; ?>" >
                                            <label><input name="edit_outlet_id[]"  type="checkbox"
                                             <?php if(in_array($outlet,$outlet_idd)){ echo 'checked'; } ?> value="<?php echo $outlet; ?>" /> <?php echo $servise; ?></label>
                                            </td>
                                            <?php
                                            }
                                            ?></div></div>
                                                </tr></table></td></tr>
                                                
                                                
                                			<tr>
                          		<div class="modal-footer">
											<td align="center"><button type="button" class="btn default" data-dismiss="modal">Close</button>
											<button type="submit" name="edit_login_reg" value="edit_login_reg" class="btn blue">Update</button>
										</div></td></tr></table>

										</div></form>
                                        </div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
                            
               </td>
<td class="print-hide"><a class="btn red btn-xs" data-toggle="modal" href="#deletereg<?php echo $id; ?>"><i class="fa fa-trash-o"></i> Delete</a>
            <div class="modal fade" id="deletereg<?php echo $id; ?>" tabindex="-1" role="delete" aria-hidden="true" style="padding-top:35px">
                <div class="modal-dialog" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                         <h4 class="modal-title" style="color:rgba(170, 29, 29, 0.86)">Are you sure, You want to delete this Record?</h4>
                         </div>
                       <div class="modal-footer">
                        <form method="post" name="deletereg<?php echo $id; ?>" >
                         <input type="hidden" name="delete_loginedit" value="<?php echo $id; ?>" />
                            <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                             <button type="submit" name="delete_login_reg" value="delete_login_reg" class="btn blue">Delete</button>
                         </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>
       </td>
        </tr>
        
        </tbody>
        </table> 
        
        <?php
			}
			}
		exit;		
		}
		////////////////////////////////////////////////////////
		
		if($this->request->query('infobill_account_fetch')==1)
        {
            $master_roomno_id=$this->request->query("q");
			
			
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_room_plan');
			//$this->loadmodel('pos_kot');
			$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('flag' => 0)));
			$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('flag' => 0)));
	        $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => array('status' => 0, 'flag' =>0))));
			//$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => array('status' => 1, 'flag' =>0, 'flag1'=>0))));
			
		
			
			
			
			
			if(!empty($master_roomno_id)){
				$conditions = array ('id' => $master_roomno_id, 'status' =>0);
				$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all', array('conditions' => array('id' => $conditions, 'flag' => 0, 'status' => 0)));
				$fetch_master_room_type=$this->master_room_type->find('all', array('flag' => 0));
				$fetch_master_room_plan=$this->master_room_plan->find('all', array('flag' => 0));
				//$this->set('fetch_pos_kot', $this->pos_kot->find('all', array('conditions' => array('status' => 1, 'flag' =>0, 'flag1'=>0))));
				    ?>

    <!--<a class="btn default btn-xs blue" style="margin-left:94%; width:4%" href="room_reservation_excel" target="_blank">Excel</a> ---->
    <table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Card no</th>
        <th>Arr. Date</th>
        <th>Company</th>
        <th>Guest Name</th>
        <th>Dep. Date</th>
        <th>Room No.</th>
        <th>Type</th>
        <th>Plan</th>
        <th>Charge</th>
        <th>Tax</th>
        <th>Total</th>
        
        <th class="print-hide">Bill</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_checkin_checkout as $data)
			{	
				 $i++;
				 $id_room_checkin_checkout=$data['room_checkin_checkout']['id'];
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
        <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
        <td><?php
            echo $data['room_checkin_checkout']['master_roomno_id'];
            
	?></td>
     <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['totaltax']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['tg']; ?></td>
       <?php echo $id_room_checkin_checkout; ?> 
        <td class="print-hide"><a href="user_infobill?id=<?php echo $id_room_checkin_checkout; ?>" target="_blank" class="btn blue btn-xs"><i class="fa fa-print"></i> Print</a>
        </td>
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
         <?php
			}exit;
		}
		
		///////////////////////////////////////////////////////
		if($this->request->query('infobill_account_fetch1')==1)
        {
            $card_no=$this->request->query("q");
			$this->loadmodel('room_checkin_checkout');
			$this->loadmodel('master_room_type');
			$this->loadmodel('master_room_plan');
			$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('flag' => 0)));
			$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('flag' => 0)));
	        $this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions' => array('flag' => 0, 'status' => 0))));
			
			if(!empty($card_no)){
				$conditions = array ('id' => $card_no, 'flag' => 0, 'status' =>0);
				//pr($conditions);
				//exit;
				$fetch_room_checkin_checkout=$this->room_checkin_checkout->find('all', array('conditions' => array('id' => $conditions, 'flag' => 0, 'status' => 0)));
				//pr($fetch_room_checkin_checkout);
				//exit;
				$fetch_master_room_type=$this->master_room_type->find('all', array('flag' => 0));
				$fetch_master_room_plan=$this->master_room_plan->find('all', array('flag' => 0));
				    ?>

    <!--<a class="btn default btn-xs blue" style="margin-left:94%; width:4%" href="room_reservation_excel" target="_blank">Excel</a> ---->
    <table class="table table-striped table-bordered table-hover" style="margin-top:1px" id="sample_1">
	<thead>
    <tr>
    	<th>S.No</th>
        <th>Card no</th>
        <th>Arr. Date</th>
        <th>Company</th>
        <th>Guest Name</th>
        <th>Dep. Date</th>
        <th>Room No.</th>
        <th>Type</th>
        <th>Plan</th>
        <th>Charge</th>
        <th>Tax</th>
        <th>Total</th>
        
        <th class="print-hide">Invoice</th>
     </tr>
     </thead>
     <tbody>
     	<?php
		$i=0;
        foreach($fetch_room_checkin_checkout as $data)
			{	
				 $i++;
				 $id_room_checkin_checkout=$data['room_checkin_checkout']['id'] ;
				
		 ?>
        <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['room_checkin_checkout']['card_no']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['arrival_date'])); ?></td>
        <td><?php
        echo @$company_registration_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$data['room_checkin_checkout']['company_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['guest_name']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($data['room_checkin_checkout']['checkout_date'])); ?></td>
        <td><?php
            echo $data['room_checkin_checkout']['master_roomno_id'];
            
	?></td>
     <td><?php
        echo @$master_room_type_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_type_fetch',$data['room_checkin_checkout']['room_type_id']), array()); ?></td>
                  <td><?php
        echo @$master_room_plan_fetch_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_room_plan_fetch',$data['room_checkin_checkout']['plan_id']), array()); ?></td>
        <td><?php echo $data['room_checkin_checkout']['room_charge']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['totaltax']; ?></td>
        <td><?php echo $data['room_checkin_checkout']['tg']; ?></td>
        <td class="print-hide"><a href="user_infobill?id=<?php echo $id_room_checkin_checkout; ?>" target="_blank" class="btn blue btn-xs"><i class="fa fa-print"></i> Print</a>
        </td>
        
        </tr>
        <?php 
			}
			?>
            </tbody>
         </table>
         <?php
			}exit;
		}
		///////////////////////////////////////////////
		
		//////////////////////////////////user_rights///////////////////////
		
		if($this->request->query('user_rights')==1)
		{
			$user_id=$this->request->query('q');
			//pr($user_id);
			
			$this->loadmodel('module');
			$fetch_menu = $this->module->find('all');
			 
			$this->loadmodel('user_right');
			$conditions=array('id' => $user_id);
			
			$fetch_user_right = $this->user_right->find('all',array('conditions'=>$conditions));
			@$user_right1=$fetch_user_right['0']['user_right']['module_id'];
			
			 $user_right=explode(',', $user_right1);
			?><center>
                <table class="table table-striped table-condensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="50%">Module</th>
                        <th  width="50%" style="text-align:center;"><input type="checkbox"  name="" id="check_all" /></th>
                    </tr>
                </thead>
                <tbody>
                <?php
				$i=1;
			foreach($fetch_menu as $data)
			{
				?>
               <tr>
               <td><?php echo $data['module']['name'];  ?></td>
               <td style="text-align:center"><input type="checkbox" name="module_id[]" class="check" value="<?php echo $data['module']['id']; ?>" <?php if(in_array($data['module']['id'], $user_right)){ echo 'checked'; } ?> /></td>
               </tr>
                <?php
			}
			?>
            
            <tr>
            <td colspan="2" style="text-align:center;">
            <button type="submit" class="btn red " name="right_submit"><i class="fa fa-check"></i> Assign Rights</button>
            </td>
            </tr>
            </tbody>
            </table>
            <?php
			exit;
		}
		
		///////////////////////////////
		if($this->request->query('reg_guest_type_ajax')==1)
        {
        	$this->set('reg_guest_type_ajax', 1);
            $q=$this->request->query("q");
            $q=json_decode($q);
            $this->set('q', $q);
			}
		/////////////////////////////
		if($this->request->query('reg_type_select_ajax')==1)
        {
        $this->set('reg_type_select_ajax', 1);
            $q=$this->request->query("q");
            $q=json_decode($q);
            $this->set('q', $q);
			
		}
		 ////
         if($this->request->query('delete_room_reseveration_data')==1)
		{
			$q=$this->request->query("q");
			$this->loadmodel('room_reservation');
			$this->room_reservation->updateAll(array('flag' => 1), array('id' => $q));
		}
        ////
		
		 if($this->request->query('delete_c_reg_data')==1)
		{
			$q=$this->request->query("q");
			
			
			$this->loadmodel('company_registration');
			$this->room_reservation->delete(array('id' => $q));
		}
		//////
		
		if($this->request->query('add_outlet_item_mapping_form')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
			
			$i=0;
			$this->loadmodel('outlet_item_mapping');
			foreach($q as $value)
			{
				if($i==0)
				{
					$outlet_id=$value[0];
					$master_item_type_id=$value[1];
					$i++;
				}
				else
				{
					$master_item_id=$value[0];
					$billing_rate=$value[1];
					$billing_room_rate=$value[2];
					$urgent_rate=$value[3];
					$conditions=array('master_outlet_id' => $outlet_id,'master_item_type_id' => $master_item_type_id,'master_item_id' => $master_item_id);
					$fetch_outlet_item_mapping=$this->outlet_item_mapping->find('all',array('conditions'=>$conditions));
					if(sizeof($fetch_outlet_item_mapping)==1)
					{
						$this->outlet_item_mapping->updateAll(array('billing_rate' => "'$billing_rate'", 
						'billing_room_rate' => "'$billing_room_rate'",
						'urgent_rate' => "'$urgent_rate'"), 
						array('master_outlet_id' => $outlet_id,
						'master_item_type_id' => $master_item_type_id,
						'master_item_id' => $master_item_id));
					}
					else
					{
						 $this->outlet_item_mapping->saveAll(array('master_outlet_id' => $outlet_id,
						'master_item_type_id' => $master_item_type_id,
						'master_item_id' => $master_item_id,
						'billing_rate' => $billing_rate, 
						'billing_room_rate' => $billing_room_rate,
						'urgent_rate' => $urgent_rate));
					}
				}
			}
exit;
          
        }
		
		if($this->request->query('master_item_categoty_submit')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
           	$master_itemcategory_id=$q[0];
			$itemtype_name=$q[1];
			$master_tax=$q[2];
			$master_tax=implode(',', $master_tax);
			$this->loadmodel('master_item_type');
			
			    
			$this->master_item_type->saveAll(array('master_itemcategory_id' => $master_itemcategory_id,'itemtype_name' => $itemtype_name,'master_tax_id' => $master_tax));
			$fetch_master_item=$this->master_item_type->find('all',array('conditions'=>array('flag' => 0 , 'master_itemcategory_id' => $master_itemcategory_id)));
			
			
			 echo '<option value="">--- Select ---</option>';
				foreach($fetch_master_item as $data)
				{ //pr($data);
				 ?>
				<option value="<?php echo $data['master_item_type']['id'];?>"><?php echo $data['master_item_type']['itemtype_name'];?></option>
				<?php 
				}
			
		}    
		       
		if($this->request->query('master_item_categoty_submitt')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
           	$master_itemcategory_id=$q[0];
			$itemtype_name=$q[1];
			$this->loadmodel('stock');
			$this->stock->saveAll(array('master_itemcategory_id' => $master_itemcategory_id,'itemtype_name' => $itemtype_name));
			$fetch_master_item=$this->stock->find('all',array('conditions'=>array('flag' => 0 , 'master_itemcategory_id' => $master_itemcategory_id)));
			 echo '<option value="">--- Select ---</option>';
				foreach($fetch_master_item as $data)
				{ //pr($data);
				 ?>
				<option value="<?php echo $data['stock']['id'];?>"><?php echo $data['stock']['itemtype_name'];?></option>
				<?php 
				}
		}                  
                            
		/*if($this->request->query('outlatemapping_addrow')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
           $tr=$q[0];
			?>
            <tr>
            <td><select class="form-control input-medium" name="master_item_id_<?php echo $tr+1; ?>">
                                <option value="">--- Select ---</option>
                                <?php
								$this->loadmodel('master_item');
								$fetch_master_item=$this->master_item->find('all');
                                foreach($fetch_master_item as $data)
                                {
                                ?>
                                <option value="<?php echo $data['master_item']['id'];?>"><?php echo $data['master_item']['item_name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
             </td>
             <td><input type="text" class="form-control input-small" placeholder="Billing Rate" name="billing_rate_<?php echo $tr+1; ?>"></td>
             <td><input type="text" class="form-control input-small" placeholder="Billing Room Rate" name="billing_room_rate_<?php echo $tr+1; ?>"></td>
             <td><input type="text" class="form-control input-small" placeholder="Urgent Rate" name="urgent_rate_<?php echo $tr+1; ?>"></td>
             <td><button type="button" class="btn btn-xs btn-danger" onclick="outlet_deleterow()"><i class="fa fa-trash-o"></i> Delete Row</button><button type="button" class="btn btn-xs btn-primary" onclick="outlet_addrow()"><i class="fa fa-plus"></i> Add Row</button></td>
            </tr>
            <?php
        }*/
	if($this->request->query('fetch_outlet_item_mapping')==1)
        {
            $this->set('fetch_outlet_item_mapping', 1);
            $q=$this->request->query("q");
            $q=json_decode($q);
            $this->set('q', $q);
 			$outlet_id=$q[0];
			$master_item_type_id=$q[1];
			$this->loadmodel('master_item');
			$conditions=array('master_item_type_id' => $master_item_type_id);
			$dd=$this->set('fetch_master_item',$this->master_item->find('all',array('conditions'=>$conditions)));
			
			
			
        }
		if($this->request->query('company_discount_category')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
             $company_category_id=$q[0];
            $this->loadmodel('company_discount');
			$this->loadmodel('master_item_type');
				$conditions=array('company_category_id' => $company_category_id);
				$fetch_company_discount=$this->company_discount->find('all',array('conditions'=>$conditions,'fields'=>array('item_type_id')));
                foreach($fetch_company_discount as $data=>$key)
                {
					foreach($key as $data1=>$key1)
                	{
						foreach($key1 as $data2=>$item_type_id)
                		{
							$item_conditions=array('id' => $item_type_id);
							$item_name=$this->master_item_type->find('all',array('conditions'=>$item_conditions,'fields'=>array('itemtype_name')));
							$item_name_view[$item_type_id]=$item_name[0]['master_item_type']['itemtype_name'];
						}
					}
				}
				echo '<option value="">--- Select ---</option>';
                foreach($item_name_view as $item_type_id=>$item_name_v)
                {
                    echo '<option value="'.$item_type_id.'">'.$item_name_v.'</option>';
                }
        }
		////////////////////////////////
		if($this->request->query('view_category_item_type')==1)
        {
            $category_id=$this->request->query("q");
			$this->loadmodel('master_item_type');
				$conditions=array('master_itemcategory_id' => $category_id, 'flag' => 0);
				$fetch_company_discount=$this->master_item_type->find('all',array('conditions'=>$conditions));
				if(!empty($fetch_company_discount))
				{
					echo '<option value="">--- Select ---</option>';
					foreach($fetch_company_discount as $data=>$key)
					{   $id=$key['master_item_type']['id'];
						$itemtype_name=$key['master_item_type']['itemtype_name'];
						echo '<option value="'.$id.'">'.$itemtype_name.'</option>';
					}
				}else
				{ echo "error"; }
				exit;
        }
		////////////////////////////////
		if($this->request->query('view_category_check_cardno')==1)
        {
           $id=$this->request->query("q");
		   $id_chk=explode(',',$this->request->query("q"));
			
			$this->loadmodel('room_checkin_checkout');
				$conditions=array('id' => $id, 'flag' => 0);
				$fetch_company_discount=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
				$fetch_company_card=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions,'fields'=>array('card_no')));
				$ftc_cr_no=$fetch_company_card[0]['room_checkin_checkout']['card_no'];
				
				if(empty($ftc_cr_no))
				{
				$fetch_card_no_checkin=$this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0)));
				}
				else{
					
				$conditionss=array('card_no' => $ftc_cr_no, 'flag' => 0, 'status' => 0);
				$fetch_card_no_checkin=$this->room_checkin_checkout->find('all', array('conditions' => $conditionss));
				}
				////pr($fetch_card_no_checkin);
				if(!empty($fetch_card_no_checkin))
				{
					foreach($fetch_card_no_checkin as $key1)
					{   
						$idd=$key1['room_checkin_checkout']['id'];
						$itemtype_name=$key1['room_checkin_checkout']['master_roomno_id'];
						if(in_array($idd, $id_chk))
						{?>
                        <option  selected="selected" value="<?php echo  $idd;?>"><?php echo $itemtype_name;?></option>
							<?php
						}
						else
						{
						?> <option value="<?php echo $idd;?>"><?php echo $itemtype_name;?></option>
                        <?php
						}
					}
				}
				else{
					echo 'error';}
					
				exit;
        }
		///////////////////////////////
		////////////////////////////////card_amount/////////////////////
		if($this->request->query('view_card_balance_amount')==1)
        {
           $id=$this->request->query("q");
			
			$this->loadmodel('card_amount');
	$fetch_card_balance=$this->card_amount->find('all',array('conditions'=>array('registration_id' => $id,'flag' => "0"), 'order'=>'id DESC','limit'=>1,'fields'=>array('balance_amount')));
				
				$ftc_balance=$fetch_card_balance[0]['card_amount']['balance_amount'];
				if(!empty($fetch_card_balance))
				{
					echo $ftc_balance=$fetch_card_balance[0]['card_amount']['balance_amount'];
					
				}
					
				exit;
        }
		///////////////////////////////
		if($this->request->query('view_card_balance_amount_tot')==1)
        {
           $id=$this->request->query("q");
			
			$this->loadmodel('card_amount');
	$fetch_card_balance=$this->card_amount->find('all',array('conditions'=>array('registration_id' => $id,'flag' => "0")));
?>

<table class="table table-bordered table-hover" id="sample_1">
<thead>
<tr>
<th width="10%">S. No</th>
<th>Registration No.</th>
<th>Recharge</th>
<th>Member Name</th>
<th>Member Card No.</th>
<th>Balance</th>
</tr>
</thead>
	 <tbody>
     	<?php
		$i=0;
		 foreach($fetch_card_balance as $data){ 
		 $i++;
		 $id=$data['card_amount']['id'];
         $registration_id=$data['card_amount']['registration_id'];
		 ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['card_amount']['registration_id'];?></td>
            <td><?php  echo $reg_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_card_type_no_fetch',$data['card_amount']['registration_id']), array());?></td>
            <td><?php  echo $reg_no=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'master_card_type_no_fetch1',$data['card_amount']['registration_id']), array());?></td>
            </td>
            <td><?php echo $data['card_amount']['recharge_amount'];?></td>
            <td><?php echo $data['card_amount']['balance_amount'];?></td>
            </tr>
        
        <?php } ?>
     </tbody>
</table>          <?php
        }
		/////////////////////////////////////////
		
		if($this->request->query('view_category_item_type_name')==1)
        {
            $item=$this->request->query("q");
			$this->loadmodel('master_item');
				$conditions=array('master_item_type_id' => $item, 'flag' => 0);
				$fetch_itemmt=$this->master_item->find('all',array('conditions'=>$conditions));
				if(!empty($fetch_itemmt))
				{
					foreach($fetch_itemmt as $data=>$key)
					{   $id=$key['master_item']['id'];
						$itemtype_name=$key['master_item']['item_name'];
						?>
						 
						 
						 <select class="form-control select2 select2_sample2" style="width:60%;" required="required" name="item_name_id[]" placeholder="Select Item..." multiple id="mitem"></select>
						<option value="<?php echo $id;?>"><?php echo $itemtype_name;?></option>';
					
						
				<?php	}
				}else
				{ echo "error"; }
				exit;
        }
		////////////////////////////////
		if($this->request->query('vieww_categoryy_itemm_typee')==1)
        {
            $category_id=$this->request->query("q");
			//echo $category_id;
			$this->loadmodel('master_item_type');
			$this->loadmodel('master_item');
				$conditions=array('master_itemcategory_id' => $category_id, 'flag' => 0);
				//pr($conditions);
				$fetch_gyms=$this->master_item->find('all',array('conditions'=>$conditions));
				if(!empty($fetch_gyms))
				{
					echo '<option value="">--- Select ---</option>';
					foreach($fetch_gyms as $datakey)
					{   $id=$datakey['master_item']['id'];
						$item_name=$datakey['master_item']['item_name'];
						$billing_rate=$datakey['master_item']['billing_rate'];
						$billing_room_rate=$datakey['master_item']['billing_room_rate'];
						$item_code=$datakey['master_item']['item_code'];
						$ledger_category=$datakey['master_item']['ledger_category'];
						echo '<option m_cat_i="'.$ledger_category.'" quantity="1" rate="'.$billing_rate.'" amount="'.$billing_room_rate.'" value="'.$id.'">'.$item_name.',('.$item_code.')</option>';
					}
				}else
				{ echo "error"; }
				exit;
        }
		//
		////////////////////////////////
		
		
		if($this->request->query('view_category_item_typee')==1)
        {
            $category_id=$this->request->query("q");
			$this->loadmodel('stock');
				$conditions=array('master_itemcategory_id' => $category_id, 'flag' => 0);
				$fetch_company_discount=$this->stock->find('all',array('conditions'=>$conditions));
				if(!empty($fetch_company_discount))
				{
					echo '<option value="">--- Select ---</option>';
					foreach($fetch_company_discount as $data=>$key)
					{   $id=$key['stock']['id'];
						$itemtype_name=$key['stock']['itemtype_name'];
						echo '<option value="'.$id.'">'.$itemtype_name.'</option>';
					
					}
				}else
				{ echo "error"; }
				exit;
        }
		//
		if($this->request->query('company_discount_item')==1)
        {
            $q=$this->request->query("q");
            $q=json_decode($q);
			
             $company_category_id=$q[0];
			 $item_type_id=$q[1];
			
            $this->loadmodel('company_discount');
			$this->loadmodel('master_item_type');
		
				$conditions=array('company_category_id' => $company_category_id,'item_type_id'=>$item_type_id);
				$fetch_company_discount=$this->company_discount->find('all',array('conditions'=>$conditions,'fields'=>array('discount','other_discount')));
							
				$discount_view=$fetch_company_discount[0]['company_discount']['discount'];
			    $other_discount_view=$fetch_company_discount[0]['company_discount']['other_discount'];
               
				
				 echo '	<table class="table self-table" style=" width:50% !important; margin-top:-2%" >
				 		<tr>
                        <td width="22%"><label>Discount</label></td>
                        <td width="28%"><input type="text" class="form-control input-inline input-medium" placeholder="Discount" name="edit_discount" value="'. $discount_view.'" ></td>
                        </tr>
                        <tr>
                        <td><label>Other Discount</label></td>
                        <td><input type="text" class="form-control input-inline input-medium" value="'. $other_discount_view.'" placeholder="Other Discount" name="edit_other_discount" ></td>
                        </tr>
                        <tr>
                        <td colspan="2"><center><button type="submit" name="edit_company_discount" id="update_cmpny_discount" class="btn blue" ><i class="fa fa-edit"></i> Update</button></center></td>
                        </tr>
						</table>';
        	}
			
			////////////////////////////////
		

		if($this->request->query('master_service_addform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$service_name=$q[0];
			$tax_applicable_id=$q[1];
			
			$this->loadmodel('master_service');
			$fetch_master_service1=$this->master_service->find('all', array('conditions' => array('service_name' => $service_name)));
			
			if(is_array($fetch_master_service1))
			{
				$service_name1=$fetch_master_service1[0]['master_service']['service_name'];
			}
			
			if($service_name != @$service_name1)
			{
				$this->master_service->saveAll(array('service_name' => $service_name, 'tax_applicable_id' => $tax_applicable_id));
				$fetch_master_service=$this->master_service->find('all');
				echo '<option value="">--- Select ---</option>';
				foreach($fetch_master_service as $data)
				{
					echo '<option edit_ser="'.$data['master_service']['service_name'].'" edit_tx="'.$data['master_service']['tax_applicable_id'].'" 
					value="'.$data['master_service']['id'].'">'.$data['master_service']['service_name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		else if($this->request->query('master_service_editform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$edit_service=$q[0];
			$edit_tax=$q[1];
			$editoption_service=$q[2];
			
			$this->loadmodel('master_service');
			$count=$this->master_service->find('count', array('conditions' => array('service_name' => $edit_service)));
			if(!empty($count))
			{
				$fetch_master_service1=$this->master_service->find('all', array('conditions' => array('service_name' => $edit_service)));
				$service_name1=$fetch_master_service1[0]['master_service']['service_name'];
				$master_service_id=$fetch_master_service1[0]['master_service']['id'];
			}
			if((@$service_name1 != $edit_service) || ($editoption_service==@$master_service_id))
			{
				$this->master_service->updateAll(array('service_name' => "'$edit_service'", 'tax_applicable_id' => "'$edit_tax'"), array('id' => $editoption_service));
				$fetch_master_service=$this->master_service->find('all');
				
				echo '<option value="">--- Select ---</option>';
				foreach($fetch_master_service as $data)
				{
					echo '<option edit_ser="'.$data['master_service']['service_name'].'" edit_tx="'.$data['master_service']['tax_applicable_id'].'" 
					value="'.$data['master_service']['id'].'">'.$data['master_service']['service_name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		else if($this->request->query('master_service_deleteform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$deleteoption=$q[0];
			$this->loadmodel('master_service');
			$this->master_service->updateAll(array('flag' => 1 ),array('id' => $deleteoption));
			$fetch_master_service=$this->master_service->find('all', array('conditions' => array('flag' => "0")));
				
				echo '<option value="">--- Select ---</option>';
				foreach($fetch_master_service as $data)
				{
					echo '<option edit_ser="'.$data['master_service']['service_name'].'" edit_tx="'.$data['master_service']['tax_applicable_id'].'" 
					value="'.$data['master_service']['id'].'">'.$data['master_service']['service_name'].'</option>';
				}
exit;
		}
		/*else if($this->request->query('roomplan_addform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$plan_name_form=$q[0];
			$description_plan_form=$q[1];
			$this->loadmodel('master_room_plan');
			$fetch_room_plan1=$this->master_room_plan->find('all', array('conditions' => array('plan_name' => $plan_name_form)));
			$plan_name=$fetch_room_plan1[0]['master_room_plan']['plan_name'];
			if($plan_name != $plan_name_form)
			{
				$this->master_room_plan->saveAll(array('plan_name' => $plan_name_form, 'description_plan' => $description_plan_form));
				$fetch_room_plan=$this->master_room_plan->find('all');
				echo '<option value="">--- Select Room Plan ---</option>';
				foreach($fetch_room_plan as $data)
				{
					echo '<option edit_room_plan="'.$data['master_room_plan']['plan_name'].'" edit_des="'.$data['master_room_plan']['description_plan'].'" 
					value="'.$data['master_room_plan']['id'].'">'.$data['master_room_plan']['plan_name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		else if($this->request->query('roomplan_editform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$edit_plan=$q[0];
			$editdescription=$q[1];
			$master_room_plan_edit=$q[2];
			$this->loadmodel('master_room_plan');
			$count=$this->master_room_plan->find('count', array('conditions' => array('plan_name' => $edit_plan)));
			if(!empty($count))
			{
				$fetch_room_plan1=$this->master_room_plan->find('all', array('conditions' => array('plan_name' => $edit_plan)));
				$plan_name=$fetch_room_plan1[0]['master_room_plan']['plan_name'];
				$plan_id=$fetch_room_plan1[0]['master_room_plan']['id'];
			}
			if((@$plan_name != $edit_plan) || ($master_room_plan_edit==@$plan_id))
			{
				$this->master_room_plan->updateAll(array('plan_name' => "'$edit_plan'", 'description_plan' => "'$editdescription'"), array('id' => $master_room_plan_edit));
				$fetch_room_plan=$this->master_room_plan->find('all');
				echo '<option value="">--- Select Room Plan ---</option>';
				foreach($fetch_room_plan as $data)
				{
					echo '<option edit_room_plan="'.$data['master_room_plan']['plan_name'].'" edit_des="'.$data['master_room_plan']['description_plan'].'" 
					value="'.$data['master_room_plan']['id'].'">'.$data['master_room_plan']['plan_name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		else if($this->request->query('roomplan_deleteform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$deleteoption=$q[0];
			$this->loadmodel('master_room_plan');
			$this->master_room_plan->updateAll(array('flag' => 1 ),array('id' => $deleteoption));
			$fetch_room_plan=$this->master_room_plan->find('all', array('conditions' => array('flag' => "0")));
			echo '<option value="">--- Select Room Plan ---</option>';
			foreach($fetch_room_plan as $data)
			{
				echo '<option edit_room_plan="'.$data['master_room_plan']['plan_name'].'" edit_des="'.$data['master_room_plan']['description_plan'].'" 
				value="'.$data['master_room_plan']['id'].'">'.$data['master_room_plan']['plan_name'].'</option>';
			}
exit;
		}*/
		/*else if($this->request->query('roomtype_addform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$room_type_form=$q[0];
			$this->loadmodel('master_room_type');
			$fetch_room_type1=$this->master_room_type->find('all', array('conditions' => array('room_type' => $room_type_form)));
			$room_type=$fetch_room_type1[0]['master_room_type']['room_type'];
			if($room_type != $room_type_form)
			{
				$this->master_room_type->saveAll(array('room_type' => $room_type_form));
				$fetch_room_type=$this->master_room_type->find('all');
				echo '<option value="">--- Select Room Type ---</option>';
				foreach($fetch_room_type as $data)
				{
					echo '<option edit_room_type="'.$data['master_room_type']['room_type'].'" value="'.$data['master_room_type']['id'].'">'.$data['master_room_type']['room_type'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		/*else if($this->request->query('roomtype_editform')==1)
		{
			
			$q=$this->request->query("q");
			$q=json_decode($q);
			$edit_room=$q[0];
			$room_type_edit=$q[1];
			$this->loadmodel('master_room_type');
			$count=$this->master_room_type->find('count', array('conditions' => array('room_type' => $edit_room)));
			if(!empty($count))
			{
				$fetch_room_type1=$this->master_room_type->find('all', array('conditions' => array('room_type' => $edit_room)));
				$room_type=$fetch_room_type1[0]['master_room_type']['room_type'];
				$room_type_id=$fetch_room_type1[0]['master_room_type']['id'];
			}
			if((@$room_type != $edit_room) || ($room_type_edit==@$room_type_id))
			{
				$this->master_room_type->updateAll(array('room_type' => "'$edit_room'"), array('id' => $room_type_edit));
				$fetch_room_type=$this->master_room_type->find('all');
				echo '<option value="">--- Select Room Type ---</option>';
				foreach($fetch_room_type as $data)
				{
					echo '<option edit_room_type="'.$data['master_room_type']['room_type'].'" value="'.$data['master_room_type']['id'].'">'.$data['master_room_type']['room_type'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		else if($this->request->query('roomtype_deleteform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$deleteoption=$q[0];
			$this->loadmodel('master_room_type');
			$this->master_room_type->updateAll(array('flag' => 1 ),array('id' => $deleteoption));
			$fetch_room_type=$this->master_room_type->find('all', array('conditions' => array('flag' => "0")));
			echo '<option value="">--- Select Room Type ---</option>';
			foreach($fetch_room_type as $data)
			{
				echo '<option edit_room_type="'.$data['master_room_type']['room_type'].'" value="'.$data['master_room_type']['id'].'">'.$data['master_room_type']['room_type'].'</option>';
			}
exit;
		}*/
		//////////////////////////////////////////
		
		/*else if($this->request->query('roomattribute_addform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$room_att_form=$q[0];
			$this->loadmodel('master_room_attribute');
			$fetch_master_room_attribute1=$this->master_room_attribute->find('all', array('conditions' => array('name' => $room_att_form)));
			$name=$fetch_master_room_attribute1[0]['master_room_attribute']['name'];
			if($name != $room_att_form)
			{
				$this->master_room_attribute->saveAll(array('name' => $room_att_form));
				$fetch_master_room_attribute=$this->master_room_attribute->find('all');
				echo '<option value="">--- Select ---</option>';
				foreach($fetch_master_room_attribute as $data)
				{
					echo '<option edit_room_at="'.$data['master_room_attribute']['name'].'" value="'.$data['master_room_attribute']['id'].'">'.$data['master_room_attribute']['name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		else if($this->request->query('roomattribute_editform')==1)
		{
			
			$q=$this->request->query("q");
			$q=json_decode($q);
			$edit_name=$q[0];
			$room_att_edit=$q[1];
			$this->loadmodel('master_room_attribute');
			$count=$this->master_room_attribute->find('count', array('conditions' => array('name' => $edit_name)));
			if(!empty($count))
			{
				$fetch_master_room_attribute1=$this->master_room_attribute->find('all', array('conditions' => array('name' => $edit_name)));
				$name=$fetch_master_room_attribute1[0]['master_room_attribute']['name'];
				$master_room_attribute_id=$fetch_master_room_attribute1[0]['master_room_attribute']['id'];
			}
			if((@$name != $edit_name) || ($room_att_edit==@$master_room_attribute_id))
			{
				$this->master_room_attribute->updateAll(array('name' => "'$edit_name'"), array('id' => $room_att_edit));
				$fetch_master_room_attribute=$this->master_room_attribute->find('all');
				echo '<option value="">--- Select ---</option>';
				foreach($fetch_master_room_attribute as $data)
				{
					echo '<option edit_room_at="'.$data['master_room_attribute']['name'].'" value="'.$data['master_room_attribute']['id'].'">'.$data['master_room_attribute']['name'].'</option>';
				}
			}
			else
			{
				echo 'error';
			}
exit;
		}
		else if($this->request->query('roomattribute_deleteform')==1)
		{
			$q=$this->request->query("q");
			$q=json_decode($q);
			$deleteoption=$q[0];
			$this->loadmodel('master_room_attribute');
			$this->master_room_attribute->updateAll(array('flag' => 1 ),array('id' => $deleteoption));
			$fetch_master_room_attribute=$this->master_room_attribute->find('all', array('conditions' => array('flag' => "0")));
			echo '<option value="">--- Select ---</option>';
			foreach($fetch_master_room_attribute as $data)
			{
				echo '<option edit_room_at="'.$data['master_room_attribute']['name'].'" value="'.$data['master_room_attribute']['id'].'">'.$data['master_room_attribute']['name'].'</option>';
			}
exit;
		}*/

		
		////////////////////////////////////
	}
	//////////////////////////////////////////////////////
	
	
			
public function roomno()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_roomno');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_outlet');
		$fetch_master_roomno=$this->master_roomno->find('all', array('conditions' => array('flag' => "0")));	
	    if($this->request->is('post'))
		{
		if(isset($this->request->data["add_master_roomno"]))
			{
				$room_from=$this->request->data["room_from"];
				$room_to=$this->request->data["room_to"];
				foreach($fetch_master_roomno  as $data)
					{ $room_no_ftc[]=$data['master_roomno']['room_no'];}

						 for($i=$room_from; $i<=$room_to; $i++)
								{
								$room_no_array=$i;
							
								$wrong=0;
								if(in_array($room_no_array, $room_no_ftc))
								{
									$this->set('active',1);
               						$this->set('wrong',1);	
								}
								else 
								{					
									$this->master_roomno->saveAll(array('master_outlet_id' => $this->request->data["master_outlet_id"],'room_type_id' => $this->request->data["room_type_id"],'room_no' => $room_no_array));
									$this->set('active',1);
								}
				}
			}
			
			else if(isset($this->request->data["edit_master_roomno"]))
			{
				$edit_room_type_id=$this->request->data["edit_room_type_id"];
				$edit_room_from=$this->request->data["edit_room_from"];
				$edit_master_outlet_id=$this->request->data["edit_master_outlet_id"];
				foreach($fetch_master_roomno  as $data)
					{ $room_no_ftc[]=$data['master_roomno']['room_no'];}
					if(in_array($edit_room_from, $room_no_ftc))
					{
						$this->set('active',2);
						$this->set('wrong',1);	
					}
					else 
					{					
					$this->master_roomno->updateAll(array('master_outlet_id' => $edit_master_outlet_id,'room_type_id' => $edit_room_type_id,'room_no' => "'$edit_room_from'"), array('id' => $this->request->data["roomno_id"]));
					$this->set('active',2);
					}
			}
			else if(isset($this->request->data["delete_master_roomno"]))
			{
				$this->master_roomno->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_roomno_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);				
			}
			}
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions' => array('flag' => "0"))) );
}
//////////////////////////
/*public function room_reservation()
	{
	    $this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('company_category');
		$this->loadmodel('address');
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_roomno');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_outlet');
		$this->loadmodel('company_registration');
		if($this->request->is('post'))
		{			
			if(isset($this->request->data["add_company_registration"]))
			{$this->loadmodel('company_registration');
			 $total_room = $this->request->data["total_room"];
			
                $this->company_registration->saveAll(array('company_name' => $this->request->data["company_name"],
				'company_category_id' => @(string)$this->request->data["company_category_id"],
				'pan_no' => $this->request->data["pan_no"],
				'service_tax_no' => $this->request->data["service_tax_no"],
				'authorized_person_name' => $this->request->data["authorized_person_name"],
				'authorized_contact_no' => $this->request->data["authorized_contact_no"],
				'mobile_no' => $this->request->data["mobile_no"],
				
                'authorized_email_id' => $this->request->data["authorized_email_id"], 
				'c_address' => $this->request->data["c_address"],
				'master_plan_id' => @(string)$this->request->data["master_plan_id"],
				'p_address' => $this->request->data["p_address"]));
			}
		}
		
	    $this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag' => "0"))));
		$this->set('fetch_room_type', $this->master_room_type->find('all', array('conditions' => array('flag' => "0"))));
		$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions' => array('flag' => "0"))));
		$this->set('fetch_room_plan', $this->master_room_plan->find('all', array('conditions' => array('flag' => "0"))));
		$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions' => array('flag' => "0"))));
		$this->set('fetch_company_category', $this->company_category->find('all', array('conditions' => array('flag' => "0"))));
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
			$this->loadmodel('registration');
		$this->set('fetch_registration', $this->registration->find('all'));

		
	}
	 */
	 //////////////////////////checkin//////////////////////////////////////////
	public function Room_reservation()
	{
		 $this->set('outlet',$this->Session->read('outlet_id'));
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('room_reservation');
		$this->loadmodel('room_reservation_no');
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('company_category');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_outlet');
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_room');
		$this->loadmodel('fo_room_booking');
		$this->loadmodel('gr_no');
		$this->loadmodel('address');
	    if(isset($this->request->data["add_reservation"]))
			{
				$booking_type=$this->request->data["booking_type"];
				@$rtype_id2=$this->request->data["total_room"];
				@$rtype_id=$this->request->data["master_roomno_id"];
				@$rtype_id1=$this->request->data["room_type_id"];
				@$rtype_id3=$this->request->data["room_charge"];
				@$rtype_id26=$this->request->data["room_discount"];
				@$rtype_id27=$this->request->data["taxes"];
				//pr($rtype_id2);
				//exit;
				
				$company_id = @(int)$this->request->data["company_id"];
					if($company_id==0 || $company_id=='')
					{
						$pos_company_id='1';
					}else{
					$pos_company_id=$company_id;
					}
					
				
				@$arrival_date=date('Y-m-d', strtotime($this->request->data["arrival_date"]));
				@$departure_date=date('Y-m-d', strtotime($this->request->data["departure_date"]));
				@$room_discount=$this->request->data["room_discount"];
                $duration=$this->request->data["duration"];
				//$taxes=$this->request->data["taxes"];
				//$room_discount=$this->request->data["room_discount"];
				$plan_id=$this->request->data["plan_id"];
				sizeof($rtype_id1);
				//exit;
				
			if($booking_type==0){	
			$x=0;
			$y=0;
			$z=0;
			$p=0;
			$q=0;
					$this->room_reservation->saveAll(array( 			
					'arrival_date' => @$arrival_date,
					'time' => @$this->request->data["time"],
					'reservation_gr_no' => @$this->request->data["reservation_gr_no"],
					'booking_type' => @$this->request->data["booking_type"],
					'b_date' => @date('Y-m-d', strtotime($this->request->data["b_date"])),
					'company_id' => @(int)$pos_company_id,
					'outlet_venue_id' => @(int)$this->request->data["outlet_venue_id"],
					'name_person' => @$this->request->data["name_person"],
					'permanent_address' => @$this->request->data["permanent_address"],
					'nationality' => @$this->request->data["nationality"],
					'city' => @$this->request->data["city"],
					'duration' => @$duration,
					'departure_date' => @$departure_date,
					'plan_id' => @(int)$plan_id,
					'granted' => @$this->request->data["granted"],
					'source_of_booking' => @$this->request->data["source_of_booking"],
					'traveller_name' => @$this->request->data["traveller_name"],
					'advance' => @$this->request->data["advance"],
					'requested' => @$this->request->data["requested"],
					'telephone' => @$this->request->data["telephone"],
					'fax' => @$this->request->data["fax"],
					'email_id' => @$this->request->data["email_id"],
					'rate_per_night' => @$this->request->data["rate_per_night"],
					'reservation_status' => @$this->request->data["reservation_status"],
					'remarks' => @$this->request->data["remarks"]));
			
			$last_record_id=$this->room_reservation->getLastInsertID();
				for($i=0; $i<sizeof($rtype_id1); $i++ )
				{
					$x=@$rtype_id1[$i];
					$y=@$rtype_id2[$i];
					$z=@$rtype_id3[$i];
					$p=@$rtype_id26[$i];
					$q=@$rtype_id27[$i]; 
					
					$this->room_reservation_no->saveAll(array( 			
					'room_type_id' => @(int)$x,
					'room_reservation_id' => $last_record_id,
					'room_charge' => @(int)$z,
					'total_room' => @(int)$y,
					'room_discount' => @$p,
					'taxes' => @$q));
				}
					
			}
				
			
			if($booking_type==1){
		   
					$this->room_reservation->saveAll(array( 			
					'time' => @$this->request->data["time"],
					'booking_type' => @$this->request->data["booking_type"],
					'reservation_gr_no' => @$this->request->data["reservation_gr_no"],
					'b_date' => @date('Y-m-d', strtotime($this->request->data["b_date"])),
					'company_id' => @(int)$this->request->data["company_id"],
					'outlet_venue_id' => @(int)$this->request->data["outlet_venue_id"],
					'name_person' => @$this->request->data["name_person"],
					'permanent_address' => @$this->request->data["permanent_address"],
					'nationality' => @$this->request->data["nationality"],
					'city' => @$this->request->data["city"],
					'granted' => @$this->request->data["granted"],
					'source_of_booking' => @$this->request->data["source_of_booking"],
					'traveller_name' => @$this->request->data["traveller_name"],
					//'id_proof_no' => @$this->request->data["id_proof_no"],
					'advance' => @$this->request->data["advance"],
					'requested' => @$this->request->data["requested"],
					'telephone' => @$this->request->data["telephone"],
					'fax' => @$this->request->data["fax"],
					'email_id' => @$this->request->data["email_id"],
					//'id_proof' => @(string)$this->request->data["id_proof"],
					'rate_per_night' => @$this->request->data["rate_per_night"],
					'reservation_status' => @$this->request->data["reservation_status"],
					'remarks' => @$this->request->data["remarks"]));
			  }

                $this->gr_no->updateAll(array('reservation_gr_no' =>$this->request->data["reservation_gr_no"]+1), array('id' => 1));
				$sms=str_replace(' ', '+', 'Thank you for choosing us for your stay.');
				$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'send_sms',$sms,$this->request->data["telephone"]), array());
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=room_reservation?active=1">';
			}
			
			
			
             if(isset($this->request->data["delete_room_checkin_id"]))
			{
				$this->room_reservation->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_checkin_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);
			}			
				
			 if(isset($this->request->data["add_company_registration"]))
			{$this->loadmodel('company_registration');
			
                $this->company_registration->saveAll(array('company_name' => $this->request->data["company_name"],
				'company_category_id' => @(string)$this->request->data["company_category_id"],
				'pan_no' => @$this->request->data["pan_no"],
				'service_tax_no' => @$this->request->data["service_tax_no"],
				'authorized_person_name' => @$this->request->data["authorized_person_name"],
				'authorized_contact_no' => @$this->request->data["authorized_contact_no"],
				'mobile_no' => @$this->request->data["mobile_no"],
                'authorized_email_id' => @$this->request->data["authorized_email_id"], 
				'c_address' => @$this->request->data["c_address"],
				'master_plan_id' => @(string)$this->request->data["master_plan_id"],
				'p_address' => @$this->request->data["p_address"]));
			}
			
			
			////////////////////////////////
	
		/*if(isset($this->request->data['submit1']))
		{
			
			$start_date=$this->data["start_date"];
			//$cash_report=$this->data["cash_report"];
			//pr($cash_report);
			//exit;	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			//echo $start_date;
			//echo $end_date;
			//$cash_report=$this->data["cash_report"];
			$conditions = array (
              'OR' => array(
            array('arrival_date between ? and ?' => array($start_date, $end_date)),
            array('b_date between ? and ?' => array($start_date, $end_date)),
        ));

    
				$fetch_room_reservation=$this->room_reservation->find('all', array('conditions' => $conditions));
			echo "<script>
			location='room_reservation';
			window.open('room_reservation_report?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
			
			}*/
		/////////////////////
	
			
			
			
			
			
			
			
			
			
	            $this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array( 'flag' => "0"))));
                $this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0"))));				
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0" , 'booking_type' => 0, 'checkin_id' => "0"))));
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_fo_room_booking', $this->fo_room_booking->find('all', array('conditions'=>array('flag' => "0"))));
				//$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
				$this->set('fetch_gr_no', $this->gr_no->find('all'));
				$this->loadmodel('registration');
		        $this->set('fetch_registration', $this->registration->find('all'));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_room_reservation_no', $this->room_reservation_no->find('all') );
		        $this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag' => "0"))));
		
	}
	////////////////////////////Reservation/////////////////////////
        
        ////////////
	/*function room_reservation_edit()
	{
	   $this->set('outlet',$this->Session->read('outlet_id'));
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$id = $this->request->query('id');
		$this->loadModel('room_reservation');
		$this->set('fte_room_reservation', $this->room_reservation->find('all', array('conditions' => array('id' => $id))));	
		
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag' => "0"))));
		$this->set('fetch_room_type', $this->master_room_type->find('all'));
		$this->set('fetch_company_registration', $this->company_registration->find('all'));
		$this->set('fetch_room_plan', $this->master_room_plan->find('all'));
		$this->set('fetch_room_reservation', $this->room_reservation->find('all'));
	}*/
    //////
	
	
	public function room_reservation_edit()
	{
	$this->set('outlet',$this->Session->read('outlet_id'));
	$id=$this->request->query('id');
	
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('company_category');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_room');
		$this->loadmodel('gr_no');
		
		if(isset($this->request->data["edit_room_reservation"]))
			{
				$reservation_gr_no=$this->request->data['reservation_gr_no'];
				$id=$this->request->data['id'];
				//pr($id);
				$arrival_date=date('Y-m-d', strtotime($this->request->data['arrival_date']));
				$time=$this->request->data['time'];
				$company_id=$this->request->data['company_id']; 
			    $name_person=$this->request->data['name_person']; 
				$nationality=$this->request->data['nationality'];
				$city=$this->request->data['city'];
				$traveller_name=$this->request->data['traveller_name'];
             	$duration=$this->request->data['duration'];
				$departure_date=date('Y-m-d', strtotime($this->request->data['departure_date']));
				$plan_id=$this->request->data['plan_id'];
				$granted=$this->request->data['granted'];
				$source_of_booking=$this->request->data['source_of_booking'];
				$advance=$this->request->data['advance'];
				$requested=$this->request->data['requested'];
				$fax=$this->request->data['fax'];
				$email_id=$this->request->data['email_id'];
				$telephone=$this->request->data['telephone'];
				$reservation_status=$this->request->data['reservation_status'];
				$remarks=$this->request->data['remarks'];
				@$rtype_id1=$this->request->data["room_type_id"];
				@$rtype_id25=$this->request->data["plan_id"];
				@$rtype_id26=$this->request->data["room_charge"];
				@$rtype_id2=$this->request->data["total_room"];
				@$rtype_id30=$this->request->data["taxes"];
				@$rtype_id31=$this->request->data["room_discount"];
        			@$hidd_edit_id=$this->request->data["hidd_edit_id"];
					//pr($hidd_edit_id);
					//exit;
					$this->room_reservation->updateAll(array('reservation_gr_no' =>"'$reservation_gr_no'",'arrival_date' => "'$arrival_date'",'time' => "'$time'",
					'company_id' => "'$company_id'",'name_person' => "'$name_person'",'email_id' => "'$email_id'",'nationality' => "'$nationality'",'city' => "'$city'",'duration' => "'$duration'",'departure_date' => "'$departure_date'",'plan_id' => "'$plan_id'",'granted' => "'$granted'",'source_of_booking' => "'$source_of_booking'",'advance' => "'$advance'",'granted' => "'$granted'",'fax' => "'$fax'",'remarks' => "'$remarks'", 'traveller_name' => "'$traveller_name'",'telephone' => "'$telephone'", 'requested' => "'$requested'", 'reservation_status' => "'$reservation_status'"), array('id' => $id));	
					
					$this->loadModel('room_reservation_no');
					$this->room_reservation_no->deleteAll(array('room_reservation_id' => $id));
					sizeof($rtype_id1);
					$x=0;
					$y=0;
					$z=0;
					$p=0;
					$q=0;
					$id=$this->request->data['id'];
					for($i=0; $i<sizeof($rtype_id1); $i++)
			       {
					$x=$rtype_id1[$i];
					$y=$rtype_id2[$i];
					$z=$rtype_id26[$i];
					$p=$rtype_id30[$i];
					$q=$rtype_id31[$i];
			        $this->room_reservation_no->saveAll(array('room_type_id' => @$x,'room_charge' => @$z,'total_room' => @$y, 'taxes' => @$p, 'room_discount' => @$q, 'room_reservation_id' => $id));
			       }
				   $this->redirect(array('action' => 'room_reservation'));
			}
			
				$this->loadModel('room_reservation');
				$this->loadModel('room_reservation_no');
				$this->set('fte_room_reservation', $this->room_reservation->find('all', array('conditions' => array('id' => $id))));	
				$this->loadmodel('master_room_plan');
				$this->loadmodel('company_registration');
				$this->loadmodel('master_room_type');
				$this->loadmodel('master_outlet');
				$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array( 'flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('flag' => "0",'id' =>  $id))));				
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation', $this->room_reservation->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_reservation_no', $this->room_reservation_no->find('all'));
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room', $this->master_room->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_gr_no', $this->gr_no->find('all'));
	}

	////////////////////
	
	public function company_tariff_edit()
	{
	$id=$this->request->query('id');
	
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}

		$this->loadmodel('company_category');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_tax');
		$this->loadmodel('company_discount');
		$this->loadmodel('master_room');
		$this->loadmodel('fo_room_booking');
		
		if(isset($this->request->data["edit_fo_room_booking"]))
			{
				$company_id=$this->request->data['company_id'];
				$id=$this->request->data['id'];
				$master_tax_idd=$this->request->data["master_tax_id"];
				$master_tax_id_e=implode(',', $master_tax_idd);
				@(string)$company_id=$this->request->data["company_id"];
				@(string)$master_room_plan_id=$this->request->data["master_room_plan_id"];
				@$date_from=date('Y-m-d', strtotime($this->request->data["date_from"]));
				@$date_to=date('Y-m-d', strtotime($this->request->data["date_to"]));
				@$discount=$this->request->data["discount"];
				@$food_discount=$this->request->data["food_discount"];
				@$remarks=$this->request->data["remarks"];
				
				@$rtype_id1=$this->request->data["master_room_type_id"];
				@$rtype_id4=$this->request->data["special_rate"];
        			@$hidd_edit_id=$this->request->data["hidd_edit_id"];


                    //$this->loadModel('fo_room_booking');
					$this->fo_room_booking->deleteAll(array('company_id' => $company_id, 'flag'=>0));
					$x=0;
					$z=0;
					$id=$this->request->data['id'];
					for($i=0; $i<sizeof($rtype_id1); $i++)
			       {
					$x=$rtype_id1[$i];
					$z=$rtype_id4[$i];
				   $this->fo_room_booking->saveAll(array( 			
					'master_room_type_id' => @(int)$x,
					'special_rate' => @(int)$z,
					'company_id' => @$this->request->data["company_id"],
				'master_room_plan_id' => @$this->request->data["master_room_plan_id"],
				'date_from' => date('Y-m-d', strtotime($this->request->data["date_from"])),
                'date_to' => date('Y-m-d', strtotime($this->request->data["date_to"])), 
				'discount' => @$this->request->data["discount"],
				'master_tax_id' => @$master_tax_id_e,
				'food_discount' => @$this->request->data["food_discount"],
				'remarks' => @$this->request->data["remarks"]));
				   }
				   $this->redirect(array('action' => 'company_tariff'));
			}
			
				$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
			    $this->set('fetch_fo_room_booking',$this->fo_room_booking->find('all', array('conditions' => array('id'=>$id))) );
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
	}
	////////////////////
	function room_reservation_pdf()
	{
		$this->layout="pdf";
			$id_pdf = $this->request->query("id_pdf");
			$this->loadModel('room_reservation');
			$ftc_room_reservation=$this->room_reservation->find('all', array('conditions' => array('id' => $id_pdf)));
				
			App::import('Vendor','xtcpdf');  
		$tcpdf = new XTCPDF(); 
		
		//$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans' 
		//$tcpdf->SetAuthor("KBS Homes & Properties at http://kbs-properties.com"); 
		$tcpdf->SetAutoPageBreak( true ); 
		//$tcpdf->setHeaderFont(array($textfont,'',40)); 
		$tcpdf->xheadercolor = array(255,255,255); 
	  //	$tcpdf->xheadertext = ''; 
		$tcpdf->xfootertext = 'DreamShapers'; 
		$tcpdf->AddPage(); 
		//$tcpdf->SetTextColor(0, 0, 0); 
		$tcpdf->SetFont($textfont,'N',12);	
			 
				foreach($ftc_room_reservation as $view_data)
				{ 
					$id=$view_data['room_reservation']['id'];
					$name_person=$view_data['room_reservation']['name_person'];
					$company_id=$view_data['room_reservation']['company_id'];
					$nationality=$view_data['room_reservation']['nationality'];
					$telephone=$view_data['room_reservation']['telephone'];
					$fax=$view_data['room_reservation']['fax'];
					$email_id=$view_data['room_reservation']['email_id']; 
					
					$arrival_date=$view_data['room_reservation']['arrival_date'];
					if($arrival_date=="0000-00-00"){
						$arrival_date="";
						}
					else{
						$arrival_date=date("d-m-Y",strtotime($arrival_date));
					}
					$departure_date=$view_data['room_reservation']['departure_date'];
					if($departure_date=="0000-00-00"){
						$departure_date="";
						}
					else{
						$departure_date=date("d-m-Y",strtotime($departure_date));
					}
					$plan_id=$view_data['room_reservation']['plan_id'];
					$billing_instruction=$view_data['room_reservation']['billing_instruction']; 
					$source_of_booking=$view_data['room_reservation']['source_of_booking'];
					$safari_required=$view_data['room_reservation']['safari_required'];
					$booking_thru_sales=$view_data['room_reservation']['booking_thru_sales'];
					
					$reservation_status=$view_data['room_reservation']['reservation_status']; 
					$remarks=$view_data['room_reservation']['remarks'];
					$room_type_id=$view_data['room_reservation']['room_type_id'];
					$requested=$view_data['room_reservation']['requested'];
					$granted=$view_data['room_reservation']['granted'];
					$rate_per_night=$view_data['room_reservation']['rate_per_night']; 
					$advance=$view_data['room_reservation']['advance']; 
			 
			}
			
			$html='	
			<h3>Room Reseveration</h3>		
				<table height="1000px" style="line-height:7px">
				<tr><td><strong>Name &nbsp; :</strong></td><td>'.ucwords($name_person).'</td></tr>
				<tr><td><strong>Company Name &nbsp; :</strong></td><td>'.ucwords($Compny_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$view_data['room_reservation']['company_id']), array())).'</td></tr>
				<tr><th><strong>Nationality &nbsp; :</strong></th><td>'.ucwords($nationality).'</td></tr>
				<tr><th><strong>Telephone &nbsp; :</strong></th><td>'.$telephone.'</td></tr>
				<tr><th><strong>Fax &nbsp; :</strong></th><td>'.ucwords($fax).'</td></tr>
				<tr><th><strong>Email &nbsp; :</strong></th><td>'.ucwords($email_id).'</td></tr>
				<tr><th><strong>Arrival Date (Home) &nbsp; :</strong></th><td>'.$arrival_date.'</td></tr>
				<tr><th><strong>Departure Date &nbsp; :</strong></th><td>'.$departure_date.'</td></tr>
				<tr><th><strong>Plan  &nbsp; :</strong></th><td>'.ucwords($plan_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_plan_name_fetch',$view_data['room_reservation']['plan_id']), array())).'</td></tr>
				<tr><th><strong>Billing Instruction  &nbsp; :</strong></th><td>'.$billing_instruction.'</td></tr>
				<tr><th><strong>Safari Required :</strong></th><td>'.ucwords($safari_required).'</td></tr>
				<tr><td><strong>Booking Thru Sales office &nbsp; :</strong></td><td>'.ucwords($booking_thru_sales).'</td></tr>
				<tr><td><strong>Room Type &nbsp; :</strong></td><td>'.ucwords($plan_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_room_type_fetch',$view_data['room_reservation']['room_type_id']), array())).'</td></tr>     
				<tr><th><strong>Source Of Booking &nbsp; :</strong></th><td>'.ucwords($source_of_booking).'</td></tr>
				<tr><th><strong>Reservation Status &nbsp; :</strong></th><td>'.$reservation_status.'</td></tr>
				
				<tr><th><strong>Requested by &nbsp; :</strong></th><td>'.ucwords($reservation_status).'</td></tr>
				<tr><th><strong>Granted &nbsp; :</strong></th><td>'.ucwords($granted).'</td></tr>
				<tr><th><strong>Rate Per Night &nbsp; :</strong></th><td>'.$rate_per_night.'</td></tr>
				<tr><th><strong>Advance &nbsp; :</strong></th><td>'.$advance.'</td></tr>
				<tr><th><strong>Remarks &nbsp; :</strong></th><td>'.ucwords($remarks).'</td></tr> 
				
				</table>';
			
		$tcpdf->writeHTML($html);
		ob_clean();
		echo $tcpdf->Output('html.pdf', 'D');
		return $this->redirect(array('action' => 'room_reservation'));
	}
    function room_reservation_excel()
	{
		$this->layout="";
		$filename='room_resveration_excel';
		header ("Expires: 0");
		header ("border: 1");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=".$filename.".xls");
		header ("Content-Description: Generated Report" );
		
		$excel = "<table border='1'>
		<tr>
		<th>S.no</th>
		<th>Name</th>
		<th>Company Name</th>
        <th>Nationality</th>
		<th>Telephone</th>
		<th>Fax</th>
		<th>Email</th>
		<th>Arrival Date</th>
        <th>Departure Date</th>
        <th>Plan </th>
		<th>Billing Instruction</th>
		<th>Source of Booking</th>
		<th>Safari Required</th>
		<th>Booking Thru Sales</th>
        <th>Reservation Status</th>
		<th>Room Type</th>
		<th>Requested</th>
		<th>Granted</th>
		<th>Rate Per Night</th>
		<th>Advance</th>
		<th>Remarks</th>
		
		
		</tr>";
		$i=0;
		$this->loadModel('room_reservation');
		$fatch_room_reservation=$this->room_reservation->find('all');
		foreach($fatch_room_reservation as $view_data)
			{ $i++;
				@$id=$view_data['room_reservation']['id'];
				@$name_person=$view_data['room_reservation']['name_person'];
				@$company_id=$view_data['room_reservation']['company_id'];
				@$nationality=$view_data['room_reservation']['nationality'];
				@$telephone=$view_data['room_reservation']['telephone']; 
				@$fax=$view_data['room_reservation']['fax'];
				@$email_id=$view_data['room_reservation']['email_id'];

				@$arrival_date=$view_data['room_reservation']['arrival_date'];
				@$departure_date=$view_data['room_reservation']['departure_date']; 
				@$plan_id=$view_data['room_reservation']['plan_id'];
				@$billing_instruction=$view_data['room_reservation']['billing_instruction'];
				@$source_of_booking=$view_data['room_reservation']['source_of_booking'];
				@$safari_required=$view_data['room_reservation']['safari_required'];
				@$booking_thru_sales=$view_data['room_reservation']['booking_thru_sales']; 
				@$reservation_status=$view_data['room_reservation']['reservation_status'];
				@$room_type_id=$view_data['room_reservation']['room_type_id'];
				@$requested=$view_data['room_reservation']['requested'];
				@$granted=$view_data['room_reservation']['granted'];
				@$rate_per_night=$view_data['room_reservation']['rate_per_night']; 
				@$remarks=$view_data['room_reservation']['remarks'];
				@$advance=$view_data['room_reservation']['advance'];
				
				
				
		$excel.="	
		<tr>
		<td>".$i."</td>
		<td>".ucwords($name_person)."</td>
		<td>".ucwords($company_id=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'company_registration_fetch',$view_data['room_reservation']['company_id']), array()))."</td>
        <td>".ucwords($nationality)."</td>
		<td>".$telephone."</td>
		<td>".ucwords($fax)."</td>
		<td>".$email_id."</td>
		<td>".date("d-m-Y", strtotime($arrival_date))."</td>
        <td>".date("d-m-Y", strtotime($departure_date))."</td>
        <td>".ucwords($plan_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_plan_name_fetch',$view_data['room_reservation']['plan_id']), array()))."</td>
		<td>".ucwords($billing_instruction)."</td>
		<td>".ucwords($source_of_booking)."</td>
		<td>".ucwords($safari_required)."</td>
		<td>".ucwords($booking_thru_sales)."</td>
        <td>".ucwords($reservation_status)."</td>
		<td>".ucwords($plan_name=$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'func_room_type_fetch',$view_data['room_reservation']['room_type_id']), array()))."</td>
		<td>".ucwords($requested)."</td>
		<td>".ucwords($granted)."</td>
		<td>".$rate_per_night."</td>
		<td>".$advance."</td>
		<td>".ucwords($remarks)."</td>";
		
		
		$excel.="</tr>";
		}
			
	$excel.="</table>";

	echo $excel;	
	}
	
	////////////////////////////////////////////////////////////////
	public function roomservicing()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('room_serviceing');
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_reservation');
		$this->loadmodel('master_caretaker');	
	    if($this->request->is('post'))
		{
		if(isset($this->request->data["add_room_servicing"]))
			{
				
			
                $this->room_serviceing->saveAll(array('master_roomno_id' => $this->request->data["master_roomno_id"],
				'guest_name' => $this->request->data["guest_name"],	
				'service_date' => date('Y-m-d', strtotime($this->request->data["service_date"])),	
				'room_status' => $this->request->data["room_status"],
				'serviced_by' => $this->request->data["serviced_by"],
				'remarks' => $this->request->data["remarks"]));
				
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=roomservicing?active=1">';
						}
			
			else if(isset($this->request->data["edit_room_servicing"]))
			{
				
				$edit_master_roomno_id=$this->request->data["edit_master_roomno_id"];
				$edit_guest_name=$this->request->data["edit_guest_name"];
				$edit_service_date=date('Y-m-d', strtotime($this->request->data["edit_service_date"]));
				$edit_room_status=$this->request->data["edit_room_status"];
				$edit_serviced_by=$this->request->data["edit_serviced_by"];
				$edit_remarks=$this->request->data["edit_remarks"];
				$this->room_serviceing->updateAll(array('master_roomno_id' => "'$edit_master_roomno_id'", 'guest_name' => 
				"'$edit_guest_name'", 'service_date' => "'$edit_service_date'", 'room_status' => "'$edit_room_status'", 'serviced_by' => "'$edit_serviced_by'", 'remarks' => "'$edit_remarks'" ), 
				array('id' => $this->request->data["serviceing_id"]));
				$this->set('active',2);
			}
			else if(isset($this->request->data["delete_room_servicing"]))
			{
				$this->room_serviceing->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_servicing_id"]));
				
$this->set('active',2);
$this->set('active_delete',1);
			}
			}

				$this->set('fetch_room_serviceing', $this->room_serviceing->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_caretaker', $this->master_caretaker->find('all', array('conditions'=>array('flag' => "0"))));
}
	
	////////////////////////////////////////////////////////////////
	public function house_keeping()
	{
		$date=date("Y-m-d");
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('house_keeping');
		$this->loadmodel('master_roomno');
		$this->loadmodel('master_caretaker');
		$this->loadmodel('receipt_checkout');
		$this->loadmodel('room_checkin_checkout');
		$this->loadmodel('address');
		if($this->request->is('post'))
		{
		if(isset($this->request->data["add_house_keeping"]))
			{
				$roomno_id=$this->request->data["roomno_id"];
				$guest_name=$this->request->data["guest_name"];
				$card_no=$this->request->data["card_no"];
				$house_amount=$this->request->data["house_amount"];
				$total_amount=$this->request->data["total_amount"];
				$recpt_type=$this->request->data["recpt_type"];
				$narration=$this->request->data["narration"];
				$payment_mode=$this->request->data["recpt_type"];
				
				$house_due_zero=0;
            $house_due_amount=$total_amount-$house_amount-$house_due_zero;
			
			$user_id=@(int)$this->data["user_id"];
			if($user_id==0 || $user_id=='')
			{
				$house_user_id='1';
			}else{
			$house_user_id=$user_id;
			}
				
				
				 if($house_amount>0)
				 {
					 $payment_id = 1;
				 }
				 else
				 {
					  $payment_id = 0;
				 }
                $this->house_keeping->saveAll(array(
				'master_roomno_id' => $roomno_id,
				'card_no' => $this->request->data["card_no"],	
				'date' => date('Y-m-d', strtotime($this->request->data["date"])),	
				'time' => $this->request->data["time"],
				'user_id' => $house_user_id,
				'serviced_by' => $this->request->data["serviced_by"],
				'wash_iron_no' => $this->request->data["wash_iron_no"],
				'wash_iron_price' => $this->request->data["wash_iron_price"],
				'iron_no' => $this->request->data["iron_no"],
				'iron_price' => $this->request->data["iron_price"],
				'total_amount' => $this->request->data["total_amount"],
				'remarks' => $this->request->data["remarks"],
				'guest_name' => @$guest_name,
				'given_amount' => $house_amount,
				'due_amount' => $house_due_amount,
				'payment_id' => $payment_id));
				
				if($recpt_type=='Cheque')
				{
					$cheque_date=date('Y-m-d', strtotime($this->request->data["cheque_date"]));
				}
				$cheque_date='';

				$house_amount=$this->request->data["house_amount"];
				if(empty($house_amount)){
					$h_a=0;
				}else
				{
				$h_a=$house_amount;
				}
				$total_amount=$this->request->data["total_amount"];
				$date=date("Y-m-d"); 
				$cheque_date=date('Y-m-d', strtotime($this->request->data["cheque_date"]));
		        $current_time=date("h:i:s A");
				$last_record_id=$this->house_keeping->getLastInsertID();																																
				$this->loadModel('house_keeping');
 				$this->loadModel('ledger');
				$this->loadModel('receipt');
				
				
			    $last_record_id=$this->house_keeping->getLastInsertID(); 		
				$cheque_no=@(int)$this->data["cheque_no"];
				$cheque_date=date('Y-m-d', strtotime($this->data["cheque_date"]));
				$neft_no=@(int)$this->data["neft_no"];
				$credit_card_name=$this->data["credit_card_name"];
				$credit_card_no=@(int)$this->data["credit_card_no"];
				$bank_name=$this->data["bank_name"];
				$narration=$this->data["narration"];
				
				$date=date("Y-m-d");
				$current_time=date("h:i:s A");
				$total_amount=$this->request->data["total_amount"];
				$house_amount=$this->request->data["house_amount"];
				//$bill_no=$this->request->data["bill_no"];
				$card_no=$this->request->data["card_no"];
				$this->loadModel('house_keeping');
				$this->loadModel('ledger');
				$this->loadModel('ledger_master');
				$this->loadModel('ledger_cr_dr');
				$t_date=date('Y-m-d', strtotime($date));
			   
			    $fetch_transaction_id_house=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Invoice')));
                $t_id_b=$fetch_transaction_id_house+1;
				$this->ledger->saveAll(array('ledger_category_id'=>6,'user_id'=> $house_user_id, 'transaction_type'=>'Invoice','transaction_id'=> $t_id_b,'receipt_type'=> 'House Keeping','invoice_id' => $last_record_id, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				    $last_ledger_id=$this->ledger->getLastInsertID(); 
				//
				$house_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$house_user_id)));
				$l_id=$house_m_ledger[0]['ledger_master']['id'];
				//
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'dr' => $total_amount));
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '22','cr' => $total_amount));
			
			
			 $fetch_transaction_id_house=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Receipt')));
             $t_id=$fetch_transaction_id_house+1;
              if($house_amount>0)
			  {
				  $this->ledger->saveAll(array('ledger_category_id'=>6,'user_id'=> $house_user_id,'transaction_id'=> $t_id,'transaction_type'=> 'Receipt','receipt_type'=> 'House Keeping','invoice_id' => $last_record_id, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				 $last_ledger_id=$this->ledger->getLastInsertID();
				  // 
				$kot_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$house_user_id)));
				$l_id=$kot_m_ledger[0]['ledger_master']['id'];
				//
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=>$l_id,'cr' => $house_amount));
				  
				if($payment_mode=='Cash')
				{
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '35','dr' => $house_amount));
				}else
				{
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '37','dr' => $house_amount));
			    }
			  }
				$last_record_id=$this->house_keeping->getLastInsertID();
          ?>
             <script>
			 window.open("house_keeping_bill?id=<?php echo $last_record_id;?>",'_newtab');
			 </script>
             <?php
			}
			 
			else if(isset($this->request->data["edit_house_keeping"]))
			{
				$edit_master_roomno_id=$this->request->data["edit_master_roomno_id"];
				@$edit_card_no=$this->request->data["edit_card_no"];
				$edit_date=date('Y-m-d', strtotime($this->request->data["edit_date"]));
				$edit_time=$this->request->data["edit_time"];
				$edit_serviced_by=$this->request->data["edit_serviced_by"];
		        $edit_wash_iron_no=$this->request->data["edit_wash_iron_no"];
				$edit_wash_iron_price=$this->request->data["edit_wash_iron_price"];
                $edit_iron_no=$this->request->data["edit_iron_no"];
				$edit_iron_price=$this->request->data["edit_iron_price"];
				$edit_total_amount=$this->request->data["edit_total_amount"];
				$edit_remarks=$this->request->data["edit_remarks"];
				
				$this->house_keeping->updateAll(array('roomno_id' => "'$edit_master_roomno_id'",
				 'card_no' => "'$edit_card_no'",
				 'date' => "'$edit_date'",
				 'time' => "'$edit_time'", 
				 'serviced_by' => "'$edit_serviced_by'",
				 'wash_iron_price' => "'$edit_wash_iron_price'",
				'iron_no' => "'$edit_iron_no'",
				'iron_price' => "'$edit_iron_price'", 'total_amount' => "'$edit_total_amount'", 'remarks' => "'$edit_remarks'",), array('id' => $this->request->data["h_keeping_id"]));
			    $this->set('active',2);
				
				
				 $this->receipt_checkout->updateAll(array('master_roomno_id' => "'$edit_master_roomno_id'",
				 'card_no' => "'$edit_card_no'",
				 'recpt_type' => "'$edit_recpt_type'",
				 'cash' => "'$edit_cash'", 
				 'cheque_amt' => "'$edit_cheque_amt'",
				 'cheque_no' => "'$edit_cheque_no'",
				'neft_amt' => "'$edit_neft_amt'",
				'neft_no' => "'$edit_neft_no'", 'credit_card_amt' => "'$edit_credit_card_amt'", 'credit_card_name' => "'$edit_credit_card_name'",
				'credit_card_no' => "'$edit_credit_card_no'", 'billing_ins' => "'$edit_billing_ins'",), array('id' => $this->request->data["h_keeping_id"]));
				
				
				
			}
			else if(isset($this->request->data["delete_house_keeping"]))
			{
				$this->house_keeping->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_h_keeping"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			}
			}
	
				$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_house_keeping', $this->house_keeping->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_caretaker', $this->master_caretaker->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_receipt_checkout', $this->receipt_checkout->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
				$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
				$this->loadmodel('company_registration');
		$this->set('fetch_company_registration', $this->company_registration->find('all' ,array('conditions'=>array('flag' => 0 ))));
		

}
	
	////////////////////////////////////////////////////////////////
	
	///////////////////////////////////////////////////
	public function servicereport()
	{
		if($this->RequestHandler->isAjax())
		{ 
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
	      $this->loadmodel('address');
		$this->set('fetch_address', $this->address->find('all',array('conditions' => array('flag' => "0"), 'order'=>'id DESC','limit'=>1)) );
	}
	///////////////////////////////////////////////////
	
	
	public function com_reg_report()
	{
		if($this->RequestHandler->isAjax())
		{ 
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
	
	}
	
	//////////////////////////////////////////////////////////
	
	public function roomplan()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_room_plan');
		$this->loadmodel('plan_item_category');
		if(isset($this->request->data["add_room_plan"]))
		{
			
			if(sizeof($this->request->data['plan_combo'])>0)
                {
                    $all_service_value = implode(",",$this->request->data['plan_combo']);
                }
                else
                {
                    $all_service_value ='';
                }
			
			
			$plan_name=$this->request->data["plan_name"];
				$this->loadmodel('master_room_plan');
				@$rpl=$this->master_room_plan->find('all', array('fields' => array('plan_name'),'conditions'=>array('flag' => 0, 'plan_name' =>$plan_name)));
				@$rpln=$rpl[0]['master_room_plan']['plan_name'];
				 if($plan_name==$rpln)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
		$this->master_room_plan->saveAll(array('plan_name' => $this->request->data["plan_name"],
		'description_plan' => @$this->request->data["description_plan"],
		'plan_combo' => @(int)$all_service_value));
		$this->redirect(array('action' => 'roomplan'));
				}
        // echo '<META HTTP-EQUIV="Refresh" Content="0; URL=roomplan?active=1">';
		}
			else if(isset($this->request->data["edit_master_room_plan"]))
			{
				
				if(sizeof($this->request->data['edit_plan_combo'])>0)
                {
                    @$all_service_valuee = implode(",",$this->request->data['edit_plan_combo']);
                }
                else
                {
                    @$all_service_valuee ='';
                }
				

			$edit_plan_name=$this->request->data["edit_plan_name"];
			$edit_plan_combo=$this->request->data["edit_plan_combo"];
			$edit_description_plan=$this->request->data["edit_description_plan"];
			$this->master_room_plan->updateAll(array('plan_name' => "'$edit_plan_name'", 'plan_combo' => "'$all_service_valuee'", 'description_plan' => "'$edit_description_plan'"), array('id' => $this->request->data["roomplan_id"]));
			$this->set('active',2);
			}
				else if(isset($this->request->data["delete_master_room_plan"]))
				{
				$this->master_room_plan->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_roomplan_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
				}

                $this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions' => array('flag' => "0"))));
				$this->set('fetch_plan_item_category', $this->plan_item_category->find('all', array('conditions' => array('flag' => "0"))));
			}
	
/*		
public function masterroom()
	    {
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}		$this->loadmodel('master_room');
		$this->loadmodel('master_room_type');	
	    if($this->request->is('post'))
		{
			
			
			if(isset($this->request->data["add_master_room"]))
			{

						$this->master_room->saveAll(array('no_of_rooms' => $this->request->data["no_of_rooms"],
				'master_room_type_id' => $this->request->data["master_room_type_id"],		
				'tariff_rate' => $this->request->data["tariff_rate"],
				'extra_bed' => $this->request->data["extra_bed"],
				'luxury_tax' => $this->request->data["luxury_tax"]));
				
			}
			
			
		  else if(isset($this->request->data["edit_master_room"]))
			    {
				$edit_no_of_rooms=$this->request->data["edit_no_of_rooms"];

				$edit_tariff_rate=$this->request->data["edit_tariff_rate"];
				$edit_extra_bed=$this->request->data["edit_extra_bed"];
				$edit_luxury_tax=$this->request->data["edit_luxury_tax"];
				
				$this->master_room->updateAll(array('no_of_rooms' => "'$edit_no_of_rooms'", 
				'master_room_type_id' => "'$edit_master_room_type_id'", 'tariff_rate' => "'$edit_tariff_rate'", 'extra_bed' => "'$edit_extra_bed'",
				'luxury_tax' => "'$edit_luxury_tax'", ), array('id' => $this->request->data["editoption"]));
			    }
				
				else if(isset($this->request->data["delete_master_room"]))
			{
				$this->master_room->delete(array('id' => $this->request->data["deleteoption"]));
				
			}
			

			
			
		}
			
		$this->set('fetch_master_room_type', $this->master_room_type->find('all'));
		$this->set('fetch_master_room', $this->master_room->find('all'));
}	
	*/
	public function masterservice()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_service');
		$this->loadmodel('ledger_master');
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_service_name"]))
			{
				$service_name=$this->request->data["service_name"];
                $this->loadmodel('master_service');
				@$stype=$this->master_service->find('all', array('fields' => array('service_name'),'conditions'=>array('flag' => 0, 'service_name' =>$service_name)));
				@$stp=$stype[0]['master_service']['service_name'];
				 
				 if($service_name==$stp)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				 {
				$this->master_service->saveAll(array('service_name' => $service_name));
				@$last_record_id=$this->master_service->getLastInsertID();
				$this->ledger_master->saveAll(array('ledger_category_id'=>'8','name' => $service_name, 'name_id' => $last_record_id));
			    $this->set('active',1);
				 }
			}
			else if(isset($this->request->data["edit_master_service"]))
			{
				$edit_service_name=$this->request->data["edit_service_name"];
				$edit_tax_applicable_id=$this->request->data["edit_tax_applicable_id"];
				$this->master_service->updateAll(array('service_name' => "'$edit_service_name'"), array('id' => $this->request->data["editoption_service_name"]));
				
				
				$this->loadmodel('ledger_master');
				@$fetch_master_service_ledger=$this->ledger_master->find('all', array('conditions' => array('name_id' => $this->request->data["editoption_service_name"], 'ledger_category_id'=>8)));
				$ledger_mms_id=$fetch_master_service_ledger[0]['ledger_master']['id'];
				$this->ledger_master->updateAll(array('name' => "'$edit_service_name'"), array('id' => $ledger_mms_id));
				$this->set('active',2);
			}
			else if(isset($this->request->data["delete_master_service"]))
			{
				$this->master_service->updateAll(array('flag' => 1 ),array('id' => $this->request->data["deleteoption_service_name"]));
				$this->set('active',2);
                $this->set('active_delete',1);;
			}
}
                  $this->set('fetch_master_service', $this->master_service->find('all', array('conditions' => array('flag' => "0"))));
		         // $this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
	}
/////////////////////////////////////
	public function other_service()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		//$this->loadmodel('master_tax');
		$this->loadmodel('master_service');
		$this->loadmodel('other_service');
		$this->loadmodel('master_roomno');
		$this->loadmodel('room_checkin_checkout');
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_other_service"]))
			{
				$service_name_id=$this->request->data["service_name_id"];
				$house_amount=$this->request->data["house_amount"];
				$card_no=$this->request->data["card_no"];
				$master_roomno_id=$this->request->data["master_roomno_id"];
				$recpt_type=$this->request->data["recpt_type"];
				$narration=$this->request->data["narration"];
				$total=$this->request->data["total"];
				$cheque_date=$this->request->data["cheque_date"];
				$jj=$this->request->data["jj"];
				 if($house_amount>0)
				 {
					 $payment_id = 1;
				 }
				 else
				 {
					  $payment_id = 0;
				 }
				 
				
				$payment_mode=$this->request->data["recpt_type"];
				$house_due_zero=0;
				$other_due_amount=$total-$house_amount-$house_due_zero;
				
				$user_id=@(int)$this->data["user_id"];
				if($user_id==0 || $user_id=='')
				{
				$other_user_id='1';
				}else{
				$other_user_id=$user_id;
				}
				
                $this->other_service->saveAll(array('card_no' => $this->request->data["card_no"],
				'master_roomno_id' => $this->request->data["master_roomno_id"],
				'guest_name' => $this->request->data["jj"],
				'service_name_id' => $this->request->data["service_name_id"],
				'quantity' => $this->request->data["quantity"],
				'charge' => $this->request->data["charge"],
				'user_id'=>$other_user_id,
			  	'total' => $this->request->data["total"],
			    'given_amount' => $house_amount,
				'due_amount' => $other_due_amount,
				'payment_id' => $payment_id));
				
				$house_amount=$this->request->data["house_amount"];
				$total=$this->request->data["total"];
				
				if(empty($house_amount)){
					$h_a_t=0;
				}else{
				$h_a_t=$house_amount;	
				}
				
				$last_record_id=$this->other_service->getLastInsertID();																																
				$cheque_no=@(int)$this->data["cheque_no"];
				$cheque_date=date('Y-m-d', strtotime($this->data["cheque_date"]));
				$neft_no=@(int)$this->data["neft_no"];
				$credit_card_name=$this->data["credit_card_name"];
				$credit_card_no=@(int)$this->data["credit_card_no"];
				$bank_name=$this->data["bank_name"];
				$narration=$this->data["narration"];
				$date=date("Y-m-d");
				$current_time=date("h:i:s A");
				//$bill_no=$this->request->data["bill_no"];
				$card_no=$this->request->data["card_no"];
				$this->loadModel('other_service');
				$this->loadModel('ledger');
				$this->loadModel('ledger_master');
				$this->loadModel('ledger_cr_dr');
				$t_date=date('Y-m-d', strtotime($date));
				
				
				
			   
			    $fetch_transaction_id_other=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Invoice')));
                $t_id_b_o=$fetch_transaction_id_other+1;
				
				$fetch_ledger_master_service=$this->ledger_master->find('all', array('conditions'=>array('user_id'=>$service_name_id, 'ledger_category_id'=>'8')));
				$id_o_s=$fetch_ledger_master_service[0]['ledger_master']['id'];
				
				
				$this->ledger->saveAll(array('ledger_category_id'=>8,'user_id'=> $other_user_id,'transaction_type'=>'Invoice','transaction_id'=> $t_id_b_o,'receipt_type'=> 'Other Service','invoice_id' => $last_record_id, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				    $last_ledger_id=$this->ledger->getLastInsertID(); 
				//
				$house_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$other_user_id)));
				$l_id=$house_m_ledger[0]['ledger_master']['id'];
				//
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $l_id,'dr' => $total));
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> $id_o_s,'cr' => $total));
			
			
			 $fetch_transaction_id_house=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Receipt')));
             $t_id=$fetch_transaction_id_house+1;
              if($house_amount>0)
			  {
				  $this->ledger->saveAll(array('ledger_category_id'=>8,'user_id'=> $other_user_id,'transaction_id'=> $t_id,'transaction_type'=> 'Receipt','receipt_type'=> 'Other Service','invoice_id' => $last_record_id, 'receipt_mode' => $payment_mode, 'transaction_date' => $t_date,'cheque_no'=>$cheque_no,'neft_no'=>$neft_no, 'cheque_date'=>$cheque_date,'bank_name'=>$bank_name,'neft_no'=>$neft_no,'credit_card_name'=>$credit_card_name,'credit_card_no'=>$credit_card_no,'narration'=>$narration,'date'=>$date,'status'=>0));
				 $last_ledger_id=$this->ledger->getLastInsertID();
				  // 
				$kot_m_ledger=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id' =>'1','user_id' =>$other_user_id)));
				$l_id=$kot_m_ledger[0]['ledger_master']['id'];
				//
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=>$l_id,'cr' => $house_amount));
				  
				if($payment_mode=='Cash')
				{
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '35','dr' => $house_amount));
				}else
				{
				  $this->ledger_cr_dr->saveAll(array('ledger_id'=>$last_ledger_id,'ledger_master_id'=> '37','dr' => $house_amount));
			    }
			  }
				
				
				
			$this->set('active',1);
			
			}
			else if(isset($this->request->data["edit_other_service"]))
			{
				$edit_card_no = $this->request->data["edit_card_no"];
				$edit_master_roomno_id = $this->request->data["edit_master_roomno_id"];
				$edit_service_name_id = $this->request->data["edit_service_name_id"];
				$edit_quantity = $this->request->data["edit_quantity"];
				$edit_charge = $this->request->data["edit_charge"];
				$edit_total = $this->request->data["edit_total"];
				$this->other_service->updateAll(array('card_no' => "'$edit_card_no'",
				'master_roomno_id' => "'$edit_master_roomno_id'",
				'service_name_id' => "'$edit_service_name_id'",
				'quantity' => "'$edit_quantity'",
				'charge' => "'$edit_charge'",
				'total' => "'$edit_total'"
				), array('id' => $this->request->data["editoption_service_name"]));
				$this->set('active',2);
			}
			else if(isset($this->request->data["delete_other_service"]))
			{
				$this->other_service->updateAll(array('flag' => 1 ),array('id' => $this->request->data["deleteoption_service_name"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			}
}
					$this->set('fetch_master_service', $this->master_service->find('all', array('conditions' => array('flag' => "0"))));
					$this->set('fetch_other_service', $this->other_service->find('all', array('conditions' => array('flag' => "0"))));
					$this->set('fetch_room_checkin_checkout', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'), 'group'=>'card_no')));
					$this->set('fetch_room_checkin_checkouut', $this->room_checkin_checkout->find('all', array('conditions'=>array('status' => 0, 'flag' => '0'))));
					$this->set('fetch_master_roomno', $this->master_roomno->find('all', array('conditions' => array('flag' => "0"))));
					// $this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
					$this->loadmodel('company_registration');
					$this->set('fetch_company_registration', $this->company_registration->find('all' ,array('conditions'=>array('flag' => 0 ))));
	}
	////////////////////////////////////////
		
	public function mastertable()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_table');
		$this->loadmodel('master_outlet');
		
				$fetch_master_table=$this->master_table->find('all', array('conditions' => array('flag' => "0")));	
	    if($this->request->is('post'))
		{
		if(isset($this->request->data["add_master_table"]))
			{
				$table_no_from=$this->request->data["table_no_from"];
				$table_no_to=$this->request->data["table_no_to"];
				
				foreach($fetch_master_table  as $dataa)
					{ 
					@$table_no_ftc[]=$dataa['master_table']['table_no'];}

						 for($i=$table_no_from; $i<=$table_no_to; $i++)
								{
								$table_no_array=$i;
								$wrong=0;
								if(in_array($table_no_array, $table_no_ftc))
								{
									$this->set('active',1);
               						$this->set('wrong',1);	
								}
								else 
								{					
									$this->master_table->saveAll(array('master_outlet_id' => $this->request->data["master_outlet_id"],
									'table_capacity' => $this->request->data["table_capacity"],
									'table_no' => $table_no_array));
									echo '<META HTTP-EQUIV="Refresh" Content="0; URL=mastertable?active=1">';
								}
				}
			}
			
			else if(isset($this->request->data["delete_master_table"]))
				{
					$this->master_table->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_mastertable_id"])); 
				$this->set('active',2);
				$this->set('active_delete',1);
			}
		}
				$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_table', $this->master_table->find('all', array('conditions' => array('flag' => "0"))));
}		
/////////////////////////////////////
	public function category_outlet_mapping()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_item_category');
		$this->loadmodel('master_outlet');
		$this->loadmodel('category_outlet_mapping');	
	    if($this->request->is('post'))
		{
			if(isset($this->request->data["add_mapping"]))
			{
				$mapss=$this->request->data["master_itemcategory_id"];
				$mapp=implode(',', $mapss);
				$this->category_outlet_mapping->saveAll(array('master_outlet_id' => $this->request->data["master_outlet_id"],
				'master_itemcategory_id' => $mapp));
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=category_outlet_mapping?active=1">';
			}
			else if(isset($this->request->data["edit_mapping"]))
			{
				$mapss=$this->request->data["edit_master_itemcategory_id"];
				$mapp=implode(',', $mapss);
				
				$edit_master_itemcategory_id=$this->request->data["edit_master_itemcategory_id"];
				$edit_master_outlet_id=$this->request->data["edit_master_outlet_id"];
				$this->category_outlet_mapping->updateAll(array('master_itemcategory_id' => "'$mapp'", 'master_outlet_id' => "'$edit_master_outlet_id'"), array('id' => $this->request->data["editoption_mapping"]));
				$this->set('active',2);
			}

			else if(isset($this->request->data["delete_mapping"]))
				{
					$this->category_outlet_mapping->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_mapping_id"])); 
				$this->set('active',2);
				$this->set('active_delete',1);	
			}
		}
				$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_item_category', $this->master_item_category->find('all', array('conditions' => array('flag' => "0"))));
				$this->set('fetch_category_outlet_mapping', $this->category_outlet_mapping->find('all', array('conditions' => array('flag' => "0"))));
}
/////////////////////////////////////////////////////////////////
public function mastertax()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_tax');
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_master_tax_name"]))
			{
				$this->master_tax->saveAll(array('name' => $this->request->data["name"], 'tax_applicable' => $this->request->data["tax_applicable"]));
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=mastertax?active=1">';
			}
			else if(isset($this->request->data["edit_master_tax"]))
			{
				$edit_name=$this->request->data["edit_name"];
				$edit_tax_app=$this->request->data["edit_tax_app"];
				$this->master_tax->updateAll(array('name' => "'$edit_name'", 'tax_applicable' => 
				"'$edit_tax_app'"), array('id' => $this->request->data["editoption_tax_name"]));
				$this->set('active',2);
				
			}
			else if(isset($this->request->data["delete_tax_name"]))
			{
				$this->master_tax->updateAll(array('flag' => 1 ),array('id' => $this->request->data["deleteoption_tax_name"]));
             $this->set('active',2);
             $this->set('active_delete',1);
				
				
			}
}

				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions' => array('flag' => "0"))) );

	}
	
	////////////////////////////////
	public function itemtype()
		{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
			
		$this->loadmodel('master_item_type');
		$this->loadmodel('master_tax');
		$this->loadmodel('master_item_categorie');
		
		if(isset($this->request->data["add_itemtype"]))
			{
				$tax_multi=$this->request->data["master_tax_id"];
				$master_tax_id=implode(',', $tax_multi);
				
				$itemtype_name=$this->request->data["itemtype_name"];
				$this->loadmodel('master_item_type');
				@$itmtype=$this->master_item_type->find('all', array('fields' => array('itemtype_name'),'conditions'=>array('flag' => 0, 'itemtype_name' =>$itemtype_name)));
				$itmm=$itmtype[0]['master_item_type']['itemtype_name'];
				
				 
				 if($itemtype_name==$itmm)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
					
				$this->master_item_type->saveAll(array('itemtype_name' => $itemtype_name,'master_itemcategory_id' => $this->request->data["master_itemcategory_id"], 'master_tax_id' => $master_tax_id));
				//$this->set('active',2);
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=itemtype">';
				$this->redirect(array('action' => 'itemtype'));
				}
			}
			else if(isset($this->request->data["edit_master_item_type"]))
			{	
				$edit_master_itemcategory_id=$this->request->data["edit_master_itemcategory_id"];
				$edit_itemtype=$this->request->data["edit_itemtype"];
				$edit_item_tex=$this->request->data["edit_item_tex"];
				$edit_item_tex=implode(',', $edit_item_tex);
				$this->master_item_type->updateAll(array('itemtype_name' => "'$edit_itemtype'", 'master_tax_id' => 
				"'$edit_item_tex'", 'master_itemcategory_id' =>"'$edit_master_itemcategory_id'"), array('id' => $this->request->data["masteritemtype_id"]));
				$this->set('active',2);
				
			}
			else if(isset($this->request->data["delete_master_item_type"]))
			{
				$this->master_item_type->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_itemtype_id"]));
             $this->set('active',2);
             $this->set('active_delete',1);
			}
			
				$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				
	}
	
	/////////////////////////////////Plan Category//////////////
	public function plan_item_category()
		{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('plan_item_category');
		if(isset($this->request->data["add_session"]))
			{
				$item_category=$this->request->data["item_category"];
				$this->loadmodel('plan_item_category');
				@$itmtypec=$this->plan_item_category->find('all', array('fields' => array('item_category'),'conditions'=>array('flag' => 0, 'item_category' =>$item_category)));
				$itmmcc=$itmtypec[0]['plan_item_category']['item_category'];
				 
				 if($item_category==$itmmcc)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->plan_item_category->saveAll(array('item_category' => $item_category));
				$this->redirect(array('action' => 'plan_item_category'));
				}
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=plan_item_category?active=1">';

			}
			else if(isset($this->request->data["edit_session"]))
			{	
				$edit_item_category=$this->request->data["edit_item_category"];
				$this->plan_item_category->updateAll(array('item_category' => "'$edit_item_category'"), array('id' => $this->request->data["edit_session_id"]));
				$this->set('active',2);
				
			}
			else if(isset($this->request->data["delete_session"]))
			{
				$this->plan_item_category->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_session_id"]));
             $this->set('active',2);
             $this->set('active_delete',1);
			}
			
				$this->set('fetch_plan_item_category', $this->plan_item_category->find('all', array('conditions' => array('flag' => "0"))) );				
	}
	
	/////////////////////////////////Menu Category//////////////
	public function menu_category()
		{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('menu_category');
		if(isset($this->request->data["add_menu_cat"]))
			{
				$menu_category_id=$this->request->data["menu_category_id"];
				$rate=$this->request->data["rate"];
				$this->loadmodel('menu_category');
				@$menuc=$this->menu_category->find('all', array('fields' => array('menu_category_id'),'conditions'=>array('flag' => 0, 'menu_category_id' =>$menu_category_id)));
				@$menucc=$menuc[0]['menu_category']['menu_category_id'];
				 
				 if($menu_category_id==$menucc)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->menu_category->saveAll(array('menu_category_id' => $menu_category_id, 'rate' => $rate));
				$this->redirect(array('action' => 'menu_category'));
				}
				//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=plan_item_category?active=1">';

			}
			else if(isset($this->request->data["edit_menu_cat"]))
			{	
				$edit_menu_category_id=$this->request->data["edit_menu_category_id"];
				$edit_rate=$this->request->data["edit_rate"];
				$this->menu_category->updateAll(array('menu_category_id' => "'$edit_menu_category_id'", 'rate' => "'$edit_rate'"), array('id' => $this->request->data["edit_menu_cat_id"]));
				$this->set('active',2);
				
			}
			else if(isset($this->request->data["delete_menu_cat"]))
			{
				$this->menu_category->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_menu_cat_id"]));
             $this->set('active',2);
             $this->set('active_delete',1);
			}
			
				$this->set('fetch_menu_category', $this->menu_category->find('all', array('conditions' => array('flag' => "0"))) );				
	}
	
	
	///////////////////////////////
	public function plan_item()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('plan_item');
		$this->loadmodel('master_item');
		$this->loadmodel('plan_item_category');
		
	    if($this->request->is('post'))
		{			
		
			if(isset($this->request->data["add_master_item"]))
			{
				
				@$att_id=$this->request->data["item_name"];
                @$multiple_att_id= implode(",",$att_id);
				$this->plan_item->saveAll(array(
				'item_name' => @(string)$multiple_att_id,
				'master_itemcategory_id' => $this->request->data["master_itemcategory_id"],
				'item_cost' => $this->request->data["item_cost"]));
				
			}
			
			else if(isset($this->request->data["edit_master_item"]))
			{
				@$att_id=$this->request->data["edit_item_name"];
				@$multiple_att_id= implode(",",$att_id);
				
				$edit_master_itemcategory_id=$this->request->data["edit_master_itemcategory_id"];
				$edit_item_name=@$this->request->data["edit_item_name"];
				$edit_item_cost=$this->request->data["edit_item_cost"];
				
				
				$this->plan_item->updateAll(array('master_itemcategory_id' => "'$edit_master_itemcategory_id'",'item_name' => "'$multiple_att_id'",'item_cost' => "'$edit_item_cost'"), array('id' => $this->request->data["masteritem_id"]));
				 $this->set('active',2);
			}
				
			else if(isset($this->request->data["delete_master_item"]))
			{
				$this->plan_item->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_masteritem_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);

			}
			
		}
				
		$this->set('fetch_plan_item_category', $this->plan_item_category->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_plan_item', $this->plan_item->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_master_item', $this->master_item->find('all', array('conditions' => array('flag' => "0"))) );
		
	}
	//////////////////////////////////////

	public function masteroutlet()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_outlet');
		$this->loadmodel('master_service');
		$this->loadmodel('master_tax');	
	    if($this->request->is('post'))
		{
			
			if(isset($this->request->data["add_master_outlet"]))
			{
				
				$outlet_name=$this->request->data["outlet_name"];
				$this->loadmodel('master_outlet');
				@$itmnm=$this->master_outlet->find('all', array('fields' => array('outlet_name'),'conditions'=>array('flag' => 0, 'outlet_name' =>$outlet_name)));
				$itmmn=$itmnm[0]['master_outlet']['outlet_name'];
				 if($outlet_name==$itmmn)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$tax_multi=$this->request->data["master_tax_id"];
				    $master_tax_id=implode(',', $tax_multi);
                $this->master_outlet->saveAll(array('outlet_name' => $this->request->data["outlet_name"],
				'rate' => $this->request->data["rate"],
				'master_tax_id' => $master_tax_id));
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=masteroutlet?active=1">';
			}
				
			}
			else if(isset($this->request->data["edit_master_outlet"]))
			{
				$edit_outlet_name=$this->request->data["edit_outlet_name"];
				$edit_item_tex=$this->request->data["edit_item_tex"];
				$edit_rate=$this->request->data["edit_rate"];
				$edit_item_tex=implode(',', $edit_item_tex);
				
				
				$this->master_outlet->updateAll(array( 
				'outlet_name' => "'$edit_outlet_name'", 'rate' => "'$edit_rate'", 'master_tax_id' => "'$edit_item_tex'"),
				array('id' => $this->request->data["masteroutlet_id"]));
				$this->set('active',2);
				
			}
			else if(isset($this->request->data["delete_master_outlet"]))
			{
				$this->master_outlet->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_masteroutlet_id"])); 
				$this->set('active',2);
				$this->set('active_delete',1);
			}
		}
				$this->set('fetch_master_service', $this->master_service->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions' => array('flag' => "0"))) );
	}
	public function masteritem()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('master_item');
		$this->loadmodel('master_item_type');
		$this->loadmodel('master_item_categorie');
		 $this->loadmodel('gr_no');
	    if($this->request->is('post'))
		{			
			if(isset($this->request->data["add_master_item"]))
			{
				$item_name=$this->request->data["item_name"];
				$this->loadmodel('master_item');
				@$itmnm=$this->master_item->find('all', array('fields' => array('item_name'),'conditions'=>array('flag' => 0, 'item_name' =>$item_name)));
				$itmmn=$itmnm[0]['master_item']['item_name'];
				 if($item_name==$itmmn)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
                $this->master_item->saveAll(array('item_name' => @$item_name,
				'item_code' => $this->request->data["item_code"],
				'master_itemcategory_id' => $this->request->data["master_itemcategory_id"],
				'master_item_type_id' => $this->request->data["master_item_type_id"],
				'billing_rate' => $this->request->data["billing_rate"],
                'billing_room_rate' => $this->request->data["billing_room_rate"], 
				'item_cost' => $this->request->data["item_cost"],
                'status' => $this->request->data["status"],
				'ledger_category' => $this->request->data["ledger_category"]));
				$this->gr_no->updateAll(array('item_code' =>$this->request->data["item_code"]+1), array('id' => 1));
				$this->redirect(array('action' => 'masteritem'));
			    //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=masteritem?active=1">';
				}
			}
			else if(isset($this->request->data["edit_master_item"]))
			{
			$edit_master_itemcategory_id=$this->request->data["edit_master_itemcategory_id"];
			$edit_item_code=$this->request->data["edit_item_code"];
			$edit_master_item_type_id=$this->request->data["edit_master_item_type_id"];
			$edit_item_name=$this->request->data["edit_item_name"];
			$edit_billing_rate=$this->request->data["edit_billing_rate"];
			$edit_billing_room_rate=$this->request->data["edit_billing_room_rate"];
			$edit_item_cost=$this->request->data["edit_item_cost"];
			$edit_status=$this->request->data["edit_status"];
			$edit_ledger_category=$this->request->data["edit_ledger_category"];
				
				$this->master_item->updateAll(array('master_itemcategory_id' => "'$edit_master_itemcategory_id'",
				'master_item_type_id' => "'$edit_master_item_type_id'", 'item_name' => "'$edit_item_name'", 'billing_rate' => "'$edit_billing_rate'",
				'billing_room_rate' => "'$edit_billing_room_rate'",
				'item_cost' => "'$edit_item_cost'",
				'item_code' => "'$edit_item_code'",
				 'status' => "'$edit_status'",'ledger_category' => "'$edit_ledger_category'"), array('id' => $this->request->data["masteritem_id"]));
				 $this->set('active',2);
			}
			else if(isset($this->request->data["delete_master_item"]))
			{
				$this->master_item->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_masteritem_id"]));
				$this->set('active',2);
				$this->set('active_delete',1);
			}
		}
				
		$this->set('fetch_master_item_category', $this->master_item_categorie->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_master_item', $this->master_item->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions'=>array('flag' => "0"))));
		$this->loadmodel('master_tax');
		$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));
		$this->loadmodel('ledger_master');
		
		$conditions121 =array('or' => array(
    array("ledger_category_id" => 4),
      array("ledger_category_id" => 13)
    ));
		$this->set('fetch_ledger_master', $this->ledger_master->find('all', array('conditions'=>$conditions121)));
		$this->set('fetch_gr_no', $this->gr_no->find('all'));
	}
	
	
	
	public function mastercurrency()
	{
	  if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('master_currency');
	    if($this->request->is('post'))
		{			
			if(isset($this->request->data["add_master_currency"]))
			{
                $this->master_currency->saveAll(array('currency_name' => $this->request->data["currency_name"],
				'exchange_rate' => $this->request->data["exchange_rate"]));
                 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=mastercurrency?active=1">';

				
			}
			else if(isset($this->request->data["edit_master_currency"]))
			{
				$edit_currency=$this->request->data["edit_currency"];
				$edit_rate=$this->request->data["edit_rate"];
				$this->master_currency->updateAll(array('currency_name' => "'$edit_currency'", 'exchange_rate' => 
				"'$edit_rate'"), array('id' => $this->request->data["mastercur_id"]));
                $this->set('active',2);
				}
		
				else if(isset($this->request->data["delete_master_currency"]))
				{
				$this->master_currency->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_mastercur_id"]));
 				$this->set('active',2);
                $this->set('active_delete',1);
				}
		}
		
		$this->set('fetch_master_currency', $this->master_currency->find('all', array('conditions' => array('flag' => "0"))) );
		
	}
	
public function companydiscount()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
	    $this->loadmodel('company_discount');
		$this->loadmodel('company_category');
		$this->loadmodel('master_room_type');
		$this->loadmodel('company_registration');
		$this->loadmodel('master_item_categorie');
		
	    if($this->request->is('post'))
		{			
			if(isset($this->request->data["add_company_discount"]))
			{
				@$item_name=$this->request->data["item_type_id"];
				@$item_name=implode(',',$item_name);
				
				
 				$this->company_discount->saveAll(array(//'company_category_id' => @$this->request->data["company_category_id"],
				'company_name_id' => @$this->request->data["company_name_id"],
				'room_type_id' => $this->request->data["room_type_id"],
				//'item_type_id' => $item_name,		
				'discount' => $this->request->data["discount"]));
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=companydiscount?active=1">';
			}
			else if(isset($this->request->data["edit_company_discount"]))
			{
				//$edit_item_type_id=$this->request->data["edit_item_type_id"];
				//$edit_item_type_id=implode(',',$edit_item_type_id);
				//@(string)$edit_company_category_id=$this->request->data["edit_company_category_id"];
				@(string)$edit_company_name_id=$this->request->data["edit_company_name_id"];
				$edit_room_type_id=$this->request->data["edit_room_type_id"];
				$edit_discount=$this->request->data["edit_discount"];
				
				
				
				$this->company_discount->updateAll(array(//'company_category_id' => "'$edit_company_category_id'",
				'company_name_id' => "'$edit_company_name_id'",
				'room_type_id' => "'$edit_room_type_id'",
				//'item_type_id' => "'$edit_item_type_id'", 
				'discount' => "'$edit_discount'"), array('id' => $this->request->data["companydiscount_id"]));
				
				$this->set('active',2);
				
			}
			
			else if(isset($this->request->data["delete_company_discount"]))
			{
				$this->company_discount->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_c_discount"]));
				$this->set('active',2);
				$this->set('active_delete',1);
			}

		}
		
				$this->set('fetch_company_discount', $this->company_discount->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array('flag' => "0"))));	
				$this->set('fetch_master_item_type', $this->master_item_categorie->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				
	}

	//company Registration
	public function companyregistration()
	{
		$date=date("Y-m-d"); 
		$cutrrent_time=date("h:i:s A");
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('company_registration');
		$this->loadmodel('company_category');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('ledger_master');
	    if($this->request->is('post'))
		{			
			if(isset($this->request->data["add_company_registration"]))
			{
				$company_name=$this->request->data["company_name"];
				$this->loadmodel('company_registration');
				@$cmn=$this->company_registration->find('all', array('fields' => array('company_name'),'conditions'=>array('flag' => 0, 'company_name' =>$company_name)));
				$cnmp=$cmn[0]['company_registration']['company_name'];
				 if($company_name==$cnmp)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
                $this->company_registration->saveAll(array('company_name' => $company_name,
				'company_category_id' => @(string)$this->request->data["company_category_id"],
				'pan_no' => $this->request->data["pan_no"],
				'service_tax_no' => $this->request->data["service_tax_no"],
				'authorized_person_name' => $this->request->data["authorized_person_name"],
				'authorized_contact_no' => $this->request->data["authorized_contact_no"],
				'mobile_no' => $this->request->data["mobile_no"],
                'authorized_email_id' => $this->request->data["authorized_email_id"], 
				'c_address' => $this->request->data["c_address"],
				'master_plan_id' => @(string)$this->request->data["master_plan_id"],
				'p_address' => $this->request->data["p_address"],'date' => $date,'time' => $cutrrent_time));
				$success=$this->smtpmailer($this->request->data["authorized_email_id"],'Dreamshapers','Enquiry', "hello" ,$this->request->data["authorized_email_id"]);
				
				$sms=str_replace(' ', '+', 'Thank you for choosing us for your stay.');
				
				$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'send_sms',$sms,$this->request->data["mobile_no"]), array());
				
				$last_record_id=$this->company_registration->getLastInsertID();
				$this->ledger_master->saveAll(array('ledger_category_id' => '1','name' => $company_name, 'name_id'=>$last_record_id));
				$this->redirect(array('action' => 'company_tariff'));
				}
			}
			
			if(isset($this->request->data["add_company_category"]))
			{$this->loadmodel('company_category');
                $this->company_category->saveAll(array(
				'category_name' => @$this->request->data["category_name"]));
			}
			else if(isset($this->request->data["edit_company_registration"]))
			{
				$edit_company_name=$this->request->data["edit_company_name"];
				@$edit_company_category_id=$this->request->data["edit_company_category_id"];
				$edit_pan_no=$this->request->data["edit_pan_no"];
				$edit_service_tax_no=$this->request->data["edit_service_tax_no"];
		        $edit_authorized_person_name=$this->request->data["edit_authorized_person_name"];
				
                $edit_authorized_contact_no=$this->request->data["edit_authorized_contact_no"];
				$edit_mobile_no=$this->request->data["edit_mobile_no"];
				$edit_authorized_email_id=$this->request->data["edit_authorized_email_id"];
				$edit_c_address=$this->request->data["edit_c_address"];
				@$edit_master_plan_idd=$this->request->data["edit_master_plan_id"];
				$edit_p_address=$this->request->data["edit_p_address"];

				$this->company_registration->updateAll(array('company_name' => "'$edit_company_name'",
				 'pan_no' => "'$edit_pan_no'",
				 'company_category_id' => "'$edit_company_category_id'",
				 'service_tax_no' => "'$edit_service_tax_no'",
				 'authorized_person_name' => "'$edit_authorized_person_name'",
				'authorized_contact_no' => "'$edit_authorized_contact_no'",
				'mobile_no' => "'$edit_mobile_no'", 'authorized_email_id' => "'$edit_authorized_email_id'", 'c_address' => "'$edit_c_address'",
				'master_plan_id' => "'$edit_master_plan_idd'", 'p_address' => "'$edit_p_address'",), array('id' => $this->request->data["c_registration_id"]));
				
				
				$this->loadmodel('ledger_master');
				@$fetch_company_registration_ledger=$this->ledger_master->find('all', array('conditions' => array('name_id' => $this->request->data["c_registration_id"], 'ledger_category_id'=>1)));
				$ledger_m_id=$fetch_company_registration_ledger[0]['ledger_master']['id'];
				
				$this->ledger_master->updateAll(array('name' => "'$edit_company_name'"), array('id' => $ledger_m_id));
			    $this->set('active',2);
			}
			else if(isset($this->request->data["delete_company_registration"]))
			{
				$this->company_registration->updateAll(array('flag' => 1 ),array('id' => $this->request->data["delete_c_registration"]));
				//$this->ledger_master->updateAll(array('id' => $this->request->data["delete_c_registration"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			}
	}
			$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
				
	}
/////////////////////////////
	public function company_tariff()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('fo_room_booking');
		$this->loadmodel('company_registration');
		$this->loadmodel('company_category');
		$this->loadmodel('master_room_type');
		$this->loadmodel('master_room_plan');
		$this->loadmodel('master_tax');
		
	    if($this->request->is('post'))
		{			
		if(isset($this->request->data["add_fo_room_booking"]))
			{
				
				$company_id=$this->request->data["company_id"];
				$this->loadmodel('fo_room_booking');
				@$foroom=$this->fo_room_booking->find('all', array('fields' => array('company_id'),'conditions'=>array('flag' => 0, 'company_id' =>$company_id)));
				@$fr1=$foroom[0]['fo_room_booking']['company_id'];
				
				 if($company_id==$fr1)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				@$tax_multi=$this->request->data["master_tax_id"];
				@$master_tax_id=implode(',', $tax_multi);
				@$rtype_id1=$this->request->data["master_room_type_id"];
				@$rtype_id4=$this->request->data["special_rate"];
				
			$x=0;
			$z=0;
			//$last_record_id=$this->fo_room_booking->getLastInsertID();
				for($i=0; $i<sizeof($rtype_id1); $i++)
				{
					$x=@$rtype_id1[$i];
					$z=@$rtype_id4[$i]; 
					$this->fo_room_booking->saveAll(array( 			
					'master_room_type_id' => @(int)$x,
					'special_rate' => @(int)$z,
					'company_id' => @$this->request->data["company_id"],
				'master_room_plan_id' => @$this->request->data["master_room_plan_id"],
				'date_from' => date('Y-m-d', strtotime($this->request->data["date_from"])),
                'date_to' => date('Y-m-d', strtotime($this->request->data["date_to"])), 
				'discount' => @$this->request->data["discount"],
				'master_tax_id' => @$master_tax_id,
				'food_discount' => @$this->request->data["food_discount"],
				'remarks' => @$this->request->data["remarks"]));
				//$this->redirect(array('action' => 'company_tariff'));
				}
				
			}
			//exit;
			}
			
            else if(isset($this->request->data["delete_company_tariff"]))
			{
				$this->fo_room_booking->updateAll(array('flag' => 1 ),array('company_id' => $this->request->data["delete_ct_id"]));
			
				$this->set('active',2);
				$this->set('active_delete',1);
			}			
	}
				$this->set('fetch_company_registration', $this->company_registration->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_company_category', $this->company_category->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_type', $this->master_room_type->find('all', array('conditions'=>array('flag' => "0"))));
				$this->set('fetch_master_room_plan', $this->master_room_plan->find('all', array('conditions'=>array('flag' => "0"))));
			    $this->set('fetch_fo_room_booking',$this->fo_room_booking->find('all', array('conditions' => array('flag' => "0"))) );
				$this->set('fetch_master_tax', $this->master_tax->find('all', array('conditions'=>array('flag' => "0"))));

				

				
	}
	
	
			//outlet item mapping
public function outletitemmapping()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadmodel('outlet_item_mapping');
		$this->loadmodel('master_outlet');
		$this->loadmodel('master_item_type');
		$this->loadmodel('master_item');
	    if($this->request->is('post'))
		{			
		
		
		
		if(isset($this->request->data["add_outlet_item_mapping"]))
			{
                $this->outlet_item_mapping->saveAll(array('master_outlet_id' => $this->request->data["master_outlet_id"],
				'master_item_type_id' => $this->request->data["master_item_type_id"],
				'master_item_id' => $this->request->data["master_item_id"],
                'billing_rate' => $this->request->data["billing_rate"], 
                'billing_room_rate' => $this->request->data["billing_room_rate"],
				'urgent_rate' => $this->request->data["urgent_rate"]));
				
			}
 }
				$this->set('fetch_outlet_item_mapping', $this->outlet_item_mapping->find('all'));
				$this->set('fetch_master_outlet', $this->master_outlet->find('all', array('conditions'=>array('flag'=>0))));
				$this->set('fetch_master_item_type', $this->master_item_type->find('all', array('conditions'=>array('flag'=>0))));
			    $this->set('fetch_master_item',$this->master_item->find('all', array('conditions'=>array('flag'=>0))));
	}
////////////////////////////////////////////////
public function categoryname()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('company_category');
		
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_category_name"]))
			{
				
				$category_name=$this->request->data["category_name"];
				$this->loadmodel('company_category');
				@$cat=$this->company_category->find('all', array('fields' => array('category_name'),'conditions'=>array('flag' => 0, 'category_name' =>$category_name)));
				$catn=$cat[0]['company_category']['category_name'];
				 if($category_name==$catn)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->company_category->saveAll(array('category_name' => $category_name));
                $this->redirect(array('action' => 'categoryname'));
				}
			}
			else if(isset($this->request->data["edit_category_name"]))
			{
				$edit_category=$this->request->data["edit_category"];
				$this->company_category->updateAll(array('category_name' => "'$edit_category'"), array('id' => $this->request->data["editoption_category"]));
				$this->set('active',2);
				
			}
			else if(isset($this->request->data["delete_category_name"]))
			{
				$this->company_category->updateAll(array('flag' => 1 ),array('id' => $this->request->data["deleteoption_category_name"]));
				$this->set('active',2);
                $this->set('active_delete',1);
			
		   }
		}
			$this->set('fetch_company_category', $this->company_category->find('all', array('conditions' => array('flag' => "0"))) );
	
	}
///////////////////////////////////////////////////////////////////..../////////////////////////////////////

public function card_amount()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('card_amount');
		$this->loadmodel('registration');
		
		
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_card_amount"]))
			{
				$registration_id=$this->request->data["registration_id"];
				$recharge_amount=$this->request->data["recharge_amount"];
				@$balance_amount=@(string)$this->request->data["balance_amount"];
				$date=date("Y-m-d");
				$time=date("h:i:s A");
				
				$conditions=array(array('registration_id' => $registration_id, 'flag' => 0), 'order'=>'id DESC','limit'=>1);
				$fetch_card_balance=$this->card_amount->find('all',array('conditions'=>array('registration_id' => $registration_id,'flag' => "0"), 'order'=>'id DESC','limit'=>1,'fields'=>array('balance_amount')));
				if(!empty($fetch_card_balance)){
				$ftc_balance=$fetch_card_balance[0]['card_amount']['balance_amount'];
				@$main_balance=$ftc_balance+$recharge_amount;
				}
				else
				{
					$main_balance=$recharge_amount;
				}
				$this->card_amount->saveAll(array('registration_id' => $registration_id,'recharge_amount' => $recharge_amount,
				'balance_amount' => $main_balance,'date' => $date,'time' => $time));
                $this->redirect(array('action' => 'card_amount'));
			}
		}
			$this->set('fetch_registration', $this->registration->find('all', array('conditions' => array('flag' => "0"))) );
			$this->set('fetch_card_amount', $this->card_amount->find('all', array('conditions' => array('flag' => "0"))) );
	}
///////////////////////////////////////////////////////////Accounting Module Rohit Ji///////////////////////////.....................fsf//////////////////////////////
////////////// Rohit ////////////
function group_category(){
	 if($this->RequestHandler->isAjax()){
			$this->layout='ajax_layout';
		}else{
			$this->layout='index_layout';
		}
	
	if($this->request->is('post')){
			if(isset($this->request->data["add_group_category"])){
				$name=$this->request->data["name"]; 
				$this->loadmodel('group_category');
				@$l_cat=$this->group_category->find('all', array('fields' => array('name'),'conditions'=>array('name' =>$name)));
				$l_catn=$l_cat[0]['group_category']['name'];
				 if($name==$l_catn){
					 $this->set('error','Data Already Exist');
				 }else{
						$this->group_category->saveAll(array('name' => $name));
						$this->redirect(array('action' => 'group_category'));
				}
			}
		}
		$this->loadmodel('group_category');
	   $this->set('fetch_group_category', $this->group_category->find('all'));
	
	
}



function group_master(){
	 if($this->RequestHandler->isAjax()){
			$this->layout='ajax_layout';
		}else{
			$this->layout='index_layout';
		}
	
	if($this->request->is('post')){
			if(isset($this->request->data["add_group_master"])){
				 $group_category_id=$this->request->data["group_category_id"]; 
				 $name=$this->request->data["name"]; 
				$this->loadmodel('group_master');
				@$l_cat=$this->group_master->find('all', array('fields' => array('name'),'conditions'=>array('name' =>$name,'group_category_id'=>$group_category_id)));
				$l_catn=$l_cat[0]['group_master']['name'];
				 if($name==$l_catn){
					 $this->set('error','Data Already Exist');
				 }else{
						$this->group_master->saveAll(array('name' => $name,'group_category_id'=>$group_category_id));
						$this->redirect(array('action' => 'group_master'));
				}
			}
			
			
		} 
		$this->loadmodel('group_category');
	    $this->set('fetch_group_category', $this->group_category->find('all'));
		
		$this->loadmodel('group_master');
	    $this->set('fetch_group_master', $this->group_master->find('all'));
	
}

function fetch_group_category_name_by_id($group_category_id){
	
	$this->loadmodel('group_category');
	$conditions=array('id'=>(int)$group_category_id);
	
	return $this->group_category->find('all',array('conditions'=>$conditions));
	
}

function fetch_group_master_name_by_id($group_master_id){
	
	$this->loadmodel('group_master');
	$conditions=array('id'=>(int)$group_master_id);
	
	return $this->group_master->find('all',array('conditions'=>$conditions));
	
	
}

function fetch_ledger_category_name_by_id($ledger_category_id){
	
	$this->loadmodel('ledger_category');
	$conditions=array('id'=>(int)$ledger_category_id);
	
	return $this->ledger_category->find('all',array('conditions'=>$conditions));
	
}

function fetch_ledger_master_id($id){
	
	$this->loadmodel('ledger_master');
	$conditions=array('id'=>(int)$id);
	
	return $this->ledger_master->find('all',array('conditions'=>$conditions));
	
}


function fetch_ledger_cr_dr_id($id, $ledger_m_id){
	
	$this->loadmodel('ledger_cr_dr');
	$conditions=array('ledger_id'=>(int)$id,'ledger_master_id'=>(int)$ledger_m_id);
	
	return $this->ledger_cr_dr->find('all',array('conditions'=>$conditions));
	
}

public function ledger_category()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('ledger_category');
		$this->loadmodel('group_master');
	    $this->set('fetch_group_master', $this->group_master->find('all'));
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_ledger_category"]))
			{
				$group_master_id=$this->request->data["group_master_id"]; 
				$name=$this->request->data["name"];
				$this->loadmodel('ledger_category');
				@$l_cat=$this->ledger_category->find('all', array('fields' => array('name'),'conditions'=>array('name' =>$name,'group_master_id'=>$group_master_id)));
				$l_catn=$l_cat[0]['ledger_category']['name'];
				 if($name==$l_catn)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->ledger_category->saveAll(array('name' => $name,'group_master_id'=>$group_master_id));
                $this->redirect(array('action' => 'ledger_category'));
				}
			}
			else if(isset($this->request->data["edit_ledger_category"]))
			{
				$edit_name=$this->request->data["edit_name"];
				$this->ledger_category->updateAll(array('name' => "'$edit_name'"), array('id' => $this->request->data["ledger_cat_id"]));
				$this->set('active',2);
			}
			else if(isset($this->request->data["delete_ledger_category"]))
			{
				$this->ledger_category->deleteAll(array('id' => $this->request->data["delete_ledger_cat_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
		   }
		}
			$this->set('fetch_ledger_category', $this->ledger_category->find('all'));
	}

/////////.............////////////////.............

public function ledger_master()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if($this->request->query('active')==1)
		{
			$this->set('active',1);
		}
		$this->loadmodel('ledger_category');
		$this->loadmodel('ledger_master');
		
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_ledger_master"]))
			{
				$name=$this->request->data["name"];
				$ledger_category_id=$this->request->data["ledger_category_id"];
				$this->loadmodel('ledger_master');
				@$l_cat_m=$this->ledger_master->find('all', array('fields' => array('name', 'ledger_category_id'),'conditions'=>array('name' =>$name,'ledger_category_id' =>$ledger_category_id)));
				@$l_catn_m=$l_cat_m[0]['ledger_master']['name'];
				@$l_catn_m1=$l_cat_m[0]['ledger_master']['ledger_category_id'];
				 if($name==$l_catn_m && $ledger_category_id==$l_catn_m1)
				 {
					 $this->set('error','Data Already Exist');
				 }
				else
				{
				$this->ledger_master->saveAll(array('name' => $name, 'ledger_category_id' => $ledger_category_id));
                $this->redirect(array('action' => 'ledger_master'));
				}
			}
			else if(isset($this->request->data["edit_ledger_master"]))
			{
				$edit_name=$this->request->data["edit_name"];
				$edit_ledger_category_id=$this->request->data["edit_ledger_category_id"];
				$this->ledger_master->updateAll(array('name' => "'$edit_name'",'ledger_category_id' => "'$edit_ledger_category_id'"), array('id' => $this->request->data["ledger_master_id"]));
				$this->set('active',2);
			}
			else if(isset($this->request->data["delete_ledger_master"]))
			{
				$this->ledger_master->deleteAll(array('id' => $this->request->data["delete_ledger_master_id"]));
				$this->set('active',2);
                $this->set('active_delete',1);
		   }
		}
			$this->set('fetch_ledger_category', $this->ledger_category->find('all'));
			$this->set('fetch_ledger_master', $this->ledger_master->find('all'));
	}
	function fetch_ledger_cr_dr_ledger_id($led_id){
		
			$this->loadmodel('ledger');
			$conditions=array('transaction_type'=>'Receipt');
			$result_ledger=$this->ledger->find('all',array('conditions'=>$conditions));
		
	}
	//////////////////////////////////
	function pos_ledger_report(){
		 if($this->RequestHandler->isAjax()){
			$this->layout='ajax_layout';
		}
		else{
			$this->layout='index_layout';
		}
			$this->loadmodel('ledger_category');
			$this->set('fetch_ledger_category', $this->ledger_category->find('all', array('conditions'=>array('OR'=>array(array('id'=>4))))));
	}
	    function pos_report_ajax(){
		$this->layout='ajax_layout';
			
			  $ledger_category_id=$this->request->query('ledger_master_id');
			  $from=date('Y-m-d', strtotime($this->request->query('from')));
			  $to=date('Y-m-d', strtotime($this->request->query('to')));
              $conditions=array ('transaction_date between ? and ?' => array($from, $to));
			  $this->loadmodel('ledger'); 
			  $result_ledger=$this->ledger->find('all',array('conditions'=>$conditions));
			  $this->set('result_ledger',$result_ledger);
			 $this->loadmodel('ledger_master');
			 $fetch_ledger_category=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id'=>$ledger_category_id,'id'=>$ledger_cat_id)));
			//pr($fetch_ledger_category);
			 $this->set('fetch_ledger_category',$fetch_ledger_category);
			 $this->set('from',$from);
			 $this->set('to',$to);
	}
	///////////////////////////////////

	//////////////////////////////////
	function reports_format(){
		 if($this->RequestHandler->isAjax()){
			$this->layout='ajax_layout';
		}
		else{
			$this->layout='index_layout';
		}
			$this->loadmodel('ledger_category');
			$this->set('fetch_ledger_category', $this->ledger_category->find('all', array('conditions'=>array('OR'=>array(array('id'=>9), array('id'=>11), array('id'=>12),array('id'=>4),array('id'=>13),array('id'=>8),array('id'=>7))))));
	}
	    function ledger_report_ajax(){
		$this->layout='ajax_layout';
			
			  $ledger_category_id=$this->request->query('ledger_master_id');
			  $ledger_cat_id=$this->request->query('ledger_cat_id');
			  $from=date('Y-m-d', strtotime($this->request->query('from')));
			  $to=date('Y-m-d', strtotime($this->request->query('to')));
              $conditions=array ('transaction_date between ? and ?' => array($from, $to));
			  $this->loadmodel('ledger'); 
			  $result_ledger=$this->ledger->find('all',array('conditions'=>$conditions));
			  $this->set('result_ledger',$result_ledger);
			 $this->loadmodel('ledger_master');
			 $fetch_ledger_category=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id'=>$ledger_category_id,'id'=>$ledger_cat_id)));
			//pr($fetch_ledger_category);
			 $this->set('fetch_ledger_category',$fetch_ledger_category);
			 $this->set('from',$from);
			 $this->set('to',$to);
	}
	///////////////////////////////////

	function ledger_view(){
		
		 if($this->RequestHandler->isAjax()){
			$this->layout='ajax_layout';
		}
		else{
				$this->layout='index_layout';
		}
			$this->loadmodel('ledger_category');
			$this->set('fetch_ledger_category', $this->ledger_category->find('all'));
	}

	function ledger_view_ajax(){
		$this->layout='ajax_layout';
			
			 $ledger_category_id=$this->request->query('ledger_master_id');
			 $user_id=$this->request->query('user_id');
			  
			  
			  $from=date('Y-m-d', strtotime($this->request->query('from')));
			  $to=date('Y-m-d', strtotime($this->request->query('to')));
              $conditions=array ('transaction_date between ? and ?' => array($from, $to));
			  $this->loadmodel('ledger'); 
			  $result_ledger=$this->ledger->find('all',array('conditions'=>$conditions));
			  $this->set('result_ledger',$result_ledger);
			  
			   $this->loadmodel('ledger_master');
			 $fetch_ledger_category=$this->ledger_master->find('all', array('conditions'=>array('ledger_category_id'=>$ledger_category_id,'id'=>$user_id)));
			// pr($fetch_ledger_category);
			 $this->set('fetch_ledger_category',$fetch_ledger_category);
			 $this->set('from',$from);
			 $this->set('to',$to);	
			 $this->set('user_id',$user_id);
			  $conditions1=array ('transaction_date <' =>$from);
			  $result_ledger1=$this->ledger->find('all',array('conditions'=>$conditions1));
			  $this->set('result_ledger1',$result_ledger1);
			  
	}
////// rohit end ////////////////////////
////////////////................Ashish....../////////////////.....///////////////////////////////////////////////


public function receipt_payment()              ////////  Ashish
    {
        if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
       
        $this->loadmodel('ledger_category');
        $this->loadmodel('room_reservation');
       
        if($this->request->is('post'))
        {
            $this->loadmodel('ledger_master');
            $this->loadmodel('ledger');
            $this->loadmodel('ledger_cr_dr');
            if(isset($this->request->data["add_receipt_payment"]))
            {
                foreach($this->request->data['invoice_id'] as $invoice_id)
                {
                    $status=0;
                     $due_amount=$this->request->data['gross_amount']-$this->request->data['received_amount'];
                   
                    if($this->request->data['gross_amount']==$this->request->data['received_amount'])
                    {
                        $status=1;
                    }
					if($this->request->data['receipt_type']=='Room')
                    {
                        $this->loadmodel('checkout');
                        $this->checkout->updateAll(array("status"=>"'$status'","due_amount"=>"'$due_amount'"),array('id' => $invoice_id));
                    }
                    else if($this->request->data['receipt_type']=='POS')
                    {
                        $this->loadmodel('pos_kot');
                        $this->pos_kot->updateAll(array("flag1"=>"'$status'","due_amount"=>"'$due_amount'"),array('id' => $invoice_id));
                    }
                    else if($this->request->data['receipt_type']=='House Keeping')
                    {
                        $this->loadmodel('house_keeping');
                        $this->house_keeping->updateAll(array("status"=>"'$status'","due_amount"=>"'$due_amount'"),array('id' => $invoice_id));
                    }
                    else if($this->request->data['receipt_type']=='Other Service')
                    {
                        $this->loadmodel('other_service');
                        $this->other_service->updateAll(array("status"=>"'$status'","due_amount"=>"'$due_amount'"),array('id' => $invoice_id));
                    }
                    else if($this->request->data['receipt_type']=='Outlet')
                    {
                        $this->loadmodel('function_booking');
                        $this->function_booking->updateAll(array("status"=>"'$status'","due_amount"=>"'$due_amount'"),array('id' => $invoice_id));
                    }
                   
                }
                $this->request->data["date"]=date('Y-m-d');
                $this->request->data['invoice_id']=implode(',',$this->request->data['invoice_id']);
                if(!empty($this->request->data["cheque_date"]))
                {
                    $this->request->data["cheque_date"]=date('Y-m-d', strtotime($this->request->data["cheque_date"]));
                }
               
                $this->request->data["transaction_date"]=date('Y-m-d', strtotime($this->request->data["transaction_date"]));
                $fetch_transaction_id=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Receipt')));
                $this->request->data['transaction_id']=$fetch_transaction_id+1;
                $this->request->data['transaction_type']='Receipt';
                $this->request->data=array_filter($this->request->data);
                $this->ledger->saveAll($this->request->data);
               
                $ledger_id=$this->ledger->getLastInsertID();
                $fetch_ledger_master_id=$this->ledger_master->find('all',array('conditions'=>array('ledger_category_id'=>$this->request->data["ledger_category_id"],'user_id'=>$this->request->data["user_id"])));
               
                $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>$fetch_ledger_master_id[0]['ledger_master']['id'],'cr'=>$this->request->data['received_amount']));
                if(empty($this->request->data['discount']))
                {
                    $this->request->data['discount']=0;
                }
                if(empty($this->request->data['tds']))
                {
                    $this->request->data['tds']=0;
                }
                $amount=$this->request->data['received_amount']-($this->request->data['discount']+$this->request->data['tds']);
                if($this->request->data['receipt_mode']=='Cash')
                {
                    $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>35,'dr'=>$amount));
                }
                else
                {
                    $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>37,'dr'=>$amount));
                }
                if($this->request->data['discount']>0)
                {
                    $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>10,'dr'=>$this->request->data['discount']));
                }
                if($this->request->data['tds']>0)
                {
                    $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>30,'dr'=>$this->request->data['tds']));
                }
           	}
			if(isset($this->request->data["advance"]))
            {
                
			    $status=1;
			    $this->loadmodel('room_reservation');
			    $this->room_reservation->updateAll(array("receipt_status"=>"'$status'"),array('id' => $this->request->data['invoice_id']));
				
                $this->request->data["date"]=date('Y-m-d');
                if(!empty($this->request->data["cheque_date"]))
                {
                    $this->request->data["cheque_date"]=date('Y-m-d', strtotime($this->request->data["cheque_date"]));
                }
                $this->request->data["ledger_category_id"]='1';
                $this->request->data["transaction_date"]=date('Y-m-d', strtotime($this->request->data["transaction_date"]));
                $fetch_transaction_id=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Receipt')));
                $this->request->data['transaction_id']=$fetch_transaction_id+1;
                $this->request->data['transaction_type']='Receipt';
                $this->request->data=array_filter($this->request->data);
                $this->ledger->saveAll($this->request->data);
               
                $ledger_id=$this->ledger->getLastInsertID();
                $fetch_ledger_master_id=$this->ledger_master->find('all',array('conditions'=>array('ledger_category_id'=>$this->request->data["ledger_category_id"],'user_id'=>$this->request->data["user_id"])));
               
                $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>$fetch_ledger_master_id[0]['ledger_master']['id'],'cr'=>$this->request->data['amount']));
				if($this->request->data['receipt_mode']=='Cash')
                {
                    $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>35,'dr'=>$this->request->data['amount']));
                }
                else
                {
                    $this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>37,'dr'=>$this->request->data['amount']));
                }
				
               
            }
        }
        $this->set('fetch_ledger_category', $this->ledger_category->find('all'));
		$this->set('fetch_room_reservation', $this->room_reservation->find('all',array('fields'=>array('advance','id','company_id','name_person'),'conditions'=>array('receipt_status'=>0,'advance >'=>0))));
           
    }
	
	///////////////////
	
	
	public function bill_posting()              ////////  Ashish
    {
        if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
		if($this->request->is('post'))
        {
			exit;
		}
    }
    public function expense_tracker_add()              ////////  Ashish
    {
        if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
		$this->loadmodel('ledger');
        $this->loadmodel('ledger_master');
        if($this->request->is('post'))
        {
			$date=date('Y-m-d');
			$this->loadmodel('ledger_cr_dr');
			
			
			for($i=0; $i<sizeof($this->request->data["transaction_date"]); $i++)
			{
				$fetch_transaction_id=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Expences')));
				$transaction_id=$fetch_transaction_id+1;
				$transaction_type='Expences';
				$narration=$this->request->data['narration'][$i];
				$user_id=$this->request->data['user_id'][$i];
				$this->request->data=array_filter($this->request->data);
				$this->ledger->saveAll(array('transaction_date'=>date('Y-m-d', strtotime($this->request->data["transaction_date"][$i])),'transaction_id'=>$transaction_id,'transaction_type'=>$transaction_type,'narration'=>$narration,'user_id'=>$user_id,'date'=>$date));
				
				$ledger_id=$this->ledger->getLastInsertID();
				
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>$this->request->data['ledger_master_id'][$i],'dr'=>$this->request->data['amount'][$i]));
				
				$this->ledger_cr_dr->saveAll(array('ledger_id'=>$ledger_id,'ledger_master_id'=>35,'cr'=>$this->request->data['amount'][$i]));
			}
        }
        
        $this->set('expenses_ledger_master', $this->ledger_master->find('all',array('fields'=>array('id','name'),'conditions'=>array('ledger_category_id'=>14))));
        $this->set('account_head_ledger_master', $this->ledger_master->find('all',array('fields'=>array('id','name'),'conditions'=>array('ledger_category_id'=>1))));
    }
    public function expense_tracker_add_row()              ////////  Ashish
    {
        if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
       
        $this->set('count',$this->request->query['count']);
        $this->loadmodel('ledger_master');
        $this->set('expenses_ledger_master', $this->ledger_master->find('all',array('fields'=>array('id','name'),'conditions'=>array('ledger_category_id'=>14))));
        $this->set('account_head_ledger_master', $this->ledger_master->find('all',array('fields'=>array('id','name'),'conditions'=>array('ledger_category_id'=>1))));
    }


////////////////////////////////////////////////Ashish	end/////////////////////////////////////////////////////
	
	
	function registration()
	{
	   if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadModel('registration');
		if($this->request->is('post'))
		{
			if(isset($this->request->data["add_registration"]))
			{
				$name=$this->request->data["name"];
				$swd_of=$this->request->data["swd_of"];
				$occupation=$this->request->data["occupation"];
				$p_address=$this->request->data["p_address"];
				$p_phone=$this->request->data["p_phone"];
				$fax=$this->request->data["fax"];
				$office=$this->request->data["office"];
				$c_address=$this->request->data["c_address"];
				$c_phone=$this->request->data["c_phone"];
				$mobile_no=$this->request->data["mobile_no"];
				$email=$this->request->data["email"];
				$marital_status=$this->request->data["marital_status"];
				$residential_status=$this->request->data["residential_status"];
				$nationality=$this->request->data["nationality"];
				$card_type_id=$this->request->data["card_type_id"];
				
				$tax_ac_no=$this->request->data["tax_ac_no"];
				$guest_type=$this->request->data["guest_type"];
				if(!empty($guest_type))
				{
					$wing_name=$this->request->data["wing_name"];
					$flat_no=$this->request->data["flat_no"];
					$floor=$this->request->data["floor"];
				}else { 
					$wing_name='';
					$flat_no='';
					$floor='';
				}
				
				$card_id_no=$this->request->data["card_id_no"];
				$dd=$this->request->data["dd"];
				$mm=$this->request->data["mm"];
				$yy=$this->request->data["yy"];
				$dob=$yy."-".$mm."-".$dd;
				
				$doa=$this->request->data["date_of_anniversary"];
				if(empty($doa))
				{
					$date_of_anniversary="0000-00-00";				
				}
				else
				{
					$date_of_anniversary=date("Y-m-d",strtotime($this->request->data["date_of_anniversary"]));
				} 
				$reg_type=$this->request->data["reg_type"];
				
					$exct_row=$this->request->data["exct_row"];
					$all_rows=explode(",",$exct_row);
					foreach($all_rows as $data){
						$cardholder[]=@$this->request->data["cardholder".$data];
						$applicant[]=@$this->request->data["applicant".$data];
					}
					$v=0;
					foreach($cardholder as $card)
					{
					$new_ar[]=$card.','.$applicant[$v];
					$v++;
					}
					$cardholder=implode("-",$new_ar);
				
				
				$reg_date=date('Y-m-d');
				$reg_time=date('H:i:s');
					
	
				
				$this->registration->saveAll(array("name"=>$name,"swd_of"=>$swd_of,"p_address"=>$p_address,"p_phone"=>$p_phone,"fax"=>$fax,"c_address"=>$c_address,"phone_home"=>$c_phone,"office"=>$office,"mobile_no"=>$mobile_no,"email"=>$email,"marital_status"=>$marital_status,"residential_status"=>$residential_status,"nationality"=>$nationality,"card_type_id"=>$card_type_id,"occupation"=>$occupation,"tax_ac_no"=>$tax_ac_no,"wing_name"=>$wing_name,"flat_no"=>$flat_no,"floor"=>$floor,"card_id_no"=>$card_id_no,"dob"=>$dob,"reg_type"=>$reg_type,"reg_date"=>$reg_date,"reg_time"=>$reg_time,"cardholder"=>$cardholder,'guest_type'=> $guest_type,'date_of_anniversary'=> $date_of_anniversary));
				
				$this->gr_no->updateAll(array('card_number' =>$this->request->data["card_number"]+1), array('id' => 1));
				
				$sms=str_replace(' ', '+', 'Thank you for choosing us for your stay.');
				$this->requestAction(array('controller' => 'Dreamshapers', 'action' => 'send_sms',$sms,$mobile_no), array());
				
				$success=$this->smtpmailer($email,'Dreamshapers','Enquiry', "hello" ,$email);
				
				$this->set('active' ,1);
			}
			
			if(isset($this->request->data["delete_registration"]))
			{
				
				$deleteId = $this->request->data('deleteId');
				$this->registration->updateAll(array("flag"=>"'1'"),array('id' => $deleteId));
				$this->set('active',2);
                $this->set('active_delete',1);
			
		   }
		}
		$this->loadmodel('card_type');
		$this->loadmodel('gr_no');
		$this->set('fetch_card_type', $this->card_type->find('all', array('conditions' => array('flag' => "0"))) );
		$this->set('fetch_gr_no', $this->gr_no->find('all'));

        
		 
		
	}
	
	function  reg_add_row(){
		$this->layout="ajax_layout";
	}
	function registration_view()
	{
	    if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$this->loadModel('registration');
		$this->set('registrations', $this->registration->find('all', array('conditions' => array('flag' => "0"))) );
	}
	
	 function registration_edit()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$id = $this->request->query('id');
		$this->loadModel('registration');
		$this->set('registrations', $this->registration->find('all', array('conditions' => array('id' => $id))));
	
		if($this->request->is('post')) {
			$name=$this->request->data["name_edit"];
			$swd_of=$this->request->data["swd_of_edit"];
			$p_address=$this->request->data["p_address_edit"];
			$p_phone=$this->request->data["p_phone_edit"];
			$fax=$this->request->data["fax_edit"];
			$c_address=$this->request->data["c_address_edit"];
			$c_phone=$this->request->data["c_phone_edit"];
			$office=$this->request->data["office_edit"];
			$mobile_no=$this->request->data["mobile_no_edit"];
			$email=$this->request->data["email_edit"];
			$marital_status=$this->request->data["marital_status_edit"];
			$residential_status=$this->request->data["residential_status_edit"];
			$nationality=$this->request->data["nationality_edit"];
			$occupation=$this->request->data["occupation_edit"];
			$tax_ac_no=$this->request->data["tax_ac_no_edit"];
			$guest_type=$this->request->data["guest_type_edit"];
			$card_type_id=$this->request->data["card_type_id"];
			$card_id_no=$this->request->data["card_id_no"];
			
				$wing_name=$this->request->data["wing_name"];
				$flat_no=$this->request->data["flat_no"];
				$floor=$this->request->data["floor"];
			  
			$card_id_no=$this->request->data["card_id_no_edit"];
			$dd=$this->request->data["dd_edit"];
			$mm=$this->request->data["mm_edit"];
			$yy=$this->request->data["yy_edit"];
			$dob=$yy."-".$mm."-".$dd;
			
			 $doa=$this->request->data["date_of_anniversary_edit"]; 
			if(empty($doa))
			{
				$date_of_anniversary="0000-00-00";				
			}
			else
			{
				$date_of_anniversary=date("Y-m-d",strtotime($this->request->data["date_of_anniversary_edit"]));
				
			} 
			$reg_type=$this->request->data["reg_type_edit"];
			
			if($reg_type=='dependant')
  			  {
				$exct_row=$this->request->data["exct_row"];
				$all_rows=explode(",",$exct_row);
				
				$all_rows=array_filter($all_rows);
				
				foreach($all_rows as $data){
					$cardholder[]=@$this->request->data["cardholder_edit".$data];
					$applicant[]=@$this->request->data["applicant_edit".$data];
				}
				$v=0;
				foreach($cardholder as $card)
				{
				$new_ar[]=$card.','.$applicant[$v];
				$v++;
				}
				$cardholder=implode("-",$new_ar);
			  }
			  if($reg_type=='dependant')
  			  {
			
			$this->registration->updateAll(array("name"=>"'$name'","swd_of"=>"'$swd_of'","p_address"=>"'$p_address'","p_phone"=>"'$p_phone'","fax"=>"'$fax'","c_address"=>"'$c_address'","phone_home"=>"'$c_phone'","office"=>"'$office'","mobile_no"=>"'$mobile_no'","email"=>"'$email'","marital_status"=>"'$marital_status'","residential_status"=>"'$residential_status'","nationality"=>"'$nationality'","occupation"=>"'$occupation'","tax_ac_no"=>"'$tax_ac_no'","wing_name"=>"'$wing_name'","flat_no"=>"'$flat_no'","floor"=>"'$floor'","card_id_no"=>"'$card_id_no'","card_type_id"=>"'$card_type_id'","dob"=>"'$dob'","guest_type"=>"'$guest_type'","cardholder"=>"'$cardholder'","date_of_anniversary"=>"'$date_of_anniversary'","reg_type"=>"'$reg_type'"), array('id' => $id));
			  }
			  else
			  {
				  $this->registration->updateAll(array("name"=>"'$name'","swd_of"=>"'$swd_of'","p_address"=>"'$p_address'","p_phone"=>"'$p_phone'","fax"=>"'$fax'","c_address"=>"'$c_address'","phone_home"=>"'$c_phone'","office"=>"'$office'","mobile_no"=>"'$mobile_no'","email"=>"'$email'","marital_status"=>"'$marital_status'","residential_status"=>"'$residential_status'","nationality"=>"'$nationality'","occupation"=>"'$occupation'","tax_ac_no"=>"'$tax_ac_no'","wing_name"=>"'$wing_name'","flat_no"=>"'$flat_no'","floor"=>"'$floor'","card_id_no"=>"'$card_id_no'","card_type_id"=>"'$card_type_id'","dob"=>"'$dob'","guest_type"=>"'$guest_type'","date_of_anniversary"=>"'$date_of_anniversary'","reg_type"=>"'$reg_type'"), array('id' => $id));
			  }
			return $this->redirect(array('action' => 'registration'));
			
	}
	$this->loadmodel('card_type');
		$this->set('fetch_card_type', $this->card_type->find('all', array('conditions' => array('flag' => "0"))) );
	}
    /////
	
	function excel_registration()
	{
		
		$this->layout="";
		$filename='registration_excel';
		header ("Expires: 0");
		header ("border: 1");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=".$filename.".xls");
		header ("Content-Description: Generated Report" );
		
		$excel = "<table border='1'>
		<tr>
		<th>S.no</th>
		<th>Name</th>
		<th>S/W/D of</th>
        <th>Permanent Adderss</th>
		<th>Phone</th>
		<th>Fax</th>
		<th>C Address</th>
		<th>Phon Home</th>
		<th>Office</th>
        <th>Mobile No.</th>
        <th>Email</th>
		<th>Marital Status</th>
		<th>Residential status</th>
		<th>Nationality</th>
		<th>Occupation</th>
        <th>Tax Account No</th>
		<th>Guest Type</th>
		<th>Wing Name</th>
		<th>Flat No</th>
		<th>Floor</th>
		<th>Card ID No</th>
		<th>Date of Anniversary</th>
		<th>reg_type</th>
		
		</tr>";
		$i=0;
		$this->loadModel('registration');
		$fatch_registration=$this->registration->find('all',array('conditions' => array('status' => "0")));
		foreach($fatch_registration as $view_data)
			{ $i++;
				@$id=$view_data['registration']['id'];
				@$name=$view_data['registration']['name'];
				@$swd_of=$view_data['registration']['swd_of'];
				@$p_address=$view_data['registration']['p_address'];
				@$p_phone=$view_data['registration']['p_phone']; 
				@$fax=$view_data['registration']['fax'];
				@$c_address=$view_data['registration']['c_address'];
				@$phone_home=$view_data['registration']['phone_home'];
				@$office=$view_data['registration']['office'];
				@$mobile_no=$view_data['registration']['mobile_no']; 
				@$email=$view_data['registration']['email'];
				@$marital_status=$view_data['registration']['marital_status'];
				@$residential_status=$view_data['registration']['residential_status'];
				@$nationality=$view_data['registration']['nationality'];
				@$occupation=$view_data['registration']['occupation']; 
				@$tax_ac_no=$view_data['registration']['tax_ac_no'];
				@$wing_name=$view_data['registration']['wing_name'];
				@$flat_no=$view_data['registration']['flat_no'];
				@$floor=$view_data['registration']['floor'];
				@$card_id_no=$view_data['registration']['card_id_no']; 
				@$date_of_anniversary=$view_data['registration']['date_of_anniversary'];
				@$reg_type=$view_data['registration']['reg_type']; 
				@$guest_type=$view_data['registration']['guest_type'];
				
				
		$excel.="	
		<tr>
		<td>".$i."</td>
		<td>".ucwords($name)."</td>
		<td>".ucwords($swd_of)."</td>
        <td>".ucwords($p_address)."</td>
		<td>".$p_phone."</td>
		<td>".ucwords($fax)."</td>
		<td>".ucwords($c_address)."</td>
		<td>".$phone_home."</td>
		<td>".ucwords($office)."</td>
        <td>".$mobile_no."</td>
        <td>".$email."</td>
		<td>".ucwords($marital_status)."</td>
		<td>".ucwords($residential_status)."</td>
		<td>".ucwords($nationality)."</td>
		<td>".ucwords($occupation)."</td>
        <td>".ucwords($tax_ac_no)."</td>
		<td>".ucwords($guest_type)."</td>
		<td>".ucwords($wing_name)."</td>
		<td>".ucwords($flat_no)."</td>
		<td>".ucwords($floor)."</td>
		<td>".$card_id_no."</td>
		<td>".$date_of_anniversary."</td>
		<td>".ucwords($reg_type)."</td>";
		
		$excel.="</tr>";
		}
			
	$excel.="</table>";

	echo $excel;
	exit;
	}
	function  registration_delete()
	{
		$deleteId = $this->request->query('deleteId');
		$this->loadModel('registration');
		//$this->set('registrations', $this->registration->find('all', array('conditions' => array('id' => $id))));
		$this->registration->updateAll(array("status"=>"'1'"),array('id' => $deleteId));
		return $this->redirect(array('action' => 'registration_view'));
		
	}
	
	 function registration_pdf()
	{
		$this->layout="pdf";
		$id_pdf = $this->request->query('id_pdf');
		$this->loadModel('registration');
		$registrations=$this->registration->find('all', array('conditions' => array('id' => $id_pdf)));
			
		App::import('Vendor','xtcpdf');  
		$tcpdf = new XTCPDF(); 
		
		//$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans' 
		//$tcpdf->SetAuthor("KBS Homes & Properties at http://kbs-properties.com"); 
		$tcpdf->SetAutoPageBreak( true ); 
		//$tcpdf->setHeaderFont(array($textfont,'',40)); 
		$tcpdf->xheadercolor = array(255,255,255); 
	  //	$tcpdf->xheadertext = ''; 
		$tcpdf->xfootertext = 'DreamShapers'; 
		$tcpdf->AddPage(); 
		//$tcpdf->SetTextColor(0, 0, 0); 
		$tcpdf->SetFont($textfont,'N',12);		
		$html='<table>
            <tr><td  style="background-color:#F1F1F1; color:rgba(28, 62, 143, 0.51);  padding-left:10%">Personal Information </td></tr>
            </table>';
			foreach($registrations as $view_data)
			{ 
				$id=$view_data['registration']['id'];
				$name=$view_data['registration']['name'];
				$swd_of=$view_data['registration']['swd_of'];
				$p_address=$view_data['registration']['p_address'];
				$p_phone=$view_data['registration']['p_phone']; 
				$fax=$view_data['registration']['fax'];
				$c_address=$view_data['registration']['c_address'];
				$phone_home=$view_data['registration']['phone_home'];
				$office=$view_data['registration']['office'];
				$mobile_no=$view_data['registration']['mobile_no']; 
				$email=$view_data['registration']['email'];
				$marital_status=$view_data['registration']['marital_status'];
				$residential_status=$view_data['registration']['residential_status'];
				$nationality=$view_data['registration']['nationality'];
				$occupation=$view_data['registration']['occupation']; 
				$tax_ac_no=$view_data['registration']['tax_ac_no'];
				$guest_type=$view_data['registration']['guest_type'];
					if($guest_type=='life time'){
						$wing_name=$view_data['registration']['wing_name'];
						$flat_no=$view_data['registration']['flat_no'];
						$floor=$view_data['registration']['floor'];
					}
				$card_id_no=$view_data['registration']['card_id_no'];
				$dob=$view_data['registration']['dob'];
				$date_of_anniversary=$view_data['registration']['date_of_anniversary'];
				$reg_type=$view_data['registration']['reg_type'];
				
				
				if($reg_type=='dependant')
				{
				$cardholder=$view_data['registration']['cardholder'];
				 if(!empty($cardholder)){
					 $cardholder=explode("-",$cardholder);
				 }
				}
			 
			}
			$html.='			
				<br>
				<table style="line-height:5px">
				<tr><td><strong>Name &nbsp; :</strong></td><td>'.ucwords($name).'</td></tr>
				<tr><td><strong>S/W/D of &nbsp; :</strong></td><td>'.ucwords($swd_of).'</td></tr>
				<tr><th><strong>Permanent Adderss &nbsp; :</strong></th><td>'.ucwords($p_address).'</td></tr>
				<tr><th><strong>Phone No. &nbsp; :</strong></th><td>'.$p_phone.'</td></tr>
				<tr><th><strong>Fax &nbsp; :</strong></th><td>'.ucwords($fax).'</td></tr>
				<tr><th><strong>Correspondence Adderss &nbsp; :</strong></th><td>'.ucwords($c_address).'</td></tr>
				<tr><th><strong>Phone No. (Home) &nbsp; :</strong></th><td>'.ucwords($phone_home).'</td></tr>
				<tr><th><strong>Office &nbsp; :</strong></th><td>'.ucwords($office).'</td></tr>
				<tr><th><strong>Mobile No.  &nbsp; :</strong></th><td>'.ucwords($mobile_no).'</td></tr>
				<tr><th><strong>Email &nbsp; :</strong></th><td>'.$email.'</td></tr>
				
				<tr><th><strong>Marital Status :</strong></th><td>'.ucwords($marital_status).'</td></tr>
				<tr><td><strong>Residential Status &nbsp; :</strong></td><td>'.ucwords($residential_status).'</td></tr>
				<tr><td><strong>Nationality &nbsp; :</strong></td><td>'.ucwords($nationality).'</td></tr>
				<tr><th><strong>Occupation &nbsp; :</strong></th><td>'.ucwords($occupation).'</td></tr>
				<tr><th><strong>Card Id No. &nbsp; :</strong></th><td>'.$card_id_no.'</td></tr>
				<tr><th><strong>Income Tax Permanent Account No &nbsp; :</strong></th><td>'.$tax_ac_no.'</td></tr>
				<tr><th><strong>Date Of Birth &nbsp; :</strong></th><td>'.date("d-m-Y",strtotime($dob)).'</td></tr>
				<tr><th><strong>Date of Anniversary:</strong></th><td>'.date("d-m-Y",strtotime($date_of_anniversary)).'</td></tr>
				<tr><th><strong>Guest Type &nbsp; :</strong></th><td>'.ucwords($guest_type).'</td></tr>
				<tr><th><strong>Registration Type &nbsp; :</strong></th><td>'.ucwords($reg_type).'</td></tr>
				
				</table>';
				if($guest_type=='life time'){
				$html.='<table width="100%" style="margin-top:1%;">
				<tr><td colspan="10" style="background-color:#F1F1F1; color:rgba(28, 62, 143, 0.51);  padding-left:10%">Details of The Flat </td></tr>
				</table>
				<table style="line-height:5px">
				
				<tr><th><strong>Wing Name &nbsp; :</strong></th><td>'.ucwords($wing_name).'</td></tr>
				<tr><th><strong>Flat No. &nbsp; :</strong></th><td>'.ucwords($flat_no).'</td></tr>
				<tr><th><strong>Floor &nbsp; :</strong></th><td>'.ucwords($floor).'</td></tr>
				</table>';
				}
				if($reg_type=='dependant')
				{
				$html.='<table width="100%" style="margin-top:1%;">
				<tr><td colspan="10" style="background-color:#F1F1F1; color:rgba(28, 62, 143, 0.51);  padding-left:10%">Name of Cardholder </td>
				<td colspan="10" style="background-color:#F1F1F1; color:rgba(28, 62, 143, 0.51); ">Relation with Applicant  </td></tr>
				</table><table style="line-height:5px">';	
				foreach($cardholder as $data_store)
					{
						$data_exp=explode(',', $data_store);
						$html.='<tr><td>'.$data_exp[0].'</td><td>'.$data_exp[1].'</td></tr>';
					}
				$html.='</table>';	
				}
		$tcpdf->writeHTML($html);
		ob_clean();
		echo $tcpdf->Output('html.pdf', 'D');
		return $this->redirect(array('action' => 'registration_view'));
	}
	////////////////////////           Dasu
	
	function cover_statement_date()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			echo "<script>
			location='cover_statement_date';
			window.open('report_cover_statement?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
		}
	}
	function report_cover_statement()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$this->loadModel('pos_kot');
		$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
		
		$this->loadModel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all'));
		
		$this->loadModel('pos_kot_item');
		$this->set('fetch_pos_kot_item', $this->pos_kot_item->find('all'));
	}
	
	 function production_report_datewise()
    {
        if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='index_layout';
        }
        if(isset($this->request->data['submit1']))
        {
            $start_date=$this->data["start_date"];   
            $end_date=$this->data["end_date"];
                $start_date=date("Y-m-d",strtotime($start_date));
            $end_date=date("Y-m-d",strtotime($end_date));
            echo "<script>
            location='production_report_datewise';
            window.open('production_report?start_date=$start_date&end_date=$end_date','_newtab');
            </script>";   
        }
    }
       
   function production_report()
    {
        if($this->RequestHandler->isAjax())
        {
            $this->layout='ajax_layout';
        }
        else
        {
            $this->layout='ajax_layout';
        }
        $start_date=$this->request->query("start_date");
        $end_date=$this->request->query("end_date");
        $this->set('start_date',$start_date);
		$this->set('end_date',$end_date);
        $conditions =array ('date between ? and ?' => array($start_date, $end_date), array('kot_type !='=>4));
          
            $this->loadmodel('pos_kot');
            $this->loadmodel('master_item');
           	$this->set('fatch_master_items', $this->master_item->find('all'));
            $this->set('fatch_pos_kot_data', $this->pos_kot->find('all', array('conditions' => $conditions)));
            
        }
		function combine_pos_date()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		if(isset($this->request->data['submit']))
		{
			$start_date=$this->data["start_date"];	
			$end_date=$this->data["end_date"];
			$start_date=date("Y-m-d",strtotime($start_date));
			$end_date=date("Y-m-d",strtotime($end_date));
			echo "<script>
			location='report_combine_pos';
			window.open('report_combine_pos?start_date=$start_date&end_date=$end_date','_newtab');
			</script>";	
		}
	}
	
	function report_combine_pos()
	{
		if($this->RequestHandler->isAjax())
		{
			$this->layout='ajax_layout';
		}
		else
		{
			$this->layout='index_layout';
		}
		$start_date=$this->request->query("start_date");
	 	$end_date=$this->request->query("end_date");
		
		$this->loadModel('pos_kot');
		$this->set('fetch_pos_kot', $this->pos_kot->find('all'));
		
		$this->loadModel('master_outlet');
		$this->set('fetch_master_outlet', $this->master_outlet->find('all'));
		
		$this->loadModel('pos_kot_item');
		$this->set('fetch_pos_kot_item', $this->pos_kot_item->find('all'));
	}
	////////////////////////////////////////////////////
	
	
	
	
	
    //////////////////////  Call Php Function  ///////
	
	function user_rights()
	{
		$auto_login_id=$this->Session->read('user_id');
		$this->loadmodel('user_right');
		$conditions=array("user_id" => $auto_login_id);
		return $fetch_user_right = $this->user_right->find('all',array('conditions'=>$conditions));
	}
	
	
	
	public function function_index_layout()
	{ 	
		$this->loadmodel('master_roomno');
		return $master_pos_kot_item=$this->master_roomno->find('all',array('conditions' => array('flag' => "0")));
		
		$this->loadmodel('pos_kot');
		$feetch_billing_kot_data=$this->pos_kot->find('all',array('conditions'=>array('flag' => 0, 'status'=>0)));
		$feeetch_billing_kot_data=$this->pos_kot->find('all',array('conditions'=>array('flag' => 0, 'status'=>0, 'status1' => 1)));
	}

	public function function_index_layoutt()
	{ 	
		$this->loadmodel('pos_kot');
		$feetch_billing_kot_data=$this->pos_kot->find('all',array('conditions'=>array('flag' => 0, 'status'=>0)));
	}
	public function function_index_layouttt()
	{ 	
		$this->loadmodel('pos_kot');
		$feeetch_billing_kot_data=$this->pos_kot->find('all',array('conditions'=>array('flag' => 0, 'status'=>0, 'status1' => 1)));
	}




	public function index_layout_session()
	{ 	
			return $this->Session->read('user_name');
	}
	public function index_layout_session2()
	{ 	
			return $this->Session->read('passw');
	}
	public function index_layout_session3()
	{ 	
			return $this->Session->read('user_id');
	}

    
	public function fetch_item_for_bill_query($kot_id)
	{
		$this->loadmodel('pos_kot_item');
		$conditions=array('pos_kots_id'=> $kot_id);
		return $master_pos_kot_item=$this->pos_kot_item->find('all',array('conditions'=>$conditions));
	}
	public function func_pos_production($item_id,$kot_id)
	{
		$this->loadmodel('pos_kot_item');
		$conditions=array('master_items_id' => $item_id,'pos_kots_id'=> $kot_id);
		return $master_pos_kot_item=$this->pos_kot_item->find('all',array('conditions'=>$conditions));
	}
	public function func_cover_statment($covers)
	{
		$this->loadmodel('pos_kot');
		$conditions=array('master_outlets_id' => $covers);
		return $master_pos_kot_item=$this->pos_kot->find('all',array('conditions'=>$conditions));
	}
	public function func_pos_kot_items($pos_kot_id)
	{
		$this->loadmodel('pos_kot_item');
		$conditions=array('pos_kots_id' => $pos_kot_id);
		return $master_item_cover=$this->pos_kot_item->find('all',array('conditions'=>$conditions,'fields'=>array('amount','taxes')));
	}
	public function master_item_fetch($master_item_id)
	{
		$this->loadmodel('master_item_type');
		$conditions=array('id' => $master_item_id);
		$master_item_fetch_id=$this->master_item_type->find('all',array('conditions'=>$conditions,'fields'=>array('itemtype_name')));
		return @$master_item_fetch_id[0]['master_item_type']['itemtype_name'];
	}
	public function master_item_inward_fetch($master_item_id)
	{
		$this->loadmodel('stock');
		$conditions=array('id' => $master_item_id);
		$master_item_inward_fetch_id=$this->stock->find('all',array('conditions'=>$conditions,'fields'=>array('itemtype_name')));
		
		return $master_item_inward_fetch_id[0]['stock']['itemtype_name'];
	}
	public function master_outlet_fetch($master_outlet_id)
	{
		$this->loadmodel('master_outlet');
		$conditions=array('id' => $master_outlet_id);
		$master_outlet_fetch_id=$this->master_outlet->find('all',array('conditions'=>$conditions,'fields'=>array('outlet_name')));
	   
		return $master_outlet_fetch_id[0]['master_outlet']['outlet_name'];
	}	
	public function func_item_fetch($item_id)
	{
		$this->loadmodel('master_item');
		$conditions=array('id' => $item_id);
		$item_name=$this->master_item->find('all',array('conditions'=>$conditions,'fields'=>array('item_name')));
		return @$item_name[0]['master_item']['item_name'];
	}
	public function func_item_fetch1($item_id)
	{
		$this->loadmodel('plan_item');
		$conditions=array('id' => $item_id);
		$plan_item=$this->plan_item->find('all',array('conditions'=>$conditions,'fields'=>array('item_name')));
		return @$plan_item[0]['plan_item']['item_name'];
	}
	public function master_room_fetch($master_room_id)
	{
		$this->loadmodel('master_room_type');
		$conditions=array('id' => $master_room_id);
		$master_room_fetch_id=$this->master_room_type->find('all',array('conditions'=>$conditions,'fields'=>array('room_type')));
		return $master_room_fetch_id[0]['master_room_type']['room_type'];
	}
	
	public function master_item_category_fatch($master_id)
	{
		$this->loadmodel('master_item_categorie');
		$conditions=array('id' => $master_id);
		$master_tax_fetch_id=$this->master_item_categorie->find('all',array('conditions'=>$conditions,'fields'=>array('item_category')));
		return $master_tax_fetch_id[0]['master_item_categorie']['item_category'];
	}
	public function master_inward_category_fatch($master_id)
	{
		$this->loadmodel('stock_category');
		$conditions=array('id' => $master_id);
		$master_inward_category_id=$this->stock_category->find('all',array('conditions'=>$conditions,'fields'=>array('item_category')));
		return $master_inward_category_id[0]['stock_category']['item_category'];
	}
	public function plan_item_category_fatch($master_id)
	{
		$this->loadmodel('plan_item_category');
		$conditions=array('id' => $master_id);
		$plan_item_category_id=$this->plan_item_category->find('all',array('conditions'=>$conditions,'fields'=>array('item_category')));
		return $plan_item_category_id[0]['plan_item_category']['item_category'];
	}
	public function master_tax_fetch($master_tax_id)
	{
		$this->loadmodel('master_tax');
		$conditions=array('id' => $master_tax_id);
		$master_tax_fetch_id=$this->master_tax->find('all',array('conditions'=>$conditions,'fields'=>array('name')));
		return $master_tax_fetch_id[0]['master_tax']['name'];
	}
	
	public function master_tax_fetch_bill($master_tax_id)
	{
		$this->loadmodel('master_tax');
		$conditions=array('id' => $master_tax_id);
		return $master_tax_fetch_bill_id=$this->master_tax->find('all',array('conditions'=>$conditions,'fields'=>array('name', 'tax_applicable')));
	}
	
	
	public function master_tax_fetch1($master_taxx_id)
	{
		$this->loadmodel('master_tax');
		$conditions=array('id' => $master_taxx_id);
		$master_tax_fetch_idd=$this->master_tax->find('all',array('conditions'=>$conditions,'fields'=>array('tax_applicable')));
		return $master_tax_fetch_idd[0]['master_tax']['tax_applicable'];
	}
	public function menu_cat_fetch($menu_cat_i)
	{
		$this->loadmodel('menu_category');
		$conditions=array('id' => $menu_cat_i);
		$menu_cat_fetch_id=$this->menu_category->find('all',array('conditions'=>$conditions,'fields'=>array('menu_category_id')));
		return $menu_cat_fetch_id[0]['menu_category']['menu_category_id'];
	}
	public function menu_item_cat_fetch($menu_item_cat_i)
	{
		$this->loadmodel('master_item');
		$conditions=array('id' => $menu_item_cat_i);
		$menu_item_cat_fetch_id=$this->master_item->find('all',array('conditions'=>$conditions,'fields'=>array('item_name')));
		return $menu_item_cat_fetch_id[0]['master_item']['item_name'];
	}
	public function master_attribute_fetch($master_attribute_id)
	{
		$this->loadmodel('master_room_attribute');
		$conditions=array('id' => $master_attribute_id);
		$master_attribute_fetch_id=$this->master_room_attribute->find('all',array('conditions'=>$conditions,'fields'=>array('name')));
		return $master_attribute_fetch_id[0]['master_room_attribute']['name'];
	}
	public function master_service_fetch($master_service_id)
    {
        $this->loadmodel('master_service');
        $conditions=array('id' => $master_service_id);
        $master_service_fetch_id=$this->master_service->find('all',array('conditions'=>$conditions,'fields'=>array('service_name')));
        return $master_service_fetch_id[0]['master_service']['service_name'];
    }
	public function reservation_no_fetch($reservation_no_id)//////////////companydiscount returns
    {
        $this->loadmodel('room_reservation');
        $conditions=array('id' => $reservation_no_id);
        $reservation_no_fetch_id=$this->room_reservation->find('all',array('conditions'=>$conditions,'fields'=>array('id')));
       
        return $reservation_no_fetch_id[0]['room_reservation']['id'];
    }
	public function outlet_item_mapping($outlet_id,$master_item_type_id,$master_item_id)
	{
		$this->loadmodel('outlet_item_mapping');
		$conditions=array('master_outlet_id' => $outlet_id,'master_item_type_id' => $master_item_type_id,'master_item_id' => $master_item_id);
		return $fetch_outlet_item_mapping=$this->outlet_item_mapping->find('all',array('conditions'=>$conditions));
		
	}
	public function fetch_checkin_out_room_for_edit($card_no)
	{
		$this->loadmodel('room_checkin_checkout');
      	return $this->room_checkin_checkout->find('all',array('conditions'=>array('card_no' => $card_no ,'status' => 0)));
	
	}
	public function fetch_checkin_out_room_for_edit_tr($company_id)
	{
		$this->loadmodel('fo_room_booking');
      	return $this->fo_room_booking->find('all',array('conditions'=>array('company_id' => $company_id ,'flag' => 0)));
		
	}
	
	public function fetch_checkin_out_room_for_editt($id)
	{
		$this->loadmodel('room_reservation_no');
      	return $this->room_reservation_no->find('all',array('conditions'=>array('room_reservation_id' => $id)));
	}
	
	public function master_room_plan_fetch($master_plan_id)
	{
		$this->loadmodel('master_room_plan');
		$conditions=array('id' => $master_plan_id);
		$master_room_plan_fetch_id=$this->master_room_plan->find('all',array('conditions'=>$conditions,'fields'=>array('plan_name')));
		return $master_room_plan_fetch_id[0]['master_room_plan']['plan_name'];
	}
	public function master_room_type_fetch($master_type_id)
	{
		$this->loadmodel('master_room_type');
		$conditions=array('id' => $master_type_id);
		$master_room_type_fetch_id=$this->master_room_type->find('all',array('conditions'=>$conditions,'fields'=>array('room_type')));
		return $master_room_type_fetch_id[0]['master_room_type']['room_type'];
	}
	public function fetch_master_outlet($master_outlet_id)
	{
		$this->loadmodel('master_outlets');
		$conditions=array('id' => $master_outlet_id);
		$master_room_type_fetch_id=$this->master_outlets->find('all',array('conditions'=>$conditions,'fields'=>array('outlet_name')));
		return $master_room_type_fetch_id[0]['master_outlets']['outlet_name'];
	}
	public function master_table_no_fetch($master_table_id)
	{
		$this->loadmodel('master_table');
		$conditions=array('id' => $master_table_id);
		$master_table_fetch_id=$this->master_table->find('all',array('conditions'=>$conditions,'fields'=>array('table_no')));
		return @$master_table_fetch_id[0]['master_table']['table_no'];
	}
	public function master_session_no_fetch($master_s_id)
	{
		$this->loadmodel('plan_item_category');
		$conditions=array('id' => $master_s_id);
		$master_session_no_fetch_id=$this->plan_item_category->find('all',array('conditions'=>$conditions,'fields'=>array('item_category')));
		return @$master_session_no_fetch_id[0]['plan_item_category']['item_category'];
	}
	public function master_steward_name_fetch($master_steward_id)
	{
		$this->loadmodel('master_steward');
		$conditions=array('id' => $master_steward_id);
		$master_steward_fetch_id=$this->master_steward->find('all',array('conditions'=>$conditions,'fields'=>array('steward_name')));
		return @$master_steward_fetch_id[0]['master_steward']['steward_name'];
	}
	public function master_card_type_no_fetch($registration_id)
	{
		$this->loadmodel('registration');
		$conditions=array('id' => $registration_id);
		$master_card_type_no_fetch_id=$this->registration->find('all',array('conditions'=>$conditions,'fields'=>array('name','card_id_no')));
		return @$master_card_type_no_fetch_id[0]['registration']['name'];
	}
	public function master_card_type_no_fetch1($registration_id)
	{
		$this->loadmodel('registration');
		$conditions=array('id' => $registration_id);
		$master_card_type_no_fetch_id=$this->registration->find('all',array('conditions'=>$conditions,'fields'=>array('name','card_id_no')));
		return @$master_card_type_no_fetch_id[0]['registration']['card_id_no'];
	}
	
	//////////////////////////Ashish///////////////
	public function company_name($user_id)
    {
        $this->loadmodel('ledger_master');
        $conditions=array('user_id' => $user_id);
        return $fetch=$this->ledger_master->find('all',array('conditions'=>$conditions));
    }
	
	//////////////////////////////////////////
	public function master_roomno_fetch($master_roomno_id)
	{
		$this->loadmodel('master_room_type');
		$conditions=array('id' => $master_roomno_id);
		$master_roomno_fetch_id=$this->master_room_type->find('all',array('conditions'=>$conditions,'fields'=>array('room_type')));
		return @$master_roomno_fetch_id[0]['master_room_type']['room_type'];
	}
	public function company_registration_fetch($company_reg_id)
	{
		$this->loadmodel('company_registration');
		$conditions=array('id' => $company_reg_id);
		$company_registration_fetch_id=$this->company_registration->find('all',array('conditions'=>$conditions,'fields'=>array('company_name')));
		return @$company_registration_fetch_id[0]['company_registration']['company_name'];
	}
	
	public function caretaker_fetch($caretaker_id)
	{
		$this->loadmodel('master_caretaker');
		$conditions=array('id' => $caretaker_id);
		$caretaker_fetch_id=$this->master_caretaker->find('all',array('conditions'=>$conditions,'fields'=>array('caretaker_name')));
		return $caretaker_fetch_id[0]['master_caretaker']['caretaker_name'];
	}
	
	
	public function func_plan_name_fetch($plan_id)
	{
		$this->loadmodel('master_room_plan');
		$conditions=array('id' => $plan_id);
		$plan_name=$this->master_room_plan->find('all',array('conditions'=>$conditions,'fields'=>array('plan_name')));
		return $plan_name[0]['master_room_plan']['plan_name'];
	}
	public function func_room_type_fetch($room_type_id)
	{
		$this->loadmodel('master_room_type');
		$conditions=array('id' => $room_type_id);
		$room_type=$this->master_room_type->find('all',array('conditions'=>$conditions,'fields'=>array('room_type')));
		return $room_type[0]['master_room_type']['room_type'];
	}
	public function company_category_fetch($companycategory_id)//////////////companydiscount returns
    {
        $this->loadmodel('company_category');
        $conditions=array('id' => $companycategory_id);
        $company_category_fetch_id=$this->company_category->find('all',array('conditions'=>$conditions,'fields'=>array('category_name')));
        return $company_category_fetch_id[0]['company_category']['category_name'];
    }
	public function house_keeping_fetch($caretakername)//////////////companydiscount returns
    {
        $this->loadmodel('master_caretaker');
        $conditions=array('id' => $caretakername);
        $house_keeping_fetch_id=$this->master_caretaker->find('all',array('conditions'=>$conditions,'fields'=>array('caretaker_name')));
        return $house_keeping_fetch_id[0]['master_caretaker']['caretaker_name'];
    }
	public function function_ftc_room_report($room_no)
	{
		$this->loadmodel('room_checkin_checkout');
        $conditions=array('master_roomno_id' => $room_no,'status' => 0);
      return  $room_dateils=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
	  exit;
	}
	
	public function company_category_name($company_category_id)
	{
		$this->loadmodel('company_category');
		$conditions=array('id' => $company_category_id);
		$company_category_name=$this->company_category->find('all',array('conditions'=>$conditions,'fields'=>array('category_name')));
		return $company_category_name[0]['company_category']['category_name'];
	}
	public function item_type_name($item_type_id)
	{
		$this->loadmodel('master_item_type');
		$conditions=array('id' => $item_type_id);
		$master_item_type_fetch=$this->master_item_type->find('all',array('conditions'=>$conditions,'fields'=>array('itemtype_name')));
		return $master_item_type_fetch[0]['master_item_type']['itemtype_name'];
	}
	public function fatch_pos_kot_item($id)
	{
		$this->loadmodel('pos_kot_item');
		$conditions=array('pos_kots_id' => $id);
		return $fatch_pos_kot_item=$this->pos_kot_item->find('all',array('conditions'=>$conditions));
	}
	public function master_itemtype_fetch($master_itemtypes_id)///////////////////////report return
	{
		$this->loadmodel('master_item');
		$conditions=array('id' => $master_itemtypes_id);
		$master_itemtype_fetch_id=$this->master_item->find('all',array('conditions'=>$conditions,'fields'=>array('item_name')));
		return @$master_itemtype_fetch_id[0]['master_item']['item_name'];
	}
	
	public function master_itemtypecat_fetch($master_itemtypes_id)///////////////////////report return
	{
		$this->loadmodel('plan_item');
		$conditions=array('id' => $master_itemtypes_id);
		$master_itemtypecat_fetch_id=$this->plan_item->find('all',array('conditions'=>$conditions,'fields'=>array('item_name')));
		return @$master_itemtypecat_fetch_id[0]['plan_item']['item_name'];
	}
	public function master_planitemtype_fetch($master_itemtypess_id)///////////////////////report return
	{
		$this->loadmodel('plan_item');
		$conditions=array('id' => $master_itemtypess_id);
		$master_planitemtype_fetch_id=$this->plan_item->find('all',array('conditions'=>$conditions,'fields'=>array('item_name')));
		return @$master_planitemtype_fetch_id[0]['plan_item']['item_name'];
	}
	public function function_ftc_clean_room_report($room_no)
	{
		$this->loadmodel('room_serviceing');
  		$room_clean_out_order=$this->room_serviceing->find('all',array('conditions'=>array('master_roomno_id' => $room_no), 'order'=>'id DESC','limit'=>1));
	    if(!empty($room_clean_out_order)){return $room_status= $room_clean_out_order[0]['room_serviceing']['room_status'];}
	}
	
	function smtpmailer($to, $from_name, $subject, $message_web,$reply, $is_gmail=true)
	{
		App::import('Vendor', 'PhpMailer', array('file' => 'phpmailer' . DS . 'class.phpmailer.php')); 
	
		global $error;
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		if ($is_gmail) {
	
			$mail->SMTPSecure = 'ssl'; 
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;  
			$mail->Username = 'ankit.sisodiya@spsu.ac.in';  
			$mail->Password = '!QAZSPSU@WSX';
			$mail->SMTPDebug = 1; 
		} else {
			$mail->SMTPSecure = 'ssl'; 
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;  
			$mail->Username = 'ankit.sisodiya@spsu.ac.in';  
			$mail->Password = '!QAZSPSU@WSX';    
		}        
		$HTML = true;	 
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML($HTML);
	
		
		$mail->FromName= $from_name;
	
	$mail->Subject = $subject;
	$mail->Body = $message_web;
	if(!empty($reply))
	{
		$mail->AddReplyTo($reply ,"Nonmoving Inventory");
		
	}
	$mail->addAddress($to);
	
		if(!$mail->Send()) {
			$error = 'Mail error: '.$mail->ErrorInfo;
			return false;
		} else {
			$error = 'Message sent!';
			return true;
		}
	}
	public function send_sms($sms,$mobile_no)
	{ 	
		$working_key='A1d987e6da856f0d2de06aa0456dcb04b';
		$sms_sender='PHPHTL';
		$sms=str_replace(' ', '+', 'Thank you for choosing us for your stay.');
		file_get_contents('http://alerts.sinfini.com/api/web2sms.php?workingkey='.$working_key.'&sender='.$sms_sender.'&to='.$mobile_no.'&message='.$sms.'');
	}
///////////////////////////////////
	
	public function fetch_data_for_kot($room_id)
	{
		$this->loadmodel('pos_kot');
		$conditions=array('master_roomnos_id' => $room_id,'status'=>0);
		$fatch_pos_kot=$this->pos_kot->find('all',array('conditions'=>$conditions));
		$kot_id=$fatch_pos_kot[0]['pos_kot']['id'];
	$this->loadmodel('pos_kot_item');
	$conditions=array('pos_kots_id' => $kot_id);
	return $fatch_pos_kot_item=$this->pos_kot_item->find('all',array('conditions'=>$conditions));
	}
	public function fatch_function_book_select_maltipal($id)
	{
		$this->loadmodel('master_item');
		$conditions=array('master_item_type_id' => $id);
		return $fatch_item=$this->master_item->find('all',array('conditions'=>$conditions));
	}
	
	public function fatch_function_book_select_maltipall($id)
	{
		$this->loadmodel('master_item');
		$conditions=array('master_item_type_id' => $id);
		return $fatch_item=$this->master_item->find('all',array('conditions'=>$conditions));
	}
	
	
	//////////////////////////////////////////////////////////////////////////////
	/*public function fetch_data_for_receipt($room_id)
	{

		$this->loadmodel('receipt_checkout');
		$conditions=array('room_no' => $room_id);
		$fatch_pos_receipt=$this->receipt_checkout->find('all',array('conditions'=>$conditions));
			$rc_id=$fatch_pos_receipt[0]['receipt_checkout']['id'];
	return $fatch_pos_receipt_item=$this->receipt_checkout->find('all',array('conditions'=>$conditions));

	}*/

	
	/*public function fetch_dat_for_receipt($id)
	{
		$this->loadmodel('room_checkin_checkout');
		$conditions=array('card_no' => $id);
		return $fetch_dat_for_receipt=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
	

	}
	*/
	public function check_reserv_chackin($id)
	{
		$this->loadmodel('room_checkin_checkout');
		$conditions=array('room_reservation_id' => $id);
		return $fetch=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
	}
	public function plan_kot_combo($id)
	{
		$this->loadmodel('room_checkin_checkout');
		$conditions=array('plan_id' => $id);
		return $fetch=$this->room_checkin_checkout->find('all',array('conditions'=>$conditions));
	}
	public function fetch_data_for_receipt($card,$room)
	{
	
		$this->loadmodel('receipt_checkout');
		$conditions=array('card_no' => $card , 'room_no' => $room);
		return $fetch_data_for_receipt=$this->receipt_checkout->find('all',array('conditions'=>$conditions));
	}
	public function fetch_data_for_receiptt($card, $id)
	{
	
		$this->loadmodel('checkout');
		$conditions=array('card_no' => $card, 'check_id' => $id);
		return $fetch_data_for_receiptt=$this->checkout->find('all',array('conditions'=>$conditions));
	}
	public function fetch_data_for_receippptt($card_no,$id)
	{
	
		$this->loadmodel('checkout');
		$conditions=array('check_id' => $id,'card_no' => $card_no);
		return $fetch_data_for_receippptt=$this->checkout->find('all',array('conditions'=>$conditions));
	}
	
	public function fetch_fun_data_for_receipt($idd,$f_no)
	{
	
		$this->loadmodel('receipt_checkout');
		$conditions=array('fun_bill_no_id' => $idd, 'function_no' => $f_no);
		return $fetch_fun_data_for_receipt=$this->receipt_checkout->find('all',array('conditions'=>$conditions));
	}
	
	public function fetch_data_for_receipttt($card,$room, $id)
	{
	
		$this->loadmodel('receipt_checkout');
		$conditions=array('card_no' => $card, 'master_roomno_id' => $room, 'house_keeping_id' => $id);
		return $fetch_data_for_receipttt=$this->receipt_checkout->find('all',array('conditions'=>$conditions));
	}
	
	public function fetch_data_for_house($id)
	{
	
		$this->loadmodel('house_keeping');
		$conditions=array('id' => $id);
		return $fetch_data_for_house=$this->house_keeping->find('all',array('conditions'=>$conditions));
	}
	
	public function fetch_dataa_for_receiptt($card,$room)
	{
	
		$this->loadmodel('paid_receipt');
		$conditions=array('card_no' => $card , 'master_roomno_id' => $room);
		return $fetch_dataa_for_receiptt=$this->paid_receipt->find('all',array('conditions'=>$conditions));
	}
	
	public function fetch_cashier_data_for_receipt($recpt)
	{
		$this->loadmodel('receipt_checkout');
		$conditions=array('recpt_type' => $recpt);
		return $fetch_cashier_data_for_receipt=$this->receipt_checkout->find('all',array('conditions'=>$conditions));
	}
	
	public function fetch_dataa_for_receipt($id)
	{
		$this->loadmodel('paid_receipt');
		$conditions=array('card_no' => $id);
		return $fetch_dataa_for_receipt=$this->paid_receipt->find('all',array('conditions'=>$conditions));
	}
	
	
	function journal(){
		$this->layout='index_layout';
		
		$this->loadmodel('ledger_master');
		$ledger_accounts=$this->ledger_master->find('all', array('fields' => array('name','id')));
		$this->set(compact('ledger_accounts'));
		
		if(isset($this->request->data['submit'])){
			$ledger_accounts=$this->request->data;
			
			
			$this->loadmodel('ledger');
			$fetch_transaction_id=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Journal')));
			$transaction_id=$fetch_transaction_id+1;
			$transaction_type='Journal';
			
			$this->loadmodel('ledger');
			$this->ledger->saveAll(array('transaction_id' => $transaction_id,'transaction_type' => $transaction_type, 'transaction_date' => date("Y-m-d"), 'narration' => "", 'date' => date("Y-m-d")));
			$ledgerID=(int)$this->ledger->getLastInsertID();
			
			for($i=0; $i<sizeof($ledger_accounts['ledger_account']); $i++)
			{
				$ledger_account_id=$ledger_accounts['ledger_account'][$i];
				$amount=$ledger_accounts['amount'][$i];
				 $amount_type=$ledger_accounts['amount_type'][$i];
				if($amount_type=="debit"){ $dr=$amount; $cr=0; }
				if($amount_type=="credit"){ $dr=0; $cr=$amount; }
				
				
				$this->loadmodel('ledger_cr_dr');
				$this->ledger_cr_dr->saveAll(array('ledger_id' => $ledgerID,'ledger_master_id' => $ledger_account_id,'cr' => $cr, 'dr' => $dr));
				
			}
			
		}
	}
	
	function journal_vouchers(){
		$this->layout='index_layout';
		
		$this->loadmodel('ledger');
		$conditions=array('transaction_type' => "Journal");
		$Journals=$this->ledger->find('all',array('conditions'=>$conditions));
		$this->set(compact('Journals'));
	}
	
	function fetch_journal_info($ledger_id){
		$this->loadmodel('ledger_cr_dr');
		$conditions=array('ledger_id' => $ledger_id);
		return $this->ledger_cr_dr->find('all',array('conditions'=>$conditions));
	}
	
	function fetch_ledger_master_name($ledger_master_id){
		$this->loadmodel('ledger_master');
		$conditions=array('id' => $ledger_master_id);
		$ledger_master_id=$this->ledger_master->find('all',array('conditions'=>$conditions));
		return $ledger_master_id[0]["ledger_master"]["name"];
	}
	
	function purches_voucher(){
		$this->layout='index_layout';
		
		$this->loadmodel('ledger_master');
		$conditions=array('ledger_category_id' => 3);
		$Suppliers=$this->ledger_master->find('all', array('conditions'=>$conditions,'fields' => array('name','id')));
		$this->set(compact('Suppliers'));
		
		if(isset($this->request->data['submit'])){
			$supplier_id=$this->request->data["supplier"];
			$amount=$this->request->data["amount"];
			$bill=$this->request->data["bill"];
			$narration=$this->request->data["narration"];
			
			$this->loadmodel('ledger');
			$fetch_transaction_id=$this->ledger->find('count',array('conditions'=>array('transaction_type'=>'Purches Voucher')));
			$transaction_id=$fetch_transaction_id+1;
			$transaction_type='Purches Voucher';
			
			$this->loadmodel('ledger');
			$this->ledger->saveAll(array('transaction_id' => $transaction_id,'transaction_type' => $transaction_type, 'transaction_date' => date("Y-m-d"), 'narration' => $narration, 'date' => date("Y-m-d")));
			$ledgerID=(int)$this->ledger->getLastInsertID();
			
			$this->loadmodel('ledger_cr_dr');
			$this->ledger_cr_dr->saveAll(array('ledger_id' => $ledgerID,'ledger_master_id' => $supplier_id,'cr' => 0, 'dr' => $amount));
			
			$this->loadmodel('ledger_cr_dr');
			$this->ledger_cr_dr->saveAll(array('ledger_id' => $ledgerID,'ledger_master_id' => 35,'cr' => $amount, 'dr' => 0));
		}
	}
	
	function purches_vouchers(){
		$this->layout='index_layout';
		
		$this->loadmodel('ledger');
		$conditions=array('transaction_type' => "Purches Voucher");
		$Suppliers=$this->ledger->find('all',array('conditions'=>$conditions));
		$this->set(compact('Suppliers'));
	}
	
	function advance_receipt(){
		$this->layout='index_layout';
       
        $this->loadmodel('ledger_category');
		$this->set('fetch_ledger_category', $this->ledger_category->find('all'));
	}
    ///////////////////   End Php Function /////////////////////////////////////////////
	function ajax_function()
	{
		?>
        <script src="<?php echo $this->webroot; ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script>
		
		function registration_addrow()
		{ 
			var c=$('#next_row').val();
			c++;
			var w=$('#exct_row').val();
			var exct_row=w+","+c;
			$('#exct_row').val(exct_row);
			
			$('#next_row').val(c);
			var query="?row=" + encodeURIComponent(c);
			//alert(c);
			$.ajax({
				url: "reg_add_row"+query,
			}).done(function(data) {
				$("#nxt_row").append(data);
				//$("#add_btn").hide();
			});
		}
		function registration_removerow(id)
		{
			var all_id=$('#exct_row').val();
			var  result=[];
			result = all_id.split(","); 
			delete result[id-1];
			$('#exct_row').val(result);
			//alert(result);
			if(id>1)
			{
				$('#removeid' + id).remove();
				id--; 
			}
		}
		
		$(document).ready(function()
		{
      		$('#editoption_tax_name').live('change',function(e){
			 			 $("#edit_name").val($('option:selected', this).attr("edit_nm"));
		                 $("#edit_tax_app").val($('option:selected', this).attr("edit_tx_ap"));
			});
						 $('#editoption_category').live('change',function(e){
			 			 $("#edit_category").val($('option:selected', this).attr("edit_cat"));
			});
				$('#editoption_currency').live('change',function(e){
			 			 $("#edit_currency").val($('option:selected', this).attr("edit_cur"));
						 $("#edit_rate").val($('option:selected', this).attr("edit_rt"));
			});
			$('#editoption_master_table').live('change',function(e){
			 			 $("#edit_capacity").val($('option:selected', this).attr("edit_tc"));
			 			 $("#edit_table_no").val($('option:selected', this).attr("edit_tn"));
			});
			$('#editoption_discount').live('change',function(e){
			$("#edit_discount").val($('option:selected', this).attr("edit_dis"));
            $("#edit_other_discount").val($('option:selected', this).attr("edit_diss"));
			});
			$('#editoption_registration').live('change',function(e){
			$("#edit_company_name").val($('option:selected', this).attr("edit_cn"));
            $("#edit_complete_address").val($('option:selected', this).attr("edit_ca"));
			$("#edit_authorized_person_name").val($('option:selected', this).attr("edit_apn"));
            $("#edit_authorized_contact_no").val($('option:selected', this).attr("edit_acn"));
            $("#edit_authorized_email_id").val($('option:selected', this).attr("edit_aeid"));
            $("#edit_master_plan_id").val($('option:selected', this).attr("edit_mpid"));
			});
			$('#update_room_checkout').live('change',function(e){
				$("#edit_guest_name").val($('option:selected', this).attr("edit_gname"));
				$("#edit_room_type_id").val($('option:selected', this).attr("edit_rtype"));
				$("#edit_arrival_date").val($('option:selected', this).attr("edit_adate"));
				$("#edit_plan_id").val($('option:selected', this).attr("edit_plan"));
				$("#edit_billing_instruction").val($('option:selected', this).attr("edit_bi"));
				$("#edit_duration").val($('option:selected', this).attr("edit_dt"));
				var edit_source_of_booking=$('option:selected', this).attr("edit_sob");
				$("#edit_pax").val($('option:selected', this).attr("edit_px"));
				$("#edit_child").val($('option:selected', this).attr("edit_ch"));
				$("#edit_room_charge").val($('option:selected', this).attr("edit_rc"));
				$("#edit_advance_taken").val($('option:selected', this).attr("edit_at"));
				$("#edit_total_room").val($('option:selected', this).attr("edit_troom"));
				$("#edit_taxes").val($('option:selected', this).attr("edit_tx"));
				$("#edit_room_discount").val($('option:selected', this).attr("edit_disc"));
				
				$("#edit_master_items_id").val($('option:selected', this).attr("edit_posi"));
				$("#edit_quantity").val($('option:selected', this).attr("edit_posq"));
				$("#edit_rate").val($('option:selected', this).attr("edit_posr"));
				$("#edit_gross").val($('option:selected', this).attr("edit_posg"));
				$("#edit_tax").val($('option:selected', this).attr("edit_post"));
				$("#edit_amount").val($('option:selected', this).attr("edit_posa"));
				
				
				
				$(':radio').each(function(){
					$(this).removeAttr('checked');
					$(this).closest('span').removeAttr('class');
				    if(edit_source_of_booking==$(this).val())
					{
						$(this).attr('checked', 'checked');
						$(this).closest('span').attr('class', 'checked');
					}
				});
            });
		});
		</script>
        <?php
	}
}
?>
