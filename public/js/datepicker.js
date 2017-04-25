$( "#datepicker-input" ).datepicker({
  // altField: "#datepicker-input",
  // altFormat: "yy-mm-dd",
  showButtonPanel: true,
  dateFormat: "dd-mm-yy",
  changeMonth: true,
  changeYear: true,
  yearRange: "c-100:c+10",
  // defaultDate: +1,
  buttonImageOnly: true,
  buttonImage: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABEAAAATCAYAAAB2pebxAAABGUlEQVQ4jc2UP06EQBjFfyCN3ZR2yxHwBGBCYUIhN1hqGrWj03KsiM3Y7p7AI8CeQI/ATbBgiE+gMlvsS8jM+97jy5s/mQCFszFQAQN1c2AJZzMgA3rqpgcYx5FQDAb4Ah6AFmdfNxp0QAp0OJvMUii2BDDUzS3w7s2KOcGd5+UsRDhbAo+AWfyU4GwnPAYG4XucTYOPt1PkG2SsYTbq2iT2X3ZFkVeeTChyA9wDN5uNi/x62TzaMD5t1DTdy7rsbPfnJNan0i24ejOcHUPOgLM0CSTuyY+pzAH2wFG46jugupw9mZczSORl/BZ4Fq56ArTzPYn5vUA6h/XNVX03DZe0J59Maxsk7iCeBPgWrroB4sA/LiX/R/8DOHhi5y8Apx4AAAAASUVORK5CYII=",
  buttonText: "Choisir une date",
  showOn: "button",
});

$.datepicker.regional['fr'] = {
    closeText: 'Fermer',
    prevText: '&#x3c;Précédent',
    nextText: 'Suivant&#x3e;',
    currentText: 'Aujourd\'hui',
    monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août',
        'Septembre', 'Octobre', 'Novembre', 'Décembre'
    ],
    monthNamesShort: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
    dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    dayNamesShort: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
    dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};

$.datepicker.setDefaults($.datepicker.regional['fr']);
// debugger;
$( "#datepicker-div" ).datepicker({
  // altField: "#datepicker-input",
  // altFormat: "yy-mm-dd",
  // hideIfNoPrevNext = true,
  dateFormat: "dd/mm/yy",
  yearRange: "c-100:c+10",
  // defaultDate: +1,
});