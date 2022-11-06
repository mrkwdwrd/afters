# BwPublisher - CMS
---
### Requirements

*  PHP v7.3
*  Node JS v14.7.0

---
**Generate Unique Application Key:**

*  ```php artisan key:generate```

**Set Environment:**

*  Copy **.env.example** to **.env**, and update the values:
*  ```cp .env.example .env```

**Notes:**

*  APP_DEBUG: `true | false` (enables Laravel Telescope Toolbar)
*  DEBUGBAR_ENABLED: `true | false` (enables Laravel Debugbar)

---
### Install Dependencies

For local (dev):

*  ```composer install```

For staging/production:

*  ```composer install --no-dev```

### Create DB Schema

* ```php artisan migrate```
* ```php artisan db:seed```

Creates  admin user: **user: admin@admin.com / pass: admin**

**MUST BE REMOVED BEFORE PRODUCTION!**

### Install Node Dependencies

* ```npm install```

### Compile SCSS and JS
For local (dev):

*   Admin: ```npm run admin-dev``` or ```npm run admin-watch```
*   Client: ```npm run dev``` or ```npm run watch```

For staging/prodution:

*   Admin & Client: ```npm run prod```

### Laravel IDE Helper
Generates a helper file that enables your IDE to provide accurate autocompletion and prevent showing errors when using facades.

`https://github.com/barryvdh/laravel-ide-helper`

* ```php artisan ide-helper:generate```

---
### Local Dev Tools
Only available when running locally in dev environment.

**Telescope**

*   `http://{project.url}/telescope`

**Admin Style Guide**

*  `http://{project.url}/admin/styles`

---
### Troubleshooting

# Error:

**Intervention\Image\Exception\NotSupportedException**
Reading Exif data is not supported by this PHP installation.

# Solution:

