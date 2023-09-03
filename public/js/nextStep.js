document.addEventListener("DOMContentLoaded", function () {
  const steps = document.querySelectorAll(".step");
  let currentStep = 0;

  const nextButton1 = document.getElementById("nextStep1");

  nextButton1.addEventListener("click", function () {
    if (currentStep < steps.length - 1) {
      steps[currentStep].style.display = "none";
      currentStep++;
      steps[currentStep].style.display = "block";
    }
  });

  const nextButton2 = document.getElementById("nextStep2");

  nextButton2.addEventListener("click", function () {
    const form = document.getElementById("form");
    if (!form.checkValidity()) {
      steps[currentStep].style.display = "none";
      currentStep--;
      steps[currentStep].style.display = "block";
    }
  });
});


  