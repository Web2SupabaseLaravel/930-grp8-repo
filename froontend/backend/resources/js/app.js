import './bootstrap';
// في ملف JavaScript (مثل app.js)
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
