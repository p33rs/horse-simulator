HorseSimulator.Collection.Horse = Backbone.Collection.extend({
    model: HorseSimulator.Model.Horse,
    url: '/horse',
    parse: function(resp, opt) {
        return resp.data;
    }
})