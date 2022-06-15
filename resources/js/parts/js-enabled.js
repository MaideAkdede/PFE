export default class FlashMessage {
    static get selector() {
        return 'body';
    }

    constructor(element) {
        element.classList.add('js-enabled');
    }
}
