let prepareMessage = response => {
    let htmlContent = '';
    if(response.responseJSON.errorMsg) {
        htmlContent += '<p class="text-danger">' + response.responseJSON.errorMsg + '</p>';
    }else if (isErrorCodes(response.status)){
        htmlContent += '<p class="text-danger">' + response.status + ' | ' + response.statusText + '</p>';
    }
    else {
        let dataValues = Object.values(response.responseJSON.errors);
        for (let count = 0; count < dataValues.length; count++) {
            htmlContent += '<p class="text-danger">' + dataValues[count] + '</p>';
        }
    }
    return htmlContent;
}



let displayErrorMessage = htmlContent => {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: htmlContent
    })
}

let displaySuccessMessage = customMessage => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: 'success',
        title: customMessage
    })
}


let isErrorCodes = errorCode => {
    return laravelErrorCodes.some(error => error.code === errorCode);
}

const laravelErrorCodes = [
    { code: 400, message: "Bad Request" },
    { code: 401, message: "Unauthorized" },
    { code: 403, message: "Forbidden" },
    { code: 404, message: "Not Found" },
    { code: 500, message: "Internal Server Error" },
];
