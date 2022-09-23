$(document).ready(function () {
    $(".table-dropdown").click(function () {
        $(this).toggleClass("open");
        $(".table-dropdown-list").toggleClass("open");
    });

    /* Input Number Format */

    var commaCounter = 10;
    function numberSeparator(Number) {
        Number += "";
        for (var i = 0; i < commaCounter; i++) {
            Number = Number.replace(",", "");
        }
        x = Number.split(".");
        y = x[0];
        z = x.length > 1 ? "." + x[1] : "";
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(y)) {
            y = y.replace(rgx, "$1" + "," + "$2");
        }
        commaCounter++;
        return y + z;
    }

    $(document).on("keypress , paste", ".numberWithSeperator", function (e) {
        if (/^-?\d*[,.]?(\d{0,3},)*(\d{3},)?\d{0,3}$/.test(e.key)) {
            $(".numberWithSeperator").on("input", function () {
                e.target.value = numberSeparator(e.target.value);
            });
        } else {
            e.preventDefault();
            return false;
        }
    });

    /* Input Number Format */

    /* Input Number Only */

    $(document).on("keypress", ".numberonly", function (e) {
        var charCode = e.which ? e.which : event.keyCode;
        if (String.fromCharCode(charCode).match(/[^0-9]/g)) return false;
    });

    /* Input Number Only */

    /* Input Number With Dollar Sign */

    $(document).on("keyup , paste", ".numberWithCurrency", function () {
        if ($(this).val() != "") {
            formatCurrency($(this));
        }
    });

    $(document).on("keyup , paste", ".numberWithPercentage", function () {
        if ($(this).val() != "") {
            $(this).addClass("active");
        }
        formatPercentage($(this));
    });

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
            input_val = left_side + "." + right_side + "%";
        } else {
            input_val = formatNumber(input_val);
            input_val = input_val + "%";
            if (blur === "blur") {
                input_val += ".00";
            }
        }
        input.val(input_val);
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
});
