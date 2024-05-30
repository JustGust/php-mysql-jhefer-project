
controlMsg();

function controlMsg(){
    let queryString = window.location.search;
    let params = new URLSearchParams(queryString)
    let error= params .get('error');
    let alert= params .get('alert');

    if (error) {
        if(alert == '1'){
            document.querySelectorAll('.error').forEach(element => element.textContent = error);
            document.querySelector('.error').classList.remove('my-color-msg-error');
            document.querySelector('.error').classList.add('my-color-msg-success');
        }else{
            document.querySelectorAll('.error').forEach(element => element.textContent = error);
            document.querySelector('.error').classList.remove('my-color-msg-success');
            document.querySelector('.error').classList.add('my-color-msg-error');
        }       
        document.querySelector('.content-msg').classList.remove('d-none');
    }else{
        document.querySelector('.content-msg').classList.add('d-none');
    }

}