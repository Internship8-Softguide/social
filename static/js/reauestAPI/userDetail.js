$(() => {
    let userCookie = getCookie();
    let editPen = $(".fa-pen");
    let edit = $(".fa-edit");
    edit.on("click", function (event) {
        let pElement = $(this).closest(".about").find("p");
        let textArea = $('<textarea width="100px" height="30px" class="edit-textarea"></textarea>').val(pElement.text().trim()).attr('rows', 4).attr('cols', 50);
        pElement.html(textArea);
        this.style.display = 'none';
        let check = $(this).closest(".about").find(".fa-check");
        check.on("click", function () {
            let request = {
                id: userCookie.data.id,
                data: textArea.val(),
                type: "name"
            };
            postJson('./server/user/editUser.php', request)
                .then((jsonResult) => {
                    if (jsonResult.status == 200) {
                        check.css('display', 'none');
                        edit.css('display', 'block');
                        pElement.empty().append(textArea.val());
                    } else {
                        commonValidatMessage(jsonResult.data);
                    }
                    loadingHide();
                })
        });
        check.css('display', 'block');
    });

    editPen.on("click", function (event) {
        resetInput();
        let parentP = $(this).parent();
        let input = $('<input type="text" class="edit-input" value="' + parentP.text().trim() + '">');
        parentP.html(input);
    });

    const resetInput = () => {
        let input = $('.info p input');

        for (let i = 0; i < input.length; i++) {
            const element = input[i];
            const parent = $(element).parent();

            parent.empty().append(element.value.trim() + "<i class='fa-solid fa-pen'></i>");

            parent.find(".fa-pen").on("click", function () {
                resetInput();
                let parentP = $(this).parent();
                let input = $('<input type="text" class="edit-input" value="' + parentP.text().trim() + '">');
                parentP.html(input);
            });
        }
    }

    $('.info').on('change', 'p input', function () {
        const parentElement = $(this).parent();
        const inputValue = $(this).val();
        const type = parentElement.attr('type');
        let request = {
            id  : userCookie.data.id,
            data: inputValue, 
            type: type
        };

        postJson('./server/user/editUser.php', request)
            .then((jsonResult) => {
                if (jsonResult.status == 200) {
                    parentElement.empty().append(inputValue + "<i class='fa-solid fa-pen'></i>");

                    parentElement.find(".fa-pen").on("click", function () {
                        resetInput();
                        let parentP = $(this).parent();
                        let input = $('<input type="text" class="edit-input" value="' + parentP.text().trim() + '">');
                        parentP.html(input);
                    });
                } else {
                    commonValidatMessage(jsonResult.data);
                }
                loadingHide();
            })
    });

});
