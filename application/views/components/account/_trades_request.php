<ul v-if="trades.hasOwnProperty('requested')" class="collection my-trades-collection">
    <li v-for="trade in trades.requested" class="collection-item avatar">
        <span class="image" v-bind:style='{ backgroundImage: "url(/API/image/item/" + trade.item_yours + ")", }'></span>
        <i class="material-icons two-way-icon">swap_horiz</i>
        <span class="image" v-bind:style='{ backgroundImage: "url(/API/image/item/" + trade.traded_by.item_id + ")", }'></span>
        <span class="title">{{ trade.title }}</span>
        <p class="truncate-one-line description"><strong>por</strong>{{ trade.traded_by.title }}</p>
        <p class="truncate-one-line likes">{{ trade.trade_status }}</p>
        <a href="#!" class="secondary-content">
            <i class="material-icons trade-icon show-item tooltipped" 
               data-position="bottom" 
               data-delay="70" 
               data-tooltip="Aceitar" 
               v-on:click='cancelTrade(trade.item_yours, trade.traded_by.item_id, "requested")'>cancel
            </i>
        </a>
    </li>
</ul>