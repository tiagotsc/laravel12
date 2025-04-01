function appData(){
    return {
        loading: false, // Loading botão
        buttonLabel: 'Cadastrar', // Texto botão
        submitData(){
            if($("#frm-create").valid()){
                const form = document.getElementById('frm-create');
                this.buttonLabel = 'Aguarde...'
                this.loading = true;
                form.submit();
            }
        }
    }
}
