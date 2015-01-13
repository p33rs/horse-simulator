HorseSimulator.View.HorseList = Backbone.View.extend({
    template: JST['horse/list'],
    initialize: function() {
        this.listenTo(this.collection, 'change sync', this.render.bind(this));
    },
    render: function() {
        $(this.template({ horses: this.collection })).appendTo(this.$el.empty());
        this.$el.on('click', '.horse_list-link', function() {
            var id = $(this).closest('.horse_list-item').data('id');
            ROUTER.navigate('view/' + id.toString(), {trigger: true});
        });
        return this;
    }
});