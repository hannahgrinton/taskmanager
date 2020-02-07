// importing JQuery from /node_modules
import $ from "jquery";


$('#txtBacklog').keypress(function (e) {
    if (e.which == 13) {
      $('#formBacklog').submit();
      return false;
    }
});

$('#txtProgress').keypress(function (e) {
    if (e.which == 13) {
      $('#formProgress').submit();
      return false;
    }
});

$('#txtDone').keypress(function (e) {
    if (e.which == 13) {
      $('#formDone').submit();
      return false;
    }
});