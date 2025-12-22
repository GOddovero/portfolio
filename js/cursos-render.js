document.addEventListener('DOMContentLoaded', () => {
    const sliderContainer = document.getElementById('coursesSlider');
    
    if (!sliderContainer || typeof coursesData === 'undefined') return;

    // Limpiar contenido existente para cargar desde el JSON
    sliderContainer.innerHTML = '';

    coursesData.forEach(course => {
        const slide = document.createElement('div');
        slide.className = 'course-slide';
        
        const hasPdf = course.pdfUrl && course.pdfUrl !== '#';
        
        // Header Content: PDF Embed o Icono
        let headerContent;
        if (hasPdf) {
            // Usamos embed para mostrar el PDF como "imagen"
            // view=Fit ajusta todo el documento visible
            // scrollbar=0 elimina scrollbars
            headerContent = `
                <embed src="${course.pdfUrl}#view=Fit&toolbar=0&navpanes=0&scrollbar=0&statusbar=0" type="application/pdf" class="course-pdf-preview" style="overflow: hidden; pointer-events: none;">
                <a href="${course.pdfUrl}" target="_blank" class="course-overlay" title="Ver Certificado Completo"></a>
            `;
        } else {
            headerContent = `
                <div class="course-header-icon">
                    <i class="${course.icon}"></i>
                </div>
                <div class="course-overlay"></div>
            `;
        }

        // Status Badge Logic
        const isCompleted = course.status.toLowerCase().includes('titulado') || course.status.toLowerCase().includes('completado');
        const statusClass = isCompleted ? 'status-completed' : 'status-progress';
        const statusIcon = isCompleted ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-spinner"></i>';
        const typeLabel = isCompleted ? 'Certificado' : 'En Curso';

        slide.innerHTML = `
            <div class="course-header">
                <span class="course-type-badge">${typeLabel}</span>
                ${headerContent}
            </div>
            <div class="course-content">
                <h4>${course.title}</h4>
                <div class="course-meta">
                    <i class="fas fa-university" style="color: var(--goh-teal);"></i> ${course.institution}
                    <span style="margin: 0 5px;">•</span>
                    <span>${course.date}</span>
                </div>
                <p class="course-desc">${course.description}</p>
                
                <div class="course-footer">
                    <span class="status-badge ${statusClass}">
                        ${statusIcon} ${course.status}
                    </span>
                    ${hasPdf ? `
                        <a href="${course.pdfUrl}" target="_blank" class="btn-cert">
                            Ver <i class="fas fa-arrow-right"></i>
                        </a>
                    ` : ''}
                </div>
            </div>
        `;
        
        sliderContainer.appendChild(slide);
    });
});
