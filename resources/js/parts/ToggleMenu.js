export default class Counter {
    static get selector() {
        return '.menu-item';
    }

    constructor(element) {
        this.element = element;
        this.button = this.element.querySelector('.menu-item-button');
        this.submenu = this.element.querySelector('.menu-item-child');

        if(this.button !== null){
            this.button.addEventListener('click', (e) => {
                e.preventDefault();
                this.submenu.classList.toggle('active-menu');
                this.button.classList.toggle('active-arrow');
                console.log('active')
            });
        }
    }
}
