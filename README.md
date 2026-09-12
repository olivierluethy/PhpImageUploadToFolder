# PHP Image Upload To Folder

A minimal PHP example that uploads an image from an HTML form, stores the file
in a local `images/` folder on the server, records its path in a MySQL database,
and then displays all uploaded images on the index page.

## Features

- Simple upload form (`upload.php`) with server-side validation
- Allowed types restricted to `jpg`, `jpeg`, `png`, `gif`
- File-size limit (< 1 MB) and upload-error checks
- Unique filenames via `uniqid()`; files saved under `images/`
- Image paths stored in a MySQL `images` table
- Gallery view (`index.php`) that lists every stored image

## Tech Stack

- PHP (MySQLi)
- MySQL / MariaDB
- HTML

## Files

```
index.php     # reads image paths from the DB and displays them
upload.php     # upload form + handler (validation, move, DB insert)
babylow.sql    # database + `images` table schema
images/        # uploaded files are stored here
```

## Run Locally

1. Serve the folder with PHP + MySQL (e.g. XAMPP / MAMP), reachable via a browser.
2. Create the database and table:
   ```bash
   mysql -u root < babylow.sql
   ```
3. Update the `mysqli_connect(...)` credentials in `index.php` and `upload.php`
   if your MySQL user/password differ from the local defaults.
4. Open `upload.php` to upload an image, then `index.php` to see the gallery.

> Note: the database credentials in the source are local development defaults
> (`root` / empty password). Set real credentials for any real deployment, and
> treat this as a learning example rather than production-ready upload code.
