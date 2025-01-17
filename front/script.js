document.addEventListener("DOMContentLoaded", function () {
  let currentStep = 1;

  // Fonction pour montrer une étape spécifique
  function showStep(step) {
    for (let i = 1; i <= 7; i++) {
      let stepElement = document.getElementById(`step${i}`);
      if (i === step) {
        stepElement.classList.add("show");
        stepElement.style.display = "block"; // Assurez-vous que l'étape actuelle est affichée
      } else {
        stepElement.classList.remove("show");
        stepElement.style.display = "none"; // Masquez les autres étapes
      }
    }
  }
  showStep(currentStep);

  document.getElementById("next1").addEventListener("click", function () {
    const TypeInput = document.getElementById("Oeuvre");
    if (TypeInput.checkValidity()) {
      currentStep++;
      showStep(currentStep);
    } else {
      alert("Veuillez entrer un nom valide.");
    }
  });

  document.getElementById("next2").addEventListener("click", function () {
    const TitleInput = document.getElementById("title");
    if (TitleInput.checkValidity()) {
      currentStep++;
      showStep(currentStep);
    } else {
      alert("Veuillez entrer un titre valide.");
    }
  });

  document.getElementById("next3").addEventListener("click", function () {
    const GenderInput = document.getElementById("genre");
    if (GenderInput.checkValidity()) {
      currentStep++;
      showStep(currentStep);
    } else {
      alert("Veuillez entrer un numéro de téléphone valide.");
    }
  });

  document.getElementById("next4").addEventListener("click", function () {
    const CoverInput = document.getElementById("cover");
    if (CoverInput.checkValidity()) {
      currentStep++;
      showStep(currentStep);
    } else {
      alert("Veuillez entrer un numéro de téléphone valide.");
    }
  });

  document.getElementById("next5").addEventListener("click", function () {
    const RatingInput = document.getElementById("rating");
    if (RatingInput.checkValidity()) {
      currentStep++;
      showStep(currentStep);
    } else {
      alert("Veuillez entrer un numéro de téléphone valide.");
    }
  });

  document.getElementById("next6").addEventListener("click", function () {
    const DescriptionInput = document.getElementById("description");
    if (DescriptionInput.checkValidity()) {
      currentStep++;
      showStep(currentStep);
    } else {
      alert("Veuillez entrer un numéro de téléphone valide.");
    }
  });
});
