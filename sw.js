if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    navigator.serviceWorker
      .register('/sw.js')
      .then(registration => {
        console.log(
          `Service Worker enregistré ! Ressource: ${registration.scope}`
        );
      })
      .catch(err => {
        console.log(
          `Echec de l'enregistrement du Service Worker: ${err}`
        );
      });
  });
}

importScripts(
  'https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js'
);
if (workbox) {
  console.log(`Super ! Workbox est chargé 🎉`);
  
  workbox.routing.registerRoute(
    /\.(?:html|js|css|png|jpg|jpeg|svg|gif)$/,
    new workbox.strategies.StaleWhileRevalidate()
  );
}