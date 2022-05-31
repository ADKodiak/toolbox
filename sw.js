var CACHE_STATIC_NAME = 'static-v1';	
var STATIC_FILES = [
  'http://localhost/toolbox/offline.html'
];

self.addEventListener('install', function (event) {
  console.log('[Service Worker] Installing Service Worker ...', event);
  event.waitUntil(						// Promise
    caches.open(CACHE_STATIC_NAME)				// Ouverture du cache storage
      .then(function (cache) {
        console.log('[Service Worker] Precaching App Shell');
        cache.addAll(STATIC_FILES);				// Ajout de tous les éléments du tableau en cache
      })
  )
});

self.addEventListener('activate', function(event) {
  console.log('[Service Worker] Activating Service Worker…', event);
  return self.clients.claim();
});

self.addEventListener('fetch', function(event) {
   event.respondWith(
    fetch(event.request)
        .catch(function (err) {
          return caches.open(CACHE_STATIC_NAME)		// On ouvre le cache statique
              .then(function (cache) {
                return cache.match('offline.html'); 			// On récupère la page offline.html dans le cache
              });
        })
   );
});

 
 
    