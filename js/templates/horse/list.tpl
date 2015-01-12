<section class="horse_list">
    <h2>Horses</h2>
    <table class="horse_list-wrapper">
        <thead>
            <tr>
                <th>Name</th>
                <th>Owner</th>
                <th>Occupation</th>
                <th>Chilling?</th>
                <th>Likes</th>
            </tr>
        </thead>
        <tbody>
        <% horses.each(function(horse) { %>
            <tr data-id="<%- horse.get('id') %>" class="horse_list-item">
                <td class="horse_list-name">
                    <span class="horse_list-link"><%- horse.get('name') %></span>
                </td>
                <td class="horse_list-owner"><%- horse.get('user').username %></td>
                <td class="horse_list-occupation"><%- horse.get('occupation') %></td>
                <td class="horse_list-chilling"><%- horse.get('chilling') ? 'Frig Yes' : 'Aw No' %></td>
                <td class="horse_list-likes"><%- horse.get('likes') %></td>
            </tr>
        <% }); %>
        </tbody>
    </table>
</section>
