 var cacheStorageKey = 'minimal-pwa-1'

 var cacheList = [
     '/',
     "index.php",
     "icon.png"
 ]
 self.addEventListener('install', e => {
     e.waitUntil(
         caches.open(cacheStorageKey)
             .then(cache => cache.addAll(cacheList))
             .then(() => self.skipWaiting())
     )
 })
 self.addEventListener('fetch', function(e) {
     e.respondWith(
         caches.match(e.request).then(function(response) {
             if (response != null) {
                 return response
             }
             return fetch(e.request.url)
         })
     )
 })
 self.addEventListener('activate', function(e) {
     e.waitUntil(
         Promise.all(
             caches.keys().then(cacheNames => {
                 return cacheNames.map(name => {
                     if (name !== cacheStorageKey) {
                         return caches.delete(name)
                     }
                 })
             })
         ).then(() => {
             return self.clients.claim()
         })
     )
 })