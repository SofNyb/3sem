const snowContainer = document.getElementById("snow-container"); // Her henter vi ID'en #snow-container

const snowContent = ['&#10052', '&#10053', '&#10054'] // Det her er vores snefnugger lavet af HTML symboler

const random = (num) => { // Her randomizer vi udseendet og animationerne på vores snefnugger
    return Math.floor(Math.random() * num);
}

const getRandomStyles = () => { // Denne funktion generer tilfældige stile til hver snefnug: position, størrelse og animationslængde
    const top = random(100); // Top får en negativ værdi nedenunder så sneen falder ovenover den synlige skærm
    const left = random(100);
    const dur = random(10) + 10; // Har en minimumsværdi på 10 sekunder
    const size = random(25) + 25;  // Har en minimumsværdi på 25 pixels
    return `
      top: -${top}%;
      left: ${left}%;
      font-size: ${size}px;
      animation-duration: ${dur}s;
    `;
}

const createSnow = (num) => {
    for (let i = num; i > 0; i--) { // Looper sneen
        let snow = document.createElement("div");
        snow.className = "snow";
        snow.style.cssText = getRandomStyles();
        snow.innerHTML = snowContent[random(2)]
        snowContainer.append(snow); // Tilføjer sneen til containeren
    }
}

window.addEventListener("load", () => { // Så snart siden er loadet, bliver denne funktion kaldet som starter sneen
    createSnow(30)
});