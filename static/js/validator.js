const validate = (elementArr) => {
    $(".validate").text("");
    let valid = true;
    for (let index = 0; index < elementArr.length; index++) {
        let status    = true;
        const element = elementArr[index];
        let rules     = element.attr("validate");
        let ruleArr   = rules.split("|");

        for (let i = 0; i < ruleArr.length; i++) {
            let no = 0;
            if (ruleArr[i].includes(":")) {
                let innerRule = ruleArr[i].split(":");
                no = innerRule[1];
            }
            switch (ruleArr[i]) {
                case "blank":
                    status = blank(element);
                    break;
                case "email":
                    status = email(element);
                    break;
                case "password":
                    status = password(element);
                    break;
                case "confirm":
                    status = confirm(element);
                    break;
                case "number":
                    status = number(element);
                    break;
                case "min:" + no:
                    status = min(element, no);
                    break;
                case "max:" + no:
                    status = max(element, no);
                    break;
                case "file":
                    status = file(element);
                    break;
                default:
                    break;
            }
            if (status === false) {
                valid = false;
                break;
            }
        }
    }
    return valid;
};

const email = (element) => {
    if (element.attr("id") === "email") {
        let value = element.val();
        let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var labelText = $('label[for="' + element.attr("id") + '"]').text();
        if (!regex.test(value)) {
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

const min = (element, number) => {
    let value = element.val();
    if (value.length < number) {
        var labelText = $('label[for="' + element.attr("id") + '"]').text();
        $("#" + element.attr("id") + "Err").text(
            labelText + " must be at least " + number + " characters"
        );
        return false;
    }
    return true;
}

const max = (element, number) => {
    let value = element.val();
    if (value.length > number) {
        var labelText = $('label[for="' + element.attr("id") + '"]').text();
        $("#" + element.attr("id") + "Err").text(
            labelText + " must be at much " + number + " characters"
        );
        return false;
    }
    return true;
}

const password = (element, number) => {
    // let value     = element.val();
    // let regex     = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
    // var labelText = $('label[for="' + element.attr("id") + '"]').text();

    // if (!regex.test(value)) {
    //     $("#" + element.attr("id") + "Err").text(labelText + " must contain at least 8 characters, one uppercase, one lowercase, one number, and one special character");
    //     return false;
    // }
    return true;
}

const confirm = (element) => {
    // let value     = element.val();
    // let password  = $("#password").val();
    // var labelText = $('label[for="' + element.attr("id") + '"]').text();
    // if (value !== password) {
    //     $("#" + element.attr("id") + "Err").text(labelText + " did not match!");
    //     return false;
    // }
    return true;
}

const file = (element) => { 
    if (element[0].files.length > 0) {
        let file              = element[0].files[0];
        let fileName          = file.name.toLowerCase();
        let fileExtension     = fileName.split('.').pop();
        let allowedExtensions = ['jpg', 'jpeg', 'png'];

        if (!allowedExtensions.includes(fileExtension)) {
            $('#fileErr').text("File type must be JPG, JPEG, or PNG.");
            return false;
        }
        return true;
    } else {
        let text = $('#textField').val().trim();
        if (!text) {
            $("#postCreateErr").text("Either a file or text is required.");
            return false;
        }
    }
    
    return true;
};


const number = (element) => {
    let value = element.val();
    var labelText = $('label[for="' + element.attr("id") + '"]').text();
    if (!/^\d+(\.\d+)?$/.test(value)) {
        $('#' + element.attr("id") + "Err").text(labelText + " must be only number!");
        return false;
    }
    return true;
};

const commonValidatMessage = (obj) => {
    for (let key in obj) {
        if (key == 'status') continue;
        if (obj.hasOwnProperty(key)) {
            $("#" + key + 'Err').text(obj[key]);
        }
    }
}
