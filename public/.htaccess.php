Options -MultiViews
RewriteEngine On

# تحديد مسار المشروع بشكل صحيح
RewriteBase /Développement d'une architecture MVC moderne avec PHP et PostgreSQL/public/

# إعادة توجيه كل الطلبات إلى index.php إذا لم تكن ملفًا أو مجلدًا موجودًا
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?$1 [L,QSA]
