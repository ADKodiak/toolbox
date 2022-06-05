var CACHE_STATIC_NAME = 'static-v1';
var CACHE_DYNAMIC_NAME = 'dynamic-v1';

var STATIC_FILES = [
  
 
  'https://revastic.com/offline.html',
  'https://revastic.com/images/toolbox_0.png',
  'https://revastic.com/images/edition.png',
  'https://revastic.com/images/delete.png',
  'https://revastic.com/images/wrench.png',
  'https://revastic.com/toolbox.png',

  'https://revastic.com/index.php',
  'https://revastic.com/navbar.php',
 
  'https://revastic.com/boite.php',
  'https://revastic.com/outils.php',
  'https://revastic.com/detailsOutils.php',
  'https://revastic.com/detailsBoite.php',
  'https://revastic.com/js/app.js',
  'https://revastic.com/js/fetch.js',
  'https://revastic.com/js/promise.js',

  
];

var interdit_FILES = [ // accès interdit en offline 
  
   'https://revastic.com/addFirstBox.php',
   'https://revastic.com/addOutils.php',
   'https://revastic.com/deleteOutils.php',
   'https://revastic.com/editOutils.php',
   'https://revastic.com/menuAjoutOutils.php',
   'https://revastic.com/menuEditOutils.php',
   'https://revastic.com/parametre.php',


 
   
 ];
self.addEventListener('install', function (event) 
{
  console.log('[Service Worker] Installing Service Worker ...', event);
  event.waitUntil  // attendre jusqu’à ce que le cache soit ouvert et rempli
  (					// Promise
     caches.open(CACHE_STATIC_NAME)		// Ouverture du cache storage
      .then( function (cache) 
   {
        	    console.log('[Service Worker] Precaching App Shell');
        	    cache.addAll(STATIC_FILES);		// Ajout de tous les éléments du tableau en cache
      	  }
 )
   )
});
self.addEventListener('activate', function(event) {
  console.log('[Service Worker ] Activating Service Worker…', event);
  return self.clients.claim();
});


self.addEventListener('fetch', function(event) 
{  const headers = { headers: {'Content-Type': 'text/html; charset=utf-8'}};
   if( interdit_FILES.includes(event.request.url.toString()) && (!navigator.onLine) ){ // si fait  parti des fichiers non accèssibles offline 
     
      event.respondWith(
        
       

         new Response("<h1> Pas de connexion internet </h1> <div> Cette fonctionnalité n'est pas disponible en offline: <br> Veuillez vous reconnecter </div>", headers)
            

      );   
   }
   else{ 
      if (event.request.url.startsWith('https')){ // vérifie que ce n'est pas une extension. 
     
  event.respondWith(
      caches.match(event.request)
         .then(function(response) {	
            console.log(interdit_FILES.includes(event.request.url.toString()));
      
            console.log(event.request.url.toString());

        
            if (response) {					// On vérifie que l’élément est en cache
               return response;
            } else {
              
                		
             


             
              return fetch(event.request)		// On effectue la requête réseau
                  .then(function(res) {			// On renvoie le résultat de la requête
                     return caches.open(CACHE_DYNAMIC_NAME)	// On ouvre le cache dynamique
                        .then(function(cache) {
                           cache.put(event.request.url, res.clone());	// On met l’url et le clone de la réponse
                           return res;
                        })
                     

                 })
                 .catch (function(err) {					// On capture les erreurs ou si fichiers interdit 
	       return caches.open(CACHE_STATIC_NAME)		// On ouvre le cache statique
                        .then(function(cache) {
                        if (event.request.headers.get('accept').includes('text/php')) {  // On vérifie qu’il s’agit d’une page php
                           return cache.match('https://revastic.com/offline.html');		// On retourne la page d’erreur
                        }
                     });
               });
           

                          
          
         
      }
        })
   );
      }else{return ;} // ne renvoi rien si l'extension n'est pas gérable par chrome 
   }
});
 
 
    
