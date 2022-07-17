$(document).ready(function () {

    //Validação formulário de usuário
    $('form#form-usuario').submit(function () {
        if (this.senha.value !== this.confirmar_senha.value) {
            addHelp('confirmar_senha', 'As senhas não conferem, verifique e tente novamente.');
            return false;
        }
    });

    //Validação formulário do primeiro acesso
    $('form#form-primeiro-acesso').submit(function () {
        if (this.nova_senha.value !== this.confirma_nova_senha.value) {
            addHelp('confirma_nova_senha', 'As senhas não conferem, verifique e tente novamente.');
            return false;
        }
    });

    //Validação formulário de jogadores
    $('form#form-jogadores').submit(function (e) {

        $('form#form-jogadores div.form-group').removeClass('has-error').children('strong.help-block').remove();
        $('form#form-jogadores div.form-group').find('strong.help-block').remove();

        /*inicio aba dados-pessoais*/
        if (this.nome.value === '') {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('nome', 'default');
            return false;
        }

        if (this.email.value === '') {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('email', 'default');
            return false;
        }
        if (!validateEmail(this.email.value)) {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('email', 'E-mail digítado "' + this.email.value + '" não é um e-mail válido.');
            return false;
        }

        if (this.data_nascimento.value === '') {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('data_nascimento', 'default');
            return false;
        }

        if (this.sexo.value === '') {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            alert('Campo Sexo é obrigatório, não pode ficar em branco');
            return false;
        }

        if (this.rg.value === '') {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('rg', 'default');
            return false;
        }

        if (this.cpf.value === '') {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('cpf', 'default');
            return false;
        }

        if (!validaCpf(this.cpf.value)) {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('cpf', 'CPF não é um número válido, verifique is números digítados.');
            return false;
        }

        if (this.facebook.value !== '' && !validaUrl(this.facebook.value)) {
            $('.nav-tabs a[href="#dados-pessoais"]').tab('show');
            addHelp('facebook', 'A URL digítada no campo Facebook não é válida.');
            return false;
        }
        /*fim aba dados-pessoais*/

        /*inicio aba dados-jogador*/
        if (this.posicoes.value === '') {
            $('.nav-tabs a[href="#dados-jogador"]').tab('show');
            $('label[for=posicoes]').after('<strong class="help-block text-red">Campo obrigatório, não pode ficar em branco.</strong>');
            $('label[for=posicoes]').parents('div.form-group').addClass('has-error');
            return false;
        }
        /*fim aba dados-jogador*/

        /*inicio aba dados-endereco*/
        if (this.cep.value === '') {
            $('.nav-tabs a[href="#dados-endereco"]').tab('show');
            addHelp('cep', 'default');
            return false;
        }
        if (this.rua.value === '') {
            $('.nav-tabs a[href="#dados-endereco"]').tab('show');
            addHelp('rua', 'default');
            return false;
        }
        if (this.bairro.value === '') {
            $('.nav-tabs a[href="#dados-endereco"]').tab('show');
            addHelp('bairro', 'default');
            return false;
        }
        if (this.cidade.value === '') {
            $('.nav-tabs a[href="#dados-endereco"]').tab('show');
            addHelp('cidade', 'default');
            return false;
        }
        if (this.uf.value === '') {
            $('.nav-tabs a[href="#dados-endereco"]').tab('show');
            addHelp('uf', 'default');
            return false;
        }
        /*fim aba dados-endereco*/

        /*inicio aba dados-usuario*/
        if (this.login.value === '') {
            $('.nav-tabs a[href="#dados-usuario"]').tab('show');
            addHelp('login', 'default');
            return false;
        }

        if (this.id.value === '' && this.password.value === '') {
            $('.nav-tabs a[href="#dados-usuario"]').tab('show');
            addHelp('password', 'default');
            return false;
        }

        if (this.id.value === '' && this.confirm_password.value === '') {
            $('.nav-tabs a[href="#dados-usuario"]').tab('show');
            addHelp('confirm_password', 'default');
            return false;
        }

        if (this.password.value !== this.confirm_password.value) {
            $('.nav-tabs a[href="#dados-usuario"]').tab('show');
            $('input[name=confirm_password]').val('');
            addHelp('confirma_nova_senha', 'As senhas não conferem, verifique e tente novamente.');
            return false;
        }

        if (this.nivel.value === '') {
            $('.nav-tabs a[href="#dados-usuario"]').tab('show');
            addHelp('nivel', 'default');
            return false;
        }

        if (this.nivel.value !== '' && this.nivel_id.value === '') {
            $('.nav-tabs a[href="#dados-usuario"]').tab('show');
            addHelp('nivel', 'O campo nível não foi selecionado corretamente.');
            return false;
        }

        if (this.usuario_ativo.value === '') {
            $('.nav-tabs a[href="#dados-usuario"]').tab('show');
            alert('Campo Ativo do Usuário é obrigatório, não pode ficar em branco');
            return false;
        }
        /*fim aba dados-usuario*/

        /*inicio aba dados-documentos*/
        $('form#form-jogadores #dados-documentos input[name*=documentos_upload]:required').each(function () {
            if ($(this).val() === '') {
                $('.nav-tabs a[href="#dados-documentos"]').tab('show');
                alert($('label[for=' + $(this).attr('id') + ']').text());
                addHelp($(this).attr('name'), 'O campo '+$('label[for=' + $(this).attr('id') + ']').text()+' não foi preenchido corretamente.');
                return false;         
            }
        });
        /*fim aba dados-documentos*/
    });

    //Validação de todos forms
    $('form[method=post]').submit(function (e) {

        $('.form-control').removeClass('has-error');
        var retorno = true;

        $('input.autocomplete').each(function () {
            //verifica se o valor do campo autocomplete foi preenchido e nao foi selecionado para preencher o id
            if ($(this).val() !== '' && $('#' + $(this).attr('name') + '_id').val() === '') {
                addHelp($(this).attr('name'), 'O valor do campo ' + $(this).attr('name') + ' não foi preenchido corretamente.');
                retorno = false;
            }
        });

//        if(retorno){
//            $('form button').attr('disabled', true);
//            openLoad();
//        }
        return retorno;
    });
});