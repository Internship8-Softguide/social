const validate = (elementArr) => {
    $(".validate").text("");
    let valid = true;
    for (let index = 0; index < elementArr.length; index++) {
        let status = true;
        const element = elementArr[index];
        let rules = element.attr("validate");
        let ruleArr = rules.split("|");        
        for (let i = 0; i < ruleArr.length; i++) {
            let number = 0;
            if (ruleArr[i].includes(":")) {
                let innerRule = ruleArr[i].split(":");
                number = innerRule[1];
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
                case "conpassword":
                    status = conpassword(element);
                    break;
                case "number":
                    status = number(element);
                    break;
                case "min:" + number:
                    status = min(element, number);
                    break;
                case "max:" + number:
                    status = max(element, number);
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
    return true;
}

const max = (element, number) => {
    return true;
}

const password = (element, number) => {
    return false;
}

const file = (element) => {
    let file = element[0].files[0];
    let text = $('#textField').val().trim();
    let fileName = file ? file.name : "";
    let fileExtension = fileName.split('.').pop().toLowerCase();
    let allowedExtensions = ['jpg', 'jpeg', 'png'];
    if (!file && !text) {
        $("#postCreateErr").text("Either a file or text is required.");
        return false;
    }
    if (file && !allowedExtensions.includes(fileExtension)) {
        $('#fileErr').text("File type must be JPG, JPEG, or PNG.");
        return false;
    }
    return true;
};

const numberCheck = (element) =>{
    console.log("checck number")
    let value = element.val();
    var labelText = $('label[for="' + element.attr("id") + '"]').text();
   if(element.attr("id") === "number"){
   if( !/^\d+(\.\d+)?$/.test(value)){
    $('#'+element.attr("id")+"Err").text(labeText + " Only numbers are allowed!");
    return false;
   }
   return true;
}
};

