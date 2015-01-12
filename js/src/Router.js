HorseSimulator.Router = Backbone.Router.extend({
    routes: {
        '(/)': 'list',
        'view/:id(/)': 'view'
    },

    list: function() {
        var view = new HorseSimulator.View.HorseList({ collection: HORSES });
        this._switchView(view);
        view.render();
    },
    view: function(id) {
        var horse = HORSES.get(id);
        if (!horse) {
            alert('NO SUCH HORSE.');
            return this.list();
        }
        var view = new HorseSimulator.View.HorseView({ model: horse });
        this._switchView(view);
        view.render();
    },

    _currentView: null,
    _switchView: function(view) {
        this._currentView && this._currentView.remove();
        this._currentView = view;
        view.$el.appendTo($('#content'));
    }
});