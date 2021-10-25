if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/assets/js/sw.js', {scope: './'});
} else {
    console.error("Service Workers are not supported");
}