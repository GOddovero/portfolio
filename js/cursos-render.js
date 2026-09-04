document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('coursesSlider');
    if (!container || typeof coursesData === 'undefined') return;
    const element = (tag, className, text) => {
        const node = document.createElement(tag);
        node.className = className;
        node.textContent = text;
        return node;
    };
    const cards = coursesData.map(course => {
        const card = element('article', 'course-card', '');
        const topline = element('div', 'course-topline', '');
        const isCompleted = /titulado|completado/i.test(course.status);
        topline.append(
            element('span', 'course-institution', course.institution),
            element('span', `course-status${isCompleted ? '' : ' is-progress'}`, isCompleted ? 'CERTIFICADO' : course.status)
        );
        const bottom = element('div', 'course-bottom', '');
        bottom.append(element('span', 'course-date', course.date));
        if (course.pdfUrl && course.pdfUrl !== '#') {
            const link = element('a', 'course-certificate', 'Ver certificado');
            link.href = course.pdfUrl;
            link.target = '_blank';
            link.rel = 'noopener noreferrer';
            link.setAttribute('aria-label', `Ver certificado de ${course.title} (PDF)`);
            bottom.append(link);
        }
        card.append(topline, element('h3', '', course.title), element('p', 'course-description', course.description), bottom);
        return card;
    });
    container.replaceChildren(...cards);
});
