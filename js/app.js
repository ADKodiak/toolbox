
var deferredPrompt;

if (!window.Promise) {
  window.Promise = Promise;
}
alert("cc");
if ('serviceWorker' in navigator) {
  navigator.serviceWorker
    .register('http://localhost/toolbox/sw.js')
    .then(function () {
      console.log('Service worker registered!');
    })
    .catch(function(err) {
      console.log(err);
    });
}

window.addEventListener('beforeinstallprompt', function(event) {
  console.log('beforeinstallprompt fired');
  event.preventDefault();
  deferredPrompt = event;
  return false;
});
