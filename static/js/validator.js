const validate = (elementArr) => {
    $('.validate').text('');
    let status = true;
    elementArr.forEach(element => {
        let rules = element.attr('validate');
        let ruleArr = rules.split('|');
        ruleArr.forEach((rule) => {

            switch (rule) {
                case 'blank':
                    status = blank(element);
                    break;
                case 'password':
                case 'email':
                    status = email(element);
                    break;
                case 'number':
                case 'max':
                case 'min':
                case 'file':
                default:
                    break;
            }
        });
    });
    return status;
}


const blank = (element) => {
    let value = element.val()
    if (value === null || value === '') {
        var labelText = $('label[for="' + element.attr('id') + '"]').text();
        $('#' + element.attr('id') + 'Err').text(labelText + " can not be blank");
        return false;
    }
    return true;
}

const email = (element) => {
    if (element.attr('id') === 'email') {
        let value = element.val();
        let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var labelText = $('label[for="' + element.attr('id') + '"]').text();
        if (value == null || value == '') {
            $('#' + element.attr('id') + 'Err').text(labelText + " can not be blank");
            return false;
        } else if (!regex.test(value)) {
            $('#' + element.attr('id') + 'Err').text(labelText + " is invalid");
            return false;
        }
    }
    return true;
}