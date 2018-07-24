
				<div class="row">
					<div class="col-11 col-lg-10 offset-xl-1 col-xl-11 hero-fix">
						<form method="POST" action="apply.html">
							<div class="box calculator-box human">
								<div id="head"></div>
								<div id="left-hand"></div>
								<div id="right-hand"></div>
								<div class="calculator-box-header">
									<div class="light pad-top-xs">Select the loan amount below and get your money fast.</div>
								</div><!--End Calculator Box Header-->
								<div class="d-flex">
									<div>
										<label class="noUi-label">How much do you need?</label>
									</div>
									<div class="ml-auto text-right ">
										<span class="slider-value">
											<input type="tel" class="slider-value-amount mkd" id="loanamount_text" value="200">
											<span class="slider-value-unit">MKD</span>
										</span><!--End Slider Value-->
									</div>
								</div><!--End Row-->
								<div class="bump-bottom-xs">
									<div style="position: relative;">
										<div id="loan-limit-warning" class="alert alert-danger p12">For new customers, a maximum amount of 12,000 MKD applies. To apply for more please <a href="login.html" data-toggle="modal" data-target="#login-modal">login to your account</a></div>
										<div id="slideramount">
										</div>
									</div><!--End Slider Amount-->
								</div><!--End Row-->
								<div class="row bump-bottom-sm">
									<div class="col">
										<span class="txt-grey p12">3000 MKD</span>
									</div>
									<div class="col text-right">
										<span class="txt-grey p12">20,000 MKD</span>
									</div>
								</div><!--End Row-->
								<div class="d-flex">
									<div>
										<label class="noUi-label">For how long?</label>
									</div>
									<div class="ml-auto text-right">
										<span class="slider-value">
												<input type="tel" class="slider-value-amount" id="loanterm_text" value="20">
											<span class="slider-value-unit">Days</span>
										</span><!--End Slider Value-->
									</div>
								</div><!--End Row-->
								<div class="bump-bottom-xs">
									<div id="sliderterm">
									</div><!--End Slider Amount-->
								</div><!--End Row-->
								<div class="row bump-bottom-sm">
									<div class="col">
										<span class="txt-grey p12">7 Days</span>
									</div>
									<div class="col text-right">
										<span class="txt-grey p12">30 Days</span>
									</div>
								</div><!--End Row-->
								<div class="calculator-box-details bump-bottom-xs">
									<div class="d-flex">
										<div>
											<s class="grey p14 strike">Interest 10%</s>
										</div>
										<div class="ml-auto text-right">
											<s class="grey p14"><span class="loan-interest-display">0.00</span> MKD</s>
										</div>
									</div><!--End Row-->
									<div class="d-flex">
										<div>
											<s class="grey p14">Fee</s>
										</div>
										<div class="ml-auto text-right">
											<s class="grey p14"><span class="loan-fee-display">0.00</span> MKD</s>
										</div>
									</div><!--End Row-->
									<div class="d-flex">
										<div>
											<span class="grey p14">APR</span>
										</div>
										<div class="ml-auto text-right">
											<span class="grey p14"><span class="loan-apr-display">0</span> %</span>
										</div>
									</div><!--End Row-->

									<div class="d-flex">
										<div>
											<span class="p14 bold">Repayment Date</span>
										</div>
										<div class="ml-auto text-right">
											<span class="loan-day-display slider-value-amount">30</span> <span class="slider-value-unit"><span class="loan-month-display">Apr</span>
										</div>
									</div><!--End Row-->
									<div class="d-flex">
										<div>
											<span class="p14 bold">You will repay</span>
										</div>
										<div class="ml-auto text-right">
											<span class="loan-amount-display slider-value-amount">190</span> <span class="slider-value-unit">MKD</span>
										</div>
									</div><!--End Row-->
								</div><!--End Calculator Box Details-->
								<div class="calculator-box-footer text-center">
									<button type="submit" class="btn btn-cta btn-lg apply-button apply-button-calculator" id="apply-button-home-main">Apply Now!</button>
									<a href="login.html" class="btn btn-green btn-lg login-button-calculator" data-toggle="modal" data-target="#login-modal" style="display: none;">Login to Apply</a>
								</div><!--End Calculator Box Footer-->
							</div><!--End Calculator Box-->
						</form>
					</div><!--End Col 11-->
				</div><!--End Row-->
