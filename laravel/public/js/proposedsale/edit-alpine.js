function appData(){
    return {
        loading: false, // Loading botão
        buttonLabel: 'Alterar proposta', // Texto botão
        showEndDate: false,// Exibe input end_date
        initData(){ // Configura tela inicialmente
            if(document.getElementById('status_id').value == 3){ // Finalizado
                this.showEndDate = true;
            }
        },
        changeStatus(ev){ // Controla alteração do status
            if(ev.target.value == 3){//Finalizado
                this.showEndDate = true;
            }else{
                this.showEndDate = false;
                document.getElementById('end_date').value = '';
            }
        },
        submitData(){
            if($("#frm-edit").valid()){
                const form = document.getElementById('frm-edit');
                this.buttonLabel = 'Aguarde...'
                this.loading = true;
                form.submit();
            }
        }
    }
}
