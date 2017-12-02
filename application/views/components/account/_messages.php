<ul v-if="myMessages != []" class="collection my-items-collection">
    <li v-for="message in myMessages" class="collection-item avatar">
        <span class="image" v-bind:style='{ backgroundImage: "url(API/image/profile/" + message.id + ")", }'></span>
        <span class="title">{{ message.username }}</span>
        <p class="truncate-one-line description">{{ message.nickname }}</p>
        <a href="#chat-modal" v-on:click='initChat(message.id, message.username, message.nickname)' class="truncate-one-line likes modal-trigger">Abrir chat</a>
    </li>
</ul>