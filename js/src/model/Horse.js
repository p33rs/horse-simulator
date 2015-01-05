HorseSimulator.Model.Horse = Backbone.Model.extend({
    defaults: {
        name: '',
        occupation: '',
        bio: '',
        likes: 0
    },
    parse: function(resp, opt) {
        // if the data has already been pulled out of
        var data = resp.success ? resp.data : resp;
        if (data.id) {
            data.id = parseInt(data.id, 10);
        }
        if (data.likes) {
            data.likes = parseInt(data.likes, 10);
        }
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