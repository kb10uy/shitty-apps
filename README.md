# ShittyApps
This gives you enermous shits.

## Implemented Shits
+ Mpyw Lottery

## How to Install

### Clone
```
git clone https://github.com/kb10uy/shitty-apps
```

### Configure Your Web Server
```
# An Exmaple for Nginx
server {
    server_name domain.where.you.wanna.publish.shits;
    listen 80;
    root /path/to/shitty-apps;

    location / {
        try_files $uri /index.php?$query_string;
    }
    
    location ~ [^/]\.php(/|$) {
        expires off;

        include fastcgi_params;
        fastcgi_pass <path to your php-fpm>;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param SHIT_NAME ShitNameYouWannaExecute;
    }
}
```
