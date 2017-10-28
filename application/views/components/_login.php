<div id="login-modal" class="modal">
    <div class="modal-content">
        <h4 class="login-title">Login!!</h4>
        <div class="row email-field">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate" required>
                <label class="active" for="email" data-error="wrong" data-success="right">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" required>
                <label class="active" for="password" data-error="wrong" data-success="right">Senha</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <a href="#" class="forgot-my-pswd">Esqueceu a senha?</a>
                <section class="recovery-password">
                    <div class="row">
                        <p>Enviaremos um e-mail para você poder redefinir sua nova senha :-)</p>
                    </div>
                    <div class="row email-field">
                        <div class="input-field col s12">
                            <input id="email-recovery" type="email" class="validate" required>
                            <label class="active" for="email-recovery" data-error="wrong" data-success="right">Email</label>
                        </div>
                        <a href="#" class="close-forgot-my-pswd waves-effect waves-green btn-flat login-button-close">Voltar</a>
                        <a href="#" class="send-email-recovery waves-effect waves-green btn-flat login-button-access">Enviar</a>
                </section>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat login-button-close">Sair</a>
        <a href="#" id="logar" class="modal-action waves-effect waves-green btn-flat login-button-access">Acessar</a>
    </div>
</div>