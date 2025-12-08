import $ from 'jquery';

function popitup(url, title, win, width, height) {
  const y = win.top.outerHeight / 2 + win.top.screenY - (height / 2);
  const x = win.top.outerWidth / 2 + win.top.screenX - (width / 2);
  newwindow = window.open(url, 'title', 'height=' + height + ', width=' + width + ', top=' + y + ', left=' + x);
  if (window.focus) {
    newwindow.focus()
  }
}

function validateEircode(eircode) {
  var pattern =
    '\\b(?:(' +
    'a(4[125s]|6[37]|7[5s]|[8b][1-6s]|9[12468b])|' +
    'c1[5s]|' +
    'd([0o][1-9sb]|1[0-8osb]|2[024o]|6w)|' +
    'e(2[15s]|3[24]|4[15s]|[5s]3|91)|' +
    'f(12|2[368b]|3[15s]|4[25s]|[5s][26]|9[1-4])|' +
    'h(1[2468b]|23|[5s][34]|6[25s]|[79]1)|' +
    'k(3[246]|4[5s]|[5s]6|67|7[8b])|' +
    'n(3[79]|[49]1)|' +
    'p(1[247]|2[45s]|3[126]|4[37]|[5s][16]|6[17]|7[25s]|[8b][15s])|' +
    'r(14|21|3[25s]|4[25s]|[5s][16]|9[35s])|' +
    't(12|23|34|4[5s]|[5s]6)|' +
    'v(1[45s]|23|3[15s]|42|9[2-5s])|' +
    'w(12|23|34|91)|' +
    'x(3[5s]|42|91)|' +
    'y(14|2[15s]|3[45s])' +
    ')\\s?[abcdefhknoprtsvwxy\\d]{4})\\b';

  var reg = new RegExp(pattern, 'i');

  var i = String(eircode).search(reg);

  if (i!=-1) {
    return(String(eircode).substring(i,i+8).toUpperCase().replace(' ', '').replace(/O/g, 0).replace(/S/g, 5).replace(/B/g, 8));
  } else {
    return false;
  }

}

jQuery(document).on('ready gform_post_render', function(){

  $('#find-eircode').on('click', function(e) {

    e.preventDefault();

    popitup('//finder.eircode.ie/#/', 'Find Eircode', window, 300, 350);

  });

  $('.eircode-field input[type="text"]').on('paste change keyup', function(e) {

    let eircode = $(this).val();
    let trim = eircode.split(" ").join("");

    $(this).val(trim);

    validate_result = validateEircode(trim);

    console.log(validate_result);

    if (false === validate_result) {
      $(this).toggleClass('not-valid');
      $(this).removeClass('valid');
    } else {
      $(this).removeClass('not-valid');
      $(this).toggleClass('valid');
    }

  });

});