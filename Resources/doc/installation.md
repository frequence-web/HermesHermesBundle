Add this lines to your security.yml:*
        # PAGES ACCESSIBLES AUX ADMINISTRATEURS
        - { path: ^/admin/, role: HERMES_ROLE_ADMIN }

        # PAGES ACCESSIBLES AUX UTILISATEURS CONNECTES
        - { path: ^/change-password, role: HERMES_ROLE_USER }
