export default class FlashMessage {
    static get selector() {
        return '.success';
    }

    constructor(element) {
        this.element = element;
        setTimeout(()=>{
            this.element.classList.add('hidden');
        }, 4000)
    }
}
