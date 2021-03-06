<?
$min_mkd      = get_field('min_mkd',      'option');
$max_mkd      = get_field('max_mkd',      'option');
$min_days     = get_field('min_days',     'option');
$max_days     = get_field('max_days',     'option');
$url          = home_url( '/' );
?>
				<div class="row">
					<div class="col-11 col-lg-10 offset-xl-1 col-xl-11 hero-fix">
						<form method="POST" action="<? echo $url;?>apply/">
                            <input name="ProductId" id="ProductId" value="" type="hidden">
                            <input name="SpecOfferId" id="SpecOfferId" value="" type="hidden">
                            <input name="AmountToPay" id="AmountToPay" value="" type="hidden">
                            <input name="Apr" id="Apr" value="" type="hidden">
                            <input name="FeeAmount" id="FeeAmount" value="" type="hidden">
                            <input name="InterestAmount" id="InterestAmount" value="" type="hidden">
                            <input name="RepaymentDate" id="RepaymentDate" value="" type="hidden">
                            <input name="RepaymentDay" id="RepaymentDay" value="" type="hidden">
                            <input name="RepaymentMonth" id="RepaymentMonth" value="" type="hidden">
                            <input name="Amount" id="Amount" value="" type="hidden">
                            <input name="Term" id="Term" value="" type="hidden">
                            <input name="DateDue" id="DateDue" value="" type="hidden">
							<div class="box calculator-box human">
								<div id="head"></div>
								<div id="left-hand"></div>
								<div id="right-hand"></div>
								<div class="calculator-box-header">
									<div class="light pad-top-xs"><? echo __('Select the loan amount below and get your money fast.', 'forzatheme' ); ?></div>
								</div><!--End Calculator Box Header-->
								<div class="d-flex">
									<div>
										<label class="noUi-label"><? echo __('How much do you need?', 'forzatheme' ); ?></label>
									</div>
									<div class="ml-auto text-right ">
										<span class="slider-value">
											<input type="tel" class="slider-value-amount mkd" name="loan_amount" id="loanamount_text" value="0">
											<span class="slider-value-unit"><? echo __('MKD', 'forzatheme' ); ?></span>
										</span><!--End Slider Value-->
									</div>
								</div><!--End Row-->
								<div class="bump-bottom-xs">
									<div style="position: relative;">
										<!--<div id="loan-limit-warning" class="alert alert-danger p12"><? echo __('For new customers, a maximum amount of 12,000 MKD applies. To apply for more please <a href="login.html" data-toggle="modal" data-target="#login-modal">login to your account</a>', 'forzatheme' ); ?> </div>-->
										<div id="slideramount">
										</div>
									</div><!--End Slider Amount-->
								</div><!--End Row-->
								<div class="row bump-bottom-sm">
									<div class="col">
										<span class="txt-grey p12"><span id="min_mkd"></span> <? echo __('MKD', 'forzatheme' ); ?></span>
									</div>
									<div class="col text-right">
										<span class="txt-grey p12"><span id="max_mkd"></span> <? echo __('MKD', 'forzatheme' ); ?></span>
									</div>
								</div><!--End Row-->
								<div class="d-flex">
									<div>
										<label class="noUi-label"><? echo __('For how long?', 'forzatheme' ); ?></label>
									</div>
									<div class="ml-auto text-right">
										<span class="slider-value">
												<input type="tel" class="slider-value-amount" name="loan_days" id="loanterm_text" value="0">
											<span class="slider-value-unit"><? echo __('Days', 'forzatheme' ); ?></span>
										</span><!--End Slider Value-->
									</div>
								</div><!--End Row-->
								<div class="bump-bottom-xs">
									<div id="sliderterm">
									</div><!--End Slider Amount-->
								</div><!--End Row-->
								<div class="row bump-bottom-sm">
									<div class="col">
										<span class="txt-grey p12"><span id="min_days"></span> <? echo __('Days', 'forzatheme' ); ?></span>
									</div>
									<div class="col text-right">
										<span class="txt-grey p12"><span id="max_days"></span> <? echo __('Days', 'forzatheme' ); ?></span>
									</div>
								</div><!--End Row-->
								<div class="calculator-box-details bump-bottom-xs">
									<div class="d-flex">
										<div>
											<span class="grey p14 "><? echo __('Interest', 'forzatheme' ); ?> 10%</span>
										</div>
										<div class="ml-auto text-right">
											<span class="grey p14"><span class="loan-interest-display" id="InterestAmountspan">0.00</span> <? echo __('MKD', 'forzatheme' ); ?></span>
										</div>
									</div><!--End Row-->
									<div class="d-flex">
										<div>
											<span class="grey p14"><? echo __('Fee', 'forzatheme' ); ?></span>
										</div>
										<div class="ml-auto text-right">
											<span class="grey p14"><span class="loan-fee-display" id="FeeAmountspan">0.00</span> <? echo __('MKD', 'forzatheme' ); ?></span>
										</div>
									</div><!--End Row-->
									<div class="d-flex">
										<div>
											<span class="grey p14"><? echo __('APR', 'forzatheme' ); ?></span>
										</div>
										<div class="ml-auto text-right">
											<span class="grey p14"><span class="loan-apr-display" id="Aprspan">0</span> %</span>
										</div>
									</div><!--End Row-->

									<div class="d-flex">
										<div>
											<span class="p14 bold"><? echo __('Repayment Date', 'forzatheme' ); ?></span>
										</div>
										<div class="ml-auto text-right">
											<span class="loan-day-display slider-value-amount"></span> <span class="slider-value-unit"><span class="loan-month-display"></span>
										</div>
									</div><!--End Row-->
									<div class="d-flex">
										<div>
											<span class="p14 bold"><? echo __('You will repay', 'forzatheme' ); ?></span>
										</div>
										<div class="ml-auto text-right">
											<span class="loan-amount-display slider-value-amount" id="AmountToPayspan">0</span> <span class="slider-value-unit"><? echo __('MKD', 'forzatheme' ); ?></span>
										</div>
									</div><!--End Row-->
								</div><!--End Calculator Box Details-->
								<div class="calculator-box-footer text-center">
									<button type="submit" class="btn btn-cta btn-lg apply-button apply-button-calculator" id="apply-button-home-main"><? echo __('Apply Now!', 'forzatheme' ); ?></button>
									<a href="<? echo $url;?>login/" class="btn btn-green btn-lg login-button-calculator" data-toggle="modal" data-target="#login-modal" style="display: none;"><? echo __('Login to Apply', 'forzatheme' ); ?></a>
								</div><!--End Calculator Box Footer-->
							</div><!--End Calculator Box-->
						</form>
					</div><!--End Col 11-->
				</div><!--End Row-->
