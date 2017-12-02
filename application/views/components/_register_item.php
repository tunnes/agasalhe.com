<div id="register-item-modal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4 class="item-register-title">Novo Item</h4>
        <div class="row">
            <form id="register-item-form">
                <div class="input-field col s12 m12">
                    <input type="text" class="validate input-register-item" data-name="title">
                    <label class="active">Titulo</label>
                </div>
                <div class="input-field col s12 m6">
                    <select class="input-register-item" data-name="category">
                        <option value="NONE" disabled selected><?= $this->lang->line('item_category_none') ?></option>
                        <option value="FURNITURE"><?= $this->lang->line('item_category_furniture') ?></option>
                        <option value="ELECTRONIC"><?= $this->lang->line('item_category_electronic') ?></option>
                        <option value="HOUSEHOLD-APPLIANCE"><?= $this->lang->line('item_category_household-appliance') ?></option>
                        <option value="TOY"><?= $this->lang->line('item_category_toy') ?></option>
                        <option value="CLOTHING"><?= $this->lang->line('item_category_clothing') ?></option>
                        <option value="UTENSIL"><?= $this->lang->line('item_category_utensil') ?></option>
                        <option value="TOOL"><?= $this->lang->line('item_category_tool') ?></option>
                        <option value="INSTRUMENT"><?= $this->lang->line('item_category_instrument') ?></option>
                        <option value="MOTORING"><?= $this->lang->line('item_category_motoring') ?></option>
                        <option value="SPORT"><?= $this->lang->line('item_category_sport') ?></option>  
                        <option value="DECORATION"><?= $this->lang->line('item_category_decoration') ?></option>
                        <option value="AUDIO-VISUAL"><?= $this->lang->line('item_category_audio-visual') ?></option>
                        <option value="COLLECTION"><?= $this->lang->line('item_category_collection') ?></option>
                        <option value="OTHERS"><?= $this->lang->line('item_category_others') ?></option>                                
                    </select>
                    <label><?= $this->lang->line('item_label_category') ?></label>
                </div>
                <div class="input-field col s12 m6">
                    <select class="input-register-item" data-name="use_state">
                        <option value="USED" selected><?= $this->lang->line('item_use-state_used') ?></option>
                        <option value="SEMI-NEW"><?= $this->lang->line('item_use-state_semi-new') ?></option>
                        <option value="NEW"><?= $this->lang->line('item_use-state_new') ?></option>
                    </select>
                    <label><?= $this->lang->line('item_label_use-state') ?></label>
                </div>
                <div class="input-multiple-file" v-for="fileInput in fileInputTotal">
                    <div class="file-field input-field col s12 m6">
                        <div class="btn">
                            <span>File</span>
                            <input type="file" class="input-register-item" data-name="image[]">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" >
                        </div>
                    </div>
                    <div class="input-field col s12 m6">
                    <input type="text" class="validate input-register-item" data-name="image_alt[]">
                    <label class="active">Descrição da Imagem</label>
                    <a class="add-one-image" v-on:click="addImageField($event)">
                        <i class="material-icons">add</i>
                    </a>
                    </div>
                </div>
                <div class="input-field col s12">
                  <textarea id="textarea1" class="materialize-textarea input-register-item" data-name="description"></textarea>
                  <label for="textarea1">Descrição do item</label>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat login-button-close">Cancelar</a>
        <a href="#!" class="modal-action waves-effect waves-green btn-flat action-button" v-on:click="registerItem()">Cadastrar</a>
    </div>
</div>