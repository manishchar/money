<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scheme extends CI_Controller {
	public function index()
	{
		$data['title']= "Member for RD";
		$data['page_title']= "Member for RD";
		if(isset($_POST['search'])){
			$this->form_validation->set_rules('membership', 'Member ship Number', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('member_search',$data);
			}else{
				$membership = $this->input->post('membership');
				redirect('scheme/openRd/'.$membership);
				//echo "Success ".$membership;
			}
		}else{
				$this->load->view('member_search',$data);
		}		
	}


	public function deposit()
	{
		$data['title']= "Dposit";
		$data['page_title']= "Dposit";
		$data['id']= "";
		if(isset($_POST['search'])){
			$this->form_validation->set_rules('membership', 'Member ship Number', 'required');
			if ($this->form_validation->run() == FALSE){
				//$this->load->view('member_search',$data);
			}else{
				$membership = $this->input->post('membership');
				$user = customerData($membership);
				if(empty($user) || count($user)<0){
					$this->session->set_flashdata('error','Invalid Membership Number');
					redirect(base_url('scheme/deposit'));
				}
				$data['id']= $membership;
				$data['schemes']=$this->db->select('tab1.*,tab2.name,tab2.duration')->join('mst_rd as tab2','tab2.id=tab1.schemeId')->where('tab1.memberId',$membership)->get('open_rd as tab1')->result();
				

				//redirect('scheme/openRd/'.$membership);
				//echo "Success ".$membership;
			}
		}else{
				//$this->load->view('member_search',$data);
		}		
		$this->load->view('member_search',$data);
	}

	public function viewRd()
	{
		
		$data['title']= "RD List";
		$data['page_title']= "RD List";

		$data['rds']= $this->db->select('tab1.*,tab3.fname,tab3.lname,tab2.name')
						->join('mst_rd as tab2','tab1.schemeId = tab2.id')
						->join('user as tab3','tab1.memberId = tab3.id')
						->get('open_rd as tab1')->result();
		$this->load->view('view_rd',$data);
		//redirect('/welcome/dashboard');
	}
	public function openRd($id)
	{
		$data['id']= $id;
		$user = customerData($id);
		if(empty($user) || count($user)<0){
			$this->session->set_flashdata('error','Invalid Membership Number');
			redirect(base_url('scheme'));
		}
		//die;
		$data['title']= "RD";
		$data['page_title']= "RD";
		$data['rds']= $this->db->get('mst_rd')->result();
		$this->load->view('open_rd',$data);
		//redirect('/welcome/dashboard');
	}
	public function gold()
	{
		$data['title']= "Add Gold";
		$data['page_title']= "Add Gold";
		$data['golds'] = $this->db->get('gold')->result();
		if($this->input->post()){
$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('amount', 'Amount', 'required');
$this->form_validation->set_rules('qty', 'Quantity', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('add_gold',$data);
			}else{
				$name = $this->input->post('name');
				$amount = $this->input->post('amount');
				$qty = $this->input->post('qty');
				$gold = array(
					'name'=>$name,
					'amount'=>$amount,
					'qty'=>$qty
				);
				if($this->db->insert('gold',$gold)){
					$this->session->set_flashdata('message','Record Add Successfully');
				}else{
					$this->session->set_flashdata('error','Record Save Failed');
				}
				redirect('master/gold');
			}
		}else{
			$this->load->view('add_gold',$data);
		}
	}


public function rd()
	{
		$data['title']= "Add RD";
		$data['page_title']= "Add RD";
		$data['rds'] = $this->db->get('mst_rd')->result();
		if($this->input->post()){
$this->form_validation->set_rules('rd_name', 'RD Name', 'required');
$this->form_validation->set_rules('rd_amount', 'RD Amount', 'required');
$this->form_validation->set_rules('rd_duration', 'RD Duration', 'required');
$this->form_validation->set_rules('rd_interest', 'RD Intrest', 'required');
$this->form_validation->set_rules('rd_principal', 'RD Principal', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('add_rd',$data);
			}else{
				$name = $this->input->post('rd_name');
				$amount = $this->input->post('rd_amount');
				$duration = $this->input->post('rd_duration');
				$interest = $this->input->post('rd_interest');
				$principal = $this->input->post('rd_principal');
				$rd = array(
					'name'=>$name,
					'amount'=>$amount,
					'duration'=>$duration,
					'interest'=>$interest,
					'principal'=>$principal
				);
				// print_r($rd);
				// die;
				if($this->db->insert('mst_rd',$rd)){
					$this->session->set_flashdata('message','Record Add Successfully');
				}else{
					$this->session->set_flashdata('error','Record Save Failed');
				}
				redirect('master/rd');
			}
		}else{
			$this->load->view('add_rd',$data);
		}
	}

	public function member()
	{
		$data['roles'] = $this->db->get('role')->result();
		if($this->input->post()){
			$this->form_validation->set_rules('fname', 'First Name', 'required');
$this->form_validation->set_rules('lname', 'Last Name', 'required');
$this->form_validation->set_rules('mobile', 'Mobile number', 'required');
$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('role_id', 'Role', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('member',$data);
			}
			else
			{
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$role_id = $this->input->post('role_id');

				$user = array(
					'role_id'=>$role_id,
					'fname'=>$fname,
					'lname'=>$lname,
					'mobile'=>$mobile,
					'email'=>$email,
					'password'=>sha1('123456'),

				);
				if($this->db->insert('user',$user)){
					$this->session->set_flashdata('message','User Save Successfully');
				}else{
					$this->session->set_flashdata('error','User Save Failed');
				}
				redirect('welcome/member');
			    //$this->load->view('formsuccess');
			}
		}else{
			$this->load->view('member',$data);
		}
	}
	public function member_view()
	{

		$data['members'] = $this->db->select('tab1.*,tab2.role_name')->join('role as tab2','tab1.role_id=tab2.id')->get('user as tab1')->result();
		$this->load->view('view_member',$data);
	}

	public function getScheme(){
		$id = $this->input->post('id');
		$result = $this->db->where('id',$id)->get('mst_rd')->row();
		echo json_encode($result);
	}
	public function getEmi(){
		$instalment = $this->input->post('instalment');
		$interest_pre = $this->input->post('interest');
		$amount = $this->input->post('amount');
		$number = $this->input->post('number');
		$format = $this->input->post('format');
		if($format == '1'){
			$formatFlag = "day";
		}else{
			$formatFlag = "month";
		}

		$interest_amount = ($amount*$interest_pre)/100;
		$principal = floor($amount/$instalment);
		$interest = floor($interest_amount/$instalment);
		$r_principal=$amount;
		$r_interest = $interest_amount;
		$memberId = $this->input->post('memberId');
		$schemeId = $this->input->post('schemeId');

		$emiResult = $this->db->where('memberId',$memberId)->where('schemeId',$schemeId)->get('open_rd')->num_rows();
if($emiResult == 0){
		$html = '';
		$html .="<input type='hidden' name='number' value='".$number."'>";
		$html .="<input type='hidden' name='format' value='".$format."'>";
		$html .="<input type='hidden' name='amount' value='".$amount."'>";
		$html .="<input type='hidden' name='instalment' value='".$instalment."'>";
		$html .="<input type='hidden' name='interest_pre' value='".$interest_pre."'>";
		$html .="<input type='hidden' name='memberId' value='".$memberId."'>";
		$html .="<input type='hidden' name='schemeId' value='".$schemeId."'>";
		$html .= '<thead>
                <tr>
                  <th class="wd-15p">Inst No</th>
                  <th class="wd-15p">Inst Date</th>
                  <th class="wd-15p">Principal</th>
                  <th class="wd-20p">Intrest</th>
                  <th class="wd-20p">Amount</th>
                  <th class="wd-20p">R_Principal</th>
                  <th class="wd-20p">R_Intrest</th>
                  <th class="wd-15p">Status</th>
                  
                </tr>
              </thead>';
$emi_date = date('Y-m-d H:i:s');
for($i=1;$i<=$instalment;$i++){
	$r_principal = $r_principal-$principal;
	$r_interest = $r_interest - $interest;
	$start_date = $emi_date;
$emi_date = date('Y-m-d H:i:s', strtotime($start_date . ' +'.$number.' '.$formatFlag));

	if($i== $instalment){
		$principal +=$r_principal;
		$interest +=$r_interest;
		$r_interest=$r_principal=0;
	}
	$html .= "<tr>";
	$html .= "<td><input class='form-control' type='text' name='emiNumber[]' value='".$i."' readonly=''></td>";
	$html .= "<td><input type='text' class='form-control' name='emiDate[]' value='".$emi_date."' readonly=''></td>";
	$html .= "<td><input type='text' class='form-control' name='principal[]' value='".$principal."' readonly=''></td>";
	$html .= "<td><input type='text' class='form-control' name='interest[]' value='".$interest."' readonly=''></td>";
	$html .= "<td><input type='text' class='form-control' name='total[]' value='".($principal+$interest)."' readonly=''></td>";
	$html .= "<td><input type='text' class='form-control' name='r_principal[]' value='".$r_principal."' readonly=''></td>";
	$html .= "<td><input type='text' class='form-control' name='r_interest[]' value='".$r_interest."' readonly=''></td>";
	$html .= "<td class='text text-danger'><input type='hidden' name='status[]' value='0' readonly=''>UNPAID</td>";
	$html .= "</tr>";
}
$html .= "<tr><td colspan='8'><button type='submit'>Save</button></td></tr>";

$response = array('status'=>'success','message'=>'Generate Emi','data'=>$html);
}else{
	$response = array('status'=>'duplicate','message'=>'Already Running This Scheme');
}
echo json_encode($response);

	}

	public function saveEmi(){
		$memberId = $this->input->post('memberId');
		$schemeId = $this->input->post('schemeId');
		$number = $this->input->post('number');
		$format = $this->input->post('format');
		$amount = $this->input->post('amount');
		$instalment = $this->input->post('instalment');
		$interest_pre = $this->input->post('interest_pre');


		

		$emiNumber = $this->input->post('emiNumber');
		$emiDate = $this->input->post('emiDate');
		$principal = $this->input->post('principal');
		$interest = $this->input->post('interest');
		$paidAmount = $this->input->post('total');
		$r_principal = $this->input->post('r_principal');
		$r_interest = $this->input->post('r_interest');
		$status = $this->input->post('status');
		$emiResult = $this->db->where('memberId',$memberId)->where('schemeId',$schemeId)->get('open_rd')->num_rows();
		
if($emiResult == 0){		
foreach ($emiNumber as $key => $emiNumbervalue) {
	$emi_data = array(
				'memberId'		=>$memberId,
				'schemeId'		=>$schemeId,
				'emiNumber'		=>$emiNumber[$key],
				'emiDate'		=>$emiDate[$key],
				'principal'		=>$principal[$key],
				'interest'		=>$interest[$key],
				'paidAmount'	=>$paidAmount[$key],
				'r_principal'	=>$r_principal[$key],
				'r_interest'	=>$r_interest[$key],
				'status'		=>$status[$key],
			);
	$emi[]= $emi_data;
}

$rd = array(
			'memberId'=> $memberId,
			'schemeId'=> $schemeId,
			'amount'=> $amount,
			'days'=> $number,
			'type'=> $format,
			'numberOfInstallment'=> $instalment,
			'interest'=> $interest_pre,
			);

$this->db->trans_begin();

$this->db->insert_batch('emi',$emi);
$this->db->insert('open_rd',$rd);

if ($this->db->trans_status() === FALSE)
{
        $this->db->trans_rollback();
        $response = array('status'=>'failed','message'=>'Record Failed');
}
else
{
        $this->db->trans_commit();
        $response = array('status'=>'success','message'=>'Record Save Successfully');
}
	

}else{
	$response = array('status'=>'duplicate','message'=>'Record Already Exist');
}
		
//$response = array('status'=>'success','message'=>'Record Save Successfully');
//$response = array('status'=>'failed','message'=>'Record Failed');
		echo json_encode($response);
	}

	public function approve($id){
		if($id !=''){
		$flag= $this->db->where('id',$id)->update('open_rd',array('status'=>'1'));
		if($flag){
$this->session->set_flashdata('message','Approve Successfull');
		}else{
			$this->session->set_flashdata('error','Approve Failed');
		}
	}else{
			$this->session->set_flashdata('error','Invalid Rd');
	}
	
		redirect(base_url().'scheme/viewRd');
	}

	public function reject($id){
		if($id !=''){
		$flag= $this->db->where('id',$id)->update('open_rd',array('status'=>'2'));
		if($flag){
$this->session->set_flashdata('message','Reject Successfull');
		}else{
			$this->session->set_flashdata('error','Reject Operaton Failed');
		}
	}else{
			$this->session->set_flashdata('error','Invalid Rd');
	}	
	redirect(base_url().'scheme/viewRd');
	}
	
	public function instalmentList($id,$schemeId){
		if($id){
		$data['title']= "View Instalment";
		$data['page_title']= "View Instalment";
		//$memberId = $this->session->userdata('login')['id'];
		$data['Instalments']= $this->db->select('tab1.*,tab2.name,tab2.duration')
		->join('mst_rd as tab2','tab2.id=tab1.schemeId')
		->where('tab1.memberId',$id)->where('tab1.schemeId',$schemeId)->get('emi as tab1')->result();
		//print_r($data);die;
		$this->load->view('view_instalment',$data);
	}else{
		redirect(base_url('scheme/deposit') );
	}
	}
	public function instalment(){
		$data['title']= "View Instalment";
		$data['page_title']= "View Instalment";
		$memberId = $this->session->userdata('login')['id'];
		$data['Instalments']= $this->db->select('tab1.*,tab2.name,tab2.duration')
		->join('mst_rd as tab2','tab2.id=tab1.schemeId')
		->where('tab1.memberId',$memberId)->get('emi as tab1')->result();
		//print_r($data);die;
		$this->load->view('view_instalment',$data);
	}

	public function diposit(){
		echo "diposit";
	}


}
