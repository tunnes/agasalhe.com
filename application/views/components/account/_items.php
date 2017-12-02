<ul v-if="myItems != []" class="collection my-items-collection">
    <li v-for="myItem in myItems" class="collection-item avatar">
        <span class="image" v-if='myItem.images.length' v-bind:style='{ backgroundImage: "url(" + myItem.images[0].image + ")", }'></span>
        <span class="image" v-else style="background-image: url(http://bit.ly/2yHLmEy) "></span>
        <span class="title">{{ myItem.title }}</span>
        <p class="truncate-one-line description">{{ myItem.description }}</p>
        <p class="truncate-one-line likes">{{myItem.qt_likes}} Curtida(s)</p>
        <a href="#!" class="secondary-content">
            <i class="material-icons trade-icon update-item tooltipped" 
               data-position="bottom" 
               data-delay="70" 
               data-tooltip="Que tal atualizar !?">create
            </i>
            <i class="material-icons trade-icon delete-item tooltipped" 
               data-position="bottom" 
               data-delay="70" 
               data-tooltip="Remover, sério ? =(" 
               v-on:click='deleteItem(myItem.id)'>delete_forever
            </i>
            <i class="material-icons trade-icon show-item tooltipped" 
               data-position="bottom" 
               data-delay="70" 
               data-tooltip="Ver detalhes ! =D" 
               v-on:click='showItem(myItem.id)'>info_outline
            </i>
        </a>
    </li>
</ul>