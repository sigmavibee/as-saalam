# Gunakan image PHP dengan Apache
FROM php:8.1-apache

# Aktifkan mod_rewrite
RUN a2enmod rewrite

# Salin semua file proyek ke dalam container
COPY . /var/www/html/

# Atur hak akses (opsional, jika perlu)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (default Apache)
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
