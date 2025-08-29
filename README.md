# Laravel WebSocket Reverb - Notificaciones en Tiempo Real

Proyecto de prueba para implementar notificaciones en tiempo real usando Laravel Reverb y WebSockets.

## 🚀 Tecnologías

- **Laravel Framework:** 12.26.3
- **Laravel Reverb:** WebSocket server integrado
- **Laravel Echo + Pusher JS:** Cliente WebSocket
- **Bootstrap 5:** Framework CSS
- **PHP:** 8.4.8
- **Composer:** 2.8.9
- **Node.js & NPM:** Para compilar assets

## 📋 Requisitos

- PHP >= 8.4
- Composer >= 2.8
- Node.js >= 18
- Base de datos (MySQL recomendado)

## 🛠️ Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/novakmzv/laravel-websocket-reverb.git
cd laravel-websocket-reverb
```

2. **Instalar dependencias**
```bash
composer install
npm install
```

3. **Configurar entorno**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurar base de datos**
   Edita el archivo `.env` con tus credenciales de BD y ejecuta:
```bash
php artisan migrate
```

## ⚡ Ejecutar el Proyecto

**Necesitas 4 terminales ejecutando:**

1. **Servidor Laravel**
```bash
php artisan serve
```

2. **Servidor WebSocket Reverb**
```bash
php artisan reverb:start
```

3. **Compilar Assets**
```bash
npm run dev
```

4. **Cola de Trabajos**
```bash
php artisan queue:work
```

## 🧪 Probar

1. Ve a `http://localhost:8000/notifications`
2. Abre la página en múltiples pestañas
3. Envía notificaciones desde cualquier pestaña
4. Observa cómo aparecen en tiempo real en todas las pestañas

## 📁 Estructura Principal

```
app/
├── Events/NotificationSent.php       # Evento de broadcasting
├── Http/Controllers/NotificationController.php
└── Http/Requests/NotificationRequest.php
resources/
├── js/echo.js                        # Configuración WebSocket
└── views/notifications.blade.php     # Vista principal
routes/
├── api.php                          # POST /api/notifications
└── web.php                          # GET /notifications
```
## 🤝 Contribución

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/nueva-caracteristica`)
3. Commit tus cambios (`git commit -am 'Agregar nueva característica'`)
4. Push a la rama (`git push origin feature/nueva-caracteristica`)
5. Crear un Pull Request

---

**Desarrollado con ❤️**
