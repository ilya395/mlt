
// window.addEventListener('load', () => {

    Vue.component('modal-block', {
        template: `
        <div 
            class='modal movie active'
        >
            <div class="modal__wrap">
                <div class="modal__close-btn" v-on:click="$emit('close')">
                    &times;
                </div>
                <div class="modal__container">
                    сконтент
                </div>
            </div>
        </div>
        `,
        // props: {
        //     isActiveModal: {
        //         type: Boolean,
        //         default: false,
        //         required: true,
        //     },
        // },
        // data: function () {
        //     return {
        //         isActiveLocal: false,
        //     }
        // },
        // methods: {
        //     openModal: function(e) {
        //         this.isActiveLocal = true;
        //     },
        //     closeModal: function (e) {
        //         this.isActiveLocal = false;
        //     },
        //     visible: function() {
        //         // this.isActive = !this.isActive;
        //         this.isActiveLocal = !this.isActiveLocal;
        //     }       
        // }
    });

    new Vue({
        el: "#page-content",
        data: {
            isActive: false,
            isActiveModal: false,
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
            },
            visibleModal: function(e) {
                this.isActiveModal = !this.isActiveModal;
            },
        }
    });

// });