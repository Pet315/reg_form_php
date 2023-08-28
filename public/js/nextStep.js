document.addEventListener("DOMContentLoaded", function () {
    const steps = document.querySelectorAll(".step");
    let currentStep = 0;
  
    const nextButton = document.getElementById("nextStep1");
  
    nextButton.addEventListener("click", function () {
      if (currentStep < steps.length - 1) {
        steps[currentStep].style.display = "none";
        currentStep++;
        steps[currentStep].style.display = "block";
      }
    });
  });
  