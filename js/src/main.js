var HORSES = new HorseSimulator.Collection.Horse(INIT_HORSES ? INIT_HORSES : []);
var ROUTER = new HorseSimulator.Router();
$(function() {
    Backbone.history.start();
});
