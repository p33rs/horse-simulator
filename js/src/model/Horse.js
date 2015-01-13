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
    initialize: function() {
        _.bindAll(this, 'like');
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
    /**
     * Illustrate behavior of non-RESTy calls.
     * Here we update #likes and trigger sync event. We don't use .set()
     *   because we don't want to put the model in "changed" state.
     */
    like: function() {
        $.ajax({
            url: this.url() + '/like',
            type: 'PUT',
            success: (function (resp) {
                this.attributes.likes = this.get('likes') + 1;
                this.trigger('sync', this, resp);
            }).bind(this)
        });
    }
});