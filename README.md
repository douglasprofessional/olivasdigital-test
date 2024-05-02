# Olivas Digital Test

Project created for fullstack WordPress developer testing, from the company Olivas Digital

### Technologies

* Composer v2.2.6 [Documentation](https://getcomposer.org/)
* Docker v26.1.1 [Documentation](https://docker.com)
* Docker Compose v2.3.3 [Documentation](https://docs.docker.com/compose/)
* NODE: 20.12.2 LTS [Documentation](https://nodejs.org/en/about/previous-releases)
* TailwindCSS 3.4.3 [Documentation](https://tailwindcss.com/docs/installation)
* jQuery [Documentation](https://jquery.com)
* SCSS [Documentation](https://sass-lang.com)
* BEM Nomenclature [Documentation](https://getbem.com)
* ITCSS Architecture [Documentation](https://willianjusten.com.br/organizando-seu-css-com-itcss/)
* WordPress [Documentation](https://wordpress.org)
* ACF PRO [Documentation](https://www.advancedcustomfields.com/pro)
* Contact Form 7 [Documentation](https://contactform7.com)
* All In One [Documentation](https://wpengine.com/migrate-wordpress)

---

### Running the infrastructure, Docker, of the project

1. Open the terminal;
2. Go to the project root folder, via the terminal;
3. Run the command ``` docker compose up ``` to lift the machine, start the project and serve the application at the port 8000;
4. Get in on [admin panel](http://localhost:8000/wp-admin);
5. Log in with admin admin

---

### Defining rules in wp-config.php

1. Open the file, in the root of the folder wp_project;
2. Below the define( 'WP_DEBUG' ) paste the rules:
```
    define( 'FS_METHOD','direct' );

    if ( ! defined( 'WP_ENV' ) ) {
        define( 'WP_ENV', 'development' );
        // define( 'WP_ENV', 'production' );
    }
```

### Running the theme, of the project

1. From the terminal, navigate to the root of the olivasdigital theme;
2. Make the installations:
    - composer install;
    - yarn install OR npm install;
3. Run the project with yarn start OR npm start;

---

### Saving the database, .sql, in the project root

1. Using the terminal, at the root of the project, run ``` sh export.sh  ```;
2. Open the last dump generated in ``` db_data/ ``` and check if there is a Warning in the first line;
**If so, delete this line and then push normally**

---