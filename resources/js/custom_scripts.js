$( document ).ready(function() {
    $(".kwota").maskMoney({thousands: ',', decimal:"." ,  affixesStay: true});
    
    $(".liczba_input").mask('###', {
        translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
   });
});