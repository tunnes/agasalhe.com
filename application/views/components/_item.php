<div id="item-modal" class="modal bottom-sheet">
    <div class="modal-pictures"></div>
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
            <a href="#!" id="enviar" class="modal-action modal-close waves-effect waves-green btn-flat modal-regular-button">Trocar</a>
            <a href="#!" id="enviar" class="modal-action modal-close waves-effect waves-green btn-flat modal-regular-button">Curtir</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat modal-close-button">Sair</a>        
        </div>
    </div>
</div>
