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
        preview.src = button.dataset.preview;
        preview.alt = button.dataset.previewAlt;
        document.querySelectorAll('[data-preview]').forEach(item => {
            item.classList.toggle('is-active', item === button);
            item.setAttribute('aria-pressed', String(item === button));
        });
    }));

    const filters = document.querySelector('.project-filters');
    const projects = [...document.querySelectorAll('[data-category]')];
    if (filters) filters.hidden = false;
    filters?.addEventListener('click', event => {
        const button = event.target.closest('[data-filter]');
        if (!button) return;
        filters.querySelectorAll('button').forEach(item => {
            item.setAttribute('aria-pressed', String(item === button));
            item.classList.toggle('is-active', item === button);
        });
        projects.forEach(project => {
            project.hidden = button.dataset.filter !== 'all' && project.dataset.category !== button.dataset.filter;
        });
        const count = projects.filter(project => !project.hidden).length;
        document.querySelector('#filter-status').textContent = `${count} proyectos visibles`;
    });

    const interests = {
        gym: {context: 'Conocé GOH GYM y coordinemos una demo para tu gimnasio.', message: 'Hola, vi la web de GOH y quiero conocer GOH GYM para mi gimnasio. Me gustaría coordinar una demo.'},
        shop: {context: 'Conocé GOH SHOP y coordinemos una demo para tu comercio.', message: 'Hola, vi la web de GOH y quiero conocer GOH SHOP para mi negocio. Me gustaría coordinar una demo.'},
        custom: {context: 'Una web, un sistema o esa idea que querés poner en marcha.', message: 'Hola, vi la web de GOH y quiero conversar sobre un desarrollo a medida para mi negocio.'}
    };
    document.querySelectorAll('[data-interest]').forEach(button => button.addEventListener('click', () => {
        document.querySelectorAll('[data-interest]').forEach(item => {
            item.setAttribute('aria-pressed', String(item === button));
            item.classList.toggle('is-active', item === button);
        });
        const interest = interests[button.dataset.interest];
        document.querySelector('#contact-context').textContent = interest.context;
        document.querySelector('#contact-whatsapp').href = `https://wa.me/543385405049?text=${encodeURIComponent(interest.message)}`;
    }));
    // Optional reveal is limited to small content groups. Everything is visible without JS.
    if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const observer = new IntersectionObserver(entries => entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        }), {threshold: 0.08});
        document.querySelectorAll('.section-heading, .studio-intro, .services-grid').forEach(item => {
            item.classList.add('reveal');
            observer.observe(item);
        });
    }
})();
