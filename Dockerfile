# Gunakan image PHP dengan Apache
FROM php:8.1-apache

# Salin semua file proyek ke dalam container
COPY . /var/www/html/

# Expose port 80 (default Apache)
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]