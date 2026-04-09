# Sistema de Registro de Citas Médicas

Este proyecto es una aplicación web desarrollada como parte de una tesis académica. El objetivo es crear un sistema completo para el registro y gestión de citas médicas, facilitando la administración de pacientes, doctores, especialidades, informes médicos, facturas y recetas.

## Tecnologías Utilizadas

- **Backend**: Laravel (Framework PHP)
- **Frontend**: Blade Templates, Tailwind CSS
- **Base de Datos**: MySQL (configurado en Laravel)
- **Autenticación y Autorización**: Laravel Sanctum / Spatie Laravel Permission
- **Exportación de Datos**: Laravel Excel (Maatwebsite)
- **Envío de Correos**: Laravel Mail
- **Tests**: Pest PHP
- **Build Tool**: Vite
- **CSS Framework**: Tailwind CSS
- **JavaScript**: Vanilla JS / Alpine.js (si se usa)

## Funcionalidades Principales

- **Gestión de Usuarios**: Registro y autenticación de administradores, médicos y pacientes.
- **Citas Médicas**: Creación, edición y cancelación de citas.
- **Pacientes**: Registro y gestión de información de pacientes.
- **Doctores**: Gestión de perfiles de médicos y especialidades.
- **Informes Médicos**: Creación y envío de informes.
- **Facturas**: Generación y envío de facturas.
- **Recetas**: Gestión de recetas médicas.
- **Exportación**: Exportación de datos a Excel (citas, facturas, informes, recetas).
- **Correos Automáticos**: Envío de notificaciones por email.

## Instalación y Configuración

### Prerrequisitos

- PHP 8.1 o superior
- Composer
- Node.js y npm
- MySQL o base de datos compatible
- Laravel CLI (opcional)

### Pasos de Instalación

1. **Clonar el repositorio**:
   ```bash
   git clone <url-del-repositorio>
   cd algar
   ```

2. **Instalar dependencias de PHP**:
   ```bash
   composer install
   ```

3. **Instalar dependencias de JavaScript**:
   ```bash
   npm install
   ```

4. **Configurar el archivo .env**:
   - Copiar `.env.example` a `.env`
   - Configurar la base de datos, mail, etc.

5. **Generar clave de aplicación**:
   ```bash
   php artisan key:generate
   ```

6. **Ejecutar migraciones y seeders**:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Construir assets**:
   ```bash
   npm run build
   # o para desarrollo
   npm run dev
   ```

8. **Iniciar el servidor**:
   ```bash
   php artisan serve
   ```

## Uso

- Acceder a la aplicación en `http://localhost:8000`
- Usuario administrador por defecto: `admin@negocio.com` con contraseña `12345678`

## Tests

Ejecutar los tests con Pest:
```bash
./vendor/bin/pest
```

## Contribución

Este proyecto es parte de una tesis académica. Para contribuciones, contactar al autor.

## Licencia

Este proyecto está bajo la licencia MIT.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
