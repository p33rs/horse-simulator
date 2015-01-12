HorseSimulator.Model.Horse = Backbone.Model.extend({
    defaults: {
        id: 0,
        username: '',
        email: ''
    },
    parse: function(resp, opt) {
        // if the data has already been pulled out
        var data = resp.success ? resp.data : resp;
        if (data.id) {
            data.id = parseInt(data.id, 10);
        }
        return data;
    }
});