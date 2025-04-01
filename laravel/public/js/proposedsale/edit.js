$(document).ready(function() {
    $("#end_date").datepicker( {
        uiLibrary: 'bootstrap5',
        format: "dd/mm/yyyy",
        autoclose: 'true',
        clearBtn: true,
        language: 'pt-BR'
    }).on('changeDate', function(e){
        $("#end_date").valid();
    });
});

frmValidate(
    "#frm-edit",
    {
        obs: {
            required: true
        },
        end_date: {
            required:{
                depends: function(element){
                    let status = false;
                    if($('#status_id').val() == 3){
                        status = true;
                    }
                    return status;
                }
            }
        }
    },
    {
        obs: {
            required: "Informe, por favor!"
        },
        end_date: {
            required: "Informe, por favor!"
        }
    }
);
