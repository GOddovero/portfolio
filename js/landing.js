(() => {
    'use strict';
    const menu = document.querySelector('.main-nav');
    const toggle = document.querySelector('.menu-toggle');
    const mobile = window.matchMedia('(max-width: 760px)');
    const setMenu = (open, restoreFocus = false) => {
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
        menu.classList.toggle('is-open', open);
        menu.inert = mobile.matches && !open;
        if (restoreFocus) toggle.focus();
    };
    document.documentElement.classList.add('js-ready');
    toggle.addEventListener('click', () => setMenu(toggle.getAttribute('aria-expanded') !== 'true'));
    menu.querySelectorAll('a').forEach(link => link.addEventListener('click', () => setMenu(false)));
    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') setMenu(false, true);
    });
    document.addEventListener('click', event => {
        if (!event.target.closest('.header-inner')) setMenu(false);
    });
    document.addEventListener('focusin', event => {
        if (mobile.matches && !event.target.closest('.header-inner')) setMenu(false);
    });
    mobile.addEventListener('change', () => setMenu(false));
    setMenu(false);

    const screenshotSwitcher = document.querySelector('.screenshot-switcher');
    if (screenshotSwitcher) screenshotSwitcher.hidden = false;
    document.querySelectorAll('[data-preview]').forEach(button => button.addEventListener('click', () => {
        const preview = document.querySelector('#gym-preview');
        preview.srcset = button.dataset.previewSrcset;
        preview.src = button.dataset.preview;
        preview.alt = button.dataset.previewAlt;
        document.querySelectorAll('[data-preview]').forEach(item => {
            item.classList.toggle('is-active', item === button);
            item.setAttribute('aria-pressed', String(item === button));
        });
    }));

    // Explore product areas without hiding any information when JavaScript is unavailable.
    const areaNav = document.querySelector('.shop-area-nav');
    const areaButtons = [...document.querySelectorAll('[data-shop-area]')];
    const areaPanels = [...document.querySelectorAll('.shop-area-panel')];
    const selectArea = button => {
        areaButtons.forEach(item => item.setAttribute('aria-pressed', String(item === button)));
        areaPanels.forEach(panel => { panel.hidden = panel.id !== button.getAttribute('aria-controls'); });
    };
    if (areaNav && areaButtons.length) {
        selectArea(areaButtons[0]);
        areaNav.hidden = false;
        document.querySelector('.shop-explorer').classList.add('is-interactive');
        areaNav.addEventListener('click', event => {
            const button = event.target.closest('[data-shop-area]');
            if (button) selectArea(button);
        });
        areaNav.addEventListener('keydown', event => {
            const button = event.target.closest('[data-shop-area]');
            if (!button || !['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown', 'Home', 'End'].includes(event.key)) return;
            event.preventDefault();
            const direction = ['ArrowRight', 'ArrowDown'].includes(event.key) ? 1 : -1;
            let index = (areaButtons.indexOf(button) + direction + areaButtons.length) % areaButtons.length;
            if (event.key === 'Home') index = 0;
            if (event.key === 'End') index = areaButtons.length - 1;
            selectArea(areaButtons[index]);
            areaButtons[index].focus();
        });
    }

    // Entrances accompany the logo's flight into the navbar as the white cover fades.
    const motionPreference = window.matchMedia('(prefers-reduced-motion: reduce)');
    if ('IntersectionObserver' in window && !motionPreference.matches) {
        // Animate small content groups, never the entire screenshot-heavy section.
        const targets = [...document.querySelectorAll('[data-reveal], .gym-copy, .success-copy, .section-heading, .studio-intro, .services-grid')];
        targets.forEach(item => { item.dataset.reveal = ''; item.classList.add('motion-pending'); });
        document.documentElement.classList.add('motion-ready');
        const revealObserver = new IntersectionObserver(entries => entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('motion-pending');
                entry.target.classList.add('is-in-view');
                entry.target.closest('[data-motion-group]')?.classList.add('is-in-view');
                revealObserver.unobserve(entry.target);
            }
        }), {threshold: 0.01, rootMargin: '0px 0px 80px 0px'});
        let introObserver;
        const startReveals = () => {
            if (document.documentElement.classList.contains('intro-active') && !document.documentElement.classList.contains('intro-docking')) return;
            introObserver?.disconnect();
            targets.forEach(item => revealObserver.observe(item));
        };
        if (document.documentElement.classList.contains('intro-active')) {
            introObserver = new MutationObserver(startReveals);
            introObserver.observe(document.documentElement, {attributes: true, attributeFilter: ['class']});
        } else startReveals();
        motionPreference.addEventListener('change', event => {
            if (!event.matches) return;
            introObserver?.disconnect();
            revealObserver.disconnect();
            document.documentElement.classList.remove('motion-ready');
            targets.forEach(item => item.classList.remove('motion-pending'));
        });
    }

})();
