class Event {
    poppap(NameForm, BtnOfAfficherPoppap, EventType) {
        const Form = document.getElementById(NameForm);
        const Button = document.getElementById(BtnOfAfficherPoppap);


        if (Form && Button) {

            Button.addEventListener(EventType, function () {
                Form.classList.toggle('hidden');
            });
        } else {
            console.error("Form or Button element not found!");
        }
    }


    CreateForm(DivParent, classe, Id, action, method, Inputs, classInput, FormulaireDeQuoi) {
        const Div = document.getElementById(DivParent);


        Div.innerHTML = `
      <form id="${Id}" action="" method="${method}" class="${classe}">

            <input type="hidden" name="_token" value="CSRF_TOKEN_HERE">


            ${method.toUpperCase() === 'POST' ? '' : `<input type="hidden" name="_method" value="${method}">`}
                  <h2 class="text-2xl font-bold mb-4 text-center text-green-700">${FormulaireDeQuoi}</h2>

      </form>
    `;


        // Ajoute les inputs
        for (let i = 0; i < Inputs.length; i++) {
            this.CreateInput(Id, Inputs[i], classInput);
        }
        const form = document.getElementById(Id);
        form.innerHTML += `
          <button type="submit" class="w-full bg-green-300 hover:bg-green-700 text-white font-semibold py-2 rounded-xl">
            Envoyer
          </button>
        `;


    }

    CreateInput(FormId, name, classInput) {
        const Form = document.getElementById(FormId);
        const div = document.createElement("div");
        div.innerHTML += `
             <label for="${name}" class="block text-sm font-medium text-gray-700">${name}</label>
      <input id="${name}" class="${classInput}" placeholder="${name}" name="${name}">
    `;
        Form.appendChild(div);


    }

    ComponentDivInputs(IdDiv, Inputs, InputsClass) {
        const Div = document.getElementById(IdDiv);
        for (let i = 0; i < Inputs.length; i++) {
            this.CreateInput(IdDiv, Inputs[i], InputsClass);
        }
    }

    AnalyseInput(div) {
        isvide = document.getElementById(div);

        if (isvide.innerText.trim() === '') {
            return true;
        } else {
            return false;
        }
    }
    DonneReponceInputs(Divs){
        for(let i = 0 ;i<Divs.length;i++){
            if(this.AnalyseInput(Divs[i] === false)){
                return false;
            }
        }
    }
    FormValid(valideAll, form) {
        document.getElementById(form).addEventListener('submit', function (e) {
            if (valideAll === false) {
                e.preventDefault();
            }
        })

    }
}
