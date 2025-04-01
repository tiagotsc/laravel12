$("#price").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});

frmValidate(
    "#frm-create",
    {
        item_sold: {
            required: true,
            minlength: 5,
            maxlength: 50
        },
        price: {
            required:true,
            number:{
                depends: function(element){
                    let status = false;
                    let input = ($(this).val()).toString().replaceAll('.','').replaceAll(',','.');
                    let value = parseFloat(input.trim() == '' ? 0.00: input);
                    let ruleValue = parseFloat(0.02);

                    if(value < ruleValue){
                        status = true;
                    }
                    return status;
                }
            }
        },
    },
    {
        item_sold: {
            required: "Informe, por favor!",
            minlength: "Mínimo 5 caracteres",
            maxlength: "Máximo 50 caracteres"
        },
        price: {
            required: "Informe, por favor",
            number: "Informe valor maior que R$ 0,01!"
        },
    }
);
