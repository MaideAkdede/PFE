import Pluton from "@whitecube/pluton/pluton";

class Start {
    constructor() {
       //
    }
    load() {
        this.pluton = new Pluton();
    }

}
window.addEventListener('load', (e) => {
    window.Start = new Start();
    window.Start.load();
});
