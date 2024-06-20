// touch-events.js
document.addEventListener('touchstart', function(event) {
    var touch = event.touches[0];
    console.log('Touch started at', touch.pageX, touch.pageY);
}, false);

document.addEventListener('touchmove', function(event) {
    var touch = event.touches[0];
    console.log('Touch moved to', touch.pageX, touch.pageY);
}, false);

document.addEventListener('touchend', function(event) {
    var touch = event.changedTouches[0];
    console.log('Touch ended at', touch.pageX, touch.pageY);
}, false);
