var loading = false;
var bulkLoaded = false;
var bulkLoading = false;
var moneyRangeRuleMin = 0;
var moneyRangeRuleMax = 1;
var periodRangeRuleRuleMin = 0;
var periodRangeRuleRuleMax = 1;
var bulk = false;

$( "#apply-button-home-main" ).prop( "disabled", true );

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
var dateFormat = function () {
	var	token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
		timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
		timezoneClip = /[^-+\dA-Z]/g,
		pad = function (val, len) {
			val = String(val);
			len = len || 2;
			while (val.length < len) val = "0" + val;
			return val;
		};

	// Regexes and supporting functions are cached through closure
	return function (date, mask, utc) {
		var dF = dateFormat;

		// You can't provide utc if you skip other args (use the "UTC:" mask prefix)
		if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
			mask = date;
			date = undefined;
		}

		// Passing date through Date applies Date.parse, if necessary
		date = date ? new Date(date) : new Date;
		if (isNaN(date)) throw SyntaxError("invalid date");

		mask = String(dF.masks[mask] || mask || dF.masks["default"]);

		// Allow setting the utc argument via the mask
		if (mask.slice(0, 4) == "UTC:") {
			mask = mask.slice(4);
			utc = true;
		}

		var	_ = utc ? "getUTC" : "get",
			d = date[_ + "Date"](),
			D = date[_ + "Day"](),
			m = date[_ + "Month"](),
			y = date[_ + "FullYear"](),
			H = date[_ + "Hours"](),
			M = date[_ + "Minutes"](),
			s = date[_ + "Seconds"](),
			L = date[_ + "Milliseconds"](),
			o = utc ? 0 : date.getTimezoneOffset(),
			flags = {
				d:    d,
				dd:   pad(d),
				ddd:  dF.i18n.dayNames[D],
				dddd: dF.i18n.dayNames[D + 7],
				m:    m + 1,
				mm:   pad(m + 1),
				mmm:  dF.i18n.monthNames[m],
				mmmm: dF.i18n.monthNames[m + 12],
				yy:   String(y).slice(2),
				yyyy: y,
				h:    H % 12 || 12,
				hh:   pad(H % 12 || 12),
				H:    H,
				HH:   pad(H),
				M:    M,
				MM:   pad(M),
				s:    s,
				ss:   pad(s),
				l:    pad(L, 3),
				L:    pad(L > 99 ? Math.round(L / 10) : L),
				t:    H < 12 ? "a"  : "p",
				tt:   H < 12 ? "am" : "pm",
				T:    H < 12 ? "A"  : "P",
				TT:   H < 12 ? "AM" : "PM",
				Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
				o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
				S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
			};

		return mask.replace(token, function ($0) {
			return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
		});
	};
}();

// Some common format strings
dateFormat.masks = {
	"default":      "ddd mmm dd yyyy HH:MM:ss",
	shortDate:      "m/d/yy",
	mediumDate:     "mmm d, yyyy",
	longDate:       "mmmm d, yyyy",
	fullDate:       "dddd, mmmm d, yyyy",
	shortTime:      "h:MM TT",
	mediumTime:     "h:MM:ss TT",
	longTime:       "h:MM:ss TT Z",
	isoDate:        "yyyy-mm-dd",
	isoTime:        "HH:MM:ss",
	isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
	isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
	dayNames: [
		"Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
		"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
	],
	monthNames: [
		"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
		"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
	]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
	return dateFormat(this, mask, utc);
};

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
        
        $('#min_mkd').html(sliderAmountOptions.min);
        $('#max_mkd').html(sliderAmountOptions.max);
        
        $('#min_days').html(sliderTermOptions.min);
        $('#max_days').html(sliderTermOptions.max);

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
        $( "#apply-button-home-main" ).prop( "disabled", false );
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
    $('#DateDue').val(dueDate.format("dd.mm.yyyy hh:MM:ss"));
    $('#RepaymentDate').val(repayment_date);
    //Display the Repayment Date
    $(".loan-date-display").html(repayment_date);

    //Display the Repayment Date
    $(".loan-day-display").html(dueDate.getDate());
    $('#RepaymentDay').val(dueDate.getDate());

    //Display the Repayment Date
    $(".loan-month-display").html(getMonth(dueDate.getMonth()));
    $('#RepaymentMonth').val(getMonth(dueDate.getMonth()));
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

