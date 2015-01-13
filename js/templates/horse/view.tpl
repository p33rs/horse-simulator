<article class="horse_details">
    <h2 class="horse_details-name">
        <%- horse.get('name') %>
    </h2>
    <h3 class="horse_details-occupation">
        <%- horse.get('occupation') %>
    </h3>
    <p class="horse_details-owner">
        Owned by
        <span class="horse_details-owner-name">
            <%- horse.get('user').username %>
        </span>
    </p>
    <p class="horse_details-chilling">
        This horse
        <span class="horse_details-chilling-status">
            <%- horse.get('chilling') ? 'is' : 'is not' %>
        </span>
        chilling right now.
    </p>
    <p class="horse_details-likes">
        This horse has been liked
        <span class="horse_details-likes_count">
            <%- horse.get('likes') %>
        </span>
        times.
        <span class="horse_details-like_this_shit_yo">
            Like this horse
        </span>!
    </p>
    <p class="horse_details-back">
        Return to the Horse List.
    </p>
</article>