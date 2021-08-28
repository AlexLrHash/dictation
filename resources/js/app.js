/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Delete User
$('.btn_delete_user_modal').click(function() {
  let attr = $(this).data('id');
  let newattr = $(this).data('token');
  $("#deleteuser").data('id', attr);
  $("#deleteuser").data('token', newattr)
})

$("#deleteuser").click(function(){
  $('#loader')[0].classList.add('spinner-border');
  $("#loader")[0].classList.add('spinner-border-sm');
  let id = $(this).data("id");
  let token = $(this).data("token");
  console.log(id);
  $.ajax(
  {
    url: 'delete-users/' + id,
    type: 'delete',
    dataType: "JSON",
    data: {
        "id": id,
        "_method": 'DELETE',
        "_token": token,
    },
    success: function (data)
    {
      console.log(data);
        // location.reload();
    },
    error: function(data) 
    {
      console.log(data);
    }
  });
});
// End Delete User

// Delete Dictation Result
$('.btn_delete_dictation_modal').click(function() {
  let attr = $(this).data('id');
  let newattr = $(this).data('token');
  $('#deletedictation').data('id', attr);
  $('#deletedictation').data('token', newattr);
});

 
$('#deletedictation').click(function() {
  var id = $(this).data("id");
  var token = $(this).data("token");
  $('#loader')[0].classList.add('spinner-border');
  $("#loader")[0].classList.add('spinner-border-sm');
  $.ajax(
  {
    url: 'delete-dictation-result/' + id,
    type: 'delete',
    dataType: "JSON",
    data: {
      "id": id,
      "_method": 'DELETE',
      "_token": token,
    },
    success: function ()
    {
      location.reload(); // для перезагрузки страницы
    },
    error: function (data) {
      console.log(data)
    }
  });
});
// End Delete Dictation Result


// Update
let fields = ['title', 'link', 'description', 'started_at', 'finished_at'];
for (let key = 0; key < fields.length; key++) {
  document.querySelector(`.modal-${fields[key]}-invalid`).style.display = 'none';
  document.querySelector(`.modal-${fields[key]}-invalid`).value = '';
  document.querySelector(`#modal-${fields[key]}`).value = '';
  document.getElementById(`modal-${fields[key]}`).classList.remove('is-invalid');
  document.querySelector(`.modal-${fields[key]}-invalid`).innerText = '';
}

$("#createdictation").click(function() {
  $('#loader')[0].classList.add('spinner-border');
  $("#loader")[0].classList.add('spinner-border-sm');
  token = $(this).data('token');
  let id = document.querySelector('#modal-id').value;
  let title = document.querySelector("#modal-title").value;
  let link = document.querySelector("#modal-link").value;
  let status = document.querySelector("#modal-status").checked;
  let description = document.querySelector("#modal-description").value;
  let started_at = document.querySelector('#modal-started_at').value;
  let finished_at = document.querySelector('#modal-finished_at').value;  
  $.ajax(
  {
    url: 'update-dictation/',
    type: 'post',
    dataType: "JSON",
    data: {
      'id':id,
      'title':title,
      'status':status,
      'link':link,
      'description': description,
      'started_at': started_at,
      'finished_at': finished_at,
      "_method": 'POST',
      "_token": token,
    },
    success: function (post)
    {
      // console.log(post)
      location.reload();
    },
    error: function (error) {
      console.log(error)
      for (key in error.responseJSON.errors) {
        document.querySelector(`.modal-${key}-invalid`).style.display = 'block';
        document.getElementById(`modal-${key}`).classList.add('is-invalid');
        document.querySelector(`.modal-${key}-invalid`).innerText = error.responseJSON.errors[key];
      }      
    }
  })
})
  
$('.change-dictation-modal').click(function () {
  let dictation = $(this).data('dictation');
  console.log(dictation);
  let token = $(this).data('token');
  document.querySelector("#modal-id").value = dictation['id'];
  document.querySelector("#modal-title").value = dictation['title'];
  document.querySelector("#modal-link").value = dictation['link']; 
  document.querySelector("#modal-status").checked = dictation['status'];  
  document.querySelector("#modal-description").value = dictation['description'];
  document.querySelector('#modal-started_at').value = dictation['started_at'];
  document.querySelector('#modal-finished_at').value = dictation['finished_at'];
})

$('.btn-close-modal').click(function() {
   let fields = ['title', 'link', 'description', 'started_at', 'finished_at'];
  for (let key = 0; key < fields.length; key++) {
    document.querySelector(`.modal-${fields[key]}-invalid`).style.display = 'none';
    document.querySelector(`.modal-${fields[key]}-invalid`).value = '';
    document.querySelector(`#modal-${fields[key]}`).value = '';
    document.getElementById(`modal-${fields[key]}`).classList.remove('is-invalid');
    document.querySelector(`.modal-${fields[key]}-invalid`).innerText = '';
  }
})
// End Create

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


// Search
$('.clear-search').click(function(){
  document.querySelector(`#${$(this).data('search')}`).value=''  
})


// LocalStorage
let U = localStorage["1"];

document.querySelector('#textarea-change').onchange = function(){
    localStorage["1"] = (getText());
};

function getText() {
  let str1 = document.querySelector('#textarea-change');
  return (str1.value + "");
}

function setText(value) {
  document.querySelector('#textarea-change').value = value;
}

document.querySelector('#textarea-delete').onclick = function() {
     localStorage["1"] = "";        
}
setText(U);
