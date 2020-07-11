window.addEventListener('load', () => {

    const topMenu = new Vue({
        el: "#top-menu",
        data: {
            isActive: false,
        },
        methods: {
            visibleElementInHeader: function () { // v-on:click="isActive = !isActive"
                this.isActive = !this.isActive;
                //
                const elemInHeader = document.querySelector('header');
                elemInHeader.classList.contains('active') 
                    ? elemInHeader.classList.remove('active') 
                    : elemInHeader.classList.add('active');
                //
                const body = document.querySelector('body');
                body.classList.contains('hidden')
                    ? body.classList.remove('hidden')
                    : body.classList.add('hidden');
            }
        }
    });
    
});
