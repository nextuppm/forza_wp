var loading = false;
var bulkLoaded = false;
var bulkLoading = false;
var moneyRangeRuleMin = 0;
var moneyRangeRuleMax = 1;
var periodRangeRuleRuleMin = 0;
var periodRangeRuleRuleMax = 1;
var bulk = false;

//Set Up Sliders
var slideramount = document.getElementById('slideramount');
var sliderAmountOptions = {
	start: 0,
	step: 0,
	min: 0,
	max: 1,
	limit1: 12000
}

var sliderterm = document.getElementById('sliderterm');
var sliderTermOptions = {
	start: 0,
	step: 0,
	min: 0,
	max: 1
}

$(function(){
    
    $.ajax({
        type 	  : 'POST',
        url       : 'wp-admin/admin-ajax.php',
        data : {
                action    : 'get_bulk_ajax',
                oblastid  : '22'

        },
        dataType 	  : 'json',
        //encode 		  : true
    })
    .done(function(data) {
        bulk = eval(data[1])[0];
        
        if (bulk) {
            var productId = bulk.commercialOfferConfigurationKey;
            $('#ProductId').val(productId);

            var specOfferId = data[6];
            $('#SpecOfferId').val(specOfferId);

            var isSpecialOffer = data[2];
        }

        if (bulk && bulk.rules != null && bulk.rules.length === 2) {
            var moneyRangeRule = bulk.rules[0].MoneyRange;
            var periodRangeRule = bulk.rules[1].PeriodRange;

            if (moneyRangeRule != null) {
                moneyRangeRuleMin = parseInt(moneyRangeRule.min.replace(/[^\d\.]+/g, ""));
                moneyRangeRuleMax = parseInt(moneyRangeRule.max.replace(/[^\d\.]+/g, ""));

                sliderAmountOptions = {
                    start: moneyRangeRule.defaultAmount == null
                        ? 6000
                        : parseInt(moneyRangeRule.defaultAmount.replace(/[^\d\.]+/g, "")),
                    step: parseInt(moneyRangeRule.step.replace(/[^\d\.]+/g, "")),
                    min: moneyRangeRuleMin,
                    max: moneyRangeRuleMax,
                    limit1: 12000
                }
            } else {
                sliderAmountOptions = {
                    start: 6000,
                    step: 100,
                    min: 3000,
                    max: 20000,
                    limit1: 12000
                }
            }

            if (periodRangeRule != null) {
                periodRangeRuleRuleMin = parseInt(periodRangeRule.min.replace(/[^\d\.]+/g, ""));
                periodRangeRuleRuleMax = parseInt(periodRangeRule.max.replace(/[^\d\.]+/g, ""));

                sliderTermOptions = {
                    start: periodRangeRule.defaultTerm == null
                        ? 30
                        : parseInt(periodRangeRule.defaultTerm.replace(/[^\d\.]+/g, "")),
                    step: parseInt(periodRangeRule.step.replace(/[^\d\.]+/g, "")),
                    min: periodRangeRuleRuleMin,
                    max: periodRangeRuleRuleMax
                }
            } else {
                sliderTermOptions = {
                    start: 15,
                    step: 1,
                    min: 7,
                    max: 30
                }
            }
        }

        if (data[4]) {
            sliderAmountOptions.start = data[4];
            specialOfferAmount = data[4];
        }
        
        if (data[5]) {
            sliderTermOptions.start = data[5];
        }

        var amountParameter = $('#AmountParameter').val();
        var daysParameter = $('#DaysParameter').val();
        if (amountParameter != null && amountParameter != "" && daysParameter != null && daysParameter != ""
        ) {
            sliderAmountOptions.start = amountParameter;
            sliderTermOptions.start = daysParameter;
        }

        bulkLoaded = true;
        bulkLoading = false;
        
        noUiSlider.create(slideramount, {
            start: sliderAmountOptions.start,
            connect: [true, false],
            step: sliderAmountOptions.step,
            range: {
                    'min': sliderAmountOptions.min,
                    'max': sliderAmountOptions.max
            }
        });
        
        noUiSlider.create(sliderterm, {
            start: sliderTermOptions.start,
            connect: [true, false],
            step: sliderTermOptions.step,
            range: {
                    'min': sliderTermOptions.min,
                    'max': sliderTermOptions.max
            }
        });
        
        slideramount.noUiSlider.on('update', function(){
            displayLoanInfo();
        });

        sliderterm.noUiSlider.on('update', function(){
            displayLoanInfo();
        });
        
        displayLoanInfo();
    })
    .fail(function(data) {
        console.log(data);
    });
    
    $(".slider-value-amount").on("focus", function(){
            $(this).select();
    });

    $("#loanamount_text").on("keyup", function(){
            value = $(this).val();
            if(value < sliderAmountOptions.min || value > sliderAmountOptions.max) {
                    return false;
            } else {
                    slideramount.noUiSlider.set(value);	
            }
    });

    $("#loanamount_text").on("change", function(){
            value = $(this).val();
            if(value < sliderAmountOptions.min){
                    slideramount.noUiSlider.set(sliderAmountOptions.min);
            } else if(value > sliderAmountOptions.max) {
                    slideramount.noUiSlider.set(sliderAmountOptions.max);
            } else {
                    slideramount.noUiSlider.set(value);
            }
    });

    $("#loanterm_text").on("keyup", function(){
            value = $(this).val();
            if(value < sliderTermOptions.min || value > sliderTermOptions.max) {
                    return false;
            } else {
                    sliderterm.noUiSlider.set(value);	
            }
    });

    $("#loanterm_text").on("change", function(){
            value = $(this).val();
            if(value < sliderTermOptions.min){
                    sliderterm.noUiSlider.set(sliderTermOptions.min);
            } else if(value > sliderTermOptions.max) {
                    sliderterm.noUiSlider.set(sliderTermOptions.max);
            } else {
                    sliderterm.noUiSlider.set(value);
            }
    });

});



function calculateRepayment(loan_term, loan_amount){

	var interest = 0;
	var fee = 0;
	var repayment = 0;
	
	//Calculate Repayment - More complex calculations would be here but this is just a demo
	repayment_amount = loan_amount;

	//Calculate Repayment Date
	var dueDate = new Date();
	dueDate.setTime(dueDate.getTime() + loan_term * 24 * 60 * 60 * 1000);
	var repayment_date = dueDate.getDate() + " ";  
	repayment_date += getMonth(dueDate.getMonth());  




	payload = { amount: loan_amount, term: loan_term, interest: interest, fee: fee, repayment: repayment_amount, date: repayment_date, day: dueDate.getDate(), month: getMonth(dueDate.getMonth()) };

	return payload;
}



function displayLoanInfo()
{

	//Get Term			
	var loan_term = parseFloat(sliderterm.noUiSlider.get());
	$('#Term').val(loan_term);
	//Get Amount
	var loan_amount = parseFloat(slideramount.noUiSlider.get());
        $('#Amount').val(loan_amount);

	//Get Payload
	var payload = calculateRepayment(loan_term, loan_amount);

	if(loan_amount > sliderAmountOptions.limit1) {
	//if(loan_amount > sliderAmountOptions.limit1 && --THERE NEEDS TO BE CHECK THAT NOT LOGGED IN--) {
		$("#loan-limit-warning").show();
		$(".apply-button-calculator").hide();
		$(".login-button-calculator").show();
	} else {
		$("#loan-limit-warning").hide();
		$(".login-button-calculator").hide();
		$(".apply-button-calculator").show();
	}
        
	//Display Loan Amount
	$("#loanamount_text").val(moneyForm.to(payload.amount));
	$(".loan-amount-display").html(moneyForm.to(payload.amount));

	//Display Loan Term
	$("#loanterm_text").val(payload.term);
	$(".loan-term-display").html(payload.term);

	//Display Interest
	$(".loan-interest-display").html(moneyFormD.to(payload.interest));

	//Display Fee
	$(".loan-fee-display").html(moneyFormD.to(payload.fee));

	//Display the Repayment Date
	$(".loan-date-display").html(payload.date);

	//Display the Repayment Date
	$(".loan-day-display").html(payload.day);

	//Display the Repayment Date
	$(".loan-month-display").html(payload.month);

	//Display the Repayment Amount
	$(".loan-repayment-display").html(moneyForm.to(payload.repayment));

        var indexValue = sliderAmountOptions.step > 0 ? ((moneyForm.to(payload.amount) - sliderAmountOptions.min) /
            sliderAmountOptions.step) : null;
        var indexTime = sliderTermOptions.step > 0 ? ((payload.term - sliderTermOptions.min) /
            sliderTermOptions.step) : null;

        if (bulk) {
            changeValues(Math.round(indexTime), Math.round(indexValue), Math.round(moneyForm.to(payload.amount)));
        }
}

function indexes() 
{
    if (!bulkLoaded || sliderAmountOptions == null || sliderTermOptions == null) {
        return [0, 0];
    }

    var indexValue = sliderAmountOptions.step > 0 ? ((sliderAmountOptions.start - sliderAmountOptions.min) /
        sliderAmountOptions.step) : null;
    var indexTime = sliderTermOptions.step > 0 ? ((sliderTermOptions.start - sliderTermOptions.min) /
        sliderTermOptions.step) : null;

    if (bulk) {
        changeValues(Math.round(indexTime), Math.round(indexValue), Math.round(sliderAmountOptions.start));
    }
    return [Math.round(indexValue), Math.round(indexTime)];
};

function changeValues(dayIndex, amountIndex, amount) {
    if (dayIndex == null || amountIndex == null || amount == null || bulk == null || bulk.calculated == null || bulk.calculated[amountIndex][dayIndex] == null)
        return;

    var Loan = bulk.calculated[amountIndex][dayIndex];
    var Amount = amount;

    Loan[2] = Loan[2].replace('PERCENT', '%');
    Loan[5] = amount;

    var AmountToPay = Loan[0].replace(/[^\d\.]+/g, "");
    $('#AmountToPay').val(AmountToPay);
    $('#AmountToPayspan').html(AmountToPay);
    var Apr = Loan[2].replace(/[^\d\.]+/g, "");
    $('#Apr').val(Apr);
    $('#Aprspan').html(Apr);
    var FeeAmount = Loan[3].replace(/[^\d\.]+/g, "");
    $('#FeeAmount').val(FeeAmount);
    $('#FeeAmountspan').html(FeeAmount);
    var InterestAmount = Loan[4].replace(/[^\d\.]+/g, "");
    $('#InterestAmount').val(InterestAmount);
    $('#InterestAmountspan').html(InterestAmount);
    
    var date_str = Loan[1];
    var date_arr = date_str.split('-')
    var dueDate = new Date(date_arr[0],date_arr[1],date_arr[2]);
    var repayment_date = dueDate.getDate() + " ";  
    repayment_date += getMonth(dueDate.getMonth());  

    $('#RepaymentDate').val(repayment_date);
    //Display the Repayment Date
    $(".loan-date-display").html(repayment_date);

    //Display the Repayment Date
    $(".loan-day-display").html(dueDate.getDate());

    //Display the Repayment Date
    $(".loan-month-display").html(getMonth(dueDate.getMonth()));
};


//Helper Functions

var moneyForm = wNumb({
	thousand: ',',
	decimals: 0
});

var moneyFormD = wNumb({
	thousand: ',',
	decimals: 2
});

function getMonth(month){
	var monthNames = ["January", "February", "March", "Aprix", "May", "June", "July", "August", "September", "October", "November", "December"];
	var monthNamesAbr = ["Jan", "Feb ", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]

	var output = monthNamesAbr[month];
	return output;
}

