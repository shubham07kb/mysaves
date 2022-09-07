if('serviceWorker' in navigator){
    navigator.serviceWorker.register('/sw.js').then(registration => {
        console.log('SW Ready at ');
        console.log(registration);
    }).catch(error => {
        console.log('SW Failed: '+error);
    })
} else{
    console.log('Not support PWA');
}