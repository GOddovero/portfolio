/* Four turns, then the same symbol docks into the live navbar position. */
(() => {
    'use strict';
    const root = document.documentElement;
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    if (reducedMotion.matches || window.location.hash) return;
    root.classList.add('intro-active');
    let finished = false;
    let docking = false;
    let flight;
    let watchdog;
    const finish = () => {
        if (finished) return;
        finished = true;
        clearTimeout(watchdog);
        root.classList.remove('intro-active', 'intro-docking');
        document.querySelectorAll('[data-intro-inert]').forEach(element => {
            element.inert = false;
            element.removeAttribute('data-intro-inert');
        });
        document.querySelector('.brand-intro')?.remove();
        flight?.cancel();
        document.removeEventListener('keydown', skip);
        window.removeEventListener('resize', onResize);
    };
    const dock = () => {
        if (finished || docking) return;
        const symbol = document.querySelector('.intro-symbol');
        const destination = document.querySelector('.site-header .brand-symbol');
        if (!symbol || !destination || !symbol.animate || reducedMotion.matches) return finish();

        // Read both boxes once. Only transform and opacity change during the flight.
        const from = symbol.getBoundingClientRect();
        const to = destination.getBoundingClientRect();
        if (!from.width || !from.height || !to.width || !to.height) return finish();
        docking = true;
        root.classList.add('intro-docking');
        flight = symbol.animate([
            {transform: 'translate(0px, 0px) scale(1, 1)'},
            {transform: `translate(${to.left - from.left}px, ${to.top - from.top}px) scale(${to.width / from.width}, ${to.height / from.height})`}
        ], {duration: 820, easing: 'cubic-bezier(.65, 0, .25, 1)', fill: 'forwards'});
        flight.onfinish = finish;
    };
    const skip = event => {
        if (event.key === 'Escape' || event.key === 'Tab') finish();
    };
    // A viewport change during the handoff should never leave a misplaced logo.
    const onResize = () => { if (docking) finish(); };
    document.addEventListener('keydown', skip);
    window.addEventListener('resize', onResize);
    reducedMotion.addEventListener('change', event => { if (event.matches) finish(); });
    window.addEventListener('pageshow', event => { if (event.persisted) finish(); });
    watchdog = setTimeout(finish, 6500);
    document.addEventListener('DOMContentLoaded', () => {
        if (finished) return;
        document.querySelectorAll('body > :not(.brand-intro):not(script)').forEach(element => {
            if (!element.inert) {
                element.dataset.introInert = '';
                element.inert = true;
            }
        });
        document.querySelector('.intro-symbol .goh-symbol-colors')?.addEventListener('animationend', dock, {once: true});
    }, {once: true});
})();
