const postFormData = async (url, formData) => {
    return await $.ajax({
        url: url,
        type: "POST",
        contentType: false, 
        processData: false, 
        data: formData,
    });
};

const postJson = async (url, request) => {
    return await $.ajax({
        url: url,
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(request),
        dataType: "json",
    });
};

const updateFormData = async (url, idFromUi, formData) => {
    const id = atob(idFromUi)
    return await $.ajax({
        url: url+id,
        type: "POST",
        contentType: false, 
        processData: false, 
        data: formData,
    });
};

const updateJson = async (url, idFromUi, request) => {
    const id = atob(idFromUi)
    return await $.ajax({
        url: url+id,
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify(request),
        dataType: "json",
    });
};

const getDataWithId = async (url, idFromUi) => {
    const id = atob(idFromUi)
    return await $.ajax({
        url: url+id,
        type: "GET",
    });
};

const getAllData = async (url) => {
    return await $.ajax({
        url: url,
        type: "GET",
    });
};

const DeteleWithId = async (url, idFromUi) => {
    const id = atob(idFromUi)
    return await $.ajax({
        url: url+id,
        type: "DELETE",
    });
};
