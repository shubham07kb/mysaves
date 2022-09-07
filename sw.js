const cacheName='v1';
const cacheAssets=[
    'index.php',
    'http://localhost/admin/assets/css/style/?base=su&page=installation%22',
    'http://localhost/admin/assets/js/app/?base=su&page=installation%22'
]
self.addEventListener('install', e => {
    console.log('installed');
    e.waitUntil(
        caches.open(cacheName).then(cache=>{
            console.log('sw: caching Files');
            cache.addAll(cacheAssets);
        }).then(()=>self.skipWaiting())
    );
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
    e.respondWith(fetch(e.request).catch(()=>caches.match(e.request)));
});
