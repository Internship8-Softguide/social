const validate = (elementArr) => {
    $(".validate").text("");
    let status = true;
    for (let index = 0; index < elementArr.length; index++) {
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
                    status = password(element);
                    break;
                case "min:" + number:
                    status = min(element, number);
                    break;
                case "max:" + number:
                    status = man(element, number);
                    break;
                default:
                    break;
            }
            if (status === false) break;
        }
        if (status === false) break;
    }
    return status;
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
    return false;
}

const max = (element, number) => {
    return false;
}

const password = (element, number) => {
    return false;
}