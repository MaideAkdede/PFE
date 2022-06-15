export default class Counter {
    static get selector() {
        return '.account';
    }

    constructor(element) {
        this.element = element;
        this.dialog = document.querySelector('.account-menu');

        this.element.addEventListener('click',(e)=>{
            e.preventDefault();
            this.dialog.classList.toggle('active-account-dialog');
            console.log('active')
        });
        document.addEventListener('click', (e) => this.bodyClick(e));
    }
    bodyClick(e) {
        if (e.target === this.element || this.element.contains(e.target) || e.target === this.dialog ||this.dialog.contains(e.target)) {
            return;
        }
        this.dialog.classList.remove('active-account-dialog');
    }
}
