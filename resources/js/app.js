require('./bootstrap');

$(function() {
  // フラッシュメッセージ
  $('.flash_message').fadeOut(5000);
});

//
// class
//
// フォームのクリアボタン
$('.clear-btn').on('click', function() {
  //idがsearch_formのform内の全てのinputのvalueを空にする
  $('#search_form input:text').each(function() {
    $(this).val("");
  });
  $('#search_form select').each(function() {
    $(this).prop("selectedIndex", 0);
  });
});

function deleteAlert() {
  if(!window.confirm('本当に削除しますか？')){
    return false;
  }
  document.deleteform.submit();
}

function showAlert() {
  alert("showAlert");
};