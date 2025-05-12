// Regex patterns
const patterns = {
    name: /^[a-zA-ZÀ-ÿ\s\'-]+$/,
    email: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
    password: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
};

// Messages d'erreur
const errorMessages = {
    name: 'Le nom ne doit contenir que des lettres, espaces, tirets et apostrophes.',
    email: 'Le format de l\'email n\'est pas valide.',
    password: 'Le mot de passe doit contenir au moins 8 caractères, une lettre, un chiffre et un caractère spécial.',
    passwordConfirm: 'Les mots de passe ne correspondent pas.'
};

// Fonction de validation
function validateField(field, value) {
    if (!patterns[field].test(value)) {
        return errorMessages[field];
    }
    return '';
}

// Validation du formulaire de connexion
function validateLoginForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    let isValid = true;
    let errorMessage = '';

    // Validation email
    errorMessage = validateField('email', email);
    if (errorMessage) {
        document.getElementById('email-error').textContent = errorMessage;
        isValid = false;
    } else {
        document.getElementById('email-error').textContent = '';
    }

    // Validation mot de passe
    errorMessage = validateField('password', password);
    if (errorMessage) {
        document.getElementById('password-error').textContent = errorMessage;
        isValid = false;
    } else {
        document.getElementById('password-error').textContent = '';
    }

    return isValid;
}

// Validation du formulaire d'inscription
function validateRegisterForm() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const passwordConfirm = document.getElementById('password_confirmation').value;
    let isValid = true;
    let errorMessage = '';

    // Validation nom
    errorMessage = validateField('name', name);
    if (errorMessage) {
        document.getElementById('name-error').textContent = errorMessage;
        isValid = false;
    } else {
        document.getElementById('name-error').textContent = '';
    }

    // Validation email
    errorMessage = validateField('email', email);
    if (errorMessage) {
        document.getElementById('email-error').textContent = errorMessage;
        isValid = false;
    } else {
        document.getElementById('email-error').textContent = '';
    }

    // Validation mot de passe
    errorMessage = validateField('password', password);
    if (errorMessage) {
        document.getElementById('password-error').textContent = errorMessage;
        isValid = false;
    } else {
        document.getElementById('password-error').textContent = '';
    }

    // Validation confirmation mot de passe
    if (password !== passwordConfirm) {
        document.getElementById('password-confirm-error').textContent = errorMessages.passwordConfirm;
        isValid = false;
    } else {
        document.getElementById('password-confirm-error').textContent = '';
    }

    return isValid;
}

// Ajout des écouteurs d'événements
document.addEventListener('DOMContentLoaded', function () {
    // Formulaire de connexion
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            if (!validateLoginForm()) {
                e.preventDefault();
            }
        });
    }

    // Formulaire d'inscription
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            if (!validateRegisterForm()) {
                e.preventDefault();
            }
        });
    }
}); 