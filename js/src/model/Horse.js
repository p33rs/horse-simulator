HorseSimulator.Model.Horse = Backbone.Model.extend({
    defaults: {
        id: 0,
        name: '',
        occupation: '',
        bio: '',
        likes: 0,
        user_id: 0,
        user: {}
    },
    parse: function(resp) {
        // if the data has already been pulled out of
        var data = resp.success ? resp.data : resp;
        var ints = ['id', 'user_id', 'likes'];
        for (var i in ints) {
            if (data[ints[i]]) {
                data[ints[i]] = parseInt(data[ints[i]], 10);
            }
        }
        data.chilling = data.chilling === '1';
        return data;
    },
    like: function() {
        $.ajax({
            url: this.url() + '/like',
            type: 'PUT',
            success: (function () {
                this.set('likes', this.get('likes') + 1);
            }).bind(this)
        });
    }
});