<?php
class contact_controller extends vendor_main_controller
{
	public function index() {
		if(isset($_POST['btn_submit'])) {
			$msg;
			$ct = new contact_model();
			$contactData = $_POST['contact'];
			$valid = $ct->validator($contactData);
			if($valid['status']) {
				//sent email
				$mTo = AdminEmail;
				$title="CONTACT_US";
				$nTo = $contactData['email'];
				$from = $contactData['email'];
				$content = "<h3> By ".$contactData['firstname']." ".$contactData['lastname']."</h3>
			  	<p>Content :<br>".$contactData['content'];
				vendor_app_util::sendMailContact($title, $content, $nTo, $mTo,$from);
				$this->msg = "Thank you !";
			} else {
				//error
			 	$this->errors = $ct::convertErrorMessage($valid['message']);
			}
		}
		$this->display();
	}
}
?>
