// public/service-worker.js

importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.2.4/workbox-sw.js');

if (workbox) {
  console.log(`Workbox is loaded`);

  // Precache and route all assets from the globDirectory
  workbox.precaching.precacheAndRoute([]);

  // Cache Google Fonts with a stale-while-revalidate strategy
  workbox.routing.registerRoute(
    /^https:\/\/fonts\.googleapis\.com/,
    new workbox.strategies.StaleWhileRevalidate()
  );

  // Add more caching strategies or routes as needed
} else {
  console.log(`Workbox didn't load`);
}
self.addEventListener('push', function(event) {
  const payload = event.data.json();
  const title = payload.title || 'Notification';
  const options = {
    body: payload.body || 'New notification',
    icon: '/images/logo.png',
    // Add other options as needed
  };
  console.log(event.waitUntil(self.registration.showNotification(title, options)));
});