class Validator {
    // Affiche un message de validation (ou d'erreur) sous un champ
    showMessage(message, targetId, isValid) {
        const target = document.getElementById(targetId);
        if (!target) {
            console.error(`Erreur : Élément avec l'ID ${targetId} non trouvé.`);
            return;
        }

        // Message de succès ou d'erreur
        if (isValid) {
            target.innerHTML = `<span class="text-green-500 text-sm">✅ ${message} valide</span>`;
        } else {
            target.innerHTML = `<span class="text-red-500 text-sm">❌ ${message} incorrect</span>`;
        }
    }

    // Valide un champ de saisie en fonction d'un regex et affiche le message associé
    validateField(regex, inputId, fieldName, messageId) {
        const input = document.getElementById(inputId);
        if (!input) {
            console.error(`Erreur : Élément avec l'ID ${inputId} non trouvé.`);
            return false;
        }

        const value = input.value.trim();
        const isValid = regex.test(value);

        this.showMessage(fieldName, messageId, isValid);
        return isValid;
    }

    // Vérifie si un div est vide
    isDivEmpty(divId) {
        const element = document.getElementById(divId);
        if (!element) {
            console.error(`Erreur : Élément avec l'ID ${divId} non trouvé.`);
            return true;
        }
        return element.innerText.trim() === '';
    }

    // Vérifie si tous les divs sont remplis
    areDivsFilled(divIds) {
        for (let i = 0; i < divIds.length; i++) {
            if (this.isDivEmpty(divIds[i])) {
                return false;
            }
        }
        return true;
    }

    // Gère la soumission du formulaire en vérifiant si tous les champs sont valides
    validateForm(formId, divIds) {
        const form = document.getElementById(formId);
        if (!form) {
            console.error(`Erreur : Formulaire avec l'ID ${formId} non trouvé.`);
            return;
        }

        form.addEventListener('submit', (e) => {
            const isValid = this.areDivsFilled(divIds);
            if (!isValid) {
                e.preventDefault(); // Empêche l'envoi du formulaire si des champs sont vides
                console.log("❌ Formulaire non valide.");
            } else {
                console.log("✅ Formulaire valide.");
            }
        });
    }

}
