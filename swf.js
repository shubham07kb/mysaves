const cacheName='v2';
self.addEventListener('install', e => {
    console.log('installed');
});
self.addEventListener('activate', e => {
    console.log('activated');
    e.waitUntil(
        caches.keys().then(cacheNames=>{
            return Promise.all(
                cacheNames.map(cache=>{
                    if(cache!==cacheName){
                        console.log('sw: clearing old cache');
                        return caches.delete(cache);
                    }
                })
            )
        })
    )
});
self.addEventListener('fetch', e => {
    console.log('sw: fetching');
    e.respondWith(fetch(e.request).then(res=>{
        const resClone=rres.clone();
        caches.open(cacheName).then(cache=>cache.put(e.request, resClone));
        return res;
    }).catch(err=>caches.match(e.request).then(res=>res))
    );
});