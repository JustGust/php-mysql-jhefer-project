

document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'block';
  });
  
  document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('modal').style.display = 'none';
  });
  
  window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('modal')) {
      document.getElementById('modal').style.display = 'none';
    }
  });



  
  document.getElementById('closeUpdate').addEventListener('click', function() {
    document.getElementById('modalUpdate').style.display = 'none';
  });
  
  window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('modalUpdate')) {
      document.getElementById('modalUpdate').style.display = 'none';
    }
  });


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