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
    if (value == null || value == '') {
        var labelText = $('label[for="' + element.attr('id') + '"]').text();
        $('#' + element.attr('id') + 'Err').text(labelText + " can not be blank");
        return false;
    }
    return true;
}