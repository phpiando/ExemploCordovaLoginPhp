"use strict";
var Index = {

    //Application Constructor
    init: function() {
        this.bindEvents();
    },

    //Bind Event Listeners
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    
    //Event Handle
    onDeviceReady: function() {
      
      $("#formLogin").submit(function (e){
        e.preventDefault();
        alert();
      });
    }
};

