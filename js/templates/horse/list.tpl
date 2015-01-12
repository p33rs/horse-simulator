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
        <% for (var i = 0; i < horses.length; i++) { %>
            <tr>
                <td class="horse_list-name">
                    <span class="horse_list-link"><%- horses[i].name %></span>
                </td>
                <td class="horse_list-owner"><%- horses[i].user.owner %></td>
                <td class="horse_list-occupation"><%- horses[i].occupation %></td>
                <td class="horse_list-chilling"><%- horses[i].chilling ? 'Frig Yes' : 'Aw No' %></td>
                <td class="horse_list-likes"><%- horses[i].likes %></td>
            </tr>
        <% } %>
        </tbody>
    </table>
</section>
