<?php
$hash = '$2y$10$ZzMocpHC/GrB18FewLfloOGSwkMGsV5iq2xDlfnUv5nzukmAQKlMq';
$password = 'admin123'; // Remplace par un mot de passe à tester

if (password_verify($password, $hash)) {
    echo "Mot de passe correct !";
} else {
    echo "Mot de passe incorrect.";
}
