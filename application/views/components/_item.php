<div id="item-modal" class="modal bottom-sheet">
    <div class="modal-pictures">
        <img  v-if="currentImage != null" v-bind:src="currentImage.image" v-bind:alt='currentImage.text'/>
        <span class="image-modal-link">
            <span v-for="(image, index) in item.images" v-on:click="changeImageItem(image)">{{index + 1}}</span>
        </span>
    </div>
    <div class="modal-infomations">
        <div class="modal-content">
            <h4 class="modal-title">{{item.title}}</h4>
            <div class="sub-informations">
                <span>{{item.category}}</span>
                <span>{{item.useState}}</span>
                <span>{{item.likes}} curtida (s)</span>
            </div>
            <p class="description">
                {{item.description}}
            </p>
            <div class="author-view">
                <a href="#!user">
                    <div v-bind:style='{ backgroundImage: "url(" + item.authorImage + ")", }' class="author-image"></div>
                    <span class="author-name">{{item.authorName}}</span>
                </a>
            </div>
        </div>
        
        <div class="modal-footer">
            <a href="#!" v-on:click="showTrade()" class="modal-action waves-effect waves-green btn-flat modal-regular-button">Trocar</a>
            <a href="#!" class="modal-action waves-effect waves-green btn-flat modal-regular-button">Curtir</a>
            <a href="#!" class="modal-action waves-effect waves-green btn-flat modal-close-button">Sair</a>        
        </div>
    </div>
    <div class="modal-trade-step">
        <div class="modal-content">
            <h4 class="trade-title">Selecione um item para ofertar ;)</h4>
                <ul class="collection my-items-to-trade">
                    <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">Title</span>
                        <p>First Line</p>
                        <a href="#!" class="secondary-content">
                            <i class="material-icons trade-icon">swap_horiz</i>
                        </a>
                    </li>                    
                    <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">Title</span>
                        <p>First Line</p>
                        <a href="#!" class="secondary-content">
                            <i class="material-icons trade-icon">swap_horiz</i>
                        </a>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">Title</span>
                        <p>First Line</p>
                        <a href="#!" class="secondary-content">
                            <i class="material-icons trade-icon">swap_horiz</i>
                        </a>
                    </li>                    
                    <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">Title</span>
                        <p>First Line</p>
                        <a href="#!" class="secondary-content">
                            <i class="material-icons trade-icon">swap_horiz</i>
                        </a>
                    </li>                    
                    <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">Title</span>
                        <p>First Line</p>
                        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>                    
                    <li class="collection-item avatar">
                        <i class="material-icons circle">folder</i>
                        <span class="title">Title</span>
                        <p>First Line</p>
                        <a href="#!" class="secondary-content">
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
