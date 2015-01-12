HorseSimulator.View.HorseView = Backbone.View.extend({
    template: JST['horse/view'],
    initialize: function() {
        this.model.on('change', this.render.bind(this));
    },
    render: function() {
        $(this.template({ horse: this.model })).appendTo(this.$el.empty());
        this.$el.on('click', '.horse_details-back', function() {
            console.log('s');
            ROUTER.navigate('/', {trigger: true});
        });
        return this;
    }
});