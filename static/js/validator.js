const validate = (elementArr) => {
    $(".validate").text("");
    let status = true;
    elementArr.forEach((element) => {
        let rules = element.attr("validate");
        let ruleArr = rules.split("|");
        ruleArr.every((rule) => {
            if (rule.startsWith("min:")) {
                var minValue = parseInt(rule.split(":")[1], 10);
                var minValidateValue = "min:" + minValue;
            }
            if (rule.startsWith("max:")) {
                var maxValue = parseInt(rule.split(":")[1], 10);
                var maxValidateValue = "max:" + maxValue;
            }
            if (rule.startsWith("strongpassword:")) {
                let min = parseInt(rule.split(":")[1], 10);
                let max = parseInt(rule.split(":")[2], 10);
                let specail = rule.split(":")[3];
                let capital = rule.split(":")[4];
                var checkPasswordMinAndMax =
                    "strongpassword:" +
                    min +
                    ":" +
                    max +
                    ":" +
                    specail +
                    ":" +
                    capital;
                var checkPasswordMinValue = "strongpassword:" + min;
            }
            switch (rule) {
                case "blank":
                    status = blank(element);
                    return status;
                case checkPasswordMinAndMax:
                    status = checkPassword(element, rule);
                    return status;

                case "email":
                    status = email(element);
                    break;
                default:
                    return false;
            }
        });

        return status;
    });
    return status;
};

const email = (element) => {
    if (element.attr("id") === "email") {
        let value = element.val();
        let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var labelText = $('label[for="' + element.attr("id") + '"]').text();
        if (value == null || value == "") {
            $("#" + element.attr("id") + "Err").text(
                labelText + " can not be blank"
            );
            return false;
        } else if (!regex.test(value)) {
            $("#" + element.attr("id") + "Err").text(labelText + " is invalid");
            return false;
        }
    }
    return true;
};
const blank = (element) => {
    let value = element.val();
    if (value == null || value == "") {
        var labelText = $('label[for="' + element.attr("id") + '"]').text();
        $("#" + element.attr("id") + "Err").text(
            labelText + " can not be blank"
        );
        return false;
    }
    return true;
};

const checkPassword = (element, rule) => {
    let min = parseInt(rule.split(":")[1], 10);
    let max = parseInt(rule.split(":")[2], 10);
    let specail = rule.split(":")[3];
    let capital = rule.split(":")[4];
    let value = element.val();
    var labelText = $('label[for="' + element.attr("id") + '"]').text();
    console.log(element.attr("type"));
    if (element.attr("type") === "password") {
        if (value.length < min) {
            $("#" + element.attr("id") + "Err").text(
                labelText + ` must be at least ${min} characters long  `
            );
            return false;
        }
        if (value.length > max) {
            $("#" + element.attr("id") + "Err").text(
                labelText + ` must not be greater than  ${max} characters long`
            );
            return false;
        }
        if (capital === "A-Z") {
            if (!/[A-Z]/.test(value)) {
                $("#" + element.attr("id") + "Err").text(
                    labelText + " must contain at least one uppercase letter"
                );
                return false;
            }
        }
        if (!/[0-9]/.test(value)) {
            $("#" + element.attr("id") + "Err").text(
                labelText + " must contain at least one number"
            );
            return false;
        }
        if (specail) {
            if (!/[!@#$%^&*]/.test(value)) {
                $("#" + element.attr("id") + "Err").text(
                    labelText + " must contain at least one special character"
                );
                return false;
            }
        }
    } else {
        return false;
    }
    $("#" + element.attr("id") + "Err").text("");
    return true;
};

const checkMinValue = (element, rule) => {
    // console.log(element);
    // console.log(rule);
    var labelText = $('label[for="' + element.attr("id") + '"]').text();
    let minValue = parseInt(rule.split(":")[1], 10);
    if (element.val().length < minValue) {
        $("#" + element.attr("id") + "Err").text(
            labelText + ` must be at least  ${minValue}  characters long `
        );
        return false;
    }
    return true;
};
const checkMaxValue = (element, rule) => {
    // console.log(element);
    // console.log(rule);
    var labelText = $('label[for="' + element.attr("id") + '"]').text();
    let maxValue = parseInt(rule.split(":")[1], 10);
    if (element.val().length > maxValue) {
        $("#" + element.attr("id") + "Err").text(
            labelText + ` must not be greater than  ${maxValue}  characters`
        );
        return false;
    }
    return true;
};
const checkPasswordMin = (element, rule) => {
    let min = parseInt(rule.split(":")[1], 10);
    let value = element.val();
    var labelText = $('label[for="' + element.attr("id") + '"]').text();

    if (value == null || value === "") {
        $("#" + element.attr("id") + "Err").text(
            labelText + " cannot be blank"
        );
        return false;
    }
    if (element.attr("type") === "password") {
        if (value.length < min) {
            $("#" + element.attr("id") + "Err").text(
                labelText + ` must be at least ${min} characters long  `
            );
            return false;
        }
    }
    $("#" + element.attr("id") + "Err").text("");
    return true;
};
//hello
