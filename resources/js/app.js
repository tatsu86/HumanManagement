require('./bootstrap');

// window.$ = window.jQuery = require('jquery');

function deleteAlert() {
  if(!window.confirm('本当に削除しますか？')){
    return false;
  }
  document.deleteform.submit();

  // if (confirm("本当に削除しますか？")) {
  //   return true;
  // } else {
  //   return false;
  // }
}

function showAlert() {
  alert("showAlert");
}