<?  /* Template Name: page-apply.php */?>
<? $client = new ApiClient(); ?>
<? if (isset($_POST['action'])):?>
<?
$url = home_url( '/' );
$u_loan_amount          = (int)str_replace(',', '', $_POST["loan_amount"]);
$u_loan_days            = (int)$_POST["loan_days"];
$u_loan_product_id      = $_POST["ProductId"];
$u_loan_spec_offer_id   = $_POST["SpecOfferId"]; //Куда это?
$u_loan_amount_to_pay   = $_POST["AmountToPay"];
$u_loan_apr             = $_POST["Apr"];
$u_loan_fee_amount      = $_POST["FeeAmount"];
$u_loan_interest_amount = $_POST["InterestAmount"];
$u_loan_due_date        = $_POST["DateDue"];

$u_first_name          = $_POST["first_name"];
$u_last_name           = $_POST["last_name"];
$u_jmbg                = $_POST["jmbg"];
$u_private_card        = $_POST["private_card"];
$u_phone               = str_replace(['(', ')', '-', ' '], ['', '', '', ''], $_POST["phone"]);
$u_email               = $_POST["email"];
$user_password         = $_POST["pass_confirmation"];
$user_confirm_password = $_POST["pass"];


$existingClients = $client->getClientRepository()->search([
	'DocTypeID' => Constants::CONSTANTS['RegDocumentType']['Jmbg'],
	'DocNumber' => $u_jmbg
]);

if(count($existingClients) > 0){
	header('HTTP/1.1 200 OK');
    header('Location: '.$url.'log-in/');
	die("Клиент с JMBG " . $u_jmbg . " уже существует");
}
else{
	if($user_password === $user_confirm_password){
		$client_id = CreateClient($u_first_name, $u_last_name, $u_jmbg, $u_private_card, $u_phone, $u_email);

		$password_hash = $client->getHash($client_id, $user_password);

		global $wpdb;
		$wpdb->query($wpdb->prepare("INSERT INTO clients (email, phone, password, client_id) VALUES (%s, %s, %s, %s)", $u_email, $u_phone, $password_hash, $client_id));

		$loan_id = CreateLoanApplication(
		        $client_id,
				$u_loan_product_id,
                $u_loan_amount,
                $u_loan_days,
				$u_loan_amount_to_pay,
				$u_loan_apr,
				$u_loan_fee_amount,
				$u_loan_interest_amount,
				$u_loan_due_date
        );

        echo '<script type="text/javascript"> location.replace("'.$url.'success/?loanId='.$loan_id.'");</script>';
	}
}


?>
<!--?
print_r($_POST);
$client_id;
$loan_id;
?-->

<?else:endif;?>
<?
get_header();
$min_mkd      = get_field('min_mkd',      'option');
$max_mkd      = get_field('max_mkd',      'option');
$min_days     = get_field('min_days',     'option');
$max_days     = get_field('max_days',     'option');
$url          = home_url( '/' );
?>

    <? require_once(TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
	<section class="bump-bottom-md">
		<div class="container">

			<h1 class="extra-bold bump-top-md bump-bottom-md"><? echo __( 'Apply for a Loan', 'forzatheme' ); ?></h1>


<!-- 0101006500006 -->
<!-- 4ABC123GH -->
			<div class="row">
				<div class="col-lg-8 col-xl-9 bump-bottom-sm">
					<div class="row bump-bottom-sm">
						<div class="col-lg-4">
							<div class="step step-icon-slider">
								<strong>1.</strong> <? echo __( 'Select Your Terms', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
						<div class="col-lg-4 text-center">
							<div class="step active step-icon-form">
								<strong>2.</strong> <? echo __( 'Give Your Details', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
						<div class="col-lg-4 active text-right">
							<div class="step final step-icon-coins">
								<strong>3.</strong> <? echo __( 'Receive Money', 'forzatheme' ); ?>
							</div>
						</div><!--End Col 4-->
					</div><!--End Row-->
                   <form action=""  method="POST" id="application-form-step2">
					<!--form action="<? //echo $url;?>success/" method="POST" id="application-form-step2"-->
                    <input  name="loan_amount" id="loan_amount" type="hidden" value="<? echo $_POST['loan_amount']; ?>" >
                    <input  name="loan_days" id="loan_days" type="hidden" value="<? echo $_POST['loan_days']; ?>" >
                    
                    <input name="ProductId" id="ProductId" value="<? echo $_POST['ProductId']; ?>" type="hidden">
                    <input name="SpecOfferId" id="SpecOfferId" value="<? echo $_POST['SpecOfferId']; ?>" type="hidden">
                    <input name="AmountToPay" id="AmountToPay" value="<? echo $_POST['AmountToPay']; ?>" type="hidden">
                    <input name="Apr" id="Apr" value="<? echo $_POST['Apr']; ?>" type="hidden">
                    <input name="FeeAmount" id="FeeAmount" value="<? echo $_POST['FeeAmount']; ?>" type="hidden">
                    <input name="InterestAmount" id="InterestAmount" value="<? echo $_POST['InterestAmount']; ?>" type="hidden">
                    <input name="RepaymentDate" id="RepaymentDate" value="<? echo $_POST['RepaymentDate']; ?>" type="hidden">
                    <input name="RepaymentDay" id="RepaymentDay" value="<? echo $_POST['RepaymentDay']; ?>" type="hidden">
                    <input name="RepaymentMonth" id="RepaymentMonth" value="<? echo $_POST['RepaymentMonth']; ?>" type="hidden">
                    <input name="Amount" id="Amount" value="<? echo $_POST['Amount']; ?>" type="hidden">
                    <input name="Term" id="Term" value="<? echo $_POST['Term']; ?>" type="hidden">
                    <input name="DateDue" id="DateDue" value="<? echo $_POST['DateDue']; ?>" type="hidden">

						<div class="row">
							<div class="col-xl-6">
								<div class="form-group">
									<label for="first_name"><? echo __( 'First Name', 'forzatheme' ); ?></label>
									<input class="form-control" name="first_name" id="first_name" placeholder="<? echo __( 'Enter your first name', 'forzatheme' ); ?>"
										data-validation="required"
										data-validation-error-msg="<? echo __( 'Please enter your first name', 'forzatheme' ); ?>"
										data-sanitize="trim">
								</div>
							</div><!--End Col 6-->

							<div class="col-xl-6">
								<div class="form-group">
									<label for="last_name"><? echo __( 'Last Name', 'forzatheme' ); ?></label>
									<input class="form-control" name="last_name" id="last_name" placeholder="<? echo __( 'Enter your last name', 'forzatheme' ); ?>"
									data-validation="required"
									data-validation-error-msg="<? echo __( 'Please enter your last name', 'forzatheme' ); ?>"
									data-sanitize="trim">
								</div>
							</div><!--End Col 6-->
						</div><!--End Row-->

						<div class="row">
							<div class="col-xl-6">
								<div class="form-group">
									<label for="jmbg"><? echo __( 'JMBG', 'forzatheme' ); ?> <span class="txt-grey light p14"><? echo __( '(Your 13 digit unique master citizen number)', 'forzatheme' ); ?></span></label>
									<input class="form-control jmbg-mask has-help" name="jmbg" id="jmbg" placeholder="<? echo __( 'DDMMYYYRRBBBK', 'forzatheme' ); ?>" type="tel"
									data-validation="custom"
									data-validation-regexp="^(3[01]|[12][0-9]|0[1-9])(1[012]|0[1-9])((?:9|0)\d{2})(\d{2})(\d{3})(\d)$"
									data-validation-error-msg="<? echo __( 'Please enter your JMBG (13 digits)', 'forzatheme' ); ?>"
									data-sanitize="trim">
									<span class="helper"><? echo __( 'Example: DDMMYYYRRBBBK', 'forzatheme' ); ?></span>
								</div>
							</div><!--End Col 6-->
							<div class="col-xl-6">
								<div class="form-group">
									<label for="private_card"><? echo __( 'ID Card No.', 'forzatheme' ); ?></label>
									<input class="form-control has-help" name="private_card" id="private_card" placeholder="<? echo __( '4ABC123GH', 'forzatheme' ); ?>"
									data-validation="required"
									data-validation-error-msg="<? echo __( 'Please enter your ID Card', 'forzatheme' ); ?>"
									data-sanitize="trim upper">
									<span class="helper"><? echo __( 'Example: 4ABC123GH', 'forzatheme' ); ?></span>
								</div>
							</div><!--End Col 6-->
						</div><!--End Row-->

						  <div class="row">
							<div class="col-xl-6">
								<div class="form-group">
									<label name="phone"><? echo __( 'Phone', 'forzatheme' ); ?> <span class="txt-grey light p14"><? echo __( '(For receiving code to log in to your account)', 'forzatheme' ); ?></span></label>
									<input class="form-control phone-mask has-help" name="phone" id="phone" placeholder="(061) 123-456" type="tel"
									data-validation="custom"
									data-validation-regexp="^(\(\d{3}\))\s(\d{3})\-(\d{3})$"
									data-validation-error-msg="<? echo __( 'Please enter your telephone number (9 digits)', 'forzatheme' ); ?>"
									data-sanitize="trim">
									<span class="helper"><? echo __( 'Example: (061) 123-456', 'forzatheme' ); ?></span>
								</div>
							</div><!--End Col 6-->
							<div class="col-xl-6">
								<div class="form-group">
									<label for="email"><? echo __( 'Email', 'forzatheme' ); ?> <span class="txt-grey light p14"><? echo __( '(Optional)', 'forzatheme' ); ?></span></label>
									<input class="form-control" name="email" id="email" placeholder="example@email.com" type="email"
									data-validation="email"
									data-validation-optional="true"
									data-sanitize="trim lower">
								</div>
							</div><!--End Col 6-->
                           </div>
                           <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="first_name"><? echo __( 'Password', 'forzatheme' ); ?></label>
                                        <input  class="form-control" name="pass_confirmation" id="password"  placeholder="***********"
                                               data-validation="length"
                                               data-validation-length="min8"
                                               data-validation-error-msg="<? echo __( 'Please enter password', 'forzatheme' ); ?>"
                                               data-sanitize="trim">
                                    </div>
                                </div><!--End Col 6-->

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="last_name"><? echo __( 'Confirm Password', 'forzatheme' ); ?></label>
                                        <input  class="form-control" name="pass" id="confirm_password" placeholder="***********"
                                               data-validation="confirmation"
                                               data-validation-error-msg="<? echo __( 'Please confirm the password', 'forzatheme' ); ?>"
                                               data-sanitize="trim">
                                    </div>
                                </div><!--End Col 6-->
                            </div><!--End Row-->


						<div class="chk-container bump-bottom-sm">
							<span class="chkbox unchecked"></span> <? echo __( 'I accept the terms and conditions. <a href="#" class="txt-grey">Details here.</a>', 'forzatheme' ); ?>
							<input type="checkbox" class="form-check-input" id="agreement" data-validation="required" style="visibility: hidden;">
						</div>

						<div class="form-gorup">
							<input type="hidden" name="action" value="submit" />
							<button type="submit" class="btn btn-cta btn-lg"><? echo __( 'Next', 'forzatheme' ); ?> &nbsp; &raquo;</button>
						</div>

					</form>

				</div><!--End Col 9-->

				<div class="col-lg-4 col-xl-3 bump-bottom-sm">
                       <? require_once(TEMPLATEPATH . '/inc/detalis-block.php'); ?>
				</div><!--End Col 3-->

			</div><!--End Row-->
		</div><!--End Container-->
	</section><!--Application Form Step 2-->


   <? require_once(TEMPLATEPATH . '/inc/need-some-help-block.php'); ?>
   <? require_once(TEMPLATEPATH . '/inc/did-you-know-block.php'); ?>
<?php get_footer();?>
