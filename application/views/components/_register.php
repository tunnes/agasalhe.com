<div id="register-modal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4 class="register-title"><?= $this->lang->line('home_modal_register_title') ?></h4>
        <p class="register-text-body"><?= $this->lang->line('home_modal_register_body') ?></p>
        <div>
            <div class="row">
                <div class="input-field col s12 m4 ">
                    <input id="username" data-name="username" type="text" class="validate input-register-user" required>
                    <label for="username" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_name') ?></label>
                </div>
                <div class="input-field col s12 m4">
                    <input id="nickname" data-name="nickname" type="text" class="validate input-register-user" required>
                    <label for="nickname" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_nickname') ?></label>
                </div>
                <div class="date-field input-field col s6 m2">
                    <input type="text" data-name="birth" id="birth" class="validate datepicker input-register-user" required>
                    <label for="birth" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_birthday') ?></label>
                </div>
                <div class="input-field col s6 m2">
                    <select data-name="gender" id="gender" class="input-register-user" required>
                      <option value="M"><?= $this->lang->line('home_modal_register_male') ?></option>
                      <option value="F"><?= $this->lang->line('home_modal_register_female') ?></option>
                    </select>
                    <label for="gender" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_gender') ?></label>
                 </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m4">
                    <input data-name="email" id="emailuser" type="email" class="validate input-register-user" required>
                    <label for="emailuser" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_email') ?></label>
                </div>
                <div class="input-field col s6 m4">
                    <input data-name="password" id="password" type="password" class="validate input-register-user">
                    <label for="password" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_password') ?></label>
                </div>
                <div class="file-field input-field col s6 m4 l3">
                    <div class="btn">
                        <span><?= $this->lang->line('home_modal_register_picture') ?><i class="material-icons left profile_picture">check</i></span>
                        <input data-name="profile_picture" id="profile_picture" class="input-register-user" type="file">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m3">
                    <input data-name="country" id="country" type="text" class="validate input-register-user" placeholder="<?= $this->lang->line('home_modal_register_country') ?>" required>
                    <!--<label for="country" data-error="wrong" data-success="right">Pais</label>-->
                </div>
                <div class="input-field col s6 m3">
                    <input data-name="state" id="state" type="text" class="validate input-register-user">
                    <label for="state" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_state') ?></label>
                </div>
                <div class="input-field col s12 m3">
                    <input data-name="city" id="city" type="text" class="validate input-register-user">
                    <label for="city" data-error="wrong" data-success="right"><?= $this->lang->line('home_modal_register_city') ?></label>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat register-button-close"><?= $this->lang->line('home_modal_register_logout') ?></a>        
        <a href="#!" id="enviar-cadastro" class="modal-action waves-effect waves-green btn-flat register-button-submmit"><?= $this->lang->line('home_modal_register_send') ?></a>
    </div>
</div>
