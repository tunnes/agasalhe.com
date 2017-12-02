<div id="item-modal" class="modal bottom-sheet">
    <div class="modal-pictures" v-if="currentImage != null" v-bind:style='{ backgroundImage: "url(" + currentImage.image + ")", }' v-bind:alt='currentImage.text'>
        <span class="image-modal-link">
            <span v-for="(image, index) in item.images" v-on:click="changeImageItem(image)">{{index + 1}}</span>
        </span>
    </div>
    <div class="modal-pictures" v-else v-bind:style='{ backgroundImage: "url(/API/image/item/" + item.id + ")", }' >
    </div>
    <div class="modal-infomations">
        <div class="modal-content">
            <h4 class="modal-title truncate-one-line">{{item.title}}</h4>
            <div class="sub-informations">
                <span>{{item.category}}</span>
                <span>{{item.useState}}</span>
                <span>{{item.likes}} curtida (s)</span>
            </div>
            <p class="description">
                {{item.description}}
            </p>
        </div>
        
        <div class="modal-footer">
            <a href="#!" v-on:click="deleteItem(item.id)" class="modal-action waves-effect waves-green btn-flat modal-regular-button">Excluir</a>
            <a href="#!" class="modal-action waves-effect waves-green btn-flat modal-regular-button">Editar</a>
            <a href="#!" class="modal-action waves-effect waves-green btn-flat modal-close-button">Cancelar</a>      
        </div>
    </div>
</div>

