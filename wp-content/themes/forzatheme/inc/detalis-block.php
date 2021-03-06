<?
	$url          = home_url( '/' );
?>
					<div class="details-box">

						<div class="details-box-header">
							<h5 class="extra-bold bump-bottom-none bump-top-none"><i class="fas fa-info-circle fa-fw"></i> <? echo __( 'Loan Details', 'forzatheme' ); ?></h5>
						</div>

						<div class="details-box-body bump-bottom-xs">
							<div class="d-flex">
								<div>
									<span class="grey p14 strike"><? echo __( 'Loan Amount', 'forzatheme' ); ?></span>
								</div>
								<div class="ml-auto text-right">
									<span class="grey p14 strike"><span class="loan-amount-display"><? if( isset( $_POST['loan_amount']) ):?>  <? echo $_POST['loan_amount']; ?> <? else: ?> 0 <? endif; ?></span> <? echo __( 'MKD', 'forzatheme' ); ?></span>
								</div>
							</div>

							<div class="d-flex">
								<div>
									<span class="grey p14 strike"><? echo __( 'Loan Term', 'forzatheme' ); ?></span>
								</div>
								<div class="ml-auto text-right">
									<span class="grey p14 strike"><span class="loan-term-display"><? if( isset( $_POST['loan_days']) ):?>  <? echo $_POST['loan_days']; ?> <? else: ?> 0 <? endif; ?></span> <? echo __( 'Days', 'forzatheme' ); ?></span>
								</div>
							</div>
							<div class="d-flex">
								<div>
									<span class="grey p14 strike"><? echo __( 'Interest', 'forzatheme' ); ?> 10%</span>
								</div>
								<div class="ml-auto text-right">
									<span class="grey p14 strike"><span class="loan-interest-display"><? if( isset( $_POST['InterestAmount']) ):?>  <? echo $_POST['InterestAmount']; ?> <? else: ?> 0 <? endif; ?></span> <? echo __( 'MKD', 'forzatheme' ); ?></span>
								</div>
							</div>

							<div class="d-flex">
								<div>
									<span class="grey p14 strike">Fee</span>
								</div>
								<div class="ml-auto text-right">
									<span class="grey p14 strike"><span class="loan-fee-display"><? if( isset( $_POST['FeeAmount']) ):?>  <? echo $_POST['FeeAmount']; ?> <? else: ?> 0 <? endif; ?></span> <? echo __( 'MKD', 'forzatheme' ); ?></span>
								</div>
							</div>

							<div class="d-flex">
								<div>
									<span class="grey p14"><? echo __( 'APR', 'forzatheme' ); ?></span>
								</div>
								<div class="ml-auto text-right">
									<span class="grey p14"><span class="loan-apr-display"><? if( isset( $_POST['Apr']) ):?>  <? echo $_POST['Apr']; ?> <? else: ?> 0 <? endif; ?></span> %</span>
								</div>
							</div>
                            <? if(is_page(39)):?>
                            <form method="POST" action="<? echo $url;?>start/">


                                  <input  name="loan_amount" id="loan_amount" type="hidden" value="<? if( isset( $_POST['loan_amount']) ):?><? echo $_POST['loan_amount']; ?><? else: ?>0<? endif; ?>" >
                                  <input  name="loan_days" id="loan_days" type="hidden" value="<? if( isset( $_POST['loan_days']) ):?><? echo $_POST['loan_days']; ?><? else: ?>0<? endif; ?>" >
								<div class="text-center bump-top-sm">
									<button type="submit" class="btn btn-ghost"><? echo __( 'Edit', 'forzatheme' ); ?></button>
								</div>
							</form>
							<? else:endif;?>
						</div>

						<div class="details-box-footer">
							<div class="d-flex">
								<div>
									<span class="grey p14 bold"><? echo __( 'Repayment Date', 'forzatheme' ); ?></span>
								</div>
								<div class="ml-auto text-right">
									<span class="grey p14 bold loan-date-display"><? echo isset($_POST['RepaymentDay']) ? $_POST['RepaymentDay'] : 0; ?> <? echo isset($_POST['RepaymentMonth']) ? $_POST['RepaymentMonth'] : 0; ?></span>
								</div>
							</div>
							<div class="d-flex">
								<div>
									<span class="grey p14 bold"><? echo __( 'Repayment Total', 'forzatheme' ); ?></span>
								</div>
								<div class="ml-auto text-right">
									<span class="grey p14 bold" id="rpa"><span class="loan-repayment-display"><? echo isset($_POST['AmountToPay']) ? $_POST['AmountToPay'] : 0; ?></span> <? echo __( 'MKD', 'forzatheme' ); ?></span>
								</div>
							</div>
						</div><!--End Loan Details-->

					</div><!--End Loan Details Box-->

