HorseSimulator.Router = Backbone.Router.extend({
    routes: {
        signup: 'signup',
        login: 'login'
    },
    signup: function() {
        console.log('signup');
    },
});