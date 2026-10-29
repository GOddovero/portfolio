<?php
function gohOrganizationSchema()
{
    return [
        '@type' => 'Organization', '@id' => gohCanonical('#organization'),
        'name' => 'GOH', 'url' => gohCanonical(),
        'logo' => gohCanonical('img/goh1.png'),
        'description' => 'Estudio de desarrollo de software de Gaspar Oddovero Herrera. Sistemas GOH SHOP, GOH GYM y GOH CARE, módulos GOH y desarrollos a medida desde Córdoba, Argentina.',
        'email' => 'contacto@goh.com.ar', 'telephone' => '+543385405049',
        'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'General Levalle', 'addressRegion' => 'Córdoba', 'addressCountry' => 'AR'],
        'areaServed' => ['@type' => 'Country', 'name' => 'Argentina'],
        'founder' => ['@id' => gohCanonical('nosotros.php#gaspar')],
        'sameAs' => ['https://www.instagram.com/goh.dev/', 'https://github.com/GOddovero'],
    ];
}

function gohPersonSchema()
{
    return [
        '@type' => 'Person', '@id' => gohCanonical('nosotros.php#gaspar'),
        'name' => 'Gaspar Oddovero Herrera', 'url' => gohCanonical('nosotros.php'),
        'image' => gohCanonical('img/gaspar-oddovero-800.webp'),
        'jobTitle' => 'Fundador de GOH y desarrollador de software',
        'description' => 'Licenciado en Informática por la Universidad Siglo 21. Desarrollo de software desde General Levalle, Córdoba, Argentina.',
        'worksFor' => ['@id' => gohCanonical('#organization')],
        'alumniOf' => ['@type' => 'CollegeOrUniversity', 'name' => 'Universidad Siglo 21'],
        'sameAs' => ['https://www.linkedin.com/in/goh-dev/', 'https://github.com/GOddovero'],
    ];
}

function gohBreadcrumbSchema($items)
{
    $list = [];
    foreach ($items as $index => $item) {
        $list[] = ['@type' => 'ListItem', 'position' => $index + 1, 'name' => $item[0], 'item' => $item[1]];
    }
    return ['@type' => 'BreadcrumbList', 'itemListElement' => $list];
}
