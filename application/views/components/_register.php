<div id="register-modal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4 class="register-title"><?= $this->lang->line('home_modal_register_title') ?></h4>
        <p class="register-text-body"><?= $this->lang->line('home_modal_register_body') ?></p>
        <div>
            <div class="row">
                <div class="input-field col s12 m4 ">
                    <input id="username" type="text" class="validate" required>
                    <label for="username" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_name') ?></label>
                </div>
                <div class="input-field col s12 m4">
                    <input id="nickname" type="text" class="validate" required>
                    <label for="nickname" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_nickname') ?></label>
                </div>
                <div class="date-field input-field col s12 m4">
                    <input type="text" id="birth" class="validate datepicker" required>
                    <label for="birth" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_birthday') ?></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4">
                    <input id="emailuser" type="email" class="validate" required>
                    <label for="emailuser" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_email') ?></label>
                </div>
                <div class="input-field col s6 m4">
                    <input id="password" type="password" class="validate">
                    <label for="password" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_password') ?></label>
                </div>
                <div class="input-field col s6 m4">
                    <input id="country" type="text" class="validate" placeholder="<?= $this->lang->line('home_modal_register_country') ?>" required>
                    <!--<label for="country" data-error="wrong" data-success="right">Pais</label>-->
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4">
                    <input id="state" type="text" class="validate">
                    <label for="state" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_state') ?></label>
                </div>
                <div class="input-field col s6 m4">
                    <input id="city" type="text" class="validate">
                    <label for="city" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_city') ?></label>
                </div>
                 <div class="input-field col s6 m4">
                    <select id="gender" required>
                      <option value="M"><?= $this->lang->line('home_modal_register_male') ?></option>
                      <option value="F"><?= $this->lang->line('home_modal_register_female') ?></option>
                    </select>
                    <label for="gender" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_gender') ?></label>
                 </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat register-button-close"><?= $this->lang->line('home_modal_register_logout') ?></a>        
        <a href="#!" id="enviar-cadastro" class="modal-action waves-effect waves-green btn-flat register-button-submmit"><?= $this->lang->line('home_modal_register_send') ?></a>
    </div>
</div>
