<div id="register-modal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4 class="register-title">Bem vindooo! =)</h4>
        <p class="register-text-body">
            Nós do time Swapage apreciamos muito seu interesse em utilizar nossa aplicação, esperamos sinceramente que 
            consiga muitas trocas vantajosas e momentos proveitos, caso precise de algo ou queira nos dar umas dicas 
            por favor entre em <a>contato</a>.
        </p>
        <div>
            <div class="row">
                <div class="input-field col s12 m4 ">
                    <input id="username" type="text" class="validate" required>
                    <label for="username" data-error="wrong" data-success="right">Nome</label>
                </div>
                <div class="input-field col s12 m4">
                    <input id="nickname" type="text" class="validate" required>
                    <label for="nickname" data-error="wrong" data-success="right">Apelido</label>
                </div>
                <div class="input-field date-field col s12 m4">
                    <input type="text" id="birth" class="datepicker" required>
                    <!--<label for="birth" data-error="wrong" data-success="right">Aniversário</label>-->
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4">
                    <input id="emailuser" type="email" class="validate" required>
                    <label for="emailuser" data-error="wrong" data-success="right">Email</label>
                </div>
                <div class="input-field col s6 m4">
                    <input id="password" type="password" class="validate">
                    <label for="password" data-error="wrong" data-success="right">Senha</label>
                </div>
                <div class="input-field col s6 m4">
                    <input id="country" type="text" class="validate" placeholder="País" required>
                    <!--<label for="country" data-error="wrong" data-success="right">Pais</label>-->
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4">
                    <input id="state" type="text" class="validate">
                    <label for="state" data-error="wrong" data-success="right">Estado</label>
                </div>
                <div class="input-field col s6 m4">
                    <input id="city" type="text" class="validate">
                    <label for="city" data-error="wrong" data-success="right">Cidade</label>
                </div>
                 <div class="input-field col s6 m4">
                    <select id="gender" required>
                      <option value="M">Masculino</option>
                      <option value="F">Femino</option>
                    </select>
                    <label for="gender" data-error="wrong" data-success="right">Sexo</label>
                 </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat register-button-close">Sair</a>        
        <a href="#!" id="enviar-cadastro" class="modal-action waves-effect waves-green btn-flat register-button-submmit">Enviar</a>
    </div>
</div>
