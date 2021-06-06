function inicializarMascaras(){

    $('.maskNumber').maskMoney({
        thousands:'.',
        precision: 0,
        allowZero: true
    }).keyup(revalidaCampoMascara);

    $(".maskMoney").maskMoney({
        thousands:'.',
        decimal:',',
        precision: 2,
        allowZero: true,
    }).keyup(revalidaCampoMascara);


}
  
function revalidaCampoMascara(){
    if($(this).parents('form').data('formValidation')){
        // Revalida o campo
        $(this).parents('form').data('formValidation').revalidateField($(this).attr('name'));
    }
}

$(document).ready(function(){
    inicializarMascaras();
})