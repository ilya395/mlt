"use strict";

window.addEventListener('load', function () {
  var topMenu = new Vue({
    el: "#top-menu",
    data: {
      isActive: false
    },
    methods: {
      visibleElementInHeader: function visibleElementInHeader() {
        // v-on:click="isActive = !isActive"
        this.isActive = !this.isActive; //

        var elemInHeader = document.querySelector('header');
        elemInHeader.classList.contains('active') ? elemInHeader.classList.remove('active') : elemInHeader.classList.add('active'); //

        var body = document.querySelector('body');
        body.classList.contains('hidden') ? body.classList.remove('hidden') : body.classList.add('hidden');
      }
    }
  });
});