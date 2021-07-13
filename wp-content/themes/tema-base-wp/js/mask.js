(function( $ ) {

  $('input, textarea').on('blur', function(event) {
    var inputValue = this.value;
    if (inputValue) {
      this.classList.add('has_value');
    } else {
      this.classList.remove('has_value');
    }
  });
  var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {
    onKeyPress: function (val, e, field, options) {
        field.mask(behavior.apply({}, arguments), options);
    }
};

$('input.wpcf7-tel').mask(behavior, options);
})(jQuery);


