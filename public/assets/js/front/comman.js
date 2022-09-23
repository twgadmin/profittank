var _maxFieldString = 0;
var _minFieldString = 0;

// Add validations of every steps
function formValidate(frmId) {
    var returnFlag = true;
    $("#" + frmId + " .form__field").removeClass("has-error");
    $(
        "#" + frmId + " .form__field input, #" + frmId + " .form__field select"
    ).removeAttr("style");
    $("#" + frmId + " .form__field span.help-block.form-error").remove();
    $(".one-of-input-required-error").html("").hide();
    $("#" + frmId + " *")
        .filter(":input")
        .each(function (index, el) {			
            var nextCheck = true;
            var _validate = $(el).attr("data-validation");
            var str = $(el).val();
            var strLength = str.length;
            if ($.isEmptyObject(_validate) === false) {
                if (
                    nextCheck === true &&
                    _validate.indexOf("one-of-input-required") != -1
                ) {
                    var found_value = false;
                    $(
                        '[data-one-of-input-required="natural_gas_electricity"]'
                    ).each(function (inx, rel) {
                        $(rel).attr("data-validation", "one-of-input-required");
                        if ($(rel).val().trim().length > 0) {
                            found_value = true;
                            $(rel).attr(
                                "data-validation",
                                "length one-of-input-required"
                            );
                        }
                    });
                    if (!found_value) {
                        $(".one-of-input-required-error")
                            .html(
                                '<span class="help-block form-error">Please enter at least one expense</span>'
                            )
                            .show();
                        returnFlag = false;
                        nextCheck = false;
                    }
                    _validate = $(el).attr("data-validation");
                } else if (
                    nextCheck === true &&
                    _validate.indexOf("required") != -1 &&
                    typeof str === 'string' && str.trim() == ""
                ) {
                    addRequiredFieldError(el);
                    returnFlag = false;
                    nextCheck = false;
                }
                if (
                    nextCheck === true &&
                    _validate.indexOf("multiword") != -1
                ) {
                    if (str.split(" ") < 2 || str.split(" ") > 5) {
                        addInvalidNameError(el);
                        returnFlag = false;
                        nextCheck = false;
                    }
                }
                if (nextCheck === true && _validate.indexOf("custom") != -1) {
                    validationExpression = $(el).attr("data-validation-regexp");
                    regex = new RegExp(validationExpression);
                    if (!regex.test(str)) {
                        var name = $(el).attr("name");
                        if (name == "hourly_wage") {
                            addRequiredFieldError(el);
                        } else {
                            addInvalidCharactersError(el);
                        }
                        returnFlag = false;
                        nextCheck = false;
                    }
                }
                if (nextCheck === true && _validate.indexOf("email") != -1) {
                    var regex =
                        /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test(str)) {
                        addEmailValidationFailed(el);
                        returnFlag = false;
                        nextCheck = false;
                    }
                }
                if (nextCheck === true && _validate.indexOf("length") != -1) {
                    validationLength = $(el).attr("data-validation-length");
                    minMax = validationLength.split("-");
                    _minFieldString = parseFloat(minMax[0]);
                    var str_2 = str.replace(/,/g, "");
                    str_1 = str_2.match(/\d+/);

                    if (minMax.length == 2) {
                        _maxFieldString = parseFloat(minMax[1]);
                    }
                    if (str_1 < _minFieldString) {
                        addRequiredFieldError(el);
                        returnFlag = false;
                        nextCheck = false;
                    } else if (str_1 > _maxFieldString) {
                        addRequiredFieldError(el);
                        returnFlag = false;
                        nextCheck = false;
                    }
                }
            }
        });
    return returnFlag;
}

function addRequiredFieldError(el) {	
    $(el).parent(".form__field").addClass("has-error");
    var error_message = $(el).attr("data-message");
    $(el).attr("style", "border-color: rgb(185, 74, 72);");
    htmlError =
        '<span class="help-block form-error">' + error_message + "</span>";
    $(el).after(htmlError);
}

function addEmailValidationFailed(el) {	
    $(el).parent(".form__field").addClass("has-error");
    $(el).attr("style", "border-color: rgb(185, 74, 72);");
    htmlError =
        '<span class="help-block form-error">This is an invalid email</span>';
    $(el).after(htmlError);
}

function addInvalidCharactersError(el) {	
    $(el).parent(".form__field").addClass("has-error");
    $(el).attr("style", "border-color: rgb(185, 74, 72);");
    htmlError =
        '<span class="help-block form-error">This field contains invalid characters</span>';
    $(el).after(htmlError);
}

function addInvalidNameError(el) {	
    $(el).parent(".form__field").addClass("has-error");
    $(el).attr("style", "border-color: rgb(185, 74, 72);");
    htmlError =
        '<span class="help-block form-error">Please enter your full name</span>';
    $(el).after(htmlError);
}

function addMinMaxFieldError(el, type) {    
	$(el).parent(".form__field").addClass("has-error");
    $(el).attr("style", "border-color: rgb(185, 74, 72);");
    $(el).after(htmlError);
}

function formatNumber(n) {    
	return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatCurrency(input, blur) {	
    var input_val = input.val();

    if (input_val === "") {
        return;
    }

    var original_len = input_val.length;

    var caret_pos = input.prop("selectionStart");

    if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");

        var left_side = input_val.substring(0, decimal_pos);

        var right_side = input_val.substring(decimal_pos);

        left_side = formatNumber(left_side);

        right_side = formatNumber(right_side);

        if (blur === "blur") {
            right_side += "00";
        }

        right_side = right_side.substring(0, 2);

        input_val = "$" + left_side + "." + right_side;
    } else {
        input_val = formatNumber(input_val);

        input_val = "$" + input_val;

        if (blur === "blur") {
            input_val += ".00";
        }
    }

    input.val(input_val);
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

function formatPercentage(input, blur) {
    var input_val = input.val();
    if (input_val === "") {
        return;
    }
    var original_len = input_val.length;
    var caret_pos = input.prop("selectionStart");
    if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);
        if (blur === "blur") {
            right_side += "00";
        }
        right_side = right_side.substring(0, 2);
        input_val = left_side + "." + right_side;
    } else {
        input_val = formatNumber(input_val);
        input_val = input_val;
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    input.val(input_val);
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    // input[0].setSelectionRange(caret_pos, updated_len - 1);
}
