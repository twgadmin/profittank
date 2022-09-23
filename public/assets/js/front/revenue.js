/****
 * This js use for calculator
 * We made customs functions for it
 * version : 1.0
 * author : Prem Gujel
 ****/

// calculator next slide

var timer;
var step = 1;

$(document).on("click", "#revenueNext", function () {
    
    if (formValidate("revenue_form") === false) return false;
	var revenue_form_data=$("#revenue_form").serialize();
	var testdata = revenue_form_data.split("&"); 
	const checkPageCondition = [];
	for(let i = 0; i < testdata.length; i++) {
		var test = testdata[i].split("=");
		if(test[0]=='state%5B%5D'){
			$('#state option:selected').each(function(){
				var valuess =$(this).attr('step-data');
				var valued = valuess.split(",");
				for (let j = 0; j < valued.length; j++) {
					if(checkPageCondition.includes(valued[j])===false){
						checkPageCondition.push(valued[j]);
					}			
				}
			});
		}
	}
	checkPageCondition.sort();

	if(checkPageCondition.length>0){
        var revenue_form_data=$("#revenue_form").serialize()+((checkPageCondition.length>0)? "&page_id="+checkPageCondition[0] : "")+((checkPageCondition.length>0)? "&pages="+checkPageCondition.join(',') : "");
    }else{
        var revenue_form_data=$("#revenue_form").serialize();
    }

    $.ajax({
        url: "/getNextStep",
        method: "post",
        data: revenue_form_data,
        beforeSend: function () {
            $("#revenueNext").attr("disabled", "disabled");
            $("#revenuePrev").attr("disabled", "disabled");
            $.ajax({
                url: "/getNextFinalStep",
                method: "get",
                data: revenue_form_data,
                async: false,
                cache: false,
                success: function (response) {
                    
                    step = response.message;
                    if (step == "final") {
                        $("#businessSteps").hide();
                        $(".before-result").show();
                        $("#businessSteps").addClass("load_final_result");
                        $("#revenue_main_wrapper")
                            .detach()
                            .insertAfter(".firstscreen");
                        $(".firstscreen")
                            .find(".container:first-child")
                            .remove();
                        $(".before-result-title-1").animate({
                            width: "100%",
                            opacity: "1",
                        });
                        $(".shape-circle-list").animate({
                            opacity: "1",
                        });
                        setTimeout(function () {
                            $(".before-result-title-1").animate({
                                opacity: "0",
                            });
                            setTimeout(function () {
                                $(".before-result-title-2").addClass(
                                    "typing_a"
                                );
                                setTimeout(function () {
                                    $(".before-result-title-2").addClass(
                                        "blinkingR"
                                    );
                                }, 500);
                            }, 250);
                        }, 1000);
                    }
                },
            });
        },
        success: function (response) {
            
            $("#revenue_form").addClass("fullwidth");
            if (step == "final") {
                
                window.location.href = "/final-result";
                return false;
                timer = setTimeout(function () {
                    $(".before-result").hide();
                    $("#businessSteps").show();
                    $(".load_final_result").html(response);
                    $("#revenue_main_wrapper")
                        .detach()
                        .insertAfter(".firstscreen");
                    $(".firstscreen").find(".container:first-child").remove();
                }, 12000);
            } else {
                
                $("#businessSteps").html(response).addClass("take-right");
                setTimeout(() => {
                    $("#businessSteps").removeClass("take-right");
                }, 100);
                $("#revenueNext").removeAttr("disabled");
                $("#revenuePrev").removeAttr("disabled");
            }
        },
    });
});

// calculator previous slide

$(document).on("click", "#revenuePrev", function () {
    $("#businessSteps").removeClass("load_final_result");
    clearTimeout(timer);
    $.ajax({
        url: "/getPrevStep",
        method: "post",
        data: $("#revenue_form").serialize(),
        // data: {
        //     _token: $('meta[name="csrf-token"]').attr('content'),
        // },
        beforeSend: function () {
            $("#revenuePrev").attr("disabled", "disabled");
            $("#revenueNext").attr("disabled", "disabled");
        },
        success: function (response) {
            $(".before-result").hide();
            $("#businessSteps").show();
            $("#businessSteps").removeClass("load_final_result");
            $("#businessSteps").html(response).addClass("take-left");
            setTimeout(() => {
                $("#businessSteps").removeClass("take-left");
            }, 100);
        },
        complete: function () {
            $("#revenuePrev").removeAttr("disabled");
            $("#revenueNext").removeAttr("disabled");
        },
    });
});

// Select Businesses and merged into array

$(document).on("click", ".businessList", function () {
    let id = $(this).attr("data-id");
    let $this = $(this);
    if ($($this).parents().hasClass("active")) {
        $($this).parent().removeClass("active");
        $("#revenueNext").addClass("disabled");
    } else {
        $($this).parent().addClass("active");
        $("#revenueNext").removeClass("disabled");
    }
    $.ajax({
        url: "/addBusinessId",
        method: "post",
        data: {
            _token: $('meta[name="csrf-token"]').attr("content"),
            business_id: id,
        },
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                if (response.class != "active") {
                    $($this).parent().removeClass("active");
                }
            }
        },
    });
});

// Enter admount then next step button enable

// It will accept only digit

$(document).on("keyup", ".numberWithCurrency", function () {
    if ($(this).val() != "") {
        $(this).val(
            $(this)
                .val()
                .replace(/[^\d]/g, "")
        );
        $(this).addClass("active");
        $(this).next(".form-error").remove();
        $(this).prev(".next-slide-button").addClass("active");
    } else {
        $(this).removeClass("active");
        $(this).prev(".next-slide-button").removeClass("active");
    }
    formatCurrency($(this));
});

$(document).on("keyup", ".addhr", function () {
    var val = $(this).val();
    if (val != "") {
        $("#lbl").addClass("active");
    } else {
        $("#lbl").removeClass("active");
    }
});

// Enter any number then next step button enable

// It will accept only number

$(document).on("keyup", ".numberonly", function (event) {
    if ($(this).val() != "") {
        $(this).val(
            $(this)
                .val()
                .replace(/[^0-9\d]/g, "")
        );
        $(this).addClass("active");
        $(this).next(".form-error").remove();
        $(this).prev(".next-slide-button").addClass("active");
    } else {
        $(this).removeClass("active");
        $(this).prev(".next-slide-button").removeClass("active");
    }
});

// Whenever click on radio button then move to step

$(document).on("click", ".radio_next", function () {
    
    var option_value = $(this).val();
        

    if($(this).attr('name')==="state"){
        var stepData = $(this).attr('step-data');
        const checkPageCondition = (stepData!=='') ? stepData.split(",") : [];
        var revenue_form_data=$("#revenue_form").serialize()+((stepData!=='')? "&page_id="+checkPageCondition[0] : "");
    }else{
        var revenue_form_data=$("#revenue_form").serialize();
    }
    var step = "1";    
    $("#option_value").val(option_value);
    $("#option_value").next(".form-error").remove();
    if (formValidate("revenue_form") === false) return false;
    $.ajax({
        url: "/getNextStep",
        method: "post",
        data: revenue_form_data,
        beforeSend: function () {
            $("#revenueNext").attr("disabled", "disabled");
            $("#revenuePrev").attr("disabled", "disabled");
            $.ajax({
                url: "/getNextFinalStep",
                method: "get",
                data: revenue_form_data,
                async: false,
                cache: false,
                success: function (response) {
                        
                    step = response.message;    
                    if (step == "final") {
                        $("#businessSteps").hide();
                        $(".before-result").show();
                        $("#businessSteps").addClass("load_final_result");
                        $("#revenue_main_wrapper")
                            .detach()
                            .insertAfter(".firstscreen");
                        $(".firstscreen")
                            .find(".container:first-child")
                            .remove();
                        $(".before-result-title-1").animate({
                            width: "100%",
                            opacity: "1",
                        });
                        $(".shape-circle-list").animate({
                            opacity: "1",
                        });
                        setTimeout(function () {
                            $(".before-result-title-1").animate({
                                opacity: "0",
                            });
                            setTimeout(function () {
                                $(".before-result-title-2").addClass(
                                    "typing_a"
                                );
                                setTimeout(function () {
                                    $(".before-result-title-2").addClass(
                                        "blinkingR"
                                    );
                                }, 500);
                            }, 250);
                        }, 1000);
                    }
                },
            });
        },
        success: function (response) {
            $("#revenue_form").addClass("fullwidth");
            if (step == "final") {
                window.location.href = "/final-result";
                return false;
                timer = setTimeout(function () {
                    $(".before-result").hide();
                    $("#businessSteps").show();
                    $(".load_final_result").html(response);
                    $("#revenue_main_wrapper")
                        .detach()
                        .insertAfter(".firstscreen");
                    $(".firstscreen").find(".container:first-child").remove();
                }, 12000);
            } else {
                $("#businessSteps").html(response);
                $("#revenueNext").removeAttr("disabled");
                $("#revenuePrev").removeAttr("disabled");
            }
        },
    });
});

let property_types = new Array();
// Select multiple property

$(document).on(
    "click",
    ".tuvel.revenue_slides input[name=property]",
    function () {
        var most_recent = $(this).val();
        var i = jQuery.inArray(most_recent, property_types);
        if (i > -1) {
            property_types.splice(i, 1);
        } else {
            property_types.push($(this).attr("value"));
        }
        if (property_types.length != 0) {
            var j = property_types.toString();

            $("#option_value").val(j);
            $("#option_value").next(".form-error").remove();
        }
    }
);

$(document).on("keyup , paste", ".numberWithPercentage", function () {
    if ($(this).val() != "") {
        $(this).val(
            $(this)
                .val()
                .replace(/[^\d]/g, "")
        );
        $(this).addClass("active");
        $(this).next(".form-error").remove();
        $(this).prev(".next-slide-button").addClass("active");
    } else {
        $(this).removeClass("active");
        $(this).prev(".next-slide-button").removeClass("active");
    }
    formatPercentage($(this));
});
