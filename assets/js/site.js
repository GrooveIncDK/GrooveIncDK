document.addEventListener('DOMContentLoaded', function () {
    /* ---- Language switch: DA default, EN alternate ---- */
    var STORAGE_KEY = 'groove-lang';
    var supported = ['da', 'en'];

    function applyLanguage(lang) {
        if (supported.indexOf(lang) === -1) lang = 'da';
        if (typeof translations === 'undefined') return;
        document.querySelectorAll('[data-i18n]').forEach(function (el) {
            var key = el.getAttribute('data-i18n');
            var dict = translations[lang];
            if (dict && dict[key] !== undefined) {
                el.textContent = dict[key];
            }
        });
        document.documentElement.setAttribute('lang', lang);
        document.querySelectorAll('.lang-btn').forEach(function (btn) {
            btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
        });
        try { localStorage.setItem(STORAGE_KEY, lang); } catch (e) {}
    }

    var stored = null;
    try { stored = localStorage.getItem(STORAGE_KEY); } catch (e) {}
    applyLanguage(stored && supported.indexOf(stored) !== -1 ? stored : 'da');

    document.querySelectorAll('.lang-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            applyLanguage(btn.getAttribute('data-lang'));
        });
    });

    /* ---- Mobile drawer ---- */
    var mobileToggle = document.getElementById('mobileToggle');
    var mobileDrawer = document.getElementById('mobileDrawer');
    var navOverlay = document.getElementById('navOverlay');
    var drawerClose = document.getElementById('drawerClose');
    if (!mobileToggle || !mobileDrawer) return;

    function openDrawer() {
        mobileDrawer.classList.add('open');
        navOverlay.classList.add('open');
        mobileToggle.setAttribute('aria-expanded', 'true');
    }
    function closeDrawer() {
        mobileDrawer.classList.remove('open');
        navOverlay.classList.remove('open');
        mobileToggle.setAttribute('aria-expanded', 'false');
    }
    mobileToggle.addEventListener('click', function () {
        if (mobileDrawer.classList.contains('open')) closeDrawer(); else openDrawer();
    });
    navOverlay.addEventListener('click', closeDrawer);
    drawerClose.addEventListener('click', closeDrawer);
    mobileDrawer.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', closeDrawer); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeDrawer(); });
});
