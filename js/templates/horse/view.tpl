<article class="horse_details">
    <h2 class="horse_details-name">
        <%- horse.get('name') %>
    </h2>
    <h3 class="horse_details-occupation">
        <%- horse.get('occupation') %>
    </h3>
    <aside class="horse_details-likes">
        <span class="horse_details-likes_count">
            <%- horse.get('likes') %>
        </span>
    </aside>
</article>