<ul v-if="myLikes != []"class="collection my-items-collection">
    <li v-for="like in myLikes.given" class="collection-item avatar">
        <span class="image" v-bind:style='{ backgroundImage: "url(/API/image/item/" + like.item_id + ")", }'></span>
        <span class="title truncate-one-line">{{ like.title }}</span>
        <p class="truncate-one-line description">{{ like.description }}</p>
        <p class="truncate-one-line likes">~ {{ like.nickname }}</p>
        <a href="#!" class="secondary-content">
            <i class="material-icons trade-icon show-item tooltipped" 
               data-position="bottom" 
               data-delay="70" 
               data-tooltip="Descurtir Item" 
               v-on:click='unlikeItem(like.item_id)' >favorite
            </i>
        </a>
    </li>
</ul>