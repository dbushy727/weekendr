"use strict";
console.log("I AM LOADED");

$("#menu-icon").click(function (e) {
    console.log('im clicked');
    e.preventDefault();
    $("#menu").toggle({"duration": "fast"});
});