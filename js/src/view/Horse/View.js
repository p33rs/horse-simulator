HorseSimulator.View.HorseView = Backbone.View.extend({
    template: JST['horse/view'],
    events: {
        'click .horse_details-like_this_shit_yo': 'likeHorse'
    },
    initialize: function() {
        _.bindAll(this, 'render', 'likeHorse');
        this.listenTo(this.model, 'sync', this.render.bind(this));
    },
    render: function() {
        $(this.template({ horse: this.model })).appendTo(this.$el.empty());
        this.$el.on('click', '.horse_details-back', function() {
            ROUTER.navigate('/', {trigger: true});
        });
        return this;
    },
    likeHorse: function() {
        this.model.like();
    }
});