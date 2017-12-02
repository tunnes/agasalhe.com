<div id="item-modal" class="modal bottom-sheet">
    <div class="modal-pictures" v-if="currentImage != null" v-bind:style='{ backgroundImage: "url(" + currentImage.image + ")", }' v-bind:alt='currentImage.text'>
        <span class="image-modal-link">
            <span v-for="(image, index) in item.images" v-on:click="changeImageItem(image)">{{index + 1}}</span>
        </span>
    </div>
    <div class="modal-pictures" v-else v-bind:style='{ backgroundImage: "url(/API/image/item/" + item.id + ")", }' ></div>
    <div class="modal-infomations">
        <div class="modal-content">
            <h4 class="modal-title truncate-one-line">{{item.title}}</h4>
            <div class="sub-informations">
                <span v-if="item.category != '' " >{{item.category}}</span>
                <span v-if="item.useState != '' " >{{item.useState}}</span>
                <span >{{item.likes}} curtida (s)</span>
            </div>
            <p class="description">
                {{item.description}}
            </p>
            <div class="author-view">
                <a href="#!user">
                    <div v-bind:style='{ backgroundImage: "url(/API/image/profile/" + item.authorId }' class="author-image"></div>
                    <a target="_blank" v-bind:href=" '/' + item.authorName" class="author-name">{{item.authorName}}</a>   
                </a>
            </div>
        </div>
        
        <div class="modal-footer">
            <span  v-if="currentUser != null">
                <a href="#chat-modal" v-on:click='initChat(item.authorId, item.authorUserName, item.authorName)' class="waves-effect waves-green btn-flat modal-regular-button modal-trigger">Enviar Mensagem</a>
                <a href="#!" v-on:click="showTrade(true)" class="modal-action waves-effect waves-green btn-flat modal-regular-button">Trocar</a>
                <a href="#!" class="modal-action waves-effect waves-green btn-flat modal-regular-button">Curtir</a>
            </span>
            <a href="#!" class="modal-action waves-effect waves-green btn-flat modal-close-button">Sair</a>        
        </div>
    </div>
    <div class="modal-trade-step">
        <div class="modal-content">
            <h4 class="trade-title">Selecione um item para ofertar ;)</h4>
                <ul v-if="myItems != []" class="collection my-items-to-trade">
                    <li v-for="myItem in myItems" class="collection-item avatar">
                        <span class="image" v-if='myItem.images.length' v-bind:style='{ backgroundImage: "url(" + myItem.images[0].image + ")", }'></span>
                        <span class="image" v-else style="background-image: url(http://bit.ly/2yHLmEy) "></span>
                        <span class="title">{{ myItem.title }}</span>
                        <p class="truncate-one-line description">{{ myItem.description }}</p>
                        <a href="#!" class="secondary-content" v-on:click='postTrade(item.id, myItem.id)'>
                            <i class="material-icons trade-icon">swap_horiz</i>
                        </a>
                    </li>
                </ul>  
        </div>
        <div class="modal-footer">
            <a href="#!" v-on:click="showTrade()" class="modal-action waves-effect waves-green btn-flat modal-regular-button back-button">Voltar</a>
        </div>
    </div>
</div>

