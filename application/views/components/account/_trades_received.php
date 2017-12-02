<ul v-if="trades.hasOwnProperty('received')" class="collection my-trades-received-collection">
    <li v-for="trade in trades.received" class="collection-item avatar">
        
        <span class="image" v-bind:style='{ backgroundImage: "url(/API/image/item/" + trade.item_id + ")", }'></span>
        <i class="material-icons two-way-icon">swap_horiz</i>
        <span class="image" v-bind:style='{ backgroundImage: "url(/API/image/item/" + trade.received.item_theirs + ")", }'></span>
        
        <span class="title truncate-one-line">
            <strong>{{trade.nickname}}</strong>
            <span>quer</span>
            {{ trade.title }}
            </span>
        <p class="truncate-one-line description"><strong>POR</strong>{{ trade.received.title }}</p>
        <p class="truncate-one-line likes">{{trade.received.trade_status}}</p>
        <a href="#!" class="secondary-content">
            <i class="material-icons trade-icon show-item tooltipped" 
               data-position="bottom" 
               data-delay="70" 
               data-tooltip="Ver detalhes ! =D" 
               v-on:click='acceptTrade(trade.received.item_theirs, trade.item_id)'>thumb_up
            </i>
            <i class="material-icons trade-icon show-item tooltipped" 
               data-position="bottom" 
               data-delay="70" 
               data-tooltip="Recusar" 
               v-on:click='refuseTrade(trade.received.item_theirs, trade.item_id, "received")'>thumb_down
            </i>
        </a>
    </li>
</ul>