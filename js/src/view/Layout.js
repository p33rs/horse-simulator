HorseSimulator.View.Layout = Backbone.View.extend({
    id: 'content',
    render: function(view) {
        if (view instanceof Backbone.View) {
            view.render().$el.appendTo(this.$el);
        } else if (typeof view === 'string') {
            this.$el.html(view);
        } else {
            throw new TypeError('expected renderable');
        }
        return this;
    }
});