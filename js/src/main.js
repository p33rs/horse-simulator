var APPLICATION = new Application(new HorseSimulator.Router());
APPLICATION.init();
if (INIT_USER) {
    this.user = new HorseSimulator.Model.User(INIT_USER);
}
if (INIT_HORSES) {
    this.horses = new HorseSimulator.Collection.Horse(INIT_HORSES);
}
